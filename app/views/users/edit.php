<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <h2 class="card-text">Edit User</h2>
                <!-- <p class="card-text">Please Fill up the form</p> -->
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo URLROOT; ?>/users/edit">
                    <div class="form-group">
                        <label for="name">Name<sub>*</sub></label>
                        <input type="text" name="name" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<sub>*</sub></label>
                        <input type="email" name="email" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address<sub>*</sub></label>
                        <input type="text" name="address" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <p>Gender<sub>*</sub></p>
                        <input type="radio" id="Male" name="gender" value='Male' checked>
                        <label for="Male">Male</label><br>
                        <input type="radio" id="Female" name="gender" value="Female">
                        <label for="Female">Female</label>
                    </div>
                    <div class="form-group">
                        <p>Married<sub>*</sub></p>
                        <input type="radio" id="Yes" name="married" value="Yes" checked>
                        <label for="Yes">Yes</label><br>
                        <input type="radio" id="No" name="married" value="No">
                        <label for="No">No</label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-success btn-block pull-left" value="Update">
                            </div>
                            <div class="col">
                                <a href="<?php echo URLROOT; ?>/users/index" class="btn btn-light btn-block pull-right">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>