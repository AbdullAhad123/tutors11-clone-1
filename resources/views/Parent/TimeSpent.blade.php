<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time Spent</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
</head>

<body>

    @include('sidebar')
    @include('header')
    <nav aria-label="breadcrumb"> 
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page">Analysis</li>
        <li class="breadcrumb-item active" aria-current="page">Time Spent</li>
    </ol>
    </nav>
    @dd($data['datasets'][0]['data'][0]['seconds'])

    <div class="container bg-white" style="height: 500px; width: 80%;">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var js_array = [<?php echo '"'.implode('","', $data['labels']).'"' ?>];
        console.log(js_data);
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: js_array,
                datasets: [{
                    backgroundColor: 'red',
                    borderColor: 'red',
                    label: 'Minutes',
                    data: js_data,
                    borderWidth: 5
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



</body>

</html>
