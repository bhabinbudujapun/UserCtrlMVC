<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
$users = $data[0];
$total_page = $data[1][0];
$start_page = $data[1][1];
$current_page = $data[1][2];

if ($current_page > $total_page || $current_page < 1) {
    $current_page = $total_page;
}

if ($current_page == 1) {
    $pre = 'disabled';
} else {
    $pre = 'active';
}

if ($current_page == $total_page) {
    $next = 'disabled';
} else {
    $next = 'active';
}

?>
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
            foreach ($users as $user) {
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
                                <a data-toggle="modal" data-target="#viewModal" data-id="<?php echo $user->id; ?>" data-name="<?php echo $user->name; ?>" data-gender="<?php echo $user->gender; ?>" data-email="<?php echo $user->email; ?>" data-address="<?php echo $user->address; ?>" data-married="<?php echo $user->marital_status; ?>" data-created="<?php echo $user->created_at; ?>" class="btn btn-info float-right view">View</a>
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
                            <li class="page-item <?php echo $pre ?>">
                                <a class="page-link" href="<?= URLROOT; ?>/users?page=<?php echo $current_page - 1 ?>" tabindex="-1">Previous</a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $current_page) {
                            ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="<?= URLROOT; ?>/users?page=<?php echo $i ?>"><?php echo $i ?></a>
                                    </li>
                                <?php } else { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= URLROOT; ?>/users?page=<?php echo $i ?>"><?php echo $i ?></a>
                                    </li>
                            <?php
                                }
                            } ?>
                            <li class="page-item <?php echo $next ?>">
                                <a class="page-link" href="<?= URLROOT; ?>/users?page=<?php echo $current_page + 1 ?>">Next</a>
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