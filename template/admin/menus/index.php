<?php

require_once BASE_PATH . "/template/admin/layouts/header.php";

?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Menus</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= url("admin/menus/create") ?>" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<section class="table-responsive">
    <?php if ($menus->rowCount() != 0) { ?>
        <table class="table table-striped table-sm">
            <caption>List of menus</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>url</th>
                    <th>parent ID</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu) { ?>
                    <tr>
                        <td>
                            <?= $menu["id"] ?>
                        </td>
                        <td>
                            <?= $menu["name"] ?>
                        </td>
                        <td>
                            <?= $menu["url"] ?>
                        </td>
                        <td>
                            <?php
                            // if ($menu["parent_id"] != null) {
                            // $parent_menu = $db->select("SELECT * FROM $this->dbname.menus WHERE id = ?;", [$menu["parent_id"]])->fetch();
                            // }
                            ?>
                            <?= $menu["parent_id"] == null ? "منوی اصلی" : $menu["parent_name"] ?>
                        </td>
                        <td>
                            <a role="button" class="btn btn-sm btn-primary text-white" href="<?= url("admin/menus/edit/" . $menu["id"]) ?>">
                                edit
                            </a>
                            <a role="button" class="btn btn-sm btn-danger text-white" href="<?= url("admin/menus/delete/" . $menu["id"]) ?>">delete</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    <?php } else { ?>
        <center>
            <h1>
                no item found !
            </h1>
            <h6>
                check your DataBase or make an item
            </h6>
        </center>
    <?php } ?>
</section>




<?php

require_once BASE_PATH . "/template/admin/layouts/footer.php";


?>