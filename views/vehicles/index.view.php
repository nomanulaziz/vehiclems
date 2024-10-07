<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<p>Welcome to vehicles page</p>

<main>
    <div class="mx-auto py-6 px-3">
        <ul>
            <?php foreach($vehicles as $vehicle) : ?>
                <li> 
                    <a href="/vehicle?id=<?= $vehicle['id'] ?>" class="text-blue ">
                        <?= htmlspecialchars($vehicle['name']) ?>
                    </a> 
                </li>
            <?php endforeach; ?>
        </ul>

        <p>
            <a href="/vehicle/create" class="btn btn-link mt-5 p-3 btn-sm">Add New Vehicle</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
