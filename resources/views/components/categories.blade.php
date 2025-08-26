 <section id="explore" class="explore py-5 mb-5">
    <div class="container">
        <div class="lg:text-center">
            <h2 class="text-base text-secondary font-semibold tracking-wide uppercase">{{ __('Categories') }}</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark sm:text-4xl">
                {{ $category['title'] }}
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                {{ $category['subtitle'] }} 
            </p>
        </div> 

        <div class="row mt-5">
                @foreach($categories as $category)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                    <div class="back py-3 text-center rounded" style="background: #000; height: auto; width: auto;">
                        <h6>{{ $category->name }}</h6>
                        <p class="py-2">{{ $category->category->name }}</p>
                        <a href="{{ route('explore', $category->slug) }}">{{ __('Explore') }}</a>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</section>



