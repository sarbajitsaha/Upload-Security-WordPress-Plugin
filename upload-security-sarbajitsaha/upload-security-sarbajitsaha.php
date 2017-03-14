<?php
/*
Plugin Name: Upload Security
Plugin Uri:
Description: A simple plugin to improve security during uploads and preventing others from stealing content from the upload directory.
Version: 1.0.0
Author: Sarbajit Saha
Author URI: https://sarbajitsaha.github.io/
License: GPLv2

*/

//prevent direct access
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class UploadSecurity_SS
{
	private $upload_dir;

	public function __construct()
	{
		$this->upload_dir = wp_upload_dir();
		add_action('admin_menu', array( $this,'control_menu') );
	}

	function control_menu()
	{
		add_submenu_page('options-general.php', 'Upload Security', 'Upload Security',  10, __FILE__, array( $this,'plugin_start') );
	}

	function plugin_start()
	{
		$str = "";

		if($_POST['secure_uploads']=='Y')
		{
			$this->secure_uploads($this->upload_dir['basedir']);
			$str4 = "</br><b>Your uploads have been secured! Verify by clicking on the above link again. It is best if you run this every two weeks or at least once every month. </b></br></br>If you found this plugin useful, please rate it on WordPress!";
		}

		$title = "</br><h1>Upload Security</h1>";
		$str1 = "</br>This plugin helps secure uploads by preventing unauthorized users from accessing your upload directory and stealing its content.</br></br> You can check if you need this feature by clicking on the link below. </br></br><a href='".$this->upload_dir['baseurl']."' target=\"_blank\">Click this url to check if your upload directory is unsecured</a>";
		$str2 = "</br></br>Can you check the contents of the directory simply by visiting this link from your browser? Then you need to secure your uploads immediately! </br>";
		$str3 = '<form name="form" method="post" action="">
			<input type="hidden" name="secure_uploads" value="Y">
			<p class="submit">
				<input type="submit" name="submit" class="button-primary" value="Secure Uploads"/>
			</p></form>';
		echo $title.$str1.$str2.$str3.$str4;
	}

	function secure_uploads($dir)
	{
		//add a empty index.php file to the upload_dir
		//loop through each file recursively to see if there is a sub folder and then write the index.php there as well
		$dir_handle = opendir($dir);
		$temp = fopen($dir."/index.php","w");
		fclose($temp);
		while($file=readdir($dir_handle))
		{
			if(is_dir($dir .'/'. $file) && $file != '.' && $file != '..')
			{
				$this->secure_uploads($dir.'/'.$file);
			}
		}
	}

}

new UploadSecurity_SS();