<?php

namespace Admin;

use database\DataBase;

class Category extends Admin
{
    public function index()
    {
        $pageTitle = "categories";
        $db = new DataBase();
        $categories = $db->select("SELECT * FROM categories ORDER BY id DESC")->fetchAll();
        // dd($categories);
        require_once BASE_PATH . "/template/admin/categories/index.php";
    }
    public function create()
    {
        require_once BASE_PATH . "/template/admin/categories/create.php";
    }
    public function store($request)
    {
        $db = new DataBase();
        $db->insert("categories", array_keys($request), $request);
        $this->redirect("/admin/category");
    }

    public function edit($id)
    {
        $db = new DataBase();
        $category = $db->select("SELECT * FROM " . DB_NAME . "  .`categories` WHERE id = ?;", [$id])->fetch();
        require_once BASE_PATH . "/template/admin/categories/edit.php";
    }
    public function update($request, $id)
    {
        $db = new DataBase();
        $db->update("categories", $id, array_keys($request), $request);
        $this->redirect("admin/category");
    }
    public function delete($id)
    {
        $db = new DataBase();
        $db->delete("categories", $id);
        $this->redirect("admin/category");
    }
}
