<?php view('partials/head.php'); ?>
        <?php view('partials/nav.php'); ?>

        <!-- Add New Vehicle Button -->
        <!-- <div class="text-center">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addVehicleModal">Add New Vehicle</button>
        </div> -->

        <!-- Modal for Adding Vehicle -->
        <!-- <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addVehicleModalLabel">Add New Vehicle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="vehicleForm" action="/vehicles/add" method="POST">
                            <div id="vehicleSpecificFields"></div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Display Vehicles -->
        <div class="container mt-5">
            <h3>Cars</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php
                // Sample data, replace this with actual data from the database
                $cars = [
                    ['id' => '1', 'name' => 'Tesla Model S', 'price' => '80000', 'speed' => '250', 'make_year' => '2020', 'color' => 'Red'],
                    ['id' => '2', 'name' => 'BMW i8', 'price' => '150000', 'speed' => '230', 'make_year' => '2019', 'color' => 'White']
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
                    ['id' => '3', 'name' => 'Yacht X', 'price' => '500000', 'speed' => '60', 'make_year' => '2018', 'color' => 'Blue']
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
                        ['id' => '4', 'name' => 'Boeing 737', 'price' => '8000000', 'speed' => '850', 'make_year' => '2015', 'color' => 'White'],
                        ['id' => '5', 'name' => 'Cessna 172', 'price' => '300000', 'speed' => '226', 'make_year' => '2017', 'color' => 'Silver']
                    ];
                    foreach ($planes as $plane) {
                        vehicleCard($plane);
                    }
                ?>
            </div>
        </div>
<?php view('partials/footer.php'); ?>
