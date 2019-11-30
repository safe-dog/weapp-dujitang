<?php
/**
 *
 * @author vPush
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Weapp_dujitangModuleSite extends WeModuleSite {

  public $tableSettings = "weapp_dujitang_settings";

  public function doWebSetting () {
    global $_GPC, $_W;

    $query = load()->object("query");
    $settings = $query->from($this->tableSettings)->where("key", $_W["account"]["key"])->orderby("created_at", "DESC")->get();
    include $this->template("setting");
  }


  public function doWebSaveSetting() {
    global $_GPC, $_W;
    // 如果有id
    $ID = intval($_GPC["id"]);
    if ($ID && $ID > 0) {
      $res = pdo_update($this->tableSettings, array(
        "title" => $_GPC["title"],
        "share_img" => $_GPC["share_img"],
        "share_txt" => $_GPC["share_txt"],
        "haibao_img" => $_GPC["haibao_img"],
        "ad_banner" => $_GPC["ad_banner"],
        "updated_at" => strtotime("now")
      ), array(
        "id" => $ID,
        "key" => $_W["account"]["key"]
      ));
    } else {
      $res = pdo_insert($this->tableSettings, array(
        "title" => $_GPC["title"],
        "key" => $_W["account"]["key"],
        "share_img" => $_GPC["share_img"],
        "share_txt" => $_GPC["share_txt"],
        "haibao_img" => $_GPC["haibao_img"],
        "ad_banner" => $_GPC["ad_banner"],
        "created_at" => strtotime("now"),
        "updated_at" => strtotime("now")
      ));
    }
    if (!empty($res)) {
      message("更新设置成功！", referer(), "success");
    } else {
      message("更新失败！请重试！", "", "warning");
    }
  }


  public function doWebContact() {
    global $_GPC, $_W;
    include $this->template("contact");
  }
}