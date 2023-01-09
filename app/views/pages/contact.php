<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-5"><?php echo $data['title'] ?></h1>
        <p class="lead"><?php echo $data['description'] ?></p>
        <p class="lead"><?php echo $data['info'] ?></p>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>