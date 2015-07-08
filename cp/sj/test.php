<!DOCTYPE html>
<head>
<?php include('headerinclude.php'); ?>
<script>
$(document).on("hidden.bs.modal", function (e) {
    $(e.target).removeData("bs.modal").find(".modal-content").empty();
});

function checkform(sender)
{
 var $form = $(sender).parents('form');
        var $target = $($form.attr('data-target'));
 
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize() + '&' + $(sender).attr('name') + '=' + $(sender).attr('value'),
 
            success: function(data, status) {
                $target.html(data);
            }
        });
	return false;
}

</script>
</head>
<body>
<?php
$current = "data";
include('nav.php'); 
?>
</body>
</html>