<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Payment Settings</title>
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
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark h2 my-3">Payment Settings</h1>
            <p class="text-dark fs-5 my-2">Simplify the management of payment settings on your website with just a click. Streamline the process for efficient and hassle-free payment management.</p>
        </div>
        
        <div id="pageMessage" class="my-4"></div>
        <!-- main container  -->
        <div class="my-4">

            <!-- Payment Settings -->
            <div class="bg-white rounded-3 shadow p-4">
                <h2 class="profile_form_heading h4 text-dark">General Settings</h2>
                <!-- payment processor  -->
                <label class="label_heading">Default Payment Processor</label>
                <div class="row personal_info">
                    <div>
                        <select id="defaultPaymentProcessor" class="form-select">
                            @if(app(\App\Settings\PaymentSettings::class)->default_payment_processor == "paypal")  
                                <option value="paypal" selected>Paypal</option>
                            @else 
                                <option value="paypal">Paypal</option>
                            @endif
                            @if(app(\App\Settings\PaymentSettings::class)->default_payment_processor == "stripe")
                                <option value="stripe" selected>Stripe</option>
                            @else
                                <option value="stripe">Stripe</option>
                            @endif
                            @if(app(\App\Settings\PaymentSettings::class)->default_payment_processor == "bank")
                                <option value="bank" selected>Bank</option>
                            @else
                                <option value="bank">Bank</option>
                            @endif
                        </select>
                    </div>
                </div>
                <!-- tag line  -->
                <label class="label_heading">Currency</label>
                <div class="row personal_info">
                    <div>
                        <select id="currency" class="form-select"></select>
                    </div>
                </div>
                <!-- currency symbol -->
                <label class="label_heading">Currency Symbol</label>
                <div class="row personal_info">
                    <div>
                        <input type="text" id="currencySymbol" class="form-control bg-transparent" value="{{app(App\Settings\PaymentSettings::class)->currency_symbol}}">
                    </div>
                </div>
                <!-- symbol position -->
                <!-- <label class="label_heading">Currency Symbol Position</label>
                <div class="row personal_info">
                    <div>
                    @if(app(\App\Settings\PaymentSettings::class)->currency_symbol_position == "left")
                        <select class="form-select">
                            <option selected>Left</option>
                            <option>Right</option>
                        </select>
                    @else 
                        <select class="form-select">
                            <option>Left</option>
                            <option selected>Right</option>
                        </select>
                    @endif
                    </div>
                </div> -->
                <!-- save btn  -->
                <div class="update_btn my-4">
                    <button id="updatePaymentSettings" class="btn btn-primary shadow textuppercase">SAVE</button>
                </div>
            </div>
            <hr class="my-5">

            <!-- Stripe Settings -->
            <div class="bg-white rounded-3 shadow p-4">
                <h2 class="profile_form_heading h4 text-dark">Stripe Settings</h2>
                <!-- for password  -->
                <div class="row personal_info my-3">
                    <div class="profile_photo">
                        <div>
                        <!-- enable_stripe -->
                            <label class="label_heading">Enable Stripe</label>
                        </div>
                        <div class="form-check form-switch text-center">
                            @if(app(\App\Settings\PaymentSettings::class)->enable_stripe == true)
                                <input id="enableStripe" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" checked>
                            @else 
                                <input id="enableStripe" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Stripe api key  -->
                <label class="label_heading">Stripe Api Key</label>
                <div class="row personal_info">
                    <div>
                        <input id="stripeKeyId" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\StripeSettings::class)->api_key}}">
                    </div>
                </div>
                <label class="label_heading">Stripe Secret Key</label>
                <div class="row personal_info">
                    <div>
                        <input id="stripeKeySecret" type="password" class="form-control bg-transparent" value="{{app(\App\Settings\StripeSettings::class)->secret_key}}">
                    </div>
                </div>
                <!-- stripe webhook -->
                <label class="label_heading">Stripe Webhook URL</label>
                <div class="row personal_info">
                    <div>
                        <input id="stripeWebhookUrl" type="text" class="form-control bg-transparent"
                            value="{{app(\App\Settings\StripeSettings::class)->webhook_url}}" readonly>
                    </div>
                </div>
                <!-- stripe webhook secret -->
                <label class="label_heading">Stripe Webhook Secret</label>
                <div class="row personal_info">
                    <div>
                        <input id="stripeWebhookSecret" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\StripeSettings::class)->webhook_secret}}">
                    </div>
                </div>

                <div class="update_btn mt-4">
                    <button id="updateStripeSettings" class="btn btn-primary shadow textuppercase">SAVE</button>
                </div>
            </div>
            <hr class="my-5">

            <!-- Paypal Settings -->
            <div class="bg-white rounded-3 shadow p-4">
                <h2 class="profile_form_heading h4 text-dark">Paypal Settings</h2>
                <!-- for password  -->
                <div class="row personal_info my-3">
                    <div class="profile_photo">
                        <div>
                        <!-- enable_paypal -->
                            <label class="label_heading">Enable Paypal</label>
                        </div>
                        <div class="form-check form-switch text-center">
                            @if(app(\App\Settings\PaymentSettings::class)->enable_paypal == true)
                                <input id="enablePaypal" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" checked>
                            @else 
                                <input id="enablePaypal" class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Paypal Client Id  -->
                <label class="label_heading">Paypal Client Id</label>
                <div class="row personal_info">
                    <div>
                        <input id="paypalClientId" type="text" class="form-control bg-transparent" value="{{app(\App\Settings\PaypalSettings::class)->client_id}}">
                    </div>
                </div>
                <!-- Paypal Secret  -->
                <label class="label_heading">Paypal Secret</label>
                <div class="row personal_info">
                    <div>
                        <input id="paypalSecret" type="password" class="form-control bg-transparent" value="{{app(\App\Settings\PaypalSettings::class)->secret}}">
                    </div>
                </div>
                <!-- paypal webhook -->
                <label class="label_heading">Paypal Webhook URL</label>
                <div class="row personal_info">
                    <div>
                        <input id="paypalWebhookUrl" type="text" class="form-control bg-transparent"
                            value="{{app(\App\Settings\PaypalSettings::class)->webhook_url}}" readonly>
                    </div>
                </div>

                <div class="update_btn mt-4">
                    <button id="updatePaypalSettings" class="btn btn-primary shadow textuppercase">SAVE</button>
                </div>
            </div>
            <hr class="my-5">

            <!-- Bank Settings -->
            <div class="bg-white rounded-3 shadow p-4">
                <h2 class="profile_form_heading h4 text-dark">Bank Settings</h2>

                <div class="bg-label-primary my-4 p-1 px-2 d-inline-flex">
                    <span class="font-monospace">Enter - (hyphen) to hide a field.
                    </span>
                </div>

                <!-- bank transfer  -->
                <label class="label_heading d-block">Enable Bank Transfers</label>
                <div class="row personal_info my-3">
                    <div class="row">
                        <div class="form-check form-switch text-center">
                            @if(app(\App\Settings\PaymentSettings::class)->enable_bank == true)
                            <input id="enableBank" class="form-check-input shadow-none border border-dark btn-lg"
                                type="checkbox" role="switch" checked>
                            @else 
                            <input id="enableBank" class="form-check-input shadow-none border border-dark btn-lg"
                                type="checkbox" role="switch">
                            @endif
                        </div>
                    </div>
                </div>
                <!-- bank name  -->
                <label class="label_heading">Bank Name</label>
                <div class="row personal_info">
                    <div>
                        <input id="bankName" type="text" class="form-control bg-transparent" value="{{app(App\Settings\bankSettings::class)->bank_name}}">
                    </div>
                </div>
                <!-- account owner  -->
                <label class="label_heading">Account Owner</label>
                <div class="row personal_info">
                    <div>
                        <input id="accountOwner" type="text" class="form-control bg-transparent" value="{{app(App\Settings\bankSettings::class)->account_owner}}">
                    </div>
                </div>
                <!-- account number  -->
                <label class="label_heading">Account Number</label>
                <div class="row personal_info">
                    <div>
                        <input id="accountNumber" type="text" class="form-control bg-transparent" value="{{app(App\Settings\bankSettings::class)->account_number}}">
                    </div>
                </div>
                <!-- IBAN  -->
                <label class="label_heading">IBAN</label>
                <div class="row personal_info">
                    <div>
                        <input id="iban" type="text" class="form-control bg-transparent" value="{{app(App\Settings\bankSettings::class)->iban}}">
                    </div>
                </div>
                <!-- routing number  -->
                <label class="label_heading">Routing Number</label>
                <div class="row personal_info">
                    <div>
                        <input id="routingNumber" type="text" class="form-control bg-transparent" value="{{app(App\Settings\bankSettings::class)->routing_number}}">
                    </div>
                </div>
                <!-- swift  -->
                <label class="label_heading">BIC/Swift</label>
                <div class="row personal_info">
                    <div>
                        <input id="bicSwift" type="text" class="form-control bg-transparent" value="{{app(App\Settings\bankSettings::class)->bic_swift}}">
                    </div>
                </div>
                <!-- details  -->
                <label class="label_heading">Other Details</label>
                <div class="row personal_info">
                    <div>
                        <textarea id="otherDetails" class="form-control bg-transparent"
                            style="min-height: 100px!important; max-height: 150px!important">{{app(App\Settings\bankSettings::class)->other_details}}</textarea>
                    </div>
                </div>
                <!-- save btn  -->
                <div class="update_btn mt-4">
                    <button id="updateBankSettings" class="btn btn-primary shadow textuppercase">SAVE</button>
                </div>

            </div>

        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function () {
            let default_currency = {!! str_replace("'", "\'", json_encode(app(\App\Settings\PaymentSettings::class)->default_currency))!!};
            $("#enable_disable_check").click(function () {
                if ($(this).is(':checked')) {
                    $(".enable_disable_text").html('Enable')
                }
                else {
                    $(".enable_disable_text").html('Disable')
                }
            });
            $.getJSON('https://openexchangerates.org/api/currencies.json', function(data) {
                var select = $('#currency');
                $.each(data, function(code, name) {
                    var option;
                    if(default_currency == code){
                        option = $('<option selected></option>').attr('value', code).text(code + ' - ' + name);
                    } else {
                        option = $('<option></option>').attr('value', code).text(code + ' - ' + name);
                    }
                    select.append(option);
                });
            });
            $("#updatePaymentSettings").click(function(){
                let defaultPaymentProcessor = $("#defaultPaymentProcessor").val();
                let currency = $("#currency").val();
                let currencySymbol = $("#currencySymbol").val();
                $.ajax({
                    type: 'POST',
                    url: '/admin/update-payment-settings',
                    data: {
                        currency_symbol: currencySymbol,
                        currency_symbol_position: "left",
                        default_currency: currency,
                        default_payment_processor: defaultPaymentProcessor,
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
            $("#updateRazorpaySettings").click(function(){
                let enableRazorpay = $("#enableRazorpay").is(':checked');
                let razorpayKeyId = $("#razorpayKeyId").val();
                let razorpayKeySecret = $("#razorpayKeySecret").val();
                let razorpayWebhookUrl = $("#razorpayWebhookUrl").val();
                let razorpayWebhookSecret = $("#razorpayWebhookSecret").val();
                $.ajax({
                    type: 'POST',
                    url: '/admin/update-razorpay-settings',
                    data: {
                        enable_razorpay: enableRazorpay,
                        key_id: razorpayKeyId,
                        key_secret: razorpayKeySecret,
                        webhook_secret: razorpayWebhookSecret,
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
            $("#updateBankSettings").click(function(){
                let enableBank = $("#enableBank").is(':checked');
                let bankName = $("#bankName").val();
                let accountOwner = $("#accountOwner").val();
                let accountNumber = $("#accountNumber").val();
                let iban = $("#iban").val();
                let routingNumber = $("#routingNumber").val();
                let bicSwift = $("#bicSwift").val();
                let otherDetails = $("#otherDetails").val();
                $.ajax({
                    type: 'POST',
                    url: '/admin/update-bank-settings',
                    data: {
                        account_number: accountNumber,
                        account_owner: accountOwner,
                        bank_name: bankName,
                        bic_swift: bicSwift,
                        enable_bank: enableBank,
                        iban: iban,
                        other_details: otherDetails,
                        routing_number: routingNumber,
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
            $("#updateStripeSettings").click(function(){
                let enableStripe = $("#enableStripe").is(':checked');
                let stripeKeyId = $("#stripeKeyId").val();
                let stripeKeySecret = $("#stripeKeySecret").val();
                let stripeWebhookUrl = $("#stripeWebhookUrl").val();
                let stripeWebhookSecret = $("#stripeWebhookSecret").val();
                $.ajax({
                    type: 'POST',
                    url: '/admin/update-stripe-settings',
                    data: {
                        enable_stripe: enableStripe,
                        api_key: stripeKeyId,
                        secret_key: stripeKeySecret,
                        webhook_secret: stripeWebhookSecret,
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
            $("#updatePaypalSettings").click(function(){
                let enablePaypal = $("#enablePaypal").is(':checked');
                let paypalClientId = $("#paypalClientId").val();
                let paypalSecret = $("#paypalSecret").val();
                let paypalWebhookUrl = $("#paypalWebhookUrl").val();
                $.ajax({
                    type: 'POST',
                    url: '/admin/update-paypal-settings',
                    data: {
                        enable_paypal: enablePaypal,
                        client_id: paypalClientId,
                        secret: paypalSecret,
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
