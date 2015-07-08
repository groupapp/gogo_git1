{if isset($products)}
{literal}
<link rel="stylesheet" type="text/css" href="/css/tooltip.css" />
<script type="text/javascript" language="javascript" src="/js/tooltip.js"></script>
{/literal}


<div id="product_list_grid" class="bordercolor box ">
<ul>
	{foreach from=$products item=product name=products}
	<li class="ajax_block_product bordercolor" >
		<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="product_img_link" title="{$product.name|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home')}" alt="{$product.legend|escape:'htmlall':'UTF-8'}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} /></a>
		<h3><a class="product_link" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|truncate:30:'...'|escape:'htmlall':'UTF-8'}</a></h3>
		
		{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
			{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}<span class="price">Seller:{$product.firstname}&nbsp;&nbsp;&nbsp;&nbsp;{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price}{/if}</span>{/if}
		{/if}
		<span style="display:block;">Due Date:{$product.duedate}</span>
	
			{if $product.trade==1}
			<span class="hotspot"  onmouseout="tooltip.hide();"><img src="../../img/golfball_t.png" width="22" height="22"></span>
			{elseif $product.trade==2}
			<span class="hotspot" onmouseout="tooltip.hide();"><img src="../../img/golfball_s.png" width="22" height="22"></span>
			{else}
			<span class="hotspot"  onmouseout="tooltip.hide();"><img src="../../img/golfball_a.png" ></span>
			{/if}

			{if $product.condition=='used'}
			<!--<span class="hotspot" onmouseover="tooltip.show('Normal');" onmouseout="tooltip.hide();"><img src="../../img/flag_u.png" width="22" height="22"></span>-->
			{elseif $product.condition=='refurbished'}
			<span class="hotspot" onmouseover="tooltip.show('Pool');" onmouseout="tooltip.hide();"><img src="../../img/flag_r.png" width="22" height="22"></span>
			{else}
			<!--<span class="hotspot" onmouseover="tooltip.show('New');" onmouseout="tooltip.hide();"><img src="../../img/flag_n.png" width="22" height="22"></span>-->
			{/if}
			&nbsp;
			{if $product.quantity>0}
			<!--<span class="hotspot" onmouseover="tooltip.show('Available');" onmouseout="tooltip.hide();"><img src="/themes/theme318/img/icon/available.png"></span>-->
			{else}
			<!--<span class="hotspot" onmouseover="tooltip.show('Sold out');" onmouseout="tooltip.hide();"><img src="/themes/theme318/img/icon/unavailable.png"></span>-->
			{/if}
			
	</li>
	
	{/foreach}
</ul>
</div>

<div id="product_list_list" class="box visible">
<br /><div class="sx"></div><table class="std1" width="100%">
			<tr>
			<td width="60">
			Image
			</td>
			<td width="328">
			Title
			</td>
			
			<td width="125">
			Price
			</td>
			<td width="80">
			Seller
			</td>
			<td width="100">
			Listing Date
			</td>			<td width="65">

			Accept Trade

			</td>
			</tr>
	
</table>
<!--table class="std1" width="250">
			<tr>
			
			</tr>
</table-->

<ul class="bordercolor">
	{foreach from=$products item=product name=products}
	<li class="ajax_block_product bordercolor" style=" height: 60px;">
		<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="product_img_link" title="{$product.name|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'medium')}" alt="{$product.legend|escape:'htmlall':'UTF-8'}" {if isset($homeSize)} width="58" height="58"{/if} class="p_thumb_list"/></a>
		<div class="center_block">
			<!--div class="product_flags">
				{if isset($product.new) && $product.new == 1}<span class="new">{l s='New'}</span>{/if}
				{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}{if ($product.allow_oosp || $product.quantity > 0)}<span class="availability bordercolor">{l s='Available'}{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}<span class="bordercolor">{l s='Product available with different options'}</span>{else}<span class="bordercolor">{l s='Out of stock'}</span>{/if}</span>{/if}
				{if isset($product.online_only) && $product.online_only}<span class="online_only bordercolor">{l s='Online only!'}</span>{/if}
			</div-->
			<p style=" padding-bottom: 10px;padding-top:10px; "><a class="product_link" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|truncate:35:'...'|escape:'htmlall':'UTF-8'}({$product.dexterity})</a></p>
			<!--p class="product_desc"><a class="product_descr" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.description_short|truncate:360:'...'|strip_tags:'UTF-8'|escape:'htmlall':'UTF-8'}">{$product.description_short|truncate:80:'...'|strip_tags:'UTF-8'}</a></p-->

			
						
			
		</div>																				 
		<div class="right_block ">
			<div style="display:none;">
			{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}<span class="on_sale">{l s='On sale!'}</span>
			{elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}<span class="discount">{l s='Reduced price!'}</span>
			{/if}
			</div>
			
			<!--{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
				{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}<span class="price1">{if !$priceDisplay}Listing Price:{convertPrice price=$product.price}{else}Listing Price:{convertPrice price=$product.price_tax_exc}{/if}</span>{/if}
			{/if}-->
			
			<table class="std1" width="100%" >
			<tr>
			<td width="125">
			{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
				{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}<span class="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}Recomand Price:{convertPrice price=$product.price}{/if}</span>{/if}{/if}
			</td>			
			<td width="80">
			{$product.firstname}<br />
({$product.stname})
			</td>
			<td width="100">
			{$product.date_add}
			</td>
			<td width="65">
			
			{if $product.trade==1}
			<span class="hotspot" onmouseover="tooltip.show('Trade');" onmouseout="tooltip.hide();"><img src="../../img/golfball_t.png" width="22" height="22"></span>
			{elseif $product.trade==2}
			<span class="hotspot" onmouseover="tooltip.show('Sale');" onmouseout="tooltip.hide();"><img src="../../img/golfball_s.png" width="22" height="22"></span>
			{else}
			<span class="hotspot" onmouseout="tooltip.hide();"><img src="../../img/golfball_a.png" ></span>
			{/if}

			{if $product.condition=='used'}
			<!--<span class="hotspot" onmouseover="tooltip.show('Used');" onmouseout="tooltip.hide();"><img src="../../img/flag_u.png" width="22" height="22">-->
			{elseif $product.condition=='refurbished'}
			<span class="hotspot" onmouseover="tooltip.show('Pool');" onmouseout="tooltip.hide();"><img src="../../img/flag_r.png" width="22" height="22"></span>
			{else}
			<!--<span class="hotspot" onmouseover="tooltip.show('New');" onmouseout="tooltip.hide();"><img src="../../img/flag_n.png" width="22" height="22"></span>-->
			{/if}
			&nbsp;
			{if $product.quantity>0}
			<!--<span class="hotspot" onmouseover="tooltip.show('Available');" onmouseout="tooltip.hide();"><img src="/themes/theme318/img/icon/available.png"></span>-->
			{else}
			<!--<span class="hotspot" onmouseover="tooltip.show('Sold out');" onmouseout="tooltip.hide();"><img src="/themes/theme318/img/icon/unavailable.png"></span>-->
			{/if}
			

			</td>
			</tr>
			</table>

			<!--span>Seller:<b>{$product.firstname}</b></span></a>&nbsp;&nbsp;{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
				{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}<span class="price">{if !$priceDisplay}Listing Price:{convertPrice price=$product.wholesale_price}{else}Recomand Price:{convertPrice price=$product.wholesale_price}{/if}</span>{/if}{/if}

			<span>Listing Date:<b>{$product.date_add}</b></span>&nbsp;&nbsp;<span>Due date:<b>{$product.duedate}</b></span><br-->
			
			

			<div style="display:none;">
			{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
				{if ($product.allow_oosp || $product.quantity > 0)}
					<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart.php')}?add&amp;id_product={$product.id_product|intval}{if isset($static_token)}&amp;token={$static_token}{/if}" title="{l s='Add to cart'}">{l s='Add to cart'}</a>
				{else}
					<span class="exclusive">{l s='Add to cart'}</span>
				{/if}
			{/if}
			<a class="button" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{l s='View'}">{l s='View'}</a>
			{if isset($comparator_max_item) && $comparator_max_item}
				<p class="compare checkbox"><input type="checkbox" class="comparator" id="comparator_item_{$product.id_product}" value="comparator_item_{$product.id_product}" {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked{/if}/> <label for="comparator_item_{$product.id_product}">{l s='Select to compare'}</label></p>
			{/if}		
			</div>
		</div>
	</li>
	{/foreach}
</ul>
{if $comparator_max_item}
	<script type="text/javascript">
	// <![CDATA[
		var min_item = "{l s='Please select at least one product.' js=1}";
		var max_item = "{l s='You cannot add more than' js=1} {$comparator_max_item} {l s='product(s) in the product comparator' js=1}";
	//]]>
	</script>
	<!--form class="product_compare" method="get" action="{$link->getPageLink('products-comparison.php')}" onsubmit="true">
		<input type="submit" class="button" value="{l s='Compare'}" />
		<input type="hidden" name="compare_product_list" class="compare_product_list" value="" />
	</form-->
{/if}
</div>

{/if}