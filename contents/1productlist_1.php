<?php

	$DB             = new myDB;
	$pageTitle      = "";
	$q              = $_GET["q"];
	$q1             =explode(" ", $q);
	//print_r('a'.$q);
		//exit;
	$shopby			= $_GET["shopby"];
	$new			= $_GET["new"];
	$sale			= $_GET["sale"];
	$deal			= $_GET["deal"];
	$BrandName		= $_GET["BrandName"];
	$ForMenOrWomen	= $_GET["ForMenOrWomen"];
	$c2				= $_GET["c2"];
	$Player			= $_GET["Player"];
	$League			= $_GET["League"];
	$Country		= $_GET["Country"];
	$ColorIDs		= $_GET["ColorIDs"];
	$SizeChartID	= $_GET["SizeChartID"];
	$Size			= $_GET["Size"];
	$minprice		= $_GET["minprice"];
	$maxprice		= $_GET["maxprice"];
	$nomaxprice		= $_GET["nomaxprice"];
	
	//print_r('xx'.$new);
	//exit;	
	switch($arrGet[0][0]) {
		case "country":
		case "club":
		case "player":
		case "league":		
		/*$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" AND IsHolidaySale=\"Y\"";
		print($strSQL);
		exit;
		break;	*/
		case "brand":
			$strSQL = "SELECT * FROM Products WHERE IsActive=\"Y\" AND ";
			$strSQL .= ($arrGet[0][0]=="brand")?"BrandName":$arrGet[0][0];
			$strSQL .= "=\"".$arrGet[0][1]."\"";
			$pagepath = "<p class=\"path-info\"><a href=\"?".$arrGet[0][0]."=more\">Shop By ".$arrGet[0][0]."</a></p></strong><span>/</span></li><li><strong>".$arrGet[0][1]."</strong></li>";
			$pagetitle = $arrGet[0][1];
			if ($arrGet[0][0]=="country")
				$strOrd = " ORDER BY DateTimeCreated DESC, DateTimeLastModified DESC, Cat1ID ASC, ProductName ASC";
			elseif ($arrGet[0][0]=="brand")
				$strOrd = " ORDER BY DateTimeCreated DESC, Cat1ID ASC, BrandName ASC, UnitPrice ASC";
			elseif ($arrGet[0][0]=="club")
				$strOrd = " ORDER BY DateTimeCreated DESC, ProductName ASC, Cat1ID ASC";
			break;
		case "c1":
		
			$strCatSQL = "SELECT Cat1Name FROM Category1 WHERE Cat1ID=".$arrGet[0][1];
			$strSQL = "SELECT *,DATEDIFF( DateTimeCreated, DATE_SUB( NOW( ) , INTERVAL 14 DAY ) ) >0 AS new FROM Products WHERE IsActive=\"Y\" and Cat1ID=".$arrGet[0][1];
			$DB->query($strCatSQL);
			
			if ($DB->rows) {
				$data = $DB->fetch_row($DB->res);
				
				$pagetitle = $pagepath = $data[0];
				$pagepath.="<span>/</span>";
	//print_r($pagepath);	
	//exit;
			}
			
			if (!empty($c2)) {
				$strSQL .= " and Cat2ID=".$c2;
				$strCat2SQL = "SELECT Cat2Name FROM Category2 WHERE Cat2ID=".$c2;
				$DB->query($strCat2SQL);
				if ($DB->rows) {
					$data = $DB->fetch_row($DB->res);
					$pagepath = "<p class=\"path-info\"><a href=\"?".$arrGet[0][0]."=".$arrGet[0][1]."\">".$pagetitle."</a></p></strong><span>/</span></li><li><strong>".$data[0]."</strong></li>";
					//$pagetitle = $data[0];
				}
			}
			
			$delpath="<a class=\"delpath\" href=\"?".$arrGet[0][0]."=".$arrGet[0][1];
			/*
			if (!empty($BrandName))
			$pathchk=1;
			if (!empty($Player))
			*/
			
			if (!empty($c2)) {
				$strSQL .= " and Cat2ID=".$c2;
				//$strCat2SQL = "SELECT Cat2Name FROM Category2 WHERE Cat2ID=".$c2;
				$DB->query($strSQL);
				if ($DB->rows) {
					
					$strCaSQL = "SELECT Cat2Name FROM Category2	 WHERE Cat2ID =".$c2;
					$DB->query($strCaSQL);
					$data = $DB->fetch_row($DB->res);
					
					$pagepath .= "<li><strong>".$delpath."&c2=&BrandName=".$BrandName."&ForMenOrWomen=".$ForMenOrWomen."&Player=".$Player."&League=".$League."&Country=".$Country."&ColorIDs=".$ColorIDs."&SizeChartID=".$SizeChartID."&Size=".$Size."&minprice=".$minprice."&maxprice=".$maxprice."\"></a> </strong><span>/</span></li></strong></li>";
					//$pagetitle = $data[0];
				}
			}
			
			if (!empty($BrandName)) {
				$strSQL .= " and BrandName='".$BrandName."'";
				
				$DB->query($strSQL);
				if ($DB->rows) {
					//$data = $DB->fetch_row($DB->res);
					$pagepath .= "<li><strong>".$BrandName.$delpath."&c2=".$c2."&BrandName=&ForMenOrWomen=".$ForMenOrWomen."&Player=".$Player."&League=".$League."&Country=".$Country."&ColorIDs=".$ColorIDs."&SizeChartID=".$SizeChartID."&Size=".$Size."&minprice=".$minprice."&maxprice=".$maxprice."\"></a> </strong><span>/</span></li></strong></li>";
					//$pagetitle =$BrandName;
					//$pagetitle = $data[0];
				}
			}
			
			if (!empty($ForMenOrWomen)) {
				$strSQL .= " and ForMenOrWomen='".$ForMenOrWomen."'";
				
				$DB->query($strSQL);
				if ($DB->rows) {
					//$data = $DB->fetch_row($DB->res);
					$pagepath .= "<li><strong>".$ForMenOrWomen.$delpath."&c2=".$c2."&ForMenOrWomen=&BrandName=".$BrandName."&Player=".$Player."&League=".$League."&Country=".$Country."&ColorIDs=".$ColorIDs."&SizeChartID=".$SizeChartID."&Size=".$Size."&minprice=".$minprice."&maxprice=".$maxprice."\"></a> </strong><span>/</span></li></strong></li>";
					//$pagetitle =$BrandName;
					//$pagetitle = $data[0];
				}
			}
			
			if (!empty($Player)) {
				$strSQL .= " and Player='".$Player."'";
				$DB->query($strSQL);
				if ($DB->rows) {
					//$data = $DB->fetch_row($DB->res);
					$pagepath .="<li><strong>".$Player.$delpath."&c2=".$c2."&BrandName=".$BrandName."&ForMenOrWomen=".$ForMenOrWomen."&Player=&League=".$League."&Country=".$Country."&ColorIDs=".$ColorIDs."&SizeChartID=".$SizeChartID."&Size=".$Size."&minprice=".$minprice."&maxprice=".$maxprice."\"> </a> </strong><span>/</span></li></strong></li>";
					//$pagetitle = $Player;
				}
			}
			if (!empty($League)) {
				$strSQL .= " and League='".$League."'";
				$DB->query($strSQL);
				if ($DB->rows) {
					//$data = $DB->fetch_row($DB->res);
					$pagepath .="<li><strong>".$League.$delpath."&c2=".$c2."&BrandName=".$BrandName."&ForMenOrWomen=".$ForMenOrWomen."&Player=".$Player."&League=&Country=".$Country."&ColorIDs=".$ColorIDs."&SizeChartID=".$SizeChartID."&Size=".$Size."&minprice=".$minprice."&maxprice=".$maxprice."\"> </a> </strong><span>/</span></li></strong></li>";
					$pagetitle = $League;
				}
			}
			if (!empty($Country)) {
				$strSQL .= " and Country='".$Country."'";
				$DB->query($strSQL);
				if ($DB->rows) {
					$data = $DB->fetch_row($DB->res);
					$pagepath .="<li><strong>".$Country.$delpath."&c2=".$c2."&BrandName=".$BrandName."&ForMenOrWomen=".$ForMenOrWomen."&Player=".$Player."&League=".$League."&Country=&ColorIDs=".$ColorIDs."&SizeChartID=".$SizeChartID."&Size=".$Size."&minprice=".$minprice."&maxprice=".$maxprice."\"> </a> </strong><span>/</span></li></strong></li>";
					//$pagetitle = $Country;
				}
			}
			if (!empty($ColorIDs)) {
				$strSQL .= " and ColorIDs='".$ColorIDs."'";
				$DB->query($strSQL);
				if ($DB->rows) {
					//$data = $DB->fetch_row($DB->res);					
					
					$strColorSQL = "SELECT Color FROM Colors WHERE ColorID=".$ColorIDs;
					$DB->query($strColorSQL);
					$data = $DB->fetch_row($DB->res);
					
					$pagepath .= "<li><strong>".$data[0].$delpath."&c2=".$c2."&BrandName=".$BrandName."&ForMenOrWomen=".$ForMenOrWomen."&Player=".$Player."&League=".$League."&Country=".$Country."&SizeChartID=".$SizeChartID."&Size=".$Size."&minprice=".$minprice."&maxprice=".$maxprice."&ColorIDs=\"> </a> </strong><span>/</span></li></strong></li>";
					//$pagetitle = $data[0];
					
				}
			}
			if (!empty($SizeChartID	)) {
				$strSQL .= " and SizeChartID='".$SizeChartID."'";
				$DB->query($strSQL);
				if ($DB->rows) {
					
					
					$pagepath .= "<li><strong>".$Size.$delpath."&c2=".$c2."&BrandName=".$BrandName."&ForMenOrWomen=".$ForMenOrWomen."&Player=".$Player."&League=".$League."&Country=".$Country."&ColorIDs=".$ColorIDs."&minprice=".$minprice."&maxprice=".$maxprice."&SizeChartID=&Size=\"> </a> </strong><span>/</span></li></strong></li>";
					//$pagetitle = $Size;
					
				}
			}
			 if (!empty($maxprice)) {
				$strSQL .= " and UnitPriceOnSale BETWEEN ".$minprice." and ".$maxprice;
				$DB->query($strSQL);
				if ($DB->rows) {
					//$data = $DB->fetch_row($DB->res);					
					
					$pagepath .= "<li><strong>$".$minprice."~$".$maxprice.$delpath."&c2=".$c2."&BrandName=".$BrandName."&ForMenOrWomen=".$ForMenOrWomen."&Player=".$Player."&League=".$League."&Country=".$Country."&minprice=&maxprice=&ColorIDs=".$ColorIDs."\"> </a> </strong><span>/</span></li></strong></li>";
					//$pagetitle = "$".$minprice.'~$'.$maxprice;
				}
			}
			
			if (!empty($minprice) && $nomaxprice==1){
				$strSQL .= " and UnitPriceOnSale >=".$minprice;
				$DB->query($strSQL);
				if ($DB->rows) {
					//$data = $DB->fetch_row($DB->res);
					$pagepath = "<p class=\"path-info\"><a href=\"?".$arrGet[0][0]."=".$arrGet[0][1]."\">".$pagetitle."</a></p><p class=\"path-info\"><a href=\"?".$arrGet[0][0]."=".$arrGet[0][1]."\">".$pagetitle."</a></p></strong><span>/</span></li><li><strong>".$minprice."</strong></li>";
					//$pagetitle = $data[0];
					//$pagetitle = $minprice." Over";
				}
			}
			if (!empty($c2) ||!empty($BrandName) || !empty($Player) || !empty($League) || !empty($Country) || !empty($ColorIDs) || !empty($maxprice) || !empty($minprice))
			$pagepath .=$delpath."&c2&BrandName=&ForMenOrWomen=&Player=&League=&Country=&minprice=&maxprice=&ColorIDs=\" style=\"background:none;width:auto;\"> Clear All</a>";
			
			$strOrd = " ORDER BY ProductID DESC";
			break;
		default:
			$strCatSQL = "SELECT Cat1Name FROM Category1 WHERE Cat1ID=".$arrGet[0][1];
			$strSQL = "SELECT *,DATEDIFF( DateTimeCreated, DATE_SUB( NOW( ) , INTERVAL 14 DAY ) ) >0 AS new FROM Products WHERE IsActive=\"Y\" and Cat1ID=".$arrGet[0][1];
	}
	if (!empty($q))
	{
		//print($q);
		//exit;
		$strSQL = "SELECT *,DATEDIFF( DateTimeCreated, DATE_SUB( NOW( ) , INTERVAL 14 DAY ) ) >0 AS new FROM Products WHERE IsActive=\"Y\" ";
		
		if (count($q1)>1)
			for ($i=0; $i<count($q1); $i++)
			{
				$strSQL .= " and (ProductName  LIKE '%".$q1[$i]."%' or searchEngineTags  LIKE '%".$q1[$i]."%')";
			}
		else
			$strSQL .= " and (ProductName  LIKE '%".$q."%' or searchEngineTags  LIKE '%".$q."%')";
		//if (count($q1)==1)*/	
		//$strSQL .= " and (ProductName  LIKE '%".$q."%')";
		$strSQL .= " or (StyleNo  LIKE '%".$q."%')";
		$strSQL .= " ORDER BY ProductID DESC";
		echo "<!-- " . $strSQL . " -->";
	}
	elseif ($new > 0)
	{
		$strSQL = "SELECT *,DATEDIFF( DateTimeCreated, DATE_SUB( NOW( ) , INTERVAL ".$new." DAY ) ) >0 AS new FROM Products WHERE IsActive=\"Y\" and DATEDIFF( DateTimeCreated, DATE_SUB( NOW( ) , INTERVAL ".$new." DAY ) ) >0 order by DateTimeCreated DESC";
//		echo $strSQL."<br/>";
		$pagetitle="New Arrivals";
		$pagepath=$pagetitle;
	}
	elseif ($shopby == 'apparel'){
		$strSQL = "SELECT * 
				FROM `Products` 
				WHERE ((`Cat1ID` = 10 && `Cat2ID` = 104) || `Cat1ID` = 42 || (`Cat1ID` = 35 || (`Cat1ID` = 19 && `Cat2ID` = 67) || (`Cat1ID` = 20 && `Cat2ID` = 329)) || (`Cat1ID` = 19 && `Cat2ID` =106) || `Cat1ID` = 15 || (`Cat1ID` = 16 || (`Cat1ID` = 20 && `Cat2ID` = 74) || (`Cat1ID` = 48 && `Cat2ID` = 298)) || `Cat1ID` = 13 || `Cat1ID` = 36 || (`Cat1ID` = 18 || (`Cat1ID` = 17 && `Cat2ID` = 178)) || (`Cat1ID` = 19 && (`Cat2ID` = 68 || `Cat2ID` = 69))) && IsActive = 'Y'";
		$pagetitle="Apparel";
		$pagepath=$pagetitle;
	}
	elseif (!empty($sale))
	{
		$strSQL = "SELECT *,(100*(UnitPrice-UnitPriceOnSale)/UnitPrice) as Rate FROM Products WHERE IsActive=\"Y\" and UnitPrice-UnitPriceOnSale>0 order by Rate DESC";
		$pagetitle="Sale items";
		$pagepath=$pagetitle;
	}
	elseif (!empty($deal))
	{
		$strSQL = "SELECT *,(100*(UnitPrice-UnitPriceOnSale)/UnitPrice) as Rate FROM Products WHERE IsActive=\"Y\" and (100*(UnitPrice-UnitPriceOnSale)/UnitPrice)>=60 order by UnitPrice DESC";
		$pagetitle="Deals of the week";
		$pagepath=$pagetitle;
	}
	
?>

                  

					<!-- //***************************** MAIN *******************************// -->
					<!--div class="main-container <?php echo $main_css;?>" style="padding-bottom: 0;"-->
						<!--div class="main"-->
                        

            
                            <!-- .main-col-list OPEN =========================================================================================================================== -->
                            <div class="main-col-list col-md-10">
                                <div class="page-path">
                                    <ul>
                                        <li class="home"><a href="/" title="Go to Home Page">Home</a><span>/ </span></li>
                                        <li class="home"><strong><?php echo (empty($q) ? $pagepath : $q);?></strong></li>
                                    </ul>
                                </div>
                                <div class="page-title">
                                    <h1><span><?php echo $pagetitle;?></span></h1>
                                    <input type="hidden" id="returnurl" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
                                </div>

                                <?php 
                                    if($arrGet[0][1]==57) {
                                ?>

                                <script type="text/javascript">
                                    function GiftBlance() {
                                    //var number=document.getElementById('gift_number').value;
                                    var code=document.getElementById('gift_code').value;
                                    /*
                                    if(number==''){
                                        alert("Please input Gift Certificate Number!");
                                        document.getElementById('gift_number').focus();
                                        return false;
                                    }*/
                                    if(code ==''){
                                        alert("Please input Authorization Code!");
                                        document.getElementById('gift_code').focus();
                                        return false;
                                    }
                                    var bal=checkgift(code)
                                    alert(bal);
                                    //$('#billing\\:email').addClass("validation-failed");
                                    }
                                </script>

                                <div class="title_sub">Check Balance</div>
                                <div class="sub1">
                                    <table>
                                        <tr>
                                            <!--<td class="general" style="padding-top: 10px;">Gift Certificate Number :</td>
                                            <td class="general" style="padding-top: 10px;"><input type="text" name="gift_number" id="gift_number"></td>-->
                                            <td class="general" style="padding-top: 10px;">Authorization Code :</td>
                                            <td class="general" style="padding-top: 10px;"><input type="text" name="gift_code" id="gift_code"></td>
                                            <td class="general"><button type="button" onclick="GiftBlance()" name="btn_balance" class="button"><span>Check</span></button></td>
                                        </tr>
                                    </table>
                                </div>

                                <?php 
                                    }
                                ?>

                                <!-- .category-products OPEN =========================================================================================================================== -->
                                <div class="category-products incontainer"><!--incontainer  infinite scroll-->

                                    <?php
                                        $rowcount = 2;
                                        $count = 0;

                                        $DB->query($strSQL);
                                        $numrows = $DB->rows;

                                        /****** PAGING ******/
                                        if ($_COOKIE["itemspp"]){
                                            $LIMIT = $_COOKIE["itemspp"];
                                        }

                                        $totalpps = ($LIMIT < 0) ? 1 : ceil($numrows/$LIMIT);
                                        if ($pp < 1 || $pp > $totalpps){
                                            $pp = 1;
                                        }

                                        $list_num = $LIMIT * ($pp - 1);
                                        if ($LIMIT > 0) {
                                            $strSQL .= $strOrd . " LIMIT {$list_num}, {$LIMIT}";
                                        }

                                        //echo "<!-- ".$strSQL." -->";
                                        $DB->query($strSQL);

                                        // if OPEN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        if ($numrows){
                                    ?>
                                    <div class="optionbox">
                                        <div class="pager">
                                            <p class="amount">&nbsp;<?php echo $numrows?> Item(s)</p>
                                            <!--<div class="page-limiter">
                                                <p class="page-show">Showing</p>
                                                <ul>

                                                    <?php 
                                                        for ($i=9; $i<40; $i*=2) {
                                                            if ($i==$LIMIT){
                                                                echo "<li>".$i."</li>";
                                                            }
                                                            else{
                                                                echo "<li><a href=\"javascript:void(0);\" onclick=\"listItems('itemspp',{$i})\">".$i."</a></li>";
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </div>-->
                                        </div>
                                    </div>



                                        <!-- //*****************************  PRODUCT LIST *******************************// -->
                                        <?php
                                            // while OPEN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            while($data = $DB->fetch_array($DB->res)){
                                                $count++;
                                                
                                                /*
                                                if($count==1 || $count%5==1){
                                                    
                                                    // <ul> OPEN ========================================================================================================

                                                    echo "<ul class=\"products-list\">";
                                                }
                                                if($count%5==0){
                                                    $product_li_class = " last";
                                                }
                                                else{
                                                    $product_li_class = "";
                                                }
                                                */
                                                
                                                $href = "?pid=" . $data["ProductID"];


												//http://infiniteajaxscroll.com/docs/getting-started.html   infi scroll  don  
                                        ?>

                                        
                                        
                                        

                                        <!-- AJAX AJAX AJAX AJAX AJAX AJAX AJAX -->
                                        
                                        <div class="initem item col-lg-3 col-md-4 col-sm-6 col-xs-12 <?php //echo $product_li_class?>"><!--initem  infinite scroll-->
                                            <div class=" product-list-item-large ">
                                            <?php 
                                                if ($data["new"]==1){
                                                    echo "<div class=\"new-item-tag\" style=\"position:relative;width:0;height:0;\"><img src=\"/images/new_ribbon.png\" /></div>";
                                                }
                                            ?>
                                            <div class="product-box">
                                                <h2 class="product-brand"><?php echo $data["BrandName"];?></h2>
                                                <h2 class="product-name">
                                                    <a href="<?php echo $href?>" title=""><?php echo $data["ProductName"];?></a>
                                                </h2>
                                            </div>
                                            <!-- <div class="desc"><?php //echo $data["ProductDescription"]?></div>  -->
                                            <div class="grid-inner">
                                                <a href="<?php echo $href?>" title="" class="product-image"><img src="<?php echo PRODUCT_IMAGE_PATH . $data["Picture1"];?>"<?php //echo imgFit($data["Picture1"], 507, 507);?>/></a>
                                                
                                                
                                                
                                                <a class="quick-view-button" href="./contents/quickproduct.php?pid=<?php echo $data["ProductID"]?>">
                                                    Quick View
                                                </a>
                                                




                                               <!-- <a class="ajax" href="http://lemontreeclothing.com/contents/quickproduct.php?pid=<?php echo $data["ProductID"]?>">Quick View</a>-->
                                            </div>
                                            <div class="price-wrapper">
                                                <div class="price-box">
                                                    <span class="regular-price" id="product-price-25">
                                                        <span class="price"><?php echo "\$".formatMoney($data["UnitPriceOnSale"])?></span>&nbsp;
                                                        <span class="regprice"><?php echo (($data["UnitPriceOnSale"] < $data["UnitPrice"])? "\$".formatMoney($data["UnitPrice"]) : null);?></span>
                                                        <?php
                                                            if(!empty($sale) || !empty($deal)){
                                                                echo "<span class=\"price\">(".round($data["Rate"],0)."%)</span>";
                                                            }

                                                    //	if ($data["new"]==1)
                                                        //echo "NEW"
                                                        ?>
														<span><a href="#" title="Add to Wishlist" onclick="pladdwish(<?php echo $data["ProductID"];?>)" class="link-wishlist"><img src="/images/add_favorite.gif"></a></span>
                                                    </span>
                                                </div>
                                                <!--<p class="no-rating">
                                                    <a href="">Be the first to review this product</a>
                                                </p>-->
                                                <div class="actions">
                                                    <!--<a href="<?php echo $href;?>" >
                                                        <button type="button" title="" class="button btn-cart">
                                                            <span>More</span>
                                                        </button>
                                                    </a>-->
                                                    <span id="ajax_loader25" style="display: none;">
                                                        <img src="/images/ajax_loader.gif" />
                                                    </span>
                                                    <ul class="add-to-links">
                                                        <li><a href="#" title="Add to Wishlist" onclick="pladdwish(<?php echo $data["ProductID"];?>)" class="link-wishlist">Add to Wishlist</a></li>
                                                        <!--<li><span class="separator">|</span>
                                                            <a title="Add to Compare" href="#" onclick="ajaxCompare('http://','25');return false;" class="link-compare">Add to Compare</a>
                                                            <div id="results"></div>
                                                        </li>-->
                                                    </ul>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <!-- AJAX AJAX AJAX AJAX AJAX AJAX AJAX -->
                                        
                                        

                                    <?php
                                                if ($count>4 && $count%5==0){
                                                    //echo "</ul>";
                                                    // <ul> CLOSE ========================================================================================================
                                                }
                                            }// while CLOSE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            
                                            //echo (!$count%5==0)?"</ul>":"";
                                            echo "<div class=\"product-page-bar\">";
                                            $linkopt = arr2url($arrGet);
                                            if ($ord) $linkopt.="&or=".$ord;
                                            if (!empty($kw)) $linkopt.="&kw=".$kw;
                                            listPages($pp,PAGEBLOCK,$totalpps,$linkopt);
                                            echo "</div>";
                                        }// if CLOSE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        else{
                                            echo "Products not found.";
                                        }
                                    ?>	
                                </div>
                                <!-- .category-products CLOSE ================================================================================== -->
                            </div>
                            <!-- .main-col-list CLOSE =========================================================================================================================== -->
                             
        </div>
        <!-- .container-fluid END -->
        <!-- Product List page contents END -->
		<!--infinite scroll -->
		
		<script type="text/javascript">
			var ias = $.ias({
			  container: ".incontainer",
			  item: ".initem",
			  pagination: "#inpagination",
			  next: ".innext a"
			});

			ias.extension(new IASSpinnerExtension());
			ias.extension(new IASTriggerExtension({offset: 3}));
			ias.extension(new IASNoneLeftExtension({text: 'There are no more pages left to load.'}));
		  </script><!--infinite scroll-->

	<script type="text/javascript">
        jQuery(function(jQuery) {
            var jqTr_zindex = 11;
            $(".jqTransformSelect").jqTransform();

            $("div.jqTransformSelectWrapper, a.jqTransformSelectOpen").click(function() {
                $(this).css("z-index",jqTr_zindex);
                jqTr_zindex++;
            });

            $("button[title='Add to Cart']").click(function() {
                var flag = false;
                if($('#size').val()=="-- Please Select --") {
                    $('#advice-required-entry-select_1').fadeIn(1000);
                    flag = true;
                }else{
                    $('#advice-required-entry-select_1').css('display','none');
                }
                if($('#color').val()=="-- Please Select --") {
                    $('#advice-required-entry-select_2').fadeIn(1000);
                    flag = true;
                }else{
                    $('#advice-required-entry-select_2').css('display','none');
                }
                if (flag) return false;
                $("#ajax_loader").css("display","block");
                $.ajax({
                    async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
                    data:{
                        "qty":$("input[name='qty']").val(),
                        "id":$("input[name='productid']").val(),
                        "options":{"size":$("select[name='size']").val(),"color":$("select[name='color']").val(),"misc":""},
                        "action":"add"
                    },success:function(d){
                        $("#ajax_loader").css("display","none");
                        $("div.alert").slideDown(1000, function() {
                            $(this).delay(6000).slideUp(1000);
                        });
                        $("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");
                        updateMiniCart();
                    }
                });
            });
            $(".inner_alert > button").click(function() {
                $("div.alert").clearQueue();
                $("div.alert").slideUp(1000);
            });
            $(".grid-inner").mouseover(function() {
                $(this).find(".ajax").show();
            }).mouseout(function() {
                $(this).find(".ajax").hide();
            });
        });
    </script>


    <script type="text/JavaScript" src="/js/cloud-zoom.1.0.3.min.js"></script>
    <script type="text/javascript" src="/js/jquery.jqtransform.js"></script>
    
    <script type="text/javascript">
        function pladdwish(id){
            var reurl = document.getElementById('returnurl').value;
            window.location = "/lib/wish_action.php?position=list&action=add&id="+id+"&reurl="+reurl;
        }
    </script>
    
    
    <!--<script>
        
        $(function(){
            $('.quick-view-button').click(function(){
                
                event.preventDefault();
                var quickviewURL = $(this).attr('href');
                
                $.ajax({
                    url:        quickviewURL,
                    type:       'GET',
                    success:    function(result){
                                
                                    $.colorbox({html: result});
                                },
                    async: true,
                    datatype: 'html'
                });
            });
        });
     
   
        
    </script>
    
    <script>
        developer_message_file_imported( "<?php echo basename(__FILE__); ?>" );
    </script>-->