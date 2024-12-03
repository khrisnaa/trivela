<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('./output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
            rel="stylesheet" />
    </head>

    <body class="font-poppins text-black">
        <section id="content"
            class="mx-auto flex min-h-screen w-full max-w-[640px] flex-col gap-8 bg-[#F9F2EF] pb-[120px]">
            <nav class="mt-8 flex w-full items-center justify-between px-4">
                <a href="{{ route('front.index') }}">
                    <img src="{{ asset('assets/icons/back.png') }}" alt="back">
                </a>
                <p class="m-auto text-center font-semibold">Schedule</p>
                <div class="w-12"></div>
            </nav>
            <div class="flex flex-col gap-3 px-4">
                <p class="font-semibold">My Packages</p>

                @forelse (Auth::user()->bookings as $booking)
                    <a href="{{ route('dashboard.booking.details', $booking->id) }}" class="card">
                        <div class="flex items-center gap-4 rounded-[26px] bg-white p-4">
                            <p class="tracking-035 text-center text-sm leading-[22px]"><span
                                    class="text-2xl font-semibold">{{ $booking->start_date->format('d') }}</span> <br>
                                {{ $booking->start_date->format('M') }} <br> {{ $booking->start_date->format('Y') }}</p>
                            <div class="flex items-center gap-4">
                                <div class="flex h-[92px] w-[92px] shrink-0 overflow-hidden rounded-xl">
                                    <img src="{{ Storage::url($booking->tour->thumbnail) }}"
                                        class="h-full w-full object-cover object-center" alt="thumbnail">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <p class="tracking-035 text-sm font-semibold leading-[22px]">
                                        {{ $booking->tour->name }}
                                    </p>
                                    <p class="tracking-035 text-darkGrey text-sm leading-[22px]">
                                        {{ $booking->tour->days }} days | {{ $booking->quantity }} packs</p>
                                    @if ($booking->is_paid)
                                        <div
                                            class="success-badge flex w-fit items-center justify-center rounded-lg border border-[#60A5FA] bg-[#EFF6FF] p-[4px_8px]">
                                            <span class="tracking-035 text-xs leading-[22px] text-[#2563EB]">Success
                                                Paid </span>

                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>No bookings found</p>
                @endforelse

            </div>
            <div
                class="navigation-bar fixed bottom-0 z-50 flex h-[85px] w-full max-w-[640px] items-center justify-evenly rounded-t-[25px] bg-white py-[45px]">
                <a href="{{ route('front.index') }}" class="menu opacity-25">
                    <div class="flex w-fit flex-col justify-center gap-1">
                        <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                            <img src="{{ asset('assets/icons/home.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Home</p>
                    </div>
                </a>
                <a href="" class="menu opacity-25">
                    <div class="flex w-fit flex-col justify-center gap-1">
                        <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                            <img src="{{ asset('assets/icons/search.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Search</p>
                    </div>
                </a>
                <a href="" class="menu">
                    <div class="flex w-fit flex-col justify-center gap-1">
                        <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                            <img src="{{ asset('assets/icons/calendar-blue.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Schedule</p>
                    </div>
                </a>
                <a href="" class="menu opacity-25">
                    <div class="flex w-fit flex-col justify-center gap-1">
                        <div class="mx-auto flex h-4 w-4 shrink-0 overflow-hidden text-[#4D73FF]">
                            <img src="{{ asset('assets/icons/user-flat.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs font-semibold leading-[20px] tracking-[0.35px]">Profile</p>
                    </div>
                </a>
            </div>
        </section>
    </body>

</html>
