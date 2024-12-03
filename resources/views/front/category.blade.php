@extends('front.layouts.app')

@section('content')
    <section id="content" class="mx-auto flex min-h-screen w-full max-w-[640px] flex-col gap-8 bg-[#F9F2EF] pb-[120px]">
        <nav class="mt-8 flex w-full items-center justify-between px-4">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/icons/back.png') }}" alt="back">
            </a>
            <p class="m-auto text-center font-semibold">{{ $category->name }}</p>
            <div class="w-12"></div>
        </nav>
        <div class="flex flex-col gap-3 px-4">
            @forelse ($category->tours as $tour)
                <a href="{{ route('front.details', $tour->slug) }}" class="card">
                    <div class="flex flex-col gap-3 rounded-[26px] bg-white p-4">
                        <div class="flex items-center gap-4">
                            <div class="flex h-[92px] w-[92px] shrink-0 overflow-hidden rounded-xl">
                                <img src="{{ Storage::url($tour->thumbnail) }}"
                                    class="h-full w-full object-cover object-center" alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="two-lines font-semibold">{{ $tour->name }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="flex h-4 w-4 shrink-0">
                                        <img src="{{ asset('assets/icons/location-map.svg') }}" alt="icon">
                                    </div>
                                    <span class="text-darkGrey tracking-035 text-sm">{{ $tour->location }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
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
                            <p class="tracking-035 text-sm leading-[22px]">
                                <span class="text-nowrap font-semibold text-[#4D73FF]">Rp
                                    {{ number_format($tour->price, 0, ',', '.') }}</span><span
                                    class="text-darkGrey">/{{ $tour->days }}days</span>
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p>No tours found</p>
            @endforelse

        </div>
    </section>
@endsection

@push('after-scripts')
    <script src="js/two-lines-text.js"></script>
@endpush
