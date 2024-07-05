<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Desa Pasir Tanjung | Beranda</title>
        <link rel="stylesheet" href="styles.css" />
        <link rel="stylesheet" href="normalize.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="logo-lebak-warna.png" alt="" />
                <p>Desa Pasirtanjung</p>
            </div>
            <ul class="nav-links">
                <li><a href="#tentang-desa">Tentang Desa</a></li>
                <li><a href="#data-desa">Data Desa</a></li>
                <li><a href="/wisata">Wisata</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <img class="hero-bg" src="pt-hero-blkng.webp" alt="" />
            <div class="text-elements">
                <h1 class="hero-headline">Pasirtanjung</h1>
                <p class="hero-subheadline">Lebak, Rangkasbitung</p>
            </div>
            <img class="hero-fg" src="pt-hero-depan.webp" alt="" />
        </div>
    </section>

    <section id="tentang-desa" class="tentang-desa">
        <div class="map">
            <img src="map_sementara.png" alt="" />
        </div>
        <div class="about">
            <h1>Tentang Pasirtanjung</h1>
                <p>
                    Desa Pasirtanjung, terletak di Kecamatan Rangkasbitung, Kabupaten
                    Lebak, Banten, adalah sebuah desa dengan pemandangan alam yang indah,
                    termasuk perbukitan, persawahan, dan sungai yang jernih. Penduduknya
                    yang ramah sebagian besar bekerja sebagai petani, peternak, dan
                    pengrajin, dengan kehidupan sosial yang kuat dalam nuansa gotong
                    royong. Desa ini memiliki potensi pariwisata yang besar, seperti
                    wisata alam, budaya, dan edukasi. Infrastruktur desa, termasuk
                    fasilitas pendidikan dan kesehatan, terus ditingkatkan untuk mendukung
                    kesejahteraan warga. Dengan visi menjadi desa yang mandiri, sejahtera,
                    dan berbudaya, Pasirtanjung berkomitmen untuk berkembang dan menjadi
                    destinasi wisata yang menarik.
                </p>
            <button onclick="window.location.href='/about'">Selengkapnya</button>
        </div>
    </section>

    <section class="wisata">
        <img src="water-border.png" alt="" />
        <div class="wisata-container">
            <div class="produk" onclick="window.location.href='/produk'" style="cursor: pointer">
                <img src="produk unggulan.webp" alt="" />
                <h2>Produk Unggulan Desa</h2>
                <p>
                    Lihat produk-produk industri rumahan yang dibawakan <br />
                    oleh warga Pasirtanjung.
                </p>
            </div>
            <span></span>
            <div class="karian" onclick="window.location.href='/wisata'" style="cursor: pointer">
                <img src="kunjungi-karian.webp" alt="" />
                <h2>
                    Kunjungi Kawasan <br />
                    Wisata Terpadu Karian
                </h2>
                <p>
                    Bendungan Karian adalah proyek untuk irigasi serta <br />
                    berpotensi sebagai objek wisata alam.
                </p>
            </div>
        </div>
    </section>

    <section class="wisata-swiper">
        <div class="carousel-wisata">
            <div class="carousel-wisata-slide">
                <div class="carousel-wisata-item active">
                    <img src="banner-trekking.webp" alt="">
                    <div class="carousel-wisata-text">
                        <p>Jelajahi Pasir Tanjung</p>
                        <h1>Trekking<br/>di Karian</h1>
                    </div>
                </div>
                <div class="carousel-wisata-item">
                    <img src="banner-jelajahi.webp" alt="">
                    <div class="carousel-wisata-text">
                        <p>Jelajahi Pasir Tanjung</p>
                        <h1>Wisata<br/>Perahu</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="kegiatan-masyarakat">
        <div class="carousel-kegiatan">
            <div class="carousel-kegiatan-slide">
                <div class="carousel-kegiatan-item active">
                    <div class="carousel-kegiatan-text">
                        <p>Kegiatan Warga</p>
                        <br/>
                        <h2>Pelatihan Marketing Bersama Anggota PKK</h2>
                        <p>
                            Pada tanggal 26 Juni 2024, anggota PKK Pasirtanjung menyelenggarakan
                            pelatihan tentang pengetahuan pemasaran yang dibawakan oleh mahasiswa
                            Universitas Pradita yang sedang melakukan KKN. Pelatihan ini bertujuan
                            untuk meningkatkan pengetahuan anggota PKK tentang pemasaran, sehingga
                            mereka dapat lebih baik dalam menjual produk unggulan desa Pasirtanjung
                            yang dibuat oleh warga. Dengan adanya pelatihan ini, diharapkan anggota
                            PKK dapat mengembangkan strategi pemasaran yang efektif dan mampu
                            meningkatkan ekonomi dan kualitas produk masyarakat desa.
                        </p>
                    </div>
                    <div class="carousel-kegiatan-image">
                        <img src="pelatihan-p2k.webp" alt="">
                    </div>
                </div>
                <div class="carousel-kegiatan-item">
                    <div class="carousel-kegiatan-text">
                        <p>Kegiatan Warga</p>
                        <br/>
                        <h2>Perawatan Kawasan Wisata<br/>Terpadu Bendungan Karian</h2>
                        <p>
                            Pengurus kawasan wisata terpadu Bendungan Karian secara rutin melakukan<br/>
                            perawatan dan pembukaan jalan yang digunakan untuk trekking. Setidaknya<br/>
                            sekali sebulan, mereka membersihkan dan memperbaiki jalur trekking agar<br/>
                            tetap aman dan nyaman bagi para pengunjung. Upaya ini bertujuan untuk<br/>
                            meningkatkan kenyamanan wisatawan serta menjaga keindahan dan<br/>
                            kelestarian alam di sekitar Bendungan Karian. Dengan demikian, pengunjung<br/>
                            dapat menikmati pengalaman trekking yang lebih baik sambil menikmati<br/>
                            keindahan alam yang terawat dengan baik.
                        </p>
                    </div>
                    <div class="carousel-kegiatan-image">
                        <img src="perawatan-karian.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="data-desa-spanduk">
        <div class="data-desa-banner">
            <img class="data-desa-image" src="water-border.png" alt="" />
            <div class="data-desa-text">
                <p class="data-desa-subheadline">Data Desa</p>
                <h1 class="data-desa-headline">Pasirtanjung</h1>
            </div>
        </div>
    </section>

    <section id="data-desa" class="data-desa">
        <div class="data-desa-info">
            <h2>Data Desa<br/>Pasirtanjung</h2>
            <p>Kecamatan Rangkasbitung, Kabupaten Lebak, Provinsi Banten, Indonesia.<br/>
            Kantor Pengurus Desa: Pasirtanjung, Kec. Rangkasbitung, Kabupaten Lebak, Banten 42312 </p>
        </div>
        <div class="cardbase">
            <div class="card-left">
                <div class="text-container">
                    <h2>Visi</h2>
                </div>
                <div class="text-container-bottom-left">
                    <h2>Misi</h2>
                </div>
            </div>
            <div class="card-right">
                <div class="text-container">
                    <p>Menjadi desa yang mandiri, sejahtera, dan berbudaya dengan mengedepankan partisipasi aktif seluruh warga dalam pembangunan desa.</p>
                </div>
                <div class="text-container">
                    <p>1. Meningkatkan kualitas pendidikan dan kesehatan bagi seluruh warga desa.<br/>
                       2. Mengembangkan potensi ekonomi lokal melalui penguatan sektor pertanian, peternakan, dan kerajinan tangan.<br/>
                       3. Melestarikan nilai-nilai budaya dan tradisi lokal sebagai identitas desa.<br/>
                       4. Meningkatkan infrastruktur dan fasilitas umum untuk mendukung kesejahteraan masyarakat.<br/>
                       5. Mendorong partisipasi aktif masyarakat dalam proses pembangunan dan pengambilan keputusan.<br/>
                       6. Memperkuat sinergi dengan pemerintah, swasta, dan komunitas dalam pengembangan desa.<br/>
                       7. Mengembangkan potensi pariwisata desa untuk meningkatkan perekonomian lokal.<br/>
                       8. Mewujudkan tata kelola pemerintahan desa yang transparan dan akuntabel.</p>
                </div>
            </div>
        </div>
        <button onclick="window.location.href='/about'">Hubungi Kami</button>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
