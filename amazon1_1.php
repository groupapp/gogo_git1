<div id="cbaButton"></div>
<script>
  new CBA.Widgets.StandardCheckoutWidget({
    merchantId: "A21NYBZ973TA6V",
    orderInput: {format: "XML",
                value: "type:merchant-signed-order/awsaccess-key/1;
                order:PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0nVVRGL
                TgnPz48T3JkZXIgeG1sbnM9J2h0dHA6Ly9wYXltZW50cy5hbWF6Checkout by Amazon | StandardCheckoutWidget | 19
                b24uY29tL2NoZWNrb3V0LzIwMDgtMTEtMzAvJz48Q2FydD48SXR
                lbXM+PEl0ZW0+PFNLVT5BQkMxMjM8L1NLVT48TWVyY2hhbnRJZD
                5BMUVKTjJKSUcxMEs2NzwvTWVyY2hhbnRJZD48VGl0bGU+UmVkI
                EZpc2g8L1RpdGxlPjxQcmljZT48QW1vdW50PjE5Ljk5PC9BbW91
                bnQ+PEN1cnJlbmN5Q29kZT5VU0Q8L0N1cnJlbmN5Q29kZT48L1B
                yaWNlPjxRdWFudGl0eT4xPC9RdWFudGl0eT48RnVsZmlsbG1lbn
                ROZXR3b3JrPk1FUkNIQU5UPC9GdWxmaWxsbWVudE5ldHdvcms+P
                C9JdGVtPjwvSXRlbXM+PC9DYXJ0PjwvT3JkZXI+;
                signature:0nppbXTktfoV80Kh41GK7ruUhq8=; 
                aws-access-keyid:19G7E7X2QE2V45LETX2E"}
    }).render("cbaButton"); 
</script>
Below is another simple use of the widget with an HTML cart. Notice how the ID of the form element is used inside
the orderInput parameter. The button will be x-large, tan, with a dark background.
<!-- Form fields that describe Cart -->
<form id="CBACartFormId">
  <input name="item_merchant_id_1" value="AEIOU1234AEIOU" type="hidden" />
  <input name="item_sku_1" value="ABC123" type="hidden" />
  <input name="item_title_1" value="Red Fish" type="hidden" />
  <input name="item_price_1" value="19.99"type="hidden" />
  <input name="item_quantity_1" value="1" type="hidden" />
  <input name="currency_code" value="USD" type="hidden" />
  <input name="merchant_signature"
 value="uwEbMKOFh+mD7PN/AFe9iRsbi/qh9YSv9SoW1OK7" type="hidden" />
  <input name="aws_access_key_id" value="AKIAJZYBF66UQTBRHNVQ" type="hidden" /
>
</form>
<div id="cbaButton"></div>
<script>
  new CBA.Widgets.StandardCheckoutWidget({
    merchantId: "A21NYBZ973TA6V",
    buttonSettings: {size:'x-large',color:'tan',background:'dark'},
    orderInput: {format: "HTML",
                 value: "CBACartFormId"}
    }).render("cbaButton"); 
</script>
Below is an advanced exampl