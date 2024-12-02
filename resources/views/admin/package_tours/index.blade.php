<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Tours') }}
            </h2>
            <a href="{{ route('admin.package_tours.create') }}"
                class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col gap-y-5 overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">

                @forelse ($package_tours as $tour)
                    <div class="item-card flex flex-row items-center justify-between">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($tour->thumbnail) }}" alt=""
                                class="h-[90px] w-[120px] rounded-2xl object-cover">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $tour->name }}</h3>
                                <p class="text-sm text-slate-500">{{ $tour->category->name }}</p>
                            </div>
                        </div>
                        <div class="hidden flex-col md:flex">
                            <p class="text-sm text-slate-500">Price</p>
                            <h3 class="text-xl font-bold text-indigo-950">Rp
                                {{ number_format($tour->price, 0, ',', '.') }}</h3>
                        </div>
                        <div class="hidden flex-col md:flex">
                            <p class="text-sm text-slate-500">Total Days</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $tour->days }} Days</h3>
                        </div>
                        <div class="hidden flex-row items-center gap-x-3 md:flex">
                            <a href="{{ route('admin.package_tours.show', $tour) }}"
                                class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                                Manage
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No tours available at the moment.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
