<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'rgdz');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'root');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[XpBRFlMD4wVfAI,A}(d>2JZ>5E,sm#D!dq1vsSNBWBS!:+1gLb*i&IH`cO*mxx+');
define('SECURE_AUTH_KEY',  '<yUm-M|(/_/6Q#qm>E4a|qIGyeTjG(7o+X^g!G[,!lI_)({03O83v-~o.H->8eh@');
define('LOGGED_IN_KEY',    'udDaH7LKkw$5-T5|G}dNBpc>C`81;D:u#oX1@8?q||lZ||oKe_3I2{=mp#@k,lII');
define('NONCE_KEY',        'HzQCVGo=tD#y6r)qzj7k-dG[_-~@!j7-NhnoMe2dcY?MkNi&L/kUG B6]O4|_esg');
define('AUTH_SALT',        'T^MNbX-/;`kLfsaw^z+I?8Mj&U38)k-N!}(d)g)L/PV/+e!87b8ebhV6iqRjw:<0');
define('SECURE_AUTH_SALT', 'w +JEn*A|A*$gtM`[.knDdOvx,s6pYF,tF^`7dac{MG3L @1[pdfOP;?L.wRuYt!');
define('LOGGED_IN_SALT',   '.]D}5FiN3!0SY9;udYI|&se,t]VHb-(HrOA[CtZ^p]yd_sKOU%8XfC.W:^kF+2SF');
define('NONCE_SALT',       '!sO=Q5lswJUA3RG5tD-iKPR;rq[CIlchu!JW$5T-ZKJYWY~yp&BeSH|); Q:EVkj');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', true);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
