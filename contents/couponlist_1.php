<?php

//print_r($_SESSION['show']);

	$DB             = new myDB;
	$DB1             = new myDB;
	$DB2             = new myDB;
	$DBc             = new myDB;
	$id_vendor			= empty($_REQUEST["c1"])		? null : $_REQUEST["c1"];
	$coupon_chk			= empty($_REQUEST["coupon_chk"])		? null : $_REQUEST["coupon_chk"];
	$category			= empty($_REQUEST["category"])		? null : $_REQUEST["category"];
	$pagetitle      = "Items";
	$pagepath="market";
	if(isset($_GET["q"]))
	$q              = $_GET["q"];
	$q1             =explode(" ", $q);
	

	$strSQL1 = "select a.*,b.* FROM contacts a,contact_master b WHERE a.mcontact_id=b.contact_id" ;
	
	if($id_vendor>1)
	$strSQL1 .=" and b.id_vendor=".$id_vendor;
	

	if($coupon_chk>0)
	$strSQL1 .=" and a.coupon=".$coupon_chk;
	

	else if($category!="")
	$strSQL1 .=" and a.category='".$category."'";

	if (!empty($q))
	{
		//print($q);
		//exit;
		//$strSQL1 = "select a.*,b.* FROM contacts a,contact_master b WHERE a.mcontact_id=b.contact_id and b.id_vendor=".$id_vendor;
		
		if (count($q1)>1)
			for ($i=0; $i<count($q1); $i++)
			{
				$strSQL1 .= " and (name  LIKE '%".$q1[$i]."%')";
			}
		else
			$strSQL1 .= " and (name  LIKE '%".$q."%' )";
		$strSQL1 .= " or (description  LIKE '%".$q."%')";
		$strSQL1 .= " ORDER BY category";
		
	}

//echo  $strSQL1 ;
	$DB1->query($strSQL1);
    $numrows = $DB1->rows;

	$data1 = $DB1->fetch_array($DB1->res);

	$fr_date=date('m/d/Y',strtotime($data1['from_date']));
	$to_date=date('m/d/Y',strtotime($data1['to_date']));

	
?>

                  

					<!-- //***************************** MAIN *******************************// -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-557a011e582e9a90" async="async"></script>
				
					

							<!-- .main-col-list OPEN =========================================================================================================================== -->
                            <div class="main-col-list col-md-7">
                                <div class="page-path">
                                    <ul>
                                        <li class="home"><a href="/" title="Go to Home Page">Home</a><span>/ </span></li>
                                        <li class="home"><strong><?php echo (empty($q) ? $pagepath : $q);?></strong></li>
                                    </ul>
                                </div>

								<div class="page-path" >
								    
									<ul>                                        
										<li class="home"><a href="/">Logo</a></li>	
										<li class="home" style="float:left;margin-left:10px;"><a href="index.php?c1=<?php echo $id_vendor?>">Sale</a></li>										
                                        <li class="home" style="float:left;margin-left:10px;">Search</li>
										<li class="home" style="float:left;margin-left:10px;"><a href="?info=location&id_vendor=<?php echo $id_vendor?>">Market info</a></li>
                                    </ul>
									
                                </div> 

                                <div class="page-title">
                                    <h1><span><?php echo $pagetitle."&nbsp;(".$numrows.")  ".$fr_date."~".$to_date;?></span></h1>
                                    <input type="hidden" id="returnurl" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									
                                </div>
            
                            
                                
                                <!-- .category-products OPEN =========================================================================================================================== -->
                                <div class="category-products incontainer"><!--incontainer  infinite scroll-->

                                    <?php
                                       
										if($q=="")
										{
											$caSQL = "select DISTINCT a.category FROM contacts a,contact_master b WHERE a.mcontact_id=b.contact_id and b.id_vendor=".$id_vendor;
											
											if($category!="")
											$caSQL .=" and a.category='".$category."'";

											$DBc->query($caSQL);

											while($datac = $DBc->fetch_array($DBc->res)){
												
												echo '<div class="page-title">
													<h1><span>'.$datac['category'].'</span></h1>													
												</div>';

														$strSQL = "select a.* FROM contacts a,contact_master b WHERE a.mcontact_id=b.contact_id and b.id_vendor=".$id_vendor." and a.category='".$datac['category']."'";
														
														if($coupon_chk>0)
														$strSQL .=" and a.coupon=".$coupon_chk;

														

														/****** PAGING ******/
														if(isset($_COOKIE["itemspp"])){
														//if ($_COOKIE["itemspp"]){
															$LIMIT = $_COOKIE["itemspp"];
														}

														$totalpps = ($LIMIT < 0) ? 1 : ceil($numrows/$LIMIT);
														if ($pp < 1 || $pp > $totalpps){
															$pp = 1;
														}

														$list_num = $LIMIT * ($pp - 1);
														if ($LIMIT > 0) {
															$strSQL .=  " LIMIT {$list_num}, {$LIMIT}";
														}

											//echo $strSQL;
														$DB->query($strSQL);

														// if OPEN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
														if ($numrows){
													?>
														<!-- //*****************************  PRODUCT LIST *******************************// -->
														<?php
															// while OPEN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
															while($data = $DB->fetch_array($DB->res)){															   
														?>														
														<div class="initem item  col-lg-2 col-md-4 col-sm-6  col-xs-12" style="border: 1px solid #E3E3E3;"><!--initem  infinite scroll-->
															<!--<input type="hidden" name="contact_id" value="<?php echo $data["contact_id"];?>">-->
															<div class=" product-list-item-large ">	
															<?php 
															$strSQL2 = "select id_cart,contact_id FROM cart_items WHERE contact_id=".$data['contact_id'];
															$DB2->query($strSQL2);
															if ($DB2->rows>0)														
																echo "<div id='cartchk_".$data['contact_id']."' style='display:block;top: 5px;left: 12px;position: absolute;z-index:9999;'><i class='fa fa-shopping-cart fa-2x' style='color:orange;'></i></div>";
															else
																echo "<div id='cartchk_".$data['contact_id']."' style='display:none;top: 5px;left: 12px;position: absolute;z-index:9999;'><i class='fa fa-shopping-cart fa-2x' style='color:orange;'></i></div>";
															 
															 if($data['coupon']>0)
															 echo "<div ><i class='fa fa-barcode fa-2x' style='color:#60ab59;  margin-left: 35px; margin-top: 5px;  position: absolute;z-index: 99'></i></div>";

															?>					

															<div class="grid-inner">
																
																<a href="#" title="" class="product-image">
																<img  src="<?php echo 'data:image;base64,' . $data["rimg"];?>"/>
																</a>
																<!--<a class="ajax" href="#">Quick View</a>-->
																<!--<button type="button" title="Add to List" style="display:none" id="addcart" onclick="btnaddcart(<?php echo $data["contact_id"];?>)" class="button btn-cart addcart"><span>Add to List</span></button>-->

																<!--<input type="button" title="Add to List" style="display:none" id="addcart" onclick="btnaddcart(<?php echo $data["contact_id"];?>)" class="button btn-cart addcart" value="Add to List" >-->

																<!--<a href="javascript:void(0)"  style="display:none" id="addcart" onclick="btnaddcart(<?php echo $data["contact_id"];?>)" class="button btn-cart addcart">Add to List</a>-->
																
															</div>
															<div class="actions">																	
																	<span id="ajax_loader" style="display: none;">
																		<img src="/img/ajax_loader.gif" />
																	</span>
																	<ul class="add-to-links">																		
																	</ul>
																</div>

															<div class="addthis_sharing_toolbox"></div>
															<div class="product-box">															   
																<h2 class="product-name">
																	<?php echo $data["name"];?><a href="javascript:void(0)" style="margin-left:20px;"  id="addcart" onclick="btnaddcart(<?php echo $data["contact_id"];?>)" class="button btn-cart addcart">Add to List</a>
																</h2>
																
															</div>
															<div class="price-wrapper">
																<div class="price-box">
																	<span class="regular-price" id="product-price-25">
																		<span class="price"><?php echo "\$".formatMoney($data["price"])?></span>&nbsp;																	   
																	</span>
																</div>															  
																
															</div>
															</div>
														</div>
														
													<?php																
															}// while CLOSE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
														
														echo "<div class=\"product-page-bar\">";
														/*if(isset($arrGet))
														$linkopt = arr2url($arrGet);
														if(isset($ord))
														$linkopt.="&or=".$ord;
														if (!empty($kw)) $linkopt.="&kw=".$kw;
														listPages($pp,PAGEBLOCK,$totalpps,$linkopt);*/
														echo "</div>";

													}// if CLOSE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
													else{
														echo "Products not found.";
													}

											}//category while close
                                    
									
									
										}	
									else 														
										 {
											//print($q);
											//exit;
											$strSQL = "select a.*,b.* FROM contacts a,contact_master b WHERE a.mcontact_id=b.contact_id ";
											
											if (count($q1)>1)
												for ($i=0; $i<count($q1); $i++)
												{
													$strSQL .= " and (name  LIKE '%".$q1[$i]."%')";
												}
											else
												$strSQL .= " and (name  LIKE '%".$q."%' )";
											$strSQL .= " or (description  LIKE '%".$q."%')";
											$strSQL .= " ORDER BY category";
											
										 

														/****** PAGING ******/
														if(isset($_COOKIE["itemspp"])){
														//if ($_COOKIE["itemspp"]){
															$LIMIT = $_COOKIE["itemspp"];
														}

														$totalpps = ($LIMIT < 0) ? 1 : ceil($numrows/$LIMIT);
														if ($pp < 1 || $pp > $totalpps){
															$pp = 1;
														}

														$list_num = $LIMIT * ($pp - 1);
														if ($LIMIT > 0) {
															$strSQL .=  " LIMIT {$list_num}, {$LIMIT}";
														}

											//echo $strSQL;
														$DB->query($strSQL);

														// if OPEN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
														if ($numrows){
													?>
														<!-- //*****************************  PRODUCT LIST *******************************// -->
														<?php
															// while OPEN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
															while($data = $DB->fetch_array($DB->res)){															   
														?>														
														<div class="initem item  col-lg-2 col-md-4 col-sm-6  col-xs-12" style="border: 1px solid #E3E3E3;"><!--initem  infinite scroll-->
															<div class=" product-list-item-large ">														  
																<div class="grid-inner">
																	<a href="#" title="" class="product-image">
																	<img  src="<?php echo 'data:image;base64,' . $data["rimg"];?>"/>
																	</a>
																	<!--<a class="ajax" href="#">Quick View</a>-->
																	<button type="button" title="Add to List" style="display:none" id="addcart" onclick="btnaddcart(<?php echo $data["contact_id"];?>)" class="button btn-cart"><span>Add to List</span></button>
																	
																</div>
																<div class="actions">																	
																	<span id="ajax_loader" style="display: none;">
																		<img src="/img/ajax_loader.gif" />
																	</span>
																	<ul class="add-to-links">																		
																	</ul>
																</div>
															
																<div class="addthis_sharing_toolbox"></div>
															
																<div class="product-box">															   
																	<h2 class="product-name">
																		<?php echo $data["name"];?>
																	</h2>
																</div>


																<div class="price-wrapper">
																	<div class="price-box">
																		<span class="regular-price" id="product-price-25">
																			<span class="price"><?php echo "\$".formatMoney($data["price"])?></span>&nbsp;																	   
																		</span>
																	</div>															  
																	
																</div>
																</div>
														</div>
														
													<?php																
															}// while CLOSE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
														
														echo "<div class=\"product-page-bar\">";
														/*if(isset($arrGet))
														$linkopt = arr2url($arrGet);
														if(isset($ord))
														$linkopt.="&or=".$ord;
														if (!empty($kw)) $linkopt.="&kw=".$kw;
														listPages($pp,PAGEBLOCK,$totalpps,$linkopt);*/
														echo "</div>";

													}// if CLOSE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
													else{
														echo "Products not found.";
													}

																				 
										  }//else close
                                    ?>
									
									
									
									
									
									









                                <!--</div>-->
                                <!-- .category-products CLOSE ================================================================================== -->
                            </div>
						</div>
                            <!-- .main-col-list CLOSE =========================================================================================================================== -->
                    </div>         
        <!--</div>-->
        <!-- .container-fluid END -->
        <!-- Product List page contents END -->
		<!--infinite scroll -->
		<script type="text/javascript" src="/js/jquery-ias.min.js"></script>
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

	
	<!-- Go to www.addthis.com/dashboard to customize your tools -->


	
	<script type="text/javascript">
        
		function btnaddcart(id){
		
		/*
		var userID=getCookie("userID");
		if(userID=="")
			{
			location='?page=customer&account=login';
			return false;
			}*/
                
				var flag = false;
               
                if (flag) return false;
                $("#ajax_loader").css("display","block");
                $.ajax({
                    async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
                    data:{                      
                        "id":id,
                        "action":"add"
                    },success:function(d){
                        $("#ajax_loader").css("display","none");
                        /*$("div.alert").slideDown(1000, function() {
                            $(this).delay(6000).slideUp(1000);
                        });
                        $("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");*/
						$('#cartchk_'+id).css('display','block');
                        updateMiniCart();
                    }
                });
           




		}
		
		
		jQuery(function(jQuery) {
            

           
            $(".inner_alert > button").click(function() {
                $("div.alert").clearQueue();
                $("div.alert").slideUp(1000);
            });
            $(".grid-inner").mouseover(function() {
                $(this).find(".ajax").show();
				$(this).find("#addcart").show();
            }).mouseout(function() {
                $(this).find(".ajax").hide();
				$(this).find("#addcart").hide();
            });
        });
    </script>


    
    
    
   