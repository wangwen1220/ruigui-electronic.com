<?php

// 控制面板页面

abstract class Wpd_Panel {
	protected $layout_like = 'dashboard'; 
	protected $layout_columns;
	
	protected $menu_slug;
	
	protected $buttons = array('save', 'reset', 'toggle');

	private static $registered = array();
	
	static function register( $class ) {
		if ( isset( self::$registered[$class] ) )
			return false;
			
		self::$registered[$class] = $class;
		
		add_action('_admin_menu', array(__CLASS__, '_register_panel'));
		
		return true;
	}
	
	static function unregister( $class ) {
		if ( ! isset( self::$registered[$class] ) )
			return false;

		unset( self::$registered[$class] );

		return true;
	}
	
	static function _register_panel() {
		foreach(self::$registered as $class) {
			new $class();
		}
	}
	
	function Wpd_Panel() {
		$this->__construct();
	}
	
	function __construct() {
		global $plugin_page;
		
		if($this->layout_like == 'dashboard')
			// 默认显示列数为2，最大显示列数为4
			$this->layout_columns = !empty($this->layout_columns) ? $this->layout_columns : array('max'=>4, 'default'=>2);
		elseif($this->layout_like == 'postnew')
			$this->layout_columns = !empty($this->layout_columns) ? $this->layout_columns : array('max'=>2, 'default'=>2);
		$this->menu_slug = !empty($this->menu_slug) ? $this->menu_slug : '';

		add_action('admin_menu', array(&$this, 'add_menu_pages'));
		add_action('admin_menu', array(&$this, 'add_meta_boxes'));
		

		add_action('admin_init', array(&$this, 'hello'));
		
		$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : '';
		if( $current_page != $this->menu_slug )
			return;
		
		add_action('admin_menu', array(&$this, 'update'), 2);
		add_action('admin_menu', array(&$this, 'add_settings_sections') );

		add_action('admin_head', array(&$this, 'custom_screen_options'), 0);
		
		add_action( 'admin_print_scripts', array( &$this,'default_scripts' ) );
		add_action( 'admin_print_styles', array( &$this,'default_styles' ) );

		add_action('admin_notices', array(&$this, 'admin_notices'));
		
	}
	
	function add_settings_sections() {
		
	}
		/*
		*Meta Box
		*/
	function meta_box($object, $box) {
		$defaults = $this->fields();		
		if(!isset($defaults[$box['id']]))
			return;
		$defaults = $defaults[$box['id']];

		$new_fields = wpd_instance_fields($defaults);
		wpd_form_fields($new_fields);
	}
	
	function settings_section($section) {
		$defaults = $this->fields();		
		if(!isset($defaults[$section['id']]))
			return;
			
		$defaults = $defaults[$section['id']];

		$new_fields = wpd_instance_fields($defaults);
		wpd_form_fields($new_fields);
	}
	
	/*
	 *	保存更改、恢复默认
	 */
	function update() {
		$defaults = $this->defaults();
		
		if( !is_array($defaults) || empty($defaults) || !isset($_GET['page']) || $_GET['page'] != $this->menu_slug)
			return;
		
		// 当用户点击保存设置按钮时存储更改的内容
		if (isset($_POST['save'])) {
				
			foreach( $defaults as $option_name => $option_value) {
				$value = null;
				if(!empty($_POST[$option_name]))
					$value = $_POST[$option_name];
				if ( !is_array($value) )
					$value = trim($value);
				$value = stripslashes_deep($value);
				
				update_option($option_name, $value);
			}
			
			do_action('wpd_update_settings');
			do_action('wpd_save_settings');
			
			$args = array_filter(array(
				'page' => $_REQUEST['page'],
				'updated' => true
			));
			wp_redirect( add_query_arg($args, get_current_url(false)) );
			exit();
		}
		
		// 当用户单击“恢复默认”按钮或者设置为空时恢复默认设置.
		elseif(isset($_POST['reset'])) {
			foreach($defaults as $option_name => $option_value) {
				update_option($option_name, $option_value);
			}
			
			do_action('wpd_update_settings');
			do_action('wpd_reset_settings');
			
			$args = array_filter(array(
				'page' => $_REQUEST['page'],
				'reset' => true
			));
			wp_redirect( add_query_arg($args, get_current_url(false)) );
			exit();
		}
	}
	
	function hello() {
		$hello = get_option($this->menu_slug.'_say_hello');
		
		$defaults = $this->defaults();
		
		if( !is_array($defaults) || empty($defaults))
			return;
		
		if(!$hello) {
			foreach($defaults as $option_name => $option_value) {
				update_option($option_name, $option_value);
			}
			
			update_option($this->menu_slug.'_say_hello', true);
		}
		return;
	}
	
	/*
	 *	管理员通知
	 */
	function admin_notices() {
		global $parent_file;
		
		if ( !isset($_GET['page']) || $_GET['page'] != $this->menu_slug )
			return;
			
		global $read_notice;
		$read_notice = false;
		
		if($read_notice)
			return false;
		
		if (!empty($_GET['updated']) && $parent_file != 'options-general.php')
			echo '<div id="message" class="updated"><p><strong>' . __('设置已保存.', 'wpd') . '</strong></p></div>';

		elseif (!empty($_GET['reset']))
			echo '<div id="message" class="updated"><p><strong>' . __('已恢复默认设置.', 'wpd') . '</strong></p></div>';
			
		$read_notice = true;
	}
	
	function screen_layout_columns($columns, $screen) {
		$columns[$screen] = $this->layout_columns;
		
		return $columns;
	}
	
	function custom_screen_options() {
		if($this->layout_columns)
			add_screen_option('layout_columns', $this->layout_columns);
	}
	/*
	 * 主题设置页面生成
	 */
	function screen_icon() {
		echo get_screen_icon('themes');
	}
	
	function page_buttons($in_top = false) {
		if(in_array('save', $this->buttons))
			echo '<input type="submit" name="save" value="'.__('保存更改', 'wpd').'" class="button-primary"> ';
		
		if(in_array('reset', $this->buttons))
			echo '<input type="submit" value="'.__('恢复默认', 'wpd').'" name="reset" class="reset button-highlighted"> ';
		
		if(in_array('toggle', $this->buttons) && $this->layout_like != 'settings' && $in_top)
			echo '<input type="button" class="button toggel-all" value="'.__('展开/合并', 'wpd').'" />';

		
	}
	
	function page_title() { ?>
		<div style="padding-top:15px;">
			<span style="font-size:24px;padding-right:15px;"><?php echo get_admin_page_title(); ?></span>
			<?php $this->page_buttons(true); ?>
		</div>
	<?php }
	
	function menu_page() {  
		global $parent_file, $plugin_page, $page_hook, $typenow, $hook_suffix, $pagenow, $current_screen, $wp_current_screen_options, $screen_layout_columns; 
		$screen = get_current_screen();
		?>
		<div class="wrap wpd-panel">
			<form method="post" action="">
				<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
				<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
				
				<?php $this->screen_icon(); ?>
				<?php $this->page_title(); ?>
				
				<br class="clear" />
				
				<?php 
					if($this->layout_like == 'dashboard') {
						$this->metabox_holder_like_dashboard();
					} elseif($this->layout_like == 'postnew') {
						$this->metabox_holder_like_postnew();
					} elseif($this->layout_like == 'settings') {
						do_settings_sections($screen->id); 
					}
				?>
				
				<br class="clear" />
				<?php $this->page_buttons(); ?>
				
				<span class="pickcolor"></span>
				<div id="colorpicker" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
			</form>
		</div><!-- end .wrap -->
	<?php }
	
	function metabox_holder_like_dashboard() {
		global $wp_version, $screen_layout_columns;
	
		$screen = get_current_screen();
		
		$class = $hide2 = $hide3 = $hide4 = '';
		
		if($wp_version >= 3.4)
			$class = 'columns-' . get_current_screen()->get_columns();
		else {
			switch ( $screen_layout_columns ) {
				case 4:
					$width = 'width:25%;';
				break;
				case 3:
					$width = 'width:33.333333%;';
					$hide4 = 'display:none;';
					break;
				case 2:
					$width = 'width:50%;';
					$hide3 = $hide4 = 'display:none;';
					break;
				default:
						$width = 'width:100%;';
				$hide2 = $hide3 = $hide4 = 'display:none;';
			}
		} ?>
		
	<div id="dashboard-widgets" class="metabox-holder <?php echo $class; ?>">
		<div id="postbox-container-1" class="postbox-container" style="<?php echo $width; ?>">
			<?php do_meta_boxes($screen->id, 'normal', null); ?>
		</div><!-- end .postbox-container -->
				
		<div id="postbox-container-2" class="postbox-container" style="<?php echo $hide2.$width; ?>">
			<?php do_meta_boxes($screen->id, 'side', null); ?>
		</div><!-- end .postbox-container -->
					
		<div id="postbox-container-3" class="postbox-container" style="<?php echo $hide3.$width; ?>">
			<?php do_meta_boxes($screen->id, 'column3', null); ?>
		</div><!-- end .postbox-container -->
					
		<div id="postbox-container-4" class="postbox-container" style="<?php echo $hide4.$width; ?>">
			<?php do_meta_boxes($screen->id, 'column4', null); ?>
		</div><!-- end .postbox-container -->
		
	</div><!-- end .metabox-holder -->
	<?php }
	
	/* 
	 * 字段和默认值
	 */
	
	function fields() {
		$fields = array();
			
		return $fields;
	}
	
	function defaults( $fields = array() ) {
		if(!$fields)
			$fields = $this->fields();
			
		if(empty($fields) || !is_array($fields))
			return;
			
		$defaults = array();
		
		foreach($fields as $box_id => $box_fields) {
			foreach(wpd_field_options($box_fields) as $name => $field) {
				$defaults[$name] = $field;
			}
		}
		
		return $defaults;
	}
	
	/**
	 * 加载主题设置默认js.
	 */
	function default_scripts() {
			if( !isset($_GET['page']) || $_GET['page'] != $this->menu_slug )
				return;
			
			wp_enqueue_script('postbox');
			wp_enqueue_script('post');
			wp_enqueue_script('thickbox');
			wp_enqueue_script('wpd-admin', trailingslashit( get_template_directory() ) . '/admin/js/admin.js', array('jquery'), '', true);
	}
	
	/**
	 * 加载主题设置默认css.
	 */
	function default_styles() {
		if (!isset($_GET['page']) || $_GET['page'] != $this->menu_slug)
			return;
			
		wp_enqueue_style('thickbox');
		wp_enqueue_style('wpd-admin', trailingslashit( get_template_directory() ) . 'admin/css/admin.css', false);
	}
}

function wpd_register_panel($class) {
	Wpd_Panel::register($class);
}

function wpd_unregister_panel($class) {
	Wpd_Panel::unregister($class);
}

function get_current_url($query_string = true) {
	$scheme = !empty($_SERVER['HTTPS']) && $_SERVER["HTTPS"] == "on" ? 'https://' : 'http://';
	
	$url = $_SERVER['REQUEST_URI'];
	if(!$query_string)
		$url = str_replace('?'.$_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
	
	$url = $scheme . $_SERVER['HTTP_HOST'] . $url;
	
	return $url;
}
