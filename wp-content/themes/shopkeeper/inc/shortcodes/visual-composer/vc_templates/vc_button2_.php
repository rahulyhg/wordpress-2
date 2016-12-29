<?php
extract(shortcode_atts(array(
    'link' => '',
    'title' => 'Text on the button',
    'color' => '',
    'icon' => '',
    'size' => '',
    'style' => '',
    'el_class' => '',
	'align' => '',
	'text_color' => '',
	'bg_color' => ''
), $atts));

$class = 'vc_btn';
//parse link
$link = ($link=='||') ? '' : $link;
$link = vc_build_link($link);
$a_href = $link['url'];
$a_title = $link['title'];
$a_target = $link['target'];

$class .= ($color!='') ? ' vc_btn_'.$color : '';
$class .= ($size!='') ? ' vc_btn_'.$size : '';
$class .= ($style!='') ? ' vc_btn_'.$style : '';

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' '.$class.$el_class, $this->settings['base']);
?>
<div style="text-align:<?php echo $align; ?>;">
    <a class="<?php echo esc_attr(trim($css_class)); ?>" href="<?php echo $a_href; ?>" title="<?php echo esc_attr($a_title); ?>" target="<?php echo $a_target; ?>" style="color:<?php echo $text_color; ?>; background-color:<?php echo $bg_color; ?>">
		<?php if ( ($style!='') && ( ($style == 'square_outlined') || ($style == 'rounded_outlined') ) ) { ?>
			<span class="outlined_background" style="background-color:<?php echo $bg_color; ?>"></span>
        <?php } ?>
		<?php echo '<span class="button_text">'.$title.'</span>'; ?>
    </a>
</div>
<?php echo $this->endBlockComment('vc_button') . "\n";