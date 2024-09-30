<?php
// Include components
include 'components/form-input.php';
include 'components/form-dropdown.php';
include 'components/card.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Vehicle Management System</title>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="../assets/vms_logo.png" class="bi me-2" width="40" height="40">
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>
            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </header>

        <!-- Add New Vehicle Button -->
        <div class="text-center">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addVehicleModal">Add New Vehicle</button>
        </div>

        <p>scnjscnji</p>

        <!-- Modal for Adding Vehicle -->
        <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addVehicleModalLabel">Add New Vehicle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="vehicleForm" action="/vehicles/add" method="POST">
                            <?php
                                formDropdown('Select Vehicle Type', 'vehicleType', [
                                    'car' => 'Car',
                                    'boat' => 'Boat',
                                    'plane' => 'Plane'
                                ], 'car');
                                
                                formInput('Vehicle Name', 'text', 'name');
                                formInput('Price', 'number', 'price');
                                formInput('Speed', 'number', 'speed');
                                formInput('Make Year', 'number', 'makeYear');
                                formInput('Color', 'text', 'color');
                            ?>

                            <!-- Dynamic Fields based on Vehicle Type -->
                            <div id="vehicleSpecificFields"></div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Vehicles -->
        <div class="container mt-5">
            <h3>Cars</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php
                // Sample data, replace this with actual data from the database
                $cars = [
                    ['name' => 'Tesla Model S', 'price' => '80000', 'speed' => '250', 'makeYear' => '2020', 'color' => 'Red'],
                    ['name' => 'BMW i8', 'price' => '150000', 'speed' => '230', 'makeYear' => '2019', 'color' => 'White']
                ];
                foreach ($cars as $car) {
                    vehicleCard($car);
                }
                ?>
            </div>

            <h3>Boats</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php
                // Sample data for boats
                $boats = [
                    ['name' => 'Yacht X', 'price' => '500000', 'speed' => '60', 'makeYear' => '2018', 'color' => 'Blue']
                ];
                foreach ($boats as $boat) {
                    vehicleCard($boat);
                }
                ?>
            </div>

            <h3>Planes</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php
                    // Sample data for planes
                    $planes = [
                        ['name' => 'Boeing 737', 'price' => '8000000', 'speed' => '850', 'makeYear' => '2015', 'color' => 'White'],
                        ['name' => 'Cessna 172', 'price' => '300000', 'speed' => '226', 'makeYear' => '2017', 'color' => 'Silver']
                    ];
                    foreach ($planes as $plane) {
                        vehicleCard($plane);
                    }
                ?>
            </div>
        </div>

    </div>

    <!-- JavaScript to handle dynamic form -->
    <script>
        const vehicleTypeSelect = document.getElementById('vehicleType');
        const vehicleSpecificFields = document.getElementById('vehicleSpecificFields');

        function updateVehicleForm(type) {
            let html = '';

            if (type === 'car') {
                html = `
                    <div class="mb-3">
                        <label for="doors" class="form-label">Number of Doors</label>
                        <input type="number" class="form-control" id="doors" name="doors">
                    </div>
                    <div class="mb-3">
                        <label for="fuelType" class="form-label">Fuel Type</label>
                        <input type="text" class="form-control" id="fuelType" name="fuelType">
                    </div>
                `;
            } else if (type === 'boat') {
                html = `
                    <div class="mb-3">
                        <label for="hullType" class="form-label">Hull Type</label>
                        <input type="text" class="form-control" id="hullType" name="hullType">
                    </div>
                    <div class="mb-3">
                        <label for="engineType" class="form-label">Engine Type</label>
                        <input type="text" class="form-control" id="engineType" name="engineType">
                    </div>
                `;
            } else if (type === 'plane') {
                html = `
                    <div class="mb-3">
                        <label for="wingSpan" class="form-label">Wing Span</label>
                        <input type="number" class="form-control" id="wingSpan" name="wingSpan">
                    </div>
                    <div class="mb-3">
                        <label for="engineCount" class="form-label">Engine Count</label>
                        <input type="number" class="form-control" id="engineCount" name="engineCount">
                    </div>
                `;
            }

            vehicleSpecificFields.innerHTML = html;
        }

        // Initial setup
        updateVehicleForm(vehicleTypeSelect.value);

        // Update form dynamically based on vehicle type selection
        vehicleTypeSelect.addEventListener('change', function () {
            updateVehicleForm(this.value);
        });
    </script>

    <!-- Bootstrap JavaScript Bundle (for modal functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
