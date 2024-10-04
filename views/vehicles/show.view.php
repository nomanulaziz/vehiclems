<?php require BASE_PATH . 'views/partials/head.php'; ?>
<?php require BASE_PATH . 'views/partials/nav.php'; ?>
<?php require BASE_PATH . 'views/partials/banner.php'; ?>


<main>
    <div class="mx-auto py-6 px-3">
        <p>
            <a href="/vehicles" class="btn btn-secondary btn-sm">Go Back</a>
        </p>
        <p class="text-lg"> <strong> <?= htmlspecialchars($vehicle['name']) ?> </strong> </p>
    </div>
</main>

<?php require BASE_PATH . 'views/partials/footer.php'; ?>
