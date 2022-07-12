<?php

namespace Admin;

use database\DataBase;

class Dashboard extends Admin
{
    public function index()
    {
        $db = new DataBase();
        $categoryCount = $db->select("SELECT COUNT(*) FROM `categories`")->fetch();
        $allusersCount = $db->select("SELECT COUNT(*) FROM `users`")->fetch();
        $userCount = $db->select("SELECT COUNT(*) FROM `users` WHERE permission = 'user'")->fetch();
        $adminCount = $db->select("SELECT COUNT(*) FROM `users` WHERE permission = 'admin'")->fetch();
        $postCount = $db->select("SELECT COUNT(*) FROM `posts`")->fetch();
        $postsViews = $db->select("SELECT SUM(view) FROM `posts`")->fetch();
        $commentCount = $db->select("SELECT COUNT(*) FROM `comments`")->fetch();
        $unseenComments = $db->select("SELECT COUNT(*) FROM `comments` WHERE status = 'unseen'")->fetch();
        $approvedComments = $db->select("SELECT COUNT(*) FROM `comments` WHERE status = 'approved'")->fetch();

        $mostViewedPosts = $db->select("SELECT * FROM `posts` ORDER BY view DESC LIMIT 0,5")->fetchAll();
        $mostCommentedPosts = $db->select("SELECT * , comments.post_id , COUNT(comments.post_id) as comments_number FROM comments LEFT JOIN posts ON comments.post_id = posts.id GROUP BY comments.post_id ORDER BY comments_number DESC LIMIT 0,5;")->fetchAll();

        $recentComments = $db->select("SELECT comments.id as id, users.username as username, comments.comment as comment, comments.status as 'status' FROM comments LEFT JOIN users ON comments.user_id = users.id ORDER BY comments.id DESC LIMIT 0,5")->fetchAll();

        require_once BASE_PATH . "/template/admin/dashboard/index.php";
    }
}
