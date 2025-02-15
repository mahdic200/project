<?php
require_once BASE_PATH . "/template/admin/layouts/header.php";
?>

<center>
    <div class="container mt-5">
        <h1>
            are you sure you want to
            <span class="text-danger">
                <?= $message['crud'] ?>
            </span>
            this
            <span class="text-info">
                <?= trim($message['table'], 's') ?>
            </span>
            ?
        </h1>
        <div class="container text-white mt-5 d-inline-flex justify-content-center">
            <form action="<?= url($message['address']) ?>" method="POST">
            <input type="hidden" name="id" value="<?= $message['id'] ?>">
                <button type="submit" class="btn danger-color mr-5 h1 text-hov-white">yes</button>
            </form>
            <!-- <form action="" method="POST">
            <input type="hidden" name="confirmCRUD" value="false">
                <button class="h1 btn info-color text-hov-white">no</button>
            </form> -->
                <a href="<?= url('admin/' . $message['table']) ?>" class="h1 btn info-color text-hov-white">no</a>
        </div>
    </div>
</center>


<?php
require_once BASE_PATH . "/template/admin/layouts/footer.php";
?>