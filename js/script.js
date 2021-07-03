$(document).ready(() => {

    $('#documentation').on('click',  () => {
        //$('#page').load('./documentation.html');

        /*$.get('./documentation.html', data => {
            $('#page').html(data);
        });*/

        $.post('./documentation.html', data => {
            $('#page').html(data);
        });
    });

    $('#support').on('click',  () => {
        //$('#page').load('./support.html');

        /*$.get('./support.html', data => {
            $('#page').html(data);
        });*/

        $.post('./support.html', data => {
            $('#page').html(data);
        });
    });
});