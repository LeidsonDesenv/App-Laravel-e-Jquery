/* global urlLike, token */

var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('#edit').on('click', function( ){
    //event.preventDefault();
    
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    //console.log(postBody);
    $('#textBody').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function(){    
    $.ajax({
        method: 'PUT',
        url: url,
        data: { body:  $('#textBody').val(), postId: postId , _token: token, url: url }
    })
   
      .done(function(msg){
          console.log(msg['message']);
           $(postBodyElement).text(msg['new_body']);
           $('#edit-modal').modal('hide');
      });
});

$('.like').on('click', function(event){
    event.preventDefault();    
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;    
    $.ajax({
        method: 'POST',
        url: urlLike,        
        data: {isLike: isLike, postId: postId , _token: token }
    })
            .done(function(){
                console.log(isLike);    
                location.reload();
                
            });
    
});
