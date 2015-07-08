<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="/smanager/js/jquery-ui.css">
  <script src="/smanager/js/jquery-1.10.2.js"></script>
  <script src="/smanager/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/shopadmin/js/stylee1.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
  </script>
</head>
<body>
 
<h1>Sorting A Table With jQuery UI</h1>
<a href='http://www.foliotek.com/devblog/make-table-rows-sortable-using-jquery-ui-sortable/'>Make table rows sortable with jQuery UI</a>

<table id="sort" class="grid" title="Kurt Vonnegut novels">
    <thead>
        <tr><th class="index">No.</th><th>Year</th><th>Title</th><th>Grade</th></tr>
    </thead>
    <tbody>
        <tr><td class="index">1</td><td>1969</td><td>Slaughterhouse-Five</td><td>A+</td></tr>
        <tr><td class="index">2</td><td>1952</td><td>Player Piano</td><td>B</td></tr>
        <tr><td class="index">3</td><td>1963</td><td>Cat's Cradle</td><td>A+</td></tr>
        <tr><td class="index">4</td><td>1973</td><td>Breakfast of Champions</td><td>C</td></tr>
        <tr><td class="index">5</td><td>1965</td><td>God Bless You, Mr. Rosewater</td><td>A</td></tr>
    </tbody>
</table>
 <script type="text/javascript">
$(document).ready(function(){
	
	
	var fixHelperModified = function(e, tr) {
    var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each(function(index) {
        $(this).width($originals.eq(index).width())
    });
    return $helper;
	},
		updateIndex = function(e, ui) {
			$('td.index', ui.item.parent()).each(function (i) {
				$(this).html(i + 1);
			});
		};

	$("#sort tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	}).disableSelection();
});
						
</script>
 
</body>
</html>