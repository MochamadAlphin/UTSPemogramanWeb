<?php 
include 'header.php';
include 'menu.php';

$infos = [
    [
        'id' => 1,
        'title' => 'Layanan dan Jangkauan Kami',
        'short_desc' => 'Menjelajahi beragam jenis layanan pengiriman dan luasnya area operasional LARI, mulai dari lokal hingga internasional.',
         'image_url' => 'img/jangkauan.jpg',
    ],
    [
        'id' => 2,
        'title' => 'Visi, Misi, dan Budaya Kerja',
        'short_desc' => 'Komitmen LARI untuk menjadi perusahaan ekspedisi terdepan dan nilai-nilai inti yang kami pegang dalam melayani pelanggan.',
         'image_url' => 'img/visi.jpg',
    ],
    [
        'id' => 3,
        'title' => 'Teknologi dan Keamanan Paket',
        'short_desc' => 'Penggunaan teknologi terkini untuk pelacakan real-time dan prosedur keamanan paket yang ketat untuk menjamin kiriman Anda aman.',
         'image_url' => 'img/layanan.jpg',
    ]
];
?>

<div class="p-5 mb-4 bg-light rounded-3 text-center border-custom-primary border-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-custom-primary">LariIn, Layanan Kirim Indonesia</h1>
        <p class="fs-4">Solusi logistik cepat, aman, dan terpercaya untuk semua kebutuhan pengiriman Anda.</p>
        <a class="btn btn-custom-primary btn-lg mt-3" href="detail.php?id=1" role="button">Pelajari Lebih Lanjut Tentang Kami</a>
    </div>
</div>

<h2 class="mb-4 text-center text-custom-primary">Informasi Seputar Perusahaan</h2>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($infos as $info): ?>
        <div class="col">
            <a href="detail.php?id=<?= $info['id'] ?>" class="text-decoration-none">
                <div class="card h-100 shadow-sm card-info border-2">
                    <img src="<?= $info['image_url'] ?>" class="card-img-top" alt="<?= $info['title'] ?>" onerror="this.onerror=null;this.src='https://placehold.co/400x250/a70000/ffffff?text=Placeholder';" style="object-fit: cover; height: 180px;">
                    <div class="card-body">
                        <h5 class="card-title text-custom-primary"><?= $info['title'] ?></h5>
                        <p class="card-text text-muted"><?= $info['short_desc'] ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <small class="text-custom-primary fw-bold">Baca Detail &rarr;</small>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>