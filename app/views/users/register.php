<?php require APPROOT . '/views/inc/header.php';  ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create An Account</h2>
                <p>Please fill out this form to register with us</p>
                <form method="POST" action="<?php echo URLROOT; ?>/users/register">
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input name="name" type="text" value="<?php echo $data['name']; ?>" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is_invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input name="email" type="email" value="<?php echo $data['email']; ?>" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is_invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input name="password" type="password" value="<?php echo $data['password']; ?>" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is_invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                        <input name="confirm_password" type="password" value="<?php echo $data['name']; ?>" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is_invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/>users/login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
