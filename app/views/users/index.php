<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container d-flex justify-content-center">
    <table class="table">
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
            for ($i = 1; $i < 3; $i++) {
            ?>
                <tr>
                    <td> <?php echo $i; ?> </td>
                    <td> admin </td>
                    <td> Male </td>
                    <td> admin@gmail.com </td>
                    <td> Kathmandu </td>
                    <td> Yes </td>
                    <td> 2023-01-10 12:05:59 </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <!-- <div class="col-md-12"> -->
                                <a href="#" class="btn btn-info float-right">view</a>
                                <a href="#" class="btn btn-primary float-right">Edit</a>
                                <a href="#" class="btn btn-danger float-right">Delete</a>
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
                    <a href="#" class="btn btn-success">Add</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>