<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Desa Pasirtanjung') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat datang di dashboard!") }}
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 d-flex justify-content-between align-items-center">
                    <span>{{ __("Carousel Wisata") }}</span>
                    <button onclick="location.href='{{ route('carousel.wisata.home') }}'" class="btn btn-primary">Lihat Tabel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 d-flex justify-content-between align-items-center">
                    <span>{{ __("Carousel Kegiatan") }}</span>
                    <button onclick="location.href='{{ route('carousel.kegiatan.home') }}'" class="btn btn-primary">Lihat Tabel</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
