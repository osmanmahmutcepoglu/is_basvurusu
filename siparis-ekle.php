<script src="js/main.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/Main.css">
<link href="css/bootstrap.css" rel="stylesheet">

<?php
include "baglanti.php";
$musteri_id = "";
if (!empty($_GET['id'])) {
    $musteri_id = $_GET['id'];
    try {
        $sorgu = $baglanti->prepare("SELECT id,urun_adi, urun_fiyati FROM urunler");
        $sorgu->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
elseif (!empty($_GET['guncellenecek_siparis_id'])) {
    $siparis_id = $_GET['guncellenecek_siparis_id'];
    try {
        $sorgu = $baglanti->prepare("SELECT siparişler.siparis_id,siparişler.musteri_id,urunler.urun_adi,urunler.urun_fiyati,siparişler.urun_adet
                                        FROM siparişler
                                        INNER JOIN urunler
                                        ON urunler.id = siparişler.urun_id
                                        WHERE siparişler.siparis_id = '{$siparis_id}'");
        $sorgu->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    header("location:home.php");
}
?>

<div class="container">
    <h3>Ürün Listesi</h3>
    <form action="siparisler.php" method="post">
        <table class='table table-hover table-responsive table-bordered'>
            <input type="hidden" name="musteri_id" value="<?php echo $musteri_id ?>">
            <tr>
                <th>ID</th>
                <th>Ürün adı</th>
                <th>Fiyat</th>
                <th>Sipariş Adeti</th>
            </tr>
            <tbody>
            <?php foreach ($sorgu as $cikti) { ?>
                <?php
                if (!empty($_GET['guncellenecek_siparis_id'])) {
                    $siparis_id = isset($_GET['guncellenecek_siparis_id']) ? $_GET['guncellenecek_siparis_id'] : '';
                    $id = isset($cikti['musteri_id']) ? $cikti['musteri_id'] : '';
                    $urun_adi = isset($cikti['urun_adi']) ? $cikti['urun_adi'] : '';
                    $urun_fiyati = isset($cikti['urun_fiyati']) ? $cikti['urun_fiyati'] : '';
                    $urun_adet = isset($cikti['urun_adet']) ? $cikti['urun_adet'] : '';
                }
                if (!empty($_GET['id'])) {
                    $id = isset($cikti['id']) ? $cikti['id'] : '';
                    $urun_adi = isset($cikti['urun_adi']) ? $cikti['urun_adi'] : '';
                    $urun_fiyati = isset($cikti['urun_fiyati']) ? $cikti['urun_fiyati'] : '';
                }
                ?>
                <tr>
                    <input type="hidden" name="guncellenecek_siparis_id" value="<?php echo isset($siparis_id) ? $siparis_id : ''; ?>">
                    <td id="<?php echo $id; ?>1">
                        <input type="hidden" name="id[]" value="<?php echo $id; ?>">
                        <?php echo $id ?>
                    </td>
                    <td id="<?php echo $id; ?>2">
                        <?php echo $urun_adi; ?>
                    </td>
                    <td id="<?php echo $id; ?>3">
                        <?php echo  $urun_fiyati; ?>
                    </td>
                    <td id="<?php echo $id; ?>4">
                        <input type="text" name="adet[]" value="<?php echo isset($urun_adet) ? $urun_adet : '' ; ?>" placeholder="Adet Giriniz...">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <button type="submit" class="btn" style="background: red; color: white">Ekle/Güncelle</button>

    </form>
</div>