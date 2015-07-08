<?php
/**********************************************
*		@author : 		    Michael
*		@detail :			Common functions
*		@copyright :		2012
**********************************************/
session_start();
date_default_timezone_set('America/Los_Angeles');

include_once dirname(__FILE__) . '/../include/variable.php';

class myDB
{
    var $conID;
    var $res;
    var $rows;

    function myDB() {
        global $DBConf;
        $this->conID = @mysql_connect($DBConf["HOST"], $DBConf["USER"], $DBConf["PWD"]);
        mysql_query("SET NAMES UTF8");
        mysql_select_db('sshopusa');
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

    // returns Category Name of a given product
	function getCatID($cid, $id) {
		$this->query("SELECT Cat".$cid."Name FROM Category".$cid." WHERE Cat".$cid."ID=".$id);
		if ($this->rows > 0)
			return mysql_result($this->res, 0);
		else
			return false;
	}

	// returns an array of sizes of a given product
	function getSizeRun($sid) {
		$this->query("SELECT * FROM SizeCharts WHERE SizeChartID=".$sid);
		if ($this->rows > 0) {
			for ($i=0; $i<25; $i++) {
				$temp = mysql_result($this->res, 0, $i+3);
				if (!empty($temp))
					$sizes[] = $temp;
			}
			return $sizes;
		} else {
			return false;
		}
	}

	function getColorRun($cids) {
		$temp = explode(",",$cids);
		foreach ($temp as $val) {
			$this->query("SELECT Color FROM Colors WHERE ColorID=".$val." AND IsActive=\"Y\"");
			if ($this->rows > 0)
				$colors[] = mysql_result($this->res, 0);
		}
		return $colors;
	}
}


Class myUpload {

	public  $uploaddir;
	public  $allow_ext = array('png','jpeg','gif','jpg');
	public 	$arrArg = array();
	public  $uploadfile;
	private $file_name;
	private $file_name1;
	private $mime_name;
	private $tmp_name;
	private $size;
	private	$baseUploadDir = "/Images_Products/";
	private $strupload;
	private $thumbpath;



    function __construct() {
		$this->uploaddir = date("Y-m");
		/*
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
		*/
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
				$this->createThumb($this->strupload, 300);
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


// $CF = new myDB;
// $strSQL = "SELECT *FROM admin";
// $CF->query($strSQL);
// $data = $CF->fetch_array($CF->res);

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

function arr2url($arr) {
	$url = "";
	for ($i=0; $i<count($arr); $i++) {
		$url .= ($i > 0)?"&":null;
		$key = $arr[$i][0];
		$val = $arr[$i][1];
		$url .= $key."=".$val;
	}
	return $url;
}

function imgFit($fn,$w,$h) {
	list($width, $height, $type, $attr) = getimagesize($_SERVER["DOCUMENT_ROOT"].PRODUCT_IMAGE_PATH.$fn);
	$pp = $width/$height;
	if ($width > $height)
		return " width=\"".$w."\" height=\"".(int)($w/$pp)."\" style=\"margin-top: ".(int)(($h-$w/$pp)/2)."px;\"";
	elseif ($width < $height)
		return " width=\"".(int)($w*$pp)."\" height=\"".$h."\"";
	else
		return " width=\"".$w."\" height=\"".(int)($w/$pp)."\" style=\"margin-top: ".(int)(($h-$w/$pp)/2)."px;\"";
}

function multiDimArrSum($arr, &$result=0) {
	foreach($arr as $key => $val) {
		if(is_array($val)) {
			multiDimArrSum($val, $result);
		} else {
			$result += $val;
		}
	}
	return $result;
}

// cart empty array cleaner; good for only up to second level
function cleanArr(&$arr, $l1=0) {
	foreach($arr as $key => $val) {
		if (is_array($val)) {
			if (count($val) > 0)
				cleanArr($val, $key);
			else
				if ($l1 > 0) {
					unset($_SESSION['cart'][$l1][$key]);
				} else {
					unset($_SESSION['cart'][$key]);
					if (!empty($_SESSION['personalized'][$key])) {
						unset($_SESSION['personalized'][$key]);
					}
				}
		}
	}
}

// Shopping cart's lump sum
function getCartTotal() {
	$DB = new myDB;
	foreach($_SESSION['cart'] as $cart_item => $val) {
		$DB->query("SELECT Picture1, ProductName, UnitPriceOnSale, FeeForPersonalization, Weight_Pounds FROM Products WHERE ProductID=".$cart_item);
		$item_qty = multiDimArrSum($_SESSION['cart'][$cart_item]);
		list($prod_img, $prod_name, $prod_price, $persona_fee, $prod_weight) = $DB->fetch_array($DB->res);
		if(!empty($_SESSION['personalized'])) {
			$total += ($prod_price + $persona_fee) * $item_qty;
		} else {
			$total += $prod_price * $item_qty;			
		}
	}
	if (!empty($_COOKIE['VIP']['ratio'])) {
		$total = $total * (1 - (int) $_COOKIE['VIP']['ratio'] / 100);
	}
	return $total;
}

// Get thumbnail file name
function getThumbnailImage($arg) {
	$basedir	= $_SERVER['DOCUMENT_ROOT'].PRODUCT_IMAGE_PATH;
	if (file_exists($basedir.$arg)) {
		if (strpos($arg, "/") == 7) {
			$thumbimg = str_replace("/", "/thumb_", $arg);
		} else {
			$thumbimg = "thumb_" . $arg;
		}
		if (file_exists($basedir.$thumbimg)) {
			return $thumbimg;
		} else {
			return $arg;
		}
	} else {
		return $arg;
	}
}


// Debugging: Print Array
function print_array($arr) {
	echo "<xmp>";
	print_r($arr);
	echo "</xmp>";
}


// Gift Card Code Generator
function getGiftcertCode() {
	$DB = new myDB;
	while (!$flag) {
		$mycode = strtoupper(str_replace("=","",base64_encode(rand(10,99).date("His"))));
		$DB->query("SELECT *FROM GiftCertificates WHERE GiftAuthorizationCode='".$mycode."'");
		if ($DB->rows < 1)
			$flag = true;
	}
	return $mycode;
}

// Mask credit card number
function maskNumbers($mynum) {
	$len 	= strlen($mynum);
	$masked	=  str_repeat("*", ($len-4)).substr($mynum, ($len-4), 4);
	return $masked;
}

// Get promo code information
function getPromoInfo($code, $ntotal) {
	$DB = new myDB;
	$strSQL = "SELECT * FROM Coupons WHERE coupon_code='".$code."' AND is_active='Y'";
	$DB->query($strSQL);
	if ($DB->rows > 0) {
		$rs = $DB->fetch_array($DB->res);
		if ((float)$ntotal < (float)$rs['minimum_order']) {
			return array('response'=>-2, 'type'=>"FREE SHIPPING");
		} else {
			return array('response'=>1, 'type'=>$rs['coupon_type'], 'dc_percent'=>(float)($rs['percentage_discount']/100), 'prod_id'=>$rs['product_id']);
		}
	} else {
		return array('response'=>-1, 'type'=>"The coupon code, '{$code}' is invalid.");
	}
}

?>
