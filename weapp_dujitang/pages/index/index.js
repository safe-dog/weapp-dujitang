// weapp_dujitang/pages/index/index.js
Page({

	/**
	 * 页面的初始数据
	 */
	data: {
		dujitang: null,
		share_img: null,
		share_txt: '',
		ad: null
	},

	copyHandler: function () {
		wx.setClipboardData({
			data: this.data.dujitang,
		});
	},

	haibaoHandler: function () {
		wx.showModal({
			title: '分享海报',
			content: '长按分享海报可进行转发或者保存噢！',
			success: () => {
				getApp().getSettings(d => {
					const { attachurl, settings } = d;
					if (!d) return wx.showToast({
						title: '加载设置失败！',
					});

					wx.previewImage({
						urls: [attachurl + settings['haibao_img']],
					});
				})
			}
		})
	},

	loadData: function () {
		this.setData({
			dujitang: null
		});
		getApp().util.request({
			url: "entry/wxapp/getrandom",
			success: res => {
				const { errno, message, data } = res.data;
				this.setData({
					dujitang: data
				})
			}
		})
	},

	/**
	 * 生命周期函数--监听页面加载
	 */
	onLoad: function (options) {
		// 获取设置
		getApp().getSettings(d => {
			const { attachurl, settings } = d;
			if (!settings) return;
			this.setData({
				share_img: attachurl + settings['share_img'],
				share_txt: settings['share_txt'],
				ad: settings['ad_banner']
			});
		})
	},

	/**
	 * 生命周期函数--监听页面初次渲染完成
	 */
	onReady: function () {

	},

	/**
	 * 生命周期函数--监听页面显示
	 */
	onShow: function () {
		this.loadData();
	},

	/**
	 * 生命周期函数--监听页面隐藏
	 */
	onHide: function () {

	},

	/**
	 * 生命周期函数--监听页面卸载
	 */
	onUnload: function () {

	},

	/**
	 * 页面相关事件处理函数--监听用户下拉动作
	 */
	onPullDownRefresh: function () {

	},

	/**
	 * 页面上拉触底事件的处理函数
	 */
	onReachBottom: function () {

	},

	/**
	 * 用户点击右上角分享
	 */
	onShareAppMessage: function () {
		return {
			title: this.data.share_txt,
			imageUrl: this.data.share_img
		}
	}
})