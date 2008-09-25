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
class sVarPipe {
	private $pageTitle = "kBlog";
	private $version = "2.0a";
	private $postDisplayNo = "6";
	protected $userDataDirectory = "data/users";
	public function __construct($action) {
		$this->pipeOpen = true;
		$this->pageTitle = (string)$pageTitle;
		$this->version = (string)$version;
		$this->postDisplayNo = (string)$postDisplayNo;
		if ($action == "EXPLOSION") {
			$this->armC4();
		} else {
			$this->dataExplosion = false;
		}
	}
	public function pageTitle() {
		return $this->pageTitle;
	}
	public function version() {
		return $this->version;
	}
	public function postDisplayNo() {
		return $this->postDisplayNo;
	}
	public function __deconstruct() {
		$this->pipeOpen = false;
	}
	public function armC4() {
		$this->user = $_COOKIE['kbg_user'];
		$this->userFile = ''. $userDataDirectory . '' . $this->user . "";
		$this->dataPipe = fopen($this->userFile, 'ab');
	}
	public function launchC4($action) {
		if($action == "ALL") {
			return $plastiqueDetonated = true;
		} else {
		}
		explode("\n", $this->dataPipe);
	}				
}
