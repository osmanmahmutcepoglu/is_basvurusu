<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        include 'baglanti.php';

        $sorgu = $baglanti->prepare("DELETE FROM musteriler WHERE id = ?");
        $sorgu->bindParam(1, $id, PDO::PARAM_INT);
        $sorgu->execute();

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
    header('Location:home.php');
}

