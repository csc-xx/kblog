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
include("sysvars.php");
$variables = new sVarPipe();
$pageTitle = $variables->pageTitle();
$version = $variables->version();
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
if ( $_COOKIE['kbg_auth'] == true ) {
	echo 'Welcome, ' . $_COOKIE['kbg_uname'] . '! <br>'; 
} 
if ( $_COOKIE['kbg_admin'] == '1' or $_COOKIE['kbg_rank'] == '14' or $_COOKIE['kbg_rank'] == '34' or $_COOKIE['kbg_rank'] == '26' ) {
	echo '[<a href="control.php">Control Panel</a>]'; 
}
if ( $_COOKIE['kbg_auth'] == true) {
	echo '[<a href="cps.php?action=2">Logout</a>]'; 
}
if ( $_COOKIE['kbg_auth'] == false ) {
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
if ( $_COOKIE['kbg_auth'] == false ) {
	echo '<p>';
	echo 'You need to login to post blogs!';
}
if ( $_COOKIE['kbg_auth'] == true ) {  
	echo '[<a href="blogit.php">Post a new blog!</a>]';
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
echo "</body>";
echo "</html>";
?>
		
	
