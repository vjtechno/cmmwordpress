<?php

function TP_tab_Free_Shortcode_ultimate_body($postid){
	
		$tcpfeaturess = get_post_meta( $postid, 'custom_accordion_wordpresspro_columns');
		$tp_custom_tabultimate_shortcode_tabs_themes = get_post_meta( $postid, 'tp_custom_tabultimate_shortcode_tabs_themes', true );
		$tp_custom_tabultimate_shortcode_tabs_activated = get_post_meta( $postid, 'tp_custom_tabultimate_shortcode_tabs_activated', true );
		$tp_custom_tabultimate_shortcode_tabs_positions = get_post_meta( $postid, 'tp_custom_tabultimate_shortcode_tabs_positions', true );
		$tp_custom_tabultimate_shortcode_tabs_openhover = get_post_meta( $postid, 'tp_custom_tabultimate_shortcode_tabs_openhover', true );
		$custom_tabultimate_shortcode_in_transition = get_post_meta( $postid, 'custom_tabultimate_shortcode_in_transition', true );
		$custom_tabultimate_shortcode_out_transition = get_post_meta( $postid, 'custom_tabultimate_shortcode_out_transition', true );

		$custom_tabultimate_shortcode_title_font_size = get_post_meta( $postid, 'custom_tabultimate_shortcode_title_font_size', true );
		if(empty($custom_tabultimate_shortcode_title_font_size))
		{
			$custom_tabultimate_shortcode_title_font_size = "15";
		}
		
		$custom_tabultimate_shortcode_title_font_color = get_post_meta( $postid, 'custom_tabultimate_shortcode_title_font_color', true );
		if(empty($custom_tabultimate_shortcode_title_font_color))
		{
			$custom_tabultimate_shortcode_title_font_color = "#21759b";
		}
		
		$custom_tabultimate_shortcode_active_font_color = get_post_meta( $postid, 'custom_tabultimate_shortcode_active_font_color', true );
		if(empty($custom_tabultimate_shortcode_active_font_color))
		{
			$custom_tabultimate_shortcode_active_font_color = "#000";
		}		
		
		$custom_tabultimate_shortcode_active_bg_color = get_post_meta( $postid, 'custom_tabultimate_shortcode_active_bg_color', true );
		if(empty($custom_tabultimate_shortcode_active_bg_color))
		{
			$custom_tabultimate_shortcode_active_bg_color = "#fff";
		}
		
		$custom_tabultimate_shortcode_content_bg_color = get_post_meta( $postid, 'custom_tabultimate_shortcode_content_bg_color', true );
		if(empty($custom_tabultimate_shortcode_content_bg_color))
		{
			$custom_tabultimate_shortcode_content_bg_color = "#f6f6f6";
		}		
		
		
		
		
		$tabmultiid = rand(1,1000);
		
		if($tp_custom_tabultimate_shortcode_tabs_themes=="theme1")
			
			{
				$logotesting ='';
				$count = 0;
				$logotesting .='
				<div id="tpultimatestabs-acitve-'.$tabmultiid.'">
					<ul class="tabs">';
					foreach ($tcpfeaturess as $tcpfeature) {
					$logotesting .='<li><a href="#tab1-'.$count.'"><i class="fa '.$tcpfeature['field-14'].'"></i>'.$tcpfeature['custom_accordions_pro_title'].'</a></li>';
					$count++;
					};
					
				
				
				
					$logotesting .='	
					</ul>
					<section class="tab_content_wrapper">';
					$count = 0;
					foreach ($tcpfeaturess as $tcpfeature) {
					$logotesting .='<article class="tab_content" id="tab1-'.$count.'">';
					$logotesting .= do_shortcode(wpautop($tcpfeature['custom_accordions_pro_details']));
					$logotesting .='</article>';
					$count++;
					};
						$logotesting .='
					</section>
				</div>
				
				';

						
				$logotesting.='
					<script type="text/javascript">
						jQuery(document).ready(function($){
							$("#tpultimatestabs-acitve-'.$tabmultiid.'").jQueryTab({
								initialTab:'.$tp_custom_tabultimate_shortcode_tabs_activated.',
								cookieName: "active-tab-1",
								tabPosition : "top",
								collapsible:true,
								openOnhover: false,
								responsive:true,
								useCookie: false,
								tabInTransition: "'.$custom_tabultimate_shortcode_in_transition.'",
								tabOutTransition: "'.$custom_tabultimate_shortcode_out_transition.'",
								accordionIntime:500,                // time for animation IN (1000 = 1s)
								accordionOutTime:400,
								before: function(){ console.log("Hello from before!"); },			// function to call before tab is opened
								after: function(){ console.log("Hello from after!") }	
							});
						});
					</script>
				';				
				$logotesting.='
				<style type="text/css">
					#tpultimatestabs-acitve-'.$tabmultiid.' .tabs{
					  border: 1px solid #ccc;
					  box-shadow: none;
					  list-style: outside none none;
					  margin: 0;
					  overflow: hidden;
					  padding: 0;
					}
					#tpultimatestabs-acitve-'.$tabmultiid.' .tabs li {
					  float: left;
					  background-color:'.$custom_tabultimate_shortcode_active_bg_color.';
					}
					#tpultimatestabs-acitve-'.$tabmultiid.' .tabs li a {
					  border-left: 1px solid #ccc;
					  box-shadow: none;
					  color: '.$custom_tabultimate_shortcode_title_font_color.';
					  display: block;
					  font-weight: bold;
					  padding: 15px 20px;
					  font-size:'.$custom_tabultimate_shortcode_title_font_size.'px;
					}
					#tpultimatestabs-acitve-'.$tabmultiid.' .tabs .active a {
					  color: '.$custom_tabultimate_shortcode_active_font_color.';
					}
					#tpultimatestabs-acitve-'.$tabmultiid.' .tabs li:first-child a {
					  border-left: medium none;
					}
					#tpultimatestabs-acitve-'.$tabmultiid.' .tab_content {
					  background: '.$custom_tabultimate_shortcode_content_bg_color.';
					  padding: 15px;
					  transition: all 0.6s ease-in-out 0s;
					}
				</style>
				';
				
				return $logotesting;
			}
		else
			{


			}

}

?>