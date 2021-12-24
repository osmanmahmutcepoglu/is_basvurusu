<?php
include "baglanti.php";

try {

    $sorgu = $baglanti->prepare("SELECT id,mus_adi, mus_soyadi, mus_mail, mus_tc, mus_adres, mus_tel, musteri_eklenme_tarihi FROM musteriler");
    $sorgu->execute();

} catch (PDOException $e) {
    die($e->getMessage());
}

$baglanti = null;

?>

<div class="container">
    <table class="table">
        <h3>Müşteriler</h3>
        <thead>
        <tr>
            <th>ID</th>
            <th>Müşteri Adı</th>
            <th>Müşteri Soyadı</th>
            <th>Müşteri E-Posta</th>
            <th>Müşteri TC no</th>
            <th>Müşteri Adres</th>
            <th>Müşteri Telefon</th>
            <th>Müşteri Düzenleme</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($sorgu as $cikti) { ?>
            <tr>
                <td id="<?php echo $cikti["id"]; ?>1"><?php echo $cikti["id"]; ?></td>
                <td id="<?php echo $cikti["id"]; ?>2"><?php echo $cikti["mus_adi"]; ?></td>
                <td id="<?php echo $cikti["id"]; ?>3"><?php echo $cikti["mus_soyadi"]; ?></td>
                <td id="<?php echo $cikti["id"]; ?>4"><?php echo $cikti["mus_mail"]; ?></td>
                <td id="<?php echo $cikti["id"]; ?>5"><?php echo $cikti["mus_tc"]; ?></td>
                <td id="<?php echo $cikti["id"]; ?>6"><?php echo $cikti["mus_adres"]; ?></td>
                <td id="<?php echo $cikti["id"]; ?>7"><?php echo $cikti["mus_tel"]; ?></td>
                <td>
                    <a href="sil.php?id=<?php echo $cikti["id"]; ?>" class="btn btn-danger">Sil</a>
                    <a class="btn btn-danger" onclick="doldur(<?php echo $cikti["id"]; ?>); openForm();">Güncelle</a>
                    <a href="siparis-ekle.php?id=<?php echo $cikti["id"]; ?>" class="btn btn-danger">Sipariş</a>
                </td>


            </tr>

        <?php } ?>
        </tbody>
    </table>
    <a href="siparis-listele.php" class="btn btn-danger">Siparişler Listesi</a>
</div>