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
            $id = 0;
            foreach ($data as $user) {
                $id++;
            ?>
                <tr>
                    <td> <?php echo $id; ?> </td>
                    <td> <?php echo $user->name; ?> </td>
                    <td> <?php echo $user->gender; ?> </td>
                    <td> <?php echo $user->email; ?> </td>
                    <td> <?php echo $user->address; ?> </td>
                    <td> <?php echo $user->marital_status; ?> </td>
                    <td> <?php echo $user->created_at; ?> </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <a data-toggle="modal" data-target="#viewModal" data-id="<?php echo $id; ?>" data-name="<?php echo $user->name; ?>" data-gender="<?php echo $user->gender; ?>" data-email="<?php echo $user->email; ?>" data-address="<?php echo $user->address; ?>" data-married="<?php echo $user->marital_status; ?>" data-created="<?php echo $user->created_at; ?>" class="btn btn-info float-right view">View</a>
                                <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $user->id ?>" class="btn btn-primary">Edit</a>
                                <form class="pull-right" action="<?php echo URLROOT; ?>/users/delete/<?php echo $user->id; ?>" method="post">
                                    <input type="hidden" name='id' value="<?php echo $user->id; ?>">
                                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                <?php } ?>
                </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <a href="<?php echo URLROOT; ?>/users/add" class="btn btn-success">Add</a>
                </td>
                <td colspan="5" class="text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item ">
                                <a class="page-link" href="<?= URLROOT; ?>/index?page=11" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php require APPROOT . '/views/inc/modal.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.view').forEach(function(anchor) {
            anchor.addEventListener("click", function() {
                // Retrieve the data from the anchor tag
                var id = this.getAttribute("data-id");
                var name = this.getAttribute("data-name");
                var gender = this.getAttribute("data-gender");
                var email = this.getAttribute("data-email");
                var address = this.getAttribute("data-address");
                var married = this.getAttribute("data-married");
                var created = this.getAttribute("data-created");

                // Set the values of the form fields to the data from the anchor tag
                document.querySelector("#vId").innerHTML = id;
                document.querySelector("#vName").innerHTML = name;
                document.querySelector("#vGender").innerHTML = gender;
                document.querySelector("#vEmail").innerHTML = email;
                document.querySelector("#vAddress").innerHTML = address;
                document.querySelector("#vMarried").innerHTML = married;
                document.querySelector("#vCreated").innerHTML = created;
            });
        });
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>