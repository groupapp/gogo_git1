<?php
/**********************************************
*		@author : 		    Michael
*		@detail :			Common functions
*		@copyright :		2012
**********************************************/
date_default_timezone_set('America/Los_Angeles');

include_once dirname(__FILE__) . '/variables.php';

class myDB
{
    var $conID;
    var $res;
    var $rows;
    
    function myDB() {
        global $DBConf;
        $this->conID = @mysql_connect($DBConf["HOST"], $DBConf["USER"], $DBConf["PWD"]);
        mysql_query("SET NAMES UTF8");
        mysql_select_db($DBConf["DB_NAME"]);
    }
    
    function query($strSQL) {
        $this->res = mysql_query($strSQL);
        if ($this->res) {
            $this->rows = mysql_affected_rows();
        } else {
            $this->rows = 0;
        }
        return $this->res;
    }
    
    function fetch_array($rs) {
        return mysql_fetch_array($rs);
    }
    
    function fetch_row($rs) {
        return mysql_fetch_row($rs);
    }
    
    function fetch_obj($rs) {
    	return mysql_fetch_object($rs);
    }
    
    function get_lastid() {
    	return mysql_insert_id();
    }
    
    function close() {
        @mysql_close();
    }
}


Class myUpload {

	public  $uploaddir;
	public  $allow_ext = array('png','jpeg','gif','jpg');
	public 	$arrArg = array();
	//private $uploadfile;
	//private $file_name;
	//private $mime_name;
	//private $tmp_name;
	//private $size;
	private $baseUploadDir = "/Images_Products/";
	private $strupload;
	private $myfile;


    function __construct($file) {
    		$this->myfile = $file;
		$this->uploaddir = date("Y-m");
		if(!is_dir($_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploaddir)) {
			mkdir($_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploaddir, 0777);
		}
		 
		foreach($this->myfile['name'] as $key => $val) {
			if ($val!="") {
				$temp 	= explode(".",$this->myfile['name'][$key]);
				$tstamp = microtime(true)*10000;
				$this->arrArg[] = array(
						'uploadfile' 	=> $this->uploaddir . "/" . strtolower(str_replace(" ", "_", $temp[0]) . "-" . $tstamp . "." . $temp[1]),
						'file_name1'	=> strtolower($this->myfile['name'][$key]),
						'mime_name'		=> basename($this->myfile['type'][$key]),
						'size'			=> basename($this->myfile['size'][$key]),
						'tmp_name'		=> $this->myfile['tmp_name'][$key],
						'file_name'		=> strtolower(str_replace(" ", "_", $temp[0])) . "-" . $tstamp . "." . strtolower($temp[1]),
						'ext'			=> strtolower($temp[1]),
						'flag'			=> 0
				);
			}
		}
		 
	}

	function validate($ext) {
		if(!in_array($ext,$this->allow_ext)) {
			return false;
		} else {
			return true;
		}
	}

	function upload() {
		foreach($this->arrArg as $key => $arg) {
			if ($this->validate($arg['ext'])) {
				$this->strupload = $_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$arg['uploadfile'];
				if (move_uploaded_file($arg['tmp_name'] ,$this->strupload)) {
					$this->arrArg[$key]['flag'] = 1;
				}
			}
		}
	}

	function __destruct() {
		unset($_FILES);
	}

}


// $CF = new myDB;
// $strSQL = "SELECT *FROM admin";
// $CF->query($strSQL);
// $data = $CF->fetch_array($CF->res);

function listPages($pp, $PAGEBLOCK, $totalpps, $stropt) {
    
    $startpp    = intval(($pp-1) / $PAGEBLOCK) * $PAGEBLOCK + 1;
    $endpp      = intval((($startpp-1)+$PAGEBLOCK)/$PAGEBLOCK)*$PAGEBLOCK ;
    
    if ($totalpps < $endpp) $endpp = $totalpps;
    
    echo "<div class='centWrapper'><div class='centWrap'>";
    echo "<ul class='pagelist'>";
    
    if ($startpp > $PAGEBLOCK) {
        echo "<li><a href='?{$stropt}&pp=".($startpp-1)."'>prev</a></li>";
    } else {
        echo "<li class='empty_a'>prev</li>";
    }
    
    for ($i=$startpp; $i<=$endpp; $i++) {
        
        echo "<li";
        //echo ($startpp == 1) ? " id='firstpage'" : "";
        if ($i == $pp)
            echo " class='current'>" . $i;
        else
            echo "><a href='?{$stropt}&pp={$i}'>" . $i . "</a>";
        echo "</li>";
    
    }
    
    if ($endpp < $totalpps) {
        echo "<li class='lastpp'><a href='?{$stropt}&pp=".($endpp+1)."'>next</a></li>";
    } else {
        echo "<li class='empty_a lastpp'>next</li>";
    }
    
    echo "</ul></div></div>";

}

function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number = sprintf('%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
} 

function getSalesRepListID($initial=null) {
	$DB = new myDB;
	if (!$initial)
		$initial = $_COOKIE["user"]["initial"];
	$DB->query("SELECT ListID FROM qb_salesrep WHERE Initial='".$initial."'");
	return $DB->fetch_obj($DB->res)->ListID;
	$DB->close();
}

function getSalesRepInitial($id=null) {
	if ($_COOKIE["user"]["level"]==5) {
		return $_COOKIE["user"]["initial"];
	} else {
		if ($id) {
			$DB = new myDB;
			$DB->query("SELECT Initial FROM gb_salesrep WHERE Salesrep_id='".$id."'");
			return $DB->fetch_obj($DB->res)->Initial;
			$DB->close();
		}
	}
}

function getListSalesRep() {
	$DB = new myDB;
	$strSQL = "SELECT Initial, FullName FROM gb_salesrep WHERE IsActive > 0 ORDER BY FullName";
	$DB->query($strSQL);
	while ($data = $DB->fetch_row($DB->res)) {
		$temp[]= array($data[0], $data[1]);
	}
	return $temp;
}

?>
