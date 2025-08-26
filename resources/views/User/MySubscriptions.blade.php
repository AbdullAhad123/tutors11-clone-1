<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscriptions - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
        .w_130 {
            min-width: 130px;
        }
        .w_250 {
            min-width: 250px;
        }
        .w_120 {
            min-width: 120px;
        }
        .navbar_right_button a {
            color: #9a65f6;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <div class="bg-white shadow-sm rounded-3 my-4">
        <div class="table-responsive">
            <table class="table border-white mb-0">
                <thead>
                    <tr>
                        <th class="fs-6 w_250">PLAN</th>
                        <th class="fs-6 w_120">STARTS</th>
                        <th class="fs-6 w_130">ENDS</th>
                        <th class="fs-6 w_250">FEATURE ACCESS</th>
                        <th class="fs-6 w_120">STATUS</th>
                        <th class="fs-6 w_120">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($childName)
                        @foreach ($subscriptions['data'] as $key => $subscription)
                            <tr>
                                <td class="text-dark py-4">{{$subscription['plan']}}</td>
                                <td class="text-dark py-4">{{$subscription['starts']}}</td>
                                <td class="text-dark py-4">{{$subscription['ends']}}</td>
                                <td class="text-dark py-4">
                                    @foreach ($subscription['features'] as $featureKey => $feature)
                                    -&nbsp;{{$feature['name']}}&nbsp; 
                                    @endforeach
                                </td>
                                <td class="text-dark py-4">
                                    @if($subscription['status'] == 'active')
                                        <span class="px-2 p-1 rounded-pill bg-label-success">{{$subscription['status']}}</span>
                                    @elseif($subscription['status'] == 'created')
                                        <span class="px-2 p-1 rounded-pill bg-label-primary">{{$subscription['status']}}</span>
                                    @elseif($subscription['status'] == 'cancelled')
                                        <span class="px-2 p-1 rounded-pill bg-label-warning">{{$subscription['status']}}</span>
                                    @elseif($subscription['status'] == 'expired')
                                        <span class="px-2 p-1 rounded-pill bg-label-danger">{{$subscription['status']}}</span>
                                    @endif
                                </td>
                                <td class="text-dark py-4">
                                    @if ($subscription['canCancel'])
                                    <button data-id="{{$subscription['id']}}"
                                        class="btn btn-sm bg-label-danger cancelSubscription">Cancel</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr class="no_child">
                        <td class="border-0 pt-5 text-center" colspan="6">
                            <div class="card py-4 shadow-lg">
                                <img src="{{url('images\select_child.png')}}" width="120px" height="auto" alt="" class="mt-2 mx-auto">
                                <p class="py-2 text-center text-black">Please Select a Child First</p>
                                <div class="rounded-2 navbar_right_button bg-transparent mx-auto mt-2 mb-4">
                                    <a class="nav-link fw-medium p-1 px-2 fs-6" aria-current="page"
                                        href="{{route('change_child')}}">
                                        Select One
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(".cancelSubscription").click(function () {
            let id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: '/cancel-subscription/' + id,
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    console.log('success');
                    console.log(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(data);
                },
            });
        });
    </script>

</body>

</html>