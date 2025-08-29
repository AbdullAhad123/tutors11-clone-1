@if (count($pricing_categories) > 0)
    <style>
        .planChanger:focus{
            --bs-form-switch-bg: url('https://cdn-icons-png.flaticon.com/512/5111/5111178.png') !important;
            border-color: var(--secondary);
        }
        .planChanger:checked {
            background-color: var(--secondary);
            border-color: var(--secondary);
            --bs-form-switch-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e") !important;
        }
        .pricing-section {
            position: relative;
            background: #FFE1FC
        }
    </style>
    <section class="pricing-section py-5" id="pricing_section">
        <div class="section_top_shape_wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="fixed_width position-relative z-1">
            <div class="mt-4">
                <h2 class="display-5 text-center fw-medium my-2 px-2">Pricing & Plans</h2>
                <div class="heading_separator mb-4 mx-auto"></div>
                <p class="fs_5 text-center text-dark fst-italic">Choose the ideal plan to support your child's educational journey.</p>
                <div class="d-flex align-items-center justify-content-center my-3">
                    <h4 class="text-center fw-medium monthly_plan_button text_primary m-0">Monthly Plans</h4>
                    <div class="form-check form-switch fs-4 ms-3">
                        <input class="form-check-input shadow-none planChanger" type="checkbox" role="switch" id="switch_plan_duration_btn" aria-labelledby="yearlyPlanLabel">
                    </div>
                    <h4 class="text-center fw-medium yearly_plan_button m-0" id="yearlyPlanLabel">Yearly Plans</h4>                    
                </div>
            </div>
            <div class="row align-items-center justify-content-center m-0 my-4 mb-5">
                @foreach ($pricing_categories as $category)
                    @foreach ($category['plans'] as $pkey => $plan)
                        <div class="col-12 col-lg-4 col-md-6 col-sm-8 pricing-card
                        @if($plan['duration'] >= 12)
                            yearly
                        @else
                            monthly
                        @endif
                        @if($plan['duration'] >= 12)
                            d-none
                        @endif
                        ">
                            <div class="pricing_cards pb-3 bg-white rounded-4 my-4">{{-- <span class="badge pricing-badges-second rounded-5 m-3 p-2 text-uppercase">{{$category['name']}}</span> --}}<div
                                    class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6"><span
                                                class="badge pricing-badges-second rounded-5 m-3 p-2 text-uppercase">{{ $category['name'] }}</span>
                                        </div>
                                        @if ($plan['popular'])
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end">
                                                <div class="badge pricing-badges-second rounded-5 m-3 p-2 text-uppercase">popular</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="p-3">
                                    <p class="text-dark">{{ $category['category'] }}</p>
                                        @if ($plan['has_discount'])
                                            <div>
                                                <span
                                                class="text-dark text-decoration-line-through">{{ $plan['price'] }}/{{ $plan['is_yearly'] ? 'year' : 'month' }}</span>
                                            <span class="badge bg-black ms-2">{{ $plan['discount_percentage'] }}
                                                Off</span></div>
                                        <h4 class="text-dark">{{ $plan['discounted_price'] }}<span
                                            class="h4">/month</span></h4>
                                        @else
                                        <h4 class="text-dark"> {{ $plan['price'] }}<span class="h4">/{{ $plan['is_yearly'] ? 'year' : 'month' }}</span></h4>
                                        @endif
                                    @if (!$plan['is_yearly'])
                                        <div class="text-black fw-light">
                                            {{ $plan['total_price'] }} for {{ $plan['duration'] }} months
                                        </div>
                                    @endif
                                    <ul class="mb-5 py-1 list-unstyled fw-light">
                                        @foreach ($plan['features'] as $feature)
                                            <li class="p-1 text-dark d-flex align-items-center"><i
                                                    class="fa fa-check fa-xs me-2 text-success"></i>{{ $feature['name'] }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="text-center">
                                        @if (Auth::check())
                                            @if (Auth::user()->hasRole('parent') || Auth::user()->hasRole('teacher'))
                                                <a href="{{ route('change_child') }}"
                                                    class="secondary_btn p-2 px-4 mb-2 bg-primary text-white rounded-5 border-0">Buy</a>
                                            @elseif(Auth::user()->hasRole('student'))
                                                <a href="{{ route('checkout', ['plan' => $plan['code']]) }}"
                                                    class="secondary_btn p-2 px-4 mb-2 bg-primary text-white rounded-5 border-0">Buy</a>
                                            @endif
                                        @else
                                            <a href="{{ route('userlogin') }}"
                                                class="secondary_btn p-2 px-4 mb-2 bg-primary text-white rounded-5 border-0"><span>Buy
                                                </span></a>
                                        @endif <a href="/explore/{{ $category['slug'] }}"
                                            class="border-0 mt-3 text-decoration-none d-block"><span
                                                class="">Explore More <i class="fa fa-chevron-right"
                                                    style="font-size:13px"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="section_down_shape_wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>
@endif