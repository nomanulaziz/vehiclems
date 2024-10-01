<?php
include_once '../components/form-input.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 p-5 bg-success text-white rounded">
    
                <h2 class="text-center mb-4">Sign Up</h2>
                
                <form action="/auth/signup" method="POST">
                    <?php
                    formInput(label: 'Full Name', type: 'text', name: 'full_name');
                    formInput(label: 'Email address', type: 'email', name: 'email');
                    formInput(label: 'Password', type: 'password', name: 'password');
                    formInput(label: 'Confirm Password', type: 'password', name: 'confirm_password');
                    ?>
    
                <div class="d-grid gap-2">
                    <button type="submit" class="btn bg-dark text-white">
                        Sign Up
                    </button>
                </div>
                </form>
    
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="/vehiclems//login" class="text-dark">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
