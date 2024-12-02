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
        <section id="content" class="mx-auto min-h-screen w-full max-w-[640px] bg-[#F9F2EF]">
            <div class="flex min-h-screen w-full flex-col items-center justify-center gap-8 px-4 py-[46px]">
                <div class="relative w-[calc(100%-26px)] overflow-hidden rounded-[20px]">
                    <img src="assets/backgrounds/Asset.png" class="h-full w-full object-contain" alt="background">
                </div>
                <form method="POST" action="{{ route('login') }}"
                    class="flex w-full flex-col items-center gap-8 rounded-[22px] bg-white p-[24px_16px]">
                    @csrf
                    <div class="flex flex-col gap-1 text-center">
                        <h1 class="text-2xl font-semibold leading-[42px]">Sign In</h1>
                        <p class="text-darkGrey text-sm leading-[25px] tracking-[0.6px]">Welcome Back! Enter your valid
                            data</p>
                    </div>
                    <div class="flex w-full max-w-[311px] flex-col gap-[15px]">
                        <div class="flex w-full flex-col gap-1">
                            <p class="font-semibold">Email</p>
                            <div
                                class="flex items-center gap-3 rounded-xl border border-[#BFBFBF] p-[16px_12px] transition-all duration-300 focus-within:border-[#4D73FF]">
                                <div class="flex h-4 w-4 shrink-0">
                                    <img src="assets/icons/sms.svg" alt="icon">
                                </div>
                                <input type="email" name="email"
                                    class="w-full appearance-none text-sm tracking-[0.35px] outline-none placeholder:text-[#BFBFBF]"
                                    placeholder="Your email address">
                            </div>
                        </div>
                        <div class="flex w-full flex-col gap-1">
                            <p class="font-semibold">Password</p>
                            <div
                                class="flex items-center gap-3 rounded-xl border border-[#BFBFBF] p-[16px_12px] transition-all duration-300 focus-within:border-[#4D73FF]">
                                <div class="flex h-4 w-4 shrink-0">
                                    <img src="assets/icons/password-lock.svg" alt="icon">
                                </div>
                                <input type="password" name="password"
                                    class="w-full appearance-none text-sm tracking-[0.35px] outline-none placeholder:text-[#BFBFBF]"
                                    placeholder="Enter your valid password">
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full max-w-[311px] rounded-[10px] bg-[#4D73FF] p-[16px_24px] text-center font-semibold text-white transition-all duration-300 hover:bg-[#06C755]">Sign
                        In</button>
                    <p class="tracking-035 text-darkGrey text-center text-sm">Don’t have account? <a
                            href="{{ route('register') }}" class="font-semibold tracking-[0.6px] text-[#4D73FF]">Sign
                            Up</a></p>
                </form>
            </div>
        </section>
    </body>

</html>
