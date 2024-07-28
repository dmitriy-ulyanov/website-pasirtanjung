<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Desa Pasirtanjung') }}
        </h2>
    </x-slot>

    <div id="carouselWisata" class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>{{ __("Create Slide Carousel Wisata") }}</h1>
                    </div>
                    <form action="{{ route('carouselwisata.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Judul"></label>
                            <input type="text" name="judul" class="form-control">
                            @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Gambar"></label>
                            <input type="file" name="gambar" class="form-control">
                            @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>
