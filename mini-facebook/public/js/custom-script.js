$(document).ready(function () {
    $('.search-container input').focus(
        function() {
            $(".search-container button").css('background', '#4080ff');
        }
    ).blur(function () {
        $(".search-container button").css('background', '#f6f7f9');
    });
});
