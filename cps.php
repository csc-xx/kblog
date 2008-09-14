<?
/***************************************************************************
 *   Copyright (C) 2008 by Curtis 'cSc' Smith   *
 *   kman922002@gmail.com   *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 *   This program is distributed in the hope that it will be useful,       *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of        *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         *
 *   GNU General Public License for more details.                          *
 *                                                                         *
 *   You should have received a copy of the GNU General Public License     *
 *   along with this program; if not, write to the                         *
 *   Free Software Foundation, Inc.,                                       *
 *   59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.             *
 ***************************************************************************/
//Global Variables
$id = $_GET['id'];
#$item = $_GET['item'];
#$blog = $_GET['getblog'];
$template = $_GET['st'];
$action = $_GET['action'];
$ip = $_SERVER['REMOTE_ADDR'];
$referrer = $_SERVER['HTTP_REFERER'];
$version = '1.0.2 build 1006';
if ( $template == 1 ) { 
	//Old: default.php    Purpose: Set cookie for default template
	setcookie('kbg_template','default.css', time()+60*60*24*30);
	echo '<meta http-equiv="refresh" content="0;URL='.$referrer.'">';
}
if ( $template == 2 ) {
	//Old: midnight.php    Purpose: Set cookie for midnight template
	setcookie('kbg_template','midnight.css', time()+60*60*24*30); 
	echo '<meta http-equiv="refresh" content="0;URL='.$referrer.'">';
}
if ( $action == 1 ) { 
	//Old: setauth.php    Purpose: Sets authintication cookie
	setcookie('auth', true, time()+3600);
	echo '<meta http-equiv="refresh" content="0;URL=blog.php">';
}
if ( $action == 2 ) { 
	//Old: logout.php   Purpose: Resets the cookies nessisary for a successful login.
	setcookie('auth', false);
	setcookie('uname', false);
	echo '<meta http-equiv="refresh" content="0;URL=blog.php">';
}
// if ( $action == 3 ) { 
// //Old: override.php. Purpose: Overrides the default database reset check
// if ( $_COOKIE['auth'] == true && $_COOKIE['uname'] == 'cSc' ) {
// rename('blog.data.mn', 'blog.data.old');
// rename('empty.data', 'blog.data.mn');
// echo '<meta http-equiv="refresh" content="0;URL=control.php">';
// }
//if ( $_COOKIE['auth'] == false ) {
//	echo '<meta http-equiv="refresh" content="0;URL=cps.php?id=999>';
//}
// if ( $action == 4 ) { 
// 	//Old: maintc.php/brain.php    Purpose: Not really implemented, resets database automatically
// 	$size = filesize('blog.data.mn');
// 	if ( $_COOKIE['auth'] == true && $_COOKIE['uname'] == 'cSc' ) {
// 		if ($size >= '2500') {
// 			rename('blog.data.mn', 'blog.data.old');
// 			rename('empty.data', 'blog.data.mn');
// 		}
// 	}
// 	if ( $_COOKIE['auth'] == false ) {
// 		echo '<meta http-equiv="refresh" content="0;URL=cps.php?id=999>';
// 	}
// 		echo '<meta http-equiv="refresh" content="0;URL=blog.php">';
// 	}
if ( $action == 5 ) {
	echo 'Checking Version....';
	echo 'Done!<br>';
	echo 'CPS Script version reads ' . $version;
	echo '<br>Redirecting in 5.';
	echo '<meta http-equiv="refresh" content="5;URL=control.php">';
}
if ( $id == '999' ) {
	//This is the experimental security logger.
	echo '<br>Intruder Detected.. Alerting administrative authority.<br> Your attempt has been logged.';
	$alog = fopen('alert.data.log', 'a');
	fwrite($alog, 'IP:' . $ip . "\t\t" . 'CPS Version: ' . $version . "\t\t" . 'Location: id='. $id . ' action=' . $action ."\n");
	fclose($alog);
}
?>
<html>
  <head>
    <title> Central Processing Script
    </title>
    	<?php 
	if (!$_COOKIE['kbg_template']) { 
		echo '<link rel="stylesheet" href="default.css">'; 
	} else { 
		echo '<link rel="stylesheet" href="'.$_COOKIE['kbg_template'] .'">'; 
	} 
	?>
  </head>
  <body>
  </body>
</html>