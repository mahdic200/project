<?php

require_once BASE_PATH ."/template/admin/layouts/header.php";

?>



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-image"></i> Banner</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= url("admin/banners/create"); ?>" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<div class="table-responsive">
    <?php if ($banners->rowCount() != 0) { ?>
    <table class="table table-striped table-sm">
        <caption>List of banners</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>url</th>
                <th>image</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($banners as $banner) { ?>
                
            <tr>
                <td>
                    <?= $banner["id"] ?>
                </td>
                <td>

                <?= $banner["url"] ?>
                    
                </td>
                <td>
                    <img style="width: 80px;" src="<?= asset($banner["image"]) ?>" alt="">
                </td>
                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url("admin/banners/edit/". $banner["id"]) ?>">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url("admin/banners/delete/" . $banner["id"]) ?>">
                        delete
                    </a>
                </td>
            </tr>
            <?php } ?>

        </tbody>

    </table>

    <?php } else { ?>
        <center>
            <h1>
                no banner found !
            </h1>
            <h6>
                check your DataBase or make a banner
            </h6>
        </center>
    <?php }  ?>

</div>




<?php

require_once BASE_PATH ."/template/admin/layouts/footer.php";


?>