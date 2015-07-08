<?php 
	// Connect to your Database 
	/*mysql_connect("localhost", "username", "password") or die(mysql_error()); 
	mysql_select_db("test") or die(mysql_error()); 
	*/
	mysql_connect("localhost", "egcjc584_acc", "kshlyh0409") or die(mysql_error()); 
	mysql_select_db("egcjc584_acc") or die(mysql_error()); 
 
	// Select accounts
	/*
	$response = mysql_query("SELECT id as record_id, parentid, title, description, phone, email, photo, itemtype FROM accounts") or die(mysql_error()); 
   */

   $response = mysql_query("SELECT id as record_id, parentid, cFistName, nDirectCT,nEntireCT,cLastName, cCellNumb, cUserIDNO,itemtype,c1stValue,c2ndValue FROM acc_user") or die(mysql_error());
	// create some class for your records


	class Account
	{
		public $id = 0;
		public $parent = 'Progenitor';
		//public $parent = null;
		public $itemType = 0;
		public $title = '';
		public $description = '';
		public $phone = '';
		public $email = '';
		public $photo = '';
		
		/*public function load($record) {
			$this->id = $record['record_id'];
			$this->parent = $record['parentid'];
			$this->itemType = intval($record['itemtype']);
			$this->title = $record['title'];
			$this->description = $record['description'];
			$this->phone = $record['phone'];
			$this->email = $record['email'];
			$this->image = "demo/images/photos/" . $record['photo'];
			$this->href = "showdetails.php?recordid=" . $this->id;
		} */

		public function load($record) {
			$this->id = $record['record_id'];
			$this->parent = $record['parentid'];
			$this->itemType = intval($record['itemtype']);
			$this->title = $record['cFistName'].' '.$record['cLastName'];
			$this->description = '('.$record['nEntireCT'].') '.'('.$record['nDirectCT'].')';
			$this->phone = $record['cCellNumb'];
			$this->email = $record['cUserIDNO'];
			
			if ($record['c1stValue']=='green')
			$this->image = "demo/images/photos/green.png";
			else if ($record['c1stValue']=='red')
			$this->image = "demo/images/photos/red.png";
			else if ($record['c1stValue']=='yellow')
			$this->image = "demo/images/photos/yellow.png";
			else 
			$this->image = "demo/images/photos/grey.png";
			
			if ($record['c2ndValue']=='green')
			$this->image1 = "demo/images/photos/green.png";
			else if ($record['c1stValue']=='red')
			$this->image1 = "demo/images/photos/red.png";
			else if ($record['c1stValue']=='yellow')
			$this->image1 = "demo/images/photos/yellow.png";
			else 
			$this->image1 = "demo/images/photos/grey.png";

			$this->href = "showdetails.php?recordid=" . $this->id;
		} 
	}
	
	// create hash and group all children by parentid
	$items = Array();
	while($record = mysql_fetch_array( $response )) 
	{ 
		$account = new Account();
		$account->load($record);
		
		array_push($items, $account);
	} 

	function encodeURIComponent($str) {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
    }
	
	// serialize $rootAccount object including all its children into JSON string  
	$jsonstring = encodeURIComponent(json_encode($items));

	echo $jsonstring;
?>