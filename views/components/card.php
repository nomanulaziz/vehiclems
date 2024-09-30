<?php

function vehicleCard($vehicle) {
    echo "
    <div class='col mb-4'>
        <div class='card' style='border-radius: 1rem; box-shadow: 8px 9px 11px 2px rgb(0 0 0 / 15%); background-color: #f8f9fa;'>
            <div class='card-body'>
                <h5 class='card-title'>{$vehicle['name']}</h5>
                <p class='card-text'>Price: {$vehicle['price']}</p>
                <p class='card-text'>Speed: {$vehicle['speed']}</p>
                <p class='card-text'>Make Year: {$vehicle['makeYear']}</p>
                <p class='card-text'>Color: {$vehicle['color']}</p>
            </div>
        </div>
    </div>";
}

?>
