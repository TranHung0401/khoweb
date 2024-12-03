<?php
	class PaginationsAjax
	{
		public $perpage;
		
		function __construct()
		{
			$this->perpage = 1;
		}
		
		function getAllPageLinks($count, $href, $elShow)
		{
			$output = '';

			if(empty($_GET["p"])) $_GET["p"] = 1;

			if($this->perpage != 0)
				$pages = ceil($count/$this->perpage);

			if($pages>1)
			{
				if($_GET["p"] == 1) 
					$output = $output . '<a class="first disabled">First</a><a class="prev disabled">Prev</a>';
				else	
					$output = $output . '<a vitri="1" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'" class="first">First</a><a vitri="'.($_GET["p"]-1).'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'" class="prev" >Prev</a>';
				
				if(($_GET["p"]-3)>0)
				{
					if($_GET["p"] == 1)
						$output = $output . '<a id=1 class="current">1</a>';
					else				
						$output = $output . '<a vitri="'.$_GET["p"].'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'"  >1</a>';
				}
				if(($_GET["p"]-3)>1)
				{
					$output = $output . '<a class="dot">...</a>';
				}
				
				for($i=($_GET["p"]-2); $i<=($_GET["p"]+2); $i++)
				{
					if($i<1) continue;
					if($i>$pages) break;
					if($_GET["p"] == $i)
						$output = $output . '<a vitri="'.$i.'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'"  id='.$i.' class="current">'.$i.'</a>';
					else				
						$output = $output . '<a vitri="'.$i.'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'"  >'.$i.'</a>';
				}
				
				if(($pages-($_GET["p"]+2))>1)
				{
					$output = $output . '<a class="dot">...</a>';
				}
				if(($pages-($_GET["p"]+2))>0)
				{
					if($_GET["p"] == $pages)
						$output = $output . '<a vitri="'.$_GET["p"].'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'"  id=' . ($pages) .' class="current">' . ($pages) .'</a>';
					else				
						$output = $output . '<a vitri="'.$_GET["p"].'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'" >' . ($pages) .'</a>';
				}
				
				if($_GET["p"] < $pages)
					$output = $output . '<a vitri="'.($_GET["p"]+1).'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'"  class="next" >Next</a><a vitri="'.$pages.'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'"  class="last" >Last</a>';
				else				
					$output = $output . '<a vitri="'.$_GET["p"].'" id-list="'.$_GET['id_list'].'" link="'.$_GET['eshow'].'"  class="next disabled">Next</a><a class="last disabled">Last</a>';
			}

			return $output;
		}

		function getPrevNext($count, $href, $elShow)
		{
			$output = '';

			if(empty($_GET["p"])) $_GET["p"] = 1;

			if($this->perpage != 0)
				$pages  = ceil($count/$this->perpage);

			if($pages>1)
			{
				if($_GET["p"] == 1) 
					$output = $output . '<a vitri="'.$_GET["p"].'" class="prev disabled">Prev</a>';
				else	
					$output = $output . '<a vitri="'.$_GET["p"].'" class="prev" onclick="loadPaging(\'' . $href . ($_GET["p"]-1) . '\',\''.$elShow.'\')" >Prev</a>';			
			
				if($_GET["p"] < $pages)
					$output = $output . '<a vitri="'.$_GET["p"].'" class="next" onclick="loadPaging(\'' . $href . ($_GET["p"]+1) . '\',\''.$elShow.'\')" >Next</a>';
				else				
					$output = $output . '<a vitri="'.$_GET["p"].'" class="next disabled">Next</a>';
			}

			return $output;
		}
	}
?>