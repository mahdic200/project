<?php

namespace Admin;

use Auth\Auth;

class Admin
{
    public $currentDomain;
    public $basePath;
    protected $dbname = DB_NAME;

    public function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
        $this->currentDomain = CURRENT_DOMAIN;
        $this->basePath = BASE_PATH;
    }
    protected function redirect($url)
    {
        header("Location: " . trim($this->currentDomain, "/ ") . "/" . trim($url, "/ "));
        exit;
    }
    protected function redirectBack()
    {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
    protected function saveImage($image, $imagePath, $imageName = null)
    {

        if ($imageName) {
            $extension = explode("/", $image["type"])[1];
            $imageName = $imageName . "." . $extension;
        } else {
            $extension = explode("/", $image["type"])[1];
            $imageName = date("Y-m-d-H-i-s") . "." . $extension;
        }

        $imageTemp = $image["tmp_name"];
        $imagePath = "public/" . $imagePath . "/";
        if (is_uploaded_file($imageTemp)) {

            if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                return $imagePath . $imageName;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    protected function removeImage($path)
    {
        $path = trim($path, "/ ");
        if (file_exists($path)) {
            unlink($path);
            if (file_exists($path)) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    protected function confirmCRUD($message = ['crud' => 'update/delete', 'table' => 'name', 'id' => 'id', 'address' => 'admin/posts'])
    {
        if (isset($request) && array_keys($request)[0] == "confirmCRUD")
        {
            $request = flash('confirmCRUD');
            if ($request != 'true') 
            {
                // $this->redirect($message['address']);
                $this->redirectBack();
                return false;
            } else {
                return true;
            }
            
        }
        else
        {
            require_once BASE_PATH . "/template/admin/confirmCRUD/confirmCRUD.php";
        }
    }
}
