<?php

view('auth/login.view.php', [
    'errors' => $_SESSION['_flash']['errors'] ?? []
]);