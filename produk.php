<?php
$phone = preg_replace('/[^0-9]/', '', $_GET['phone'] ?? '');
$type = ($_GET['type'] ?? 'pulsa') === 'data' ? 'data' : 'pulsa';
$operatorRules = [
 ['Telkomsel',['0811','0812','0813','0821','0822','0823','0851','0852','0853'],'#e53935'],
 ['Indosat',['0814','0815','0816','0855','0856','0857','0858'],'#f4a900'],
 ['XL',['0817','0818','0819','0859','0877','0878'],'#1769d2'],
 ['AXIS',['0831','0832','0833','0838'],'#6a1b9a'],
 ['Tri',['0895','0896','0897','0898','0899'],'#ed1c24'],
 ['Smartfren',['0881','0882','0883','0884','0885','0886','0887','0888','0889'],'#d62828']
];
$operator='Operator'; $operatorColor='#168ee5'; foreach($operatorRules as $rule){foreach($rule[1] as $prefix){if(str_starts_with($phone,$prefix)){$operator=$rule[0];$operatorColor=$rule[2];break 2;}}}
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="theme-color" content="#2798ed"><title>Pilih Produk - Pulsa Kita</title><link rel="stylesheet" href="assets/css/app.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><style>
        .results-hero{position:relative;overflow:hidden;padding:42px 0 38px;background:linear-gradient(120deg,#168ee5 0%,#367ed0 48%,#5366a5 100%);color:#fff}
        .results-hero:before,.results-hero:after{content:"";position:absolute;border-radius:50%;pointer-events:none;background:rgba(255,255,255,.08)}
        .results-hero:before{width:320px;height:320px;right:5%;top:-190px}
        .results-hero:after{width:220px;height:220px;right:22%;bottom:-170px}
        .results-hero .container{position:relative;z-index:1}
        .results-eyebrow{display:inline-flex;align-items:center;gap:8px;margin-bottom:12px;padding:6px 11px;border:1px solid rgba(255,255,255,.28);border-radius:999px;background:rgba(255,255,255,.12);font-size:12px;font-weight:800;letter-spacing:.04em}
        .results-hero h1{font-size:clamp(28px,4vw,42px);line-height:1.15;letter-spacing:-.03em;margin:0 0 12px}
        .results-hero p{margin:6px 0;color:rgba(255,255,255,.92);font-size:15px}
        .results-topline{display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap}
        .results-phone{display:inline-flex;gap:13px;align-items:center;margin-top:20px;padding:10px 15px 10px 10px;background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.32);border-radius:15px;font-weight:800;box-shadow:0 8px 20px rgba(20,53,106,.08)}
        .operator-card{position:relative;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:2px;width:48px;height:34px;border-radius:8px;background:linear-gradient(135deg,#fff,#e5f2ff);color:#1684dc;box-shadow:0 3px 8px rgba(16,45,92,.14);font-size:10px;font-weight:900;letter-spacing:.02em;overflow:hidden}
        .operator-card:before{content:"";position:absolute;top:0;left:0;width:100%;height:4px;background:var(--operator-color,#168ee5)}
        .operator-card small{font-size:7px;letter-spacing:.04em}
        .target-number{font-size:16px;letter-spacing:.01em}
        .nav-menu a.back-link{display:inline-flex;align-items:center;margin:0;color:#fff;opacity:1;padding:10px 14px;border:1px solid rgba(255,255,255,.3);border-radius:999px;background:rgba(255,255,255,.1);font-weight:800;text-decoration:none;transition:background .2s,transform .2s}
        .nav-menu a.back-link:hover{background:rgba(255,255,255,.2);transform:translateY(-1px)}
        
        .results-main{padding:34px 0 76px;min-height:55vh;background:linear-gradient(180deg,#f4f8fd 0%,#f8faff 100%)}
        .results-heading{display:flex;justify-content:space-between;align-items:end;gap:16px;flex-wrap:wrap;margin-bottom:20px}
        .results-heading h2{margin:0 0 5px;font-size:22px;letter-spacing:-.02em;color:#172f58}
        .results-heading p{margin:0;color:#718096;font-size:14px}
        .results-count{display:inline-flex;align-items:center;gap:7px;padding:8px 11px;border-radius:999px;background:#e5f2ff;color:#1677c9;font-size:12px;font-weight:800}
        .results-tabs{display:inline-flex;gap:8px;margin-bottom:24px;padding:6px;background:#e9f0f9;border:1px solid #dce7f4;border-radius:15px;flex-wrap:wrap}
        .results-tab{display:inline-flex;align-items:center;justify-content:center;gap:9px;border:1px solid transparent;border-radius:11px;padding:12px 19px;background:transparent;color:#435570;font-size:14px;font-weight:800;cursor:pointer;transition:background .22s,color .22s,transform .22s,box-shadow .22s}
        .results-tab .tab-icon{font-size:17px}
        .results-tab.active{background:#2798ed;color:#fff;box-shadow:0 7px 16px rgba(39,152,237,.23)}
        .results-tab:not(.active):hover{background:#fff;color:#1677c9;transform:translateY(-1px)}
        .results-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(235px,1fr));gap:18px}
        .result-card{position:relative;overflow:hidden;display:flex;flex-direction:column;min-height:282px;background:#fff;border:1px solid #e0e9f5;border-radius:19px;padding:22px;box-shadow:0 8px 25px rgba(25,55,90,.055);transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease;animation:card-enter .45s both}
        .result-card:before{content:"";position:absolute;inset:0 0 auto;height:4px;background:linear-gradient(90deg,#2798ed,#68c8ff);transform:scaleX(0);transform-origin:left;transition:transform .25s ease}
        .result-card:hover{transform:translateY(-6px);box-shadow:0 18px 36px rgba(25,55,90,.12);border-color:#b8dcfb}
        .result-card:hover:before{transform:scaleX(1)}
        .result-card-top{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:18px}
        .product-tag{display:inline-flex;align-items:center;gap:6px;padding:7px 10px;border-radius:9px;background:#eaf5ff;color:#1684dc;font-size:10px;font-weight:900;letter-spacing:.07em}
        .result-card-icon{display:grid;place-items:center;width:42px;height:42px;border-radius:13px;background:linear-gradient(135deg,#eaf5ff,#dceeff);font-size:22px}
        .result-card h3{margin:0 0 8px;color:#19345b;font-size:18px;letter-spacing:-.02em}
        .result-card p{color:#718096;margin:0 0 20px;font-size:13px;line-height:1.65}
        .result-price-label{font-size:11px;color:#8997aa;margin-top:auto;margin-bottom:3px}
        .result-price{font-size:25px;letter-spacing:-.03em;font-weight:900;color:#168ee5;margin-bottom:17px}
        .result-buy{display:flex;align-items:center;justify-content:center;gap:9px;width:100%;border:0;border-radius:11px;padding:13px 14px;background:#142f77;color:#fff;font-size:13px;font-weight:800;cursor:pointer;transition:background .2s,transform .2s,box-shadow .2s}
        .result-buy:hover{background:#168ee5;transform:translateY(-1px);box-shadow:0 8px 18px rgba(22,142,229,.22)}
        .result-buy span{transition:transform .2s}.result-buy:hover span{transform:translateX(3px)}
        .results-note{display:flex;align-items:flex-start;gap:10px;margin-top:24px;padding:14px 16px;border:1px solid #dce8f5;border-radius:13px;background:rgba(255,255,255,.72);color:#748399;font-size:12px;line-height:1.6}
        .results-note strong{color:#50627a}
        .result-empty{grid-column:1/-1;background:#fff;padding:24px;border-radius:12px;color:#65758b}
        @keyframes card-enter{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
        @media(max-width:640px){.results-hero{padding:30px 0 28px}.results-topline{display:block}.results-phone{margin-top:16px}.results-main{padding:26px 0 50px}.results-heading h2{font-size:20px}.results-tabs{display:flex;width:100%}.results-tab{flex:1;padding:11px 10px}.results-grid{grid-template-columns:1fr}.result-card{min-height:0}}
        @media(prefers-reduced-motion:reduce){.result-card,.results-tab,.result-buy,.back-link{animation:none!important;transition:none!important}}
    
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


/* FINAL: hamburger di ujung kiri, logo di sebelah kanannya */
.nav-inner { display: flex !important; align-items: center !important; justify-content: flex-start !important; }
.nav-inner > details.account-dropdown { order: 0 !important; flex: 0 0 auto !important; margin: 0 12px 0 0 !important; }
.nav-inner > .brand { order: 1 !important; flex: 0 0 auto !important; margin: 0 !important; }
.nav-inner > .nav-menu { order: 2 !important; margin-left: auto !important; flex: 0 1 auto !important; }
.nav-inner > details.account-dropdown > summary { background: transparent !important; }
.nav-inner > details.account-dropdown > summary .hamburger-lines > span { background: #fff !important; }


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
</style></head><body>
<header class="navbar"><div class="container nav-inner"><a class="brand" href="index.php"><img src="assets/images/pulsa-kita-logo-icon.png" alt="Logo Pulsa Kita"><span class="brand-name">Pulsa <span>Kita</span></span></a><nav class="nav-menu"><a class="back-link" href="index.php">← Beranda</a></nav></div></header>
<main><section class="results-hero"><div class="container"><div class="results-topline"><div><div class="results-eyebrow">✦ PRODUK DIGITAL PILIHAN</div><h1>Pilih Pulsa atau Paket Data</h1><p>Pilih produk yang sesuai kebutuhanmu. Cepat, praktis, dan mudah.</p></div></div><div class="results-phone"><div class="operator-card" style="--operator-color:<?= e($operatorColor) ?>"><span><?= e(strtoupper($operator)) ?></span><small>KARTU SIM</small></div><strong class="target-number"><?= e($phone) ?></strong></div></div></section>
<section class="results-main"><div class="container"><div class="results-heading"><div><h2>Temukan produkmu</h2><p>Pilih kategori untuk melihat nominal dan harga yang tersedia.</p></div><div class="results-count">● Harga ditampilkan per produk</div></div><div class="results-tabs"><a class="results-tab <?= $type==='pulsa'?'active':'' ?>" href="?phone=<?= e(urlencode($phone)) ?>&type=pulsa">📱 Pulsa</a><a class="results-tab <?= $type==='data'?'active':'' ?>" href="?phone=<?= e(urlencode($phone)) ?>&type=data">🌐 Paket Data</a></div><div class="results-grid">
<?php $products=$type==='pulsa'?[['Pulsa Rp5.000','Pulsa reguler',7000],['Pulsa Rp10.000','Pulsa reguler',12000],['Pulsa Rp20.000','Pulsa reguler',22000],['Pulsa Rp50.000','Pulsa reguler',52000]]:[['Paket Data 5 GB','Paket internet',25000],['Paket Data 6 GB','Paket internet',20000],['Paket Data 8 GB','Paket internet',30000]]; foreach($products as $p): ?>
<article class="result-card"><div class="result-card-top"><span class="product-tag"><?= $type==='pulsa'?'PULSA REGULER':'PAKET INTERNET' ?></span><span class="result-card-icon"><?= $type==='pulsa'?'📱':'🌐' ?></span></div><h3><?= e($p[0]) ?></h3><p><?= e($p[1]) ?> untuk <?= e($phone) ?></p><div class="result-price-label">Harga produk</div><div class="result-price">Rp<?= number_format($p[2],0,',','.') ?></div><a class="result-buy text-center text-decoration-none" href="detail-produk.php?<?= http_build_query(['phone'=>$phone,'operator'=>$operator,'type'=>$type,'name'=>$p[0],'desc'=>$p[1],'price'=>$p[2]]) ?>">Pilih Produk <span>→</span></a></article>
<?php endforeach; ?></div><div class="results-note">ⓘ <div><strong>Informasi produk</strong><br>Harga dan produk masih contoh untuk demonstrasi. Pembelian belum terhubung ke penyedia pulsa.</div></div></div></section></main></body></html>