<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Localization Settings - Admin Portal | Tutor 11 Plus Portal</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">


    <style>
        .active_child {
            color: #696cff !important;
        }

        .row_bg_light {
            background-color: #f1f1f1 !important;
        }

        .placeholder_text::placeholder {
            color: #a4a4a4;
            font-size: 0.9rem;
        }

        html {
            overflow-x: hidden;
            -webkit-overflow-scrolling: scroll
        }

        .profile_form {
            max-width: 920px;
            max-height: fit-content;
            margin: auto;
            border-radius: 10px;
            padding: 2rem 3rem 2rem 3rem;
            background-color: #fff
        }

        .profile_form_heading {
            color: #1f1f1f
        }

        .label_heading {
            font-size: 1rem;
            margin-top: 2rem;
            color: #1f1f1f
        }

        .personal_info {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 1rem
        }

        .form_control {
            width: 100%;
            background-color: transparent;
            border-radius: 5px;
            border: 1.5px solid #595959;
            transition: .3s
        }

        .form_control:focus {
            box-shadow: 0 0 5px 1px #4056ffa1
        }

        .update_btn {
            text-align: end
        }

        .btn_disable {
            background-color: #ff3434;
            color: #fff;
            border: 1px solid #ff3434;
            padding: .5rem 1.5rem .5rem 1.5rem;
            border-radius: 5px;
            transition: .3s
        }

        .btn_update {
            background-color: #696cff;
            color: #fff;
            border: 1px solid #696cff;
            padding: .5rem 1.5rem .5rem 1.5rem;
            border-radius: 5px;
            transition: .3s
        }

        .btn_update:hover {
            background-color: #5558e0
        }

        @media (max-width:425px) {
            .profile_form {
                padding: 1rem
            }

            .btn_update {
                font-size: .8rem !important
            }

            .btn_disable {
                font-size: .8rem !important;
                margin-top: .5rem
            }
        }

        .profile-pic {
            color: transparent;
            transition: all .3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all .3s ease;
            width: fit-content;
            margin: auto
        }

        .profile-pic input {
            display: none
        }


        .profile-pic .-label {
            cursor: pointer;
            height: 120px;
            width: 120px
        }

        .profile-pic:hover .-label {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .8);
            z-index: 10000;
            transition: background-color .2s ease-in-out;
            border-radius: 100px;
            margin-bottom: 0
        }

        .profile-pic span {
            display: inline-flex;
            padding: .2em;
            height: 2em
        }

        @keyframes circle-chart-fill {
            to {
                stroke-dasharray: 0 100
            }
        }

        @keyframes circle-chart-appear {
            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .file-input {
            display: none;
        }

        .file-label {
            cursor: pointer;
        }

        .logo-previewer {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #eee;
        }

        .logo-previewer img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <!-- Layout wrapper -->

    <div class="container pb-5">
        <!-- top name bar  -->
        <div class="d-flex justify-content-between align-items-center py-3 mb-4">
            <span>
                <h4 class="text-dark m-0">Localization Settings </h4>
            </span>
        </div>
        <!-- localizatin setting form  -->
        <div class="profile_form shadow-lg">
            <h4 class="profile_form_heading">Localization Settings</h4>
            <form>
                <!-- Default Locale  -->
                <h5 class="label_heading">Default Locale</h5>
                <div class="row personal_info">
                    <div>
                        <select type="text" class="form-select bg-transparent" name="first_name" id="first_name">
                            <option>Afrikaans</option>
                            <option>English</option>
                            <option>Arabic</option>
                        </select>
                    </div>
                </div>
                <!-- language  -->
                <div class="row personal_info m-0 my-4">
                    <div class="bg-label-primary p-3 font-monospace rounded-2">
                        "af_ZA.json" language translations file must exist in the "RESOURCES/LANG" directory.
                    </div>
                </div>
                <!-- default direction  -->
                <h5 class="label_heading">Default Direction</h5>
                <div class="row personal_info">
                    <div>
                        <select type="text" class="form-select bg-transparent" name="first_name" id="first_name">
                            <option>Left to Right (LTR)</option>
                            <option>Right to Left (RTL)</option>
                        </select>
                    </div>
                </div>
                <!-- defualt timezone  -->
                <h5 class="label_heading">Default Timezone</h5>
                <div class="row personal_info">
                    <div>
                        <select type="text" class="form-select bg-transparent" name="first_name" id="first_name">
                            <option>Africa</option>
                            <option>UK</option>
                            <option>USA</option>
                        </select>
                    </div>
                </div>
                <!-- update btn  -->
                <div class="update_btn mt-4">
                    <button class="btn_update shadow textuppercase">SAVE</button>
                </div>
            </form>
        </div>
    </div>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function () {

            $("#enable_disable_check").click(function () {
                if ($(this).is(':checked')) {
                    $(".enable_disable_text").html('Enable')
                }
                else {
                    $(".enable_disable_text").html('Disable')
                }
            });

            $('#favicon_logo').on('change', function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    $('.favicon_logoPreview').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            });

            $('#site_logo').on('change', function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    $('.site_logoPreview').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            });

            $('#white_logo').on('change', function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    $('.white_logoPreview').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            });


        });
    </script>

</body>

</html>