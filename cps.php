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
// $item = $_GET['item'];
// $blog = $_GET['getblog'];
$template = $_GET['st'];
$action = $_GET['action'];
$ip = $_SERVER['REMOTE_ADDR'];
$referrer = $_SERVER['HTTP_REFERER'];
$version = '1.0.2 build 1006';
$refcheck = split('/', $referrer);
$refcheck2 = count($refcheck2);
$refcheck3 = $refcheck--;
//Start up the variable class 
//$userData = new sVarPipe("EXPLOSION");
//$userData->launchC4("ALL");
if ( $template == 1 ) { 
	setcookie('kbg_template','default.css', time()+60*60*24*365); //Sets a template cookie for default.css with a years worth of time
	if ($refcheck[$refcheck3] == 'cps.php') { //TODO : Check if a session ID was passed, if so, repass it 
		echo echo '<meta http-equiv="refresh" content="0;URL=index.php?'. htmlspecialchars(SID) .'">'; //this often pisses me off, if the referrer link is this page, redirect it to index
	} else {
		echo '<meta http-equiv="refresh" content="0;URL='.$referrer.'?'. htmlspecialchars(SID) .'">';//if not, redirect to referrer
	}
}
if ( $template == 2 ) {
	setcookie('kbg_template','midnight.css', time()+60*60*24*365); //same only with midnight.css
	if ($refcheck[$refcheck3] == 'cps.php') {
		echo '<meta http-equiv="refresh" content="0;URL=index.php?'. htmlspecialchars(SID) .'">';
	} else {
		echo '<meta http-equiv="refresh" content="0;URL='.$referrer.'?'. htmlspecialchars(SID) .'">';
	}
}
if ( $action == 1 ) { //TODO : write a function to parse user data then store it in session variables.
	//setcookie('auth', true, time()+3600); //LOL (Kept for historical luls)
	if(!$refcheck[$refcheck3] == 'login.php') {
		echo '<font color="00ff00"> FAIL </font>'; //TODO : terminate session variables and data, regenerate it then dismiss perhaps?
		echo '<meta http-equiv="refresh" content="2;URL=cps.php?id=999>';
	} else {
		session_start(); //TODO : //Make it randomly regenerate the session ID\\ Set random traps and cookies to regenerate the id
		$_SESSION['kbg_auth'] = true; 
		if ($refcheck[$refcheck3] == 'cps.php') {
			echo '<meta http-equiv="refresh" content="0;URL=index.php?'. htmlspecialchars(SID) .'">';
		} else {
			echo '<meta http-equiv="refresh" content="0;URL='.$referrer.'?'. htmlspecialchars(SID) .'">';
		}
	}
	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
if ( $action == 2 ) { 
	//TODO : Test the session code
	if(!empty($_SESSION)) {
		if(session_regenerate_id(true) == true) {
			session_unset();
			session_write_close();
		}
	}
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
	if ($refcheck[$refcheck3] == 'cps.php') {
		echo '<meta http-equiv="refresh" content="5;URL=index.php?'. htmlspecialchars(SID) .'">';
	} else {
		echo '<meta http-equiv="refresh" content="5;URL='.$referrer.'?'. htmlspecialchars(SID) .'">';
	}
}
if ( $action == 6 ) {
	setcookie('kbg_debug',true ,time()+60*60*24*30); //Will be for the dandy debug mode :D
	echo "<!--- Hidden messages are the shit. Debug mode enabled --->";
	if ($refcheck[$refcheck3] == 'cps.php') {
		echo '<meta http-equiv="refresh" content="0;URL=index.php?'. htmlspecialchars(SID) .'">';
	} else {
		echo '<meta http-equiv="refresh" content="0;URL='.$referrer.'?'. htmlspecialchars(SID) .'">';
	}
}
if ( $action == 7 ) {
	setcookie('kbg_debug', false);
	if ($refcheck[$refcheck3] == 'cps.php') {
		echo '<meta http-equiv="refresh" content="0;URL=index.php?'. htmlspecialchars(SID) .'">';
	} else {
		echo '<meta http-equiv="refresh" content="0;URL='.$referrer.'?'. htmlspecialchars(SID) .'">';
	}
}
if ( $id == '999' ) { //TODO : Rewrite partially
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