<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container d-flex justify-content-center">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Married</th>
                <th scope="col">created_at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $user) {
            ?>
                <tr>
                    <td> <?php echo $user->id; ?> </td>
                    <td> <?php echo $user->name; ?> </td>
                    <td> <?php echo $user->gender; ?> </td>
                    <td> <?php echo $user->email; ?> </td>
                    <td> <?php echo $user->address; ?> </td>
                    <td> <?php echo $user->marital_status; ?> </td>
                    <td> <?php echo $user->created_at; ?> </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <!-- <div class="col-md-12"> -->
                                <a href="<?php echo URLROOT; ?>/users/show" class="btn btn-info float-right">view</a>
                                <a href="<?php echo URLROOT; ?>/users/edit" class="btn btn-primary float-right">Edit</a>
                                <a href="<?php echo URLROOT; ?>/users/delete" class="btn btn-danger float-right">Delete</a>
                                <!-- </div> -->
                            </div>
                        </div>
                    </td>
                <?php } ?>
                </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="1">
                    <a href="<?php echo URLROOT; ?>/users/add" class="btn btn-success">Add</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>