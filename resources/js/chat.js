$(function() {
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
        }});

    $('#btn_send').on('click' , function(){
        console.log("ok");
        $.ajax({
            type : 'POST',
            url : '/chat/send',
            data : {
                message : $('textarea[name="message"]').val(),
                send : $('input[name="send"]').val(),
                recieve : $('input[name="recieve"]').val(),
            }
        }).done(function(result){
            console.log("ok87");
            $('textarea[name="message"]').val('');
        }).fail(function(result){

        });
    });

    console.log("ok97");
    Pusher.logToConsole = true;
    console.log("ok98");
    var pusher = new Pusher('c2567fd742fb5c387072', {
        cluster  : 'ap3',
    });

    var pusherChannel = pusher.subscribe('my-channel');

    pusherChannel.bind('my-event', function(data) {
        console.log("ok2");
        let appendText;
        let login = $('input[name="login"]').val();

        if(data.send === login){
            appendText = '<div class="send" style="text-align:right"><p>' + data.message + '</p></div> ';
            console.log("ok3");
        }else if(data.recieve === login){
            appendText = '<div class="recieve" style="text-align:left"><p>' + data.message + '</p></div> ';
            console.log("ok4");
        }else{
            console.log("ok5");
            return false;
        }

        $("#room").append(appendText);

        // if(data.recieve === login){
        //     console.log("ok7");
        //     // ブラウザへプッシュ通知
        //     Push.create("新着メッセージ",
        //         {
        //             body: data.message,
        //             timeout: 8000,
        //             onClick: function () {
        //                 window.focus();
        //                 this.close();
        //             }
        //         })

        // }


    });
});