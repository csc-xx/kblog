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
include("sysvars.php");
$variables = new sVarPipe();
$pageTitle = $variables->pageTitle();
$version = $variables->version();
//begin html output
echo "<html>";
echo "<head>"; //nice and neat...not
echo '<title>' . $pageTitle . ' ' . $version . ""; //FIXME : Doesnt display right
echo "</title>";
if ($_COOKIE['kbg_admin'] == '1' or $_COOKIE['kbg_rank'] == '14' or $_COOKIE['kbg_rank'] == '34' or $_COOKIE['kbg_rank'] == '26' ) {
} else {
	echo '<meta http-equiv="refresh" content="0;URL=cps.php?id=999&action=authcheck1">';
}
if (!$_COOKIE['kbg_template']) { 
	echo '<link rel="stylesheet" href="default.css">'; 
} else { 
	echo '<link rel="stylesheet" href="'.$_COOKIE['kbg_template'] .'">'; 
}
echo "</head>";
echo "<body>";
echo '[<a href="index.php">Home</a>]';
//if ( $_COOKIE['kbg_admin'] == '1' or $_COOKIE['kbg_rank'] == '14' or $_COOKIE['kbg_rank'] == '34' or $_COOKIE['kbg_rank'] == '26' ) {
	echo '<p>';
	echo '<form name="jump">';
	echo '<select name="menu" onChange="location=document.jump.menu.options[document.jump.menu.selectedIndex].value;" value="Templates">';
        echo '<option value="#"> Templates </option>';
        echo '<option value="#"> - </option>';
        echo '<option value="cps.php?st=1"> Default </option>';
        echo '<option value="cps.php?st=2"> Midnight </option>';
	echo '</select>';
	echo '</form>';
	echo '</p>';
	echo '<p>';
	echo 'Force Database Reset. [<a href="cps.php?action=3">RESET</a>]';
	echo '<br>Query Processing Script Version. [<a href="cps.php?action=5">QUERY</a>]';
//}
/*if ( $_COOKIE['kbg_auth'] == false ) {
	echo '<meta http-equiv="refresh" content="0;URL=cps.php?id=999">';
}*/
?>