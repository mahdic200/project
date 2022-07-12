<?php

namespace App;

use database\DataBase;

class Home
{
    public function index()
    {
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM setting")->fetch();
        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL")->fetchAll();
        $topSelectedPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts WHERE posts.selected = 1 ORDER BY created_at DESC LIMIT 0,3;")->fetchAll();

        require_once BASE_PATH . "/template/app/index.php";
    }
    public function show($id)
    {

    }
    public function category($id)
    {

    }
    public function commentStore($request)
    {

    }
    protected function redirectBack()
    {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
