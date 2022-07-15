<?php

namespace Admin;

use database\DataBase;

class Comment extends Admin
{
    public function index()
    {
        $pageTitle = "comments";
        $dbname = DB_NAME;
        $db = new DataBase();
        $comments = $db->select("SELECT comments.*, users.username as username, posts.title as post_title FROM $dbname.comments LEFT JOIN $dbname.users ON $dbname.comments.user_id = $dbname.users.id LEFT JOIN $dbname.posts ON $dbname.comments.post_id = $dbname.posts.id ORDER BY $dbname.comments.id DESC;");
        $unseenComments = $db->select("SELECT * FROM $dbname.comments WHERE `status` = \"unseen\"");
        foreach ($unseenComments as $comment) {
            $db->update("comments", $comment["id"], ["status"], ["seen"]);
        }
        require_once BASE_PATH . "/template/admin/comments/index.php";
    }
    public function changeStatus($id)
    {
        $db = new DataBase();
        $comment = $db->select("SELECT * FROM comments WHERE `id` = ?", [$id])->fetch();
        $newStatus = ($comment["status"] == "approved") ? "seen" : "approved";
        $result = $db->update("comments", $id, ["status"], [$newStatus]);
        if ($result) {
            $this->redirectBack("admin/comments");
        } else {
            echo "failed: could not update comment with id = \"{$comment["id"]}\" table `comments` !";
        }
    }
    
    public function showComment($id) {
        $dbname = DB_NAME;
        $db = new DataBase();
        $comment = $db->select("SELECT comments.*, users.username as username, posts.title as post_title, posts.id as post_id FROM $dbname.comments LEFT JOIN $dbname.users ON $dbname.comments.user_id = $dbname.users.id LEFT JOIN $dbname.posts ON $dbname.comments.post_id = $dbname.posts.id WHERE comments.id = ?;", [$id])->fetch();
        require_once BASE_PATH . "/template/admin/comments/show.php";
    }
}
