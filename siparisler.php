<?php
include 'baglanti.php';

if (isset($_POST)) {
    if (isset($_POST['musteri_id'], $_POST['id'], $_POST['adet']) && empty($_POST['guncellenecek_siparis_id'])) {

        $siparisler [] = $_POST;
        $musteri_id = $siparisler [0] ['musteri_id'];

        for ($i = 0, $size = count($siparisler [0]['id']); $i < $size; $i++) {

            $musteri_id = trim($musteri_id);
            $urun_id = trim($siparisler [0] ['id'] [$i]);
            $urun_adet = trim($siparisler [0] ['adet'] [$i]);
            if ($urun_adet != 0) {
                try {

                    $sorgu = $baglanti->prepare("INSERT INTO siparişler(musteri_id, urun_id, urun_adet) VALUES(?, ?, ?)");
                    $sorgu->bindParam(1, $musteri_id, PDO::PARAM_STR);
                    $sorgu->bindParam(2, $urun_id, PDO::PARAM_STR);
                    $sorgu->bindParam(3, $urun_adet, PDO::PARAM_STR);

                    $sorgu->execute();

                    echo "<p>Siparis başarılı bir şekilde kaydedildi.</p>";

                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
        }
        $baglanti = null;
        header("Location:siparis-listele.php");
    }
    elseif (isset($_POST['guncellenecek_siparis_id'], $_POST['id'])){
        $siparisler [] = $_POST;
        $guncellenecek_siparis_id = $siparisler [0] ['guncellenecek_siparis_id'];
        $urun_adet = trim($siparisler [0] ['adet'] [0]);

        try {
            $sorgu = $baglanti->prepare("UPDATE siparişler SET urun_adet = '{$urun_adet}'  WHERE siparis_id = '{$guncellenecek_siparis_id}'");
            $sorgu->execute();



            if ($sorgu->rowCount() > 0) {
                echo $sorgu->rowCount() . " kayıt güncellendi.";
            } else {
                echo "Herhangi bir kayıt güncellenemedi.";
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        $baglanti = null;
        header("Location:siparis-listele.php");
    }
}

