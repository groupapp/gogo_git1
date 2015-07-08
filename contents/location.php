<?php
	$info	= empty($_GET["info"])?"":$_GET["info"];
	$id_vendor	= empty($_GET["id_vendor"])?"":$_GET["id_vendor"];
	$pagepath="market";
	$pagetitle=$id_vendor;
	$DB 	= new myDB;
?>


<div class="container">

<div class="main-col1 col-md-12">
	<div class="page-path">
		<ul>
			<li class="home"><a href="/" title="Go to Home Page">Home</a><span>/ </span></li>
			<li class="home"><strong><?php echo  $pagepath;?></strong></li>
		</ul>
	</div>

	<div class="page-path" >
		
		<ul>                                        
			<li class="home"><a href="/">Logo</a></li>	
			<li class="home" style="float:left;margin-left:10px;"><a href="index.php?p1=<?php echo $id_vendor?>">Sale</a></li>										
			<li class="home" style="float:left;margin-left:10px;"><a href="index.php?c1=<?php echo $id_vendor?>">Coupon</a></li>
			<li class="home" style="float:left;margin-left:10px;">Search</li>
			<li class="home" style="float:left;margin-left:10px;"><a href="?info=location&id_vendor=<?php echo $id_vendor?>">Market info</a></li>
		</ul>
		
	</div> 

	<div class="page-title">
		<h1><span><?php echo $pagetitle;?></span></h1>
		<input type="hidden" id="returnurl" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
	</div>
	<div class="contents">
		<div class="sub1">
		<p class="p_general">
		<iframe style="width: 800px; height: 500px;" id="google-map"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=embed&amp;q=777+E+12+Street+Los+Angeles ,+CA+90021 &amp;ie=UTF8&amp;hq=&amp;hnear=13113+Adler+Dr,+Santa+Fe+Springs,+California+90670&amp;ll=34.035777,-117.985021&amp;spn=2.04562,4.22699&amp;z=9&amp;output=embed"></iframe>
		</p>
		<p class="p_general">
		Email:<a href="mailto:online@mayandjulyclothing.com" ></a>
		</p>
		<p class="p_general">
		Tel:
		</p>
		<p class="p_general">
		Fax:
		</p>
		</div>
		
		
	</div>
</div>

</div>
<!-- container CLOSE -->