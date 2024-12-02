<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Tour') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.package_tours.update', $packageTour) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                            value="{{ $packageTour->name }}" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <img src="{{ Storage::url($packageTour->thumbnail) }}" alt=""
                            class="h-[90px] w-[120px] rounded-2xl object-cover">
                        <x-text-input id="thumbnail" class="mt-1 block w-full" type="file" name="thumbnail" autofocus
                            autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('category')" />

                        <select name="category_id" id="category_id"
                            class="w-full rounded-lg border border-slate-300 py-3 pl-3">
                            <option value="">Choose category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $packageTour->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="w-full rounded-xl border border-slate-300">{{ $packageTour->about }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="mt-1 block w-full" type="text" name="location"
                            value="{{ $packageTour->location }}" required autofocus autocomplete="location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" class="mt-1 block w-full" type="number" name="price"
                            value="{{ $packageTour->price }}" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="days" :value="__('days')" />
                        <x-text-input id="days" class="mt-1 block w-full" type="text" name="days"
                            value="{{ $packageTour->days }}" required autofocus autocomplete="days" />
                        <x-input-error :messages="$errors->get('days')" class="mt-2" />
                    </div>

                    <hr class="my-5">

                    @forelse ($latestPhotos as $photo)
                        <div class="mt-4">
                            <x-input-label for="photo" :value="__('photo')" />
                            <img src="{{ Storage::url($photo->photo) }}" alt=""
                                class="h-[90px] w-[120px] rounded-2xl object-cover">
                            <x-text-input id="photo" class="mt-1 block w-full" type="file" name="photos[]"
                                autofocus autocomplete="photo" />
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>

                    @empty
                        <p>No photo found</p>
                    @endforelse

                    <div class="mt-4 flex items-center justify-end">

                        <button type="submit" class="rounded-full bg-indigo-700 px-6 py-4 font-bold text-white">
                            Update Tour
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
