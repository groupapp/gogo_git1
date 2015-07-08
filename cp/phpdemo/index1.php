<?php 
	// Connect to your Database 
	
	$cUserIDNO=$_COOKIE["adminID"];
if (empty($cUserIDNO))
{
echo "<script>
window.location='/kadmin/login.php';
</script>";
}

	mysql_connect("localhost", "root", "kshlyh0409") or die(mysql_error()); 
	mysql_select_db("eworldbaby") or die(mysql_error()); 
	
	//include('function.php');

	
	$response = mysql_query("SELECT a.id as record_id, a.parentid, a.cFistName,a.cLastName, a.cCellNumb, a.cUserIDNO,a.itemtype,a.n1levelCnt,a.n2levelCnt,a.n3levelCnt, b.nOne,b.nTwo,b.nThree,b.nFour,b.nFive,b.nSix,b.nSeven,(b.nOne+b.nTwo+b.nThree+b.nFour+b.nFive+b.nSix+b.nSeven) AS nTotal FROM acc_user a LEFT JOIN acc_sumpool7 b ON a.cUser_Num=b.cUser_Num Order by a.id") or die(mysql_error());
	
//print_r($response);
//exit;
	// create some class for your records
	class Account
	{
		public $id = 0;
		public $parent = null;
		public $itemType = 0;
		public $title = '';
		public $description = '';
		public $phone = '';
		public $email = '';
		public $photo = '';
		
		/*
		public function load($record) {
			$this->id = $record['record_id'];
			$this->parent = $record['parentid'];
			//$this->itemType = intval($record['itemtype']);
			$this->title = $record['title'];
			$this->description = $record['description'];
			//$this->phone = $record['phone'];
			//$this->email = $record['email'];
			$this->image = "demo/images/photos/" ;
			$this->href = "showdetails.php?recordid=" . $this->id;
		}*/
		
		public function load($record) {
			$this->id = $record['record_id'];
			$this->parent = $record['parentid'];
			$this->itemType = intval($record['itemtype']);
			$this->title = $record['cFistName'].' '.$record['cLastName'];
			$this->description = '('.$record['n1levelCnt'].') '.'('.$record['n2levelCnt'].')';
			$this->phone = $record['cCellNumb'];
			$this->email = $record['cUserIDNO'];
			
			if ($record['n1levelCnt']>0)
			$this->image = "/phpdemo/demo/images/photos/grey.png";
			else if ($record['n2levelCnt']>0)
			$this->image = "/phpdemo/demo/images/photos/yellow.png";
			else if ($record['n3levelCnt']>0)
			$this->image = "/phpdemo/demo/images/photos/green.png";
			
			
			/*if ($record['c2ndValue']=='green')
			$this->image1 = "/phpdemo/demo/images/photos/green.png";
			else if ($record['c1stValue']=='red')
			$this->image1 = "/phpdemo/demo/images/photos/red.png";
			else if ($record['c1stValue']=='yellow')
			$this->image1 = "/phpdemo/demo/images/photos/yellow.png";
			else 
			$this->image1 = "/phpdemo/demo/images/photos/grey.png";
			*/

			$this->href = "showdetails.php?recordid=" . $this->id;
		} 
	}
	
	// create hash and group all children by parentid
	$items = Array();
	while($record = mysql_fetch_array( $response )) 
	{ 
		$account = new Account();
		$account->load($record);
		
		array_push($items, $account);
	} 

	function encodeURIComponent($str) {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
    }

	// serialize $rootAccount object including all its children into JSON string  
	$jsonstring = encodeURIComponent(json_encode($items));

	//print_r($jsonstring);
?>
<!DOCTYPE html> 
<html>
<head>
	<title>BigTMS  Genealogy</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




	<link rel="stylesheet" href="demo/js/jquery/ui-lightness/jquery-ui-1.10.2.custom.css" />
	<script type="text/javascript" src="demo/js/jquery/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="demo/js/jquery/jquery-ui-1.10.2.custom.js"></script>

	

	<!-- jQuery UI Layout -->
	<script type="text/javascript" src="demo/jquerylayout/jquery.layout-latest.min.js"></script>
	<link rel="stylesheet" type="text/css" href="demo/jquerylayout/layout-default-latest.css" />
	
	

	<script type="text/javascript">
		jQuery(document).ready(function () {

			
			//jQuery('#ajax').colorbox({rel:'ajax'});
			jQuery('body').layout(
			{
				center__paneSelector: "#contentpanel"
				, north__paneSelector: "#northpanel"
				, north__resizable: true
				, north__closable: false
				, north__spacing_open: 0
				, north__size: 100
			});
			
			
		});
	</script>

<!------------------------------------------------------------------------------------------------------------->	
	<link href="demo/codemirror/codemirror.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="demo/codemirror/codemirror.js"></script>
    <script type="text/javascript" src="demo/codemirror/javascript.js"></script>
    <script type="text/javascript" src="demo/js/json3.min.js"></script>


<!-- # include file="orgeditor/src.bporgeditor.html"-->
<!------------------------------------------------------------------------------------------------------------->

	<!-- header -->
	<link href="demo/css/primitives.latest.css?207" media="screen" rel="stylesheet" type="text/css" />
	<link href="demo/css/bporgeditor.latest.css?207" media="screen" rel="stylesheet" type="text/css" />

	<script  type="text/javascript" src="demo/js/primitives.min.js?207"></script>
	<script type="text/javascript" src="demo/js/bporgeditor.min.js?207"></script>
	






	<script type="text/javascript">
		/* insert serialized JSON string here */
		<?php Print("var data=\"" . $jsonstring . "\";"); ?>		 
	</script>

	

	<script type="text/javascript">
		var orgDiagram = null;
		var bpOrgEditor = null;
		jQuery(document).ready(function () {
			jQuery.ajaxSetup({
				cache: false
			});
			jQuery('#contentpanel').layout(
			{
				center__paneSelector: "#centerpanel"
				, south__paneSelector: "#southpanel"
				, south__resizable: true
				, south__closable: true
				, south__spacing_open: 0
				, south__size: 50
				, west__size: 200
				, west__paneSelector: "#westpanel"
				, west__resizable: true
				, center__onresize: function () {
					if (orgDiagram != null) {
						jQuery("#centerpanel").orgDiagram("update", primitives.common.UpdateMode.Refresh);
					}
					if (bpOrgEditor != null) {
				        jQuery("#centerpanel").bpOrgEditor("update", primitives.common.UpdateMode.Refresh);
				    }

				}
			});

			/* Page Fit Mode */
            var pageFitModes = jQuery("#pageFitMode");
            for (var key in primitives.common.PageFitMode) {
                var value = primitives.common.PageFitMode[key];
                pageFitModes.append(jQuery("<br/><label><input name='pageFitMode' type='radio' value='" + value + "' " + (value == primitives.common.PageFitMode.FitToPage ? "checked" : "") + " />" + key + "</label>"));
            };

            jQuery("input:radio[name=pageFitMode]").change(function () {
                Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
            });

            /* Orientation Type */
            var orientationTypes = jQuery("#orientationType");
            for (var key in primitives.common.OrientationType) {
                var value = primitives.common.OrientationType[key];
                orientationTypes.append(jQuery("<br/><label><input name='orientationType' type='radio' value='" + value + "' " + (value == primitives.common.OrientationType.Top ? "checked" : "") + " />" + key + "</label>"));
            };

            jQuery("input:radio[name=orientationType]").change(function () {
                Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
            });

			/* Horizontal Alignmnet */
            var horizontalAlignments = jQuery("#horizontalAlignment");
            for (var key in primitives.common.HorizontalAlignmentType) {
                var value = primitives.common.HorizontalAlignmentType[key];
                horizontalAlignments.append(jQuery("<br/><label><input name='horizontalAlignment' type='radio' value='" + value + "' " + (value == primitives.common.HorizontalAlignmentType.Center ? "checked" : "") + " />" + key + "</label>"));
            };

            jQuery("input:radio[name=horizontalAlignment]").change(function () {
                Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
            });

			 // color
            var color = jQuery("<select></select>");
            jQuery("#color").append(color);
            for (var key in primitives.common.Colors) {
                var value = primitives.common.Colors[key];
                color.append(jQuery("<option value='" + value + "' " + (value == primitives.common.Colors.Silver ? "selected" : "") + " >" + key + "</option>"));
            };

            jQuery("#color").change(function () {
                Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Refresh);
            });

            // minimizedItemCornerRadiuses
            var minimizedItemCornerRadiuses = ["NULL", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            var minimizedItemCornerRadius = jQuery("<select></select>");
            jQuery("#minimizedItemCornerRadius").append(minimizedItemCornerRadius);
            for (var index = 0; index < minimizedItemCornerRadiuses.length; index += 1) {
                var value = minimizedItemCornerRadiuses[index];
                minimizedItemCornerRadius.append(jQuery("<option value='" + (value == "NULL" ? -1 : value) + "' " + (value == "NULL" ? "selected" : "") + " >" + value + "</option>"));
            };

            jQuery("#minimizedItemCornerRadius").change(function () {
                Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Redraw);
            });

            // minimizedItemSize
            var minimizedItemSizes = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 14, 16, 18, 20, 30, 40];
            var minimizedItemSize = jQuery("<select></select>");
            jQuery("#minimizedItemSize").append(minimizedItemSize);
            for (var index = 0; index < minimizedItemSizes.length; index += 1) {
                var value = minimizedItemSizes[index];
                minimizedItemSize.append(jQuery("<option value='" + value + "' " + (value == 4 ? "selected" : "") + " >" + value + "</option>"));
            };

            jQuery("#minimizedItemSize").change(function () {
                Update(jQuery("#centerpanel"), primitives.common.UpdateMode.Redraw);
            });
			
			/* Edit Mode */
			var editModes = jQuery("#editMode");
            editModes.append(jQuery('<br/><div id="radioEditMode"><input type="radio" id="radioEdit" name="editMode" value="1" checked="checked"><label for="radioEdit">Edit</label><input type="radio" id="radioView" name="editMode" value="0"><label for="radioView">View</label></div>'));

            jQuery("#radioEditMode").buttonset();
            jQuery("input:radio[name=editMode]").change(function () {
                Update();
            });


			var templates = [];
			templates.push(getContactTemplate());

			var buttons = [];
            //buttons.push(new primitives.orgdiagram.ButtonConfig("delete", "ui-icon-close", "Delete"));
            buttons.push(new primitives.orgdiagram.ButtonConfig("properties", "ui-icon-gear", "Edit"));
           // buttons.push(new primitives.orgdiagram.ButtonConfig("add", "ui-icon-person", "Add"));

			var items = JSON.parse(decodeURIComponent(data));
			items[0].templateName = "contactTemplate";
		
			
			//-------------------------------------------------------------------------------------------
			
			
			var orgEditorConfig = new primitives.orgeditor.Config();
            orgEditorConfig.editMode = true;
            orgEditorConfig.items = items;
			//orgEditorConfig.cursorItem = 1;
            orgEditorConfig.onSave = function () {
                var config = jQuery("#centerpanel").bpOrgEditor("option");
                
            };
			
          //  bpOrgEditor = jQuery("#centerpanel").bpOrgEditor(orgEditorConfig);
//-----------------------------------------------------------------------------------------------------------


			orgDiagram = jQuery("#centerpanel").orgDiagram({
				items: items,
				cursorItem: 1,
				graphicsType: primitives.common.GraphicsType.SVG,
				pageFitMode:primitives.common.PageFitMode.FitToPage,//0:none
				orientationType:0,//2
				horizontalAlignment:0,//1
				verticalAlignment: primitives.common.VerticalAlignmentType.Middle,
				//editMode:1,
				connectorType: 0,//primitives.common.ConnectorType.Angular,
				minimalVisibility: primitives.common.Visibility.Dot,
				selectionPathMode: primitives.common.SelectionPathMode.FullStack,
				leavesPlacementType: primitives.common.ChildrenPlacementType.Horizontal,
				hasButtons: 0,//primitives.common.Enabled.False,
				hasSelectorCheckbox: primitives.common.Enabled.False,
				templates: templates,
				buttons: buttons,	
				onButtonClick: onButtonClick,
				onCursorChanging: onCursorChanging,
				onCursorChanged: onCursorChanged,
				onHighlightChanging: onHighlightChanging,
				onHighlightChanged: onHighlightChanged,
				onSelectionChanged: onSelectionChanged,
				onItemRender: onTemplateRender,
				normalItemsInterval:40,
				itemTitleFirstFontColor: primitives.common.Colors.White,
				itemTitleSecondFontColor: primitives.common.Colors.White
			});

		});
		
		/*function Setup(selector) {
            orgDiagram = orgDiagram.orgDiagram(GetOrgDiagramConfig());

           // ShowGraphicsType(selector.orgDiagram("option", "actualGraphicsType"));
        }*/

        function Update(selector, updateMode) {
			if (bpOrgEditor != null) {
                bpOrgEditor.bpOrgEditor("option", GetOrgDiagramConfig());
                bpOrgEditor.bpOrgEditor("update");
            }
			
			if (orgDiagram != null) {
            orgDiagram.orgDiagram("option", GetOrgDiagramConfig());
			 orgDiagram.orgDiagram("update");
			}
            //selector.orgDiagram("update", updateMode);

            //ShowGraphicsType(selector.orgDiagram("option", "actualGraphicsType"));
        }


		 function GetOrgDiagramConfig() {
            var pageFitMode = parseInt(jQuery("input:radio[name=pageFitMode]:checked").val(), 10);
            var orientationType = parseInt(jQuery("input:radio[name=orientationType]:checked").val(), 10);
            var horizontalAlignment = parseInt(jQuery("input:radio[name=horizontalAlignment]:checked").val(), 10);
            var color = jQuery("#color option:selected").val();
			 
			var templates = [getContactTemplate()];

//=============================================
			 var editMode = parseInt(jQuery("input:radio[name=editMode]:checked").val(), 10);

			
//===================================================================
            return {
				
                pageFitMode: pageFitMode,
                orientationType: orientationType,
				horizontalAlignment: horizontalAlignment,
				//minimizedItemSize:minimizedItemSize,
				editMode: (editMode == 1),
                defaultTemplateName: "defaultTemplate"
            };
        }

		function getContactTemplate() {
			var result = new primitives.orgdiagram.TemplateConfig();
			var minimizedItemSize = parseInt(jQuery("#minimizedItemSize option:selected").val(), 10);
			result.name = "contactTemplate";


			result.itemSize = new primitives.common.Size(220, 120);
			result.minimizedItemSize = new primitives.common.Size(3, 3);
			result.highlightPadding = new primitives.common.Thickness(2, 2, 2, 2);


			var itemTemplate = jQuery(
			  '<div class="bp-item bp-corner-all bt-item-frame">'
				+ '<div class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 216px; height: 20px;">'
					+ '<div name="title" class="bp-item bp-title" style="top: 3px; left: 6px; width: 208px; height: 18px;">'
					+ '</div>'
				+ '</div>'
				+ '<div class="bp-item bp-photo-frame" style="top: 26px; left: 2px; width: 25px; height: 25px;">'
					+ '<img name="photo" style="height:25px; width:25px;" />'
				+ '</div>'
				+ '<div class="bp-item bp-photo-frame" style="top: 26px; left: 27px; width: 25px; height: 25px;">'
					+ '<img name="photo1" style="height:25px; width:25px;" />'
				+ '</div>'
				+ '<div name="phone" class="bp-item" style="top: 26px; left: 56px; width: 162px; height: 18px; font-size: 12px;"></div>'
				+ '<div name="email" class="bp-item" style="top: 44px; left: 56px; width: 162px; height: 18px; font-size: 12px;"></div>'
				+ '<div name="description" class="bp-item" style="top: 62px; left: 56px; width: 162px; height: 36px; font-size: 10px;"></div>'
				//+ '<a name="readmore" class="bp-item" style="top: 104px; left: 4px; width: 212px; height: 12px; font-size: 10px; font-family: Arial; text-align: right; font-weight: bold; text-decoration: none; z-index:100;">More Detail</a>'
				//+ '<button onclick="myFunction()" style="top: 104px; left: 4px; width: 212px; height: 12px; position: absolute;font-size: 10px; font-family: Arial; text-align: right; font-weight: bold; text-decoration: none; z-index:100;">Try it</button>'
			+ '</div>'
			).css({
				width:  result.itemSize.width + "px",
				height: result.itemSize.height + "px"
			}).addClass("bp-item bp-corner-all bt-item-frame");
			result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

			return result;
		}

		function onTemplateRender(event, data) {
			var hrefElement = data.element.find("[name=readmore]");
			switch (data.renderingMode) {
				case primitives.common.RenderingMode.Create:
					/* Initialize widgets here */
					hrefElement.click(function (e)
					{
						/* Block mouse click propogation in order to avoid layout updates before server postback*/
						primitives.common.stopPropagation(e);
					});
					break;
				case primitives.common.RenderingMode.Update:
					/* Update widgets here */
					break;
			}

			var itemConfig = data.context;

			if (data.templateName == "contactTemplate") {
				data.element.find("[name=photo]").attr({ "src": itemConfig.image });
				data.element.find("[name=photo1]").attr({ "src": itemConfig.image1 });

				var fields = ["title", "description", "phone", "email"];
				for (var index = 0; index < fields.length; index += 1) {
					var field = fields[index];

					var element = data.element.find("[name=" + field + "]");
					if (element.text() != itemConfig[field]) {
						element.text(itemConfig[field]);
					}
				}
			}
			hrefElement.attr({ "href": itemConfig.href });
		}

		function onSelectionChanged(e, data) {
			var selectedItems = jQuery("#centerpanel").orgDiagram("option", "selectedItems");
			var message = "";
			for (var index = 0; index < selectedItems.length; index += 1) {
				var itemConfig = selectedItems[index];
				if (message != "") {
					message += ", ";
				}
				message += "<b>'" + itemConfig.title + "'</b>";
			}
			message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");
			jQuery("#southpanel").empty().append("User selected next items: " + message);
		}

		function onHighlightChanging(e, data) {
			var message = (data.context != null) ? "User is hovering mouse over item <b>'" + data.context.title + "'</b>." : "";
			message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");

			jQuery("#southpanel").empty().append(message);
		}

		function onHighlightChanged(e, data) {
			var message = (data.context != null) ? "User hovers mouse over item <b>'" + data.context.title + "'</b>." : "";
			message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");

			jQuery("#southpanel").empty().append(message);
		}

		function onCursorChanging(e, data) {
			var message = "User is clicking on item '" + data.context.title + "'.";
			message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");

			jQuery("#southpanel").empty().append(message);

			data.oldContext.templateName = null;
			data.context.templateName = "contactTemplate";
		}

		function onCursorChanged(e, data) {
			var message = "User clicked on item '" + data.context.title + "'.";
			message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");
			jQuery("#southpanel").empty().append(message);
		}

		function onButtonClick(e, data) {
			

			
			
			//var message = "User clicked <b>'" + data.name + "'</b> button for item <b>'" + data.context.title + "'</b>.";
			//message += (data.parentItem != null ? " Parent item <b>'" + data.parentItem.title + "'" : "");
			//jQuery("#southpanel").empty().append(message);
			

			window.open(data.context.href, "_blank", "toolbar=no, titlebar=0,status=no,location=0,scrollbars=no, resizable=no, top=500, left=500, width=400, height=400").focus();
		}

	</script>
</head>
<body style="font-size:12px">
	<div id="contentpanel" style="padding: 0px;">
		<div id="westpanel" style="padding: 5px; margin: 0px; border-style: solid; font-size: 12px; border-color: grey; border-width: 1px; overflow: scroll;">
			<h2>BigTMS Genealogy</h2>
		<p id="back"><a href="/kadmin/index.php">Back</a></p>
		<p id="pageFitMode">Page Fit Mode</p>
		<p id="orientationType">Orientation</p>
		 <p id="horizontalAlignment">Items Horizontal Alignment</p>
		 <!--<p id="minimizedItemSize">Size:&nbsp;</p>-->
		 
		</div>
		<div id="centerpanel" style="overflow: hidden; padding: 0px; margin: 0px; border: 0px;">
		</div>
		<div id="southpanel">
		</div>
	</div>
	<!--<div id="northpanel" style="padding: 0px; margin: 0px;">
		<h2>BigTMS Genealogy</h2>
		<p id="pageFitMode">Page Fit Mode</p>
		<p id="orientationType">Orientation</p>
	</div>-->
</body>
</html>