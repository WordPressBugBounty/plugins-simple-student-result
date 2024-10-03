<h2 class="plugin_heading">All <?php echo esc_attr( get_option('ssr_settings_ssr_item4') ); ?>(s)</h2>
<h3 class="arial_fonts">Tips 1: You can sort results by clicking the tab. click twice to sort by ascending and descending order. <br>Tips 2: You can search from results by writing a value in search box</h3>
<h1 style="color:orange">The data shared by this plugin will be available publicly . So,This is <b>STRONGLY</b> recommended that Do not share any personal information of any person.</h1>
<?php
global $wpdb;
$student_count =$wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix.SSR_TABLE );
echo '<div id="dbinfo" class="arial_fonts">';
if ($student_count>1) {echo esc_attr($student_count). " ".esc_attr( get_option('ssr_settings_ssr_item4') )."s are in Database";}else{if ($student_count>0){echo esc_attr($student_count). " ".esc_attr( get_option('ssr_settings_ssr_item4') )." is in Database";}else{echo "No ".esc_attr( get_option('ssr_settings_ssr_item4') )." is in Database";}}
echo '</div><br><br>';
if ($student_count>0) echo '<div id="example1"></div>';
		$query = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix.SSR_TABLE);
		$i=0;$q='';
foreach($query as $row){
	$q .="{'".esc_attr( get_option('ssr_settings_ssr_item9') )."':'". esc_attr( $row->rid)."', '".esc_attr( get_option('ssr_settings_ssr_item10') )."':'".esc_attr( $row->roll)."', '".esc_attr( get_option('ssr_settings_ssr_item11') )."':'".esc_attr( $row->stdname)."', '".esc_attr( get_option('ssr_settings_ssr_item12') )."':'".esc_attr( $row->fathersname)."', '".esc_attr( get_option('ssr_settings_ssr_item13') )."':'".esc_attr( $row->pyear)."', '".esc_attr( get_option('ssr_settings_ssr_item14'))."':'".esc_attr( $row->cgpa )."', '".esc_attr( get_option('ssr_settings_ssr_item15') )."':'".esc_attr( $row->subject)."'}";
	$i++;
	if($i < count($query)) {$q=$q.',';}
} ?>
<script>jQuery('#example1').columns({data: [<?php echo wp_kses_data($q); ?>]});
			
jQuery( window ).load(function() {
  jQuery('#ssr_img_left_id').attr("src", "<?php echo SSR_PLUGIN_URL.'/img/arrow-left.png'; ?>");
  jQuery('#ssr_img_right_id').attr("src", "<?php echo SSR_PLUGIN_URL.'/img/arrow-right.png'; ?>");
});
</script>