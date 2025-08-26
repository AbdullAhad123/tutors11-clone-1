<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscription Details</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Subscriptions Details</h1>
            <p class="fs-5 text-dark my-2">Effortlessly manage and update subscription details for the student portal.</p>
        </div>
        
        <div class="bg-white p-4 py-5 rounded-3 my-4">
            <div class="bg-lighter m-0 mb-4 p-3 row shadow-sm">
                <div class="col-sm-6 col-12 text-dark">Subscription ID:</div>
                <div class="col-sm-6 col-12">{{$subscription['code']}}</div>
            </div>

            <div class="bg-lighter m-0 mb-4 p-3 row shadow-sm">
                <div class="col-sm-6 col-12 text-dark">Plan:</div>
                <div class="col-sm-6 col-12">{{$subscription['plan']}}</div>
            </div>

            <div class="bg-lighter m-0 mb-4 p-3 row shadow-sm">
                <div class="col-sm-6 col-12 text-dark">Payment User:</div>
                <div class="col-sm-6 col-12">{{$subscription['user']}}</div>
            </div>
            
            <div class="bg-lighter m-0 mb-4 p-3 row shadow-sm">
                <div class="col-sm-6 col-12 text-dark">Subscription Starts:</div>
                <div class="col-sm-6 col-12">{{$subscription['starts']}}</div>
            </div>

            <div class="bg-lighter m-0 mb-4 p-3 row shadow-sm">
                <div class="col-sm-6 col-12 text-dark">Subscription Ends:</div>
                <div class="col-sm-6 col-12">{{$subscription['ends']}}</div>
            </div>

            <div class="bg-lighter m-0 mb-4 p-3 row shadow-sm">
                <div class="col-sm-6 col-12 text-dark">Status:</div>
                <div class="col-sm-6 col-12 text-uppercase">
                    <div id="updatedStatusWrap">
                        <span id="currentStatus">{{$subscription['status']}}</span>
                        <span class="text-primary text-decoration-underline ms-2 cursor-pointer" id="changeStatus">Edit</span>
                    </div>
                    <div id="changeStatusWrap" style="display:none;">
                        Status
                        <span class="text-primary text-decoration-underline ms-2 cursor-pointer" id="showCurrentStatus">Close</span>
                        <select class="form-select mt-2" id="status">
                            @foreach($subscriptionStatuses as $status)
                                @if($subscription['status'] == $status['value'])
                                    <option value="{{$status['value']}}" selected>{{$status['text']}}</option>
                                @else
                                    <option value="{{$status['value']}}">{{$status['text']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <button class="btn btn-primary mt-2" id="update">Update</button>
                        
                    </div>
                </div>
            </div>

            <div class="bg-lighter m-0 mb-4 p-3 row shadow-sm">
                <div class="col-sm-6 col-12 text-dark">Payment Method:</div>
                <div class="col-sm-6 col-12"><span class="p-2 px-3 rounded-pill bg_label_published">{{$subscription['payment']}}</span></div>
            </div>

        </div>

    </section>


    @include('parentsidebar.sidebarending')

    <script>
        let id = {!! str_replace("'", "\'", json_encode($subscription['id'])) !!};
        $("#changeStatus").click(function(){
            $("#changeStatusWrap").show();
            $("#updatedStatusWrap").hide();
        });
        $("#showCurrentStatus").click(function(){
            $("#updatedStatusWrap").show();
            $("#changeStatusWrap").hide();
        });
        $("#update").click(function(){
            let status = $("#status").val();
            $.ajax({
                url: '/admin/subscriptions/'+id,
                dataType: 'json',
                type: 'PATCH',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success){
                        $("#updatedStatusWrap").show();
                        $("#changeStatusWrap").hide();
                        $("#currentStatus").text(status);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
    </script>

</body>

</html>