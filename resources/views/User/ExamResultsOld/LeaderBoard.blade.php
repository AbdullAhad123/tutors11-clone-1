<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$exam['title']}} {{$steps[2]['title']}} - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
        .svg-indicator{height: 20px;}
        .bs-gutter-x-0{--bs-gutter-x:0 !important;}
        .font-size-13{font-size: 13px;}
        .bg-green{background-color:#3c7c5a}
        .text-green{color:#3c7c5a}
    </style>
</head>
<body>
    @include('sidebar')
    @include('header')
    @if ($childName == '')
    <section id="exam_tab_section" style="display:;">
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <p class="px-3 py-5 text-center text-black">Child Not Selected</p>
        </div>
        </div>
    </section>
    @else
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a href="{{$steps[0]['url']}}" class="nav-link w-auto" id="nav-{{$steps[0]['key']}}-tab">{{$steps[0]['title']}}</a>
            <a href="{{$steps[1]['url']}}" class="nav-link w-auto" id="nav-{{$steps[1]['key']}}-tab">{{$steps[1]['title']}}</a>
            <a href="{{$steps[2]['url']}}" class="nav-link w-auto active" id="nav-{{$steps[2]['key']}}-tab">{{$steps[2]['title']}}</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-{{$steps[2]['key']}}" role="tabpanel" aria-labelledby="nav-{{$steps[1]['key']}}-tab">
            <div class="table-responsive shadow-sm">
                <table class="table table-bordered mb-0 bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-3">#</th>
                        <th class="py-2 px-3">Test Taker</th>
                        <th class="py-2 px-3">High Score</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach ($topScorers as $key => $student)
                        <tr class="table_row">
                            <td><?php echo $i; ?></td>
                            <td>{{ $student['name'] }}  @if ($student['id'] == $user_id) <span class="alert-primary py-1 px-2 rounded-1 ms-1">(You)</span> @endif</td>
                            <td>{{ $student['high_score'] }}</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @include('User.ProgressScript')
</body>
</html>