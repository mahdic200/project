<?php

namespace Admin;

use database\DataBase;

class Menu extends Admin
{
    public function index()
    {
        $pageTitle = "menus";
        $db = new DataBase();
        // $menus = $db->select("SELECT * FROM menus ORDER BY id DESC;");
        $menus = $db->select("SELECT m.*, s.name as parent_name FROM menus m LEFT JOIN menus s ON m.parent_id = s.id;");
        require_once BASE_PATH . "/template/admin/menus/index.php";
    }
    public function create()
    {
        $db = new DataBase();
        $menus = $db->select("SELECT * FROM $this->dbname.menus WHERE `parent_id` IS NULL ORDER BY `id` DESC;");
        require_once BASE_PATH . "/template/admin/menus/create.php";
    }
    public function store($request)
    {
        $db = new DataBase();
        $result = $db->insert("menus", array_keys(array_filter($request)), array_filter($request));
        $this->redirect("/admin/menus");
    }

    public function edit($id)
    {
        $db = new DataBase();
        $menu = $db->select("SELECT * FROM $this->dbname.menus WHERE id = ?;", [$id])->fetch();
        $menus = $db->select("SELECT * FROM $this->dbname.menus WHERE parent_id IS NULL ORDER BY `id` DESC;");
        require_once BASE_PATH . "/template/admin/menus/edit.php";
    }
    public function update($request, $id)
    {
        $db = new DataBase();
        $db->update("menus", $id, array_keys($request), $request);
        $this->redirect("admin/menus");
    }
    public function delete($id)
    {
        $db = new DataBase();
        $result = $db->delete("menus", $id);
        if ($result) {
        $this->redirect("admin/menus");
        }
        else {
            echo $result;
        }
    }
}
