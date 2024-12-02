{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone')" />
            <x-text-input id="phone_number" class="mt-1 block w-full" type="number" name="phone_number"
                :value="old('phone_number')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Avatar -->
        <div class="mt-4">
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" class="mt-1 block w-full" type="file" name="avatar" :value="old('avatar')"
                required autocomplete="off" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

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
                    <img src="assets/backgrounds/Asset-signup.png" class="h-full w-full object-contain"
                        alt="background">
                </div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                    class="flex w-full flex-col items-center gap-8 rounded-[22px] bg-white p-[24px_16px]">
                    @csrf
                    <div class="flex flex-col gap-1 text-center">
                        <h1 class="text-2xl font-semibold leading-[42px]">Sign Up</h1>
                        <p class="text-darkGrey text-sm leading-[25px] tracking-[0.6px]">Enter valid data to create your
                            account</p>
                    </div>
                    <div class="flex w-full max-w-[311px] flex-col gap-[15px]">
                        <div class="flex w-full flex-col gap-1">
                            <p class="font-semibold">Avatar</p>
                            <div
                                class="flex items-center gap-3 overflow-hidden rounded-xl border border-[#BFBFBF] p-[16px_12px] transition-all duration-300 focus-within:border-[#4D73FF]">
                                <div class="flex h-4 w-4 shrink-0">
                                    <img src="assets/icons/gallery-2.svg" alt="icon">
                                </div>
                                <button type="button" id="upload-file" class="flex items-center gap-3">
                                    <div id="chosse-file-dummy-btn"
                                        class="text-nowrap tracking-035 h-fit rounded-lg border border-[#8D9397] bg-[#F3F4F8] px-2 py-1 text-sm leading-[22px]">
                                        Choose File</div>
                                    <div>
                                        <p id="placeholder"
                                            class="text-nowrap tracking-035 text-left text-sm leading-[22px] text-[#BFBFBF]">
                                            No file chosen</p>
                                        <div id="file-info" class="flex flex-row flex-nowrap items-center gap-3">
                                            <span id="fileName"
                                                class="tracking-035 text-nowrap text-sm leading-[22px]"></span>
                                        </div>
                                    </div>
                                    <input type="file" name="avatar" id="file" class="hidden">
                                </button>
                            </div>
                        </div>
                        <div class="flex w-full flex-col gap-1">
                            <p class="font-semibold">Full Name</p>
                            <div
                                class="flex items-center gap-3 rounded-xl border border-[#BFBFBF] p-[16px_12px] transition-all duration-300 focus-within:border-[#4D73FF]">
                                <div class="flex h-4 w-4 shrink-0">
                                    <img src="assets/icons/user-flat-black.svg" alt="icon">
                                </div>
                                <input type="text" name="name"
                                    class="w-full appearance-none text-sm tracking-[0.35px] outline-none placeholder:text-[#BFBFBF]"
                                    placeholder="Write your full name">
                            </div>
                        </div>
                        <div class="flex w-full flex-col gap-1">
                            <p class="font-semibold">Phone Number</p>
                            <div
                                class="flex items-center gap-3 rounded-xl border border-[#BFBFBF] p-[16px_12px] transition-all duration-300 focus-within:border-[#4D73FF]">
                                <div class="flex h-4 w-4 shrink-0">
                                    <img src="assets/icons/call.svg" alt="icon">
                                </div>
                                <input type="tel" name="phone_number"
                                    class="w-full appearance-none text-sm tracking-[0.35px] outline-none placeholder:text-[#BFBFBF]"
                                    placeholder="Your valid phone number">
                            </div>
                        </div>
                        <div class="flex w-full flex-col gap-1">
                            <p class="font-semibold">Email Address</p>
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
                                <input type="password" id="password" name="password"
                                    class="w-full appearance-none text-sm tracking-[0.35px] outline-none placeholder:text-[#BFBFBF]"
                                    placeholder="Enter your valid password">
                                <button type="button" class="reveal-password flex h-4 w-4 shrink-0"
                                    onclick="togglePasswordVisibility('password', this)">
                                    <img src="assets/icons/password-eye.svg" class="see-password" alt="icon">
                                    <img src="assets/icons/password-eye-slash.svg" class="hide-password hidden"
                                        alt="icon">
                                </button>
                            </div>
                        </div>
                        <div class="flex w-full flex-col gap-1">
                            <p class="font-semibold">Confirm Password</p>
                            <div
                                class="flex items-center gap-3 rounded-xl border border-[#BFBFBF] p-[16px_12px] transition-all duration-300 focus-within:border-[#4D73FF]">
                                <div class="flex h-4 w-4 shrink-0">
                                    <img src="assets/icons/password-lock.svg" alt="icon">
                                </div>
                                <input type="password" id="confirm-password" name="password_confirmation"
                                    class="w-full appearance-none text-sm tracking-[0.35px] outline-none placeholder:text-[#BFBFBF]"
                                    placeholder="Confirm your valid password">
                                <button type="button" class="reveal-password flex h-4 w-4 shrink-0"
                                    onclick="togglePasswordVisibility('confirm-password', this)">
                                    <img src="assets/icons/password-eye.svg" class="see-password" alt="icon">
                                    <img src="assets/icons/password-eye-slash.svg" class="hide-password hidden"
                                        alt="icon">
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full max-w-[311px] rounded-[10px] bg-[#4D73FF] p-[16px_24px] text-center font-semibold text-white transition-all duration-300 hover:bg-[#06C755]">Sign
                        up</button>
                    <p class="tracking-035 text-darkGrey text-center text-sm">Already have account? <a
                            href="{{ route('login') }}" class="font-semibold tracking-[0.6px] text-[#4D73FF]">Sign
                            In</a></p>

                </form>

            </div>
        </section>

        <script src="js/reveal-password.js"></script>
        <script>
            document.getElementById('upload-file').addEventListener('click', function() {
                // Trigger the file input
                document.getElementById('file').click();
            });

            document.getElementById('file').addEventListener('change', function() {
                // Get the file name
                var fileName = this.files[0].name;

                // Update the file name text and show the file info
                document.getElementById('fileName').textContent = fileName;
                document.getElementById('file-info').classList.remove('hidden');
                document.getElementById('placeholder').classList.add('hidden');
                document.getElementById('chosse-file-dummy-btn').classList.add('hidden');
            });
        </script>
    </body>

</html>
