<?php 
	$cat1ID = $_GET["c1"];
	$BrandName = $_GET["brand"];
	$ForMenOrWomen = $_GET["menorwomen"];
	
	echo $cat1ID." ".$BrandName." ".$ForMenOrWomen;
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	echo " Hello!<br/>";
	
	if($cat1ID==2){
		//#Balls
		echo "Balls<br/>";
		echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#ball\" class=\"iframe_jy\"></iframe>";
	}elseif($cat1ID==7){
		//footwear
		echo "footwear";
		if($BrandName=="Adidas"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults" || $ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Adidas_footwear
				echo "Adidas_footwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Adidas_footwear\" class=\"iframe_jy\"></iframe>";
			}else{
				//#Guidelines_kidsfootwear
				echo "Guidelines_kidsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kidsfootwear\" class=\"iframe_jy\"></iframe>";
			}	
		}elseif($BrandName=="Diadora"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults" || $ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Diadora_footwear
				echo "Diadora_footwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Diadora_footwear\" class=\"iframe_jy\"></iframe>";
			}else{
				//#Guidelines_kidsfootwear
				echo "Guidelines_kidsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kidsfootwear\" class=\"iframe_jy\"></iframe>";
			}	
		}elseif($BrandName=="Joma"){
			//#Joma_footwear	
			echo "Joma_footwear";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Joma_footwear\" class=\"iframe_jy\"></iframe>";
		}elseif($BrandName=="Kelme"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults" || $ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Kelme_footwear
				echo "Kelme_footwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Kelme_footwear\" class=\"iframe_jy\"></iframe>";
			}else{
				//#Guidelines_kidsfootwear
				echo "Guidelines_kidsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kidsfootwear\" class=\"iframe_jy\"></iframe>";
			}	
		}elseif($BrandName=="Nike"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults" || $ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Nike_footwear
				echo "Nike_footwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Nike_footwear\" class=\"iframe_jy\"></iframe>";
			}else{
				//#Guidelines_kidsfootwear
				echo "Guidelines_kidsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kidsfootwear\" class=\"iframe_jy\"></iframe>";
			}	
		}elseif($BrandName=="Puma"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults" || $ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Puma_footwear
				echo "Puma_footwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Puma_footwear\" class=\"iframe_jy\"></iframe>";
			}else{
				//#Guidelines_kidsfootwear
				echo "Guidelines_kidsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kidsfootwear\" class=\"iframe_jy\"></iframe>";
			}	
		}elseif($BrandName=="Reebok"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults" || $ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Reebok_footwear
				echo "Reebok_footwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Reebok_footwear\" class=\"iframe_jy\"></iframe>";
			}else{
				//#Guidelines_kidsfootwear
				echo "Guidelines_kidsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kidsfootwear\" class=\"iframe_jy\"></iframe>";
			}	
		}else{
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults" || $ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Guidelines_adultsfootwear
				echo "Guidelines_adultsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_adultsfootwear\" class=\"iframe_jy\"></iframe>";
			}else{
				//#Guidelines_kidsfootwear
				echo "Guidelines_kidsfootwear";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kidsfootwear\" class=\"iframe_jy\"></iframe>";
			}
		}
	}elseif($cat1ID==14){
		//Shinguards
		echo "Shinguards";
		echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#shinguards\" class=\"iframe_jy\"></iframe>";
	}elseif($cat1ID==16){
		//Socks
		echo "Socks";
		if($BrandName=="Adidas"){
			//#Adidas_socks
			echo "Adidas_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Adidas_socks\" class=\"iframe_jy\"></iframe>";
		}elseif($BrandName=="Diadora"){
			//#Diadora_socks
			echo "Diadora_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Diadora_socks\" class=\"iframe_jy\"></iframe>";
		}elseif($BrandName=="Kelme"){
			//#Kelme_socks
			echo "Kelme_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Socks (by Shoe Sizes)\" class=\"iframe_jy\"></iframe>";
		}elseif($BrandName=="Nike"){
			//#Nike_socks
			echo "Nike_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Nike_socks\" class=\"iframe_jy\"></iframe>";
		}elseif($BrandName=="Puma"){
			//#Puma_socks
			echo "Puma_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Puma_socks\" class=\"iframe_jy\"></iframe>";
		}elseif($BrandName=="Reebok"){
			//#Reebok_socks
			echo "Reebok_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Reebok_socks\" class=\"iframe_jy\"></iframe>";
		}elseif($BrandName=="Umbro"){
			//#Umbro_socks
			echo "Umbro_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Umbro_socks\" class=\"iframe_jy\"></iframe>";
		}else{
			//#Guidelines_socks
			echo "Guidelines_socks";
			echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_socks\" class=\"iframe_jy\"></iframe>";
		}
	}else{
		if($BrandName=="Adidas"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Adidas_men
				echo "Adidas_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Adidas_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Adidas_women
				echo "Adidas_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Adidas_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Adidas_youth
				echo "Adidas_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Adidas_youth\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Kids" || $ForMenOrWomen=="Kids Boys" || $ForMenOrWomen=="Kids Girls"){
				//#Adidas_kids
				echo "Adidas_kids";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Adidas_kids\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Toddlers"){
				//#Adidas_toddlers
				echo "Adidas_toddlers";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Adidas_toddlers\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Diadora"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Diadora_men
				echo "Diadora_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Diadora_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Diadora_women
				echo "Diadora_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Diadora_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Diadora_youth
				echo "Diadora_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Diadora_youth\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Joma"){
			echo "Joma something";
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Joma_teamsetsA
				echo "Kelme_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Joma_teamsetsA\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Joma_teamsetsY
				echo "Kelme_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Joma_teamsetsY\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Kelme"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Kelme_men
				echo "Kelme_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Kelme_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Kelmea_women
				echo "Kelmea_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Kelme_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Kelme_youth
				echo "Kelme_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Kelme_youth\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Nike"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Nike_men
				echo "Nike_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Nike_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Nike_women
				echo "Nike_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Nike_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Nike_youth
				echo "Nike_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Nike_youth\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Kids" || $ForMenOrWomen=="Kids Boys" || $ForMenOrWomen=="Kids Girls"){
				//#Nike_kids
				echo "Nike_kids";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Nike_kids\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Toddlers"){
				//#Nike_toddlers
				echo "Nike_toddlers";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Nike_toddlers\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Puma"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Puma_men
				echo "Puma_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Puma_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Puma_women
				echo "Puma_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Puma_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Puma_youth
				echo "Puma_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Puma_youth\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Reebok"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Reebok_men
				echo "Reebok_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Reebok_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Reebok_women
				echo "Reebok_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Reebok_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Reebok_youth
				echo "Reebok_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Reebok_youth\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Rhinox"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Rhinox_men
				echo "Rhinox_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Rhinox_adultmen\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Rhinox_youth
				echo "Rhinox_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Rhinox_youngboys\" class=\"iframe_jy\"></iframe>";
			}
		}elseif($BrandName=="Umbro"){
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Umbro_men
				echo "Umbro_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Umbro_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Umbro_women
				echo "Umbro_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Umbro_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Umbro_youth
				echo "Umbro_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Umbro_youth\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Kids" || $ForMenOrWomen=="Kids Boys" || $ForMenOrWomen=="Kids Girls"){
				//#Umbro_kids
				echo "Umbro_kids";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Umbro_kids\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Toddlers"){
				//#Umbro_toddlers
				echo "Umbro_toddlers";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Umbro_toddlers\" class=\"iframe_jy\"></iframe>";
			}
		}else{
			if($ForMenOrWomen=="Men" || $ForMenOrWomen=="Adults" || $ForMenOrWomen=="Youth and Adults"){
				//#Guidelines_men
				echo "Guidelines_men";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_men\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Women" || $ForMenOrWomen=="Girls and Women"){
				//#Guidelines_women
				echo "Guidelines_women";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_women\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Youth"|| $ForMenOrWomen=="Youth Boys"|| $ForMenOrWomen=="Youth Girls"|| $ForMenOrWomen=="Intermediate"|| $ForMenOrWomen=="Kids and Youth"){
				//#Guidelines_youth
				echo "Guidelines_youth";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_youth\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Kids" || $ForMenOrWomen=="Kids Boys" || $ForMenOrWomen=="Kids Girls"){
				//#Guidelines_kids
				echo "Guidelines_kids";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_kids\" class=\"iframe_jy\"></iframe>";
			}elseif($ForMenOrWomen=="Toddlers"){
				//#Guidelines_toddlers
				echo "Guidelines_toddlers";
				echo "<iframe src=\"http://sshop.i9biz.com/contents/iframe.html#Guidelines_toddlers\" class=\"iframe_jy\"></iframe>";
			}
		}
	}
?>