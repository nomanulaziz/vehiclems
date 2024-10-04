<?php

function formDropdown($label, $name, $options, $selected = '') {
    echo "
    <div class='mb-3'>
        <label for='$name' class='form-label'>$label</label>
        <select class='form-select text-muted' id='$name' name='$name'>";
        foreach ($options as $value => $option) {
            $isSelected = $value === $selected ? 'selected' : '';
            echo "<option class='text-muted' value='$value' $isSelected>$option</option>";
        }
    echo "</select></div>";
}

?>
