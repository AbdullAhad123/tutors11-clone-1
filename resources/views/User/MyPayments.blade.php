<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
        .w_300 {
            min-width: 300px;
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

    <div class="bg-white shadow-sm my-4 shadow">
        <div class="table-responsive">
            <table class="table border-white mb-0">
                <thead>
                    <tr>
                        <th class="fs-6 w_300">PAYMENT ID</th>
                        <th class="fs-6 w_250">PLAN</th>
                        <th class="fs-6 w_120">AMOUNT</th>
                        <th class="fs-6 w_250">DATE</th>
                        <th class="fs-6 w_120">METHOD</th>
                        <th class="fs-6 w_120">STATUS</th>
                        <th class="fs-6 w_120">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($childName)
                    @foreach ($payments['data'] as $key => $payment)
                    <tr>
                        <td class="text-dark py-4">
                            <span class="bg-label-primary small rounded-pill fw-semibold px-3 p-2">
                                {{$payment['payment_id']}}
                            </span>
                        </td>
                        <td class="text-dark py-4">{{$payment['plan']}}</td>
                        <td class="text-dark py-4">{{$payment['amount']}}</td>
                        <td class="text-dark py-4">{{$payment['date']}}</td>
                        <td class="text-dark py-4">{{$payment['method']}}</td>
                        <td class="text-dark py-4">
                            @if($payment['status'] == 'success')
                                <span class="px-2 py-1 rounded bg-label-success">{{$payment['status']}}</span>
                            @elseif($payment['status'] == 'pending')
                                <span class="px-2 py-1 rounded bg-label-primary">{{$payment['status']}}</span>
                            @elseif($payment['status'] == 'cancelled')
                                <span class="px-2 py-1 rounded bg-label-warning">{{$payment['status']}}</span>
                            @elseif($payment['status'] == 'failed')
                                <span class="px-2 py-1 rounded bg-label-danger">{{$payment['status']}}</span>
                            @endif
                        </td>
                        <td class="text-dark">
                            @if ($enable_invoice)
                            <a target="_blank" href="/download-invoice/{{$payment['payment_id']}}"
                                class="btn btn-sm bg-label-primary">Invoice</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="no_child">
                        <td class="border-0 pt-5 text-center" colspan="7">
                            <div class="py-4">
                                <img src="{{url('images\select_child.png')}}" width="120" height="auto" alt="" class="mt-2 mx-auto">
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

</body>

</html>