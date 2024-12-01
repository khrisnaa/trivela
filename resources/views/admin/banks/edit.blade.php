<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Bank') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.package_banks.update', $packageBank) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="bank_name" :value="__('Bank name')" />
                        <x-text-input id="bank_name" class="mt-1 block w-full" type="text" name="bank_name"
                            value="{{ $packageBank->bank_name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_name" :value="__('Bank account name')" />
                        <x-text-input id="bank_account_name" class="mt-1 block w-full" type="text"
                            name="bank_account_name" value="{{ $packageBank->bank_account_name }}" required autofocus
                            autocomplete="name" />
                        <x-input-error :messages="$errors->get('bank_account_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_number" :value="__('Bank account number')" />
                        <x-text-input id="bank_account_number" class="mt-1 block w-full" type="number"
                            name="bank_account_number" value="{{ $packageBank->bank_account_number }}" required
                            autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('bank_account_number')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <img src="{{ Storage::url($packageBank->logo) }}" alt=""
                            class="h-[90px] w-[90px] rounded-2xl object-cover">
                        <x-text-input id="logo" class="mt-1 block w-full" type="file" name="logo" autofocus
                            autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex items-center justify-end">

                        <button type="submit" class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                            Update Bank
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
