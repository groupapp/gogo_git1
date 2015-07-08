<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypal_form" class="hidden">
			<input type="hidden" name="upload" value="1">
			<input type="hidden" name="bn" value="MiniCart_AddToCart_WPS_US">
			<input type="hidden" name="upload" value="1" />
			<input type="hidden" name="address_override" value="0" />
			<input type="hidden" name="first_name" value="don" />
			<input type="hidden" name="last_name" value="kim" />
			<input type="hidden" name="address1" value="2792 olympic blve" />
			<input type="hidden" name="address2" value="" />
			<input type="hidden" name="city" value="los angeles" />
			<input type="hidden" name="zip" value="90061" />
			<input type="hidden" name="country" value="US" />
			<input type="hidden" name="state" value="CA" />
			<input type="hidden" name="amount" value="0.06" />
			<input type="hidden" name="amount_1" value="0.01" />
			<input type="hidden" name="item_name_1" value="test" />
			<input type="hidden" name="quantity_1" value="1" />
			<input type="hidden" name="amount_2" value="0.01" />
			<input type="hidden" name="item_name_2" value="test1" />
			<input type="hidden" name="quantity_2" value="1" />
			<input type="hidden" name="email" value="ttung33@hotmail.com" />
			<!--
			'for each leftMenu in left_menu
			<input type="hidden" name="item_name_<%=k%>" value="{$product.name|escape:'htmlall':'UTF-8'}" />
			'<input type="hidden" name="amount_<%=k%>" value="{$product.price_wt}" />
			<input type="hidden" name="quantity_<%=k%>" value="{$product.cart_quantity}" />
			'k=k+1
			'next
			-->
			<input type="hidden" name="shipping_1" value="0.02" />
			<input type="hidden" name="receiver_email" value="Kurve@KurveShop.com" />
			<input type="hidden" name="cmd" value="_cart" />
			<input type="hidden" name="charset" value="utf-8" />
			<input type="hidden" name="payer_id" value="23" />
			<input type="hidden" name="payer_email" value="ttung33@hotmail.com" />
			<input type="hidden" name="custom" value="23" />
			<input type="hidden" name="return" value="" />
			<input type="hidden" name="cancel_return" value="" />
			<input type="hidden" name="notify_url" value="" />
			<input type="hidden" name="cpp_header_image" value="" />
			<input type="hidden" name="rm" value="2" />
			<input type="hidden" name="bn_1" value="JavaScriptButton_cart" />
			<input type="hidden" name="cbt" value="" /><!--{$return_text}-->
			<input type="hidden" name="image_url" value="img/logo.jpg" />
			<input type="hidden" name="href_1" value="http://www.kurveshop.com/pr.asp">
			<input type="hidden" name="offset_1" value="0">
			<input type="hidden" name="business" value="Kurve@KurveShop.com">
			<input type="submit" value="Checkout">
			
		</form>
		