<?php
include_once 'components/form-input.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login'; // Default to 'login'
print_r($action);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo ucfirst($action); ?> | Vehicle Management System</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4"><?php echo ucfirst($action); ?> to Vehicle Management System</h2>

        <form action="/auth/<?php echo $action; ?>" method="POST">
            <!-- Additional Fields for Sign-up -->
            <?php if ($action === 'signup'): ?>
                <?php formInput(label: 'Full Name', type: 'text', name: 'full_name'); ?>
                <!-- <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div> -->
            <?php endif; ?>
            <!-- Common Input Fields -->
            <?php
                formInput(label: 'Email address', type: 'email', name: 'email');
                formInput(label: 'Password', type: 'password', name: 'password');
            ?>
            <!-- <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div> -->

            <!-- Additional Fields for Sign-up -->
            <?php if ($action === 'signup'): ?>
                <?php formInput(label: 'Confirm Password', type: 'password', name: 'confirm_password'); ?>
                <!-- <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div> -->
            <?php endif; ?>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <?php echo ucfirst($action); ?>
                </button>
            </div>
        </form>

        <!-- Toggle between forms -->
        <div class="text-center mt-3">
            <?php if ($action === 'login'): ?>
                <p>Don't have an account? <a href="/vehiclems/signup">Sign-up here</a></p>
            <?php else: ?>
                <p>Already have an account? <a href="/vehiclems//login">Login here</a></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
