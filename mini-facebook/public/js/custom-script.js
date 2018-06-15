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

    $('.popup .popup-header').on('click', function () {
        if ($(this).parents('.popup').find('.popup-content').is(":visible")){
            $(this).parents('.popup').find('.popup-content').fadeOut();
            $(this).parents('.popup').find('.popup-input').fadeOut();
            $(this).parents('.popup').animate({ height: 26 }, 'medium')
        }
        else {
            $(this).parents('.popup').animate({ height: 334 }, 'fast');
            $(this).parents('.popup').find('.popup-content').fadeIn(500);
            $(this).parents('.popup').find('.popup-input').fadeIn();
            $(this).parents('.popup').find('input').focus();
        }
    });

    // $('.popup-content').scrollTop($('.popup-content')[0].scrollHeight);

    $('li.contact-item').each(function () {
        $(this).on('click', function () {
            index = $(this).index();
            $('.popup').removeClass('active').hide();
            var userId = ($(this).data('user-id'));
            $('#chat-popup-' + userId).show().addClass('active');
            $('#chat-popup-' + userId + ' input').focus();
            $('.popup-content').scrollTop($('.popup-content')[index].scrollHeight);
            // showPopup('#chat-popup-' + userId);
        });
    });

    $('li.group-item').each(function () {
        $(this).on('click', function () {
            index = $(this).index();
            $('.popup').removeClass('active').hide();
            var groupId = ($(this).data('group-id'));
            console.log('groupId: ' + groupId);
            console.log(index);
            $('#group-popup-'+groupId).show().addClass('active');
            $('#group-popup-'+groupId +' input').focus();
            $('#group-popup-' + groupId + ' .popup-content').scrollTop($('#group-popup-' + groupId + ' .popup-content')[0].scrollHeight);
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

    $('.group-popup input').keypress(function (e) {
        if (e.which == 13) {
            var messageContent = $(this).val();
            var groupId = $(this).data('group-id');
            var url = '/messages/create';
            $.ajax({
                url: url,
                contentType: 'application/json',
                type: 'POST',
                data: JSON.stringify({
                    message_content: messageContent,
                    group_id: groupId
                }),
                success: function(response){
                    result = JSON.parse(response);
                    console.log(result);
                    $('.group-popup input').val('');
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
        $('.group-popup').hide().removeClass('active');
    });

    $('.submit-new-group').on('click',function () {
        checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
            alert("You must choose at least one friend");
            return false;
        }
    });

    $('.delete-group').on('click', function () {
        groupId = $(this).data('group-id');
        deleteButton = $(this);
        var url = '/groups/delete/' + groupId;
        var confirmDelete = confirm('Are you sure?');
        if (confirmDelete){
            $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json',
                success: function(response){
                    deleteButton.remove();
                    $('#group-item-' + groupId).remove();
                    // location.reload();
                },
                error: function (req, status, err) {
                    console.log('Something went wrong', status, err);
                }
            });
        }
    });

    setInterval(getMessages, 1000);
});

function getMessages() {
    if ($('.chat-popup').is(":visible")){
        userId = $('.chat-popup.active').data('user-id');
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

    if ($('.group-popup').is(":visible")){
        groupId = $('.group-popup.active').data('group-id');
        var url = '/messages/group';
        var currentUserId = $('#current_user_id').val();
        var messageIds = [];
        $('#group-popup-' + groupId).find('.row').each(function () {
            messageIds.push($(this).data('message-id'));
        });

        $.ajax({
            url: url,
            contentType: 'application/json',
            type: 'GET',
            data: {
                group_id: groupId
            },
            success: function(response){
                results = JSON.parse(response);
                for (var i = 0; i< results.length; i++){
                    if($.inArray(results[i]['id'], messageIds) == -1) {
                        if (results[i]['sent_user'] == currentUserId) {
                            $('#group-popup-' + groupId + ' .popup-content').append(
                                '<div class="row current-user"  data-message-id="' + results[i]['id'] + '">' +
                                '<div class="col-sm-12">' +
                                '<p class="message">' + results[i]['message_content'] + '</p>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        else {
                            $('#group-popup-' + groupId + ' .popup-content').append(
                                '<div class="row other-user"  data-message-id="'+ results[i]['id'] +'">' +
                                '<div class="col-sm-2">' +
                                '<img src="' + results[i]['sent_user_data']['avatar'] + '">' +
                                '</div>' +
                                '<div class="col-sm-10">' +
                                '<p class="message">' + results[i]['message_content'] + '</p>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        $('#group-popup-' + groupId).find('.popup-content').scrollTop($('#group-popup-' + groupId).find('.popup-content')[0].scrollHeight);
                    }
                }
            },
            error: function (req, status, err) {
                console.log('Something went wrong', status, err);
            }
        });
    }

}

