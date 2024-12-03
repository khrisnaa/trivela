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
                <a href="checkout.html">
                    <img src="{{ asset('assets/icons/back.png') }}" alt="back">

                </a>
                <p class="m-auto text-center font-semibold">Payment</p>
                <div class="w-12"></div>
            </nav>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>
                        {{ $error }}
                    </p>
                @endforeach
            @endif
            <form method="POST" action="{{ route('front.book_payment_store', $packageBooking) }}"
                enctype="multipart/form-data" class="flex flex-col gap-8">
                @csrf
                @method('PATCH')
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
                                <span class="text-darkGrey tracking-035 text-sm leading-[22px]">
                                    {{ $packageBooking->start_date->format('M d, Y') . ' - ' . $packageBooking->end_date->format('M d, Y') }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <p class="font-semibold">Payment Transfer to</p>
                    <div class="flex flex-col gap-4 rounded-[26px] bg-white p-[16px_24px]">
                        <div class="flex flex-col gap-1">
                            <p class="text-darkGrey tracking-035 text-sm leading-[22px]">Bank Name</p>
                            <div class="flex items-center gap-2">
                                <div class="flex h-[25px] w-[35px] shrink-0 overflow-hidden">
                                    <img src="{{ Storage::url($packageBooking->bank->logo) }}"
                                        class="h-full w-full object-contain object-center" alt="logo">
                                </div>
                                <span
                                    class="tracking-035 text-sm leading-[22px]">{{ $packageBooking->bank->bank_name }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-darkGrey tracking-035 text-sm leading-[22px]">Bank Account</p>
                            <div class="flex items-center gap-2">
                                <div class="flex h-6 w-6 shrink-0 overflow-hidden">
                                    <img src="{{ asset('assets/icons/bank.svg') }}"
                                        class="h-full w-full object-contain object-center" alt="logo">
                                </div>
                                <span
                                    class="tracking-035 text-sm leading-[22px]">{{ $packageBooking->bank->bank_account_name }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-darkGrey tracking-035 text-sm leading-[22px]">Account Number</p>
                            <div class="flex items-center gap-2">
                                <div class="flex h-6 w-6 shrink-0 overflow-hidden">
                                    <img src="{{ asset('assets/icons/moneys.svg') }}"
                                        class="h-full w-full object-contain object-center" alt="logo">
                                </div>
                                <span id="bank-number" class="tracking-035 text-sm leading-[22px]"
                                    data-value="{{ $packageBooking->bank->bank_account_number }}">{{ $packageBooking->bank->bank_account_number }}</span>
                                <button type="button"
                                    class="tracking-035 text-blue ml-auto w-fit text-sm font-semibold leading-[22px]"
                                    data-copy="bank-number" onclick="copyText(this)">Copy</button>
                            </div>
                        </div>
                        <hr>
                        <div class="flex flex-col gap-1">
                            <p class="text-darkGrey tracking-035 text-sm leading-[22px]">Total Payment</p>
                            <div class="flex items-center justify-between">
                                <span id="total-payment" class="text-lg font-semibold leading-[26px] tracking-[0.6px]"
                                    data-value="{{ $packageBooking->total_amount }}">Rp
                                    {{ number_format($packageBooking->total_amount) }}</span>
                                <button type="button"
                                    class="tracking-035 text-blue ml-auto w-fit text-sm font-semibold leading-[22px]"
                                    data-copy="total-payment" onclick="copyText(this)">Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 px-4">
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold">Transfer Proof</p>
                        <p class="tracking-035 text-darkGrey text-xs leading-[20px]">After you make the transfer, please
                            upload your proof of payment to confirm transaction.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="button" id="upload-file"
                            class="w-full overflow-hidden rounded-[10px] border border-[#BFBFBF] bg-white p-[16px_0_16px_12px]">
                            <p id="placeholder"
                                class="text-nowrap text-darkGrey tracking-035 text-left text-sm leading-[22px]">Upload
                                transfer proof</p>
                            <div id="file-info" class="flex hidden flex-row flex-nowrap items-center gap-3">
                                <div class="flex h-6 w-6 shrink-0">
                                    <img src="{{ asset('assets/icons/gallery.svg') }}" alt="icon">
                                </div>
                                <span id="fileName" class="text-nowrap text-sm">victoria_watson_transfer</span>
                            </div>
                        </button>
                        <input type="file" name="proof" id="file" class="hidden">
                    </div>
                    <div
                        class="bg-blue relative mx-auto flex h-[88px] w-full shrink-0 items-center overflow-hidden rounded-2xl">
                        <img src="{{ asset('assets/icons/moneys.svg') }}" class="h-full object-contain"
                            alt="rewards">
                        <div class="relative z-10 -ml-[38px] flex flex-col">
                            <p class="tracking-035 text-sm leading-[22px] text-white">Claim Your Reward</p>
                            <p class="tracking-035 text-xs leading-[22px] text-white">Checkout today and get reward!
                            </p>
                        </div>
                        <img src="{{ asset('assets/backgrounds/reward-right.png') }}"
                            class="absolute right-0 top-0 h-[53px] w-[73px]" alt="rewards">
                    </div>
                </div>
                <div
                    class="navigation-bar fixed bottom-0 z-50 flex h-[85px] w-full max-w-[640px] items-center justify-between rounded-t-[25px] bg-black px-6 shadow-[-6px_-8px_20px_0_#00000008]">
                    <div class="flex flex-col justify-center gap-1">
                        <p class="tracking-035 text-sm leading-[22px] text-white">Total Payment</p>
                        <p id="grandtotal"
                            class="text-lg font-semibold leading-[26px] tracking-[0.6px] text-[#EED202]">Rp
                            {{ number_format($packageBooking->total_amount) }}</p>
                    </div>
                    <button type="submit" id="confirm-payment"
                        class="bg-blue w-fit rounded-xl p-[16px_24px] text-white transition-all duration-300 hover:bg-[#06C755] disabled:bg-[#BFBFBF]"
                        disabled>Confirm</button>
                </div>
            </form>
        </section>

        <script src="{{ asset('js/payment.js') }}"></script>
    </body>

</html>
