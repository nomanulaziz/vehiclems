<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<main>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 p-5 bg-dark text-white rounded">
    
                <h2 class="text-center mb-4">Sign Up</h2>
                
                <form action="/signup" method="POST">
                    <?php
                    formInput(label: 'Full Name', type: 'text', name: 'name', required: false);
                    if(isset($errors['name'])) {
                        echo "<p class='text-danger small'>{$errors['name']}</p>";
                    }

                    formInput(label: 'Email address', type: 'email', name: 'email', required: false);
                    if(isset($errors['email'])) {
                        echo "<p class='text-danger small'>{$errors['email']}</p>";
                    }

                    formInput(label: 'Password', type: 'password', name: 'password', required: false);
                    if(isset($errors['password'])) {
                        echo "<p class='text-danger small'>{$errors['password']}</p>";
                    }

                    formInput(label: 'Confirm Password', type: 'password', name: 'confirm_password', required: false);
                    if(isset($errors['confirm_password'])) {
                        echo "<p class='text-danger small'>{$errors['confirm_password']}</p>";
                    }
                    if(isset($errors['user_exists'])) {
                        echo "<p class='text-danger small'>{$errors['user_exists']}</p>";
                    }
                    ?>
                    
    
                <div class="mt-5">
                    <button type="submit" class="btn bg-success text-white w-100">
                        Sign Up
                    </button>
                </div>
                </form>
    
                <div class="text-center mt-3">
                    <p> <span class="text-secondary">Already have an account? </span> <a href="/login" class="text-light">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>