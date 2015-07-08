
   
                <!-- //***************************** MAIN START *******************************// -->
                <div class="container-fluid <?php echo !empty($main_css)?>" style="padding-bottom: 0;">
                    
                            <!-- Right side menu START -->
                            <div class="container top-banner-image-container">
                                <div class="page-title" style="margin-left:00px;">
                                    <!--<h1><span>Market List</span> </h1>-->
                                </div>                                
                                <!-- .category-products START -->
                                <div class="category-products">                                   

                                    <li style="list-style: none;">
                                        <?php

										$user_ip ='107.194.68.188';//$_SERVER['REMOTE_ADDR'];//'107.194.68.188'; //$_SERVER['REMOTE_ADDR']
										
										//echo $user_ip;	

										$geo=unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

										//echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER)));

										//$city=$geo["geoplugin_city"];
										//$area=$geo["geoplugin_areaCode"];
										$latitude=$geo["geoplugin_latitude"];
										$longitude=$geo["geoplugin_longitude"];				

										$DB1 = new myDb; 

											$distance=100;
											$multiplicator=3959;//mile
											//$latitude=33.8312;
											//$longitude=-117.867302;

											 $strSQL1 ='SELECT s.*,
											('.$multiplicator.' * acos(cos(radians('.(float)$latitude.')) * cos(radians(latitude)) * cos(radians(longitude) - radians('.(float)$longitude.')) + sin(radians('.(float)$latitude.')) * sin(radians(latitude)))) distance
											FROM vendor_master s
											WHERE s.active = 1 
											HAVING distance < '.$distance.'
											ORDER BY distance ASC';


                                                //$strSQL1 = "SELECT * FROM vendor_master ";
                                                $DB1->query($strSQL1);
                                                
                                                if ($DB1->rows > 0) {
                                                    while($rs1 = $DB1->fetch_array($DB1->res)){
										
												echo '<div class="grid-inner">
													<a href="?c1='.$rs1['id_vendor_master'].'" title="" class="product-image"><img src="'.PRODUCT_IMAGE_PATH . '2015-03/'.$rs1['vendor_image']. '" style="width:200px;height:100px; float: left;   margin-right: 25px;" /></a>
													</div>';
										 
													}
												}	
													?>	
                                    </li>
                                </div>
                                <!-- .category-products END -->
                            </div>
                            <!-- Right side menu END -->                            
                        </div>
                        <!-- .row CLOSE -->
                    </div>
                    <!-- .container CLOSE -->
                </div>
                <!-- .container-fluid CLOSE -->
                <!-- //***************************** MAIN END *******************************// -->
    <script type="text/javascript">
	jQuery(function(jQuery) {
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
				}
			});
		});
		$(".inner_alert > button").click(function() {
			$("div.alert").clearQueue();
			$("div.alert").slideUp(1000);
		});
		
	});
</script>	