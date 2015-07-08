<?php
	include_once dirname(__FILE__) . "/../include/function.php";
	$info	= empty($_GET["info"])?"":$_GET["info"];
		
	$DB 	= new myDB;
?>

<div class="main-col">
	<div class="page-title">
		<h1>
			<span>VIP Club</span>
		</h1>	
	</div>
	<div class="contents">
		<div class="sub1">
			<div class="title_sub">How to become a VIP member?</div>
			<div class="subcontent" style="margin-bottom: 12px;">
				<p class="p_general">To step into the VIP membership (i.e. become a VIP member), you must first <a href="?page=customer&account=create">register with Lemontreeclothing.com.</a> There are two ways for you to become a VIP member:</p>
				<ul>
					<li class="bullet">Every time you purchase from Lemontreeclothing.com, you earn BONUS POINTS.  Each US dolor is worth 0.05 point(s).  For example, if you place an order of total product amount $100, you earn 5 bonus points.<br/>
					Once your total bonus points earned reaches 1200 points, you automatically become a VIP member and are eligible to save money on every item you purchase from Lemontreeclothing.com.</li>
					<li class="bullet">The easiest and fastest way of becoming a VIP member of Lemontreeclothing.com is purchase a VIP mebership. This is for those who want to enjoy benefits of the VIP membership immediately. </li>
				</ul>
				<p class="p_general">Once you become a VIP member, there is no VIP membership expiration date as long as you are a Lemontreeclothing.com customer.</p>
			</div>
		</div>
		<div class="sub2">
			<div class="title_sub">What are the benefits of VIP members?</div>
			<div class="subcontent">
				<ul>
					<li class="bullet">VIP members save money on every itme posted in Lemontreeclothing.com by purchasing at a REDUCED PRICE rather than at a regular price. Each product has a REDUCED PRICE highlighted in color exclusively for VIP members.</li>
					<li class="bullet">Since VIP members are loyal customers of Lemontreeclothing.com, they receive exclusive customer services and care, which is a way of showing appreciation and respect from Lemontreeclothing.com.</li>
					<li class="bullet">VIP members receive EXCLUSIVE OFFERS for discount, sale and promotional items ahead of non-VIP members whenever such offers are available in Lemontreeclothing.com.</li>
					<li class="bullet">For the VIP members who show an outstanding record of total bonus points earned, Lemontreeclothing.com give such VIP members credit money as an added bonus. So, always check out your account for such credit money provided by Lemontreeclothing.com<br/>
					if you think that your total bonus points earned is high enough.</li>
				</ul>
			</div>
		</div>
		<div class="sub2">
			<div class="title_sub">What is the price for purchasing a VIP membership?</div>
			<div class="subcontent">
				<ul>
					<li class="bullet">Only $29.99. &nbsp; &nbsp; This is a lifetime membership fee.</li>
				</ul>
			</div>
		</div>
		<div class="sub2">
			<div class="title_sub">How to purchase a VIP membership?</div>
			<div class="subcontent">
				<ul>
					<li class="bullet">Not a member yet? &nbsp; &nbsp; <a href="?page=customer&account=create">Click here to Register</a> to become a member first.</li>
					<li class="bullet">Registered members? &nbsp; &nbsp; <a href="?pid=13911">Click here to Purchase a VIP membership now.</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>