<?php

function wpd_register_admin_scripts() {
	wp_register_style( 'wpd-admin', trailingslashit( get_template_directory_uri() ) . 'admin/css/admin.css', false, '', 'screen' );
	wp_register_style( 'wpd-colorpicker', trailingslashit( get_template_directory_uri() ) . 'admin/js/colorpicker/colorpicker.css', false, '', 'screen' );
	
	wp_register_script( 'wpd-admin', trailingslashit( get_template_directory_uri() ) . 'admin/js/admin.js', array('jquery','media-upload','thickbox'), '', true );
	wp_register_script( 'wpd-colorpicker', trailingslashit( get_template_directory_uri() ) . 'admin/js/colorpicker/colorpicker.js', array('jquery'), '', true );
}

add_action( 'admin_init', 'wpd_register_admin_scripts' );
/**
 * 加载js文件
 */
function wpd_enqueue_admin_scripts() {
	wp_enqueue_script('wpd-colorpicker');
	wp_enqueue_script('wpd-admin');
}

add_action('admin_print_scripts', 'wpd_enqueue_admin_scripts');
/**
 * 加载css文件
 */
function wpd_enqueue_admin_styles() {
	wp_enqueue_style('wpd-colorpicker');
	wp_enqueue_style('wpd-admin');
	wp_enqueue_style('thickbox');
}
add_action('admin_print_styles', 'wpd_enqueue_admin_styles');


class Wpd_General_Settings extends Wpd_Panel {
	function __construct(){
		$this->menu_slug = 'theme-options';
		
		parent::__construct();
	}
/**
 *	WordPress后台左侧导航菜单名称以及所在位置
 */
	function add_menu_pages(){
		$this->page_hook = add_menu_page(__('主题设置', 'wpd'), __('主题设置', 'wpd'), 'edit_themes', $this->menu_slug, array(&$this, 'menu_page'), '', 61);
	}
	// 设置面板标题
	function add_meta_boxes(){
		add_meta_box( 'base_set', __('基本信息设置', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'indexshow_set', __('首页展示设置', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'weibo_set', __('微博帐号设置', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'index_focus', __('首页焦点图设置', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		/*
		add_meta_box( 'wpd-general-text-settings', __('单行文本框', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'wpd-general-textarea-settings', __('多行文本框', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'wpd-general-select-settings', __('下拉菜单选项', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'wpd-general-checkbox-settings', __('复选框', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'wpd-general-upload-settings', __('图片上传', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'wpd-custom-text-settings', __('自定义文本内容', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'wpd-custom-fields-settings', __('自定义字段内容', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		add_meta_box( 'wpd-color-settings', __('颜色', 'wpd'), array(&$this, 'meta_box'), $this->page_hook, 'normal');
		*/
	}

	// 设置选项开始
	function fields(){
		$fields = array(	//这一行绝对不可以删除,否则程序出错！
		// 自定义字段内容
			'base_set' => array(
				// 备案信息
			 	array(
					'type' => 'fields',
					'title' => __('首页关键字', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'text',
						'name' => 'index_key',
						'title' => __('', 'wpd'),
						'desc' =>__( '', 'wpd'),
						)
			 		)
			 	),
			 	// 描述
			 	array(
					'type' => 'fields',
					'title' => __('首页描述信息', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'textarea',
						'name' => 'desc_textarea',
						'title' => __('', 'wpd'),
						'desc' =>__( '', 'wpd'),
						)
			 		)
			 	),
				// 店铺
			 	array(
					'type' => 'fields',
					'title' => __('店铺分类id', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'text',
						'name' => 'shopcatid',
						'title' => __('', 'wpd'),
						'desc' =>__( '如果您的网站有店铺，请输入店铺的分类id，多个分类用,隔开，如 4,5,6', 'wpd'),
						)
			 		)
			 	),
				// 关键词
			 	array(
					'type' => 'fields',
					'title' => __('关键词采集显示数量', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'text',
						'name' => 'keywordnum',
						'title' => __('', 'wpd'),
						'desc' =>__( '关键词文章中显示多少个同类关键词,如不填写，则默认显示20个', 'wpd'),
						)
			 		)
			 	),
				// 统计信息
			 	array(
					'type' => 'fields',
					'title' => __('统计代码', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'textarea',
						'name' => 'tongji_textarea',
						'title' => __('', 'wpd'),
						'desc' =>__( '', 'wpd'),
						)
			 		)
			 	),
				// 备案信息
			 	array(
					'type' => 'fields',
					'title' => __('备案信息', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'text',
						'name' => 'beian_textarea',
						'title' => __('', 'wpd'),
						'desc' =>__( '', 'wpd'),
						)
			 		)
			 	),
				// 上传logo
				array(
					'type' => 'fields',
					'title' => __('上传logo', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'upload',
						'name' => 'logo_upload',
						'title' => __('', 'wpd'),
						'desc' => __( '建议尺寸300*90，高度不能超过90px', 'wpd'),
						'value' => ''
						)
			 		)
			 	)
				
			 ),	
			 // 自定义字段内容
			'indexshow_set' => array(
				// 关键字
				array(
					'type' => 'fields',
					'title' => __('不在首页显示的分类id', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'text',
						'name' => 'nocatid',
						'title' => __('', 'wpd'),
						'desc' =>__( '多个分类用,隔开，如 4,5,6', 'wpd'),
						)
			 		)
			 	),
				array(
					'type' => 'fields',
					'title' => __('是否显示店铺', 'wpd'),
			 		'fields' => array(
			 			array(
			 				'type' => 'checkbox',
							'name' => 'index_shop_show',
			 				'value' => false
			 			),
			 			array(
			 				'type' => 'text',
			 				'name' => 'index_shop_id',
			 				'prepend' => __('店铺id:', 'wpd'),
			 				'value' => '',
							'class' => 'regular-text',
							'desc' =>__( '如要显示店铺，请勾选并输入店铺栏目的id，如 4', 'wpd')
		 			)
			 		)
			 	)
			 					
			 ),	
			'weibo_set' => array(
				// 关键字
				array(
					'type' => 'fields',
					'title' => __('新浪微博id', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'text',
						'name' => 'sinaid_text',
						'title' => __('', 'wpd'),
						'desc' =>__( '', 'wpd'),
						)
			 		)
			 	)			
			 ),				 
			 'index_focus' => array(
				array(
					'type' => 'custom',
					'name' => 'wpd_custom_text',
					'title' => __('说明','wpd'),
					'desc' => __('焦点图上传后会由wordpress自动裁剪缩略图。<br>如果您的焦点图是直接调用远程图片而非上传，则缩略图不会正常显示，请在首页模板中修改相应代码调用您的缩略图图片','wpd')
					),
				// 焦点图1
				array(
					'type' => 'fields',
					'title' => __('焦点图1', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'upload',
						'name' => 'focus1',
						'title' => __('', 'wpd'),
						'desc' => __( '标准宽高比为715*283，请尽量按这个尺寸上传', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus1_txt',
						'title' => __('显示标题', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus1_url',
						'title' => __('链接地址', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						)
			 		)
			 	),
			 	// 焦点图2
				array(
					'type' => 'fields',
					'title' => __('焦点图2', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'upload',
						'name' => 'focus2',
						'title' => __('', 'wpd'),
						'desc' => __( '标准宽高比为715*283，请尽量按这个尺寸上传', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus2_txt',
						'title' => __('显示标题', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus2_url',
						'title' => __('链接地址', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						)
			 		)
			 	),
			 	// 焦点图3
				array(
					'type' => 'fields',
					'title' => __('焦点图3', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'upload',
						'name' => 'focus3',
						'title' => __('', 'wpd'),
						'desc' => __( '标准宽高比为715*283，请尽量按这个尺寸上传', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus3_txt',
						'title' => __('显示标题', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus3_url',
						'title' => __('链接地址', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						)
			 		)
			 	),
			 	// 焦点图4
				array(
					'type' => 'fields',
					'title' => __('焦点图4', 'wpd'),
			 		'fields' => array(
			 			array(
						'type' => 'upload',
						'name' => 'focus4',
						'title' => __('', 'wpd'),
						'desc' => __( '标准宽高比为715*283，请尽量按这个尺寸上传', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus4_txt',
						'title' => __('显示标题', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						),
						array(
						'type' => 'text',
						'name' => 'focus4_url',
						'title' => __('链接地址', 'wpd'),
						'desc' => __( '', 'wpd'),
						'value' => ''
						)
			 		)
			 	),
				
			 ),
				
			// 下拉菜单选项

			'wpd-general-select-settings' => array(
				array(
			 		'type' => 'select',
			 		'name' => 'wpd_color_select',
			 		'title' => __('下拉菜单选项', 'wpd'),
			 		'desc' => __( '这里是下拉菜单选项的描述内容.', 'wpd'),
			 		'options' => array(
			 			'red' =>'红色',
						'black' =>'黑色',
						'gray' =>'灰色', 
			 		),
			 		'value' => '红色'
			 	)
			),
			// 复选框

			'wpd-general-checkbox-settings' => array(
				array(
					'type' => 'checkbox',
					'name' => 'wpd_checkbox',
					'value' => false,
					'title' => __('复选框', 'wpd'),
					'label' => __('这里是复选框的描述内容', 'wpd')
			 	)
			),
						
			// 自定义文本内容

			'wpd-custom-text-settings' => array(
				array(
					'type' => 'custom',
					'name' => 'wpd_custom_text',
					'title' => __('自定义文本','wpd'),
					'desc' => __('这里是自定义文本的内容。你可以在这个版块写一些帮助文档之类的东东。','wpd')
					)
				),
			// 颜色
			'wpd-color-settings' => array(
				array(
					'type' => 'color',
					'name' => 'wpd_bgcolor',
					'value' => '#fff',
					'title' => __('背景色', 'wpd'),
					'append' => __("默认背景色为白色", 'wpd')
					)
				)
		);
		
		return $fields;
	}
}
wpd_register_panel('Wpd_General_Settings');