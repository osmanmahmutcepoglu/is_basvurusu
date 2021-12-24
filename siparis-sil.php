<?php


if (isset($_GET['siparis_id'])) {
    $id = $_GET['siparis_id'];
    try {
        include 'baglanti.php';

        $sorgu = $baglanti->prepare("DELETE FROM siparişler WHERE siparis_id = ?");
        $sorgu->bindParam(1, $id, PDO::PARAM_INT);
        $sorgu->execute();

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
    header('Location:siparis-listele.php');
}
