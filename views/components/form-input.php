<?php

function formInput($label, $type, $name, $value = '', $required = true) {
    $requiredAttr = $required ? 'required' : '';

    echo "
    <div class='mb-1'>
        <label for='$name' class='form-label'>$label</label>
        <input type='$type' class='form-control text-muted' id='$name' name='$name' value='$value' $requiredAttr>
    </div>";
}

?>
