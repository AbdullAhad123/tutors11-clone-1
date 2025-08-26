<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Plan</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        /* pricing  */
        .pricing_card {
            height: auto;
            width: auto;
            background-color: #fff;
            border-radius: 25px;
        }

        .pricing_card_header {
            background: var(--portal-primary)
        }

        .pricing_image {
            height: 200px;
            width: auto;
            background: url("{{url('images/\subscribtion_plans_image.jpg')}}") center no-repeat;
            background-size: contain;
        }

        .select_plan_btn {
            background: transparent;
            border: 2px solid var(--portal-primary) !important;
            color: var(--portal-primary) !important;
            transition: 0.2s;
        }

        .select_plan_btn:hover {
            background: var(--portal-primary) !important;
            border: 2px solid var(--portal-primary) !important;
            color: var(--portal-white) !important;
        }

        .selected_plan {
            background-color: var(--portal-primary) !important;
            color: #fff !important;
            border: 2px solid var(--portal-primary) !important;
        }

        .first_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 10%;
            top: -23px;
            background: var(--portal-primary);
        }

        .second_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 45%;
            top: -23px;
            background: var(--portal-primary);
        }

        .third_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 85%;
            top: -23px;
            background: var(--portal-primary);
        }

        @media (max-width: 768px) {

            .first_step,
            .second_step,
            .third_step {
                height: 40px !important;
                width: 40px !important;
                top: -17px;
            }

            .first_step svg,
            .second_step svg,
            .third_step svg {
                height: 25px !important;
                width: 25px !important;
            }
        }

        @media (max-width: 500px) {
            .third_step {
                left: 80% !important;
            }
        }

        @media (max-width: 350px) {
            .third_step {
                left: 75% !important;
            }
        }
        .heading_separator {
            height: 0.4rem;
            width: 120px;
            background: orange;
            border-radius: 20rem;
        }
        @media (min-width: 1460px) {
            .pricing_parent_card.col-lg-6 {
                flex: 0 0 auto!important;
                width: 33.33%!important;
            }
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <!-- steps  -->
    <div class="newchild_steps position-relative mb-5">
        <div class="progress m-2" style="height: 0.6rem" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 46.33%; height: 0.6rem; background: var(--portal-primary)!important"></div>
        </div>
        <div class="first_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/create_user.gif')}}) center no-repeat; background-size: contain;"></div>
        <div class="second_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/select_plan.gif')}}) center no-repeat; background-size: contain;"></div>
        <div class="third_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/payment_checkout.gif')}}) center no-repeat; background-size: contain;"></div>
    </div>
    <!-- select plan  -->
    <section>
        <div class="my-3">
            <div class="d-flex align-items-center justify-content-center my-3">
                <h1 class="h2 text-center fw-semibold monthly_plan_button text-primary-emphasis m-0">Monthly Plans</h1>
                <div class="form-check form-switch fs-4 ms-3">
                    <input class="border-primary form-check-input shadow-none" type="checkbox" role="switch" id="switch_plan_duration_btn">
                </div>
                <h2 class="h2 text-center fw-semibold yearly_plan_button m-0">Yearly Plans</h2>
            </div>
            <p class="fs-5 text-center text-dark">Choose the ideal plan to support your child's educational journey.</p>
        </div>
        <div class="d-flex mx-auto my-3 spinner-border text-primary mt-5 visually-hidden" role="status"></div>
        <div class="row justify-content-lg-start justify-content-center mt-5 monthly_plan_container">
            @if($monthly_count > 0)
                @foreach($monthly_categories as $key => $category)
                    @foreach($category['plans'] as $plan)
                        <div class="col-lg-6 col-md-8 col-sm-12  col-12 my-3 pricing_parent_card">
                            <div class="pricing_card overflow-hidden shadow p-3">
                                <div class="py-2 pt-2">
                                    <div class="badge bg-label-primary py-2 px-4">{{$category['name']}}</div>
                                    <h2 class="fw-bold fs-5 text-uppercase text-dark mb-2 mt-2">{{$plan['name']}} Subscription</>
                                </div>
                                    <p class="fs-4 fw-bold mb-1 text-primary p-2">
                                        <div class="d-flex align-items-baseline">
                                            <div class="mb-3">
                                                <span class="h3 fw-bold text-primary">
                                                    @if($plan['has_discount'])
                                                        <span class="text-decoration-line-through">{{$plan['price']}}</span> {{$plan['discounted_price']}}
                                                    @else
                                                        {{$plan['price']}}
                                                    @endif
                                                </span>/{{$plan['is_yearly'] ? 'year' : 'mo'}}
                                            </div>
                                            @if($plan['has_discount'])
                                            <div class="my-2 px-2">
                                                <span class="bg-label-primary px-3 p-1 rounded-pill">{{$plan['discount_percentage']}} OFF</span>
                                            </div>
                                            @endif
                                        </div>
                                    </p>
                                    @if(!$plan['is_yearly'])
                                        <p class="mb-0 text-dark">To be paid {{$plan['total_price']}} for {{$plan['duration']}} months</p>
                                    @endif

                                <div class="pricing_details">
                                    
                                    @if(count($plan['features']) > 0)
                                        <ul class="featured_list list-unstyled px-1 my-3">
                                            @foreach($plan['features'] as $feature)
                                                <li class="text-dark p-2 d-flex align-items-center"><i class='bx bx-check-circle text-success me-1'></i>{{$feature['name']}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="text-center my-4 mb-5">
                                        <a  href="/checkout/{{$plan['code']}}" class="btn select_plan_btn rounded-5 border-1 p-3 text-primary bg-white w-75 fw-semibold px-3">Select Plan</a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    @endforeach
                @endforeach
            @else
                <div class="bg-white container-fluid px-5 py-4 shadow rounded-4 text-center">
                    <img class="img-fluid" src="{{url('images/no_record_found.png')}}" alt="No record found">
                    <p class="mb-4">Oops! It seems there are no yearly plans available at the moment. Our team is working hard to bring you exciting new content. In the meantime, feel free to explore our monthly plans and stay tuned for upcoming yearly subscriptions. Thank you for your patience and understanding!</p>
                </div>
            @endif
        </div>
        <div class="row justify-content-lg-start justify-content-center mt-5 yearly_plan_container d-none">
            @if($yearly_count > 0)
                @foreach($yearly_categories as $key => $category)
                    @foreach($category['plans'] as $plan)
                        <div class="col-lg-6 col-md-8 col-sm-12  col-12 my-3 pricing_parent_card">
                            <div class="pricing_card overflow-hidden shadow p-3">
                                <div class="py-2 pt-4">
                                    <h2 class="fw-bold fs-5 text-uppercase text-dark mb-2">{{$plan['name']}} Subscription</>
                                </div>
                                    <p class="fs-4 fw-bold mb-1 text-primary p-2">
                                        <div class="d-flex align-items-baseline">
                                            <div class="mb-3">
                                                <span class="h3 fw-bold text-primary">
                                                    @if($plan['has_discount'])
                                                        <span class="text-decoration-line-through">{{$plan['price']}}</span> {{$plan['discounted_price']}}
                                                    @else
                                                        {{$plan['price']}}
                                                    @endif
                                                </span>/{{$plan['is_yearly'] ? 'year' : 'mo'}}
                                            </div>
                                            @if($plan['has_discount'])
                                            <div class="my-2 px-2">
                                                <span class="bg-label-primary px-3 p-1 rounded-pill">{{$plan['discount_percentage']}} OFF</span>
                                            </div>
                                            @endif
                                        </div>
                                    </p>
                                    @if(!$plan['is_yearly'])
                                        <p class="mb-0 text-dark">To be paid {{$plan['total_price']}} for {{$plan['duration']}} months</p>
                                    @endif

                                <div class="pricing_details">
                                    
                                    @if(count($plan['features']) > 0)
                                        <ul class="featured_list list-unstyled px-1 my-3">
                                            @foreach($plan['features'] as $feature)
                                                <li class="text-dark p-2 d-flex align-items-center"><i class='bx bx-check-circle text-success me-1'></i>{{$feature['name']}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="text-center my-4 mb-5">
                                        <a href="/checkout/{{$plan['code']}}" class="btn select_plan_btn rounded-5 border-1 p-3 text-primary bg-white w-75 fw-semibold px-3">Select Plan</a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    @endforeach
                @endforeach
            @else
                <div class="bg-white container-fluid px-5 py-4 shadow rounded-4 text-center">
                    <img class="img-fluid" src="{{url('images/no_record_found.png')}}" alt="No record found">
                    <p class="mb-4">Oops! It seems there are no yearly plans available at the moment. Our team is working hard to bring you exciting new content. In the meantime, feel free to explore our monthly plans and stay tuned for upcoming yearly subscriptions. Thank you for your patience and understanding!</p>
                </div>
            @endif
        </div>  
    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function () {
            // convert plan button 
            let selectedCard = null;
            $(".pricing_card").click(function () {
                const clickedCard = $(this);
                const clickedButton = clickedCard.find(".select_plan_btn");

                if (selectedCard) {
                    selectedCard.find(".select_plan_btn").html("Select Plan").removeClass("selected_plan");
                }

                selectedCard = clickedCard;
                clickedButton.html("<i class='bx bx-check'></i> Selected").addClass("selected_plan");
                if(clickedButton.hasClass("selected_plan")) {
                    $(".select_plan_step_btn").removeClass("disabled");
                }
            });
            $("#switch_plan_duration_btn").click(function () {
                let _this = $(this);
                if (_this.is(':checked')) {
                    $(".monthly_plan_button").removeClass("text-primary-emphasis");
                    $(".spinner-border").removeClass("visually-hidden");
                    $(".monthly_plan_container").addClass("d-none");
                    $(".yearly_plan_button").addClass("text-primary-emphasis");
                    setTimeout(() => {
                        $(".yearly_plan_container").removeClass("d-none");
                        $(".spinner-border").addClass("visually-hidden");
                    }, 400);
                } else {
                    $(".yearly_plan_button").removeClass("text-primary-emphasis");
                    $(".spinner-border").removeClass("visually-hidden");
                    $(".yearly_plan_container").addClass("d-none");
                    $(".monthly_plan_button").addClass("text-primary-emphasis");
                    setTimeout(() => {
                        $(".monthly_plan_container").removeClass("d-none");
                        $(".spinner-border").addClass("visually-hidden");
                    }, 400);
                }
            });
            $(window).resize(function () {
                var isSmallScreen = window.innerWidth < 425;
                $(".featured_list li").toggleClass("p-2", !isSmallScreen);
            });

        });
    </script>
</body>

</html>