$('#add-new-message').submit(function(){
    var new_message = $('#add-new-message input[name=new-message]').val();
    if(new_message != ''){
        $.ajax({
                url: "chat/add_new_message",
                type: "POST",
                data: { new_message : new_message },
                dataType: "json",
                success: function(data){
                    $('#add-new-message input[name=new-message]').val('');
                    $('<div class="row"><span class="date">'+data.date+'</span> <span class="my_message">'+data.text+'</span></div>').appendTo('#chat_window').hide().fadeIn();
                    conn.send(JSON.stringify(data));
                    $(document).scrollTop($(document).height());
                }
        });
    }
    return false;
});

var conn = new WebSocket('ws://localhost:8080');

conn.onopen = function(e) {

};

conn.onmessage = function(e) {
    var obj = JSON.parse(e.data);
    $('<div class="row"><span class="date">'+obj.date+'</span> <span class="username">'+obj.username+'</span> <span class="message">'+obj.text+'</span></div>').appendTo('#chat_window').hide().fadeIn();
    $(document).scrollTop($(document).height());
};