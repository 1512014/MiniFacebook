$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('button.remove-friend').on('click', function () {
        friendId = $(this).data('user-id');
        var url = '/friends/delete/' + friendId;
        var confirmDelete = confirm('Are you sure?');
        if (confirmDelete){
            $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json',
                success: function(response){
                    console.log(JSON.parse(response));
                    $('li#friend-' + friendId).remove();
                },
                error: function (req, status, err) {
                    console.log('Something went wrong', status, err);
                }
            });
        }

    });

    $('button.accept-request').on('click',function () {
        friendId = $(this).data('user-id');
        var url = '/friends/accept/' + friendId;
        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            success: function(response){
                console.log(JSON.parse(response));
                $('li#request-' + friendId).remove();
            },
            error: function (req, status, err) {
                console.log('Something went wrong', status, err);
            }
        });
    });

    $('button.remove-request').on('click',function () {
        friendId = $(this).data('user-id');
        var url = '/friends/delete/' + friendId;
        var confirmDelete = confirm('Are you sure?');
        if (confirmDelete) {
            $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json',
                success: function (response) {
                    console.log(JSON.parse(response));
                    $('li#request-' + friendId).remove();
                },
                error: function (req, status, err) {
                    console.log('Something went wrong', status, err);
                }
            });
        }
    });

    $('button.add-friend').on('click',function () {
        friendId = $(this).data('user-id');
        var url = '/friends/add/' + friendId;
        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            success: function(response){
                console.log("success");
                $('button.add-friend').replaceWith(
                    '<button type="button" class="btn btn-default" disabled>' +
                    '<i class="fas fa-user-plus"></i> Request Sent' +
                    '</button>'
                );
                $('li#friend-' + friendId).remove();
            },
            error: function (req, status, err) {
                console.log('Something went wrong', status, err);
            }
        });
    });

    $('input.comment').keypress(function (e) {
        var input = $(this);
        if (e.which == 13) {
            var userId = $(this).data('user-id');
            var postId = $(this).data('post-id');
            var commentContent = $(this).val();
            var url = '/comments/create';
            $(this).val('');
            var formData = JSON.stringify({
                'image_path': '',
                'user_id': userId,
                'post_id': postId,
                'comment_content': commentContent
            });
            console.log(formData);
            $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json',
                data: formData,
                success: function(response){
                    currentUser = JSON.parse(response);
                    console.log(currentUser);
                    console.log("success");
                    $('#post-item-' + postId + ' .show-comment-container').prepend(
                        '<div class="row comment-item">' +
                        '<div class="col-sm-1">' +
                        '<img src="' + currentUser.avatar + '" class="avatar">' +
                        '</div>' +
                        '<div class="col-sm-11">' +
                        '<p> <a href="/users/' + currentUser.id + '"><span class="comment-owner">' + currentUser.name + '</span></a>' + commentContent + '</p>' +
                        '</div>' +
                        '</div>'
                    );
                },
                error: function (req, status, err) {
                    console.log('Something went wrong', status, err);
                }
            });
        }
    });

});