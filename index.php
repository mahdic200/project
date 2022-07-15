<?php
session_start();


use database\CreateDB;
use database\DataBase;
use Admin\Category;
use Auth\Auth;
use App\Home;

//session start


//confing
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain() . '/project/');
define('DISPLAY_ERROR', true);
define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

// mail
define("MAIL_HOST", "smtp.gmail.com");
define("SMTP_AUTH", true);
define("MAIL_USERNAME", "phpprojectmailer@gmail.com");
// define("MAIL_PASSWORD", "phpmailer1400"); //sthzuaoeeapxspps
define("MAIL_PASSWORD", "sthzuaoeeapxspps");
define("MAIL_PORT", 587);
define("SENDER_MAIL", MAIL_USERNAME);
define("SENDER_NAME", "دوره آنلاین پی اچ پی جامع");

require_once "./database/DataBase.php";
require_once "./database/CreateDB.php";
require_once "./activities/Admin/Admin.php";
require_once "./activities/Admin/Dashboard.php";
require_once "./activities/Admin/Category.php";
require_once "./activities/Admin/Post.php";
require_once "./activities/Admin/Banner.php";
require_once "./activities/Admin/User.php";
require_once "./activities/Admin/Comment.php";
require_once "./activities/Admin/Menu.php";
require_once "./activities/Admin/Websetting.php";

// home
require_once "./activities/App/Home.php";


// Auth

require_once "./activities/Auth/Auth.php";






// $db = new database\DataBase();
// $db = new CreateDB();
// $db->run();


spl_autoload_register(function($className) {
    $path = BASE_PATH . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR;
    $className = str_replace( "\\",DIRECTORY_SEPARATOR ,$className);
    if (file_exists($path . $className . ".php")) {
        include $path . $className . ".php";
    }
});

// $auth = new Auth();
// $auth->sendMail(MAIL_USERNAME, "test", "<p>this is a test mail</p>");


function jalaliDate($date, $displayMode = "datetime") {
    // return \Parsidev\Jalali\jDate::forge($date)->format("%B %d, %Y ");
    return \Parsidev\Jalali\jDate::forge($date)->format($displayMode);
}

function uri($reservedUrl, $class, $method, $requestMethod = "GET") {

    //current url array
    $currentUrl = explode("?", currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, "", $currentUrl);
    $currentUrl = trim($currentUrl, "/");
    $currentUrlArray = explode("/", $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved Url array
    $reservedUrl = trim($reservedUrl, "/");
    $reservedUrlArray = explode("/", $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);
    
    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod) {
        return false;
    }

    $parameters = [];
    for ($key=0; $key < sizeof($reservedUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == "{" && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == "}") {
            array_push($parameters, $currentUrlArray[$key]);
        }
        elseif ($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }
    if (methodField() == "POST") {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }
    $object = new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit();

}

//helpers

function protocol() {
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') !== false ? 'https://' : 'http://';
}

function currentDomain() {
    return protocol() . $_SERVER['HTTP_HOST'];
}

// function asset($src) {
//     $domain = trim(CURRENT_DOMAIN, '/ ');
//     $src = $domain . '/' . trim($src. '/');
//     return $src;
// }
function asset($src) {
    $src = trim(CURRENT_DOMAIN, "/ ") . "/" . trim($src, " /.");
    return $src;
}

// function url($url) {
//     $domain = trim(CURRENT_DOMAIN, '/ ');
//     $url = $domain . "/" . trim($url, '/');
//     return $url;
// }
function url($url) {
    $url = trim(CURRENT_DOMAIN, "/ ") . "/" . trim($url, " /.");
    return $url;
}


function currentUrl() {
    return currentDomain() . $_SERVER['REQUEST_URI'];
}
// var_dump(currentUrl());

function methodField() {
    return $_SERVER["REQUEST_METHOD"];
}

function displayError($displayError) {
    if ($displayError) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
    
}
/* showing errors settings */

displayError(DISPLAY_ERROR);

global $flashMessage;

if (isset($_SESSION["flash_message"])) {
    $flashMessage = $_SESSION["flash_message"];
    unset($_SESSION['flash_message']);
}

function flash($name, $value = NULL) {
    if ( $value === NULL) {
        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : "";
        return $message;
    }
    else {
        $_SESSION['flash_message'][$name] = $value ;
    }
}



function dd($var) {
    echo "<pre>";
    var_dump($var);
    // exit;
}


// dashboard
uri('admin', 'Admin\Dashboard', 'index');

// category

uri("admin/category", "Admin\Category", "index");
uri("admin/category/create", "Admin\Category", "create");
uri("admin/category/store", "Admin\Category", "store", "POST");
uri("admin/category/edit/{id}", "Admin\Category", "edit");
uri("admin/category/update/{id}", "Admin\Category", "update", "POST");
uri("admin/category/delete/{id}", "Admin\Category", "delete");


// posts

uri("admin/posts", "Admin\Post", "index");
uri("admin/posts/create", "Admin\Post", "create");
uri("admin/posts/store", "Admin\Post", "store", "POST");
uri("admin/posts/edit/{id}", "Admin\Post", "edit");
uri("admin/posts/update/{id}", "Admin\Post", "update", "POST");
uri("admin/posts/delete/{id}", "Admin\Post", "delete");
uri("admin/posts/selected/{id}", "Admin\Post", "selected");
uri("admin/posts/breaking-news/{id}", "Admin\Post", "breakingNews");

// banners

uri("admin/banners", "Admin\Banner", "index");
uri("admin/banners/create", "Admin\Banner", "create");
uri("admin/banners/store", "Admin\Banner", "store", "POST");
uri("admin/banners/edit/{id}", "Admin\Banner", "edit");
uri("admin/banners/update/{id}", "Admin\Banner", "update", "POST");
uri("admin/banners/delete/{id}", "Admin\Banner", "delete");


// users

uri("admin/users", "Admin\User", "index");
uri("admin/users/edit/{id}", "Admin\User", "edit");
uri("admin/users/update/{id}", "Admin\User", "update", "POST");
uri("admin/users/permission/{id}", "Admin\User", "permission");
uri("admin/users/delete/{id}", "Admin\User", "delete");

// comments

uri("admin/comments", "Admin\Comment", "index");
uri("admin/comments/changeStatus/{id}", "Admin\Comment", "changeStatus");
uri("admin/comments/showComment/{id}", "Admin\Comment", "showComment");

// Menus

uri("admin/menus", "Admin\Menu", "index");
uri("admin/menus/create", "Admin\Menu", "create");
uri("admin/menus/store", "Admin\Menu", "store", "POST");
uri("admin/menus/edit/{id}", "Admin\Menu", "edit");
uri("admin/menus/update/{id}", "Admin\Menu", "update", "POST");
uri("admin/menus/delete/{id}", "Admin\Menu", "delete");


// websetting

uri("admin/websetting", "Admin\Websetting", "index");
uri("admin/websetting/edit", "Admin\Websetting", "edit");
uri("admin/websetting/update", "Admin\Websetting", "update", "POST");



// Auth

uri("register", "Auth\Auth", "register");
uri("register/store", "Auth\Auth", "registerStore", "POST");
uri("activation/{verify_token}", "Auth\Auth", "activation", "GET");
uri("login", "Auth\Auth", "login");
uri("check-login", "Auth\Auth", "checkLogin", "POST");
uri("logout", "Auth\Auth", "logout");
uri("forgot", "Auth\Auth", "forgot");
uri("forgot/request", "Auth\Auth", "forgotRequest", "POST"); //reset-password-form
uri("reset-password-form/{forgot_token}", "Auth\Auth", 'resetPasswordView');
uri("reset-password/{forgot_token}", "Auth\Auth", 'resetPassword', "POST");

// home page
uri('/', 'App\Home', 'index');
uri('/home', 'App\Home', 'index');
uri('show-post/{id}', 'App\Home', 'show');
uri('show-category/{id}', 'App\Home', 'category');
uri('comment-store/', 'App\Home', 'commentStore', 'POST');

uri('ajax', 'App\Home', 'ajax');
uri('ajax-php', 'App\Home', 'ajaxphp');

// require_once BASE_PATH . "/error404/index.php";




















?>