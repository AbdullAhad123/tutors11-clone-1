<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Biling Settings</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

    <meta name="description" content="" />

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
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark h2 my-3">Billing & Tax Settings</h1>
            <p class="text-dark fs-5 my-2">Simplify the management and updating of billing and tax settings effortlessly with just a click. Streamline your financial operations with ease.</p>
        </div>

        <!-- main container  -->
        <div id="pageMessage" class="my-4"></div>

        <div class="bg-white shadow p-4 rounded-3 my-4">

            <h2 class="profile_form_heading text-dark h4">Billing Settings</h2>

            <div class="bg_primary_label my-3 rounded p-2 px-3 d-inline-flex">
                <span class="font-monospace">Enter - (hyphen) to hide a field.
                </span>
            </div>

            <h5 class="label_heading">Vendor Name</h5>
            <div class="row personal_info">
                <div>
                    <input id="vendorName" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\BillingSettings::class)->vendor_name}}">
                </div>
            </div>

            <h5 class="label_heading">Address</h5>
            <div class="row personal_info">
                <div>
                    <textarea id="address" class="form-control bg-transparent"
                        style="min-height: 100px!important; max-height: 150px!important">{{app(\App\Settings\BillingSettings::class)->address}}</textarea>
                </div>
            </div>

            <h5 class="label_heading">City</h5>
            <div class="row personal_info">
                <div>
                    <input id="city" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\BillingSettings::class)->city}}">
                </div>
            </div>

            <h5 class="label_heading">State</h5>
            <div class="row personal_info">
                <div>
                    <input id="state" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\BillingSettings::class)->state}}">
                </div>
            </div>

            <h5 class="label_heading">Country</h5>
            <div class="row personal_info">
                <div>
                    <select id="country" class="form-select">
                        <option value="-">-</option>
                    </select>
                </div>
            </div>

            <h5 class="label_heading">Zip</h5>
            <div class="row personal_info">
                <div>
                    <input id="zip" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\BillingSettings::class)->zip}}">
                </div>
            </div>

            <h5 class="label_heading">Phone Number</h5>
            <div class="row personal_info">
                <div>
                    <input id="phoneNumber" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\BillingSettings::class)->phone_number}}">
                </div>
            </div>

            <h5 class="label_heading">VAT Number</h5>
            <div class="row personal_info">
                <div>
                    <input id="vatNumber" type="tel" class="form-control bg-transparent" value="{{app(\App\Settings\BillingSettings::class)->vat_number}}">
                </div>
            </div>

            <div class="row personal_info my-3">
                <div class="profile_photo">
                    <div>
                        <h5 class="label_heading">Enable Invoicing</h5>
                    </div>
                    <div class="form-check form-switch text-center">
                    @if(app(\App\Settings\BillingSettings::class)->enable_invoicing == true)
                        <input id="enableInvoicing" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox"
                            role="switch" checked>
                    @else
                    <input id="enableInvoicing" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox"
                            role="switch" >
                    @endif
                    </div>
                </div>
            </div>

            <h5 class="label_heading">Invoice Prefix</h5>
            <div class="row personal_info">
                <div>
                    <input id="invoicePrefix" type="tel" class="form-control bg-transparent" value="{{app(\App\Settings\BillingSettings::class)->invoice_prefix}}">
                </div>
            </div>

            <div class="update_btn mt-5">
                <button id="updateBillingSettings" class="btn btn-primary shadow textuppercase">SAVE</button>
            </div>
        </div>
        <hr class="my-5">

        <div class="bg-white shadow p-4 rounded-3 my-4">
            <h2 class="profile_form_heading text-dark h4">Tax Settings</h2>

            <div class="row personal_info my-3">
                <div class="profile_photo">
                    <div>
                        <h5 class="label_heading">Enable Tax</h5>
                    </div>
                    <div class="form-check form-switch text-center">
                    @if(app(\App\Settings\TaxSettings::class)->enable_tax == true)
                        <input id="enableTax" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox"
                            role="switch" checked>
                    @else
                        <input id="enableTax" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox"
                            role="switch">
                    @endif
                    </div>
                </div>
            </div>

            <h5 class="label_heading">Tax Name</h5>
            <div class="row personal_info">
                <div>
                    <input id="taxName" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\TaxSettings::class)->tax_name}}">
                </div>
            </div>

            <h5 class="label_heading">Tax Amount Type</h5>
            <div class="row personal_info">
                <div>
                    <select id="taxAmountType" class="form-select">
                        @if(app(\App\Settings\TaxSettings::class)->tax_amount_type == "fixed")
                            <option value="fixed" selected>Fixed</option>
                            <option value="percentage">Percentage</option>
                        @else
                            <option value="fixed">Fixed</option>
                            <option value="percentage" selected>Percentage</option>
                        @endif
                    </select>
                </div>
            </div>

            <h5 class="label_heading">Tax Amount</h5>
            <div class="row personal_info">
                <div>
                    <input id="taxAmount" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\TaxSettings::class)->tax_amount}}">
                </div>
            </div>

            <h5 class="label_heading">Tax Type</h5>
            <div class="row personal_info">
                <div>
                    <select id="taxType" class="form-select">
                        @if(app(\App\Settings\TaxSettings::class)->tax_type == "inclusive")
                            <option value="inclusive" selected>Inclusive</option>
                            <option value="exclusive">Exclusive</option>
                        @else
                            <option value="inclusive">Inclusive</option>
                            <option value="exclusive" selected>Exclusive</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="row personal_info my-3">
                <div class="profile_photo">
                    <div>
                        <h5 class="label_heading">Enable Additional Tax</h5>
                    </div>
                    <div class="form-check form-switch text-center">
                    @if(app(\App\Settings\TaxSettings::class)->enable_additional_tax == true)
                        <input id="enableAdditionalTax" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox"
                            role="switch" checked>
                    @else 
                        <input id="enableAdditionalTax" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox"
                            role="switch">
                    @endif
                    </div>
                </div>
            </div>

            <h5 class="label_heading">Additional Tax Name</h5>
            <div class="row personal_info">
                <div>
                    <input id="additionalTaxName" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\TaxSettings::class)->additional_tax_name}}">
                </div>
            </div>

            <h5 class="label_heading">Additional Tax Amount Type</h5>
            <div class="row personal_info">
                <div>
                    <select id="additionalTaxAmountType" class="form-select">
                        @if(app(\App\Settings\TaxSettings::class)->additional_tax_amount_type == "fixed")
                            <option value="fixed" selected>Fixed</option>
                            <option value="percentage">Percentage</option>
                        @else
                            <option value="fixed">Fixed</option>
                            <option value="percentage" selected>Percentage</option>
                        @endif
                    </select>
                </div>
            </div>

            <h5 class="label_heading">Additional Tax Amount</h5>
            <div class="row personal_info">
                <div>
                    <input id="additionalTaxAmount" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\TaxSettings::class)->additional_tax_amount}}">
                </div>
            </div>

            <h5 class="label_heading">Additional Tax Type</h5>
            <div class="row personal_info">
                <div>
                    <select id="additionalTaxType" class="form-select">
                    @if(app(\App\Settings\TaxSettings::class)->additional_tax_type == "exclusive")
                        <option value="inclusive">Inclusive</option>
                        <option value="exclusive" selected>Exclusive</option>
                    @else
                        <option value="inclusive" selected>Inclusive</option>
                        <option value="exclusive">Exclusive</option>
                    @endif
                    </select>
                </div>
            </div>

            <div class="update_btn mt-5">
                <button id="updateTaxSettings" class="btn btn-primary shadow textuppercase">SAVE</button>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')    

    <script>
        let default_country = {!! str_replace("'", "\'", json_encode(app(\App\Settings\BillingSettings::class)->country))!!};
        $(document).ready(function () {
            $("#enable_disable_check").click(function () {
                if ($(this).is(':checked')) {
                    $(".enable_disable_text").html('Enable')
                }
                else {
                    $(".enable_disable_text").html('Disable')
                }
            });
            $("#updateBillingSettings").click(function(){
                let enableInvoicing = $("#enableInvoicing").is(':checked');
                let vendorName = $("#vendorName").val();
                let address = $("#address").val();
                let city = $("#city").val();
                let state = $("#state").val();
                let country = $("#country").val();
                let zip = $("#zip").val();
                let phoneNumber = $("#phoneNumber").val();
                let vatNumber = $("#vatNumber").val();
                let invoicePrefix = $("#invoicePrefix").val();
                $.ajax({
                    type: 'POST',
                    url: '/admin/update-billing-settings',
                    data: {
                        address: address,
                        city: city,
                        country: country,
                        enable_invoicing: enableInvoicing,
                        invoice_prefix: invoicePrefix,
                        phone_number: phoneNumber,
                        state: state,
                        vat_number: vatNumber,
                        vendor_name: vendorName,
                        zip: zip,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#pageMessage").empty();
                        $(".layout-page").scrollTop(0);
                        if(data.success){
                            $("#pageMessage").append('<div class="alert alert-success text-black shadow-sm">'+data.message+'</div>');
                        } else {
                            $("#pageMessage").append('<div class="alert alert-danger shadow-sm">'+data.message+'</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            });
            $.ajax({
                type: 'GET',
                url: 'https://gist.githubusercontent.com/keeguon/2310008/raw/bdc2ce1c1e3f28f9cab5b4393c7549f38361be4e/countries.json',
                data: {_token: '{{ csrf_token() }}'},
                success: function(data) {
                    var select = $('#country');
                    data = JSON.parse(data.replaceAll('name', '"name"').replaceAll('code', '"code"').replaceAll("'", '"').replaceAll('"Suri"name""', '"Suriname"'));
                    data.forEach(function(country) {
                        var option;
                        if(default_country == country.code){
                            option = $('<option selected></option>').attr('value', country.code).text(country.name);
                        } else {
                            option = $('<option></option>').attr('value', country.code).text(country.name);
                        }
                        select.append(option);
                    });
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
            $("#updateTaxSettings").click(function(){
                let enableTax = $("#enableTax").is(':checked');
                let enableAdditionalTax = $("#enableAdditionalTax").is(':checked');
                let taxName = $("#taxName").val();
                let taxAmountType = $("#taxAmountType").val();
                let taxAmount = $("#taxAmount").val();
                let taxType = $("#taxType").val();
                let additionalTaxName = $("#additionalTaxName").val();
                let additionalTaxAmountType = $("#additionalTaxAmountType").val();
                let additionalTaxAmount = $("#additionalTaxAmount").val();
                let additionalTaxType = $("#additionalTaxType").val();
                $.ajax({
                    type: 'POST',
                    url: '/admin/update-tax-settings',
                    data: {
                        additional_tax_amount: additionalTaxAmount,
                        additional_tax_amount_type: additionalTaxAmountType,
                        additional_tax_name: additionalTaxName,
                        additional_tax_type: additionalTaxType,
                        enable_additional_tax: enableAdditionalTax,
                        enable_tax: enableTax,
                        tax_amount: taxAmount,
                        tax_amount_type: taxAmountType,
                        tax_name: taxName,
                        tax_type: taxType,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#pageMessage").empty();
                        $(".layout-page").scrollTop(0);
                        if(data.success){
                            $("#pageMessage").append('<div class="alert_success p-3 d-flex align-items-center rounded-3 my-1"> <i class="bx bx-check-circle me-1"></i>'+data.message+'</div>');
                        } else {
                            $("#pageMessage").append('<div class="alert_failed p-3 d-flex align-items-center rounded-3 my-1"> <i class="bx bx-error-circle me-1"></i>'+data.message+'</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            });
        });
    </script>

</body>

</html>