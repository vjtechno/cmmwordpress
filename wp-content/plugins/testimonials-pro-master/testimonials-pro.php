<?php

/*
Plugin Name: Testimonials Pro
Plugin URI: http://freelance-gur.us/wordpress-plugins/testimonials-pro
Description: Display testimonials on your website in various ways and dimensions.
- Add a testimonials widget to your pages
- Categorize testimonials and display different categories on different places
- Display company logo in the testimonials for greater effect
Author: Dimitar Atanasov
Version: 1.0
Author URI: http://freelance-gur.us/meet-the-team
Tags: Insert testimonials, Testimonial category, Company logo, Testimonials widget, Testimonials plugin, Text scroll
License: GPLv2 or later
*/


global $wpdb, $wp_version;
define("WP_TP_TABLE", $wpdb->prefix . "testimonials_pro");

function TP_Show() 
{
	global $wpdb;
	
	$TP_TextLength = get_option('TP_TextLength');
	
	
	$TP_category = get_option('TP_category');
	$TP_MoreText = get_option('TP_MoreText');
	$TP_MoreLink = get_option('TP_MoreLink');
	
	
	if($TP_category == "" ) { $TP_category="Homepage"; }

	$sSql = "select TP_path,TP_link,TP_target,TP_name,TP_desc from ".WP_TP_TABLE." where 1=1 and TP_status='YES'";
	$sSql = $sSql . " and TP_category='".$TP_category."'";
	$sSql = $sSql . " ORDER BY TP_order"; 
	$TP_data = $wpdb->get_results($sSql);
	
	?>
    <style type="text/css">
	.TP-regimage img {
		float: right;
		vertical-align:bottom;
		padding: 3px;
	}
	.TP_navigation {height:20px; width:45px; float:left; }
	.TP_prev, .TP_next { background:url('<?php echo get_option('siteurl'); ?>/wp-content/plugins/testimonials-pro/navigation-20px.png'); width:20px; height:20px; float:left; cursor:pointer; } 
	.TP_next {background-position:20px 0 !important; margin-left:5px; }
	.tp-arrow {background:url('<?php echo get_option('siteurl'); ?>/wp-content/plugins/testimonials-pro/tp-arrow.png'); width:20px; height:10px; display:block; position:absolute; bottom:-10px; left:20px; }
	</style>

    <?php
	if ( ! empty($TP_data) ) 
	{
		$TP_count = 0; 
		$TPhtml = "";
		foreach ( $TP_data as $TP_data ) 
		{
		
			$TP_path = mysql_real_escape_string(trim($TP_data->TP_path));
			$TP_link = mysql_real_escape_string(trim($TP_data->TP_link));
			$TP_target = mysql_real_escape_string(trim($TP_data->TP_target));
			$TP_name = trim($TP_data->TP_name);
			$TP_desc = trim($TP_data->TP_desc);
			
			if(is_numeric($TP_TextLength))
			{
				if($TP_TextLength <> "" && $TP_TextLength > 0 )
				{
					$TP_desc = substr($TP_desc, 0, $TP_TextLength);
				}
			}
			
				$TP_countP =$TP_count+1;
			$TP_div_opacity = ($TP_count==0)?'opacity:1;display:inherit; ':'opacity:0; display:none;';
			$TPhtml = $TPhtml . "<div class='TP_div' id='TP_div_".$TP_countP."' style='".$TP_div_opacity."padding:1px 0px 1px 0px;'>"; 
			
			if($TP_desc <> "" )
			{
				$TPhtml = $TPhtml . "<div style='padding:7px; margin-bottom:17px; border:1px solid #CCCCCC; position:relative;'>$TP_desc<span class='tp-arrow'></span></div>";	
				$TPjsjs = $TPjsjs . "<div style=\'padding:7px; margin-bottom:17px; border:1px solid #CCCCCC;position:relative;\'>$TP_desc<span class='tp-arrow'></span</div>";	
			}
			if($TP_path <> "" )
			{
				$TPhtml = $TPhtml . "<div class='TP-regimage'>"; 
				$TPjsjs = "<div class=\'TP-regimage\'>"; 
				if($TP_link <> "" ) 
				{ 
					$TPhtml = $TPhtml . "<a href='$TP_link'>"; 
					$TPjsjs = $TPjsjs . "<a href=\'$TP_link\'>";
				} 
				$TPhtml = $TPhtml . "<img src='$TP_path' al='Test' />"; 
				$TPjsjs = $TPjsjs . "<img src=\'$TP_path\' al=\'Test\' />";
				if($TP_link <> "" ) 
				{ 
					$TPhtml = $TPhtml . "</a>"; 
					$TPjsjs = $TPjsjs . "</a>";
				}
				$TPhtml = $TPhtml . "</div>";
				$TPjsjs = $TPjsjs . "</div>";
			}
			
			if($TP_name <> "" )
			{
				$TPhtml = $TPhtml . "<div style='padding-top:7px;'><strong>";	
				$TPjsjs = $TPjsjs . "<div style=\'padding-top:7px;\'><strong>";				
				if($TP_link <> "" ) 
				{ 
					$TPhtml = $TPhtml . "<a href='$TP_link'>"; 
					$TPjsjs = $TPjsjs . "<a href=\'$TP_link\'>";
				} 
				$TPhtml = $TPhtml . $TP_name;
				$TPjsjs = $TPjsjs . $TP_name;
				if($TP_link <> "" ) 
				{ 
					$TPhtml = $TPhtml . "</a>"; 
					$TPjsjs = $TPjsjs . "</a>";
				}
				$TPhtml = $TPhtml . "</strong></div>";
				$TPjsjs = $TPjsjs . "</strong></div>";
			}
			
		
			
			$TPhtml = $TPhtml . "</div>";
			
			
			$TP_x = $TP_x . "TP[$TP_count] = '<div class=\'TP_div\' style=\'padding:1px 0px 1px 0px;\'>$TPjsjs</div>'; ";	
			$TP_count++;
		}
		
		


		?>
<div style="padding-top:8px;padding-bottom:8px; position:relative; ">
  <div style="text-align:left;vertical-align:middle;text-decoration: none;overflow: hidden; position: relative; margin-left: 3px; " id="TPHolder"> <?php echo $TPhtml; ?> </div>
  <div class="TP_navigation">	
  	<div class="TP_prev" onclick="displayNT('')"></div>
	<div class="TP_next" onclick="displayNT('')"></div>
  </div><input type="hidden" id="tp_count" value="1"/> <input type="hidden" id="tp_count_all" value="<?php echo $TP_count ?>" />
<?php if($TP_MoreText!=''){ ?><a href="<?php echo $TP_MoreLink ?>" style="float:right"><?php echo $TP_MoreText ?></a><?php } ?>
</div>




<?php
	}
	else
	{
		echo "<div style='padding-bottom:5px;padding-top:5px;'>Nothing found.</div>";
	}
	
}

function TP_Install() 
{
	
	global $wpdb;

	if($wpdb->get_var("show tables like '". WP_TP_TABLE . "'") != WP_TP_TABLE) 
	{
		$sSql = "CREATE TABLE IF NOT EXISTS `". WP_TP_TABLE . "` (";
		$sSql = $sSql . "`TP_id` INT NOT NULL AUTO_INCREMENT ,";
		$sSql = $sSql . "`TP_path` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,";
		$sSql = $sSql . "`TP_link` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,";
		$sSql = $sSql . "`TP_target` VARCHAR( 50 ) NOT NULL ,";
		$sSql = $sSql . "`TP_name` VARCHAR( 200 ) NOT NULL ,";
		$sSql = $sSql . "`TP_desc` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,";
		$sSql = $sSql . "`TP_order` INT NOT NULL ,";
		$sSql = $sSql . "`TP_status` VARCHAR( 10 ) NOT NULL ,";
		$sSql = $sSql . "`TP_category` VARCHAR( 100 ) NOT NULL ,";
		$sSql = $sSql . "`TP_date` INT NOT NULL ,";
		$sSql = $sSql . "PRIMARY KEY ( `TP_id` )";
		$sSql = $sSql . ")";
		$wpdb->query($sSql);
		$sSqlS = "INSERT INTO `". WP_TP_TABLE . "` (`TP_path`, `TP_link`, `TP_target` , `TP_name` , `TP_desc` , `TP_order` , `TP_status` , `TP_category` , `TP_date`)"; 
		$sSql = $sSqlS . "VALUES ('".get_option('siteurl')."/wp-content/plugins/testimonials-pro/companyLogo1.gif','http://freelance-gur.us/wordpress-plugins/testimonials-pro','_blank','Mike Brennan','I really got excellent service and training and would highly recommend to others. They have succeeded in creating training courses which are specific and relevant to the needs of our organisation.','1', 'YES', 'Homepage', '0000-00-00 00:00:00');";
		$wpdb->query($sSql);
$sSql = $sSqlS . "VALUES ('".get_option('siteurl')."/wp-content/plugins/testimonials-pro/companyLogo2.jpg','http://freelance-gur.us/wordpress-plugins/testimonials-pro','_blank','Louisa Farrell','A++ team and service. Love the way they work! Would gladly recommend to everyone in the market for this sort of services.','1', 'YES', 'About Us Pages', '0000-00-00 00:00:00');";
		$wpdb->query($sSql);
		
	}
	
	add_option('TP_name', "What our clients say");


	add_option('TP_TextLength', "9999");
	add_option('TP_category', "Homepage");
	add_option('TP_MoreText', "More Testimonials");
	add_option('TP_MoreLink', "#");
}

function TP_Control() 
{
global $wpdb;
	$TP_name = get_option('TP_name');
	
	$sSql1 = "select TP_category from ".WP_TP_TABLE." GROUP BY TP_category"; 
		$TP_data1 = $wpdb->get_results($sSql1); $TP_category='';
	
			foreach ( $TP_data1 as $TP_data1 ) 
		{
			$TP_cat=mysql_real_escape_string(trim($TP_data1->TP_category));	
			$TP_category .= '<option value="'.$TP_cat.'">'.$TP_cat.'</option>';	
		}
	$TP_TextLength = get_option('TP_TextLength');
	$TP_MoreText = get_option('TP_MoreText');
	$TP_MoreLink = get_option('TP_MoreLink');
	if ($_POST['TP_submit']) 
	{
		$TP_name = stripslashes($_POST['TP_name']);
		
		
		$TP_TextLength = stripslashes($_POST['TP_TextLength']);
		$TP_category = stripslashes($_POST['TP_category']);
		$TP_MoreText = stripslashes($_POST['TP_MoreText']);
		$TP_MoreLink = stripslashes($_POST['TP_MoreLink']);
		update_option('TP_name', $TP_name );	
		update_option('TP_TextLength', $TP_TextLength );
		update_option('TP_category', $TP_category );
		update_option('TP_MoreText', $TP_MoreText );
		update_option('TP_MoreLink', $TP_MoreLink );
	}
	
	echo '<p>Title:<br><input  style="width: 200px;" type="text" value="';
	echo $TP_name . '" name="TP_name" id="TP_name" /></p>';
	

	

	echo '<p>Limit Text Length:<br><input  style="width: 100px;" type="text" value="';
	echo $TP_TextLength . '" name="TP_TextLength" id="TP_TextLength" /> (Number of characters)</p>';
	
	echo '<p>Category:<br><select name="TP_category" id="TP_category" > 
	'.$TP_category.'
	</select> </p>';
	
	echo '<p>More Testimonials link text:<br><input  style="width: 100px;" type="text" value="';
	echo $TP_MoreText . '" name="TP_MoreText" id="TP_MoreText" /> (Leave empty to remove)</p>';
	
		echo '<p>More Testimonials URL:<br><input  style="width: 100px;" type="text" value="';
	echo $TP_MoreLink . '" name="TP_MoreLink" id="TP_MoreLink" /> </p>';
	
	echo '<input type="hidden" id="TP_submit" name="TP_submit" value="1" />';
	
}

function TP_Widget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo get_option('TP_name');
	echo $after_title;
	TP_Show();
	echo $after_widget;
}

function TP_Admin_Options() 
{
	?>
<div class="wrap">
  <?php
  	global $wpdb;
    $title = __('Testimonials Pro');
    $mainurl = get_option('siteurl')."/wp-admin/options-general.php?page=testimonials-pro/testimonials-pro.php";
    $DID=@$_GET["DID"];
    $AC=@$_GET["AC"];
    $submittext = "Insert Testimonial";
	if($AC <> "DEL" and trim($_POST['TP_link']) <>"")
    {
		$catSql=($_POST['TP_category_new']!='')?mysql_real_escape_string(trim($_POST['TP_category_new'])):mysql_real_escape_string(trim($_POST['TP_category']));
			if($_POST['TP_id'] == "" )
			{
					$sql = "insert into ".WP_TP_TABLE.""
					. " set `TP_path` = '" . mysql_real_escape_string(trim($_POST['TP_path']))
					. "', `TP_link` = '" . mysql_real_escape_string(trim($_POST['TP_link']))
					. "', `TP_target` = '" . mysql_real_escape_string(trim($_POST['TP_target']))
					. "', `TP_name` = '" . mysql_real_escape_string(trim($_POST['TP_name']))
					. "', `TP_desc` = '" . mysql_real_escape_string(trim($_POST['TP_desc']))
					. "', `TP_order` = '" . mysql_real_escape_string(trim($_POST['TP_order']))
					. "', `TP_status` = '" . mysql_real_escape_string(trim($_POST['TP_status']))
					. "', `TP_category` = '" . $catSql
					. "'";	
			}
			else
			{
					$sql = "update ".WP_TP_TABLE.""
					. " set `TP_path` = '" . mysql_real_escape_string(trim($_POST['TP_path']))
					. "', `TP_link` = '" . mysql_real_escape_string(trim($_POST['TP_link']))
					. "', `TP_target` = '" . mysql_real_escape_string(trim($_POST['TP_target']))
					. "', `TP_name` = '" . mysql_real_escape_string(trim($_POST['TP_name']))
					. "', `TP_desc` = '" . mysql_real_escape_string(trim($_POST['TP_desc']))
					. "', `TP_order` = '" . mysql_real_escape_string(trim($_POST['TP_order']))
					. "', `TP_status` = '" . mysql_real_escape_string(trim($_POST['TP_status']))
					. "', `TP_category` = '" .$catSql
					. "' where `TP_id` = '" . $_POST['TP_id'] 
					. "'";	
			}
			$wpdb->get_results($sql);
    }
    
    if($AC=="DEL" && $DID > 0)
    {
        $wpdb->get_results("delete from ".WP_TP_TABLE." where TP_id=".$DID);
    }
    
    if($DID<>"" and $AC <> "DEL")
    {
        $data = $wpdb->get_results("select * from ".WP_TP_TABLE." where TP_id=$DID limit 1");
        if ( empty($data) ) 
        {
           echo "<div id='message' class='error'><p>No data available! use below form to create!</p></div>";
           return;
        }
        $data = $data[0];
        if ( !empty($data) ) $TP_id_x = htmlspecialchars(stripslashes($data->TP_id)); 
		if ( !empty($data) ) $TP_path_x = htmlspecialchars(stripslashes($data->TP_path)); 
        if ( !empty($data) ) $TP_link_x = htmlspecialchars(stripslashes($data->TP_link));
		if ( !empty($data) ) $TP_target_x = htmlspecialchars(stripslashes($data->TP_target));
        if ( !empty($data) ) $TP_name_x = htmlspecialchars(stripslashes($data->TP_name));
		if ( !empty($data) ) $TP_desc_x = htmlspecialchars(stripslashes($data->TP_desc));
		if ( !empty($data) ) $TP_order_x = htmlspecialchars(stripslashes($data->TP_order));
		if ( !empty($data) ) $TP_status_x = htmlspecialchars(stripslashes($data->TP_status));
		if ( !empty($data) ) $TP_category_x = htmlspecialchars(stripslashes($data->TP_category));
        $submittext = "Update Testimonial";
    }
		$sSql1 = "select TP_category from ".WP_TP_TABLE." GROUP BY TP_category"; 
		$TP_data1 = $wpdb->get_results($sSql1); $TP_category='';
			foreach ( $TP_data1 as $TP_data1 ) 
		{
			$TP_cat=mysql_real_escape_string(trim($TP_data1->TP_category));	
			$TP_catselected=($TP_category_x==$TP_cat)?'selected="selected"':'';
			$TP_category .= '<option value="'.$TP_cat.'" '.$TP_catselected.'>'.$TP_cat.'</option>';	
		}
	
    ?>
  <h2><?php echo wp_specialchars( $title ); ?></h2>

<?php if($DID==NULL){ ?>
 <p style="color:#666"> Useful information: You can add the testimonials to your site both as a widget in Appearance>Widgets or as a shortcode on your posts and pages (full testimonials). Just insert [testimonials-pro] anywhere you would like the testimonials to appear.</p>
      <?php
      
	$data = $wpdb->get_results("select * from ".WP_TP_TABLE." order by TP_category,TP_order");
	if ( empty($data) ) 
	{ 
		echo "<div id='message' class='error'>No data available! use below form to create!</div>";
		return;
	}
	?>
    <form name="frm_TP_display" method="post">
      <table width="100%" class="widefat" id="straymanage">
        <thead>
          <tr>
            <th width="10%" align="left" scope="col">Category
              </td>
            <th width="52%" align="left" scope="col">Name
              </td>
            
            <th width="8%" align="left" scope="col">Order
              </td>
            <th width="7%" align="left" scope="col">Visible
              </td>
            <th width="13%" align="left" scope="col">Change
              </td>
          </tr>
        </thead>
        <?php 
        $i = 0;
        foreach ( $data as $data ) { 
		if($data->TP_status=='YES') { $displayisthere="True"; }
        ?>
        <tbody>
          <tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
            <td align="left" valign="middle"><?php echo(stripslashes($data->TP_category)); ?></td>
            <td align="left" valign="middle"><?php echo(stripslashes($data->TP_name)); ?></td>
           
            <td align="left" valign="middle"><?php echo(stripslashes($data->TP_order)); ?></td>
            <td align="left" valign="middle"><?php echo(stripslashes($data->TP_status)); ?></td>
            <td align="left" valign="middle"><a href="options-general.php?page=testimonials-pro/testimonials-pro.php&DID=<?php echo($data->TP_id); ?>">Edit</a> &nbsp; <a onClick="javascript:TP_delete('<?php echo($data->TP_id); ?>')" href="javascript:void(0);">Delete</a></td>
          </tr>
        </tbody>
        <?php $i = $i+1; } ?>
        <?php if($displayisthere<>"True") { ?>
        <tr>
          <td colspan="6" align="center" style="color:#FF0000" valign="middle">No visible testimonial available! </td>
        </tr>
        <?php } ?>
      </table>
    </form>
    <?php } ?>
       
  <h3><?php if($DID==NULL) echo 'Enter new testimonial'; else echo 'Edit testimonial'?></h3>
  <form name="TP_form" method="post" action="<?php echo $mainurl; ?>" onsubmit="return TP_submit()"  >
    <table width="100%">
          <tr>
        <td colspan="2" align="left" valign="middle">Name:</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><input name="TP_name" type="text" id="TP_name" value="<?php echo $TP_name_x; ?>" size="125" /></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle">Testimonial:</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><textarea name="TP_desc"  style="width: 660px" id="TP_desc" ><?php echo $TP_desc_x; ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle">Image of person or company (link/url):</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><input name="TP_path" type="text" id="TP_path" value="<?php echo $TP_path_x; ?>" size="125" /> (Upload an image through the media uploader then copy the url here)</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle">Link image and name to:</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><input name="TP_link" type="text" id="TP_link" value="<?php echo $TP_link_x; ?>" size="125" /></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle">Target option:</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><input name="TP_target" type="text" id="TP_target" value="<?php echo $TP_target_x; ?>" size="50" />
          ( _blank, _parent, _self, _new )</td>
      </tr>

      <tr>
        <td colspan="2" align="left" valign="middle">Select category:</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle">
        <select name="TP_category" id="TP_category" >
	<?php echo $TP_category ?>
	</select><br /> OR create new category:<br />
        <input name="TP_category_new" type="text" id="TP_category_new" value="" size="50" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle">Visible:</td>
        <td align="left" valign="middle">Order number:</td>
      </tr>
      <tr>
        <td width="22%" align="left" valign="middle"><select name="TP_status" id="TP_status">
            <option value="">Select</option>
            <option value='YES' <?php echo 'selected'  ?> >Yes</option>
            <option value='NO' >No</option>
          </select></td>
        <td width="78%" align="left" valign="middle"><input name="TP_order" type="text" id="TP_rder" size="10" value="<?php echo $TP_order_x; ?>" maxlength="3" /></td>
      </tr>
      <tr>
        <td height="35" colspan="2" align="left" valign="bottom"><table width="100%">
            <tr>
              <td width="50%" align="left"><input name="publish" lang="publish" class="button-primary" value="<?php echo $submittext?>" type="submit" />
                <input name="publish" lang="publish" class="button-primary" onclick="TP_redTPect()" value="Cancel" type="button" /></td>
              <td width="50%" align="right"></td>
            </tr>
          </table></td>
      </tr>
      <input name="TP_id" id="TP_id" type="hidden" value="<?php echo $TP_id_x; ?>">
    </table>
  </form>
  <div class="tool-box">

  
    <h2><?php echo wp_specialchars( 'About Plugin' ); ?></h2>
    Check out tips, advices and new versions at <a target="_blank" href='http://freelance-gur.us/wordpress-plugins/testimonials-pro'>Freelance Gurus</a>. <br />

  </div>
</div>
<?php
}

function TP_Add_To_Menu() 
{
	add_menu_page('Testimonials Pro', 'Testimonials Pro', 'manage_options', 'testimonials-pro/testimonials-pro.php', 'TP_Admin_Options', '', '81');
	
}

function TP_Init()
{
	if(function_exists('register_sidebar_widget')) 
	{
		register_sidebar_widget('Testimonials Pro', 'TP_Widget');
	}
	
	if(function_exists('register_widget_control')) 
	{
		register_widget_control(array('Testimonials Pro', 'widgets'), 'TP_Control');
	} 
}

function TP_Deactivation() 
{
	
}

if (is_admin()) 
{
	add_action('admin_menu', 'TP_Add_To_Menu');
}

function TP_scripts_method() {
  
    wp_register_script( 'testimonials-pro', get_option('siteurl').'/wp-content/plugins/testimonials-pro/testimonials-pro.js');
    wp_enqueue_script( 'testimonials-pro' );

}    

function TP_scripts_admin(){
		    wp_register_script( 'testimonials-pro-setting', get_option('siteurl').'/wp-content/plugins/testimonials-pro/testimonials-pro-setting.js');
    wp_enqueue_script( 'testimonials-pro-setting' );
	} 

add_action('wp_enqueue_scripts', 'TP_scripts_method');
add_action('admin_enqueue_scripts', 'TP_scripts_admin');
add_shortcode( 'testimonials-pro', 'TP_Show' );
add_action("plugins_loaded", "TP_Init");
register_activation_hook(__FILE__, 'TP_Install');
register_deactivation_hook(__FILE__, 'TP_Deactivation');
add_action('admin_menu', 'TP_Add_To_Menu');

?>
