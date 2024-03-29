<?php
	$qryResult = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}duplicator_packages` ORDER BY id DESC", ARRAY_A);
	$qryStatus = $wpdb->get_results("SELECT status FROM `{$wpdb->prefix}duplicator_packages` WHERE status >= 100", ARRAY_A);
	$totalElements	= count($qryResult);
	$statusCount	= count($qryStatus);
	$package_debug	= DUP_Settings::Get('package_debug');
    $ajax_nonce		= wp_create_nonce('package_list');
	$ui_create_frmt = is_numeric(DUP_Settings::Get('package_ui_created')) ? DUP_Settings::Get('package_ui_created') : 1;
?>

<style>
	div#dup-list-alert-nodata {padding:70px 20px;text-align:center; font-size:20px; line-height:26px}
	div.dup-notice-msg {border:1px solid silver; padding: 10px; border-radius: 5px; width: 550px; 
		margin:40px auto 0px auto; font-size:12px; text-align: left; word-break:normal;
		background: #fefcea; 
		background: -moz-linear-gradient(top,  #fefcea 0%, #efe5a2 100%);
		background: -ms-linear-gradient(top,  #fefcea 0%,#efe5a2 100%);
		background: linear-gradient(to bottom,  #fefcea 0%,#efe5a2 100%);
	}
	input#dup-bulk-action-all {margin:0px;padding:0px 0px 0px 5px;}
	button.dup-button-selected {border:1px solid #000 !important; background-color:#dfdfdf !important;}
	div.dup-quick-start {font-style:italic; font-size: 13px; line-height: 18px; margin-top: 15px}
	
	/* Table package details */
	table.dup-pack-table {word-break:break-all;}
	table.dup-pack-table th {white-space:nowrap !important;}
	table.dup-pack-table td.pack-name {text-overflow:ellipsis; white-space:nowrap}
	table.dup-pack-table td.pack-name sup {font-style:italic;font-size:10px; cursor: pointer; display:inline-block; margin-top: -5px }
	table.dup-pack-table input[name="delete_confirm"] {margin-left:15px}
	table.dup-pack-table td.fail {border-left: 4px solid #d54e21;}
	table.dup-pack-table td.pass {border-left: 4px solid #2ea2cc;}
	tr.dup-pack-info td {white-space:nowrap; padding:10px 30px 0px 7px;}
	tr.dup-pack-info td.get-btns {text-align:right; padding:3px 5px 6px 0px !important;}
	tr.dup-pack-info td.get-btns button {box-shadow:none}
	textarea.dup-pack-debug {width:98%; height:300px; font-size:11px; display:none}
	td.error-msg a {color:maroon}
	td.error-msg a i {color:maroon}
	td.error-msg span {display:inline-block; padding:7px 18px 0px 0px; color:maroon}
	div#dup-help-dlg i {display: inline-block; width: 15px; padding:2px;line-height:28px; font-size:14px;}
</style>

<form id="form-duplicator" method="post">

<!-- ====================
TOOL-BAR -->
<table id="dup-toolbar">
	<tr valign="top">
		<td style="white-space: nowrap">
			<select id="dup-pack-bulk-actions">
				<option value="-1" selected="selected"><?php _e("Bulk Actions", 'duplicator') ?></option>
				<option value="delete" title="<?php _e("Delete selected package(s)", 'duplicator') ?>"><?php _e("Delete", 'duplicator') ?></option>
			</select>
			<input type="button" id="dup-pack-bulk-apply" class="button action" value="<?php _e("Apply", 'duplicator') ?>" onclick="Duplicator.Pack.ConfirmDelete()">
			<span class="btn-separator"></span>
			<a href="javascript:void(0)" class="button"  title="<?php _e("Get Help", 'duplicator') ?>" onclick="Duplicator.Pack.showHelp()">
				<?php echo ($statusCount == 1)  
						? '<i class="fa fa-question-circle" style="color:green"></i>'
						: '<i class="fa fa-question-circle grey-icon"></i>';
				?>
			</a>
			<a href="admin.php?page=duplicator-settings&tab=package" class="button grey-icon" title="<?php _e("Settings", 'duplicator') ?>"><i class="fa fa-gear"></i></a>
		</td>
		<td>						
			<span><i class="fa fa-archive"></i> <?php _e("Packages", 'duplicator'); ?></span>
			<a href="?page=duplicator&tab=new1" class="add-new-h2"><?php _e("Create New", 'duplicator'); ?></a>
		</td>
	</tr>
</table>	


<?php if($totalElements == 0)  : ?>
	<!-- ====================
	NO-DATA MESSAGES-->
	<table class="widefat dup-pack-table">
		<thead><tr><th>&nbsp;</th></tr></thead>
		<tbody>
			<tr>
				<td>
				<div id='dup-list-alert-nodata'>
					<i class="fa fa-archive"></i> 
					<?php _e("No Packages Found.", 'duplicator'); ?><br/>
					<?php _e("Click the 'Create New' button to build a package.", 'duplicator'); ?><br/>
					<div class="dup-quick-start">
						<?php _e("New to Duplicator?", 'duplicator'); ?><br/>
						<a href="https://snapcreek.com/duplicator/docs/quick-start/?utm_source=duplicator_free&utm_medium=wordpress_plugin&utm_content=packages_empty&utm_campaign=quick_start" target="_blank">
							<?php _e("Check out the 'Quick Start' guide!", 'duplicator'); ?>
						</a>
					</div>
					<div style="height:75px">&nbsp;</div>
				</div>
				</td>
			</tr>
		</tbody>
		<tfoot><tr><th>&nbsp;</th></tr></tfoot>
	</table>
<?php else : ?>	
	<!-- ====================
	LIST ALL PACKAGES -->
	<table class="widefat dup-pack-table">
		<thead>
			<tr>
				<th><input type="checkbox" id="dup-bulk-action-all"  title="<?php _e("Select all packages", 'duplicator') ?>" style="margin-left:15px" onclick="Duplicator.Pack.SetDeleteAll()" /></th>
				<th><?php _e("Created", 'duplicator') ?></th>
				<th><?php _e("Size", 'duplicator') ?></th>
				<th style="width:90%;"><?php _e("Name", 'duplicator') ?></th>
				<th style="text-align:center;" colspan="2">
					<?php _e("Package",  'duplicator')?>
				</th>
			</tr>
		</thead>
		<?php
		$rowCount = 0;
		$totalSize = 0;
		$txt_dbonly  = __('Database Only', 'duplicator');
		$rows = $qryResult;
		foreach ($rows as $row) {
			$Package = unserialize($row['package']);
			$pack_dbonly = false;

			if (is_object($Package)) {
				 $pack_name			= $Package->Name;
				 $pack_archive_size = $Package->Archive->Size;
				 $pack_storeurl		= $Package->StoreURL;
				 $pack_namehash	    = $Package->NameHash;
				 $pack_dbonly       = $Package->Archive->ExportOnlyDB;
			} else {
				 $pack_archive_size = 0;
				 $pack_storeurl		= 'unknown';
				 $pack_name			= 'unknown';
				 $pack_namehash	    = 'unknown';	
			}
			
			//Links
			$uniqueid  			= "{$row['name']}_{$row['hash']}";
			$packagepath 		= $pack_storeurl . "{$uniqueid}_archive.zip";
			$installerpath		= $pack_storeurl . "{$uniqueid}_installer.php";
			$installfilelink	= "{$installerpath}?get=1&file={$uniqueid}_installer.php";
			$css_alt		    = ($rowCount % 2 != 0) ? '' : 'alternate';
			?>

			<!-- COMPLETE -->
			<?php if ($row['status'] >= 100) : ?>
				<tr class="dup-pack-info <?php echo $css_alt ?>">
					<td class="pass"><input name="delete_confirm" type="checkbox" id="<?php echo $row['id'] ;?>" /></td>
					<td><?php echo DUP_Package::getCreatedDateFormat($row['created'], $ui_create_frmt);?></td>
					<td><?php echo DUP_Util::byteSize($pack_archive_size); ?></td>
					<td class='pack-name'>
						<?php	echo ($pack_dbonly) ? "{$pack_name} <sup title='{$txt_dbonly}'>DB</sup>" : $pack_name ; ?>
					</td>
					<td class="get-btns">
						<button id="<?php echo "{$uniqueid}_installer.php" ?>" class="button no-select" onclick="Duplicator.Pack.DownloadFile('<?php echo $installfilelink; ?>', this); return false;">
							<i class="fa fa-bolt"></i> <?php _e("Installer", 'duplicator') ?>
						</button> 
						<button id="<?php echo "{$uniqueid}_archive.zip" ?>" class="button no-select" onclick="Duplicator.Pack.DownloadFile('<?php echo $packagepath; ?>', this); return false;">
							<i class="fa fa-file-archive-o"></i> <?php _e("Archive", 'duplicator') ?>
						</button>
						<button type="button" class="button no-select" title="<?php _e("Package Details", 'duplicator') ?>" onclick="Duplicator.Pack.OpenPackageDetails(<?php echo "{$row['id']}"; ?>);">
							<i class="fa fa-archive" ></i> 
						</button>
					</td>
				</tr>
				
			<!-- NOT COMPLETE -->				
			<?php else : ?>	
			
				<?php
					$size = 0;
					$tmpSearch = glob(DUPLICATOR_SSDIR_PATH_TMP . "/{$pack_namehash}_*");
					if (is_array($tmpSearch)) {
						$result = array_map('filesize', $tmpSearch);
						$size = array_sum($result);
					}
					$pack_archive_size = $size;
					$error_url = "?page=duplicator&action=detail&tab=detail&id={$row['id']}";
				?>
				<tr class="dup-pack-info  <?php echo $css_alt ?>">
					<td class="fail"><input name="delete_confirm" type="checkbox" id="<?php echo $row['id'] ;?>" /></td>
					<td><?php echo DUP_Package::getCreatedDateFormat($row['created'], $ui_create_frmt);?></td>
					<td><?php echo DUP_Util::byteSize($size); ?></td>
					<td class='pack-name'><?php echo $pack_name ;?></td>
					<td class="get-btns error-msg" colspan="2">		
						<span>
							<i class="fa fa-exclamation-triangle"></i>
							<a href="<?php echo $error_url; ?>"><?php _e("Error Processing", 'duplicator') ?></a>
						</span>			
						<a class="button no-select" title="<?php _e("Package Details", 'duplicator') ?>" href="<?php echo $error_url; ?>">
							<i class="fa fa-archive"></i> 
						</a>						
					</td>
				</tr>
			<?php endif; ?>
			<?php
			$totalSize = $totalSize + $pack_archive_size;
			$rowCount++;
		}
	?>
	<tfoot>
		<tr>
			<th colspan="11" style='text-align:right; font-size:12px'>						
				<?php echo _e("Packages", 'duplicator') . ': ' . $totalElements; ?> |
				<?php echo _e("Total Size", 'duplicator') . ': ' . DUP_Util::byteSize($totalSize); ?> 
			</th>
		</tr>
	</tfoot>
	</table>
<?php endif; ?>	
</form>

<!-- ==========================================
THICK-BOX DIALOGS: -->
<?php
	$alert1 = new DUP_UI_Dialog();
	$alert1->title		= __('Bulk Action Required', 'duplicator');
	$alert1->message	= __('Please select an action from the "Bulk Actions" drop down menu!', 'duplicator');
	$alert1->initAlert();
	
	$alert2 = new DUP_UI_Dialog();
	$alert2->title		= __('Selection Required', 'duplicator', 'duplicator');
	$alert2->message	= __('Please select at least one package to delete!', 'duplicator');
	$alert2->initAlert();
	
	$confirm1 = new DUP_UI_Dialog();
	$confirm1->title			= __('Delete Packages?', 'duplicator');
	$confirm1->message			= __('Are you sure, you want to delete the selected package(s)?', 'duplicator');
	$confirm1->progressText	= __('Removing Packages, Please Wait...', 'duplicator');
	$confirm1->jscallback		= 'Duplicator.Pack.Delete()';
	$confirm1->initConfirm();

	$alert3 = new DUP_UI_Dialog();
	$alert3->height     = 350;
	$alert3->width      = 350;
	$alert3->title		= __('Duplicator Help', 'duplicator');
	$alert3->message	= "<div id='dup-help-dlg'></div>";
	$alert3->initAlert();
?>

<!-- =======================
DIALOG: HELP DIALOG -->
<div id="dup-help-dlg-info" style="display:none">
	<b><?php _e("Common Questions:", 'duplicator') ?></b><hr size='1'/>
	<i class="fa fa-file-text-o"></i> <a href="https://snapcreek.com/duplicator/docs/quick-start?utm_source=duplicator_free&utm_medium=wordpress_plugin&utm_content=help_btn_pack_help&utm_campaign=duplicator_free#quick-010-q" target="_blank"><?php _e("How do I create a package", 'duplicator') ?></a> <br/>
    <i class="fa fa-file-text-o"></i> <a href="https://snapcreek.com/duplicator/docs/quick-start/?utm_source=duplicator_free&utm_medium=wordpress_plugin&utm_content=help_btn_install_help&utm_campaign=duplicator_free#quick-040-q" target="_blank"><?php _e('How do I install a package?', 'duplicator'); ?></a>	 <br/>
	<i class="fa fa-file-code-o"></i> <a href="https://snapcreek.com/duplicator/docs/faqs-tech?utm_source=duplicator_free&utm_medium=wordpress_plugin&utm_content=help_btn_faq&utm_campaign=duplicator_free" target="_blank"><?php _e("Frequently Asked Questions!", 'duplicator') ?></a>
	<br/><br/>

	<b><?php _e("Other Resources:", 'duplicator') ?></b><hr size='1'/>
	<i class="fa fa-question-circle"></i> <a href="https://snapcreek.com/ticket?utm_source=duplicator_free&utm_medium=wordpress_plugin&utm_content=help_btn_ticket&utm_campaign=duplicator_free" target="_blank"><?php _e("Need help with the plugin?", 'duplicator') ?></a> <br/>
	<i class="fa fa-lightbulb-o"></i> <a href="https://snapcreek.com/support?idea=1&utm_source=duplicator_free&utm_medium=wordpress_plugin&utm_content=help_btn_idea&utm_campaign=duplicator_free" target="_blank"><?php _e("Have an idea for the plugin?", 'duplicator') ?></a> <br/>
	<?php if($statusCount >= 3)  :	?>
		<i class="fa fa-star-o"></i> <a href="https://wordpress.org/support/plugin/duplicator/reviews/?filter=5" target="vote-wp"><?php _e("Help review the plugin!", 'duplicator') ?></a>
	<?php endif; ?>
</div>

<script>
jQuery(document).ready(function($) 
{
	
	/*	Creats a comma seperate list of all selected package ids  */
	Duplicator.Pack.GetDeleteList = function () 
	{
		var arr = new Array;
		var count = 0;
		$("input[name=delete_confirm]").each(function () {
			if (this.checked) {
				arr[count++] = this.id;
			}
		});
		var list = arr.join(',');
		return list;
	}
	
	/*	Provides the correct confirmation items when deleting packages */
	Duplicator.Pack.ConfirmDelete = function () 
	{
		if ($("#dup-pack-bulk-actions").val() != "delete") {
			<?php $alert1->showAlert(); ?>
			return;
		}
		
		var list = Duplicator.Pack.GetDeleteList();
		if (list.length == 0) {
			<?php $alert2->showAlert(); ?>
			return;
		}
		<?php $confirm1->showConfirm(); ?>
	}
	
	
	/*	Removes all selected package sets 
	 *	@param event	To prevent bubbling */
	Duplicator.Pack.Delete = function (event) 
	{
		var list = Duplicator.Pack.GetDeleteList();

		$.ajax({
			type: "POST",
			url: ajaxurl,
			dataType: "json",
			data: {action : 'duplicator_package_delete', duplicator_delid : list, nonce: '<?php echo $ajax_nonce; ?>' },
			complete: function(data) { 
				Duplicator.ReloadWindow(data); 
			}
		});

	};
	
	/* Toogles the Bulk Action Check boxes */
	Duplicator.Pack.SetDeleteAll = function() 
	{
		var state = $('input#dup-bulk-action-all').is(':checked') ? 1 : 0;
		$("input[name=delete_confirm]").each(function() {
			 this.checked = (state) ? true : false;
		});
	}
	
	/*	Opens detail screen */
	Duplicator.Pack.OpenPackageDetails = function (package_id) 
	{
		window.location.href = '?page=duplicator&action=detail&tab=detail&id=' + package_id;
	}

	/*	Toggles the feedback form */
	Duplicator.Pack.showHelp = function ()
	{
		$('#dup-help-dlg').html($('#dup-help-dlg-info').html());
		<?php $alert3->showAlert(); ?>
	}
	
});
</script>