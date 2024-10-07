<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>


<main>
    <div class="container mt-5">
        <p class="mb-5">
            <a href="/vehicles" class="btn btn-secondary btn-sm">Go Back</a>
        </p>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php vehicleCard($vehicle); ?>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
