<!-- Header Navbar -->
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="../assets/vms_logo.png" class="bi me-2" width="40" height="40">
    </a>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="<?= urlIs('/') ?>nav-link px-2 link-secondary">Home</a></li>
        <?php if($_SESSION['user'] ?? false ) : ?>
            <li><a href="/vehicles" class="<?= urlIs('/vehicles') ?>nav-link px-2 link-secondary">My Vehicles</a></li>
        <?php endif; ?>
        <li><a href="/about" class="<?= urlIs('/about') ?>nav-link px-2 link-dark">About</a></li>
        <li><a href="/contact" class="<?= urlIs('/contact') ?>nav-link px-2 link-dark">Contact</a></li>
    </ul>
    <div>
        </div>
        <div class="col-md-3 text-end">
            <?php if($_SESSION['user'] ?? false) : ?>
                <!-- User greeting -->
                <div class="d-flex align-items-center">
                    <span class='text-gray-500'> Welcome <strong> <?= $_SESSION['user']['name'] ?? "Guest" ?> </strong> </span>
                    
                    <form action="/logout" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="ms-2 btn btn-sm btn-outline-secondary">Logout</button>
                    </form>
                </div>
            <?php else : ?>
                <div class="d-flex">
                    <a href="/login">
                        <button type="button" class="btn btn-outline-primary me-2">Login</button>
                    </a>

                    <a href="/signup">
                        <button type="button" class="btn btn-outline-success">Sign-up</button>
                    </a>
                </div>
            <?php endif; ?>
    </div>
</header>