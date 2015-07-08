{include file="$tpl_dir./errors.tpl"}
{if $errors|@count == 0}
<script type="text/javascript">
// <![CDATA[
// PrestaShop internal settings
var currencySign = '{$currencySign|html_entity_decode:2:"UTF-8"}';
var currencyRate = '{$currencyRate|floatval}';
var currencyFormat = '{$currencyFormat|intval}';
var currencyBlank = '{$currencyBlank|intval}';
var taxRate = {$tax_rate|floatval};
var jqZoomEnabled = {if $jqZoomEnabled}true{else}false{/if};
//JS Hook
var oosHookJsCodeFunctions = new Array();
// Parameters
var id_product = '{$product->id|intval}';
var productHasAttributes = {if isset($groups)}true{else}false{/if};
var quantitiesDisplayAllowed = {if $display_qties == 1}true{else}false{/if};
var quantityAvailable = {if $display_qties == 1 && $product->quantity}{$product->quantity}{else}0{/if};
var allowBuyWhenOutOfStock = {if $allow_oosp == 1}true{else}false{/if};
var availableNowValue = '{$product->available_now|escape:'quotes':'UTF-8'}';
var availableLaterValue = '{$product->available_later|escape:'quotes':'UTF-8'}';
var productPriceTaxExcluded = {$product->getPriceWithoutReduct(true)|default:'null'} - {$product->ecotax};
var reduction_percent = {if $product->specificPrice AND $product->specificPrice.reduction AND $product->specificPrice.reduction_type == 'percentage'}{$product->specificPrice.reduction*100}{else}0{/if};
var reduction_price = {if $product->specificPrice AND $product->specificPrice.reduction AND $product->specificPrice.reduction_type == 'amount'}{$product->specificPrice.reduction}{else}0{/if};
var specific_price = {if $product->specificPrice AND $product->specificPrice.price}{$product->specificPrice.price}{else}0{/if};
var specific_currency = {if $product->specificPrice AND $product->specificPrice.id_currency}true{else}false{/if};
var group_reduction = '{$group_reduction}';
var default_eco_tax = {$product->ecotax};
var ecotaxTax_rate = {$ecotaxTax_rate};
var currentDate = '{$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}';
var maxQuantityToAllowDisplayOfLastQuantityMessage = {$last_qties};
var noTaxForThisProduct = {if $no_tax == 1}true{else}false{/if};
var displayPrice = {$priceDisplay};
var productReference = '{$product->reference|escape:'htmlall':'UTF-8'}';
var productAvailableForOrder = {if (isset($restricted_country_mode) AND $restricted_country_mode) OR $PS_CATALOG_MODE}'0'{else}'{$product->available_for_order}'{/if};
var productShowPrice = '{if !$PS_CATALOG_MODE}{$product->show_price}{else}0{/if}';
var productUnitPriceRatio = '{$product->unit_price_ratio}';
var idDefaultImage = {if isset($cover.id_image_only)}{$cover.id_image_only}{else}0{/if};
// Customizable field
var img_ps_dir = '{$img_ps_dir}';
var customizationFields = new Array();
{assign var='imgIndex' value=0}
{assign var='textFieldIndex' value=0}
{foreach from=$customizationFields item='field' name='customizationFields'}
	{assign var="key" value="pictures_`$product->id`_`$field.id_customization_field`"}
	customizationFields[{$smarty.foreach.customizationFields.index|intval}] = new Array();
	customizationFields[{$smarty.foreach.customizationFields.index|intval}][0] = '{if $field.type|intval == 0}img{$imgIndex++}{else}textField{$textFieldIndex++}{/if}';
	customizationFields[{$smarty.foreach.customizationFields.index|intval}][1] = {if $field.type|intval == 0 && isset($pictures.$key) && $pictures.$key}2{else}{$field.required|intval}{/if};
{/foreach}
// Images
var img_prod_dir = '{$img_prod_dir}';
var combinationImages = new Array();
{if isset($combinationImages)}
	{foreach from=$combinationImages item='combination' key='combinationId' name='f_combinationImages'}
		combinationImages[{$combinationId}] = new Array();
		{foreach from=$combination item='image' name='f_combinationImage'}
			combinationImages[{$combinationId}][{$smarty.foreach.f_combinationImage.index}] = {$image.id_image|intval};
		{/foreach}
	{/foreach}
{/if}
combinationImages[0] = new Array();
{if isset($images)}
	{foreach from=$images item='image' name='f_defaultImages'}
		combinationImages[0][{$smarty.foreach.f_defaultImages.index}] = {$image.id_image};
	{/foreach}
{/if}
// Translations
var doesntExist = '{l s='The product does not exist in this model. Please choose another.' js=1}';
var doesntExistNoMore = '{l s='This product is no longer in stock' js=1}';
var doesntExistNoMoreBut = '{l s='with those attributes but is available with others' js=1}';
var uploading_in_progress = '{l s='Uploading in progress, please wait...' js=1}';
var fieldRequired = '{l s='Please fill in all required fields, then save the customization.' js=1}';
{if isset($groups)}
	// Combinations
	{foreach from=$combinations key=idCombination item=combination}
		addCombination({$idCombination|intval}, new Array({$combination.list}), {$combination.quantity}, {$combination.price}, {$combination.ecotax}, {$combination.id_image}, '{$combination.reference|addslashes}', {$combination.unit_impact}, {$combination.minimal_quantity});
	{/foreach}
	// Colors
	{if $colors|@count > 0}
		{if $product->id_color_default}var id_color_default = {$product->id_color_default|intval};{/if}
	{/if}
{/if}


//]]>
</script>
{include file="$tpl_dir./breadcrumb.tpl"}
<script type="text/javascript">
function showmail(){
document.getElementById('mailarea').style.display='block';
}
function loginmail(){
alert('Please login first.');
}
</script>


<div id="primary_block" class="clearfix">
	{if isset($adminActionDisplay) && $adminActionDisplay}
	<div id="admin-action">
		<p>{l s='This product is not visible to your customers.'}
		<input type="hidden" id="admin-action-product-id" value="{$product->id}" />
		<input type="submit" value="{l s='Publish'}" class="exclusive" onclick="submitPublishProduct('{$base_dir}{$smarty.get.ad}', 0)"/>
		<input type="submit" value="{l s='Back'}" class="exclusive" onclick="submitPublishProduct('{$base_dir}{$smarty.get.ad}', 1)"/>
		</p>
		<div class="clear" ></div>
		<p id="admin-action-result"></p>
		</p>
	</div>
	{/if}
	{if isset($confirmation) && $confirmation}
	<p class="confirmation">
		{$confirmation}
	</p>
	{/if}
{* left column *}
	<div id="pb-right-column">
{* product img *}
		<div id="image-block" class="bordercolor">
			{if $have_image}
			<img src="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'large')}"
				{if $jqZoomEnabled}class="jqzoom" alt="{$link->getImageLink($product->link_rewrite, $cover.id_image, 'thickbox')}"{else} title="{$product->name|escape:'htmlall':'UTF-8'}" alt="{$product->name|escape:'htmlall':'UTF-8'}" {/if} id="bigpic" width="{$largeSize.width}" height="{$largeSize.height}" />
			{else}
			<img src="{$img_prod_dir}{$lang_iso}-default-large.jpg" id="bigpic" alt="" title="{$cover.legend|escape:'htmlall':'UTF-8'}" width="{$largeSize.width}" height="{$largeSize.height}" />
			{/if}
		</div>
		{if isset($images) && count($images) > 0}
{* thumbnails *}
		<div id="views_block" {if isset($images) && count($images) < 2}class="hidden"{/if}>
		{if isset($images) && count($images) > 3}<a id="view_scroll_left" class="hidden" title="{l s='Other views'}" href="javascript:{ldelim}{rdelim}">{l s='Previous'}</a>{/if}
		<div id="thumbs_list">
			<ul id="thumbs_list_frame">
				{if isset($images)}
					{foreach from=$images item=image name=thumbnails}
					{assign var=imageIds value="`$product->id`-`$image.id_image`"}
					<li id="thumbnail_{$image.id_image}" class="{if $smarty.foreach.thumbnails.last}thumb_last{/if}">
						<a href="{$link->getImageLink($product->link_rewrite, $imageIds, 'thickbox')}" rel="other-views" class="thickbox bordercolor {if $smarty.foreach.thumbnails.first}shown{/if}" title="{$image.legend|htmlspecialchars}">
							<img id="thumb_{$image.id_image}" src="{$link->getImageLink($product->link_rewrite, $imageIds, 'medium')}" alt="{$image.legend|htmlspecialchars}" height="{$mediumSize.height}" width="{$mediumSize.width}" />
						</a>
					</li>
					{/foreach}
				{/if}
			</ul>
		</div>
		{if isset($images) && count($images) > 3}<a id="view_scroll_right" title="{l s='Other views'}" href="javascript:{ldelim}{rdelim}">{l s='Next'}</a>{/if}
		</div>
		{/if}
		{if isset($images) && count($images) > 1}<span id="wrapResetImages" style="display:none;"><div><a id="resetImages" href="{$link->getProductLink($product)}" onclick="$('span#wrapResetImages').hide('slow');return (false);">{l s='Display all pictures'}</a></div></span>{/if}
{* usefull links *}
		<ul id="usefull_link_block">
			{if $HOOK_EXTRA_LEFT}{$HOOK_EXTRA_LEFT}{/if}
			<li><a href="javascript:print();">{l s='Print'}</a></li>
			{if $have_image && !$jqZoomEnabled}
			<!--li><span id="view_full_size" class="span_link">{l s='View full size'}</span></li-->
			{/if}
		</ul>
 <!-- ShareThis Button BEGIN --><br />
<div style="width:300px;">
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>

<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_googleplus_large' displayText='Google Plus'></span>
<span class='st_email_large' displayText='Email'></span>
<span class='st_sharethis_large' displayText='ShareThis'></span>
</div>
<!-- ShareThis Button END -->


	</div>
{* right column *}
	<div id="pb-left-column">
        <P id="smalltxt">Product Detail :</P>
		<h1>{$product->name|escape:'htmlall':'UTF-8'}</h1>
		{if ($product->show_price AND !isset($restricted_country_mode)) OR isset($groups) OR $product->reference OR (isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS)}
		<form id="buy_block" class="bordercolor" {if $PS_CATALOG_MODE AND !isset($groups) AND $product->quantity > 0}class="hidden"{/if} action="{$link->getPageLink('cart.php')}" method="post">
{* hidden datas *}
			<p class="hidden">
				<input type="hidden" name="token" value="{$static_token}" />
				<input type="hidden" name="id_product" value="{$product->id|intval}" id="product_page_product_id" />
				<input type="hidden" name="add" value="1" />
				<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
			</p>
			{if $product->show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
				<div class="price bordercolor">
					{if !$priceDisplay || $priceDisplay == 2}{assign var='productPrice' value=$product->getPrice(true, $smarty.const.NULL, 2)}{assign var='productPriceWithoutRedution' value=$product->getPriceWithoutReduct(false, $smarty.const.NULL)}{elseif $priceDisplay == 1}{assign var='productPrice' value=$product->getPrice(false, $smarty.const.NULL, 2)}{assign var='productPriceWithoutRedution' value=$product->getPriceWithoutReduct(true, $smarty.const.NULL)}{/if}



{* price *}
					<span class="our_price_display">
						{if $priceDisplay >= 0 && $priceDisplay <= 2}
						<span id="our_price_display2" class="ctprice">ClubTrader Price : {convertPrice price=$productPrice}</span>
						{if $tax_enabled && ((isset($display_tax_label) && $display_tax_label == 1) OR !isset($display_tax_label))}
							<span class="our_price_display_tax">{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}</span>
						{/if}
						{/if}
					</span>
					
					<span class="our_price_display">
						{if $priceDisplay >= 0 && $priceDisplay <= 2}
						<span id="our_price_display" class="price">Other Site Price : {convertPrice price=$product->wholesale_price}</span>
						{if $tax_enabled && ((isset($display_tax_label) && $display_tax_label == 1) OR !isset($display_tax_label))}
							<span class="our_price_display_tax">{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}</span>
						{/if}
						{/if}
					</span>
					<span class="our_price_display">
						{if $priceDisplay >= 0 && $priceDisplay <= 2}
						<span id="our_price_display" class="price" style="color:#DF0000;">You Save: {convertPrice price=$product->wholesale_price-$productPrice}</span>
						{if $tax_enabled && ((isset($display_tax_label) && $display_tax_label == 1) OR !isset($display_tax_label))}
							<span class="our_price_display_tax">{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}</span>
						{/if}
						{/if}
					</span>
                    
                   
{* product selltype *}
					<!--p id="product_reference" --> 
				{if $cookie->isLogged()}
				   {if $product->id_customer !=$cookie->id_customer}
						{if $product->trade==1}
						</label><span class="editable"><img src="/img/bt_trade2.png" onclick="showmail()"/></span>
						{elseif $product->trade==2}
						</label><span class="editable"></span>
						{else}
						</label><span class="editable"><img src="/img/bt_trade1.png" onclick="showmail()"/></span>
						{/if}
					{/if}
					<!--/p--> 
				 {else}
					{if $product->trade==1}
					</label><span class="editable"><img src="/img/bt_trade2.png" onclick="loginmail()"/></span>
					
					{elseif $product->trade==2}
					</label><span class="editable"></span>
					{else}
					</label><span class="editable"><img src="/img/bt_trade1.png" onclick="loginmail()"/></span>
					{/if}
                 {/if}   
                    
                    
{* tax excl *}
					{if $priceDisplay == 2}
						<span id="pretaxe_price"><span id="pretaxe_price_display">{convertPrice price=$product->getPrice(false, $smarty.const.NULL, 2)}</span>&nbsp;{l s='tax excl.'}</span>
					{/if}
{* add to cart btn *}

					<p id="add_to_cart" {if (!$allow_oosp && $product->quantity <= 0) OR !$product->available_for_order OR (isset($restricted_country_mode) AND $restricted_country_mode) OR $PS_CATALOG_MODE} style="display:none;"{/if}>
						{if $product->trade|intval!=1}
							{if ($cookie->islogged()) && ($product->id_customer ==$cookie->id_customer)}						
							<!--a class="exclusive" href="javascript:document.getElementById('add2cartbtn').click();"></a>
							<!--input id="add2cartbtn" type="submit" name="Submit" value="{l s='Add to cart'}" /-->
							{else}
							<a class="exclusive" href="javascript:document.getElementById('add2cartbtn').click();">{l s='BUY'}</a>
							<input id="add2cartbtn" type="submit" name="Submit" value="{l s='Add to cart'}" />
							{/if}
						{/if}
					</p>

{* quantity wanted *}
					<p id="quantity_wanted_p"{if (!$allow_oosp && $product->quantity == 0) OR $virtual OR !$product->available_for_order OR $PS_CATALOG_MODE} style="display: none;"{/if}>
						<input type="hidden" name="qty" id="quantity_wanted" readonly class="text" value="{if isset($quantityBackup)}{$quantityBackup|intval}{else}{if $product->minimal_quantity > 1}{$product->minimal_quantity}{else}1{/if}{/if}" size="2" maxlength="3" {if $product->minimal_quantity > 1}onkeyup="checkMinimalQuantity({$product->minimal_quantity});"{/if} />
						<label>{*l s='Quantity :'*}</label>
					</p>
				</div>
{* minimal quantity wanted *}
				<p id="minimal_quantity_wanted_p" class="bordercolor"{if $product->minimal_quantity <= 1 OR !$product->available_for_order OR $PS_CATALOG_MODE} style="display:none;"{/if}>{l s='You must add '}<b id="minimal_quantity_label">{$product->minimal_quantity}</b>{l s=' as a minimum quantity to buy this product.'}</p>
				{if $product->minimal_quantity > 1}<script type="text/javascript">checkMinimalQuantity();</script>{/if}
			{/if}
  <!-- trade input box -->
            
<div class="other_options bordercolor">
			{if $product->show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
				<div id="other_prices">
					{if $product->specificPrice AND $product->specificPrice.reduction}
{* old price *}
					<p id="old_price">
						{if $priceDisplay >= 0 && $priceDisplay <= 2}
							{if $productPriceWithoutRedution > $productPrice}
								<span id="old_price_display">{convertPrice price=$productPriceWithoutRedution}</span>
								{if $tax_enabled}{if $priceDisplay == 1}{l s='tax excl.'}{else}{l s='tax incl.'}{/if}{/if}
							{/if}
						{/if}
					</p>
					{/if}
{* reduction percent *}
					{if $product->specificPrice AND $product->specificPrice.reduction_type == 'percentage'}
					<p id="reduction_percent">{l s='(price reduced by'} <span id="reduction_percent_display">{$product->specificPrice.reduction*100}</span> %{l s=')'}</p>
					{/if}
{* pack price *}
					{if $packItems|@count}
					<p class="pack_price">{l s='instead of'} <span style="text-decoration: line-through;">{convertPrice price=$product->getNoPackPrice()}</span></p>
					{/if}
{* price ecotax *}
					{if $product->ecotax != 0}
					<p class="price-ecotax">{l s='include'} <span id="ecotax_price_display">{if $priceDisplay == 2}{$ecotax_tax_exc|convertAndFormatPrice}{else}{$ecotax_tax_inc|convertAndFormatPrice}{/if}</span> {l s='for green tax'}
						{if $product->specificPrice AND $product->specificPrice.reduction}<br />{l s='(not impacted by the discount)'}{/if}
					</p>
					{/if}
{* unit price *}
					{if !empty($product->unity) && $product->unit_price_ratio > 0.000000}
						{math equation="pprice / punit_price"  pprice=$productPrice  punit_price=$product->unit_price_ratio assign=unit_price}
						<p class="unit-price"><span id="unit_price_display" class="price">{convertPrice price=$unit_price}</span> {l s='per'} {$product->unity|escape:'htmlall':'UTF-8'}</p>
					{/if}
{* online only *}
					{if $product->online_only}<p class="online_only">{l s='Online only'}!</p>{/if}
{* number of item in stock *}
					<!--
					{if ($display_qties == 1 && !$PS_CATALOG_MODE && $product->available_for_order)}
					<p id="pQuantityAvailable"{if $product->quantity <= 0} style="display:none;"{/if}>
						<span id="quantityAvailable">{$product->quantity|intval}</span>
						<span {if $product->quantity > 1} style="display:none;"{/if} id="quantityAvailableTxt">{l s='item in stock'}</span>
						<span {if $product->quantity == 1} style="display:none;"{/if} id="quantityAvailableTxtMultiple">{l s='items in stock'}</span>
					</p>
					{/if}-->
					
{* last quantities *}
					<!--p id="last_quantities"{if ($product->quantity > $last_qties OR $product->quantity <= 0) OR $allow_oosp OR !$product->available_for_order OR $PS_CATALOG_MODE} style="display:none;"{/if} >{l s='Warning: Last items in stock!'}</p-->

<div id="p_bbox">
{* product shaftType *}
					<p id="product_reference" ><label for="product_reference" id="indent">{l s='Item No :'} </label><span class="editable">{$product->id}</span></p>
					<p id="product_reference" ><label for="product_reference" id="indent">{l s='Shaft Type :'} </label><span class="editable">{$product->location|escape:'htmlall':'UTF-8'}</span></p>

{* product reference *}
					<p id="product_reference" {if isset($groups) OR !$product->reference}style="display:none;"{/if}><label for="product_reference" id="indent">{l s='Club Model :'} </label><span class="editable">{$product->reference|escape:'htmlall':'UTF-8'}</span></p>
{* product condition *}
					<p id="product_reference" ><label for="product_reference" id="indent">{l s='Condition :'} </label>
					{if $product->condition=='refurbished'}
					<span class="hotspot" onmouseover="tooltip.show('Poor clubs, although playable, have one or a combination of heavy scratches, sky marks, or light dings. These clubs have been played, and give the appearance of use, but the integrity or playability of the club has not been compromised. Please check Clubtrader.com Condition Guide to know more detail.');" onmouseout="tooltip.hide();">Poor</span>
					{elseif $product->condition=='used'}
					<span class="hotspot" onmouseover="tooltip.show('(80% of the Clubs listed will fall under this category)Clubs in this category have been well cared for while being played and used under normal circumstances.These clubs are very playable; they may exhibit very scratching on the face, sole, or crown.None of these cosmetic alterations will affect the playability characteristics or integrity of this club. Please check Clubtrader.com Condition Guide to know more detail.');" onmouseout="tooltip.hide();">Avarage</span>
					{else}
					<span class="hotspot" onmouseover="tooltip.show('These clubs have been extremely well cared for and have seen very limited play.They exhibit exceptional cosmetic appearance with only slight signs of usage. Please check Clubtrader.com Condition Guide to know more detail.');" onmouseout="tooltip.hide();">Like New</span></p>
					{/if}
					{*$product->condition|escape:'htmlall':'UTF-8'*}
					
{* product condition *}
					<p id="product_reference" ><label for="product_reference" id="indent">{l s='Listing date :'} </label><span class="editable">{$selldate|escape:'htmlall':'UTF-8'}</span></p>


{* product condition *}
					<p id="product_reference" ><label for="product_reference" id="indent">{l s='Seller :'} </label><span class="editable"><a href="../../category.php?id_category=1&id_customer={$product->id_customer}">{$sellname|escape:'htmlall':'UTF-8'}  <span tyle="padding-left:3px;font-weight:bold;color:blue;">({$sellstate|escape:'htmlall':'UTF-8'})</span></a></p>


{* product condition *}
					<p id="product_reference" ><label for="product_reference" id="indent">{l s='Serial No :'} </label><span class="editable">{$product->supplier_reference}</span></p>

</div>



{* availability *}
					<p id="availability_statut"{if ($product->quantity <= 0 && !$product->available_later && $allow_oosp) OR ($product->quantity > 0 && !$product->available_now) OR !$product->available_for_order OR $PS_CATALOG_MODE} style="display:none;"{/if}>
						<span id="availability_label">{l s='Availability:'}</span>
						<span id="availability_value"{if $product->quantity <= 0} class="warning_inline"{/if}>
							{if $product->quantity <= 0}{if $allow_oosp}{$product->available_later}{else}{l s='This product is no longer in stock'}{/if}{else}{$product->available_now}{/if}
						</span>
					</p>
				</div>
				{*close if for show price*}
			{/if}
			<div id="attributes">
{* ON SALE *}
				{if $product->on_sale}<span class="on_sale">{l s='On sale!'}</span>{elseif $product->specificPrice AND $product->specificPrice.reduction AND $productPriceWithoutRedution > $productPrice}<span class="discount">{l s='Reduced price!'}</span>{/if}
				<div class="clearblock"></div>
{* attributes *}
				{if isset($groups)}
				{foreach from=$groups key=id_attribute_group item=group}
				{if $group.attributes|@count}
				<p>
					{assign var="groupName" value="group_$id_attribute_group"}
					<select name="{$groupName}" id="group_{$id_attribute_group|intval}" onchange="javascript:findCombination();{if $colors|@count > 0}$('#wrapResetImages').show('slow');{/if};">
						{foreach from=$group.attributes key=id_attribute item=group_attribute}
							<option value="{$id_attribute|intval}"{if (isset($smarty.get.$groupName) && $smarty.get.$groupName|intval == $id_attribute) || $group.default == $id_attribute} selected="selected"{/if} title="{$group_attribute|escape:'htmlall':'UTF-8'}">{$group_attribute|escape:'htmlall':'UTF-8'}</option>
						{/foreach}
					</select>
					<label for="group_{$id_attribute_group|intval}">{$group.name|escape:'htmlall':'UTF-8'}:</label>
				</p>
				{/if}
				{/foreach}
				{/if}
			</div>
				
<div class="clearblock"></div>
</div>
{* short descriptions *}
		{if $product->description_short}
		<div id="short_description_block" class="bordercolor">
			{if $product->description_short}
				<div id="short_description_content" class="rte align_justify">
                <p id="smalltxt">Seller's Comment :</p> <br />
				{$product->description_short|strip_tags}</div>
			{/if}
			<!--
			{if $product->description}
			<p class="buttons_bottom_block"><a href="javascript:{ldelim}{rdelim}" class="button">{l s='More details'}</a></p>
			{/if}-->
		</div>
		{/if}
{* product descriptions *}
		{if $product->description}
		<div id="short_description_block" class="bordercolor">
			{if $product->description}
				<div id="short_description_content" class="rte align_justify">
                <p id="smalltxt"> Features & Benefits</p> <br />
				{$product->description|strip_tags}</div>
			{/if}
			
		</div>
		{/if}

		
        {* Trade Button *}
        {if !($cookie->islogged())}
{if $product->trade|intval!=2}
{if $product->id_customer !=$cookie->id_customer}
<span style="margin-top: 10px;"><a href="{$link->getPageLink('authentication.php')}?back=product.php?id_product={$product->id}" class="button_mini">{l s='Enter Trade in'}</a></span>
<span class="hotspot" onmouseover="tooltip.show('If want to trade first log in then up listing your product.');" onmouseout="tooltip.hide();">What is this?</span>	
{/if}
{/if}
{/if}



        
{* pack content *}
		{if $packItems|@count > 0}
		<div class="pack_content bordercolor bgcolor">
			<h3>{l s='Pack content'}</h3>
			<ul>
			{foreach from=$packItems item=packItem}
				<li>
					{$packItem.pack_quantity} x <a href="{$link->getProductLink($packItem.id_product, $packItem.link_rewrite, $packItem.category)}">{$packItem.name|escape:'htmlall':'UTF-8'}</a>
					<p>{$packItem.description_short|truncate:100:'...'}</p>
				</li>
			{/foreach}
			</ul>
		</div>
		{/if}
        
{* Out of stock hook *}
		{if !$allow_oosp}
		<p id="oosHook"{if $product->quantity > 0} style="display: none;"{/if}>{$HOOK_PRODUCT_OOS}</p>
		{/if}
        
        
{* colors *}
		{if isset($colors) && $colors}
		<div id="color_picker" class="bgcolor bordercolor">
			<h3>{l s='Pick a color:' js=1}</h3>
			<ul id="color_to_pick_list">
			{foreach from=$colors key='id_attribute' item='color'}
				<li><a id="color_{$id_attribute|intval}" class="color_pick" style="background:{$color.value};" onclick="updateColorSelect({$id_attribute|intval});$('#wrapResetImages').show('slow');" title="{$color.name}">{if file_exists($col_img_dir|cat:$id_attribute|cat:'.jpg')}<img src="{$img_col_dir}{$id_attribute}.jpg" alt="{$color.name}" width="20" height="20" />{/if}</a></li>
			{/foreach}
			</ul>
		</div>
		{/if}
		{if isset($HOOK_PRODUCT_ACTIONS) && $HOOK_PRODUCT_ACTIONS}{$HOOK_PRODUCT_ACTIONS}{/if}
		<div class="clearblock"></div>
		</form>
		{/if}
		{if $HOOK_EXTRA_RIGHT}{$HOOK_EXTRA_RIGHT}{/if}
        
        
 {* My sell or trade Items *}       
        {if $cookie->isLogged()}
		{$HOOK_PRODUCT_FOOTER}
		{/if}

	</div>
</div>
{literal}
<link rel="stylesheet" type="text/css" href="/css/tooltip.css" />
<script type="text/javascript" language="javascript" src="/js/tooltip.js"></script>
{/literal}





<!--------------------------------------------->


			
{* quantity discount *}
	{if $quantity_discounts}
	<div id="quantityDiscount" class="bgcolor bordercolor">
		<h3>{l s='Quantity discount'}</h3>
		<table>
			<tr>
				{foreach from=$quantity_discounts item='quantity_discount' name='quantity_discounts'}
					<th class="bordercolor">{$quantity_discount.quantity|intval}
					{if $quantity_discount.quantity|intval > 1}
						{l s='quantities'}
					{else}
						{l s='quantity'}
					{/if}
					</th>
				{/foreach}
			</tr>
			<tr>
				{foreach from=$quantity_discounts item='quantity_discount' name='quantity_discounts'}
					<td>
					{if $quantity_discount.price != 0 OR $quantity_discount.reduction_type == 'amount'}
						-{convertPrice price=$quantity_discount.real_value|floatval}
					{else}
						-{$quantity_discount.real_value|floatval}%
					{/if}
					</td>
				{/foreach}
			</tr>
		</table>
	</div>
	{/if}
{* description and features *}
	{if $product->description || $features || $accessories || $HOOK_PRODUCT_TAB || $attachments}
	<div id="more_info_block" class="clear">
		<!--ul id="more_info_tabs" class="idTabs idTabsShort">
			{if $product->description}<li><a id="more_info_tab_more_info" href="#idTab1">{l s='More info'}</a></li>{/if}
			{if $features}<li><a id="more_info_tab_data_sheet" href="#idTab2">{l s='Data sheet'}</a></li>{/if}
			{if $attachments}<li><a id="more_info_tab_attachments" href="#idTab9">{l s='Download'}</a></li>{/if}
			{if isset($accessories) AND $accessories}<li><a href="#idTab4">{l s='Accessories'}</a></li>{/if}
			{$HOOK_PRODUCT_TAB}
		</ul-->
		<div id="more_info_sheets" class="bgcolor bordercolor">
		<!--
		{if $product->description}
{* full description *}
			<div id="idTab1"><div>{$product->description}</div></div>
		{/if}-->
		{if $features}
{* product's features *}
			<ul id="idTab2" class="bullet">
			{foreach from=$features item=feature}
				<li><span>{$feature.name|escape:'htmlall':'UTF-8'}</span> {$feature.value|escape:'htmlall':'UTF-8'}</li>
			{/foreach}
			</ul>
		{/if}
		{if $attachments}
{* product's attachments *}
			<ul id="idTab9" class="bullet">
			{foreach from=$attachments item=attachment}
				<li><a href="{$link->getPageLink('attachment.php', true)}?id_attachment={$attachment.id_attachment}">{$attachment.name|escape:'htmlall':'UTF-8'}</a><br />{$attachment.description|escape:'htmlall':'UTF-8'}</li>
			{/foreach}
			</ul>
		{/if}
		{if isset($accessories) AND $accessories}
{* accessories *}
			<ul id="idTab4">
				{foreach from=$accessories item=accessory name=accessories_list}
				{assign var='accessoryLink' value=$link->getProductLink($accessory.id_product, $accessory.link_rewrite, $accessory.category)}
				<li class="bordercolor ajax_block_product {if $smarty.foreach.accessories_list.first}first_item{elseif $smarty.foreach.accessories_list.last}last_item{else}item{/if} product_accessories_description">
					<div class="accessories_desc">
						<a class="accessory_image product_img_link bordercolor" href="{$accessoryLink|escape:'htmlall':'UTF-8'}" title="{$accessory.legend|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($accessory.link_rewrite, $accessory.id_image, 'medium')}" alt="{$accessory.legend|escape:'htmlall':'UTF-8'}" /></a>
						<h5><a class="product_link" href="{$accessoryLink|escape:'htmlall':'UTF-8'}">{$accessory.name|truncate:22:'...':true|escape:'htmlall':'UTF-8'}</a></h5>
						<a class="product_descr" href="{$accessoryLink|escape:'htmlall':'UTF-8'}" title="{l s='More'}">{$accessory.description_short|strip_tags|truncate:70:'...'}</a>
					</div>
					<div class="accessories_price">
						{if $accessory.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}<span class="price">{if $priceDisplay != 1}{displayWtPrice p=$accessory.price}{else}{displayWtPrice p=$accessory.price_tax_exc}{/if}</span>{/if}
						{if ($accessory.allow_oosp || $accessory.quantity > 0) AND $accessory.available_for_order AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
							<a class="exclusive button ajax_add_to_cart_button" href="{$link->getPageLink('cart.php')}?qty=1&amp;id_product={$accessory.id_product|intval}&amp;token={$static_token}&amp;add" rel="ajax_id_product_{$accessory.id_product|intval}" title="{l s='Add to cart'}">{l s='Add to cart'}</a>
						{else}
							<span class="exclusive">{l s='Add to cart'}</span>
						{/if}
					</div>
				</li>
				{/foreach}
			</ul>
		{/if}
		{$HOOK_PRODUCT_TAB_CONTENT}
		</div>
	</div>
	{/if}
{* customizable products *}
	{if $product->customizable}
		<ul class="idTabs">
			<li><a class="selected">{l s='Product customization'}</a></li>
		</ul>
		<div class="customization_block bgcolor bordercolor">
			<form method="post" action="{$customizationFormTarget}" enctype="multipart/form-data" id="customizationForm">
				<p>
					<img src="{$img_dir}icon/infos.png" alt="Informations" />
					{l s='After saving your customized product, remember to add it to your cart.'}
					{if $product->uploadable_files}<br />{l s='Allowed file formats are: GIF, JPG, PNG'}{/if}
				</p>
				{if $product->uploadable_files|intval}
				<h2>{l s='Pictures'}</h2>
				<ul id="uploadable_files">
					{counter start=0 assign='customizationField'}
					{foreach from=$customizationFields item='field' name='customizationFields'}
						{if $field.type == 0}
							<li class="customizationUploadLine{if $field.required} required{/if}">{assign var='key' value='pictures_'|cat:$product->id|cat:'_'|cat:$field.id_customization_field}
								{if isset($pictures.$key)}<div class="customizationUploadBrowse">
										<img src="{$pic_dir}{$pictures.$key}_small" alt="" />
										<a href="{$link->getProductDeletePictureLink($product, $field.id_customization_field)}" title="{l s='Delete'}" >
											<img src="{$img_dir}icon/delete.gif" alt="{l s='Delete'}" class="customization_delete_icon" width="11" height="11" />
										</a>
									</div>{/if}
								<div class="customizationUploadBrowse"><input type="file" name="file{$field.id_customization_field}" id="img{$customizationField}" class="customization_block_input {if isset($pictures.$key)}filled{/if}" />{if $field.required}<sup>*</sup>{/if}
								<div class="customizationUploadBrowseDescription">{if !empty($field.name)}{$field.name}{else}{l s='Please select an image file from your hard drive'}{/if}</div></div>
							</li>
							{counter}
						{/if}
					{/foreach}
				</ul>
				{/if}
				{if $product->text_fields|intval}
				<h2>{l s='Texts'}</h2>
				<ul id="text_fields">
					{counter start=0 assign='customizationField'}
					{foreach from=$customizationFields item='field' name='customizationFields'}
						{if $field.type == 1}
							<li class="customizationUploadLine{if $field.required} required{/if}">{assign var='key' value='textFields_'|cat:$product->id|cat:'_'|cat:$field.id_customization_field}
								{if !empty($field.name)}{$field.name}{/if}{if $field.required}<sup>*</sup>{/if}<textarea type="text" name="textField{$field.id_customization_field}" id="textField{$customizationField}" rows="1" cols="40" class="customization_block_input" />{if isset($textFields.$key)}{$textFields.$key|stripslashes}{/if}</textarea>
							</li>
							{counter}
						{/if}
					{/foreach}
				</ul>
				{/if}
				<p style="clear: left;" id="customizedDatas">
					<input type="hidden" name="quantityBackup" id="quantityBackup" value="" />
					<input type="hidden" name="submitCustomizedDatas" value="1" />
					<input type="button" class="button" value="{l s='Save'}" onclick="javascript:saveCustomization()" />
					<span id="ajax-loader" style="display:none"><img src="{$img_ps_dir}loader.gif" alt="loader" /></span>
				</p>
			</form>
			<p class="clear required"><sup>*</sup> {l s='required fields'}</p>
		</div>
	{/if}
{* pack items list *}
	{if $packItems|@count > 0}
		<div id="pack_product_list">
			<h2>{l s='Pack content'}</h2>
			{include file="$tpl_dir./product-list-pack.tpl" products=$packItems}
		</div>
	{/if}
{/if}
 <div class="other_options bordercolor">

{if $cookie->islogged() && $cookie->id_customer!=$product->id_customer}

<script type="text/javascript">
function send(frms){
if(frms.myitem.value=='')
{
	alert('Please input your item');
	frms.myitem.focus();
	return false;
}
else
frms.submit();
}
</script>
<!--------------------------------------------->

<form method="post" name="frms" action="../emailsend.php" enctype="multipart/form-data" id="customizationForm">
<div id="mailarea" class="p_bbox_wrap">
<table width="100%" style="margin-top:10px;">
<tr>
<td colspan="2">
Once your trade requst is sent.your offer will be reviewed by a ClubTrader trade specialist,and the member you wish to trade
with will be notified. ClubTrader will contact you within 48 hours with a trade confirmation.A message will be sent to your email.
</td>
</tr>
<tr>
  <td height="15" colspan="2"></td>
  <tr>
<td>
My Member ID
</td>
<td align="left">
<input type="text" readonly value="{$cookie->id_customer}" name="memberID" id="i_dimmed">
</td>
<tr>
<td>
My Email Address
</td>
<td align="left">
<input type="text" readonly value="{$cookie->email}" name="Email" id="i_dimmed">
</td>
</tr>
<tr>
<td width="200">
I Am Offering To Trade My Item #
</td>
<td align="left">
<input type="text" value="" name="myitem" style="margin-bottom:3px;">
</td>
</tr>
<tr>
<td>
I Want Item #
</td>
<td align="left">
<input type="text" value="{$product->id|intval}" name="youritem" id="i_dimmed">
</td>
</tr>

<tr>
<td>
Comments/Description
</td>
<td align="left">
<textarea   name="message" rows="4" cols="20" style="width:100%;"></textarea>
</td>
</tr>

<tr>
<td>
</td>
<td align="left"><input type="button" class="button" onClick="return send(this.form);" value="Send" style="margin-top:10px;">
</td>
</tr>
<tr>

</table>
</div>
</form>

{/if}
 </div>           
