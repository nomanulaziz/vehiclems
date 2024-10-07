<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto py-6 px-3">
        <form id="vehicleForm" action="/vehicle" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $vehicle['id']; ?>">
            <?php
                formDropdown(label: 'Select Vehicle Type', name:  'vehicleType', options: [
                    'car' => 'Car',
                    'boat' => 'Boat',
                    'plane' => 'Plane'
                ], selected: 'car');
                
                formInput(label: 'Vehicle Name', type: 'text', name: 'name', value: "{$vehicle['name']}", required: false);
                if(isset($errors['name'])) {
                    echo "<p class='text-danger small'>{$errors['name']}</p>";
                }
                formInput(label: 'Price', type: 'text', name: 'price', value: "{$vehicle['price']}", required: false);
                if(isset($errors['price'])) {
                    echo "<p class='text-danger small'>{$errors['price']}</p>";
                }
                formInput(label: 'Make Year', type: 'number', name: 'makeYear', value: "{$vehicle['make_year']}", required: false);
                if(isset($errors['makeYear'])) {
                    echo "<p class='text-danger small'>{$errors['makeYear']}</p>";
                }
                formInput(label: 'Color', type: 'text', name:  'color', value: "{$vehicle['color']}", required: false);
                if(isset($errors['color'])) {
                    echo "<p class='text-danger small'>{$errors['color']}</p>";
                }
            ?>
            <div id="vehicleSpecificFields"></div>
            <div class="modal-footer p-0 my-5 border-2" style="justify-content: space-between; padding-top: 10px !important;">
                
                <button type="submit" class="float-end btn btn-sm btn-outline-primary px-3">Update</button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
