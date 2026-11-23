<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2798ed">
    <title>Pulsa Kita - Pulsa dan Paket Data</title>
    <link rel="stylesheet" href="assets/css/app.css">

<style>
.brand img {
    box-sizing: border-box;
    width: 48px;
    height: 48px;
    padding: 5px;
    background: #fff;
    border: 1px solid rgba(255,255,255,.85);
    border-radius: 9px;
    object-fit: contain;
}
.account-dropdown {
    position: relative;
    display: inline-block;
    color: #fff;
    font-family: inherit;
}
.account-dropdown summary {
    list-style: none;
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 9px 13px;
    border: 1px solid rgba(255,255,255,.38);
    border-radius: 999px;
    background: rgba(255,255,255,.07);
    color: #fff;
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
    white-space: nowrap;
}
.account-dropdown summary::-webkit-details-marker { display: none; }
.account-dropdown summary:hover,
.account-dropdown[open] > summary { background: rgba(255,255,255,.18); }
.account-dropdown-menu {
    display: none;
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    z-index: 9999;
    width: 245px;
    box-sizing: border-box;
    padding: 8px;
    border: 1px solid #e4ebf5;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 14px 35px rgba(22,49,91,.18);
    color: #233a61;
}
.account-dropdown[open] > .account-dropdown-menu { display: block; }
.account-menu-heading {
    padding: 10px 11px 12px;
    border-bottom: 1px solid #edf1f7;
    margin-bottom: 5px;
}
.account-menu-heading strong { display: block; color: #20375c; font-size: 13px; }
.account-menu-heading span { display: block; margin-top: 3px; color: #8290a5; font-size: 11px; font-weight: 500; overflow-wrap: anywhere; }
.account-dropdown-menu .coming-soon,
.account-dropdown-menu button.account-logout {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    box-sizing: border-box;
    padding: 11px;
    border: 0;
    border-radius: 9px;
    background: transparent;
    color: #718096;
    text-align: left;
    font-family: inherit;
    font-size: 12px;
    font-weight: 600;
    line-height: 1.4;
}
.account-menu-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 29px;
    height: 29px;
    flex: 0 0 29px;
    border-radius: 8px;
    background: #eaf5ff;
    color: #1688d7;
    font-size: 15px;
}
.account-menu-tag {
    margin-left: auto;
    padding: 3px 6px;
    border-radius: 999px;
    background: #f0f3f8;
    color: #7d8ba0;
    font-size: 9px;
    white-space: nowrap;
}
.account-menu-divider { height: 1px; margin: 5px 3px; background: #edf1f7; }
.account-dropdown-menu form { display: block; width: 100%; margin: 0; }
.account-dropdown-menu button.account-logout { color: #d34242; cursor: pointer; }
.account-dropdown-menu button.account-logout:hover { background: #fff0f0; }
@media (max-width: 720px) {
    .account-dropdown summary { padding: 8px 10px; font-size: 11px; }
    .account-dropdown-menu { right: -4px; width: min(245px, calc(100vw - 28px)); }
}

        /* Tombol menu hamburger: tidak memakai latar putih bawaan details/summary */
        .account-dropdown {
            position: relative;
            display: inline-block;
            flex: 0 0 auto;
        }
        .account-dropdown > summary {
            box-sizing: border-box;
            display: flex !important;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 42px;
            padding: 0 !important;
            margin: 0;
            border: 1px solid rgba(255,255,255,.42) !important;
            border-radius: 12px !important;
            background: transparent !important;
            color: #fff !important;
            box-shadow: none !important;
            list-style: none;
            cursor: pointer;
        }
        .account-dropdown > summary::-webkit-details-marker { display: none; }
        .account-dropdown > summary::marker { content: ""; }
        .account-dropdown > summary:hover,
        .account-dropdown[open] > summary {
            background: rgba(255,255,255,.16) !important;
        }
        .hamburger-lines {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            width: 21px;
            height: 20px;
        }
        .hamburger-lines > span {
            display: block;
            width: 21px;
            height: 2px;
            border-radius: 2px;
            background: #fff;
        }
        .account-dropdown-menu {
            display: none;
            position: absolute;
            top: calc(100% + 9px);
            right: 0;
            z-index: 9999;
            width: 235px;
            padding: 8px;
            border: 1px solid #e4ebf5;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 14px 35px rgba(22,49,91,.18);
            color: #233a61;
        }
        .account-dropdown[open] > .account-dropdown-menu { display: block; }

    

/* FINAL FIX: hamburger transparan di atas header biru */
.nav-inner > details.account-dropdown {
    display: inline-block !important;
    position: relative !important;
    width: auto !important;
    min-width: 0 !important;
    height: auto !important;
    margin: 0 12px 0 12px !important;
    padding: 0 !important;
    border: 0 !important;
    border-radius: 0 !important;
    background: transparent !important;
    box-shadow: none !important;
}
.nav-inner > details.account-dropdown > summary,
.nav-inner > details.account-dropdown > summary:hover,
.nav-inner > details.account-dropdown[open] > summary {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-sizing: border-box !important;
    width: 48px !important;
    min-width: 48px !important;
    max-width: 48px !important;
    height: 42px !important;
    min-height: 42px !important;
    padding: 0 !important;
    margin: 0 !important;
    border: 1px solid rgba(255,255,255,.45) !important;
    border-radius: 12px !important;
    background: transparent !important;
    color: #fff !important;
    box-shadow: none !important;
    outline: none !important;
    list-style: none !important;
    cursor: pointer !important;
}
.nav-inner > details.account-dropdown > summary::-webkit-details-marker { display: none !important; }
.nav-inner > details.account-dropdown > summary::marker { content: "" !important; }
.nav-inner > details.account-dropdown .hamburger-lines {
    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
    align-items: stretch !important;
    gap: 5px !important;
    width: 21px !important;
    height: 20px !important;
    padding: 0 !important;
    margin: 0 !important;
    background: transparent !important;
}
.nav-inner > details.account-dropdown .hamburger-lines > span {
    display: block !important;
    width: 21px !important;
    min-width: 21px !important;
    height: 2px !important;
    min-height: 2px !important;
    padding: 0 !important;
    margin: 0 !important;
    border: 0 !important;
    border-radius: 2px !important;
    background: #fff !important;
}
.nav-inner > details.account-dropdown > .account-dropdown-menu {
    display: none;
    position: absolute !important;
    top: calc(100% + 9px) !important;
    right: 0 !important;
    z-index: 9999 !important;
    width: 235px !important;
    height: auto !important;
    min-width: 0 !important;
    padding: 8px !important;
    border: 1px solid #e4ebf5 !important;
    border-radius: 14px !important;
    background: #fff !important;
    box-shadow: 0 14px 35px rgba(22,49,91,.18) !important;
}
.nav-inner > details.account-dropdown[open] > .account-dropdown-menu { display: block !important; }


.nav-inner > .brand { order: 0 !important; }
.nav-inner > details.account-dropdown { order: 1 !important; }
.nav-inner > .nav-menu { order: 2 !important; margin-left: auto !important; }
</style>


<style>
/* Posisi header: logo dan hamburger berkelompok di kiri, navigasi di kanan */
.nav-inner {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-start !important;
    gap: 0 !important;
}
.nav-inner > .brand {
    flex: 0 0 auto !important;
    margin-right: 12px !important;
}
.nav-inner > details.account-dropdown {
    order: 2 !important;
    flex: 0 0 auto !important;
    margin: 0 0 0 0 !important;
}
.nav-inner > .nav-menu {
    margin-left: auto !important;
    flex: 0 1 auto !important;
}
@media (max-width: 720px) {
    .nav-inner > .brand { margin-right: 8px !important; }
    .nav-inner > details.account-dropdown { margin-left: 0 !important; }
    .nav-inner > .nav-menu { margin-left: auto !important; }
}
</style>


<style>
/* FINAL: hamburger di ujung kiri, logo di sebelah kanannya */
.nav-inner { display: flex !important; align-items: center !important; justify-content: flex-start !important; }
.nav-inner > details.account-dropdown { order: 0 !important; flex: 0 0 auto !important; margin: 0 12px 0 0 !important; }
.nav-inner > .brand { order: 1 !important; flex: 0 0 auto !important; margin: 0 !important; }
.nav-inner > .nav-menu { order: 2 !important; margin-left: auto !important; flex: 0 1 auto !important; }
.nav-inner > details.account-dropdown > summary { background: transparent !important; }
.nav-inner > details.account-dropdown > summary .hamburger-lines > span { background: #fff !important; }
</style>

<style>
.account-dropdown-menu a.account-menu-link {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    box-sizing: border-box;
    padding: 11px;
    border: 0;
    border-radius: 9px;
    background: transparent;
    color: #718096;
    text-align: left;
    text-decoration: none;
    font-family: inherit;
    font-size: 12px;
    font-weight: 700;
    line-height: 1.4;
    transition: background .18s ease, color .18s ease;
}
.account-dropdown-menu a.account-menu-link:hover {
    background: #edf6ff;
    color: #1688d7;
}
.account-dropdown-menu a.account-menu-link .account-menu-icon { flex: 0 0 29px; }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script defer src="assets/js/app.js"></script>
</head>
<body>
<header class="navbar">
    <div class="container nav-inner">
        <a class="brand" href="index.php" aria-label="Pulsa Kita - Beranda">
            <img src="assets/images/pulsa-kita-logo-icon.png" alt="Logo Pulsa Kita">
            <span class="brand-name">Pulsa <span>Kita</span></span>
        </a>
<nav class="nav-menu" aria-label="Navigasi utama">
            <a href="#produk">Daftar Harga</a>
            <a href="#keunggulan">Keunggulan</a>

            
                <a href="login.php" class="login">Masuk</a>
                <a href="register.php" class="register">Daftar</a>
            


        </nav>
    </div>
</header>

<main>
    <section class="hero" id="beranda">
        <div class="container hero-inner">
            <div>
                <div class="eyebrow">Pulsa dan Paket Data Praktis</div>
                <h1>Isi Pulsa Jadi Lebih Mudah!</h1>
                <p>Pilih pulsa atau paket data sesuai kebutuhanmu. Cek harga dan lakukan pemesanan melalui satu halaman.</p>
                <a href="#pemesanan" class="primary-btn">Pesan Sekarang</a>
            </div>
            <div class="hero-visual">
                <div class="visual-card">
                    <div class="emoji">📱</div>
                    <h3>Pulsa</h3>
                    <p>Isi ulang dengan mudah</p>
                </div>
                <div class="visual-card">
                    <div class="emoji">🌐</div>
                    <h3>Paket Data</h3>
                    <p>Internet untuk aktivitasmu</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container order-wrapper" id="pemesanan">
        <div class="order-box">
            <form class="order-form" id="order-form" action="produk.php" method="GET">
                <div class="field">
                    <label for="phone">Nomor HP Tujuan</label>
                    <div class="phone-wrap">
                        <input type="tel" id="phone" name="phone" placeholder="Contoh: 083812345678"
                               inputmode="numeric" maxlength="13" autocomplete="tel" required>
                        <div id="operator-logo" class="operator-logo" role="img" aria-label="Logo operator"></div>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Cari</button>
            </form>
        </div>
    </section>

    <section class="section intro">
        <div class="container intro-grid">
            <div class="illustration" aria-hidden="true">📲</div>
            <div>
                <h2 class="section-heading">Isi Pulsa dan Paket Data di Pulsa Kita</h2>
                <p class="section-description">Pulsa Kita dirancang untuk memudahkan pemesanan pulsa dan paket data. Masukkan nomor HP tujuan, lalu cari pilihan pulsa atau paket data yang tersedia.</p>
            </div>
        </div>
    </section>

    <section class="section" id="keunggulan">
        <div class="container">
            <h2 class="section-heading">Kenapa Memilih Pulsa Kita?</h2>
            <p class="section-description">Satu halaman untuk membantu pemesanan lebih praktis dan teratur.</p>
            <div class="features">
                <article class="feature">
                    <div class="feature-icon">⚡</div>
                    <h3>Pemesanan Praktis</h3>
                    <p>Masukkan nomor HP dan pilih produk dengan langkah sederhana.</p>
                </article>
                <article class="feature">
                    <div class="feature-icon">💰</div>
                    <h3>Harga Transparan</h3>
                    <p>Harga ditampilkan sebelum pesanan dilanjutkan.</p>
                </article>
                <article class="feature">
                    <div class="feature-icon">📋</div>
                    <h3>Pencatatan Pesanan</h3>
                    <p>Sistem akan dikembangkan dengan pencatatan dan laporan penjualan.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section catalog" id="produk">
        <div class="container">
            <div class="catalog-header">
                <h2 class="section-heading">Daftar Produk</h2>
                <p class="section-description">Contoh produk dan harga untuk demonstrasi website.</p>
            </div>
            <div class="catalog-grid" id="catalog-grid">
                <article class="product" data-operator="Telkomsel" data-type="pulsa" data-value="pulsa-10000">
                    <span class="product-tag">PULSA · TELKOMSEL</span><h3>Pulsa Rp10.000</h3><p>Pulsa reguler Telkomsel</p>
                    <div class="product-bottom"><span class="product-price">Rp12.000</span><button type="button" data-select="pulsa-10000">Pilih</button></div>
                </article>
                <article class="product" data-operator="Indosat" data-type="pulsa" data-value="pulsa-10000">
                    <span class="product-tag">PULSA · INDOSAT</span><h3>Pulsa Rp10.000</h3><p>Pulsa reguler Indosat</p>
                    <div class="product-bottom"><span class="product-price">Rp12.000</span><button type="button" data-select="pulsa-10000">Pilih</button></div>
                </article>
                <article class="product" data-operator="XL" data-type="pulsa" data-value="pulsa-10000">
                    <span class="product-tag">PULSA · XL</span><h3>Pulsa Rp10.000</h3><p>Pulsa reguler XL</p>
                    <div class="product-bottom"><span class="product-price">Rp12.000</span><button type="button" data-select="pulsa-10000">Pilih</button></div>
                </article>
                <article class="product" data-operator="AXIS" data-type="pulsa" data-value="pulsa-10000">
                    <span class="product-tag">PULSA · AXIS</span><h3>Pulsa Rp10.000</h3><p>Pulsa reguler AXIS</p>
                    <div class="product-bottom"><span class="product-price">Rp12.000</span><button type="button" data-select="pulsa-10000">Pilih</button></div>
                </article>
                <article class="product" data-operator="Tri" data-type="pulsa" data-value="pulsa-10000">
                    <span class="product-tag">PULSA · TRI</span><h3>Pulsa Rp10.000</h3><p>Pulsa reguler Tri</p>
                    <div class="product-bottom"><span class="product-price">Rp12.000</span><button type="button" data-select="pulsa-10000">Pilih</button></div>
                </article>
                <article class="product" data-operator="Smartfren" data-type="pulsa" data-value="pulsa-10000">
                    <span class="product-tag">PULSA · SMARTFREN</span><h3>Pulsa Rp10.000</h3><p>Pulsa reguler Smartfren</p>
                    <div class="product-bottom"><span class="product-price">Rp12.000</span><button type="button" data-select="pulsa-10000">Pilih</button></div>
                </article>

                <article class="product" data-operator="Telkomsel" data-type="data" data-value="data-5gb">
                    <span class="product-tag">PAKET DATA · TELKOMSEL</span><h3>Paket Data 5 GB</h3><p>Paket internet Telkomsel</p>
                    <div class="product-bottom"><span class="product-price">Rp25.000</span><button type="button" data-select="data-5gb">Pilih</button></div>
                </article>
                <article class="product" data-operator="Indosat" data-type="data" data-value="data-8gb">
                    <span class="product-tag">PAKET DATA · INDOSAT</span><h3>Paket Data 8 GB</h3><p>Paket internet Indosat</p>
                    <div class="product-bottom"><span class="product-price">Rp30.000</span><button type="button" data-select="data-8gb">Pilih</button></div>
                </article>
                <article class="product" data-operator="XL" data-type="data" data-value="data-5gb">
                    <span class="product-tag">PAKET DATA · XL</span><h3>Paket Data 5 GB</h3><p>Paket internet XL</p>
                    <div class="product-bottom"><span class="product-price">Rp25.000</span><button type="button" data-select="data-5gb">Pilih</button></div>
                </article>
                <article class="product" data-operator="AXIS" data-type="data" data-value="data-6gb">
                    <span class="product-tag">PAKET DATA · AXIS</span><h3>Paket Data 6 GB</h3><p>Paket internet AXIS</p>
                    <div class="product-bottom"><span class="product-price">Rp20.000</span><button type="button" data-select="data-6gb">Pilih</button></div>
                </article>
                <article class="product" data-operator="Tri" data-type="data" data-value="data-6gb">
                    <span class="product-tag">PAKET DATA · TRI</span><h3>Paket Data 6 GB</h3><p>Paket internet Tri</p>
                    <div class="product-bottom"><span class="product-price">Rp20.000</span><button type="button" data-select="data-6gb">Pilih</button></div>
                </article>
                <article class="product" data-operator="Smartfren" data-type="data" data-value="data-5gb">
                    <span class="product-tag">PAKET DATA · SMARTFREN</span><h3>Paket Data 5 GB</h3><p>Paket internet Smartfren</p>
                    <div class="product-bottom"><span class="product-price">Rp25.000</span><button type="button" data-select="data-5gb">Pilih</button></div>
                </article>
            </div>
            <p class="section-description" style="margin-top:18px;font-size:12px">Produk dan harga di atas masih contoh. Belum terhubung ke penyedia pulsa atau paket data.</p>
        </div>
    </section>

    <section class="section faq">
        <div class="container faq-content">
            <h2 class="section-heading">Pertanyaan yang Sering Diajukan</h2>
            <details><summary>Bagaimana operator dideteksi?</summary><p>Sistem membaca awalan nomor HP dan mencocokkannya dengan daftar awalan operator. Hasilnya merupakan perkiraan, bukan pemeriksaan jaringan langsung.</p></details>
            <details><summary>Bagaimana harga pulsa dihitung?</summary><p>Dalam contoh ini, pulsa mendapat tambahan biaya Rp2.000, sedangkan harga paket data tetap sesuai harga yang ditampilkan.</p></details>
            <details><summary>Apakah transaksi sudah diproses?</summary><p>Belum. Website ini masih berupa simulasi tampilan. Pesanan belum disimpan ke database dan belum dikirim ke operator.</p></details>
        </div>
    </section>
</main>

<footer>
    <div class="container footer-inner">
        <div class="footer-brand">
            <img src="assets/images/pulsa-kita-logo-icon.png" alt="Logo Pulsa Kita">
            <div>
                <div class="footer-brand-name">Pulsa <span>Kita</span></div>
                <p>Pemesanan pulsa dan paket data berbasis web.</p>
            </div>
        </div>
        <p>© 2026 Pulsa Kita. Proyek Teknologi Informasi I.</p>
    </div>
</footer>

<button type="button" class="back-to-top" id="back-to-top" aria-label="Kembali ke atas" title="Kembali ke atas">↑</button>

<div class="modal-backdrop" id="order-modal" aria-hidden="true">
    <section class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <div class="modal-head">
            <h2 id="modal-title">Konfirmasi Pesanan</h2>
            <button type="button" class="modal-close" id="modal-close" aria-label="Tutup">×</button>
        </div>
        <p class="modal-note">Periksa detail pesanan sebelum melanjutkan.</p>
        <div class="summary-list">
            <div class="summary-row"><span>Operator</span><strong id="summary-operator">-</strong></div>
            <div class="summary-row"><span>Nomor HP</span><strong id="summary-phone">-</strong></div>
            <div class="summary-row"><span>Produk</span><strong id="summary-product">-</strong></div>
            <div class="summary-row summary-total"><span>Total pembayaran</span><strong id="summary-total">-</strong></div>
        </div>
        <div class="modal-actions">
            <button type="button" class="cancel-btn" id="modal-cancel">Periksa Lagi</button>
            <button type="button" class="confirm-btn" id="modal-confirm">Konfirmasi</button>
        </div>
    </section>
</div>
</body>
</html>
