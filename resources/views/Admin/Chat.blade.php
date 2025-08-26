<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chat</title>
        <!-- rel icon -->
        <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
        <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
        <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>

            a{
                text-decoration: none;
            }


            .content-chat{
                /* margin-right: 30px;
                margin-left: 30px; */
                display: flex;
                justify-content: center;
                /* gap: 25px; */
                padding: 10px;
            }

            .content-chat .content-chat-user{
                background-color: white;
                padding: 15px;
                border-radius: 20px 0px 0px 0px;
                width: 500px;
                overflow-y: auto;
            }

            .content-chat .content-chat-user .head-search-chat{
                background-color: #19b6d3;
                margin: -15px -15px 15px -15px;
                border-radius: 25px 25px 0 0;
                padding: 10px 15px;
            }

            .content-chat .content-chat-user .head-search-chat h4{
                color: #ffffff;
            }

            .content-chat .content-chat-user .search-user{
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 25px;
            }

            .content-chat .content-chat-user .search-user input{
                padding: 10px 15px;
                border-radius: 25px;
                border: 2px solid #949494;
                outline: none;
                width: 100%;
            }

            .content-chat .content-chat-user .search-user span i{
                position: absolute;
                top: 10px;
                right: 15px;
            }

            .content-chat .content-chat-user .list-search-user-chat {
                display: flex;
                flex-direction: column;
                gap: 15px;
                height: 100%;
                max-height: 450px;
                overflow-y: auto;
            }

            .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar{
                -webkit-appearance: none;
            }

            .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:vertical {
                width:3px;
            
            }

            .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button:increment,
            .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button {
                display: none;
            } 

            .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:horizontal {
                height: 5px;
            }

            .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-thumb {
                background-color: #43597166;
                border-radius: 20px;
                /* border: 2px solid #f1f2f3; */
            }

            .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-track {
                border-radius: 10px;  
            }

            .content-chat .content-chat-user .list-search-user-chat .user-chat{
                display: flex;
                gap: 15px;
                padding: 5px 10px;
                border-radius: 15px;
                cursor: pointer;
            }

            .content-chat .content-chat-user .list-search-user-chat .user-chat:hover{
                background-color: #e8e5fe;
            }

            .content-chat .content-chat-user .list-search-user-chat .user-chat.active{
                background-color: #696cff;
                color: white;
            }

            .content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img{
                position: relative;
                width: 60px;
                height: 60px;
                border-radius: 50%;
            }

            .content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img img,
            .content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img .img {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                object-fit: cover;
                background-size: cover;
                background-position: center;
            }

            .content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img .online{
                position: absolute;
                bottom: 5px;
                right: 5px;
                width: 10px;
                height: 10px;
                font-size: 20px;
                background-color: #71dd37;
                border-radius: 50%;
                border: 1px solid #ffffff;  
                box-shadow: 1px 1px 15px -4px #000;
            }

            .content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-img .offline{
                position: absolute;
                bottom: 5px;
                right: 5px;
                width: 10px;
                height: 10px;
                font-size: 20px;
                background-color: #bb4315;
                border-radius: 50%;    
                border: 1px solid #ffffff;
                box-shadow: 1px 1px 15px -4px #000;
            }

            .content-chat .content-chat-message-user{
                background-color: #f5f5f9;
                padding: 15px;
                border-radius: 20px 20px 0px 0px;
                max-width: 700px;
                width: 100%;
            }

            /* .content-chat .content-chat-message-user.d-none{
                display: none;
            } */

            .content-chat .content-chat-message-user .head-chat-message-user{
                display: flex;
                gap: 15px;
                padding: 10px 15px;
                border-radius: 0px 20px 0 0;
                background-color: #ffffff;
                margin-top: -15px;
                margin-left: -15px;
                margin-right: -15px;
            }

            .content-chat .content-chat-message-user .head-chat-message-user img,
            .content-chat .content-chat-message-user .head-chat-message-user .img
            {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                object-fit: cover;
                background-size: cover;
                background-position: center;
            }

            .content-chat .content-chat-message-user .head-chat-message-user .message-user-profile small {
                display: flex;
            
            }

            .content-chat .content-chat-message-user .head-chat-message-user .message-user-profile small .online{
                width: 18px;
                height: 18px;
                font-size: 20px;
                background-color: #71dd37;
                border-radius: 50%;
                border: 3px solid #ffffff;  
                /* box-shadow: 1px 1px 15px -4px #000; */
            }

            .content-chat .content-chat-message-user .head-chat-message-user .message-user-profile small .offline{
                width: 18px;
                height: 18px;
                font-size: 20px;
                background-color: #bb4315;
                border-radius: 50%;
                border: 3px solid #ffffff;  
                /* box-shadow: 1px 1px 15px -4px #000; */
            }
            .content-chat .content-chat-message-user .body-chat-message-user {
                display: flex;
                flex-direction: column;
                gap: 15px;
                box-sizing: border-box;
                padding: 15px;
                height: 400px;
                margin: 15px 0;
                overflow: auto;
                background-color: #f5f5f9;
                border-radius: 10px;
            }

            .content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar{
                -webkit-appearance: none;
            }

            .content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar:vertical {
                width:5px;
                border-radius: 25px;
            }

            .content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-button:increment,
            .content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-button {
                display: none;
            } 

            .content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar:horizontal {
                height: 10px;
            }

            .content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-thumb {
                background-color: #43597166;
                border-radius: 20px;
                border: 2px solid #f1f2f3;
            }

            .content-chat .content-chat-message-user .body-chat-message-user::-webkit-scrollbar-track {
                border-radius: 10px;  
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-left{
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-img{
                display: flex;
                gap: 10px;
                justify-content: start;
                align-items: center;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-img img,
            .content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-img .img{
                width: 40px;
                height: 40px;
                border-radius: 50%;
                object-fit: cover;
                background-size: cover;
                background-position: center;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-text{
                position: relative;
                padding: 15px 25px;
                background-color: #ffffff;
                border-radius: 15px;
                color: #949494;
                max-width: fit-content;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-left .message-user-left-text::before{
                content: '';
                position: absolute;
                top: -26px;
                left: 15px;
                border-right: 15px solid transparent;
                border-top: 15px solid transparent;
                border-left: 0px solid transparent;
                border-bottom: 15px solid #ffffff;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-right{
                display: flex;
                flex-direction: column;
                align-items: end;
                gap: 15px;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-img{
                display: flex;
                gap: 10px;
                justify-content: end;
                align-items: center;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-img img,
            .content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-img .img{
                width: 40px;
                height: 40px;
                border-radius: 50%;
                object-fit: cover;
                background-size: cover;
                background-position: center;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-text{
                position: relative;
                padding: 15px 25px;
                background-color: #696cff;
                border-radius: 15px;
                color: #ffffff;
                width: fit-content;
            }

            .content-chat .content-chat-message-user .body-chat-message-user .message-user-right .message-user-right-text::before{
                content: '';
                position: absolute;
                top: -26px;
                right: 15px;
                border-right: 0px solid transparent;
                border-top: 15px solid transparent;
                border-left: 15px solid transparent;
                border-bottom: 15px solid #696bfc;
            }

            .content-chat .content-chat-message-user .footer-chat-message-user {
                background-color: #c5e2e8;
                padding: 15px 25px;
                border-radius: 15px;
                box-sizing: border-box;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }

            .content-chat .content-chat-message-user .footer-chat-message-user .message-user-send{
                position: relative;
                width: 100%;
            }

            .content-chat .content-chat-message-user .footer-chat-message-user .message-user-send input {
                box-sizing: border-box;
                width: 100%;
                padding: 10px 15px;
                border-radius: 25px;
                outline: none;
                border: 2px solid #949494;
            }

            .content-chat .content-chat-message-user .footer-chat-message-user button{
                font-size: 18px;
                width: 38px;
                height: 38px;
                border-radius: 50%;
                border: none;
                background-color: #19b6d3;
                color: #ffffff;
                cursor: pointer;
            }

            .content-chat .content-chat-message-user .footer-chat-message-user button:hover{
                background-color: #daa520;
            }

            @media (max-width: 913px){
                .content-chat{
                    padding: 0px;
                }

                .content-chat .content-chat-user {
                    max-width: 300px;
                    width: 100%;
                }

                .content-chat .content-chat-message-user {
                    background-color: #ffffff;
                    padding: 15px;
                    border-radius: 25px;
                    max-width: 600px;
                    width: 100%;
                }
            }

            @media (max-width: 728px){
                .content-chat {
                    display: flex;
                    flex-direction: column;
                }

                .content-chat .content-chat-user {
                    box-sizing: border-box;
                    max-width: 1000px;
                    width: 100%;
                }

                .content-chat .content-chat-message-user {
                    box-sizing: border-box;
                    max-width: 1000px;
                    width: 100%;
                }

                .content-chat .content-chat-user .list-search-user-chat {
                    box-sizing: border-box;
                    max-width: -moz-fit-content;
                    max-width: fit-content;
                    display: flex;
                    flex-direction: row;
                    margin: 0 auto;
                    overflow-x: auto;
                    max-height: -moz-fit-content;
                    max-height: fit-content;
                    padding: 15px;
                }

                .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar{
                    -webkit-appearance: none;
                }
                
                .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:vertical {
                    width:10px;
                }
                
                .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button:increment,
                .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-button {
                    display: none;
                } 
                
                .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar:horizontal {
                    height: 10px;
                }
                
                .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-thumb {
                    background-color: #cfd5d6;
                    border-radius: 20px;
                    border: 2px solid #f1f2f3;
                }
                
                .content-chat .content-chat-user .list-search-user-chat::-webkit-scrollbar-track {
                    border-radius: 10px;  
                }
                

                .content-chat .content-chat-user .list-search-user-chat .user-chat {
                    width: 60px;
                    height: 60px;
                    padding: 10px;
                    background-color: #19b6d3;
                    max-height: -moz-fit-content;
                    max-height: fit-content;
                    border-radius: 50%;
                }

                .content-chat .content-chat-user .list-search-user-chat .user-chat .user-chat-text {
                    display: none;
                }
            }
            .chat-history-footer{
                background: white;
            }
            .user-avatar{
                width: 40px;
                height: 40px;
                background-size: cover;
                background-position: center;
            }
            .latest_msg{
                overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1; /* number of lines to show */
                    line-clamp: 2; 
            -webkit-box-orient: vertical;
            }
        </style>
    </head>
<body>
    @include('sidebar')
    @include('header')

    <section class="p-4 my-4">

    <div class="content-chat mt-20">
        <div class="content-chat-user shadow-sm">
            <!-- <div class="head-search-chat">
                <h4 class="text-center">Chat Finder</h4>
            </div>  -->
            
            <!-- <div class="search-user">
                <input id="search-input" type="text" placeholder="Search..." name="search" class="search">
                <span>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
            </div> -->
            <div class="d-flex align-items-center me-3 me-lg-0">
                <div class="flex-shrink-0 avatar avatar-online me-2" data-bs-toggle="sidebar" data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                    @if(Auth::user()->profile_photo_path)
                        <div class="user-avatar rounded-circle cursor-pointer" style="background-image:url({{Auth::user()->profile_photo_path ? url(Auth::user()->profile_photo_path) : url('profile-photos/user-profile-icon.svg') }});"></div>
                      @else
                        <div class="user-avatar rounded-circle cursor-pointer" style="background-image:url({{url('profile-photos/user-profile-icon.svg')}});opacity: 0.2;"></div>
                      @endif
                </div>
                <div class="flex-grow-1 input-group input-group-merge rounded-pill ms-1">
                  <input id="user_Inp" type="text" class="form-control chat-search-input border dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Search.." autocomplete="off">
                    <ul id="user_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search users
                        </li>
                    </ul>
                </div>
              </div>
            
                <h4 class="text-primary mt-3 ms-2">Chats</h4>

            <div class="list-search-user-chat mt-20">
                @if(count($chats) > 0)
                    @foreach($chats as $key => $chat)
                        <div class="user-chat
                        @if($key <= 0)
                            active
                        @endif
                        " data-username="{{$chat['user']['name']}}" data-id="{{$chat['user']['id']}}" data-img="{{ $chat['user']['image'] ? $chat['user']['image'] : url('profile-photos/user-profile-icon.svg')}}" data-status="{{$chat['user']['status']['last_seen'] ? $chat['user']['status']['last_seen'] : 'null'}}">
                            <div class="user-chat-img">
                                <div class="img" style="background-image:url({{ $chat['user']['image'] ? url($chat['user']['image']) : url('profile-photos/user-profile-icon.svg')}});" ></div>
                                <div class="userstatus  
                                @if($chat['user']['status']['last_seen'])
                                    @if($chat['user']['status']['last_seen'] >= now()->subMinutes(2))
                                        online
                                    @else
                                        offline
                                    @endif
                                @else
                                    offline
                                @endif
                                " data-id="{{$chat['user']['id']}}"></div>
                            </div>
                            <div class="user-chat-text">
                                <p class="mt-0 mb-0">{{$chat['user']['name']}}</p>
                                <small class="latest_msg" data-room="{{$chat['room_id']}}">{{$chat['body']}}</small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-dark noChat">No Chats</div>
                @endif
            </div>
        </div>
        <div class="content-chat-message-user shadow-sm
        @if(count($chats) <= 0)
            bg-white rounded-0 d-flex justify-content-center align-items-center
        @endif
        ">
            @if(count($first_chat) > 0)
                <div class="head-chat-message-user" data-id="{{$chats[0]['user']['id']}}" data-room="{{$chats[0]['room_id']}}" data-img="{{$chats[0]['user']['image'] ? $chats[0]['user']['image'] : url('profile-photos/user-profile-icon.svg')}}">
                    <div class="img" style="background-image:url({{$chats[0]['user']['image'] ? url($chats[0]['user']['image']) : url('profile-photos/user-profile-icon.svg')}});" ></div>
                    <div class="message-user-profile">
                        <p class="mt-2 mb-0 text-black username">{{$chats[0]['user']['name']}}</p>
                        <small class="text-black">
                            <p class="userstatus 
                                @if($chats[0]['user']['status']['last_seen'])
                                    @if($chats[0]['user']['status']['last_seen'] >= now()->subMinutes(2))
                                        online
                                    @else
                                        offline
                                    @endif
                                @else
                                    offline
                                @endif
                            " data-id="{{$chats[0]['user']['id']}}"></p>
                            <span class="statusText text-capitalize" data-id="{{$chats[0]['user']['id']}}">
                                @if($chats[0]['user']['status']['last_seen'])
                                    @if($chats[0]['user']['status']['last_seen'] >= now()->subMinutes(2))
                                        Online
                                    @else
                                        Last seen {{ \Carbon\Carbon::parse($chats[0]['user']['status']['last_seen'])->diffForHumans() }}
                                    @endif
                                @else
                                    Never seen
                                @endif
                            </span>
                        </small>
                    </div>
                </div>
                <div class="body-chat-message-user">
                    @foreach($first_chat as $message)
                        <div class="chat_box_wrap 
                        @if($message['from'] == 'user')
                            message-user-left
                        @else
                            message-user-right
                        @endif
                        " data-id="{{$message['id']}}" data-room="{{$message['room_id']}}">
                            <div class="
                                @if($message['from'] == 'user')
                                    message-user-left-img
                                @else
                                    message-user-right-img
                                @endif
                            ">
                                <div class="img" style="background-image:url({{$message['sender']['image'] ? url($message['sender']['image']) : url('profile-photos/user-profile-icon.svg')}});" ></div>
                                <p class="mt-0 mb-0">{{$message['sender']['name']}}</p>
                                <small>{{$message['date']}}</small>
                            </div>
                            <div class="
                                @if($message['from'] == 'user')
                                    message-user-left-text
                                @else
                                    message-user-right-text
                                @endif
                            ">
                                <strong>{{$message['body']}}</strong>
                            </div>
                        </div>
                    @endforeach
                    <!-- <div class="message-user-right">
                        <div class="message-user-right-img">
                            <p class="mt-0 mb-0">Luis Angel Solano Rivera</p>
                            <small>mié 17:59</small>
                            <img src="https://images.pexels.com/photos/2117283/pexels-photo-2117283.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                        </div>
                        <div class="message-user-right-text">
                            <strong>Sneat has all the components you'll ever need in a app.</strong>
                        </div>
                    </div> -->
                </div>
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
                </div>
            @else
                <div class="text-center text-dark">No Chats</div>
            @endif
        </div>
    </div>

    </section>
         
    <script>
        if($(".chat_box_wrap").length > 0){
            $(".body-chat-message-user").scrollTop($(".body-chat-message-user")[0].scrollHeight);
        }
        $(document).on("keyup","#user_Inp", function(e){
            $("#user_Dropdown").empty();
            var search_query = $(this).val();
            if(search_query.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/admin/search_users',
                    data: {
                        query: search_query,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let arrLength = data['users'].length;
                        if(arrLength > 0) {
                            data['users'].forEach(function(user){
                                $("#user_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_user" data-id="'+user.id+'" data-status="'+user.status+'" data-img="'+user.profile_photo_path+'">'+user.name+'</li>');
                            });
                        } else {
                            if($("#user_Dropdown").children().length == 0){
                                $("#user_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                            }
                        }

                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            } else {
                $("#user_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
            }
        });
    </script>

    @include('parentsidebar.sidebarending')

</body>

</html>