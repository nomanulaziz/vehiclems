<?php require 'partials/head.php'; ?>
<?php include_once 'partials/nav.php'; ?>
<?php include_once 'partials/banner.php'; ?>


<main>
    <div class="mx-auto py-6 px-3">
        <p>
            <a href="/vehicles" class="btn btn-secondary btn-sm">Go Back</a>
        </p>
        <p class="text-lg"> <strong> <?= $vehicle['name'] ?> </strong> </p>
    </div>
</main>

<?php require 'partials/footer.php'; ?>
