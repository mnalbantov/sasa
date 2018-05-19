$(document).ready(function(){
    $('#uBills').on('click',function () {
        $('#utilityCosts').toggle();
    });

    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        if(sel === 1){
            $('#gender').hide();
        return;
        }

        $('#gender').show();
    })
});