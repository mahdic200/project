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

        $breakingNews = $db->select("SELECT * FROM posts WHERE breaking_news = 1 ORDER BY created_at DESC LIMIT 0,1")->fetch();
        
        $lastPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY created_at DESC LIMIT 0,6;")->fetchAll();


        $bodyBanner = $db->select("SELECT * FROM banners LIMIT 0,1")->fetch();

        $sidebarBanner = $db->select("SELECT * FROM banners LIMIT 0,1")->fetch();


        $popularPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY view DESC LIMIT 0,3;")->fetchAll();
        
        $mostCommentPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY comments_count DESC LIMIT 0,4;")->fetchAll();

        require_once BASE_PATH . "/template/app/index.php";
    }
    public function show($id)
    {
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM setting")->fetch();

        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL")->fetchAll();

        $bodyBanner = $db->select("SELECT * FROM banners LIMIT 0,1")->fetch();

        $sidebarBanner = $db->select("SELECT * FROM banners LIMIT 0,1")->fetch();

        $post = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts WHERE posts.id = ?;", [$id])->fetch();

        $relatedComments = $db->select("SELECT * FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE comments.post_id = ? ORDER BY comments.created_at DESC LIMIT 0, 4;" , [$id])->fetchAll();

        $topSelectedPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts WHERE posts.selected = 1 ORDER BY created_at DESC LIMIT 0,3;")->fetchAll();

        $mostCommentPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY comments_count DESC LIMIT 0,4;")->fetchAll();

        $popularPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY view DESC LIMIT 0,3;")->fetchAll();
        
        $date = $post['created_at'];

        $nextPost = $db->select("SELECT posts.id, posts.title, posts.created_at FROM posts WHERE created_at > ? ORDER BY created_at ASC LIMIT 0,1 ;",[$date])->fetch();

        $previousPost = $db->select("SELECT posts.id, posts.title, posts.created_at FROM posts WHERE created_at < ? ORDER BY created_at DESC LIMIT 0,1 ;",[$date])->fetch();
        
        require_once BASE_PATH . "/template/app/show.php";
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
