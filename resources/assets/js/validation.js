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
        if(sel === 0){
            $('#gender').hide();
            $('input[name="currentRoommates"]').val('');
            return;
        }
        if(sel === 1){
            $('#gender').show();
            $('label#labelMan').html('Мъж');
            $('label#labelWoman').html('Жена');
            $('label#both').hide();
            return;
        }
        $('label#labelMan').html('Мъжe');
        $('label#labelWoman').html('Жени');
        $('label#both').show();
        $('#gender').show();
    })
});