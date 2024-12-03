@extends('front.layouts.app')

@section('content')
    <section id="content" class="mx-auto flex min-h-screen w-full max-w-[640px] flex-col gap-8 bg-[#F9F2EF] pb-[120px]">
        <nav class="mt-8 flex w-full items-center justify-between px-4">
            <div class="flex items-center gap-3">
                @auth
                    <div
                        class="flex h-12 w-12 shrink-0 overflow-hidden rounded-full border-4 border-white shadow-[6px_8px_20px_0_#00000008]">
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" class="h-full w-full object-cover object-center"
                            alt="photo">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="tracking-035 text-xs">Welcome!</p>
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                @endauth
                @guest
                    <div
                        class="flex h-12 w-12 shrink-0 overflow-hidden rounded-full border-4 border-white shadow-[6px_8px_20px_0_#00000008]">
                        <img src="assets/photos/pfp.png" class="h-full w-full object-cover object-center" alt="photo">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="tracking-035 text-xs">Welcome!</p>
                        <p class="font-semibold">Ready to take your trip?</p>
                    </div>
                @endguest

            </div>
            <a href="">
                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-full bg-white shadow-[6px_8px_20px_0_#00000008]">
                    <img src="assets/icons/bell.svg" alt="icon">
                </div>
            </a>
        </nav>
        <h1 class="text-center text-2xl font-semibold leading-[36px]">Explore New<br>Experience with Us</h1>
        <div id="categories" class="flex flex-col gap-3">
            <h2 class="px-4 font-semibold">Categories</h2>
            <div class="main-carousel buttons-container">

                @forelse ($categories as $category)
                    <a href="{{ route('front.category', $category->slug) }}"
                        class="group px-2 first-of-type:pl-4 last-of-type:pr-4">
                        <div
                            class="flex items-center gap-2 rounded-[10px] border border-[#4D73FF] p-3 transition-all duration-300 group-hover:bg-[#4D73FF]">
                            <div class="flex h-6 w-6 shrink-0">
                                <img src="{{ Storage::url($category->icon) }}" alt="icon">
                            </div>
                            <span
                                class="text-sm tracking-[0.35px] text-[#4D73FF] transition-all duration-300 group-hover:text-white">{{ $category->name }}</span>
                        </div>
                    </a>
                @empty
                    <p>No categories found</p>
                @endforelse

            </div>
        </div>
        <div id="recommendations" class="flex flex-col gap-3">
            <h2 class="px-4 font-semibold">Trip Recommendation</h2>
            <div class="main-carousel card-container">
                @forelse ($package_tours as $tour)
                    <a href="{{ route('front.details', $tour->slug) }}"
                        class="group px-2 first-of-type:pl-4 last-of-type:pr-4">
                        <div
                            class="flex w-[288px] flex-col gap-3 rounded-[26px] bg-white p-4 shadow-[6px_8px_20px_0_#00000008]">
                            <div class="flex h-[330px] w-full shrink-0 overflow-hidden rounded-xl">
                                <img src="{{ Storage::url($tour->thumbnail) }}" class="h-full w-full object-cover"
                                    alt="thumbnails">
                            </div>
                            <div class="flex justify-between gap-2">
                                <div class="flex flex-col gap-1">
                                    <p class="two-lines font-semibold">{{ $tour->name }}</p>
                                    <div class="flex items-center gap-1">
                                        <div class="flex h-4 w-4 shrink-0">
                                            <img src="assets/icons/location-map.svg" alt="icon">
                                        </div>
                                        <span class="text-darkGrey tracking-035 text-sm">{{ $tour->location }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1 text-right">
                                    <p class="text-sm leading-[21px]">
                                        <span class="text-nowrap font-semibold text-[#4D73FF]">Rp
                                            {{ number_format($tour->price, 0, ',', '.') }}</span><br>
                                        <span class="text-darkGrey">/{{ $tour->days }}days</span>
                                    </p>
                                    <div class="flex items-center justify-end gap-1">
                                        <div class="flex h-4 w-4 shrink-0">
                                            <img src="assets/icons/Star.svg" alt="icon">
                                        </div>
                                        <span class="text-sm font-semibold leading-[21px]">4.8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>No tour packages found</p>
                @endforelse

            </div>
        </div>
        <div id="discover" class="px-4">
            <div class="relative flex h-[130px] w-full flex-col items-center gap-[10px] overflow-hidden rounded-[22px]">
                <img src="assets/backgrounds/Banner.png" class="h-full w-full object-cover object-center" alt="background">
                <div class="absolute left-4 top-1/2 z-10 flex -translate-y-1/2 transform flex-col gap-[10px]">
                    <p class="font-semibold text-white">Discover the<br>Beauty of Indonesia</p>
                    <a href=""
                        class="w-fit rounded-[10px] bg-[#4D73FF] p-[8px_24px] text-xs font-semibold text-white">Discover</a>
                </div>
            </div>
        </div>
        <div id="explore" class="flex flex-col gap-3 px-4">
            <h2 class="font-semibold">More to Explore</h2>
            @forelse ($package_tours as $tour)
                <a href="{{ route('front.details', $tour->slug) }}" class="card">
                    <div class="flex flex-col gap-3 rounded-[26px] bg-white p-4 shadow-[6px_8px_20px_0_#00000008]">
                        <div class="aspect-[311/150] h-full w-full overflow-hidden rounded-xl">
                            <img src="{{ Storage::url($tour->thumbnail) }}"
                                class="h-full w-full object-cover object-center" alt="thumbnail">
                        </div>
                        <div class="flex justify-between gap-2">
                            <div class="flex flex-col gap-1">
                                <p class="two-lines font-semibold">{{ $tour->name }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="flex h-4 w-4 shrink-0">
                                        <img src="assets/icons/location-map.svg" alt="icon">
                                    </div>
                                    <span class="text-darkGrey tracking-035 text-sm">{{ $tour->location }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1 text-right">
                                <p class="text-sm leading-[21px]">
                                    <span class="text-nowrap font-semibold text-[#4D73FF]">Rp
                                        {{ number_format($tour->price, 0, ',', '.') }}</span><br>
                                    <span class="text-darkGrey">/{{ $tour->days }}days</span>
                                </p>
                                <div class="flex items-center justify-end gap-1">
                                    <div class="flex h-4 w-4 shrink-0">
                                        <img src="assets/icons/Star.svg" alt="icon">
                                    </div>
                                    <span class="text-sm font-semibold leading-[21px]">4.8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p>No tour packages found</p>
            @endforelse

        </div>
        <div
            class="navigation-bar fixed bottom-0 z-50 flex h-[85px] w-full max-w-[640px] items-center justify-evenly rounded-t-[25px] bg-white py-[45px]">
            <a href="" class="menu">
                <div class="flex w-fit flex-col justify-center gap-1">
                    <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                        <img src="assets/icons/home.svg" alt="icon">
                    </div>
                    <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Home</p>
                </div>
            </a>
            <a href="" class="menu opacity-25">
                <div class="flex w-fit flex-col justify-center gap-1">
                    <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                        <img src="assets/icons/search.svg" alt="icon">
                    </div>
                    <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Search</p>
                </div>
            </a>
            <a href="schedule.html" class="menu opacity-25">
                <div class="flex w-fit flex-col justify-center gap-1">
                    <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                        <img src="assets/icons/calendar-blue.svg" alt="icon">
                    </div>
                    <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Schedule</p>
                </div>
            </a>
            <a href="" class="menu opacity-25">
                <div class="flex w-fit flex-col justify-center gap-1">
                    <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                        <img src="assets/icons/user-flat.svg" alt="icon">
                    </div>
                    <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Profile</p>
                </div>
            </a>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/flickity-slider.js') }}"></script>
    <script src="{{ asset('js/two-lines-text.js') }}"></script>
@endpush
