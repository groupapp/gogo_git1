<!-- #include file = "./Includes/DefaultSettings.asp" -->
<%
Call Check_SQL_Query()

Dim RS
Dim ListingsPerPage, ListingsPerLine, CurrentPage, RecordCount, MaxPages, MaxRecords
Dim HeaderTitle, TrailingQueryStr

ListingsPerPage = 24    ' Number of listings displayed per page
ListingsPerLine = 4     ' Number of listings displayed per line
CurrentPage = Request.QueryString("page")
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</style>


<body style="background-image: url('http://www.soccershopusa.com/Images/BG.jpg')">


<div align="center">

<title>++++ <%=WebsiteDomainName%> ++++ &nbsp; New Arrivals and New Products &nbsp;---&nbsp; Just In!</title>
<meta name="title" content="New Arrivals and New Products --- <%=WebsiteDomainName%>" />
<meta name="description" content="New soccer products are just in. You won't probably find these items anywhere else because they are new! New from the major brands." />
<meta name="keywords" content="soccer warmup, soccer warm-ups, soccer jackets, kids soccer, youth soccer, goal posts, goal nets, wistle, referee, hats, tights, soccer DVD, soccer books, soccer socks, soccer bags, medical items, official replica, jogging shoes, T shirts, soccer shoes, soccer footwear, soccer jersey, replica, soccer ball, soccer boots, shinguard, shin guard, soccer gear, soccer equipment, soccer cleats, goalkeeper gear, team uniform, soccer apparel" />
<link rel="shortcut icon" href="http://www.<%=WebsiteDomainName%>/soccershopusa.ico" type="image/x-icon" />
<meta name="robots" content="all" />
<meta name="distribution" content="Global" />
<meta name="resource-type" content="document" />
<meta name="revisit-after" content="5 days" />
<meta name="document-type" content="Public" />
<meta name="document-rating" content="Safe for Kids" />
<meta name="document-classification" content="general" />
<meta name="document-rights" content="<%=WebsiteDomainName%>" />
<meta name="copyright" content="Copyright © 2007~<%=Year(date)%> " />
<meta name="author" content="<%=WebsiteDomainName%>">
<meta http-equiv="reply-to" content="<%=WebsiteEmailAddress%>" />
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="refresh" content="1100">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="now">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<script language="JavaScript" type="text/JavaScript" src="./Includes/CommonFunctions.js" /></script>
<link href="./Includes/fonts.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table align="center" valign="top" border="0" cellpadding="0" cellspacing="0">
  <tr><td colspan="5"><!-- #include file = "./Includes/Menu_Top.asp" --></td></tr>
  <tr valign="top">
    <td width="10"></td>
    <td width="180"><!-- #include file = "./Includes/Menu_Left.asp" --></td>
    <td width="700" align="center">
      <table width="680" border="0" cellspacing="0" cellpadding="0" class="arial11" style="border:#c3c3c3 1px solid;">
      <%
        if CurrentPage="" then
           CurrentPage = 1
           SQL_Str = "SELECT * FROM Products WHERE IsActive='Y' AND"
           SQL_Str = SQL_Str & " ProductID IN (2743,2744,2746,2747,2749,2759)"
           SQL_Str = SQL_Str & " ORDER BY DateTimeCreated DESC, DateTimeLastModified DESC, Cat1ID ASC, BrandName ASC, ProductName ASC"
           HeaderTitle = "New Arrivals and New Products"
        else    ' On recursive calls, SQL query gets stored in session from PageNavBar subroutine below
           SQL_Str = Session("SQLQueryStr")
           HeaderTitle = Session("HeaderTitle")
        end if
        'TrailingQueryStr = "&Cat1ID=" & Cat1ID & "&Cat2ID=" & Cat2ID & "&Cat3ID=" & Cat3ID

        OpenDatabase DBC
        Set RS = Server.CreateObject("ADODB.RecordSet")
        RS.CursorLocation = 3
        RS.CacheSize = ListingsPerLine
        RS.Open SQL_Str,DBC,1,1%>
        <tr height="28" align="left" bgcolor="#000000" class="arial12_white"><td>&nbsp; <b><%=HeaderTitle%></b> &nbsp;----&nbsp; New for New Season</td></tr>
        <tr align="center">
          <td>
          <%
            if NOT (RS.BOF OR RS.EOF) then
               RS.MoveFirst
               RS.PageSize = ListingsPerPage
               MaxPages = CInt(RS.PageCount)
               MaxRecords = CInt(RS.PageSize)
               RS.AbsolutePage = CurrentPage
               RecordCount = 0
          %>   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="arial11">
                 <tr>
                   <td></td>
                   <td colspan="<%=ListingsPerLine-2%>"><%Call PageNavBar(SQL_Str, HeaderTitle, TrailingQueryStr)    '... See below%></td>
                   <td align="right">Page <%=CurrentPage%> of <%=MaxPages%> &nbsp; &nbsp;</td>
                 </tr>
          <%     While NOT(RS.EOF) AND RecordCount < MaxRecords
                       RecordCount = RecordCount + 1
                       if (RecordCount mod ListingsPerLine) = 1 then%><tr><%end if
                       Call ProductFormatRow      '... See below
                       if (RecordCount mod ListingsPerLine) = 0 then%></tr><tr height="5"><td colspan="10"></td></tr><%end if
                       RS.MoveNext
                 Wend
          %>   </table>
          <%   Call PageNavBar(SQL_Str, HeaderTitle, TrailingQueryStr)    '... See below
            end if
          %>
          </td>
        </tr>
      <%RS.Close
        Set RS = Nothing
        CloseDatabase DBC
      %>
      </table>
    </td>
    <td width="140"><!-- #include file = "./Includes/Menu_Right.asp" --></td>
    <td width="10"></td>
  </tr>
  <tr><td></td><td colspan="3"><!-- #include file = "./Includes/Menu_bottom.asp" --></td><td></td></tr>
</table>
<!-- Start eXTReMe Non Public Tracker Code V3/5 -->
<script type="text/javascript"><!--
EXref="";top.document.referrer?EXref=top.document.referrer:EXref=document.referrer;//-->
</script><script type="text/javascript"><!--
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;
navigator.javaEnabled()==1?EXjv="y":EXjv="n";
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
location.protocol=="https:"?EXprot="https":EXprot="http";
EXref?EXref=EXref:EXref=EXd.referrer;
EXd.write("<img src="+EXprot+"://nht-3.extreme-dm.com",
"/n4.g?login=ssusa&amp;url="+escape(document.URL)+"&amp;pv=&amp;",
"jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
"l="+escape(EXref)+" height=1 width=1>");//-->
</script><noscript><div id="nneXTReMe"><img height="1" width="1" alt=""
src="http://nht-3.extreme-dm.com/n4.g?login=ssusa&amp;url=nojs&amp;j=n&amp;jv=n&amp;pv=" />
</div></noscript>
<!-- End eXTReMe Non Public Tracker Code -->
</body>
</html>
<%

Sub ProductFormatRow%>
    <td align="center" valign="top"> <!-- #C55266, B5D0F9 //-->
      <table border="0" cellspacing="0" cellpadding="0" class="arial11">
        <tr>
          <td width="163" height="100" style="border:#d7d7d7 solid 1px;">
            <a href="http://<%=WWW_WebsiteDomainName%>/Display_Product_Detail.asp?ProductID=<%=RS("ProductID")%>&Cat1ID=<%=RS("Cat1ID")%>&Cat2ID=<%=RS("Cat2ID")%>&Cat3ID=<%=RS("Cat3ID")%>">
            <%if IsNull(RS("Picture1")) OR IsEmpty(RS("Picture1")) OR RS("Picture1")="" then%>
                 <img src="images/BG.jpg" border="0">
            <%else%>
                 <img src="<%=UploadedProductImageFolder%>/<%=RS("Picture1")%>" height="100" border="0">
            <%end if%>
            </a>
          </td>
        </tr>
        <tr height="2"><td></td></tr>
        <tr height="56">
          <td bgcolor="#dde7f6">

            <%if NOT(IsNull(RS("BrandName")) OR IsEmpty(RS("BrandName")) OR RS("BrandName")="") then%><%=RS("BrandName")%><br><%end if%>
            <%if Len(RS("ProductName")) > 30 then%><%=Mid(RS("ProductName"),1,28) & ""%><%else%><%=RS("ProductName")%><%end if%>

            <br>
            Item #: <%=RS("StyleNo")%><br>
            <%if NOT(IsNull(RS("UnitPriceOnSale")) OR IsEmpty(RS("UnitPriceOnSale"))) then%>
                 <%=FormatCurrency(RS("UnitPriceOnSale"),2)%>&nbsp;(<s><%=FormatCurrency(RS("UnitPrice"),2)%></s>)
            <%else%>
                 <%=FormatCurrency(RS("UnitPrice"))%>
            <%end if%>
            <%if (DateDiff("n",RS("DateTimeCreated"),Now()) < (1440*14)) OR (DateDiff("n",RS("DateTimeLastModified"),Now()) < (1440*14)) then  'New if updated date/time is less than 14 days%>
                 <img src="../images/new1.gif" border="0" align="middle">
            <%end if%>
          </td>
        </tr>
      </table>
    </td><%
End Sub

Sub PageNavBar(SQL,PageHeader,TrailingQueryStr)
    Dim ScriptName, CounterStart, CounterEnd, Counter, pad, ref
    Session("SQLQueryStr") = SQL
    Session("HeaderTitle") = PageHeader
    pad = ""
    ScriptName = Request.ServerVariables("script_name")
    Response.Write "<table width='99%' height='30' border='0' class='arial12'>"
    Response.Write "<tr><td align='center'>"
    if (CurrentPage mod 10) = 0 then
       CounterStart = CurrentPage - 9
    else
       CounterStart = CurrentPage - (CurrentPage mod 10) + 1
    end if
    CounterEnd = CounterStart + 9
    if CounterEnd > MaxPages then CounterEnd = MaxPages
    if CounterStart <> 1 then
       ref = "<a href='" & ScriptName
       ref = ref & "?page=" & 1 & TrailingQueryStr
       ref = ref & "'>First</a>&nbsp;:&nbsp;"
       Response.Write ref
       ref = "<a href='" & ScriptName
       ref = ref & "?page=" & (CounterStart - 1) & TrailingQueryStr
       ref = ref & "'>Previous 10</a>&nbsp;"
       Response.Write ref
    end if
    Response.Write "[ "
    for Counter = CounterStart to CounterEnd
        if Counter >= 10 then pad="" end if
        if CStr(Counter) <> CurrentPage then
           ref = "<a href='" & ScriptName
           ref = ref & "?page=" & Counter & TrailingQueryStr
           ref = ref & "'>" & pad & Counter & "</a>"
        else
           ref = "<b>" & pad & Counter & "</b>"
        end if
        Response.Write ref
        if Counter <> CounterEnd then Response.Write " " end if
    next
    Response.Write " ]"
    if CounterEnd <> MaxPages then
       ref = "&nbsp;<a href='" & ScriptName
       ref = ref & "?page=" & (CounterEnd + 1) & TrailingQueryStr
       ref = ref & "'>Next 10</a>"
       Response.Write ref
       ref = "&nbsp;:&nbsp;<a href='" & ScriptName
       ref = ref & "?page=" & MaxPages & TrailingQueryStr
       ref = ref & "'>Last</a>"
       Response.Write ref
    end if
    Response.Write "</td></tr>"
    Response.Write "</table>"
End Sub
%>