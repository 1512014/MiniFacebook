// emtions quotes
$(document).ready(function () {
    $('div.message').hide();
    $('button.btn-edit').hide();
    $('button.delete').on('click', function () {
        commentId = $(this).siblings('input').val();
        url = '/comments/' + commentId;
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                url: url,
                contentType: 'application/json',
                type: 'DELETE',
                success: function(response){
                    // $('input[value=' + commentId + ']').parents(".comment").remove();
                    location.reload();
                },
                error: function(){
                    alert("Noooo");
                }
           });
        }

    });

    $('button.btn-cancel').on('click',function(){
        $('button.btn-edit').hide();
        $('button.btn-new').show();
        $('label.comment-label').text("Add a new comment");
        $('textarea#comment').val('');
    });

    $('button.edit').on('click', function(){
        $('label.comment-label').text("Edit a comment");
        $('button.btn-new').hide();
        $('button.btn-edit').show();
        localStorage.setItem("commentId", $(this).siblings('input').val());
        oldComment = String($(this).siblings('span.span-comment').text());
        oldComment = oldComment.replace(/[|&;$%@"<>()+,]/g, "");
        $('textarea#comment').val(oldComment);

    });

    $('button.btn-edit').on('click', function (){
        commentId = localStorage.getItem("commentId");
        url = '/comments/' + commentId;
        comment = $(this).siblings('textarea').val();

        console.log(commentId);
         $.ajax({
             url: url,
             type: 'PUT',
             contentType: 'application/json',
             data: JSON.stringify({
                 comment: comment
             }),
             success: function(response){
                 location.reload();
             }
        });
    });

    $('button.btn-new').on('click', function () {
        url = '/comments/';
        articleId = $(this).data('id');
        comment = $(this).siblings('textarea').val();
        console.log(comment);
        $.ajax({
            url: url,
            contentType: 'application/json',
            type: 'POST',
            data: JSON.stringify({
                comment: comment,
                articleId: articleId
            }),
            success: function(response){
                location.reload();
            }
       });
    });

    $('button#searchButton').on('click', function(){
        q = $('input#searchInput').val();
        console.log(q);
        url = '/articles?test=' + q;
        $('#searchForm').attr('action', url);
        // $('#searchForm').submit();
    });
});
