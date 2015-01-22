<?php

function sanitize_field_id($id) {
	$raw_id = $id;
	$id = strtolower( $id );
	$id = str_replace(']', '', $id);
	$id = preg_replace( '/[^a-z0-9\-]/', '-', $id );
	return apply_filters( 'sanitize_field_id', $id, $raw_id );
}

function wpd_form_fields($fields = '', $args = '') {	
	$defaults = array(
		'before_container' => '<table class="form-table"><tbody>',
		'after_container' => '</tbody></table>',
		'before_row' => '<tr>',
		'after_row' => '</td></tr>',
		'before_title' => '<th scope="row">',
		'after_title' => '</th><td>',
		'callback' => '',
	);
	$args = wp_parse_args( $args, $defaults );

	echo $args['before_container'];
	
	foreach ($fields as $field) {
		if(!is_array($field))
			continue;
		
		$type = !empty( $field['type'] ) ? $field['type'] : '';
		$name = !empty( $field['name'] ) ? $field['name'] : '';
		$types = array('text', 'password', 'upload', 'image_id', 'color', 'textarea', 'radio', 'select', 'multiselect', 'checkbox', 'checkboxes', 'custom');
		
		if( !empty( $field['callback'] ) && is_callable( $field['callback'] ) ) {
				echo call_user_func( $field['callback'], $field );
		} 
		elseif($type == 'description' && !empty($field['value'])) {
			echo '<tr><td colspan="2"><div class="description">'.$field['value'].'</div></td></tr>';
		} 
		elseif($type == 'fields' ) {
			$defaults = array(
				'before_container' => '',
				'after_container' => '',
				'before_row' => '',
				'after_row' => '',
				'before_title' => '',
				'after_title' => '',
				'callback' => ''
			);
			
			echo '<tr><th>'.$field['title'].'</th><td>';
			wpd_form_fields( $field['fields'], wp_parse_args( $field['args'], $defaults ) );
			echo '</td></tr>';
		} 
		elseif(!empty($type)) {
			if(!empty( $args['callback'] ) && is_callable( $args['callback'] ))
				$field = call_user_func( $args['callback'], $field);
			
			$field = wp_parse_args($field, $args);
			wpd_form_row($field);
		}
	}
	
	echo $args['after_container'];
}

function wpd_form_widget($fields = array(), $field_args_callback = '') {
	
	foreach ($fields as $field) {
		if(!is_array($field))
			continue;
		
		$type = !empty($field['type']) ? $field['type'] : '';
		$name = !empty($field['name']) ? $field['name'] : '';
		
		$types = array('text', 'textarea', 'radio', 'select', 'multiselect', 'checkbox', 'checkboxes');
		
		if(!empty($field['callback']))
			call_user_func($field['callback'], $field);
			
		elseif(in_array($type, $types)) {
			if(!empty($field_args_callback) && is_callable($field_args_callback))
				$field = call_user_func($field_args_callback, $field);
				
			if(!empty($field['to_array'])) {
				$to_array = $field['to_array'];
				$field['name'] = "{$to_array}[{$name}]";
				$field['id'] = "$to_array-$name";
			}
			
			$field['before'] = '<p>';
			$field['after'] = '</p>';
			$field['before_title'] = '';
			$field['after_title'] = '';
			
			wpd_form_row($field);
		}
		
		// 描述内容
		elseif($type == 'description' && !empty($field['value']))
			echo '<tr><td colspan="2"><span class="description">'.$field['value'].'</span></td></tr>';
		
		// 自定义内容
		elseif($type == 'custom' && !empty($field['value']))
			echo '<tr><td colspan="2">'.$field['value'].'</td></tr>';
	}
	echo '</tbody></table>';
}

function wpd_form_row($args = '') {
	$defaults = array(
		'before_row' => '<tr>',
		'before_title' => '<th scope="row">',
		'title' => '',
		'after_title' => '</th><td>',
		'after_row' => '</td></tr>',
		'label_for' => '',
		'id' => '',
		'tip' => '',
		'req' => '',
		'desc' => '',
		'prepend' => '',
		'append' => '',
		'field' => ''
	);
	
	$args = wp_parse_args( $args, $defaults ); 
	extract($args);
	
	if(empty($id) && !empty($name))
		$id = $args['id'] = sanitize_field_id($name);
	if(empty($label_for) && !empty($id))
		$label_for = ' for="'.$id.'"';
	
	echo $before_row;
	
	if($args['type'] != 'checkbox' || $args['type'] == 'checkboxes')
		$title = '<label'.$label_for.'>'.$args['title'].'</label> ';
	if($tip)
		$tip = ' <span class="tip">(?)</span><div style="display:none;">'.$tip.'</div>';
	$req = '';	
	if($args['req'] === true || $args['req'] === 1)
		$req = '*';
	elseif(isset($args['req']))
		$req = $args['req'];
	if(!empty($req))
		$req = ' <span class="required">'.$req.'</span>';
	
	/* 输出 */
	echo $before_title . $title . $req . $tip . $after_title . ' ';
	
	if(!empty($args['prepend']))
		echo $args['prepend'] . ' ';
	
	if( empty($args['field']) )
		wpd_form_field($args);
	
	if($args['type'] == 'custom' && !empty($args['custom']))
		echo $args['custom'];
		
	if(!empty($args['append']))
		echo ' '.$args['append'] . ' ';
		
	if(!empty($desc))
		echo ' <div class="description">'.$desc.'</div>';
		
	echo $after_row;
}

function wpd_form_field($args = '') {
	if(empty($args['type']))
		return;

	$defaults = array(
		'name' => '',
		'value' => '',
		'class' => '',
		'id' => '',
		'options' => '',
		'sep' => '',
		'label' => '',
		'label_for' => '',
		'style' => '',
		'field_args' => '',
		'echo' => true
	);
	
	if($args['type'] == 'text')
		$defaults['class'] = 'widefat';
	elseif($args['type'] == 'textarea')
		$defaults['class'] = 'widefat';
	elseif($args['type'] == 'multiselect')
		$defaults['style'] = 'height:8em;';
	
	$args = wp_parse_args( $args, $defaults );
	extract( $args );
	
	if($args['type'] == 'upload') {
		$class .= ' wpd-upload-text';
	} elseif( $args['type'] == 'color' ) {
		$class .= 'wpd-color-input';
	}
	
	if(!empty($class)) 
		$class = ' class="'.$class.'"';
	if(empty($id) && !empty($name))
		$id = $args['id'] = sanitize_html_class($name);
	if(empty($label_for) && !empty($id))
		$label_for = ' for="'.sanitize_html_class($id).'"';
	if(!empty($id))
		$id = ' id="'.$id.'"';
	if(!empty($style))
		$style = ' style="'.$style.'"';
		
	$output = null;
	
	/* 单行文本输入框、密码、隐藏内容*/
	if($type == 'text' || $type == 'password' || $type == 'hidden') {
		$type = ' type="'.$type.'"';
		if(!empty($name)) $name = ' name="'.$name.'"';
		if($type == 'password') $value="";
		$value = ' value="' . esc_attr($value) . '"';
		

		$output = "<input{$type}{$name}{$value}{$id}{$class}{$style} />";
	}
		
	/* 上传 */
	elseif($type == 'upload') {
		$type = ' type="text"';
		$value = ' value="' . esc_attr(stripslashes($value)) . '"';
		if(!empty($name))
			$name = ' name="'.$name.'"';

		$output = "<input{$type}{$name}{$value}{$id}{$class}{$style} />";
		$output .= ' &nbsp; <a title="" class="thickbox button wpd-upload-button" href="'.get_upload_iframe_src('image').'">上传</a> <a href="#" class="button wpd-remove-button">移除</a> <div class="wpd-upload-preview"></div>';
	} 
	
	/* 图片提交*/
	elseif($type == 'image_id') {
		$output = apply_filters($args['name'].'_filter', ' ', $args);
	} 
	
	/* 颜色*/
	elseif($type == 'color') {
		$type = ' type="text"';
		$value = ' value="' . esc_attr(stripslashes($value)) . '"';
		if(!empty($name))
			$name = ' name="'.$name.'"';

		$output = "<span class='wpd-color-handle colorSelector'>&nbsp;</span> <input{$type}{$name}{$value}{$id}{$class}{$style}>";
	}
	
	/* 文本区域 */
	elseif($type == 'textarea') {
		$value = esc_textarea($value);
		if(!empty($name)) $name = ' name="'.$name.'"';
		if(!isset($args['cols'])) $cols = '10';
		if(!isset($args['rows'])) $rows = '6';
		$cols = ' cols="' . $cols . '"';
		$rows = ' rows="' . $rows . '"';

		$output .= "<textarea{$name}{$id}{$class}{$style}{$rows}{$cols}>{$value}</textarea></div>";
	}
	
	/* 多行文本输入框*/
	elseif($type == 'editor') {
		$field_args = array_merge(array('textarea_name' => $name, 'textarea_rows' => 4), (array)$field_args);
		wp_editor($value, $args['id'], $field_args);
	}
	
	/* 下拉框 */
	elseif($type == 'select' && is_array($options)) {
		$name = !empty($name) ? 'name="'.$name.'"' : '';
	
		$output .= "<select{$id}{$class}{$name}{$style}>";
		
		if(isset($args['option_none']))
			$output .= '<option value="">'.$args['option_none'].'</option>';

		if(is_assoc($options)) {
			foreach ($options as $option => $label) {
				$output .= '<option value="'.$option.'"'.selected($option, $value, false).'>'.$label.'</option>';
			}
		} else {
			foreach ($options as $option => $label) {
				$output .= '<option value="'.$label.'"'.selected($label, $value, false).'>'.$label.'</option>';
			}
		}
		
		$output .= '</select> ';
	}
	
	/* 多选 */
	elseif($type == 'multiselect' && is_array($options)) {
		$output .= '<select multiple="multiple" name="'.$name.'[]"' . $id . $class . $style . '>';
		foreach ($options as $option => $label) { 
			if(!is_assoc($options))
				$option = $label;

				$selected = (is_array($value) && in_array($option, $value)) ? ' selected="selected"' : '';
				
			$output .= '<option value="'.$option.'"'.$selected.'>'.$label.'</option>';
		} 
		$output .= '</select>';
	}
	
	/* 单个复选框 */
	elseif($type == 'checkbox') {
		$output .= '<label'.$label_for.'><input'.$id.' name="'.$name.'" type="checkbox" value="1"'.checked($value, true, false).' /> '.$args['label'].'</label> ';
	}
	
	/* 多个复选框 */
	elseif($type == 'checkboxes' && is_array($options)) {
		
		foreach ($options as $option => $label) {
	
			if(!is_assoc($options))
				$option = $label;
				
			$checked = (is_array($value) && in_array($option, $value)) ? ' checked="checked"' : '';
				
			$output[] = '<label><input'.$class.$style.' name="'.$name.'[]" type="checkbox" value="'.$option.'"'.$checked.' /> '.$label.'</label>';
		}
		
		$output = '<div class="wpd-checkboxes">' . implode($args['sep'] ? $args['sep'] : '<br />', $output) . '</div>';
	}
	
	if($echo)
		echo $output;
	else
		return $output;
}

function wpd_field_options( $fields = array() ) {
	$options = array();
	
	foreach($fields as $field) {
		global $post;
			
		if( !empty($field['fields']) && $field['type'] == 'fields' ) {
			$options = array_merge_recursive( $options, wpd_field_options($field['fields']) );
		} else {
			if(empty($field['name']) )
				continue;
				
			$name = $field['name'];
			$name = str_replace('[]', '', $name);
			$name = str_replace(']', '', $name);
			$name = explode('[', $name);
			
			$option = array();
			
			for($i=count($name) - 1; $i>=0; $i--) {
				if($i == count($name) - 1) {
					$option[$name[$i]] = isset($field['value']) ? $field['value'] : '';
				} else {
					$option[$name[$i]] = $option;

					unset( $option[$name[$i+1]] );
				}
			}
			
			$options = array_merge_recursive($options, $option);
		}
	}
	
	return $options;
}

function wpd_instance_fields( $fields, $instance_type = '', $object = '') {
	foreach($fields as $field) {
		global $post;
		
		if(!empty($field['fields']) && $field['type'] == 'fields') {
			$field['fields'] = wpd_instance_fields($field['fields'], $instance_type);
		} else {
			if(empty($field['name']) ) {
				$new_fields[] = $field;
				continue;
			}
				
			$name = $field['name'];
			$name = str_replace('[]', '', $name);
			$name = str_replace(']', '', $name);
			$name = explode('[', $name);
			
			if( $instance_type == 'post_meta' )
				$value = get_post_meta($post->ID, $name[0], true);
			elseif( $instance_type == 'user_meta' ) {
				$value = get_user_meta($object->ID, $name[0], true);
			} elseif( $instance_type == 'term_meta' )
				$value = get_term_meta($object->term_id, $name[0], true);
			else
				$value = get_option($name[0]);
				
			unset($name[0]);
			foreach($name as $n) {
				if( empty($value[$n]) ) {
					$value = '';
					break;
				}	
						
				$value = $value[$n];
			}
			
			$field['value'] = $value;
		}
			
		$new_fields[] = $field;
	}
		
	return $new_fields;
}

function is_assoc($arr) {
    return array_keys($arr) !== range(0, count($arr) - 1);
}