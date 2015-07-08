<?php
/**********************************************
*		@author : 		    don
*		@detail :			Common functions
*		@copyright :		2012
**********************************************/
//session_start();
//date_default_timezone_set('America/Los_Angeles');

include_once dirname(__FILE__) . '/variable.php';

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

    // returns Category Name of a given product
	function getCatID($cid, $id) {
		$this->query("SELECT Cat".$cid."Name FROM Category".$cid." WHERE Cat".$cid."ID=".$id);
		if ($this->rows > 0)
			return mysql_result($this->res, 0);
		else
			return false;
	}

	function getMulti() {
		$this->query("SELECT id_group FROM item_group WHERE child_chk=1 Limit 0,1 ");
		if ($this->rows > 0)
			return mysql_result($this->res, 0);
		else
			return false;
	}
	
	function getsecondMulti() {
		$this->query("SELECT parent_id_group FROM item_group WHERE parent_id_group>1  Limit 0,1 ");
		if ($this->rows > 0)
		return mysql_result($this->res, 0);
		else
			return false;
	}
	function getSubcount($id_item) {
		$this->query("SELECT count(id_item) FROM item WHERE parent_id_item=".$id_item);
		
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


?>
