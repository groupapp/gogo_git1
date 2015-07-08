<?php
	$account	= empty($_GET["account"])?"":$_GET["account"];
	$email		= empty($_GET["email"])?"":$_GET["email"];
	
	$DB 	= new myDB;
?>
<div class="customer main-col1 container">
	<div class="account-create">
	    <div class="page-title">
	        <h1><span>ACCOUNT RETRIEVAL</span></h1>
	    </div>
	    <div class="retrieve_box">
	    	<form name="frmRetrievePassword" method="post" action="../lib/retrieve_action.php">
		    	<div class="content">
		    	<?php 
		    		if($account=="retrieve"){
		    	?>
		    		<h2>FORGOTTEN YOUR PASSWORD?</h2>
		    		<p>Please provide either a username or email address below.</p>
		    		<p>Once you enter the requested information we will use it to search for your account. The account information will then be sent to the email address on record for your account.</p>
		    		<ul class="form-list">
		    			<li>
		    				<label for="email" class="required">
		    					<em>*</em>
		    					Email Address
		    				</label>
		    				<div class="input-box">
		    					<input type="text" name="EmailAddress" value style="width: 200px;"/>
		    				</div>
		    			</li>
		    		</ul>
		    		<p>Please be sure to <span class="redstar">add our emails to your safe list</span> to prevent them from being caught by SPAM filters.</p>
		    		<button type="submit" class="button" onclick="return Retrieve(this.form)">
		    			<span>Retrieve Account</span>
		    		</button>
		    		<input type="hidden" name="action" value="find"/>
		    	<?php }elseif($account=="retrieve_success"){?>
		    		<p>We've sent your password to your email address.</p>
		    		<button class="button">
		    			<span><a href="/?page=customer&account=login" style="color: white;">Go to Log in</a></span>
		    		</button>
		    	<?php }elseif($account=="retrieve_fail"){?>
		    		<p>Sorry, this email is not in our database. Please enter another address or 
		    		<a href="/?page=customer&account=create" style="color: blueViolet;">register with us!</a></p>
		    		<ul class="form-list">
		    			<li>
		    				<label for="email" class="required">
		    					<em>*</em>
		    					Email Address
		    				</label>
		    				<div class="input-box">
		    					<input type="text" name="EmailAddress" value="<?php echo $email;?>" style="width: 200px;"/>
		    				</div>
		    			</li>
		    		</ul>
		    		<p>Please be sure to <span class="redstar">add our emails to your safe list</span> to prevent them from being caught by SPAM filters.</p>
		    		<button type="submit" class="button" onclick="return Retrieve(this.form)">
		    			<span>Retrieve Account</span>
		    		</button>
		    	<?php }?>
	    		</div>
	    	</form>	    	
	    </div>
	</div>
</div>