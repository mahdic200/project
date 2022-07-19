<?php 



// var_dump($_GET);
// exit;

function protocol() {
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') !== false ? 'https://' : 'http://';
}

function currentDomain() {
    return protocol() . $_SERVER['HTTP_HOST'];
}

//confing
define('BASE_PATH', __DIR__);
define('CURRENT_DOMAIN', currentDomain() . '/project/');
define('DISPLAY_ERROR', true);
define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');






use database\DataBase;
require_once "../database/DataBase.php";

$userinput = $_GET['text'];


$db = new DataBase();

$categories = $db->select("SELECT name FROM categories")->fetchAll();

$result = '';
if (strlen($userinput) > 0)
{
    if (sizeof($categories) > 0)
    {
        foreach ($categories as $category)
        {
            $category = $category['name'];
            if (strtolower($userinput) == strtolower(substr($category, 0, strlen($userinput))))
            {
                $result .= $category;
            }
        }
    }
}




echo (!empty($result)) ? $result : "nothing";