@if(Auth::user()->hasRole('parent') || Auth::user()->hasRole('teacher'))
    @include('parentsidebar.header')
@elseif(Auth::user()->hasRole('student'))
    @include('parentsidebar.User.Userheader')
@elseif(Auth::user()->hasRole('instructor'))
    @include('parentsidebar.Instructor.header')
@elseif(Auth::user()->hasRole('admin'))
    @include('parentsidebar.Admin.header')
@endif
<script src="{{ asset('js/socket.io.js') }}"></script>
<script>
    $(document).ready(function(){
        let user = {
            id: "{{ auth()->user()->id }}",
            first_name: "{{ auth()->user()->first_name }}",
            last_name: "{{ auth()->user()->last_name }}",
            profile_photo_path: "{{ auth()->user()->profile_photo_path }}",
            last_seen: "{{ auth()->user()->last_seen }}",
        };
        // Begin Inspectlet Asynchronous Code
        (function() {
            window.__insp = window.__insp || [];
            __insp.push(['wid', 580640627]);
            __insp.push(['tagSession', user]);
            __insp.push(['uid', user.id]);
            var ldinsp = function(){
            if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=580640627&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
            setTimeout(ldinsp, 0);
        })();
        // End Inspectlet Asynchronous Code
        // let ip_address = '127.0.0.1';
        // let socket_port = '3000';
        // let socket = io(ip_address + ':' + socket_port); 
        let socket = io('ap.tutorselevenplus.co.uk');
        let roleIsAdmin = {!! str_replace("'", "\'", json_encode(Auth::user()->hasRole('admin'))) !!};
        let viewType =  roleIsAdmin ? 'admin' : 'user';
        socket.on('connect', function(){
            socket.emit('user_connected', user);
            socket.emit('join_chat', user.id, viewType);
        });
        
        socket.on('updateUserStatus', function(data, status){
            if(status.leave !== undefined){
                $("#user_box_"+status.leave).remove();
            }
            $.each(data, function(key,value) {
                if(value != null && value.socket_id != 0){
                    let profile_photo_path;
                    if(value.profile_photo_path){
                        profile_photo_path = value.profile_photo_path;
                    } else {
                        profile_photo_path = 'profile-photos/user-profile-icon.svg';
                    }
                    if($("#user_box_"+key).length <= 0 && $(".user_box[data-id='"+value.user_id+"']").length <= 0){
                        let tab = `<div class="d-flex justify-content-between align-items-center p-3 rounded-3 mb-3 user_box" id="user_box_`+key+`" data-id="`+value.user_id+`">
                                        <div class="d-flex align-items-center">
                                            <div class="w-px-50 h-px-50 me-2 rounded-circle border border-secondary user_avater" style="background-image:url('/`+profile_photo_path+`');"></div>
                                            <p class="text-dark fs-5">` + value.first_name + ` ` + value.last_name + `</p>
                                            </div>
                                            <div class=" bg-success rounded-circle">
                                             <span class="bg_label_online p-2 px-3 rounded-pill small">Online</span>
                                            </div>
                                        </div>
                                    </div>`;
                                  
                        $('.online_users_wrap').append(tab);
                    }
                }   
            });
        });
        socket.on('onlineUser', function(user_id, status){
            $(".userstatus[data-id="+user_id+"]").removeClass("offline online").addClass(status);
            $(".statusText[data-id="+user_id+"]").text(status);
        });
        socket.on('receiveMessage', function(room_id, viewType, user_id, msg, socketUser){
            if(!roleIsAdmin){
                if(user.id == user_id){
                    var notIds = $(".chat_box_wrap").map(function() {
                        return $(this).attr("data-id");
                    }).get();
                    $.ajax({
                        type: "POST",
                        url: '/get_chat/'+room_id,
                        data: {
                            ids: notIds,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                let messages = data.data;
                                messages.forEach(function(message){
                                    if($(".chat_box_wrap[data-id=" + message.id + "]").length <= 0){
                                        var chat_position;
                                        var wrap_position = "";
                                        if(message.from == "user"){
                                            chat_position = "chat_box_right";
                                            wrap_position = "justify-content-end";
                                        } else {
                                            chat_position = "chat_box_left";
                                        }
                                        let chatbox = `<div class="WhatsappChat__MessageContainer-sc-1wqac52-1 chat_box_wrap `+wrap_position+`" data-id="`+message.id+`">
                                            <div style="opacity: 0;" class="WhatsappDots__Component-pks5bf-0 eJJEeC">
                                            <div class="WhatsappDots__ComponentInner-pks5bf-1 hFENyl">
                                                <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotOne-pks5bf-3 ixsrax"></div>
                                                <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotTwo-pks5bf-4 dRvxoz"></div>
                                                <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotThree-pks5bf-5 kXBtNt"></div>
                                            </div>
                                            </div>
                                            <div style="opacity: 1;" class="WhatsappChat__Message-sc-1wqac52-4 chat_box `+chat_position+`">
                                                <small class="fs-tiny">`+message.sender.name+`</small>
                                                <div class="text-dark mt-1">`+message.body+`</div>
                                            </div>
                                        </div>`;
                                        $(".whatsapp-chat-body").append(chatbox);
                                        $(".start-chat").scrollTop($(".start-chat")[0].scrollHeight);
                                    }
                                });
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                }
            } else {
                let userChat = "";
                if($(".user-chat[data-id=" + user_id + "]").length > 0){
                    userChat = $(".user-chat[data-id=" + user_id + "]").clone(true);
                    $(".user-chat[data-id=" + user_id + "]").remove();
                } else {
                    if(socketUser){
                        userChat = `<div class="user-chat" data-username="`+socketUser.first_name+` `+socketUser.last_name+`" data-id="`+socketUser.id+`" data-img="/`+socketUser.profile_photo_path+`" data-status="`+socketUser.last_seen+`">
                            <div class="user-chat-img">
                                <div class="img" style="background-image:url(/`+socketUser.profile_photo_path+`);"></div>
                                <div class="userstatus online" data-id="`+socketUser.id+`"></div>
                            </div>
                            <div class="user-chat-text">
                                <p class="mt-0 mb-0">`+socketUser.first_name+` `+socketUser.last_name+`</p>
                                <small class="latest_msg" data-room="1`+socketUser.id+`">`+msg+`</small>
                            </div>
                        </div>`;
                    }
                }
                $(".list-search-user-chat").prepend(userChat);
                if(msg){
                    $(".latest_msg[data-room="+room_id+"]").text(msg);
                }
                let room = $(".head-chat-message-user").attr("data-room");
                if(room == room_id){
                    var notIds = $(".chat_box_wrap").map(function() {
                        return $(this).attr("data-id");
                    }).get();
                    $.ajax({
                        type: "POST",
                        url: '/get_chat/'+room_id,
                        data: {
                            ids: notIds,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                $('.chat_box_wrap:not([data-room="'+room_id+'"])').remove();
                                let messages = data.data;
                                messages.forEach(function(message){
                                    if($(".chat_box_wrap[data-id=" + message.id + "]").length <= 0){
                                        var chat_position = message.from == "user" ? "left" : "right";
                                        let chatbox = `<div class="chat_box_wrap message-user-`+chat_position+`" data-id="`+message.id+`" data-room="`+message.room_id+`">
                                                        <div class="message-user-`+chat_position+`-img">
                                                            <div class="img" style="background-image:url(/`+message.sender.image+`);"></div>
                                                            <p class="mt-0 mb-0">`+message.sender.name+`</p>
                                                            <small>`+message.date+`</small>
                                                        </div>
                                                        <div class="message-user-`+chat_position+`-text">
                                                        <strong>`+message.body+`</strong>
                                                        </div>
                                                    </div>`;
                                        $(".body-chat-message-user").append(chatbox);
                                        $(".body-chat-message-user").scrollTop($(".body-chat-message-user")[0].scrollHeight);
                                        $(".noChat").remove();
                                    }
                                });
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                }
            }
        });
        $(document).on("keyup", "#chat-input", function(e){
            if (e.key === 'Enter' || e.keyCode === 13) {
                $("#send-it").click();
            }
        });
        $(document).on("click", "#send-it", function () {
            var input = $("#chat-input").val();
            let user_id = user.id;
            var newChat = user;
            if(viewType == 'admin'){
                user_id = $(".head-chat-message-user").attr("data-id");
                newChat = {
                    first_name: $(".message-user-profile").find(".username").text(),
                    id: $(".head-chat-message-user").attr("data-id"),
                    last_name: "",
                    last_seen: "",
                    profile_photo_path: $(".head-chat-message-user").attr("data-img")
                }
            } 
            if(input){
                $.ajax({
                    type: "POST",
                    url: '/send_chat',
                    data: {
                        'user': user_id,
                        'type': viewType,
                        'message': input,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(user);
                        socket.emit('send_chat', user_id, viewType, input, newChat);
                        $("#chat-input").val("");  
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            }
        });
        $(document).on("click", ".user-chat", function () {
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-username');
            let img = $(this).attr('data-img');
            $(this).addClass("active").siblings().removeClass("active");
            socket.emit('join_chat', id, 'admin');
            $(".head-chat-message-user").attr("data-id", id);
            $(".head-chat-message-user").attr("data-room", "1"+id);
            $(".head-chat-message-user").attr("data-img", img);
            $(".head-chat-message-user").find(".img").attr('style', 'background-image:url(/'+img+');');
            $(".head-chat-message-user").find(".username").text(name);
        });
        $(document).on("click",".select_user", function(e){
            let id = $(this).attr("data-id");
            let status = $(this).attr("data-status");
            let img = $(this).attr("data-img");
            let name = $(this).text();
            socket.emit('join_chat', id, 'admin');
            if($(".head-chat-message-user").length > 0) {
                $(".head-chat-message-user").attr("data-id", id);
                $(".head-chat-message-user").attr("data-room", "1"+id);
                $(".head-chat-message-user").find(".img").attr('style', 'background-image:url(/'+img+');');
                $(".head-chat-message-user").find(".username").text(name);
                $(".head-chat-message-user").attr("data-img", img);
                $(".head-chat-message-user").find(".userstatus").removeClass("online offline").addClass(status);
                $(".head-chat-message-user").find(".statusText").text("");
                $(".body-chat-message-user").empty();
            } else {
                let tab = `<div class="head-chat-message-user" data-id="`+id+`" data-room="1`+id+`" data-img="`+img+`">
                    <div class="img" style="background-image:url(/`+img+`);" ></div>
                    <div class="message-user-profile">
                        <p class="mt-2 mb-0 text-black username">`+name+`</p>
                        <small class="text-black">
                            <p class="userstatus `+status+`" data-id="`+id+`"></p>
                            <span class="statusText text-capitalize" data-id="`+id+`"></span>
                        </small>
                    </div>
                </div>
                <div class="body-chat-message-user"></div>
                <div class="chat-history-footer shadow-sm rounded-2">
                    <div class="form-send-message d-flex justify-content-between align-items-center ">
                        <input class="border-0 form-control me-3 message-input p-3" id="chat-input" placeholder="Type your message here...">
                        <div class="message-actions d-flex align-items-center">
                        <button class="btn btn-primary d-flex send-msg-btn m-2" id="send-it">
                            <i class="bx bx-paper-plane me-md-1 me-0"></i>
                            <span class="align-middle d-md-inline-block d-none">Send</span>
                        </button>
                        </div>
                    </div>
                </div>`;
                $(".content-chat-message-user").empty().append(tab).removeClass("d-flex");
            }
        });
    });
</script>