<h3>Create an Account</h3>

<form action="" method="post">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" value="<?= $model->firstname ?>" name="firstname"  class="form-control  <?php echo $model->hasError('firstname') ? ' is-invalid': null?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control">
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Register</button>
</form>