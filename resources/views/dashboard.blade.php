<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Desa Pasirtanjung') }}
        </h2>
    </x-slot>

<body>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat datang di dashboard!") }}
        </div>
    </div>

    <div id="carouselWisata" class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>{{ __("Carousel Wisata") }}</h1>
                        <a href="/carousel/wisata/create" class="btn btn-success btn-sm">Tambah Slide</a>
                    </div>
                    <script>
                        // Mendeklarasikan array dan mengisinya dengan data dari server
                        var datacarouselwisata = @json($datacarouselwisata);

                        console.log(datacarouselwisata);

                        // Example to show how you might use the data
                        datacarouselwisata.forEach(function(slidewisata) {
                            console.log("ID: " + slidewisata.id);
                            console.log("Judul: " + slidewisata.judul);
                            console.log("Gambar: " + slidewisata.gambar);
                        });
                    </script>
                    <table id="tabel_carousel_wisata" class="table table-striped table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datacarouselwisata as $slidewisata)
                                <tr>
                                    <td>{{ $slidewisata->id }}</td>
                                    <td>{{ $slidewisata->judul }}</td>
                                    <td><img src="{{ asset('storage/public/' . $slidewisata->gambar) }}" alt="{{ $slidewisata->judul }}" style="max-width: 100px;"></td>
                                    <td>
                                        <a href="{{ route('carouselwisata.edit', $slidewisata->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('carouselwisata.destroy', $slidewisata->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        // Mendeklarasikan array dan mengisinya dengan data dari server
                        var datacarouselwisata = @json($datacarouselwisata);

                        console.log(datacarouselwisata);

                        // Example to show how you might use the data in JavaScript for additional functionality
                        datacarouselwisata.forEach(function(slidewisata) {
                            console.log("ID: " + slidewisata.id);
                            console.log("Judul: " + slidewisata.judul);
                            console.log("Gambar: " + slidewisata.gambar);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</body>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>
