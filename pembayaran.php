<?php $name=$_GET['name']??'Produk';$operator=$_GET['operator']??'Operator';$phone=$_GET['phone']??'';$type=($_GET['type']??'pulsa')==='data'?'Paket Data':'Pulsa';$price=max(0,(int)($_GET['price']??0));function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');} ?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Pembayaran - Pulsa Kita</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; background: #f4f8fd; color: #20375c; font-family: Arial, Helvetica, sans-serif; }
        .pay-header { background: #2798ed; color: #fff; padding: 20px 16px; }
        .pay-header-inner { width: min(100%, 720px); margin: 0 auto; display: flex; align-items: center; gap: 14px; }
        .back-link { color: #fff; text-decoration: none; font-size: 28px; line-height: 1; width: 38px; }
        .pay-header h1 { margin: 0; font-size: 21px; font-weight: 800; }
        .pay-container { width: min(100% - 32px, 640px); margin: 26px auto 110px; }
        .total-card, .method-card, .info-card { background: #fff; border: 1px solid #e0eaf6; border-radius: 18px; box-shadow: 0 5px 16px rgba(25,55,90,.05); }
        .total-card { padding: 22px; margin-bottom: 24px; }
        .section-label { margin: 0 0 12px; color: #7b8ba3; font-size: 12px; font-weight: 800; letter-spacing: .06em; }
        .total-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        .product-name { margin: 0 0 6px; font-size: 17px; font-weight: 800; }
        .product-meta { margin: 0; color: #7b8ba3; font-size: 13px; line-height: 1.6; }
        .total-price { color: #168ee5; font-size: 25px; font-weight: 900; white-space: nowrap; }
        .method-heading { margin: 0 0 8px; color: #20375c; font-size: 18px; font-weight: 850; }
        .method-subtitle { margin: 0 0 18px; color: #7b8ba3; font-size: 13px; line-height: 1.6; }
        .method-card { overflow: hidden; border-color: #b8dcfb; }
        .method-top { display: flex; align-items: center; gap: 15px; padding: 20px; }
        .qris-logo { display: grid; place-items: center; flex: 0 0 54px; height: 44px; border-radius: 10px; background: #f0f7ff; color: #172f58; font-weight: 950; font-size: 17px; letter-spacing: -.8px; }
        .method-copy { flex: 1; }
        .method-copy strong { display: block; font-size: 16px; }
        .method-copy span { display: block; margin-top: 5px; color: #7b8ba3; font-size: 12px; }
        .selected-pill { padding: 6px 9px; border-radius: 999px; background: #e6f4ff; color: #1684dc; font-size: 11px; font-weight: 800; }
        .method-note { padding: 14px 20px; background: #f8fbff; border-top: 1px solid #eaf1fa; color: #60738e; font-size: 12px; line-height: 1.6; }
        .info-card { margin-top: 18px; padding: 16px 18px; color: #657995; font-size: 12px; line-height: 1.65; }
        .info-card strong { color: #20375c; }
        .pay-bottom { position: fixed; left: 0; right: 0; bottom: 0; padding: 16px 18px max(18px, env(safe-area-inset-bottom)); background: linear-gradient(transparent, rgba(244,248,253,.98) 25%); }
        .pay-button { display: block; width: min(100%, 600px); min-height: 58px; margin: 0 auto; border: 0; border-radius: 999px; background: #2798ed; color: #fff; font-size: 16px; font-weight: 900; cursor: pointer; box-shadow: 0 5px 14px rgba(39,152,237,.22); transition: transform .18s ease, box-shadow .18s ease, background .18s ease; }
        .pay-button:hover { background: #1684dc; transform: translateY(-2px); box-shadow: 0 8px 18px rgba(39,152,237,.28); }
        .pay-button:active { transform: scale(.99); }
        @media (prefers-reduced-motion: reduce) { .pay-button { transition: none; } }
    

        .pay-form { width: min(100%, 600px); margin: 0 auto; }
        .pay-form .pay-button { width: 100%; }
    </style></head><body><header class="pay-header"><div class="pay-header-inner"><a class="back-link" href="javascript:history.back()">‹</a><h1>Metode Pembayaran</h1></div></header><main class="pay-container"><section class="total-card"><p class="section-label">TOTAL PEMBAYARAN</p><div class="total-row"><div><h2 class="product-name"><?= e($name) ?></h2><p class="product-meta"><?= e($operator) ?> · <?= e($type) ?><br>Nomor tujuan: <?= e($phone) ?></p></div><div class="total-price">Rp<?= number_format($price,0,',','.') ?></div></div></section><h2 class="method-heading">Metode pembayaran</h2><p class="method-subtitle">Untuk saat ini, pembayaran hanya tersedia melalui QRIS.</p><section class="method-card"><div class="method-top"><div class="qris-logo">QRIS</div><div class="method-copy"><strong>QRIS</strong><span>Scan menggunakan aplikasi pembayaran yang mendukung QRIS.</span></div></div><div class="method-note">Pembayaran masih berupa simulasi dan belum terhubung ke penyedia pembayaran.</div></section><div class="info-card"><strong>Perhatian:</strong> Ini adalah demonstrasi antarmuka, bukan transaksi sungguhan.</div></main><div class="pay-bottom"><button class="pay-button" onclick="alert('Simulasi pembayaran berhasil ditampilkan. Belum ada transaksi sungguhan.')">LANJUTKAN DENGAN QRIS</button></div></body></html>