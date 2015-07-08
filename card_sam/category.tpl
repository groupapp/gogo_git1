
{include file="$tpl_dir./breadcrumb1.tpl"}
{include file="$tpl_dir./errors.tpl"}


<script type="text/javascript">
// <![CDATA[
function getModel()
 {
		
		var t=document.getElementById('stype').value;
		var m=document.getElementById('smanufacturer').value;
		//alert("category.php?id_category=1&getmodel=1&gtype="+t+"&gmanufacturer="+m);
		if(t>0 && m>0)
		window.location ="category.php?id_category=1&getmodel=1&gtype="+t+"&gmanufacturer="+m;
		else if(t==0 && m==0)
		window.location ="category.php?id_category=1&getmodel=1&gtype="+t+"&gmanufacturer="+m;
 }
 function model_change()
 {

	var t=document.getElementById('stype').value;
		var m=document.getElementById('smanufacturer').value;
		var s=document.getElementById('smodel').value;
		//alert("s_type="+t+"&s_brand="+m);
		if(t!='' && m!='')
		window.location ="category.php?id_category=1&stype="+t+"&smanufacturer="+m+"&smodel="+s;
 
 document.getElementById('model_form').submit();
 }

function showdetail()
 {
		document.getElementById('main_club').style.display='none';
		document.getElementById('sub_club').style.display='block';
		
 }
 function showmain()
 {
		document.getElementById('main_club').style.display='block';
		document.getElementById('sub_club').style.display='none';
		
 }

//-----------------------------------------------------------------------------------
function OnSelectionChange (x) {
	//alert(''+x);
		if(x!='')
    	document.showimg.src='./john/'+x;
        }
 function step1 () {
    	document.getElementById('b_category').style.display='block';
		document.getElementById('b_brand').style.display='none';
		document.getElementById('b_model').style.display='none';
        }
function step2 () {
    	document.getElementById('b_category').style.display='none';
		document.getElementById('b_brand').style.display='block';
		document.getElementById('b_model').style.display='none';
		}
function step3 (a) {
		document.getElementById('b_category').style.display='none';
		document.getElementById('b_brand').style.display='none';
    	document.getElementById('b_model').style.display='block';
			
		var b=document.getElementById('t_manufacturer').value;
		var c= document.getElementById('t_type').value;
			/*
			var radios = document.frm1.p_category; 
		
			 for (var i=0; i <radios.length; i++)
			 { 
				  if (radios[i].checked) { 
						var c=radios[i].value;	
					
				  } 
			 }*/
		//alert('c:'+c+'b:'+b);	 
		if(c>0 && b>0)	
		window.location ="category.php?id_category=1&getmodel=1&gtype="+c+"&gmanufacturer="+b;	 
		else if(c==0 && b==0)
		window.location ="category.php?id_category=1&getmodel=1&gtype="+c+"&gmanufacturer="+b;	


        }
 function Referance(m,x,s)
 {
		//alert('model'+s);
		window.location ="category.php?id_category=1&getmodel=1&stype="+x+"&smanufacturer="+m+"&smodel="+s+"&gtype="+x+"&gmanufacturer="+m+"&gmodel="+s;
		
 }

 function showmenu(x,y)
 {
	//alert(x);	
		/*
		var radios = document.frm1.p_category;
			 for (var i=0; i <radios.length; i++)
			 { 
				  if (radios[i].checked)
				  { 
					document.getElementById('b_category').style.display='none';
					document.getElementById('b_brand').style.display='block';
					document.getElementById('b_model').style.display='none';
					document.getElementById('bu1').value=x;
				  } 
			 }*/
			 document.getElementById('b_category').style.display='none';
			 document.getElementById('b_brand').style.display='block';
			 document.getElementById('b_model').style.display='none';
			 document.getElementById('b_msg').style.display='none';
			 document.getElementById('bu1').value=x;
			 
			 document.getElementById('t_type').value=y;
			 //window.location ="category.php?id_category=1&tetmodel=1&gtype="+y+"&stype="+y;
	
 }

 function showmenu2(x,y)
 {
					var c= document.getElementById('t_type').value;
					var me=document.getElementById('bu1').value;
					if(c==0)
					{
					document.getElementById('b_category').style.display='block';
					document.getElementById('b_brand').style.display='none';
					document.getElementById('b_msg').style.display='block';
					}
					else
					{
					document.getElementById('b_category').style.display='none';
					document.getElementById('b_brand').style.display='block';
					document.getElementById('b_msg').style.display='none';
					document.getElementById('b_model').style.display='none';
					document.getElementById('bu2').value=x;

					var b=y;
					
					//if(c>0 && b>0)	
					window.location ="category.php?id_category=1&getmodel=1&gtype="+c+"&gmanufacturer="+b+"&stype="+c+"&smanufacturer="+b;	 
					/*
					else if(c==0 && b==0)
					window.location ="category.php?id_category=1&getmodel=1&gtype="+c+"&gmanufacturer="+b;*/	
					}
			
 }

//-----------------------------------------------------------------
//]]>
</script>


{if isset($category)}
	{if $category->id AND $category->active}
	<div style="display:none">	
		<h1>
			{strip}
				{$category->name|escape:'htmlall':'UTF-8'}
				{if isset($categoryNameComplement)}
					{$categoryNameComplement|escape:'htmlall':'UTF-8'}
				{/if}
				<span class="category-product-count">
					{include file="$tpl_dir./category-count.tpl"}
				</span>
			{/strip}
		</h1>
		
		
		{if $scenes}
			<!-- Scenes -->
			{include file="$tpl_dir./scenes.tpl" scenes=$scenes}
{*
		{else}
			<!-- Category image -->
			{if $category->id_image}
			<div class="align_center">
				<img src="{$link->getCatImageLink($category->link_rewrite, $category->id_image, 'category')}" alt="{$category->name|escape:'htmlall':'UTF-8'}" title="{$category->name|escape:'htmlall':'UTF-8'}" id="categoryImage" width="{$categorySize.width}" height="{$categorySize.height}" />
			</div>
			{/if}
*}
		{/if}
		{if $category->description}
			<p class="cat_desc">{$category->description}</p>
		{/if}

		{if isset($subcategories)}
		
        <!-- Subcategories -->
        
		<div id="subcategories">
			<h2>{l s='Club Type'}</h2>
			<ul style="width: 800px;">
			{foreach from=$subcategories item=subcategory}
				<li>
					{if $subcategory.id_category >2}
					<a class="bgcolor bordercolor" href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$subcategory.name|escape:'htmlall':'UTF-8'}">
						{if $subcategory.id_image}
							<img src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image, 'medium')}" alt="" />
						{else}
							<img src="{$img_cat_dir}default-medium.jpg" alt="" />
						{/if}
					<span>{$subcategory.name|escape:'htmlall':'UTF-8'|truncate:20:'...'}</span>
					</a>
					{/if}
				</li>
			{/foreach}
			</ul>
		</div>
		{/if}
</div>
		
			<!--
			<form id="model_form" action="category.php?id_category=1" method="get" >
			<input type="hidden" name="id_category" value="1">
			<select name="stype" id="stype" onchange="getModel()">
			{if $gtype>0}
			<option value="{$gtype}">{$stype}</option>
			<option value="0">---  Rest ---</option>
			{else}
			<option value="0">---  Type ---</option>
			{/if}
			{foreach $subcategories1 item=subcategory1}
			<option value="{$subcategory1.id_category}">{$subcategory1.name}</option>
			{/foreach}
			</select>
			<select name="smanufacturer" id="smanufacturer" onchange="getModel()">
			{if $gmanufacturer>0}
			<option value="{$gmanufacturer}">{$smanufacturer}</option>
			<option value="0">---  Rest ---</option>
			{else}
			<option value="0">---  Manufacturer ---</option>
			{/if}
			{foreach $manufacturers item=manufacturer}
			<option value="{$manufacturer.id_manufacturer}">{$manufacturer.name}</option>
			{/foreach}
			</select>
			<select name="smodel" id="smodel" onchange="model_change()" >
			{if $smodel<>''}
			<option value="">{$smodel}</option>
			<option value="">---  Model ---</option>
			{else}
			<option value="">---  Model ---</option>
			{/if}
			{foreach $gmodels item=model}
			<option value="{$model.reference}">{$model.reference}</option>
			{/foreach}
			</select>
			<!--input type="submit" class="button_mini" name="submit" value="Search" /-->
			<!--</form>-->
<!---search  start---------------------->
{if $chkidcustomer==0}
<div id="top_container">
			<div class="accordionButton on over1" onclick="step1()">
			<input type="image" id="step-1" src="./img/hdr_clubtype.png"  style="margin-top: 4px; padding-left:5px;">
			<span class="bu"><input type="text" class="bu1" id="bu1" value="{$ntype}" readonly /><input type="hidden" id="t_type" value=""/></span>
			</div>			
			<div style="clear:both"></div>
			
			{if $getmodel>0}
			<span id="b_category" style="display:none;">
			{else if $tetmodel>0}
			<span id="b_category" style="display:none;">
			{else}
			<span id="b_category" style="display:block;">
			{/if}
			<FORM NAME="frm1">
			<div id="step_product_type" class="accordionContent accordclubtype">
				{foreach $subcategories1 item=subcategory1}
				<!--input type="radio" id="p_category" name="p_category" value="{$subcategory1.name}" checked><img src="/img/{$subcategory1.name}.jpg" width="189" height="40"/-->			
				<!--input type="radio" id="p_category" name="p_category" value="{$subcategory1.id_category}" onclick="showmenu('{$subcategory1.name}')"--><img src="/img/{$subcategory1.name}.jpg" onclick="showmenu('{$subcategory1.name}',{$subcategory1.id_category})" width="189" height="40"/>
				{if $subcategory1.id_category==7}
				<p>
				{/if}
				{/foreach}
				</p>
			</div>
			</form>
			</span>

			<div class="accordionButton on over1" onclick="step2()">
				<input type="image" id="step-2" src="./img/hdr_manufacturer.png"  style="margin-top: 4px; padding-left:5px;"><span class="bu"><input type="text" class="bu1" id="bu2" value="{$nmanufacturer}" readonly /><input type="hidden" id="t_manufacturer" value=""/></span>
			</div>
			
			<div style="clear:both"></div>
			<span id="b_msg" style="display:none;">
			Please first check your club type.
			</span>
			
			<span id="b_brand" style="display:none;">
				<div id="step_brand" class="accordionContent" style="float:left; width:96.7%;padding-left:15px;" >
					<!--select name="p_manufacturer" id="p_manufacturer" onchange="step3({$cookie->id_customer})"-->
					<span id="main_club">
					<img src="/img/brand_tmade.png" onclick="showmenu2('TaylorMade',9)">
					<img src="/img/brand_titleist.png" onclick="showmenu2('Titleist',10)">
					<img src="/img/brand_ping.png" onclick="showmenu2('Ping',22)">
					<img src="/img/brand_cobra.png" onclick="showmenu2('Cobra',6)">
					<img src="/img/brand_callaway.png" onclick="showmenu2('Callaway',3)">
					<input type="button" class="button_mini" value="See more" onclick="showdetail()"/>
					</span>
					<span id="sub_club" style="display:none;">
					{foreach $manufacturers item=manufacturer}
					<!--option value="{$manufacturer.id_manufacturer}">{$manufacturer.name}</option-->
					<span onclick="showmenu2('{$manufacturer.name}',{$manufacturer.id_manufacturer})" class="brandlistxt2">{$manufacturer.name}</span>&nbsp;&nbsp;
					{/foreach}
					<div style="display:block;width:100%;float:left;padding-top:20px;"><input type="button" value="Back" class="button_mini" onclick="showmain()"/></div></span>
					<!--/select-->
				</div>
			</span>
			<div class="accordionButton on over1" onclick="step3({$cookie->id_customer})" style="float:left;width:100%;">
				<input type="image" id="step-3" src="./img/hdr_selectmodel.png"  style="margin-top: 4px; padding-left:5px;">
				<!--<span style="padding-top:10px;">{$smodel}</span>-->
			</div>

			{if $getmodel>0}
			<span id="b_model" style="display:block;">
			{else}
			<span id="b_model" style="display:none;">
			{/if}
            <div style="float:left;width:100%; clear:both;">
				<div id="step_model-left">
					<div class="accordionContent-models">
						<table id="t1q" cellpadding="2" cellspacing="0">
						{foreach $gmodels item=model}
						<tr >
						{if $model.model==$smodel}
						<td onmouseover="OnSelectionChange('{$model.image}')" onclick="Referance({$model.id_manufacturer},{$model.id_category},'{$model.model}')" style="width:100%;background:#6FD600;">
						<a href="#" style="font-weight:bold;color:#fff;"><span id="selected_list">{$model.model}</span></a>
						{else}
						<td onmouseover="OnSelectionChange('{$model.image}')" onclick="Referance({$model.id_manufacturer},{$model.id_category},'{$model.model}')">
						<a href="#" style="font-weight:bold;">{$model.model}</a>
						{/if}
						</td>
						</tr>
						{/foreach}
						</table>
					</div>
				</div>
				
				<div class="modelpics">
					<div id="step_model-right1">
						{if $simage}
						<span  ><img name="showimg" src="./img/research/'.$simage.'" width="100" height="100"/></span>
						{else}
						<span  ><img name="showimg" src="./img/research/noimage.jpg" width="100" height="100"/></span>
						{/if}
					</div>
				</div>
                </div>
			</span>
            
</div>
{/if}
{if $products}
<!---search  end---------------------->
			<div style="float:left;width:100%;">
            {include file="$tpl_dir./pagination.tpl"}
			{include file="$tpl_dir./product-sort.tpl"}
			{include file="$tpl_dir./product-list.tpl" products=$products}
			{include file="$tpl_dir./pagination_down.tpl"}
            </div>
		{else}
		<p class="warning1">{l s='There are no listing in this model.'}</p>
		{/if}
	{elseif $category->id}
		<p class="warning1">{l s='This type is currently unavailable.'}</p>
	{/if}
{/if}