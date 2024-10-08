<?php

function vehicleCard($vehicle) {
    echo "
    <div class='col mb-4'>
        <div class='card' style='border-radius: 1rem; box-shadow: 8px 9px 11px 2px rgb(0 0 0 / 15%); background-color: #f8f9fa;'>
            <div class='card-body'>
                <h5 class='card-title'>{$vehicle['name']}</h5>
                <p class='card-text'>Price: {$vehicle['price']}</p>
                <p class='card-text'>Make Year: {$vehicle['make_year']}</p>
                <p class='card-text'>Color: {$vehicle['color']}</p>
                <div class='float-end d-flex gap-x-2 rounded-3'>
                    <a href='/vehicle/edit?id={$vehicle['id']}' class='btn btn-sm btn-outline-primary'>Edit</a>
                    <form action='/vehicle' method='POST' class='float-start d-inline-block'>
                        <input type='hidden' name='_method' value='DELETE' >
                        <input type='hidden' name='id' value='{$vehicle['id']}'>
                        <button class='btn btn-sm btn-outline-danger px-3'>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}

?>
