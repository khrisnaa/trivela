<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
            rel="stylesheet" />
    </head>

    <body class="font-poppins text-black">
        <section id="content"
            class="mx-auto flex min-h-screen w-full max-w-[640px] flex-col gap-8 bg-[#F9F2EF] pb-[120px]">
            <nav class="mt-8 flex w-full items-center justify-between px-4">
                <a href="details.html">
                    <img src="{{ asset('assets/icons/back.png') }}" alt="back">
                </a>
                <p class="m-auto text-center font-semibold">Booking</p>
                <div class="w-12"></div>
            </nav>
            <form method="POST" action="{{ route('front.book.store', $packageTour->slug) }}"
                class="flex flex-col gap-8">
                @csrf
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Start Date</p>
                    <div
                        class="flex items-center gap-[10px] rounded-[37px] bg-white p-[16px_24px] transition-all duration-300">
                        <input type="date" name="start_date" id="start_date"
                            class="tracking-035 relative w-full appearance-none text-sm leading-[22px] outline-none [&::-webkit-calendar-picker-indicator]:absolute [&::-webkit-calendar-picker-indicator]:h-full [&::-webkit-calendar-picker-indicator]:w-full [&::-webkit-calendar-picker-indicator]:opacity-0">
                        <div class="flex h-6 w-6 shrink-0">
                            <img src="{{ asset('assets/icons/calendar-blue.svg') }}" class="h-full w-full"
                                alt="icon">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Trip Destination</p>
                    <div class="flex items-center gap-3 rounded-[26px] bg-white p-4">
                        <div class="flex h-[72px] w-[72px] shrink-0 overflow-hidden rounded-xl">
                            <img src="{{ Storage::url($packageTour->thumbnail) }}"
                                class="h-full w-full object-cover object-center" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="tracking-035 text-sm font-semibold leading-[22px]">
                                {{ Str::substr($packageTour->name, 0, 15) }}...
                            </p>
                            <div class="flex items-center gap-1">
                                <div class="h-4 w-4">
                                    <img src="{{ asset('assets/icons/location-map.svg') }}" class="h-4 w-4"
                                        alt="icon">
                                </div>
                                <span
                                    class="text-darkGrey tracking-035 text-sm leading-[22px]">{{ $packageTour->location }}</span>
                            </div>
                        </div>
                        <div class="flex flex-1 items-center justify-end gap-2">
                            <button type="button" id="remove-quantity"><img
                                    src="{{ asset('assets/icons/minus-square.svg') }}" alt="icon"></button>
                            <p id="quantity" class="text-sm font-semibold">1</p>
                            <input type="hidden" name="quantity" id="quantity_input" value="1" />
                            <input type="hidden" name="tour_price" id="tour_price" value="{{ $packageTour->price }}" />
                            <button type="button" id="add-quantity"><img
                                    src="{{ asset('assets/icons/add-square.svg') }}" alt="icon"></button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Contact Details</p>
                    <div class="flex flex-col gap-3 rounded-[26px] bg-white p-[16px_24px]">
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Name</p>
                            <p class="font-semibold">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Email</p>
                            <p class="font-semibold">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Phone</p>
                            <p class="font-semibold">+{{ Auth::user()->phone_number }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Payment Summary</p>
                    <div class="flex flex-col gap-3 rounded-[26px] bg-white p-[16px_24px]">
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Sub Total</p>
                            <p id="subtotal" class="text-blue font-semibold"></p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Insurance <span class="text-darkGrey">x<span id="total_quantity"></span></span></p>
                            <p id="insurance" class="text-blue font-semibold"></p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Tax 10%</p>
                            <p id="tax" class="text-blue font-semibold"></p>
                        </div>
                    </div>
                </div>
                <div
                    class="navigation-bar fixed bottom-0 z-50 flex h-[85px] w-full max-w-[640px] items-center justify-between rounded-t-[25px] bg-black px-6 shadow-[-6px_-8px_20px_0_#00000008]">
                    <div class="flex flex-col justify-center gap-1">
                        <p class="tracking-035 text-sm leading-[22px] text-white">Grand Total</p>
                        <p id="grandtotal" class="text-lg font-semibold leading-[26px] tracking-[0.6px] text-[#EED202]">
                        </p>
                    </div>
                    <button type="submit"
                        class="bg-blue w-fit rounded-xl p-[16px_24px] text-white transition-all duration-300 hover:bg-[#06C755]">Booking</button>
                </div>
            </form>
        </section>

        <script src="{{ asset('js/booking.js') }}"></script>
    </body>

</html>
