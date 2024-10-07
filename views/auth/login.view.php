<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<main>

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 p-5 bg-dark text-white rounded">

                <h2 class="text-center mb-4">Login</h2>

                <form action="/auth/login" method="POST">
                    <?php
                        formInput(label: 'Email address', type: 'email', name: 'email');
                        formInput(label: 'Password', type: 'password', name: 'password');
                    ?>

                    <div class="mt-5">
                        <button type="submit" class="btn bg-success text-white w-100">
                            Login
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p> <span class="text-secondary">Don't have an account? </span><a href="/signup" class="text-light">Sign-up here</a></p>
                </div>
            </div>
        </div>
    </div>    
</main>

<?php require base_path('views/partials/footer.php'); ?>