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
            <form action="<?= $message['address'] ?>" method="POST">
            <input type="hidden" name="confirmCRUD" value="true">
                <button class="btn danger-color mr-5 h1 text-hov-white">yes</button>
            </form>
            <!-- <form action="" method="POST">
            <input type="hidden" name="confirmCRUD" value="false">
                <button class="h1 btn info-color text-hov-white">no</button>
            </form> -->
                <button onclick="history.back()" class="h1 btn info-color text-hov-white">no</button>
        </div>
    </div>
</center>


<?php
require_once BASE_PATH . "/template/admin/layouts/footer.php";
?>