<?php

namespace Admin;

use database\DataBase;

class Websetting extends Admin
{
    public function index()
    {
        $db = new DataBase();
        $websetting = $db->select("SELECT * FROM $this->dbname.setting ORDER BY `id` DESC")->fetch();
        require_once BASE_PATH . "/template/admin/websetting/index.php";
    }

    public function edit()
    {
        $db = new DataBase();
        $websetting = $db->select("SELECT * FROM $this->dbname.setting ;")->fetch();
        require_once BASE_PATH . "/template/admin/websetting/edit.php";
    }
    public function update($request)
    {
        $db = new DataBase();
        $setting = $db->select("SELECT * FROM $this->dbname.setting;")->fetch();

        if ($request["logo"]["tmp_name"] != '') {

            $request["logo"] = $this->saveImage($request["logo"], "setting", "logo");
        } else {
            unset($request["logo"]);
        }

        if ($request["icon"]["tmp_name"] != '') {

            $request["icon"] = $this->saveImage($request["icon"], "setting", "icon");
        } else {
            unset($request["icon"]);
        }

        if (!empty($setting)) {
            $result = $db->update("setting", $setting["id"], array_keys($request), array_filter($request));
        } else {
            $result = $db->insert("setting", array_keys(array_filter($request)), array_filter($request));
        }

        if ($result) {
            $this->redirect("admin/websetting");
        }
    }
}
