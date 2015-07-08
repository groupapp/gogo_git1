function popupmodal(sender)
{
    var modalitem = $(sender).data('target');
    var dataurl = $(sender).attr('href');
    $(modalitem).find('.modal-content').load(dataurl);
    $(modalitem).modal('show');
}

$('#cssmenu').prepend('<div id="menu-button">Menu</div>');

$('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
        menu.removeClass('open');
    }
    else {
        menu.addClass('open');
    }
});
$(function () {
    var nav = $('#cssmenu');
    var navHomeY = nav.offset().top;
    var isFixed = false;
    var $w = $(window);
    $w.scroll(function () {
        var scrollTop = $w.scrollTop();
        var shouldBeFixed = scrollTop > navHomeY;
        if (shouldBeFixed && !isFixed) {
            nav.css({
                position: 'fixed',
                top: 0,
                left: nav.offset().left,
                width: nav.width()
            });
            isFixed = true;
        }
        else if (!shouldBeFixed && isFixed) {
            nav.css({
                position: 'static'
            });
            isFixed = false;
        }
    });
});

function call_item_select(sender) {
    var groupid = $(sender).data('groupid');
    var pkcodevalue = $(sender).data('pkcode');
    var selectvalue = $(sender).val();
    var testvalue = (groupid + ':' + pkcodevalue + ':' + selectvalue);
    $.get('data_selection.php?id_group=' + groupid + '&pk_code=' + pkcodevalue + '&id_item=' + selectvalue, function (result) {
        $(sender).parents('.inputselection').html(result);
    });
}
function call_item_select1(sender) {
   var selectvalue1 = $('#field_value_' + sender).val();
    if (selectvalue1 == 6)
            $('#select_value_'+sender).css('display','block');
    else
            $('#select_value_'+sender).css('display','none');
    
}

function call_item_select_i() {
    var selectvaluei = $('#field_value').val();
    //alert(selectvaluei);
    if (selectvaluei == 6)
        $('#select_value' ).css('display', 'block');
    else
        $('#select_value').css('display', 'none');

}