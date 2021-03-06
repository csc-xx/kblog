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
//Include and initialize variable class
include("sys.php");
$variables = new sVarPipe();
$pageTitle = $variables->pageTitle;
$version = $variables->version;
//Initialize the new variable checking class
$varCheck = new sVarCheck();
//begin html output
echo "<html>";
echo "<head>"; //nice and neat...not
echo '<title>' . $pageTitle . ' - ' . $version . ""; //FIXME : doesnt display
echo "</title>";
if (!$_COOKIE['kbg_template']) { 
	echo '<link rel="stylesheet" href="default.css">'; 
} else { 
	echo '<link rel="stylesheet" href="'.$_COOKIE['kbg_template'] .'">';
}
echo "</head>";
echo "<body>";
echo "<h2>";
echo "<center> kBlog ";
echo "</center>";
echo "</h2>";
if ( $_COOKIE['kbg_auth'] == true && $_SESSION['kbg_auth'] == true && $varCheck->validateVariable($_COOKIE['kbg_auth'], $_SESSION['kbg_auth']) == true) { 
	echo 'Welcome, ' . $_COOKIE['kbg_uname'] . '! <br>'; 
} 
if ( $_COOKIE['kbg_admin'] == true && $_SESSION['kbg_admin'] == true && $varCheck->validateVariable($_COOKIE['kbg_admin'], $_SESSION['kbg_admin']) == true) { 
	echo '[<a href="control.php">Control Panel</a>]'; //TODO : Session id checking
}
if ( $_COOKIE['kbg_auth'] == true && $_SESSION['kbg_auth'] == true && $varCheck->validateVariable($_COOKIE['kbg_auth'], $_SESSION['kbg_auth']) == true) { 
	echo '[<a href="cps.php?action=2">Logout</a>]'; //TODO : validate action numbers
}
if ( $_COOKIE['kbg_auth'] == false && $_SESSION['kbg_auth'] == false && $varCheck->validateVariable($_COOKIE['kbg_auth'], $_SESSION['kbg_auth']) == true) { 
	echo '<form action="login.php" method="post">';
	echo '<p> Username:';
	echo '<input type="text" name="username" size="30">';
	echo'  <br> Password:';
	echo' <input type="password" name="password" size="30">';
	echo' <br>';
	echo '<input type="submit" name="submit" value="Login">';
	echo '</p>';
	echo '</form>';
}
if ( $_COOKIE['kbg_auth'] == false && $_SESSION['kbg_auth'] == false && $varCheck->validateVariable($_COOKIE['kbg_auth'], $_SESSION['kbg_auth']) == true) { 
	echo '<p>';
	echo 'You need to login to post blogs!';
}
if ( $_COOKIE['kbg_auth'] == true && $_SESSION['kbg_auth'] == true && $varCheck->validateVariable($_COOKIE['kbg_auth'], $_SESSION['kbg_auth']) == true) { 
	echo '[<a href="blogit.php">Post a new blog!</a>]'; //TODO : check for session
}
$masterRecord = fopen('master', 'rb');
$masterData = explode("\n", $masterRecord);
$masterData[0] = $masterRecord['total'];
if(!$masterRecord['total'] < '1') { 
	$firstPost = $masterRecord['total'] - 1;
	$postCount = $firstPost;
	$breakCount = $postcount - $variables->postDisplayNo(); //the stopping point is total posts - 1 - postDisplayNo()
	$postNumber = $firstPost;
	while(!$postNumber == $breakCount) {
		$post = readfile('blogs/' . $postNumber);
		echo $post;
		$postNumber = $postNumber - 1; 
	}
} else {
	echo "<blockquote> <center> NO POSTS <center> </blockquote>";
}
if ($_COOKIE['kbg_debug'] == true && $_SESSION['kbg_debug'] && $varCheck->validateVariable($_COOKIE['kbg_debug'], $_SESSION['kbg_debug']) == true) { 
	echo "<hr>";
	echo "Prettyful debug information mode enabled.";
	echo "<hr>Template: ";
	var_dump($_COOKIE['kbg_template']);
	echo "<p>Current Rank: ";
	var_dump($_COOKIE['kbg_rank']);
	echo "</p><p>Page Title: ";
	var_dump($pageTitle);
	echo "</p><p>Version: ";
	var_dump($version);
	if ($_COOKIE['kbg_auth'] == true && $_COOKIE['kbg_admin'] == true && $_SESSION['kbg_auth'] == true && $_SESSION['kbg_admin'] && $varCheck->validateVariable($_COOKIE['kbg_admin'], $_SESSION['kbg_admin']) == true && $varCheck->validateVariable($_COOKIE['kbg_auth'], $_SESSION['kbg_auth']) == true) { 
		echo '<br><br>';
		echo 'Starting Administrative debug information';
		echo '</p><p>Administrator: ';
		var_dump($_COOKIE['kbg_admin']);
		echo '</p><p>Username: ';
		var_dump($_COOKIE['kbg_uname']);
		echo '</p><p>Master Record Misc. Data: ';
		var_dump($masterRecord);
		echo '</p><p>Master Record Explosion Data: ';
		var_dump($masterData);
		echo '</p><p>Session Data: ';
		var_dump($_SESSION);
	}//FIXME : Probably Broken ^-
}
echo "</body>";
echo "</html>";
?>	
