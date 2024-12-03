@extends('front.layouts.app')

@section('content')
    <section id="content" class="bg-blue mx-auto min-h-screen w-full max-w-[640px]">
        <div class="flex min-h-screen w-full flex-col items-center justify-center gap-8 px-[28px] py-[46px]">
            <div class="relative mx-1 w-[calc(100%-26px)] overflow-hidden rounded-[20px]">
                <img src="{{ asset('assets/backgrounds/Success-Illustration.png') }}" class="h-full w-full object-contain"
                    alt="background">
            </div>
            <div class="mx-auto flex w-[319px] flex-col items-center gap-2 text-center">
                <p class="text-[24px] font-semibold leading-[36px] text-white">Transaction Success</p>
                <p class="text-white">Ready to go! don't forget to check<br>your trip on Schedule Page</p>
            </div>
            <a href="{{ route('dashboard.bookings') }}"
                class="text-blue w-full rounded-xl bg-white p-[16px_24px] text-center font-semibold transition-all duration-300 hover:bg-[#06C755] hover:text-white">Check
                Schedule Page</a>
        </div>
    </section>
@endsection
