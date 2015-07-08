function UpdateConfirm(frm) {
    if(confirm("Do you want to update?")){
		return RegConfirm(frm);
     }
	 return false;
    }

function UpdateConfirm2(frm){
    //if(confirm("Do you want to update the tblWholeRetailSaler?")){
     return RegConfirm2(frm);

    //}
    //return false;
}

function UpdateConfirm3(frm) {
	if (confirm("Do you want to update?")) {
		return RegConfirm14(frm);
	}
	return false;
}

function UpdateConfirm4(frm) {
	if (frm.IsThisResponded.value=='') {
		alert("Have you responded to this message?");
		frm.IsThisResponded.focus();
		return false;
	}
	if (frm.IsThisResponded.value=='Y') {
		frm.Action.value = "UpdateResponseStatus";
		frm.submit();
	}
	return false;
}

function UpdateConfirm5(frm) {
	if (confirm("Do you want to update?")) {
		return RegConfirm15(frm);
	}
	return false;
}
	
function AddConfirm(frm) {
    if(confirm("Do you want to add?")){
		return RegConfirm(frm);
     }
	 return false;
    }
	
function AddConfirm2(frm) {
		if (confirm("Do you want to add this About Us?")) {
//			frm.Action.value = "Manage_AboutUs_action.php";
			return RegConfirm3(frm);
        }
        return false;
}	

function AddConfirm3(frm) {
	if (confirm("Do you want to add this privacy policy?")) {
		//frm.action.value = "Manage_PravacyPolicy_action.php";
		return RegConfirm4(frm);
	}
	return false;
}

function AddConfirm4(frm) {
	if (confirm("Do you want to add a new return policy?")) {
		return RegConfirm5(frm);
	}
	return false;
}

function AddConfirm5(frm) {
	if (confirm("Do you want to add this help statement?")) {
		frm.Action.value = "AddHelpAndFAQs";
		return RegConfirm6(frm);
	}
	return false;
}

function AddConfirm6(frm) {
	if (confirm("Do you want to add this quantity discount?")) {
		return RegConfirm7(frm);
	}
	return false;
}

function AddConfirm7(frm) {
	if (confirm("Do you want to add this payment method?")) {
		return RegConfirm10(frm);
	}
	return false;
}

function AddConfirm8(frm) {
	if (confirm("Do you want to add this business hours?")) {
		return RegConfirm11(frm);
	}
	return false;
}
	
function AddConfirm9(frm) {
	if (confirm("Do you want to add this color?")) {
		return RegConfirm13(frm);
	}
	return false;
}

function AddConfirm10(frm) {
	if (confirm("Do you want to add?")) {
		return RegConfirm14(frm);
	}
	return false;
}

		
function AddConfirm11(frm) {
    if (confirm("Do you want to add this size chart?")) {
    	return RegConfirm13_2(frm);
    }
    return false;
}

function AddConfirm14(frm) {
    if (confirm("Do you want to add this pack chart?")) {
    	return RegConfirm13_3(frm);
    }
    return false;
}
function AddConfirm12(frm) {
    if (confirm("Do you want to add?")) {
    	return RegConfirm15(frm);
    }
    return false;
}
	
function AddPromoCode(frm) {
	if (confirm("Do you want to add this Promo Code?")) {
        return RegConfirm12(frm);
     }
     return false;
    }

function DeleteCheckedConfirm(frm) {
	if (confirm("Do you want to delete the checked customers?")) {
		frm.submit();
	}
	return false;
}

    function DeleteCheckedConfirm2(frm) {
        if (confirm("Do you want to delete the checked lists?")) {
           frm.submit();
        }
        return false;
    }
	
	

function DeleteConfirm(frm) {
	if (confirm("Do you want to delete this return policy?")) {
		frm.submit();
	}
	return false;
}

function DeleteConfirm2(frm) {
	if (confirm("Do you want to delete it?")) {
		frm.submit();
	}
	return false;
}
function ModifyConfirm(frm) {
	if (confirm("Do you want to modify this About Us?")) {
//		frm.Action.value = "ModifyAboutUs";
		return RegConfirm3(frm);
	}
	return false;
}

function ModifyConfirm2(frm) {
	if (confirm("Do you want to modify this privacy policy?")) {
		//frm.Action.value = "ModifyPrivacyPolicy";
		return RegConfirm4(frm);
	}
	return false;
}

function ModifyConfirm3(frm) {
	if (confirm("Do you want to modify this return policy?")) {
		//return RegConfirm5(frm);
		frm.submit();
	}
	return false;
}

function ModifyConfirm4(frm) {
	if (confirm("Do you want to modify this help statement?")) {
		frm.Action.value = "ModifyHelpAndFAQs";
		return RegConfirm6(frm);
	}
	return false;
}

function ModifyConfirm5(frm) {
	if (confirm("Do you want to modify this quantity discount?")) {
		return RegConfirm7(frm);
	}
	return false;
}

function ModifyConfirm6(frm) {
	if (confirm("Do you want to modify this payment method?")) {
		return RegConfirm10(frm);
	}
	return false;
}

function ModifyConfirm7(frm) {
	if (confirm("Do you want to modify this Promo Code?")) {
		return RegConfirm12(frm);
	}
	return false;
}

function ModifyConfirm8(frm) {
	if (confirm("Do you want to modify this color?")) {
		return RegConfirm13(frm);
	}
	return false;
}

function ModifyConfirm9(frm) {
    if (confirm("Do you want to modify this size chart?")) {
       return RegConfirm13_2(frm);
    }
    return false;
}

function ModifyConfirm10(frm) {
    if (confirm("Do you want to modify this pack chart?")) {
       return RegConfirm13_3(frm);
    }
    return false;
}

function Confirm_Update(frm) {
	if (confirm("Do you want to update the figures applied to VIP members?")) {
		return RegConfirm8(frm);
	}
	return false;
}
	
function Confirm_Update2(frm) {
	if (confirm("Do you want to update the Local Sales Tax Rate?")) {
		return RegConfirm9(frm);
	}
	return false;
}

function AddOrUpdateConfirm(frm) {
	if (frm.Edit_IsActive.value == '') {
		alert("Is this an active or inactive item?");
		frm.Edit_IsActive.focus();
		return false;
	}
	if (frm.Edit_Cat1ID.value == '') {
		alert("Select one of the product categories!");
		frm.Edit_Cat1ID.focus();
		return false;
	}
	if (frm.Edit_ProductName.value == '') {
		alert("Product name cannot be empty!");
		frm.Edit_ProductName.focus();
		return false;
	}
	/*if (frm.Edit_ProductDescription.value == '') {
		alert("Product description cannot be empty!");
		frm.Edit_ProductDescription.focus();
		return false;
	}*/
	if (frm.Edit_UnitPrice.value=='') {
		alert("Enter a Regular Unit Price.");
		frm.Edit_UnitPrice.focus();
		return false;
	}
	if(isNaN(frm.Edit_UnitPrice.value)){
		alert("Please enter numbers!");
		frm.Edit_UnitPrice.focus();
		return false;
	}
	if(isNaN(frm.Edit_UnitPriceOnSale.value)){
		alert("Please enter numbers!");
		frm.Edit_UnitPriceOnSale.focus();
		return false;
	}
	/*if(isNaN(frm.Edit_FeeForPersonalization.value)){
		alert("Please enter numbers!");
		frm.Edit_FeeForPersonalization.focus();
		return false;
	}
	if(isNaN(frm.Edit_FeeForAttachingEmblems.value)){
		alert("Please enter numbers!");
		frm.Edit_FeeForAttachingEmblems.focus();
		return false;
	}*/
	if (frm.Edit_Weight_Pounds.value == '') {
		alert("Enter a unit weight in pounds.");
		frm.Edit_Weight_Pounds.focus();
		return false;
	}
	if(isNaN(frm.Edit_Weight_Pounds.value)){
		alert("Please enter numbers!");
		frm.Edit_Weight_Pounds.focus();
		return false;
	}
	/*if (frm.Edit_ForMenOrWomen.value == '') {
		alert("Is this product for men (boys), women (girls) or both?");
		frm.Edit_ForMenOrWomen.focus();
		return false;
	}*/
	var field = frm.CheckedColorID;
	if (field == '') {
		alert("Select colors out of the available colors!");
		return false;
	}
/*	var ColorIDList = '';
	cnt = 0;
	for (i = 0; i < field.length; i++) {
		if (field[i].checked == true) {
			if (cnt > 0) {
				ColorIDList = ColorIDList + ',';
			}
			ColorIDList = ColorIDList + field[i].value;
			cnt = cnt + 1;
		}
	}
	//frm.ColorIDs.value = ColorIDList;
	if (cnt == 0) {
		alert("Select colors out of the available colors!");
		return false;
	}*/
	frm.submit();
}

function ActivateCheckedConfirm(frm) {
	if (confirm("Do you want to activate all the checked items?")) {
		frm.act.value = "ActivateCheckedProducts";
		frm.submit();
	}
	return false;
}

function ActivateCheckedConfirm2(frm) {
	if (confirm("Do you want to activate the checked customers?")) {
		frm.submit();
	}
	return false;
}

function DeactivateCheckedConfirm(frm) {
	if (confirm("Do you want to deactivate all the checked items?")) {
		frm.act.value = "DeactivateCheckedProducts";
		frm.submit();
	}
	return false;
}

function DeleteCheckedConfirm(frm) {
    if (confirm("Do you want to delete the checked lists?")) {
       frm.submit();
    }
    return false;
}

function DeleteCheckedConfirm2(frm) {
	if (confirm("Do you want to delete all the checked items?")) {
		frm.act.value = "DeleteCheckedProducts";
		frm.submit();
	}
	return false;
}

var CheckAllFlag = 0;
function CheckAllItems(frm) {
	for (var i=0; i<frm.elements.length; i++) {
		if (frm.elements[i].name.indexOf('CheckedProductID') == false ) {
			if (CheckAllFlag == 1 ) {
				frm.all.checked = false;
				frm.elements[i].checked = false;
			}
			else {
				frm.all.checked = true;
				frm.elements[i].checked = true;
			}
		}
	}
	if (CheckAllFlag == 1) {
		frm.btnCheckAllItems.value = "Check All Items";
		CheckAllFlag = 0;
	}
	else {
		frm.btnCheckAllItems.value = "Cancel";
		CheckAllFlag = 1;
	}
}

function showStuff(id) {
	document.getElementById(id).style.display = 'block';
}

function delimgx() {
    alert('x');
}

function hideStuff(id) {
	document.getElementById(id).style.display = 'none';
}
	/*
	$(function(){
		$("#btn_copy").click(function(){
			$.ajax({
				url:"/ShopAdmin/ajax.asp",
				data:"mode=copyproduct&idx="+$("#productid_copy").val(),
				type:"POST",
				dataType:"json",
				success:function(d){
					/*
						Active
						Category1"":"""&rs("Cat1ID")&""""
						Category2"":"""&rs("Cat2ID")&""""
						Category3"":"""&rs("Cat3ID")&""""
						Brand"":"""&rs("BrandName")&""""
						ProductName"":"""&rs("ProductName")&""""
						Description"":"""&rs("ProductDescription")&""""
						NoticeToBuyers"":"""&rs("NoticeToPurchasers")&""""
						SearchEngineTags"":"""&rs("SEarchEngineTags")&""""
						Player"":"""&rs("Player")&""""
						Club"":"""&rs("Club")&""""
						League"":"""&rs("League")&""""
						Country"":"""&rs("Country")&""""
						Material"":"""&rs("MadeofMaterial")&""""
						UnitPrice"":"""&rs("UnitPrice")&""""
						UnitpriceOnSale"":"""&rs("UnipriceOnSale")&""""
						PrepackQuantity"":"""&rs("PrepackQuantity")&""""
						Weight_Pounds"":"""&rs("Weight_Pounds")&""""
						BackOrdered"":"""&rs("IsThisBackOrderItem")&""""
						ForMenOrWomen"":"""&rs("ForMenOrWomen")&""""
						Colors"":"""&rs("ColorIds")&""""
						SizeChart"":"""&rs("SizeChartID")&""""
						Personalize"":"""&rs("Personalize")&""""
						QtyDiscountID"":"""&rs("QuantityDiscountID")&""""
						MatchesWithProduct1"":"""&rs("MatchesWithProduct1")&""""
						MatchesWithProduct2"":"""&rs("MatchesWithProduct2")&""""
						MatchesWithProduct3"":"""&rs("MatchesWithProduct3")&""""
						MatchesWithProduct4"":"""&rs("MatchesWithProduct4")&""""
						MatchesWithProduct5"":"""&rs("MatchesWithProduct5")&""""
						MatchesWithProduct6"":"""&rs("MatchesWithProduct6")&""""
						FeeForPersonalization"":"""&rs("FeeForPersonalization")&""""
						FeeForAttachingEmblems"":"""&rs("FeeForAttachingEmblems")&""""
					*/
					/*
					$("select[name=Edit_IsActive]").val(d.Active);
					$("select[name=Edit_BrandName1]").val(d.Brand);
					$("input[name=Edit_ProductName]").val(d.ProductName);
					$("textarea[name=Edit_ProductDescription]").val(d.Description.replace(/\|br\|/g,"\n").replace(/\|q\|/g,"&quot;"));
					$("textarea[name=Edit_NoticeToPurchasers]").val(d.NoticeToBuyers.replace(/\|br\|/g,"\n").replace(/\|q\|/g,"&quot;"));
					$("textarea[name=Edit_SearchEngineTags]").val(d.SearchEngineTags.replace(/\|br\|/g,"\n").replace(/\|q\|/g,"&quot;"));
					$("select[name=Edit_Player1]").val(d.Player);
					$("select[name=Edit_League1]").val(d.League);
					$("select[name=Edit_Club1]").val(d.Club);
					$("select[name=Edit_Country1]").val(d.Country);
					$("input[name=Edit_MadeOfMaterial]").val(d.Material);
					$("input[name=Edit_UnitPrice]").val(d.UnitPrice);
					$("input[name=Edit_UnitPriceOnSale]").val(d.UnitpriceOnSale);
					$("input[name=Edit_PrepackQuantity]").val(d.PrepackQuantity);
					$("input[name=Edit_Weight_Pounds]").val(d.Weight_Pounds);
					$("select[name=Edit_IsThisBackOrderItem]").val(d.BackOrdered);
					$("select[name=Edit_ForMenOrWomen]").val(d.ForMenOrWomen);
					$("select[name=Edit_SizeChartID]").val(d.SizeChart);
					$("select[name=personalize]").val(d.Personalize);
					if(d.FreeShipping == "True"){
						$("select[name=Free_Shipping]").val(1);
					}else{
						$("select[name=Free_Shipping]").val(0);
					}
					$("select[name=Edit_QuantityDiscountID]").val(d.QtyDiscountID);
					$("select[name=Edit_MatchesWithProduct1]").val(d.MatchesWithProduct1);
					$("select[name=Edit_MatchesWithProduct2]").val(d.MatchesWithProduct2);
					$("select[name=Edit_MatchesWithProduct3]").val(d.MatchesWithProduct3);
					$("select[name=Edit_MatchesWithProduct4]").val(d.MatchesWithProduct4);
					$("select[name=Edit_MatchesWithProduct5]").val(d.MatchesWithProduct5);
					$("select[name=Edit_MatchesWithProduct6]").val(d.MatchesWithProduct6);
					
					// Category 1 ~ 3
					$("select[name=Edit_Cat1ID]").val(d.Category1);
					if(!$("select[name=Edit_Cat2ID]")){
						$("<span>",{
							html:"&nbsp;>&nbsp;"
						}).appendTo($("#category_td"));
						$("<select>",{
							name:"Edit_Cat2ID",
							"class":"arial12"
						}).appendTo($("#category_td"));
					}
					$("select[name=Edit_Cat2ID]").removeOption(/./);
					$("select[name=Edit_Cat2ID]").addOption("","Select :",false);
					$.ajax({
						url:"/ShopAdmin/ajax.asp",
						data:"mode=get_category2&idx="+d.Category1,
						type:"POST",
						dataType:"json",
						async:false,
						success:function(dat){
							if(dat){
								for(var i = 0; i < dat.data.length; i++ ){
									if(String(d.Category2) == String(dat.data[i][0])){
										$("select[name=Edit_Cat2ID]").addOption(dat.data[i][0],dat.data[i][1],true);
									}
									else{
										$("select[name=Edit_Cat2ID]").addOption(dat.data[i][0],dat.data[i][1],false);
									}
								}
							}
						}
					});
					$.ajax({
						url:"/ShopAdmin/ajax.asp",
						data:"mode=get_category3&idx="+d.Category2,
						type:"POST",
						dataType:"json",
						async:false,
						success:function(dat){
							if(dat){
								if(!$("select[name=Edit_Cat3ID]")){
									$("<span>",{
										html:"&nbsp;>&nbsp;"
									}).appendTo($("#category_td"));
									$("<select>",{
										name:"Edit_Cat3ID",
										"class":"arial12"
									}).appendTo($("#category_td"));
								}
								$("select[name=Edit_Cat3ID]").removeOption(/./);
								$("select[name=Edit_Cat3ID]").addOption("","Select :",false);
								for(var i = 0; i < dat.data.length; i++ ){
									if(String(d.Category3) == String(dat.data[i][0])){
										$("select[name=Edit_Cat3ID]").addOption(dat.data[i][0],dat.data[i][1],true);
									}
									else{
										$("select[name=Edit_Cat3ID]").addOption(dat.data[i][0],dat.data[i][1],false);
									}
								}
							}
						}
					});
					// Color
					var colors = d.Colors.split(",");
					$("input[type=checkbox][name=CheckedColorId]").attr("checked",false);
					for(var i=0;i<colors.length;i++){
						$(":input[type=checkbox][name=CheckedColorID][value="+String(colors[i])+"]").attr("checked",true);
					}
					// Personalized Option
					$("input[name=Edit_FeeForPersonalization]").val(d.FeeForPersonalization);
					$("input[name=Edit_FeeForAttachingEmblems]").val(d.FeeForAttachingEmblems);
				}
			});
		});
});
*/
function ModifyCat1Confirm(frm) {
	if (confirm("Do you want to modify this category 1?")) {
		frm.action.value="update1"
		frm.submit();
	}
	return false;
}
function ModifyCat2Confirm(frm) {
	if (confirm("Do you want to modify this category 2?")) {
		frm.action.value="update2"
		frm.submit();
	}
	return false;
}
function ModifyCat3Confirm(frm) {
	if (confirm("Do you want to modify this category 3?")) {
		frm.action.value="update3"
		frm.submit();
	}
	return false;
}
function AddCat1Confirm(frm) {
	if (confirm("Do you want to add a new category 1?")) {
		return RegCat1Confirm(frm);
	}
	return false;
}
function AddCat2Confirm(frm) {
	if (confirm("Do you want to add a new category 2?")) {
		return RegCat2Confirm(frm);
	}
	return false;
}
function AddCat3Confirm(frm) {
	if (confirm("Do you want to add a new category 3?")) {
		return RegCat3Confirm(frm);
	}
	return false;
}
function DeleteCat1Confirm(frm) {
	if (confirm("Do you want to delete this category 1?")) {
		frm.action.value="del1"
		frm.submit();
	}
	return false;
}
function DeleteCat2Confirm(frm) {
	if (confirm("Do you want to delete this category 2?")) {
		frm.action.value="del2"
		frm.submit();
	}
	return false;
}
function DeleteCat3Confirm(frm) {
	if (confirm("Do you want to delete this category 3?")) {
		frm.action.value="del3"
		frm.submit();
	}
	return false;
}

function RegCat1Confirm(frm) {
	if (!frm.Cat1Name.value) {
		alert("Name of category 1 cannot be empty!");
		frm.Cat1Name.focus();
		return false;
	}
	/*if (!frm.Cat1SortNo.value) {
		alert("Sort number cannot be empty!");
		frm.Cat1SortNo.focus();
		return false;
	}
	if (isNaN(frm.Cat1SortNo.value)) {
		alert("Please enter numbers!");
		frm.Cat1SortNo.focus();
		return false;
	}*/
	frm.submit();
}
function RegCat2Confirm(frm) {
	if (!frm.Cat1ID.value) {
		alert("Category 1 ID cannot be empty!");
		frm.Cat1ID.focus();
		return false;
	}
	if (!frm.Cat2Name.value) {
		alert("Name of category 2 cannot be empty!");
		frm.Cat2Name.focus();
		return false;
	}
	/*if (!frm.Cat2SortNo.value) {
		alert("Sort number cannot be empty!");
		frm.Cat2SortNo.focus();
		return false;
	}
	if (isNaN(frm.Cat2SortNo.value)) {
		alert("Please enter numbers!");
		frm.Cat2SortNo.focus();
		return false;
	}*/
	frm.submit();
}
function RegCat3Confirm(frm) {
	if (!frm.Cat2ID.value) {
		alert("Category 2 ID cannot be empty!");
		frm.Cat2ID.focus();
		return false;
	}
	if (!frm.Cat3Name.value) {
		alert("Name of category 3 cannot be empty!");
		frm.Cat3Name.focus();
		return false;
	}
	if (!frm.Cat3SortNo.value) {
		alert("Sort number cannot be empty!");
		frm.Cat3SortNo.focus();
		return false;
	}
	if (isNaN(frm.Cat3SortNo.value)) {
		alert("Please enter numbers!");
		frm.Cat3SortNo.focus();
		return false;
	}
	frm.submit();
}

function CheckLoginValues(frm){
    if (!frm.LoginID.value) {
        alert("Enter an administrator's login ID.");
        frm.LoginID.focus();
        return false;
    }
    if (!frm.LoginPassword.value) {
        alert("Enter an administrator's login password.");
        frm.LoginPassword.focus();
        return false;
    }
    return true;
}

/*
$(function(){
	$("#btn_search").click(function(){
		var where = "";
		if($("#s_category").val()){
			where += "&s_category="+$("#s_category").val();
		}
		if($("#s_brand").val()){
			where += "&s_brand="+$("#s_brand").val();
		}
		if($("#s_name").val()){
			where += "&s_name="+$("#s_name").val();
		}
		if($("#s_code").val()){
			where += "&s_code="+$("#s_code").val();
		}
		window.location.href = "/ShopAdmin/Manage_Bulk_product.asp?search=true"+where;
	});
	$("#check_all").click(function(){
		$("input[name=idx]").attr("checked",$(this).attr("checked"));
		if($(this).attr("checked")){
			$("input[name=idx]").each(function(){
				$(this).parent("td").children("input[name=idx_hidden]").val($(this).val());
			});
		}
		else{
			$("input[name=idx_hidden]").val("0");
		}
	});
	$("input[name=idx]").click(function(){
		if($(this).attr("checked")){
			$(this).parent("td").children("input[name=idx_hidden]").val($(this).val());
		}
		else{
			$(this).parent("td").children("input[name=idx_hidden]").val("0");
		}
	});
	$("input[name=btn_update]").click(function(){
		if($("input[name=idx]:checked").length > 0){
			document.forms["form"].submit();
		}
		else{
			alert("please check any products!");
		}
	});
});
*/
var CheckAllActiveFlag = 0;
function selectAllActive(frm){
        for (var i=0; i<frm.elements.length; i++) {
            if (frm.elements[i].name.indexOf('CheckedCustomerID') == false) {
               if (CheckAllActiveFlag == 1) {
                  if (frm.elements[i].disabled==true) {
                     frm.all.checked = false;
                     frm.elements[i].checked = false;
                  }
               }
               else {
                  if (frm.elements[i].disabled==true) {
                     frm.all.checked = true;
                     frm.elements[i].checked = true;
                  }
               }
            }
        }
        if (CheckAllActiveFlag == 1) {
           frm.btnCheck2.value = "Check All Active Customers";
           CheckAllActiveFlag = 0;
        }
        else {
           frm.btnCheck2.value = "Cancel";
           CheckAllActiveFlag = 1;
        }
    }

	function CopyMailingToShipping(frm) {
        if (frm.IsThisSameAddress.checked) {
           frm.ShippingFirstName.value=frm.MailingFirstName.value;
           frm.ShippingLastName.value=frm.MailingLastName.value;
           frm.ShippingCompanyName.value=frm.MailingCompanyName.value;
           frm.ShippingStreet.value=frm.MailingStreet.value;
           frm.ShippingCity.value=frm.MailingCity.value;
           frm.ShippingStateOrProvince.value=frm.MailingStateOrProvince.value;
           frm.ShippingZipcode.value=frm.MailingZipcode.value;
           frm.ShippingCountry.value=frm.MailingCountry.value;
           frm.ShippingPhone.value=frm.MailingPhone.value;
           frm.ShippingFax.value=frm.MailingFax.value;
           frm.ShippingEmailAddress.value=frm.LoginID.value;
        }
        else {
           frm.ShippingFirstName.value='';
           frm.ShippingLastName.value='';
           frm.ShippingCompanyName.value='';
           frm.ShippingStreet.value='';
           frm.ShippingCity.value='';
           frm.ShippingStateOrProvince.value='';
           frm.ShippingZipcode.value='';
           frm.ShippingCountry.value='';
           frm.ShippingPhone.value='';
           frm.ShippingFax.value='';
           frm.ShippingEmailAddress.value='';
        }
    }

function Confirm_DeleteSelected(frm) {
	if (confirm("Do you want to delete the selected messages?")) {
		frm.submit();
	}
	return false;
}

var SelectAllFlag = 0;
function SelectAll(frm) {
	for (var i=0; i<frm.elements.length; i++) {
		if (frm.elements[i].name.indexOf('CheckedMessageIDs') == false ) {
			if (SelectAllFlag == 1 ) {
				if (frm.elements[i].disabled==false) {
					frm.all.checked = false;
					frm.elements[i].checked = false;
				}
			}
			else {
				if (frm.elements[i].disabled==false) {
					frm.all.checked = true;
					frm.elements[i].checked = true;
				}
			}
		}
	}
	if (SelectAllFlag == 1) {
		frm.btnSelect.value = "Slect All";
		SelectAllFlag = 0;
	}
	else {
		frm.btnSelect.value = "Cancel";
		SelectAllFlag = 1;
	}
}
/*
$(function(){
	$("#s_odate").mask("99/99/9999");
	$("#btn_search").click(function(){
		
		document.forms["form"].submit();
	});
});
*/

function RegConfirm(frm){
	if(frm.FirstName.value==''){
		alert("First name cannot be empty!");
		frm.FirstName.focus();
		return false;
	}
	if(frm.LastName.value==''){
		alert("Last name cannot be empty!");
		frm.LastName.focus();
		return false;
	}
	if(frm.LoginID.value==''){
		alert("Login ID cannot be empty!");
		frm.LoginID.focus();
		return false;
	}
	if(frm.LoginPassword.value==''){
		alert("Login password cannot be empty!");
		frm.LoginPassword.focus();
		return false;
	}
	if(frm.LoginPassword.value.length < 7){
		alert("Login password must be at least 7 character!");
		frm.LoginPassword.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm2(frm){
	if(frm.CompanyName.value==''){
		alert("Company name cannot be empty!");
		frm.CompanyName.focus();
		return false;
	}
	if(frm.OwnerFirstName.value==''){
		alert("Owner's first name cannot be empty!");
		frm.OwnerFirstName.focus();
		return false;
	}
	if(frm.OwnerLastName.value==''){
		alert("Owner's last name cannot be empty!");
		frm.OwnerLastName.focus();
		return false;
	}
	if(frm.ContactFirstName1.value==''){
		alert("First name of Contact Person 1 cannot be empty!");
		frm.ContactFirstName.focus();
		return false;
	}
	if(frm.ContactLastName1.value==''){
		alert("Last name of Contact Person 1 cannot be empty!");
		frm.ContactLastName.focus();
		return false;
	}
	if(frm.ContactFirstName2.value!='' && frm.ContactLastName2.value==''){
		alert("Last name of Contact Person 2 cannot be empty!");
		frm.ContactLastName2.focus();
		return false;
	}
	if(frm.ContactFirstName2.value=='' && frm.ContactLastName2.value!=''){
		alert("First name of Contact Person 2 cannot be empty!");
		frm.ContactFirstName2.focus();
		return false;
	}
	if(frm.CompanyWebsite1.value==''){
		alert("Company website address cannot be empty!");
		frm.CompanyWebsite1.focus();
		return false;
	}
	if(frm.CompanyEmailAddress1.value==''){
		alert("Company e-mail address cannot be empty!");
		frm.CompanyEmailAddress1.focus();
		return false;
	}
	if(frm.StoreAddress.value==''){
		alert("Store address cannot be empty!");
		frm.StoreAddress.focus();
		return false;
	}
	if(frm.StoreCity.value==''){
		alert("Store's city cannot be empty!");
		frm.StoreCity.focus();
		return false;
	}
	if(frm.StoreStateOrProvince.value==''){
		alert("Store's State or Province cannot be empty!");
		frm.StoreStateOrProvince.focus();
		return false;
	}
	if(frm.StoreZipCode.value==''){
		alert("Store's zipcode cannot be empty!");
		frm.StoreZipCode.focus();
		return false;
	}
	if(frm.StoreCountryOrRegion.value==''){
		alert("Store's country cannot be empty!");
		frm.StoreCountryOrRegion.focus();
		return false;
	}
	if(frm.StorePhoneNumber.value==''){
		alert("Store phone number cannot be empty!");
		frm.StorePhoneNumber.focus();
		return false;
	}
	if(frm.StoreFaxNumber.value==''){
		alert("Store fax number cannot be empty!");
		frm.StoreFaxNumber.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm3(frm){
	if(frm.AboutUs.value==''){
		alert("Content of About Us cannot be empty!");
		frm.AboutUs.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm4(frm){
	if(frm.PrivacyPolicy.value==''){
		alert("Content of privacy policy cannot be empty!");
		frm.PrivacyPolicy.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm5(frm){
	if(frm.ReturnPolicy_add.value==''){
		alert("Return policy cannot be empty!");
		frm.ReturnPolicy.focus();
		return false;
	}
	if(frm.PriorityNo_add.value==''){
		alert("Sort number cannot be empty!");
		frm.PriorityNo.focus();
		return false;
	}
	if(isNaN(frm.PriorityNo_add.value)){
		alert("Please enter numbers!");
		frm.PriorityNo.focus();
		return false;
	}
	frm.submit();

}

function RegConfirm6(frm){
	if(frm.HelpAndFAQs.value==''){
		alert("Content of help statement cannot be empty!");
		frm.HelpAndFAQs.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm7(frm){
	if(frm.QuantityDiscountName.value==''){
		alert("Quantity discount name cannot be empty!");
		frm.QuantityDiscountName.focus();
		return false;
	}
	if(!frm.LowerQty1.value){
		alert("Lower quantity cannot be empty!");
		frm.LowerQty1.focus();
		return false;
	}
	if(isNaN(frm.LowerQty1.value)){
		alert("Please enter numbers!");
		frm.LowerQty1.focus();
		return false;
	}
	if(frm.UpperQty1.value==''){
		alert("Upper quantity cannot be empty!");
		frm.UpperQty1.focus();
		return false;
	}
	if(isNaN(frm.UpperQty1.value)){
		alert("Please enter numbers!");
		frm.UpperQty1.focus();
		return false;
	}
	if(frm.DiscountPercentage1.value==''){
		alert("Discount percentage cannot be empty!");
		frm.DiscountPercentage1.focus();
		return false;
	}
	if(isNaN(frm.DiscountPercentage1.value)){
		alert("Please enter numbers!");
		frm.DiscountPercentage1.focus();
		return false;
	}
	if(isNaN(frm.LowerQty2.value)){
		alert("Please enter numbers!");
		frm.LowerQty2.focus();
		return false;
	}
	if(isNaN(frm.UpperQty2.value)){
		alert("Please enter numbers!");
		frm.UpperQty2.focus();
		return false;
	}
	if(isNaN(frm.DiscountPercentage2.value)){
		alert("Please enter numbers!");
		frm.DiscountPercentage2.focus();
		return false;
	}
	if(isNaN(frm.LowerQty3.value)){
		alert("Please enter numbers!");
		frm.LowerQty3.focus();
		return false;
	}
	if(isNaN(frm.UpperQty3.value)){
		alert("Please enter numbers!");
		frm.UpperQty3.focus();
		return false;
	}
	if(isNaN(frm.DiscountPercentage3.value)){
		alert("Please enter numbers!");
		frm.DiscountPercentage3.focus();
		return false;
	}
	if(isNaN(frm.LowerQty4.value)){
		alert("Please enter numbers!");
		frm.LowerQty4.focus();
		return false;
	}
	if(isNaN(frm.UpperQty4.value)){
		alert("Please enter numbers!");
		frm.UpperQty4.focus();
		return false;
	}
	if(isNaN(frm.DiscountPercentage4.value)){
		alert("Please enter numbers!");
		frm.DiscountPercentage4.focus();
		return false;
	}
	if(isNaN(frm.LowerQty5.value)){
		alert("Please enter numbers!");
		frm.LowerQty5.focus();
		return false;
	}
	if(isNaN(frm.UpperQty5.value)){
		alert("Please enter numbers!");
		frm.UpperQty5.focus();
		return false;
	}
	if(isNaN(frm.DiscountPercentage5.value)){
		alert("Please enter numbers!");
		frm.DiscountPercentage5.focus();
		return false;
	}
	if(isNaN(frm.LowerQty6.value)){
		alert("Please enter numbers!");
		frm.LowerQty6.focus();
		return false;
	}
	if(isNaN(frm.UpperQty6.value)){
		alert("Please enter numbers!");
		frm.UpperQty6.focus();
		return false;
	}
	if(isNaN(frm.DiscountPercentage6.value)){
		alert("Please enter numbers!");
		frm.DiscountPercentage6.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm8(frm){
	if(!frm.MinimumPointsForVIPs){
		alert("Please enter the minimum points for being VIP members.");
		frm.MinimumPointsForVIPs.focus();
		return false;
	}
	if(isNaN(frm.DiscountPercentageForVIPs.value)){
		alert("Please enter numbers!");
		frm.DiscountPercentageForVIPs.focus();
		return false;
	}
	if(isNaN(frm.ProductAmountPercentageForVIPs.value)){
		alert("Please enter numbers!");
		frm.ProductAmountPercentageForVIPs.focus();
		return false;
	}
	if(isNaN(frm.MinimumPointsForVIPs.value)){
		alert("Please enter numbers!");
		frm.MinimumPointsForVIPs.focus();
		return false;
	}
	if(isNaN(frm.VIP_Membership_Price.value)){
		alert("Please enter numbers!");
		frm.VIP_Membership_Price.focus();
		return false;
	}
	if(frm.DiscountPercentageForVIPs.value==''){
		alert("Please enter the discount percentage at purchase for VIP members.");
		frm.DiscountPercentageForVIPs.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm9(frm){
	if(frm.LocalSalesTaxRate.value==''){
		alert("Local Sales Tax Rate is empty!");
		frm.LocalSalesTaxRate.focus();
		return false;
	}
	if(isNaN(frm.LocalSalesTaxRate.value)){
		alert("Please enter numbers!");
		frm.LocalSalesTaxRate.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm10(frm){
	if(frm.PaymentType.value==''){
		alert("Please select a payment type.");
		frm.PaymentType.focus();
		return false;
	}
	if(frm.PaymentMethod.value==''){
		alert("Payment method cannot be empty!");
		frm.PaymentMethod.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm11(frm){
	if(frm.BizHours.value==''){
		alert("Business hours cannot be empty!");
		frm.BizHours.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm12(frm){
	if(!frm.coupon_type.value){
		alert("Please select a coupon type.");
		frm.coupon_type.focus();
		return false;
	}
	if(!frm.coupon_code.value){
		alert("Promo Code cannot be empty!");
		frm.coupon_code.focus();
		return false;
	}
	if(!frm.minimum_order.value){
		alert("Minimum Order cannot be empty!");
		frm.minimum_order.focus();
		return false;
	}
	if(isNaN(frm.minimum_order.value)){
		alert("Please enter numbers!");
		frm.minimum_order.focus();
		return false;
	}
/*	if(!frm.is_active.value){
		alert("Please specify if the Promo Code is active(y) or inactive(n)");
		frm.is_active.focus();
		return false
	}
	if(frm.is_active.value != "y" && frm.is_active.value != "n"){
			alert("Please specify if the Promo Code is active(y) or inactive(n)");
			frm.is_active.focus();
			return false;
	}*/
	if(frm.coupon_type.value == "free_product"){
		if(!frm.product_id.value){
			alert("Please enter the Product Id");
			frm.product_id.focus();
			return false;
		}
	}
	if(frm.coupon_type.value == "total_discount"){
		if(!frm.percentage_discount.value){
			alert("Please enter the Percentage Discount for this Promo Code");
			frm.percentage_discount.focus();
			return false;
		}
	}
	frm.submit();
}

function RegConfirm13(frm){
	if(!frm.Color.value){
		alert("Color name cannot be empty!");
		frm.Color.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm13_2(frm) {
    if (frm.SizeChartName.value=='') {
       alert("Size chart name cannot be empty!");
       frm.SizeChartName.focus();
       return false;
    }
/*    if (frm.Size[1].value=='') {
       alert("Size 1 cannot be empty!");
       frm.Size[1].focus();
       return false;
    }*/
    frm.submit();
}

function RegConfirm13_3(frm) {
    if (frm.PackChartName.value=='') {
       alert("Pack chart name cannot be empty!");
       frm.PackChartName.focus();
       return false;
    }
/*    if (frm.Size[1].value=='') {
       alert("Size 1 cannot be empty!");
       frm.Size[1].focus();
       return false;
    }*/
    frm.submit();
}

function RegConfirm14(frm){
	if(!frm.LoginID.value){
		alert("Login ID cannot be empty!");
		frm.LoginID.focus();
		return false;
	}
	if(!frm.LoginPassword.value){
		alert("Login password cannot be empty!");
		frm.LoginPassword.focus();
		return false;
	}
	if(!frm.MailingFirstName.value){
		alert("First name of the mailing address cannot be empty!");
		frm.MailingFirstName.focus();
		return false;
	}
	if(!frm.MailingLastName.value){
		alert("Last name of the mailing address cannot be empty!");
		frm.MailingLastName.focus();
		return false;
	}
	if(!frm.MailingStreet.value){
		alert("Mailing street address cannot be empty!");
		frm.MailingStreet.focus();
		return false;
	}
	if(!frm.MailingCity.value){
		alert("Mailing city cannot be empty!");
		frm.MailingCity.focus();
		return false;
	}
	if(!frm.MailingStateOrProvince.value){
		alert("Mailing State / Province cannot be empty!");
		frm.MailingStateOrProvince.focus();
		return false;
	}
	if(!frm.MailingZipcode.value){
		alert("Mailing zipcode cannot be empty!");
		frm.MailingZipcode.focus();
		return false;
	}
	if(!frm.MailingCountry.value){
		alert("Mailing country cannot be empty!");
		frm.MailingCountry.focus();
		return false;
	}
	if(!frm.SortShippingAddress.value){
		alert("Is this shipping address a commercial or residential address?");
		frm.SortShippingAddress.focus();
		return false;
	}
	if(!frm.ShippingFirstName.value){
		alert("First name of the shipping address cannot be empty!");
		frm.ShippingFirstName.focus();
		return false;
	}
	if(!frm.ShippingLastName.value){
		alert("Last name of the shipping address cannot be empty!");
		frm.ShippingLastName.focus();
		return false;
	}
	if(!frm.ShippingStreet.value){
		alert("Shipping street address cannot be empty!");
		frm.ShippingStreet.focus();
		return false;
	}
	if(!frm.ShippingCity.value){
		alert("Shipping city cannot be empty!");
		frm.ShippingCity.focus();
		return false;
	}
	if(!frm.ShippingStateOrProvince.value){
		alert("Shipping State / Province cannot be empty!");
		frm.ShippingStateOrProvince.focus();
		return false;
	}
	if(!frm.ShippingZipcode.value){
		alert("Shipping zipcode cannot be empty!");
		frm.ShippingZipcode.focus();
		return false;
	}
	if(!frm.ShippingCountry.value){
		alert("Shipping country cannot be empty!");
		frm.ShippingCountry.focus();
		return false;
	}
	frm.submit();
}

function RegConfirm15(frm){
	var checked = null;
	var inputs = document.getElementsByName('location');
	for (var i = 0; i < inputs.length; i++){
		if(inputs[i].checked){
			checked = inputs[i];
		}
	}
	if(checked==null){
		alert("Please choose an option");
		return false;
	}
	if(!frm.PopularSearch.value){
		alert("Popular Search cannot be empty!");
		frm.PopularSearch.focus();
		return false;
	}
	if(!frm.SearchLink.value){
		alert("Search Link cannot be empty!");
		frm.SearchLink.focus();
		return false;
	}
	if(!frm.DisplayOrder.value){
		alert("Display Order cannot be empty!");
		frm.DisplayOrder.focus();
		return false;
	}
	if(!frm.FromDate.value){
		alert("From Date cannot be empty!");
		frm.FromDate.focus();
		return false;
	}
	if(!frm.ToDate.value){
		alert("To Date cannot be empty!");
		frm.ToDate.focus();
		return false;
	}
	
	frm.submit();
}

function UpdateSpotlight(frm){
	if(!frm.spot1.value || isNaN(frm.spot1.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot1.focus();
		return false;
	}
	if(!frm.spot2.value || isNaN(frm.spot2.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot2.focus();
		return false;
	}
	if(!frm.spot3.value || isNaN(frm.spot3.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot3.focus();
		return false;
	}
	if(!frm.spot4.value || isNaN(frm.spot4.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot4.focus();
		return false;
	}
	if(!frm.spot5.value || isNaN(frm.spot5.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot5.focus();
		return false;
	}
	if(!frm.spot6.value || isNaN(frm.spot6.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot6.focus();
		return false;
	}
	/*
	if(!frm.spot7.value || isNaN(frm.spot7.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot7.focus();
		return false;
	}
	if(!frm.spot8.value || isNaN(frm.spot8.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot8.focus();
		return false;
	}
	if(!frm.spot9.value || isNaN(frm.spot9.value)){
		alert("Please enter numbers(Product ID) only!!!");
		frm.spot9.focus();
		return false;
	}*/
	frm.submit();
}

function checkedAll (frm){
	document.getElementById("checkall").checked = false;
	for(var i in checklist) { 
		checklist[i].checked = !checklist[i].checked; 	
	}
}

function checkedAll2 (frm){
	document.getElementById("checkall").checked = false;
	for(var i in checklist2) { 
		checklist2[i].checked = !checklist2[i].checked; 	
	}
}

function checkedAll3 (frm){
	document.getElementById("checkall").checked = false;
	for(var i in checklist3) { 
		checklist3[i].checked = !checklist3[i].checked; 	
	}
}

function CopyMailingToShipping(frm) {
	if (frm.IsThisSameAddress.checked) {
		frm.ShippingFirstName.value=frm.MailingFirstName.value;
		frm.ShippingLastName.value=frm.MailingLastName.value;
		frm.ShippingCompanyName.value=frm.MailingCompanyName.value;
		frm.ShippingStreet.value=frm.MailingStreet.value;
		frm.ShippingCity.value=frm.MailingCity.value;
		frm.ShippingStateOrProvince.value=frm.MailingStateOrProvince.value;
		frm.ShippingZipcode.value=frm.MailingZipcode.value;
		frm.ShippingCountry.value=frm.MailingCountry.value;
		frm.ShippingPhone.value=frm.MailingPhone.value;
		frm.ShippingFax.value=frm.MailingFax.value;
		frm.ShippingEmailAddress.value=frm.LoginID.value;
	}
	else {
		frm.ShippingFirstName.value='';
		frm.ShippingLastName.value='';
		frm.ShippingCompanyName.value='';
		frm.ShippingStreet.value='';
		frm.ShippingCity.value='';
		frm.ShippingStateOrProvince.value='';
		frm.ShippingZipcode.value='';
		frm.ShippingCountry.value='';
		frm.ShippingPhone.value='';
		frm.ShippingFax.value='';
		frm.ShippingEmailAddress.value='';
	}
}

function SendEmailConfirm(frm){
	if(!frm.EmailSubject.value){
		alert('Email subject cannot be blank!');
		frm.EmailSubject.focus();
		return false;
	}
	if(!frm.EmailTo1.value && !frm.EmailTo2.value){
		alert('Enter e-mail address(es) or select a group of customers.');
		frm.EmailTo1.focus();
		return false;
	}
	if(frm.EmailTo1.value != '' && frm.EmailTo2.value != ''){
		alert('You are not allowed to have recipients in both choices.\nEnter e-mail address(es) or select a group of customers.');
		frm.EmailTo1.focus();
		return false;
	}
	if(!frm.EmailContent.value){
		alert('EmailContent cannot be blank!');
		frm.EmailContent.focus();
		return false;
	}
	return true;
}

function showList(str){
	if(str==""){
		document.getElementById("ds_pro").innerHTML="";
		return;
	}
	if(window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("ds_pro").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","Manage_Products.php?q="+str,true);
	xmlhttp.send();
}

function orderBy(){
	var x=document.getElementById("DisplayOrder").selectedIndex;
	var y=document.getElementById("DisplayOrder").options[x].value;
	location.href="Manage_Colors.php?orderby="+y;
}

function orderSize(){
	var x=document.getElementById("DisplayOrder").selectedIndex;
	var y=document.getElementById("DisplayOrder").options[x].value;
	location.href="sizechartTest.php?orderby="+y;
}

function AllowNumberOnly() {
    if (event.keyCode < 48 || event.keyCode > 57) {
       event.returnValue = false;
    }
}
function ConfirmCancelOrder(frm) {
    if (confirm("Do you want to cancel this order?")) {
    	frm.action.value="cancel";
    	frm.submit();
    }
    return false;
}
function RecoverCancelOrder(frm) {
    if (confirm("Do you want to recover this order?")) {
    	frm.action.value="recover";
    	frm.submit();
    }
    return false;
}
function RecoverAgain(frm){
	if (confirm("Do you want to recover this order?")) {
    	frm.action.value="recoverAgain";
    	frm.submit();
    }
    return false;
}
function ConfirmOrder(frm) {
    if (confirm("Do you want to confirm this order?")) {
    	frm.action.value="confirm";
    	frm.submit();
    }
    return false;
}
function ConfirmShipping(frm) {
    if (confirm("Do you want to confirm the shiiping of this order?")) {
       frm.action.value = "ConfirmShiipingThisOrder";
       //return true;
       frm.submit();
    }
    return false;
}
function ConfirmShippingCancel(frm) {
    if (confirm("Do you want to cancel the shiiping of this order?")) {
       frm.action.value = "CancelShiipingThisOrder";
       //return true;
       frm.submit();
    }
    return false;
}
function Confirm_UpdateOrder(frm) {
    if (confirm("Do you want to update this order?")) {
    	frm.action.value="update";
    	frm.submit();
    }
    return false;
}
function upslabel(mode,idx){		
	if (document.getElementById('Sweight').value=="") {
		alert('Please type in weight');
		return false;
	}	
	else
	{	
		switch(mode){
			case 0:
				window.open("http://ssups.i9biz.com/default.aspx?ono="+idx+"&weg="+document.getElementById('Sweight').value,null,"toolbar=0,width=630,height=400");
				break;
			case 1:
				window.open("http://ssups.i9biz.com/print.aspx?ono="+idx,null,"toolbar=0, width=400, height=700");
				break;
		}
	}
	document.location.href = "Manage_Orders_ViewOrderDetails.php?act=view&oid="+idx;
}

function SearchOrders(frm){
	var mydate = frm.s_odate.value;
	var flag = false, cnt = 0, msg = '';
	var inputs = frm.getElementsByTagName('input');
	for (i=0; i<11; i++) {
		if (inputs[i].value=="") 
			cnt++;
	}
	if (cnt>10) {
		flag = true;
		msg = "At least one or more search conditions needed.";
	}
	if (mydate!="") {
		var temp = mydate.split("-");
		if (isNaN(temp[0]) || temp[0].length!=4) {
			msg += '\nPlease enter the year in given format.';
			flag = true;
		}
		if (isNaN(temp[1]) || (temp[1]>12 || temp[1]<1)) {
			msg += '\nPlease enter the month in given format';
			flag = true;
		}
		if (isNaN(temp[2]) || (temp[2]>31 || temp[2]<1)) {
			msg += '\nPlease enter the date in given format';
			flag = true;
		}
	}
	if (flag) {
		alert(msg);
		return false;
	} else {
		frm.submit();
	}
}

function addNewItems(frm){
	/*if(document.getElementById('s_cat1').value==''){
		alert('Please select Category 1');
		return false;
	}*/
	frm.submit();
}