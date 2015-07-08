<?php

session_start();
date_default_timezone_set('America/Los_Angeles');

/*--------------- Database Configuration ---------------*/
$DBConf["DB_TYPE"]	= "MySQL";
$DBConf["HOST"]     = "localhost";
$DBConf["DB_NAME"]  = "eworldbaby";
$DBConf["USER"]     = "lemontree";
$DBConf["PWD"]      = "%db4Lemontree";
/*--------------- Database Configuration --------------- */
define("PAGEBLOCK", 10);
$LIMIT          = 15;

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
	public  $uploadfile;
	private $file_name;
	private $mime_name;
	private $tmp_name;
	private $size;
	private $baseUploadDir = "/ksh2/img/m/";
	private $strupload;
	private $myfile;


    function __construct($file) {
    		$this->myfile = $file;
		$this->uploaddir = date("Y-m");
//print_r($_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploaddir);
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
    
	function setBaseDir($strDir) {
		$this->baseUploadDir = $strDir;
	}    

	function validate($ext) {
		if(!in_array($ext,$this->allow_ext)) {
			return false;
		} else {
			return true;
		}
	}

function upload($file) {
		if(!is_dir($_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploaddir)) {
			mkdir($_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploaddir, 0777);
		}
		$temp 	= explode(".",$file['name']);
		$tstamp = microtime(true)*10000;
		$this->uploadfile	= $this->uploaddir . "/" . strtolower(str_replace(" ", "_", $temp[0]) . "-" . $tstamp . "." . $temp[1]);
		$this->thumbpath	= $this->uploaddir . "/thumb_" . strtolower(str_replace(" ", "_", $temp[0]) . "-" . $tstamp . "." . $temp[1]);
		$this->file_name1	= strtolower($file['name']);
		$this->mime_name	= basename($file['type']);
		$this->size			= basename($file['size']);
		$this->tmp_name		= $file['tmp_name'];
		$this->file_name	= strtolower(str_replace(" ", "_", $temp[0])) . "-" . $tstamp . "." . strtolower($temp[1]);
		$this->ext			= strtolower($temp[1]);
		if ($this->validate($this->ext)) {
			$this->strupload = $_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->uploadfile;
			if (move_uploaded_file($this->tmp_name ,$this->strupload)) {
				//$this->createThumb($this->strupload, 300);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function createThumb($image="", $width=300)
	{
		$src	= ($image) ? $image : $this->strupload;
		$target	= $_SERVER['DOCUMENT_ROOT'].$this->baseUploadDir.$this->thumbpath;
		$info 	= pathinfo($src);
		
		if (strtolower($info['extension']) == 'jpg' || strtolower($info['extension']) == 'jpeg') {
			$img 		= @imagecreatefromjpeg("{$src}");
		} elseif (strtolower($info['extension']) == 'gif') {
			$img 		= @imagecreatefromgif("{$src}");
		} elseif (strtolower($info['extension']) == 'png') {
			$img 		= @imagecreatefrompng("{$src}");
		}
		
		$src_width	= imagesx($img);
		$src_height	= imagesy($img);

		$new_width	= $width;
		$new_height	= floor($src_height * ($width/$src_width));

		$tmp_img	= imagecreatetruecolor($new_width, $new_height);
		imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $src_width, $src_height);
		
		if (strtolower($info['extension']) == 'jpg' || strtolower($info['extension']) == 'jpeg') {
			imagejpeg( $tmp_img, "{$target}");
		} elseif (strtolower($info['extension']) == 'gif') {
			imagegif( $tmp_img, "{$target}");
		} elseif (strtolower($info['extension']) == 'png') {
			imagepng( $tmp_img, "{$target}");
		}
		
	}

	function __destruct() {
		unset($_FILES);
	}

}

// Debugging: Print Array
function print_array($arr) {
	echo "<xmp>";
	print_r($arr);
	echo "</xmp>";
}


function listPages($pp, $PAGEBLOCK, $totalpps, $stropt) {

	if (is_array($pp)) {
		$varpp	= $pp[0];
		$pp		= $pp[1];
	} else {
		$varpp	= "pp";
		$pp		= $pp;
	}

    $startpp    = intval(($pp-1) / $PAGEBLOCK) * $PAGEBLOCK + 1;
    $endpp      = intval((($startpp-1)+$PAGEBLOCK)/$PAGEBLOCK)*$PAGEBLOCK ;

    if ($totalpps < $endpp) $endpp = $totalpps;

    echo "<div class='centWrapper'><div class='centWrap'>";
    echo "<ul class='pagelist'>";

    if ($startpp > $PAGEBLOCK) {
        echo "<li><a href='?{$stropt}&{$varpp}=".($startpp-1)."'>prev</a></li>";
    } else {
        echo "<li class='empty_a'>prev</li>";
    }

    for ($i=$startpp; $i<=$endpp; $i++) {

        echo "<li";
        //echo ($startpp == 1) ? " id='firstpage'" : "";
        if ($i == $pp)
            echo " class='current'>" . $i;
        else
            echo "><a href='?{$stropt}&{$varpp}={$i}'>" . $i . "</a>";
        echo "</li>";

    }

    if ($endpp < $totalpps) {
        echo "<li class='lastpp'><a href='?{$stropt}&{$varpp}=".($endpp+1)."'>next</a></li>";
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

?>
