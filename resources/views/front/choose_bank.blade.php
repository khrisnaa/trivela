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
        <section id="content" class="mx-auto flex min-h-screen w-full max-w-[640px] flex-col gap-8 bg-[#F9F2EF] pb-8">
            <nav class="mt-8 flex w-full items-center justify-between px-4">
                <a href="booking.html">
                    <img src="{{ asset('assets/icons/back.png') }}" alt="back">
                </a>
                <p class="m-auto text-center font-semibold">Checkout</p>
                <div class="w-12"></div>
            </nav>
            <div class="flex h-full flex-1 flex-col justify-center gap-8 px-4">
                <div class="flex w-full shrink-0 px-[35px]">
                    <img src="{{ asset('assets/backgrounds/Bank-Account-Illustration.png') }}" class="object-contain"
                        alt="background">
                </div>

                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>
                            {{ $error }}
                        </p>
                    @endforeach
                @endif --}}

                <form method="POST" action="{{ route('front.choose_bank_store', $packageBooking) }}"
                    class="flex flex-col gap-8">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col gap-3">
                        <p class="font-semibold">Payment Method</p>
                        @foreach ($banks as $bank)
                            <div class="rounded-[26px] bg-white p-[16px_24px]">
                                <label for="bca" class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-[25px] w-[35px] shrink-0 overflow-hidden">
                                            <img src="{{ Storage::url($bank->logo) }}"
                                                class="h-full w-full object-contain object-center" alt="logo">
                                        </div>
                                        <span class="tracking-035 text-sm leading-[22px]">{{ $bank->bank_name }}
                                            Transfer</span>
                                    </div>
                                    <input type="radio" name="package_bank_id" id="{{ $bank->id }}"
                                        value="{{ $bank->id }}"
                                        class="h-5 w-5 appearance-none rounded-full ring-2 ring-[#6E5DE7] checked:border-[3px] checked:border-solid checked:border-white checked:bg-[#6E5DE7]">
                                </label>
                            </div>
                        @endforeach

                    </div>
                    <button type="submit"
                        class="bg-blue w-full rounded-xl p-[16px_24px] text-center text-white transition-all duration-300 hover:bg-[#06C755]">Checkout</button>
                </form>
            </div>
        </section>
    </body>

</html>
