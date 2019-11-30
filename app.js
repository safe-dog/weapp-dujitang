/**
 * 毒鸡汤小程序
 * 作者：小鱼
 * 微信：Hack_Fish
 * 公众号：古人云
 * GitHub：https://github.com/safe-dog
 */

const util = require('./we7/resource/js/util.js');

App({
	util,
	siteInfo:require('siteinfo.js'),
	// 加载广告
	settings: null,
	getSettings: function (cb, refresh = 0) {
		if (this.settings && !refresh) {
			cb && cb(this.settings);
			return;
		}
		util.request({
			url: "entry/wxapp/getsettings",
			data: {
				m: "weapp_dujitang"
			},
			success: res => {
				const { data } = res.data;
				this.settings = data;
				cb && cb(data);
			}
		})
	},
	/**
	 * 当小程序初始化完成时，会触发 onLaunch（全局只触发一次）
	 */
	onLaunch: function () {
		
	},

	/**
	 * 当小程序启动，或从后台进入前台显示，会触发 onShow
	 */
	onShow: function (options) {
		
	},

	/**
	 * 当小程序从前台进入后台，会触发 onHide
	 */
	onHide: function () {
		
	},

	/**
	 * 当小程序发生脚本错误，或者 api 调用失败时，会触发 onError 并带上错误信息
	 */
	onError: function (msg) {
		
	}
})
