$(document).ready(function (e) {
    // alert("Welcome!");
    $('#printButton').click(function (e) {
        //content to return if print aborted
        // let initialContents = $('body').append($('#main-wrapper.show'));
        // content to print
        let printContents = $('.card').html();
        $('body').html(printContents);
        $('#printButton').hide();
        $('#aj').hide();
        $('.srcoll').hide();
        window.print();
        // Refresh the page after 5 seconds (5000 milliseconds)
        setTimeout(function () {
            location.reload();
        }, 0);
        // initial content
        e.preventDefault();
    });

});