<?php
$table_settings = tablename("weapp_dujitang_settings");

$sql = <<<EOT
CREATE TABLE IF NOT EXISTS $table_settings (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `key` varchar(255) NOT NULL DEFAULT '' COMMENT '对应的小程序appid',
  `title` varchar(255) NOT NULL DEFAULT "毒鸡汤" COMMENT '小程序标题',
  `share_img` varchar(255) COMMENT '转发的图片',
  `share_txt` varchar(255) COMMENT '转发的标题',
  `haibao_img` varchar(255) COMMENT '分享的海报图片',
  `ad_banner` varchar(255) COMMENT '首页banner广告id',
  `created_at` int(11) COMMENT '创建时间',
  `updated_at` int(11) COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
EOT;

pdo_query($sql);