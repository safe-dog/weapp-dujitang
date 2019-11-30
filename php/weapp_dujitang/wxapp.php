<?php
/**
 *
 * @author vPush
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Weapp_dujitangModuleWxapp extends WeModuleWxapp {

	public $tableSettings = "weapp_dujitang_settings";
	// 获取设置信息
	public function doPageGetSettings() {
		global $_GPC, $_W;

    $query = load()->object("query");
    $settings = $query->from($this->tableSettings)->where("key", $_W["account"]["key"])->orderby("created_at", "DESC")->get();
		$this->result(0, "获取系统设置成功", array(
			"attachurl" => $_W["attachurl"],
			"settings" => $settings
		));
	}

	// 随机获取一条毒鸡汤数据
	public function doPageGetRandom () {
		global $_GPC, $_W;

		$file = MODULE_URL.'/data/soul.json';
		$data = json_decode(file_get_contents($file), true);
		$rand = rand(0, count($data));
		$this->result(0, "ok", $data[$rand]);
	}
}