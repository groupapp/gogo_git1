<?php
	$DB = new myDB;
	$pageTitle = "";
	
	switch($arrGet[0][0]) {
		case "country":
		case "club":
		case "player":
		case "league":
		case "brand":
			$target_field = ($arrGet[0][0]=="brand")?"BrandName":$arrGet[0][0];
			$strSQL 	= "SELECT DISTINCT ".$target_field." FROM Products WHERE IsActive=\"Y\" AND ".
			
			$target_field." is not NULL AND ".$target_field."!=\"\" ORDER BY ".$target_field." ASC";
			$pagepath 	= "<p class=\"path-info\"><a href=\"?".$arrGet[0][0]."=more\">Shop By ".$arrGet[0][0]."</a></p></strong><span>/</span></li><li><strong>".$arrGet[0][1]."</strong></li>";
			$pagetitle 	= "Shop By ".$arrGet[0][0];
			$lblcount 	= ($arrGet[0][0]=="country")?" contries":" ".$arrGet[0][0]."s";
			
			if ($arrGet[0][0]=="country")
				$imgPath = "/images/NationalFlags/";
			elseif ($arrGet[0][0]=="club")
				$imgPath = "/images/ClubTeamLogos/";
			elseif ($arrGet[0][0]=="brand")
				$imgPath = "/images/BrandLogos/";
			elseif ($arrGet[0][0]=="league")
				$imgPath = "/images/LeagueLogos/";	
			break;
		case "c1":
			$strSQL = "SELECT * FROM Category2 WHERE Cat1ID=".$arrGet[0][1];
			$strCatSQL = "SELECT Cat1Name FROM Category1 WHERE Cat1ID=".$arrGet[0][1];
			$DB->query($strCatSQL);
			if ($DB->rows) {
				$data = $DB->fetch_row($DB->res);
			}
			$strOrd 	= "  ORDER BY Cat2SortNo ASC , Cat2Name ASC";
			$strSQL 	.= $strOrd;
			
			$pagetitle 	= $pagepath = $data[0];
			$lblcount 	= "categories";
			//$imgPath 	= "/images/Images_categories/";
			$imgPath 	= "/Images_categories/";
			
			break;
		default:
			$strCatSQL = "SELECT Cat1Name FROM Category1 WHERE Cat1ID=".$arrGet[0][1];
			$strSQL = "SELECT * FROM products WHERE IsActive=\"Y\" and Cat1ID=".$arrGet[0][1];
	}
?>
					<div class="main-col">
						<div class="page-path">
							<ul>
								<li class="home"><a href="/" title="Go to Home Page">Home</a><span>/ </span></li>
								<li class="home"><strong><?php echo $pagepath?></strong></li>
							</ul>
						</div>
						<div class="page-title">
							<h1><span><?php echo $pagetitle?></span></h1>
						</div>
						
						<div class="category-products">
<?php
	$rowcount = 2;
	$count = 0;
	
	$DB->query($strSQL);
	$numrows = $DB->rows;
	//echo $strSQL;
	$DB->query($strSQL);
	if ($numrows) {
?>
							<div class="optionbox">
								<div class="pager">
									<p class="amount"><?php echo $numrows?> <span class="lblcount"><?php echo $lblcount?></span></p>
									<div class="page-limiter">
										<p class="page-show"></p>
									</div>
								</div>
							</div>
							
							<!-- //*****************************  CATEGORY LIST *******************************// -->
							<div class="optionbox" style="padding-bottom: 10px;">
<?php
		while($data = $DB->fetch_row($DB->res)) {
			$count++;
			if ($count==1 || $count%3==1) echo "<ul class=\"category-list\">";
			if ($count%3==0) { $category_li_class = " last"; }else{ $category_li_class=""; }
			
			switch($arrGet[0][0]) {
				case "country":
				case "club":
				case "player":
				case "league":					
				case "brand":
					$href 	= "?" . $arrGet[0][0] . "=" . $data[0];
					$imgsrc = ($arrGet[0][0]=="brand")?$imgPath."Logo_".preg_replace("[\ ]","",$data[0]).".gif":$imgPath.preg_replace("[\ ]","",$data[0]).".jpg";
					if($arrGet[0][0]=="player")
						echo ("<li class=\"{$category_li_clalss}\">
								<div class=\"flag\"></div>
								<div class=\"str-category\"><a href=\"{$href}\">$data[0]</a></div></li>");
					else
						echo ("<li class=\"{$category_li_clalss}\">
								<div class=\"flag\"><a href=\"{$href}\"><img src=\"{$imgsrc}\" /></a></div>
								<div class=\"str-category\"><a href=\"{$href}\">$data[0]</a></div></li>");
					break;
				case "c1":
					$href 	= "?" . arr2url($arrGet) . "&c2=" . $data[0];
					$imgsrc = $imgPath.$data[4];
					
					echo ("<li class=\"{$category_li_clalss} category-headings\">
							<div class=\"item\" style=\"text-align:center\">
							<a href=\"{$href}\"><img src=\"{$imgsrc}\" /></a></div>
							<div class=\"str-category category-label\" style=\"text-align:center\"><a href=\"{$href}\"><strong>$data[3]</strong></a></div></li>");
					break;
			}
			if ($count>2 && $count%3==0) echo "</ul>";
		}
		echo (!$count%3==0)?"</ul>":"";
	} else {
		echo "Products not found.";
	}
?>								
							</div>
							<!-- //*****************************  END CATEGORY LIST *******************************// -->
						</div>
					
					</div>
