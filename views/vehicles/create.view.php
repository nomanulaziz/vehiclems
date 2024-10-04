<?php
view('partials/head.php');
view('partials/nav.php');
view('partials/banner.php');
?>


<main>
    <div class="mx-auto py-6 px-3">
        <form id="vehicleForm"  method="POST">
            <?php
                formDropdown(label: 'Select Vehicle Type', name:  'vehicleType', options: [
                    'car' => 'Car',
                    'boat' => 'Boat',
                    'plane' => 'Plane'
                ], selected: 'car');
                
                formInput(label: 'Vehicle Name', type: 'text', name: 'name', required: false);
                if(isset($errors['name'])) {
                    echo "<p class='text-danger small'>{$errors['name']}</p>";
                }
                formInput(label: 'Price', type: 'text', name: 'price', required: false);
                if(isset($errors['price'])) {
                    echo "<p class='text-danger small'>{$errors['price']}</p>";
                }
                formInput(label: 'Make Year', type: 'number', name: 'makeYear', required: false);
                if(isset($errors['makeYear'])) {
                    echo "<p class='text-danger small'>{$errors['makeYear']}</p>";
                }
                formInput(label: 'Color', type: 'text', name:  'color', required: false);
                if(isset($errors['color'])) {
                    echo "<p class='text-danger small'>{$errors['color']}</p>";
                }
            ?>
            <div id="vehicleSpecificFields"></div>
            <div class="modal-footer p-0 mt-5">
                <button type="submit" class="btn btn-success w-100" style="margin-top: 20px;">Add</button>
            </div>
        </form>
    </div>
</main>

<?php require BASE_PATH . 'views/partials/footer.php'; ?>
