<?php 
	// Connect to your Database 
	
	mysql_connect("localhost", "root", "kshlyh0409") or die(mysql_error()); 
	mysql_select_db("eworldbaby") or die(mysql_error()); 

	$response = mysql_query("SELECT id as record_id, parentid, cFistName, nDirectCT,nEntireCT,cLastName, cCellNumb, cUserIDNO,itemtype,c1stValue,c2ndValue FROM acc_user order by id") or die(mysql_error());
	
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
		
		
		public function load($record) {
			$this->id = $record['record_id'];
			$this->parent = $record['parentid'];
			$this->itemType = intval($record['itemtype']);
			$this->title = $record['cFistName'].' '.$record['cLastName'];
			$this->description = '('.$record['nEntireCT'].') '.'('.$record['nDirectCT'].')';
			$this->phone = $record['cCellNumb'];
			$this->email = $record['cUserIDNO'];
			
			if ($record['c1stValue']=='green')
			$this->image = "/phpdemo/demo/images/photos/green.png";
			else if ($record['c1stValue']=='red')
			$this->image = "/phpdemo/demo/images/photos/red.png";
			else if ($record['c1stValue']=='yellow')
			$this->image = "/phpdemo/demo/images/photos/yellow.png";
			else 
			$this->image = "/phpdemo/demo/images/photos/grey.png";
			
			if ($record['c2ndValue']=='green')
			$this->image1 = "/phpdemo/demo/images/photos/green.png";
			else if ($record['c1stValue']=='red')
			$this->image1 = "/phpdemo/demo/images/photos/red.png";
			else if ($record['c1stValue']=='yellow')
			$this->image1 = "/phpdemo/demo/images/photos/yellow.png";
			else 
			$this->image1 = "/phpdemo/demo/images/photos/grey.png";

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
    <title>jQuery Widget Organizational Chart, Matrix Leaves layout Demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="demo/js/jquery/ui-lightness/jquery-ui-1.10.2.custom.css" />
    <script type="text/javascript" src="demo/js/jquery/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="demo/js/jquery/jquery-ui-1.10.2.custom.js"></script>

    <!-- jQuery UI Layout -->
    <script type="text/javascript" src="demo/jquerylayout/jquery.layout-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="demo/jquerylayout/layout-default-latest.css" />

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('body').layout(
			{
			    center__paneSelector: "#contentpanel"
			});
        });
    </script>

    <!-- header -->

    <link href="demo/codemirror/codemirror.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="demo/codemirror/codemirror.js"></script>
    <script type="text/javascript" src="demo/codemirror/javascript.js"></script>
    <script type="text/javascript" src="demo/js/json3.min.js"></script>

    <link href="demo/css/primitives.latest.css?207" media="screen" rel="stylesheet" type="text/css" />
    <link href="demo/css/bporgeditor.latest.css?207" media="screen" rel="stylesheet" type="text/css" />

   

    <script type="text/javascript" src="demo/js/primitives.min.js?207"></script>
    <script type="text/javascript" src="demo/js/bporgeditor.min.js?207"></script>


    <script type="text/javascript" src="demo/js/randomdata.js"></script>

<script type="text/javascript">
		/* insert serialized JSON string here */
		<?php Print("var data=\"" . $jsonstring . "\";"); ?>		 
	</script>



    <script type="text/javascript">
        var bpOrgEditor = null;
        jQuery(document).ready(function () {
            jQuery.ajaxSetup({
                cache: false
            });

            jQuery('#contentpanel').layout(
			{
			    center__paneSelector: "#centerpanel"
				, west__size: 200
				, west__paneSelector: "#westpanel"
				, west__resizable: true
				, center__onresize: function () {
				    if (bpOrgEditor != null) {
				        jQuery("#centerpanel").bpOrgEditor("update", primitives.common.UpdateMode.Refresh);
				    }
				}
			});

            /* Edit Mode */
            var editModes = jQuery("#editMode");
            editModes.append(jQuery('<br/><div id="radioEditMode"><input type="radio" id="radioEdit" name="editMode" value="1" checked="checked"><label for="radioEdit">Edit</label><input type="radio" id="radioView" name="editMode" value="0"><label for="radioView">View</label></div>'));

            jQuery("#radioEditMode").buttonset();
            jQuery("input:radio[name=editMode]").change(function () {
                Update();
            });

			var items = JSON.parse(decodeURIComponent(data));

			var templates = [];
			templates.push(getContactTemplate());
			//items[0].templateName = "defaultTemplate";



            var orgEditorConfig = new primitives.orgeditor.Config();
            orgEditorConfig.editMode = false;
            orgEditorConfig.items = items;
			orgEditorConfig.templates = templates;
			/*orgEditorConfig.onCursorChanging = onCursorChanging;
			orgEditorConfig.onCursorChanged = onCursorChanged;
			orgEditorConfig.onHighlightChanging = onHighlightChanging;
			orgEditorConfig.onHighlightChanged = onHighlightChanged;
			orgEditorConfig.onSelectionChanged = onSelectionChanged;*/
			orgEditorConfig.onItemRender = onTemplateRender;




            orgEditorConfig.onSave = function () {
                var config = jQuery("#centerpanel").bpOrgEditor("option");
                /*Read config option and store chart changes */
            };
            bpOrgEditor = jQuery("#centerpanel").bpOrgEditor(orgEditorConfig);
        });


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


        function Update(selector, updateMode) {
            if (bpOrgEditor != null) {
                bpOrgEditor.bpOrgEditor("option", GetOrgDiagramConfig());
                bpOrgEditor.bpOrgEditor("update");
            }
        }

        function GetOrgDiagramConfig() {
            var editMode = parseInt(jQuery("input:radio[name=editMode]:checked").val(), 10);
			var templates = [getContactTemplate()];

            return {
                editMode: (editMode == 1),
				defaultTemplateName: "defaultTemplate"
            };
        }

		function getContactTemplate() {
			var result = new primitives.orgdiagram.TemplateConfig();
			var minimizedItemSize = parseInt(jQuery("#minimizedItemSize option:selected").val(), 10);
			result.name = "defaultTemplate";


			result.itemSize = new primitives.common.Size(320, 120);
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
				+ '<button onclick="myFunction()" style="top: 104px; left: 4px; width: 212px; height: 12px; position: absolute;font-size: 10px; font-family: Arial; text-align: right; font-weight: bold; text-decoration: none; z-index:100;">Try it</button>'
			+ '</div>'
			).css({
				width:  result.itemSize.width + "px",
				height: result.itemSize.height + "px"
			}).addClass("bp-item bp-corner-all bt-item-frame");
			result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

			return result;
		}
	

    </script>
    <!-- /header -->
</head>
<body style="font-size: 12px">
    <div id="contentpanel" style="padding: 0px;">
        <!--bpcontent-->
        <!--<div id="westpanel" style="padding: 0px; margin: 0px; border-style: solid; font-size: 12px; border-color: grey; border-width: 1px; overflow: scroll; -webkit-overflow-scrolling: touch;">
            <h2>Organizational Chart Editor Demo & Matrix Children Layout</h2>
            <p id="editMode">Mode</p>
            <p>This Organization Chart shows hierarchy having large number of direct reports.</p>
            <p>Leaves are children without own children. For example: all children can be placed horizontally regardless of number of levels in hierarchy and leaves are shaped into matrixes. This helps to adopt to organizational chart hierarchy changes without necessity of manual layout.</p>
            <p>This demo implemented in form of stand alone jQuery UI widget wrapping Organizational Chart bpOrgDiagram widget inside, see bporgeditor.latest.js for sources. Consider it as example of application component implemented in jQuery UI widget specification. It is licensed under the same license as jQuery itself, so it can be used for code snippets without any limitations.</p>
            <p>
                Organizational chart editor assumes "document" editing approach, that means it does not provide information about exact change user made in hierarchy, but only notifies about it.
              So application can load and save the whole hierarchy. This is convinient for Undo/Redo implementation, so user can make significant change in hierarchy and then undo in case of mistake. Some options and operations are not always obvious.
            </p>
            <p>In order to store changes in database, application should keep original copy of hierarchy before editing and compaire it to incomig changes from widget. All missing items should be removed from database. All new items should be added. All matching items should be updated.
              If you need to keep history of changes in database, consider to store the whole hierarchy as object serialized into JSON in blob field in database.</p>
            <div id="message"></div>
        </div>-->
        <div id="centerpanel" style="overflow: hidden; padding: 0px; margin: 0px; border: 0px;">
        </div>
        <!--/bpcontent-->
    </div>
</body>
</html>
