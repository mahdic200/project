<?php

namespace Admin;

use database\DataBase;

// date_default_timezone_set("Iran);

class Post extends Admin
{
    public function index()
    {
        $dbname = DB_NAME;
        $db = new DataBase();
        $posts = $db->select("SELECT posts.*, users.username as username, categories.name as cat_name FROM ($dbname.posts LEFT JOIN $dbname.users ON posts.user_id = users.id) LEFT JOIN $dbname.categories ON $dbname.posts.cat_id = $dbname.categories.id ORDER BY posts.id DESC");
        require_once BASE_PATH . "/template/admin/posts/index.php";
    }
    public function create()
    {
        $db = new DataBase();
        $categories = $db->select("SELECT * FROM categories");
        require_once BASE_PATH . "/template/admin/posts/create.php";
    }
    public function store($request)
    {
        $realTimestampt = substr($request["published_at"], 0, 10);
        $request["published_at"] = date("Y-m-d H:i:s", (int)$realTimestampt);
        $db = new DataBase();
        if ($request["cat_id"] != null) {
            $request["image"] = $this->saveImage($request["image"], "post-image");
            if ($request["image"]) {
                $request = array_merge($request, ["user_id" => 1]);
                $db->insert("posts", array_keys($request), $request);
                $this->redirect("admin/posts");
            } else {
                $this->redirect("admin/posts");
            }
        } else {
            $this->redirect("admin/posts");
        }
    }

    public function edit($id)
    {
        $db = new DataBase();
        $post = $db->select("SELECT * FROM " . DB_NAME . "  .posts WHERE id = ?;", [$id])->fetch();
        $categories = $db->select("SELECT * FROM " . DB_NAME . "  .categories;");
        require_once BASE_PATH . "/template/admin/posts/edit.php";
    }
    public function update($request, $id)
    {
        $realTimestampt = substr($request["published_at"], 0, 10);
        $request["published_at"] = date("Y-m-d H:i:s", (int)$realTimestampt);
        $db = new DataBase();
        if ($request["cat_id"] != null) {

            if ($request["image"]["tmp_name"] != null) {
                $post = $db->select("SELECT * FROM posts WHERE id = ?;", [$id])->fetch();
                $this->removeImage($post["image"]);
                $request["image"] = $this->saveImage($request["image"], "post-image");
            } else {
                unset($request["image"]);
            }

            $request = array_merge($request, ["user_id" => 1]);
            $db->update("posts", $id, array_keys($request), $request);
            $this->redirect("admin/posts");
        } else {
            $this->redirect("admin/posts");
        }
    }
    public function delete($id)
    {
        $db = new DataBase();
        $post = $db->select("SELECT * FROM " . DB_NAME . "  .posts WHERE id = ?;", [$id])->fetch();
        $imageDelete = $this->removeImage($post["image"]);
        if ($imageDelete) {
            $db->delete("posts", $id);
            $this->redirect("admin/posts");
        }
    }

    public function selected($id)
    {
        $db = new DataBase();
        $post = $db->select("SELECT * FROM " . DB_NAME . "  .posts WHERE id = ?;", [$id])->fetch();
        if (empty($post)) {
            $this->redirectBack();
        }
        // if ($post["selected"] == "1") {
        //     $db->update("posts", $id, ["selected"], ["0"]);
        // } else {
        //     $db->update("posts", $id, ["selected"], ["1"]);
        // }
        $selectedStatus = ($post["selected"] == "1") ? "2" : "1";
        $db->update("posts", $id, ["selected"], [$selectedStatus]);
        $this->redirectBack();
    }

    public function breakingNews($id)
    {
        $db = new DataBase();
        $post = $db->select("SELECT * FROM " . DB_NAME . "  .posts WHERE id = ?;", [$id])->fetch();
        // dd($post);
        if (empty($post)) {
            $this->redirectBack();
        }
        $breakStatus = ($post["breaking_news"] == "1") ? "2" : "1";
        $db->update("posts", $id, ["breaking_news"], [$breakStatus]);
        $this->redirectBack();
    }
}
