<div class="dot-pattern-bg">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">{{ $title }}</span>
            <span class="block mt-2 text-dark">{{ $subtitle }}</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="{{ $button_link }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white hover:opacity-90" style="background-color: #8A9700">
                    {{ $button_text }}
                </a>
            </div>
        </div>
    </div>
</div>
