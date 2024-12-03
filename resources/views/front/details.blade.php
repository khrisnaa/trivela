@extends('front.layouts.app')

@section('content')
    <section id="content" class="mx-auto flex min-h-screen w-full max-w-[640px] flex-col gap-8 bg-[#F9F2EF] pb-[120px]">
        <nav class="mt-8 flex w-full items-center justify-between px-4">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/icons/back.png') }}" alt="back">
            </a>
            <p class="m-auto text-center font-semibold">Details</p>
            <a href="">
                <img src="{{ asset('assets/icons/more-dots.svg') }}" alt="more">
            </a>
        </nav>
        <div id="image-details" class="flex flex-col gap-3 px-4">
            <div class="flex h-[345px] w-full shrink-0 overflow-hidden rounded-xl">
                <img id="image-thumbnail" src="{{ Storage::url($packageTour->thumbnail) }}"
                    class="h-full w-full object-cover object-center" alt="thumbnail">
            </div>
            <div class="mx-auto grid w-fit grid-cols-4 gap-4">
                <a href="{{ Storage::url($packageTour->thumbnail) }}"
                    class="thumbnail-option border-blue mx-auto flex h-[74px] w-[74px] shrink-0 overflow-hidden rounded-xl border-2">
                    <img src="{{ Storage::url($packageTour->thumbnail) }}" class="h-full w-full object-cover object-center"
                        alt="thumbnail">
                </a>

                @foreach ($latestPhotos as $photo)
                    <a href="{{ Storage::url($photo->photo) }}"
                        class="thumbnail-option mx-auto flex h-[74px] w-[74px] shrink-0 overflow-hidden rounded-xl border-2 opacity-50">
                        <img src="{{ Storage::url($photo->photo) }}" class="h-full w-full object-cover object-center"
                            alt="thumbnail">
                    </a>
                @endforeach

            </div>
        </div>
        <div class="mx-4 flex flex-col gap-3 rounded-[22px] bg-white p-[16px_24px]">
            <h1 class="font-semibold">{{ $packageTour->name }}</h1>
            <div class="flex justify-between gap-2">
                <div class="flex items-center gap-2">
                    <div class="flex h-6 w-6 shrink-0 items-center">
                        <img src="{{ asset('assets/icons/location-map.svg') }}" class="h-full w-full object-contain"
                            alt="icon">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-darkGrey text-sm leading-[22px] tracking-[0.35px]">Location</p>
                        <p class="tracking-035 text-sm font-semibold">{{ $packageTour->location }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm leading-[22px] tracking-[0.35px]">Rating</p>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-semibold leading-[22px] tracking-[0.35px]">4.8</span>
                        <div class="flex items-center gap-1">
                            <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                            <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                            <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                            <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                            <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-4 flex flex-col gap-3 rounded-[22px] bg-white p-[16px_24px]">
            <h2 class="font-semibold">About Destination</h2>
            <p id="readMore" class="tracking-035 text-darkGrey text-sm leading-[22px]">
                {{ Str::substr($packageTour->about, 0, 100) }}...
                <button class="text-blue font-semibold"
                    onclick="document.getElementById('readMore').classList.toggle('hidden'); document.getElementById('seeLess').classList.toggle('hidden');">Read
                    More</button>
            </p>
            <p id="seeLess" class="tracking-035 text-darkGrey hidden text-sm leading-[22px]">
                {{ $packageTour->about }}
                <button class="text-blue font-semibold"
                    onclick="document.getElementById('readMore').classList.toggle('hidden'); document.getElementById('seeLess').classList.toggle('hidden');">See
                    Less</button>
            </p>
        </div>
        <div class="mx-4 flex flex-col gap-3 rounded-[22px] bg-white p-[16px_24px]">
            <h2 class="font-semibold">Testimonial</h2>
            <div class="flex flex-col gap-1">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-1">
                        <div
                            class="flex h-12 w-12 shrink-0 overflow-hidden rounded-full border-4 border-white shadow-[6px_8px_20px_0_#00000008]">
                            <img src="{{ asset('assets/photos/pfp2.png') }}"
                                class="h-full w-full object-cover object-center" alt="photo">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="tracking-035 text-sm font-bold leading-[22px]">James Sullivan</p>
                            <p class="text-darkGrey tracking-035 text-xs leading-[20px]">1 week ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <img src="{{ asset('assets/icons/Star.svg') }}" alt="icon">
                        <img src="{{ asset('assets/icons/Star.svg') }}" alt="icon">
                        <img src="{{ asset('assets/icons/Star.svg') }}" alt="icon">
                        <img src="{{ asset('assets/icons/Star.svg') }}" alt="icon">
                        <img src="{{ asset('assets/icons/Star.svg') }}" alt="icon">
                    </div>
                </div>
                <p class="tracking-035 text-darkGrey text-sm leading-[22px]">The view was good, also I really love
                    the weather. It’s very warm and good for healing</p>
            </div>
            <hr>
            <div class="flex gap-4">
                <div class="flex flex-col gap-3">
                    <p class="font-semibold">2.547 <span
                            class="tracking-035 text-darkGrey text-sm font-normal leading-[22px]">Reviews</span>
                    </p>
                    <div class="flex items-center">
                        <div
                            class="-ml-2 flex h-12 w-12 shrink-0 overflow-hidden rounded-full border-4 border-white shadow-[6px_8px_20px_0_#00000008] first-of-type:-ml-1">
                            <img src="{{ asset('assets/photos/pfp2.png') }}"
                                class="h-full w-full object-cover object-center" alt="photo">
                        </div>
                        <div
                            class="-ml-2 flex h-12 w-12 shrink-0 overflow-hidden rounded-full border-4 border-white shadow-[6px_8px_20px_0_#00000008] first-of-type:-ml-1">
                            <img src="{{ asset('assets/photos/pfp3.png') }}"
                                class="h-full w-full object-cover object-center" alt="photo">
                        </div>
                        <div
                            class="-ml-2 flex h-12 w-12 shrink-0 overflow-hidden rounded-full border-4 border-white shadow-[6px_8px_20px_0_#00000008] first-of-type:-ml-1">
                            <img src="{{ asset('assets/photos/pfp4.png') }}"
                                class="h-full w-full object-cover object-center" alt="photo">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <p class="font-semibold">Photo & Video</p>
                    <div class="flex gap-1">
                        <div class="relative flex h-12 w-12 shrink-0 overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/thumbnails/nusa-penida.jpg') }}"
                                class="h-full w-full object-cover object-center" alt="thumbnail">
                        </div>
                        <div class="relative flex h-12 w-12 shrink-0 overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/thumbnails/raja.jpg') }}"
                                class="h-full w-full object-cover object-center" alt="thumbnail">
                        </div>
                        <div class="relative flex h-12 w-12 shrink-0 overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/thumbnails/santorini.jpg') }}"
                                class="h-full w-full object-cover object-center" alt="thumbnail">
                            <div class="absolute flex h-12 w-12 items-center justify-center bg-[#1c273080]">
                                <span class="font-semibold text-white">101+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="" class="text-blue flex items-center justify-between py-2">
                <span class="tracking-035 text-sm font-semibold leading-[22px]">Read 2.546 more review</span>
                <div>
                    <img src="{{ asset('assets/icons/arrow-circle-right.svg') }}" alt="icon">
                </div>
            </a>
        </div>
        <div
            class="navigation-bar fixed bottom-0 z-50 flex h-[85px] w-full max-w-[640px] items-center justify-between rounded-t-[25px] bg-white px-6">
            <div class="flex flex-col justify-center gap-1">
                <p class="text-darkGrey tracking-035 text-sm leading-[22px]">Total Price</p>
                <p class="text-blue text-lg font-semibold leading-[26px] tracking-[0.6px]">Rp
                    {{ number_format($packageTour->price, 0, ',', '.') }}<span
                        class="text-sx tracking-035 text-darkGrey font-normal leading-[20px]">/pack</span></p>
            </div>
            <a href="{{ route('front.book', $packageTour->slug) }}"
                class="bg-blue w-fit rounded-xl p-[16px_24px] text-white transition-all duration-300 hover:bg-[#06C755]">Book
                Now</a>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/details.js') }}"></script>
@endpush
