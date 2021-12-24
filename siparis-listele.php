<script src="js/main.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/Main.css">
<link href="css/bootstrap.css" rel="stylesheet">

<?php
include "baglanti.php";

try {

    $sorgu = $baglanti->prepare("SELECT siparişler.siparis_id, musteriler.id,musteriler.mus_adi,musteriler.mus_soyadi,urunler.urun_adi,urunler.urun_fiyati,siparişler.urun_adet,siparişler.siparis_tarih
                                FROM siparişler
                                INNER JOIN musteriler
                                ON siparişler.musteri_id=musteriler.id
                                INNER JOIN urunler
                                ON siparişler.urun_id=urunler.id
                                ORDER BY siparişler.siparis_id");
    $sorgu->execute();

} catch (PDOException $e) {
    die($e->getMessage());
}

$baglanti = null;

?>

<div class="container">
    <table class="table">
        <h3>Siparişler</h3>
        <thead>
        <tr>
            <th>Sipariş ID</th>
            <th>Müşteri ID</th>
            <th>Müşteri Adı</th>
            <th>Müşteri Soyadı</th>
            <th>Müşteri Ürün Adı</th>
            <th>Müşteri Ürün Birim Fiyatı</th>
            <th>Müşteri Sipariş Adeti</th>
            <th>Sipariş Tarihi</th>
            <th>Sipariş Düzenleme</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($sorgu as $cikti) { ?>
            <tr>
                <td id="<?php echo $cikti["siparis_id"]; ?>1"><?php echo $cikti["siparis_id"]; ?></td>
                <td id="<?php echo $cikti["siparis_id"]; ?>2"><?php echo $cikti["id"]; ?></td>
                <td id="<?php echo $cikti["siparis_id"]; ?>3"><?php echo $cikti["mus_adi"]; ?></td>
                <td id="<?php echo $cikti["siparis_id"]; ?>4"><?php echo $cikti["mus_soyadi"]; ?></td>
                <td id="<?php echo $cikti["siparis_id"]; ?>5"><?php echo $cikti["urun_adi"]; ?></td>
                <td id="<?php echo $cikti["siparis_id"]; ?>6"><?php echo $cikti["urun_fiyati"]; ?></td>
                <td id="<?php echo $cikti["siparis_id"]; ?>7"><?php echo $cikti["urun_adet"]; ?></td>
                <td id="<?php echo $cikti["siparis_id"]; ?>7"><?php echo $cikti["siparis_tarih"]; ?></td>
                <td>
                    <a href="siparis-sil.php?siparis_id=<?php echo $cikti["siparis_id"]; ?>" class="btn btn-danger">Sil</a>
                    <a href="siparis-ekle.php?guncellenecek_siparis_id=<?php echo $cikti["siparis_id"]; ?>" class="btn btn-danger">Güncelle</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="home.php" class="btn btn-danger">AnaSayfa</a>
</div>