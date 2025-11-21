<?php 
include 'header.php';
include 'menu.php';

$details = [
    1 => [
        'title' => 'Layanan dan Jangkauan Kami',
        'content' => 'LARI Ekspres menawarkan layanan pengiriman darat, laut, dan udara, mencakup lebih dari 500 kota di Indonesia dan beberapa negara di Asia Tenggara. Kami berkomitmen menyediakan opsi pengiriman yang fleksibel dan terjangkau, termasuk layanan Same-Day, Next-Day, dan reguler. Fokus utama kami adalah memastikan paket Anda sampai tepat waktu, di mana pun tujuannya.',
        'image_url' => 'img/jangkauan.jpg',
        'caption' => 'Peta Jaringan Logistik Kami'
    ],
    2 => [
        'title' => 'Visi, Misi, dan Budaya Kerja',
        'content' => 'Visi kami adalah menjadi perusahaan logistik nomor satu di Asia Tenggara yang dikenal karena efisiensi dan inovasi teknologi. Misi kami adalah menghadirkan solusi pengiriman yang transparan dan andal bagi semua pelanggan. Budaya kerja LARI menjunjung tinggi integritas, kecepatan, dan kolaborasi, memastikan setiap anggota tim berdedikasi pada kepuasan pelanggan.',
        'image_url' => 'img/visi.jpg',
        'caption' => 'Tim LARI: Kunci Kecepatan dan Keandalan'
    ],
    3 => [
        'title' => 'Teknologi dan Keamanan Paket',
        'content' => 'Setiap paket di LARI dilengkapi dengan kode pelacakan canggih yang memungkinkan pelanggan memantau lokasi paket secara *real-time* melalui aplikasi kami. Kami menggunakan sistem sortasi otomatis dan CCTV 24 jam di semua gudang. Selain itu, kami menyediakan opsi asuransi penuh untuk menjamin ketenangan pikiran Anda saat mengirimkan barang berharga.',
        'image_url' => 'img/layanan.jpg',
        'caption' => 'Sistem Pelacakan Canggih'
    ]
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$info = $details[$id] ?? $details[1]; 
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="halaman-utama.php" class="text-custom-primary">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $info['title'] ?></li>
            </ol>
        </nav>
        
        <h1 class="display-4 mb-4 text-custom-primary"><?= $info['title'] ?></h1>
    </div>
    
    <div class="col-md-12">
        <div class="card shadow-lg mb-4">
            <img src="<?= $info['image_url'] ?>" class="card-img-top" alt="<?= $info['title'] ?>" onerror="this.onerror=null;this.src='https://placehold.co/800x400/a70000/ffffff?text=Placeholder+Image';" style="object-fit: cover; height: 400px;">
            <div class="card-body">
                <p class="card-text text-muted fst-italic text-center"><?= $info['caption'] ?></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="card p-4 shadow-sm border-custom-primary border-3">
            <h3 class="text-custom-primary mb-3">Detail Lengkap</h3>
            <p class="lead"><?= nl2br($info['content']) ?></p>
            <p class="mt-4">Untuk pertanyaan lebih lanjut, silakan hubungi layanan pelanggan kami atau kunjungi halaman kontak (belum tersedia).</p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>