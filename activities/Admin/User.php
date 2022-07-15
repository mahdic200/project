<?php

namespace Admin;

use database\DataBase;

class User extends Admin
{
    public function index()
    {
        $pageTitle = "users";
        $db = new DataBase();
        $users = $db->select("SELECT * FROM " . DB_NAME . ".users ORDER BY `id` DESC");
        require_once BASE_PATH . "/template/admin/users/index.php";
    }

    public function edit($id)
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM " . DB_NAME . "  .users WHERE id = ?;", [$id])->fetch();
        require_once BASE_PATH . "/template/admin/users/edit.php";
    }

    public function update($request, $id)
    {
        $db = new DataBase();
        $db->update("users", $id, ["username", "permission"], [$request["username"], $request["permission"]]);
        $this->redirect("admin/users");
    }

    public function permission($id)
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM " . DB_NAME . "  .users WHERE id = ?;", [$id])->fetch();
        if (empty($user)) {
            $this->redirect("admin/users");
        }
        $permission = ($user["permission"] == "admin") ? "user" : "admin";
        $db->update("users", $id, ["permission"], [$permission]);
        $this->redirect("admin/users");
    }

    public function delete($id) {
        $db = new DataBase();
        $db->delete("users", $id);
        $this->redirect("admin/users");
    }
}
