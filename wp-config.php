<?php
/**
 * WordPress 基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL 设置、数据库表名前缀、密钥、
 * WordPress 语言设定以及 ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑 wp-config.php}Codex 页面。MySQL 设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成 wp-config.php 配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', 'wp');

/** MySQL 数据库用户名 */
define('DB_USER', 'root');

/** MySQL 数据库密码 */
define('DB_PASSWORD', 'ww');

/** MySQL 主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与设定。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问 {@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org 密钥生成服务}
 * 任何修改都会导致所有 cookies 失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',#EW1v{?DsLm @~+o]n*s2li6l{k5Q;mtR//68.8af^}B8q9r`>Wk|-S/h]R_Chg');
define('SECURE_AUTH_KEY',  'ZVnWEnAN~9x6KdQ,EV[9nY:0L0q&Y3q-gazIT<&PA9KE+^<^->.MIfQQ-t-!=aGV');
define('LOGGED_IN_KEY',    '$>Ur*GJ &M/:(O*QiEN3K&$7IoH}?+Za+Z<d{{d@<P@(Zs.6in#t!&dbzN9oVD%W');
define('NONCE_KEY',        '+@D^#@@_nk[23YM1dF/m[P5ksjiXf(~*]?~o|%rX^N[]9-~/c{^<4+TO>}E~-gZ6');
define('AUTH_SALT',        'Z;.sDQl9c|HUd`9JZeI=nhH/u.ka0,_9j~!T|B-WVzoJ,u-?BM*3w^xaai8!f-CA');
define('SECURE_AUTH_SALT', '.|mW,X:L?Hw%fKf0r&ZbM1FE>-q>*>H#)WJ/QRlc&%KsRx+In5|K~] O.++mi%ut');
define('LOGGED_IN_SALT',   's!sU4Ub~_i7=]uV;R<+y}}+(DW<yk#}$|OWh.?o.Yc7+{u+#tumVX!^*3Xn}okqJ');
define('NONCE_SALT',       '^Q8I|T`>CTvDl#uk(3^3r9+]+S4;fs_wen&G4rX>u0UZ.FT~n-,req31=jf:glJW');

/**#@-*/

/**
 * WordPress 数据表前缀。
 *
 * 如果您有在同一数据库内安装多个 WordPress 的需求，请为每个 WordPress 设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * WordPress 语言设置，中文版本默认为中文。
 *
 * 本项设定能够让 WordPress 显示您需要的语言。
 * wp-content/languages 内应放置同名的 .mo 语言文件。
 * 例如，要使用 WordPress 简体中文界面，请在 wp-content/languages
 * 放入 zh_CN.mo，并将 WPLANG 设为 'zh_CN'。
 */
define('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress 调试模式。
 *
 * 将这个值改为 “true”，WordPress 将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用此模式。
 */
define('WP_DEBUG', false);

/**
 * zh_CN 本地化设置：启用 ICP 备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress 目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置 WordPress 变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
