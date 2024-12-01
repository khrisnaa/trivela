<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Banks') }}
            </h2>
            <a href="{{ route('admin.package_banks.create') }}"
                class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col gap-y-5 overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">

                @forelse ($package_banks as $package_bank)
                    <div class="item-card flex flex-row items-center justify-between">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($package_bank->logo) }}" alt=""
                                class="h-[90px] w-[90px] rounded-2xl object-cover">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $package_bank->bank_name }}</h3>
                            </div>
                        </div>
                        <div class="hidden flex-col md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $package_bank->created_at->format('M d, Y') }}</h3>
                        </div>
                        <div class="hidden flex-row items-center gap-x-3 md:flex">
                            <a href=" " class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                                Edit
                            </a>
                            <form action=" " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-red-700 px-6 py-4 font-bold text-white">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No banks available at the moment.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
