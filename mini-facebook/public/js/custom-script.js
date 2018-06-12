$(document).ready(function () {
    $('#friend-panel').on('shown.bs.collapse', function () {
        $('.friend-panel-collapse').text('Hide Panel');
    });

    $('#friend-panel').on('hidden.bs.collapse', function () {
        $('.friend-panel-collapse').text('Show Panel');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.search-container input').focus(
        function() {
            $(".search-container button").css('background', '#4080ff');
        }
    ).blur(function () {
        $(".search-container button").css('background', '#f6f7f9');
    });

    $('.popup-content').show(function () {
        $('.popup-content').scrollTop($('.popup-content')[0].scrollHeight);
    });

    $('.chat-popup .popup-header').on('click', function () {
        if ($(this).parents('.chat-popup').find('.popup-content').is(":visible")){
            $(this).parents('.chat-popup').find('.popup-content').fadeOut();
            $(this).parents('.chat-popup').find('.popup-input').fadeOut();
            $(this).parents('.chat-popup').animate({ height: 26 }, 'medium')
        }
        else {
            $(this).parents('.chat-popup').animate({ height: 334 }, 'fast');
            $(this).parents('.chat-popup').find('.popup-content').fadeIn(500);
            $(this).parents('.chat-popup').find('.popup-input').fadeIn();
            $(this).parents('.chat-popup').find('input').focus();
        }
    });

    // $('.popup-content').scrollTop($('.popup-content')[0].scrollHeight);

    $('li.contact-item').each(function () {
        $(this).on('click', function () {
            index = $(this).index();
            $('.chat-popup').hide();
            var userId = ($(this).data('user-id'));
            $('#chat-popup-' + userId).show().addClass('active');
            $('.popup-content').scrollTop($('.popup-content')[index].scrollHeight);
            // showPopup('#chat-popup-' + userId);
        });
    });

    $('.chat-popup input').keypress(function (e) {
        if (e.which == 13) {
            var messageContent = $(this).val();
            var userId = $(this).data('user-id');
            var url = '/messages/create';
                $.ajax({
                    url: url,
                    contentType: 'application/json',
                    type: 'POST',
                    data: JSON.stringify({
                        message_content: messageContent,
                        received_user: userId
                    }),
                    success: function(response){
                        result = JSON.parse(response);
                        // console.log(result);
                        $('.chat-popup input').val('');
                        // $('.chat-popup .popup-content').append(
                        //     '<div class="row current-user" data-message-id="'+ result['id'] +'">' +
                        //     '<div class="col-sm-12">' +
                        //     '<p class="message">' + result['message_content'] + '</p>' +
                        //     '</div>' +
                        //     '</div>'
                        // );

                    },
                    error: function (req, status, err) {
                        console.log('Something went wrong', status, err);
                    }
                });
            return false;
        }
    });

    $('.close-popup').on('click',function () {
        $('.chat-popup').hide().removeClass('active');
    });

    setInterval(getMessages, 1000);
});

function getMessages() {
    if ($('.chat-popup').is(":visible")){
        userId = $('.chat-popup.active').data('user-id');
        console.log(userId);
        var url = '/messages';
        var userAvatar = $('.chat-popup.active').data('user-avatar');
        console.log('User Avatar: ' + userAvatar);
        var currentUserId = $('#current_user_id').val();
        var messageIds = [];
        $('#chat-popup-' + userId).find('.row').each(function () {
            messageIds.push($(this).data('message-id'));
        });

        $.ajax({
            url: url,
            contentType: 'application/json',
            type: 'GET',
            data: {
                user_id: userId
            },
            success: function(response){
                results = JSON.parse(response);
                for (var i = 0; i< results.length; i++){
                    if($.inArray(results[i]['id'], messageIds) == -1) {
                        console.log("not in here");
                        console.log('query: ' + '#chat-popup' + userId + ' .popup-content');
                        if (results[i]['sent_user'] == currentUserId) {
                            $('#chat-popup-' + userId + ' .popup-content').append(
                                '<div class="row current-user"  data-message-id="' + results[i]['id'] + '">' +
                                '<div class="col-sm-12">' +
                                '<p class="message">' + results[i]['message_content'] + '</p>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        else {
                            $('#chat-popup-' + userId + ' .popup-content').append(
                                '<div class="row other-user"  data-message-id="'+ results[i]['id'] +'">' +
                                '<div class="col-sm-2">' +
                                '<img src="' + userAvatar + '">' +
                                '</div>' +
                                '<div class="col-sm-10">' +
                                '<p class="message">' + results[i]['message_content'] + '</p>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        $('#chat-popup-' + userId).find('.popup-content').scrollTop($('#chat-popup-' + userId).find('.popup-content')[0].scrollHeight);
                    }
                }
            },
            error: function (req, status, err) {
                console.log('Something went wrong', status, err);
            }
        });
    }

}

