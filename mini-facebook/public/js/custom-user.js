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

});