<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Bookings') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col gap-y-5 overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">

                @forelse ($package_bookings as $booking)
                    <div class="item-card flex flex-row items-center justify-between">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($booking->tour->thumbnail) }}" alt=""
                                class="h-[90px] w-[120px] rounded-2xl object-cover">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $booking->tour->name }}</h3>
                                <p class="text-sm text-slate-500">{{ $booking->tour->category->name }}</p>
                            </div>
                        </div>

                        @if ($booking->is_paid)
                            <span class="w-fit rounded-full bg-green-500 px-3 py-2 text-sm font-bold text-white">
                                SUCCESS
                            </span>
                        @else
                            <span class="w-fit rounded-full bg-orange-500 px-3 py-2 text-sm font-bold text-white">
                                PENDING
                            </span>
                        @endif

                        <div class="hidden flex-col md:flex">
                            <p class="text-sm text-slate-500">Price</p>
                            <h3 class="text-xl font-bold text-indigo-950">Rp
                                {{ number_format($booking->total_amount, 0, ',', '.') }}</h3>
                        </div>
                        <div class="hidden flex-col md:flex">
                            <p class="text-sm text-slate-500">Total Days</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $booking->tour->days }} Days</h3>
                        </div>
                        <div class="hidden flex-col md:flex">
                            <p class="text-sm text-slate-500">Quantity</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $booking->quantity }} People</h3>
                        </div>
                        <div class="hidden flex-row items-center gap-x-3 md:flex">
                            <a href="{{ route('admin.package_bookings.show', $booking) }}"
                                class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p>No bookings found</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
