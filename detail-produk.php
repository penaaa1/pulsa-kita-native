<?php $name=$_GET['name']??'Produk Pulsa Kita';$desc=$_GET['desc']??'Produk digital';$phone=$_GET['phone']??'';$operator=$_GET['operator']??'Operator';$type=($_GET['type']??'pulsa')==='data'?'data':'pulsa';$price=max(0,(int)($_GET['price']??0));function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');} ?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Detail Produk - Pulsa Kita</title><link rel="stylesheet" href="assets/css/app.css"><style>
*{box-sizing:border-box}body{margin:0;min-height:100vh;background:#fff;color:#292333;font-family:Arial,Helvetica,sans-serif}
.detail-hero{position:relative;min-height:390px;padding:28px 0 115px;overflow:hidden;background:#2798ed;color:#fff}.detail-hero:after{content:"";position:absolute;width:280px;height:280px;border-radius:50%;background:rgba(255,255,255,.05);right:-65px;top:-120px}
.detail-wrap{position:relative;z-index:1;width:min(100% - 36px,720px);margin:0 auto}.detail-back{display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:50%;color:#fff;background:transparent;font-size:38px;line-height:1;text-decoration:none}.detail-back:hover{background:rgba(255,255,255,.12)}
.detail-top{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;margin-top:42px}.detail-name{margin:0 0 7px;font-size:clamp(24px,4vw,32px);line-height:1.2;font-weight:800}.detail-desc{margin:0;font-size:19px}.detail-validity{margin:5px 0 0;font-size:16px;opacity:.9}.detail-price{flex-shrink:0;font-size:clamp(25px,4vw,36px);font-weight:800;white-space:nowrap}
.quota-card{position:relative;z-index:2;width:min(100% - 36px,720px);min-height:100px;margin:-44px auto 0;padding:22px 28px;display:flex;align-items:center;justify-content:space-between;gap:20px;background:#fff;border-radius:24px;box-shadow:0 4px 8px rgba(0,0,0,.14)}.quota-label{font-size:21px;font-weight:750;color:#3d3d3d}.quota-value{font-size:28px;font-weight:800;color:#333}.price-info{width:100%;color:#34445a}.price-info strong{display:block;font-size:18px;font-weight:800;margin-bottom:7px}.price-info p{margin:0;font-size:15px;line-height:1.55;color:#66758a}
.detail-spacer{height:380px}
.activate-wrap{position:fixed;z-index:5;left:0;right:0;bottom:0;padding:18px 24px max(22px,env(safe-area-inset-bottom));background:linear-gradient(transparent,rgba(255,255,255,.96) 28%)}.activate-button{display:block;width:min(100%,680px);min-height:70px;margin:0 auto;border:0;border-radius:999px;background:#2798ed;color:#fff;font:inherit;font-size:23px;font-weight:850;letter-spacing:.04em;box-shadow:0 3px 8px rgba(0,0,0,.15);cursor:pointer}
@media(max-width:520px){.detail-hero{min-height:390px;padding-top:18px}.detail-top{margin-top:35px;gap:12px}.detail-desc{font-size:17px}.detail-validity{font-size:14px}.quota-card{padding:20px;min-height:86px}.quota-label{font-size:17px}.quota-value{font-size:24px}.detail-spacer{height:300px}.activate-button{min-height:64px;font-size:20px}}

        /* Animasi halus halaman detail produk */
        @keyframes detailFadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes detailFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .detail-hero { animation: detailFadeIn .55s ease-out both; }
        .detail-top > div:first-child { animation: detailFadeUp .65s ease-out .08s both; }
        .detail-price { animation: detailFadeUp .65s ease-out .18s both; }
        .quota-card { animation: detailFadeUp .65s ease-out .22s both; }
        .promo-card { animation: detailFadeUp .7s ease-out .32s both; }
        .activate-button {
            transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
            animation: detailFadeUp .7s ease-out .42s both;
        }
        .activate-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(39, 152, 237, .24);
            filter: brightness(1.04);
        }
        .activate-button:active {
            transform: scale(.985);
            box-shadow: 0 2px 6px rgba(39, 152, 237, .18);
        }
        .detail-back {
            transition: transform .2s ease, background .2s ease;
        }
        .detail-back:hover {
            transform: rotate(90deg);
        }
        .quota-card, .promo-card {
            transition: box-shadow .22s ease, transform .22s ease;
        }
        .quota-card:hover, .promo-card:hover {
            box-shadow: 0 8px 22px rgba(25, 55, 90, .12);
        }
        @media (prefers-reduced-motion: reduce) {
            .detail-hero, .detail-top > div:first-child, .detail-price,
            .quota-card, .promo-card, .activate-button {
                animation: none !important;
            }
            .activate-button, .detail-back, .quota-card, .promo-card {
                transition: none !important;
            }
        }

    </style></head><body><section class="detail-hero"><div class="detail-wrap"><a class="detail-back" href="produk.php?phone=<?= e(urlencode($phone)) ?>&type=<?= e($type) ?>">×</a><div class="detail-top"><div><h1 class="detail-name"><?= e(strtoupper($name)) ?></h1><p class="detail-desc"><?= e($desc) ?></p><p class="detail-validity"><?= $type==='pulsa'?'Isi ulang pulsa':'Masa aktif mengikuti ketentuan paket' ?></p></div><div class="detail-price">Rp<?= number_format($price,0,',','.') ?></div></div></div></section><section class="quota-card"><div class="price-info"><strong>Informasi Harga</strong><p><?= $type==='pulsa'?'Harga pulsa sudah termasuk biaya tambahan Rp2.000 dari nominal pulsa.':'Harga paket data mengikuti harga yang tertera pada produk.' ?></p></div></section><div class="detail-spacer"></div><div class="activate-wrap"><a class="activate-button text-decoration-none text-center" style="padding-top:20px" href="pembayaran.php?<?= http_build_query(['name'=>$name,'operator'=>$operator,'phone'=>$phone,'type'=>$type,'price'=>$price]) ?>">BAYAR SEKARANG</a></div></body></html>