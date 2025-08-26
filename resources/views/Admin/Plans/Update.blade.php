<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{$category['name']}} {{$plan['name']}} - {{$plan['duration']}} Months Plan</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .choices__list--multiple .choices__item{background-color: #696bfc;border: 1px solid #6869ed;}
        .choices[data-type*=select-multiple] .choices__button, .choices[data-type*=text] .choices__button{border-left: 1px solid #c3c3c3;}
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .font-size-13{font-size:13px;}
        .cursor-not-allowed{cursor: not-allowed;}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <h1 class="text-dark my-2 h2">Edit Plan</h1>
        <h2 class="text-dark my-2 h5">{{$category['name']}} {{$plan['name']}} - {{$plan['duration']}} Months Plan</h2>

        <div class="bg-white p-4 rounded-4 my-4 shadow">

            <div class="mb-3">
                <label class="fw-medium text-dark" for="Category" class="form-label">Category</label>
                <div class="form-control my-2 shadow-sm cursor-not-allowed">{{$category['name']}}</div>
            </div>

            <div class="mb-3">
                <label class="fw-medium text-dark" for="name" class="form-label">Plan Name</label>
                <input type="text" class="form-control my-2 shadow-sm" id="name" placeholder="Enter Name" value="{{$plan['name']}}">
            </div>
            
            <div class="mb-3">
                <label class="fw-medium text-dark" for="duration" class="form-label">Duration (Months)</label>
                <input type="number" class="form-control my-2 shadow-sm" id="duration" placeholder="Enter Duration (Months)" min="1" value="{{$plan['duration']}}">
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Is Yearly - 
                        <span id="enableYearlyText">
                            @if($plan['is_yearly'])
                                Yes
                            @else
                                No
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Add yearly plans</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($plan['is_yearly'])
                            <input class="enabling" id="enableYearly" type="checkbox" checked>
                        @else
                            <input class="enabling" id="enableYearly" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label class="fw-medium text-dark" for="monthlyPrice" class="form-label">
                    <span id="monthOrYearText">{{ $plan['is_yearly'] ? 'Yearly' : 'Monthly' }}</span> Price</label>
                <input type="number" class="form-control my-2 shadow-sm" id="monthlyPrice" placeholder="Enter Monthly Price" min="0" value="{{$plan['price']}}">
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Discount - 
                        <span id="enableDiscountText">
                            @if($plan['has_discount'])
                                Yes
                            @else
                                No
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Provide direct discount to the plan</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($plan['has_discount'])
                            <input class="enabling" id="enableDiscount" type="checkbox" checked>
                        @else
                            <input class="enabling" id="enableDiscount" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            @if($plan['has_discount'])
                <div class="mb-3" id="enableDiscountWrap">
            @else
                <div class="mb-3" id="enableDiscountWrap" style="display:none;">
            @endif
                <label class="fw-medium text-dark" for="discountPercentage" class="form-label">Discount Percentage</label>
                <input type="number" class="form-control my-2 shadow-sm" id="discountPercentage" placeholder="Enter Discount Percentage" min="0" value="{{$plan['discount_percentage']}}">
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Feature Access - 
                        <span id="featureAccessText">
                            @if($plan['feature_restrictions'])
                                Restricted
                            @else
                                Unlimited
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Unlimited (Access to all features). Restricted (Access to selected features only).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($plan['feature_restrictions'])
                            <input class="enabling" id="featureAccess" type="checkbox" checked>
                        @else
                            <input class="enabling" id="featureAccess" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            @if($plan['feature_restrictions'])
                <div class="mb-3" id="featureAccessWrap">
            @else
                <div class="mb-3" id="featureAccessWrap" style="display:none;">
            @endif
                <label class="fw-medium text-dark" for="Features" class="form-label">Features</label>
                <select class="form-control my-2 shadow-sm" id="Features" placeholder="Choose Features" multiple>
                    @foreach($selected_features as $key => $selected_feature)
                        <option value="{{$selected_feature}}" selected>{{$key}}</option>
                    @endforeach
                    @foreach($features as $feature)
                        @if(!in_array($feature['id'], $features_ids->toArray()))
                            <option value="{{$feature['id']}}">{{$feature['name']}}</option>
                        @endif
                    @endforeach
                </select> 
            </div>
            
            <div class="mb-3">
                <label class="fw-medium text-dark" for="description" class="form-label">Short Description (Max. 200 Characters)</label>
                <textarea class="form-control my-2 shadow-sm" name="description" id="description" rows="4" placeholder="Enter Short Description (Max. 200 Characters)">{{$plan['description']}}</textarea>
            </div>

            <div class="mb-3">
                <label class="fw-medium text-dark" for="sortOrder" class="form-label">Sort Order</label>
                <input type="number" class="form-control my-2 shadow-sm" id="sortOrder" placeholder="Enter Sort Order" min="0" value="{{$plan['sort_order']}}">
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Popular - 
                        <span id="isPopularText">
                            @if($plan['is_popular'])
                                Yes
                            @else
                                No
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Yes (Shown as Most Popular)</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($plan['is_popular'])
                            <input id="isPopular" type="checkbox" checked>
                        @else
                            <input id="isPopular" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Status - 
                        <span id="isActiveText">
                            @if($plan['is_active'])
                                Active
                            @else
                                In-active
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($plan['is_active'])
                            <input id="isActive" type="checkbox" checked>
                        @else
                            <input id="isActive" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="w-100 text-end">
                <div class="mb-1 font-size-13 text-danger" id="newPlanFormError"></div>
                <button class="btn btn-primary" id="updatePlan">Update</button>
            </div>

        </div>

    </section>

    @include('parentsidebar.sidebarending')
    
    <script>
        $(document).ready(function () {
            // category choice
            var Category = new Choices('#Category', {
                removeItemButton: false,
                searchEnabled: false
            });
            // features chocie 
            var Features = new Choices('#Features', {
                removeItemButton: true,
                searchEnabled: true
            });
            // enabling 
            $(".enabling").change(function(){
                let id = $(this).attr("id");
                let check = $(this).is(':checked');
                if(check){
                    $("#"+id+"Wrap").show();
                } else {
                    $("#"+id+"Wrap").hide();
                }
            });
            // enable discount 
            $("#enableDiscount").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#enableDiscountText").text("Yes");
                } else {
                    $("#enableDiscountText").text("No");
                }
            });
            // feature access
            $("#featureAccess").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#featureAccessText").text("Restricted");
                } else {
                    $("#featureAccessText").text("Unlimited");
                }
            });
            // is popular 
            $("#isPopular").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#isPopularText").text("Yes");
                } else {
                    $("#isPopularText").text("No");
                }
            });
            // is active 
            $("#isActive").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#isActiveText").text("Active");
                } else {
                    $("#isActiveText").text("In-active");
                }
            });
            // enable yearly 
            $("#enableYearly").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#enableYearlyText").text("Yes");
                    $("#monthOrYearText").text("Yearly");
                } else {
                    $("#enableYearlyText").text("No");
                    $("#monthOrYearText").text("Monthly");
                }
            });
            // update plan 
            $("#updatePlan").click(function(){
                let id = {!! str_replace("'", "\'", json_encode($plan['id'])) !!};
                let name = $("#name").val();
                let duration = $("#duration").val()?parseInt($("#duration").val()):null;
                let monthlyPrice = $("#monthlyPrice").val()?parseInt($("#monthlyPrice").val()):null;
                let enableDiscount = $("#enableDiscount").is(':checked');
                let discountPercentage = $("#discountPercentage").val()?parseInt($("#discountPercentage").val()):null;
                let featureAccess = $("#featureAccess").is(':checked');
                let Features = $("#Features").val();
                let description = $("#description").val();
                let sortOrder = $("#sortOrder").val()?parseInt($("#sortOrder").val()):null;
                let isPopular = $("#isPopular").is(':checked');
                let isActive = $("#isActive").is(':checked');
                let enableYearly = $("#enableYearly").is(':checked');
                if(name){
                    if(duration){
                        if(monthlyPrice){
                            if(enableDiscount && !discountPercentage){
                                $("#newPlanFormError").text("Discount percentage field is required when discount is enabled");
                            } else {
                                if(sortOrder){
                                    $.ajax({
                                        url: '/admin/plans/'+id,
                                        dataType: 'json',
                                        type: 'PATCH',
                                        data: {
                                            category_type: "App\\Models\\SubCategory",
                                            description: description,
                                            discount_percentage: discountPercentage,
                                            duration: duration,
                                            feature_restrictions: featureAccess,
                                            features: Features,
                                            has_discount: enableDiscount,
                                            is_active: isActive,
                                            is_popular: isPopular,
                                            name: name,
                                            is_yearly: enableYearly,
                                            price: monthlyPrice,
                                            sort_order: sortOrder,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(data) {
                                            if(data.success){
                                                window.location.href = "/admin/plans";
                                            }
                                        },
                                        error: function(data, textStatus, errorThrown) {
                                            console.log(textStatus);
                                            console.log(data);
                                        },
                                    });
                                } else {
                                    $("#newPlanFormError").text("Sort order field is required, Please enter sort order");
                                }
                            }
                        } else {
                            $("#newPlanFormError").text("Monthly price field is required, Please enter monthly price");
                        }
                    } else {
                        $("#newPlanFormError").text("Duration field is required, Please enter duration (months)");
                    }
                } else {
                    $("#newPlanFormError").text("Plan name field is required, Please enter plan name");
                }
            });
            // input select  
            $("input, select").change(function(){
                $("#newPlanFormError").text("");
            });
            // ready ends 
        }); 
    </script>
</body>

</html>