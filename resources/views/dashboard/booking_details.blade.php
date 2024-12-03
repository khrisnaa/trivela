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
                <a href="{{ route('dashboard.bookings') }}">
                    <img src="{{ asset('assets/icons/back.png') }}" alt="back">
                </a>
                <p class="m-auto text-center font-semibold">Trip Details</p>
                <div class="w-12"></div>
            </nav>
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Detail Trip</p>
                    <div class="flex items-center gap-3 rounded-[26px] bg-white p-4">
                        <div class="flex h-[72px] w-[72px] shrink-0 overflow-hidden rounded-xl">
                            <img src="{{ Storage::url($packageBooking->tour->thumbnail) }}"
                                class="h-full w-full object-cover object-center" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="tracking-035 text-sm font-semibold leading-[22px]">
                                {{ $packageBooking->tour->name }}
                            </p>
                            <div class="flex items-center gap-1">
                                <div class="h-4 w-4">
                                    <img src="{{ asset('assets/icons/calendar-grey.svg') }}" class="h-4 w-4"
                                        alt="icon">
                                </div>
                                <span
                                    class="text-darkGrey tracking-035 text-sm leading-[22px]">{{ $packageBooking->start_date->format('d M, Y') }}
                                    - {{ $packageBooking->end_date->format('d M, Y') }}
                                </span>
                            </div>
                            @if ($packageBooking->is_paid)
                                <div
                                    class="success-badge flex w-fit items-center justify-center rounded-lg border border-[#60A5FA] bg-[#EFF6FF] p-[4px_8px]">
                                    <span class="tracking-035 text-xs leading-[22px] text-[#2563EB]">Success Paid</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Contact Details</p>
                    <div class="flex flex-col gap-3 rounded-[26px] bg-white p-[16px_24px]">
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Name</p>
                            <p class="font-semibold">{{ $packageBooking->customer->name }}</p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Email</p>
                            <p class="font-semibold">{{ $packageBooking->customer->email }}</p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Phone</p>
                            <p class="font-semibold">+{{ $packageBooking->customer->phone_number }}/p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Payment Summary</p>
                    <div class="flex flex-col gap-3 rounded-[26px] bg-white p-[16px_24px]">
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Sub Total</p>
                            <p id="subtotal" class="text-blue font-semibold">Rp
                                {{ number_format($packageBooking->sub_total, 0, ',', '.') }}</p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Insurance <span class="text-darkGrey">x<span
                                        id="total_quantity">{{ $packageBooking->quantity }}</span></span></p>
                            <p id="insurance" class="text-blue font-semibold">Rp
                                {{ number_format($packageBooking->insurance, 0, ',', '.') }}</p>
                        </div>
                        <div class="tracking-035 flex items-center justify-between text-sm leading-[22px]">
                            <p>Tax 10%</p>
                            <p id="tax" class="text-blue font-semibold">Rp
                                {{ number_format($packageBooking->tax, 0, ',', '.') }}</p>
                        </div>
                        <hr>
                        <div class="tracking-035 flex h-[55px] items-center justify-between text-sm leading-[22px]">
                            <p>Total Payment</p>
                            <p id="tax" class="text-lg font-semibold tracking-[0.6px]">Rp
                                {{ number_format($packageBooking->total_amount, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <a href="home.html"
                        class="bg-blue flex w-full items-center justify-center gap-3 rounded-xl p-[16px_24px] text-center text-white transition-all duration-300 hover:bg-[#06C755]">
                        <div class="h-6 w-6">
                            <img src="{{ asset('assets/icons/messages.svg') }}" alt="icon">
                        </div>
                        <span>Contact Travel Agent</span>
                    </a>
                </div>
            </div>
        </section>
    </body>

</html>
