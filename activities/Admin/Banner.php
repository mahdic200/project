<?php

namespace Admin;

use database\DataBase;

class Banner extends Admin
{
    public function index()
    {
        $dbname = DB_NAME;
        $db = new DataBase();
        $banners = $db->select("SELECT * FROM $dbname.banners");
        require_once BASE_PATH . "/template/admin/banners/index.php";
    }

    public function create()
    {
        $db = new DataBase();
        require_once BASE_PATH . "/template/admin/banners/create.php";
    }

    public function store($request)
    {
        $db = new DataBase();
        $request["image"] = $this->saveImage($request["image"], "banner-image");
        if (isset($request["image"]) && $request["image"]) {
            $db->insert("banners", array_keys($request), $request);
            $this->redirect("/admin/banners");
        } else {
            $this->redirect("/admin/banners");
        }
    }

    public function edit($id)
    {
        $db = new DataBase();
        $banner = $db->select("SELECT * FROM " . DB_NAME . "  .banners WHERE id = ?;", [$id])->fetch();
        require_once BASE_PATH . "/template/admin/banners/edit.php";
    }

    public function update($request, $id)
    {
        $db = new DataBase();
        if ($request["image"]["tmp_name"] != null) {
            $post = $db->select("SELECT * FROM " . DB_NAME . "  .banners WHERE id = ?;", [$id])->fetch();
            $this->removeImage($post["image"]);
            $request["image"] = $this->saveImage($request["image"], "banner-image");
        } else {
            unset($request["image"]);
        }
        $db->update("banners", $id, array_keys($request), $request);
        $this->redirect("admin/banners");
    }

    public function delete($id)
    {
        $db = new DataBase();
        $banner = $db->select("SELECT * FROM " . DB_NAME . "  .banners WHERE id = ?;", [$id])->fetch();
        $imageDelete = $this->removeImage($banner["image"]);
        if ($imageDelete) {
            $db->delete("banners", $id);
            $this->redirect("admin/banners");
        }
    }
}
