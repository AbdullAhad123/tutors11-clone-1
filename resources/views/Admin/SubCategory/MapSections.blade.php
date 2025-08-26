<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Map Subjects</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* The checkbox-container */
        .checkbox-container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }

        /* Hide the browser's default checkbox */
        .checkbox-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .checkbox-container:hover input ~ .checkmark {
        background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .checkbox-container input:checked ~ .checkmark {
        background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        }

        /* Show the checkmark when checked */
        .checkbox-container input:checked ~ .checkmark:after {
        display: block;
        }

        /* Style the checkmark/indicator */
        .checkbox-container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 7px;
        height: 12px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <div id="pageMessage" class="mt-4"></div>
    <div class="py-4">
        <div class="bg-white rounded-3 px-3 py-4">
            <div class="fs-4 text-dark mb-3">Select subjects</div>
            <div class="px-3">
                @foreach($selected_sections as $key => $selected_section)
                    <label class="checkbox-container mb-3 fs-5"> {{$key}}
                        <input type="checkbox" class="checkbox" value="{{$selected_section}}" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                @endforeach
                @foreach($sections as $section)
                    @if(!in_array($section['id'], $selected_sectionsIds->toArray()))
                        <label class="checkbox-container mb-3 fs-5"> {{$section['name']}}
                        <input type="checkbox" class="checkbox" value="{{$section['id']}}">
                        <span class="checkmark"></span>
                    </label>
                    @endif
                @endforeach
            </div>
            <div class="pt-2 px-3">
                <div class="text-danger font-size-13 mb-1" id="formError"></div>
                <button class="btn btn-primary" id="updateSections">Update</button>
            </div>
        </div>
    </div>
    

    @include('parentsidebar.sidebarending')

    <script>
        let id = {!! str_replace("'", "\'", json_encode($subCategory['id'])) !!};
        $("#updateSections").click(function(){
            let sections = [];
            $(".checkbox").each(function(){
                if($(this).is(':checked')){
                    sections.push(parseInt($(this).val()));
                }
            });
            let selected_sections = {selected_sections: sections};
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '/admin/update_sub_category_sections/'+id,
                data: {
                    selected_sections,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#pageMessage").empty();
                    if(data.success){
                        $("#pageMessage").append('<div class="alert alert-success text-black mb-0">'+data.message+'</div>');
                    } else {
                        $("#pageMessage").append('<div class="alert alert-danger mb-0">'+data.message+'</div>');
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                    var obj = data.responseJSON.errors;
                    let formError = obj[Object.keys(obj)[0]][0];
                    $("#formError").text(formError);
                },
            });
        });
    </script>
</body>

</html>