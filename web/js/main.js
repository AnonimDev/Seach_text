$(document).ready( function () {

    $(document).on('input', '[data-action="text"]', function () {
        var $item = $(this),
            value = $item.val();
        //console.log(value);
        getAjax(value);
    });

    function getAjax(value) {
        $.ajax({
            type: "POST",
            url: 'ajax',
            data: {value: value},
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                parseJS(data);
            }
        });
    }

    function parseJS(data) {
        if (data.status == 200){
            $('.text').html(data.text)
        }
        if (data.status == 300){
            $('.text').html(data.text)
        }
        if (data.status == 400){
            alert(data.text);
        }
    }

});