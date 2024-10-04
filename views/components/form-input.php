<?php

function formInput($label, $type, $name, $required = true) {
    $requiredAttr = $required ? 'required' : '';
    $value = $_POST[$name] ?? ''; // if exists and not null store in value

    echo "
    <div class='mb-1'>
        <label for='$name' class='form-label'>$label</label>
        <input type='$type' class='form-control text-muted' id='$name' name='$name' value='$value' $requiredAttr>
    </div>";
}

?>
