<?php
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
$_SESSION['kbg_uname'] = $_POST['username'];
$username = $_POST['username']; 
$password = $_POST['password']; 
$ip = $_SERVER['REMOTE_ADDR']; 
$passok = false; 
$currfile = fopen('users.data.ps', 'rb');
while(!feof($currfile)) {
 $currline = explode(':', trim(fgets($currfile, 4096)), 3); //TODO :Evaluate for security reasons
 if($currline[0] == $username) {
  $salt = substr($currline[1], 0, 12);
  if(crypt($password, $salt) == $currline[1]) { $passok = true; }
  break;
 } 
}  
fclose($currfile);
if($passok) {
 echo 'Password OK / <meta http-equiv="refresh" content="0;URL=cps.php?action=1">' . $ip;  //FIXME : Will end up broken with the CPS rewrite
  } else {
 echo 'FAIL <meta http-equiv="refresh" content="0;URL=cps.php?action=2">'; //FIXME : where the hell does this go?
}
?>