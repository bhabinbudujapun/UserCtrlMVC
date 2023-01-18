<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <h2 class="card-text">Edit User</h2>
                <!-- <p class="card-text">Please Fill up the form</p> -->
            </div>

            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/users/edit/<?php echo $data->id ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $data->name; ?>" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $data->email; ?>" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="<?php echo $data->address; ?>" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <p>Gender</p>
                        <?php if ($data->gender == "Male") { ?>
                            <input type="radio" id="Male" name="gender" value="Male" checked>
                            <label for="Male">Male</label><br>
                            <input type="radio" id="Female" name="gender" value="Female">
                            <label for="Female">Female</label>
                        <?php } else { ?>
                            <input type="radio" id="Male" name="gender" value="Male">
                            <label for="Male">Male</label><br>
                            <input type="radio" id="Female" name="gender" value="Female" checked>
                            <label for="Female">Female</label>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <p>Married</p>
                        <?php if ($data->marital_status == "Yes") { ?>
                            <input type="radio" id="Yes" name="married" value="Yes" checked>
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="married" value="No">
                            <label for="No">No</label>
                        <?php } else { ?>
                            <input type="radio" id="Yes" name="married" value="Yes">
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="married" value="No" checked>
                            <label for="No">No</label>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name='id' value="<?php $data->id; ?>">
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