<?php

include "baglanti.php";
if(isset($_POST['id'],$_POST['mus_adi'], $_POST['mus_soyadi'], $_POST['mus_mail'], $_POST['mus_tc'], $_POST['mus_adres'], $_POST['mus_tel']))
{
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
    $mus_adi = trim(filter_input(INPUT_POST, 'mus_adi', FILTER_SANITIZE_STRING));
    $mus_soyadi = trim(filter_input(INPUT_POST, 'mus_soyadi', FILTER_SANITIZE_STRING));
    $mus_mail = trim(filter_input(INPUT_POST, 'mus_mail', FILTER_SANITIZE_EMAIL));
    $mus_tc = trim(filter_input(INPUT_POST, 'mus_tc', FILTER_SANITIZE_STRING));
    $mus_adres = trim(filter_input(INPUT_POST, 'mus_adres', FILTER_SANITIZE_STRING));
    $mus_tel = trim(filter_input(INPUT_POST, 'mus_tel', FILTER_SANITIZE_STRING));


    if (empty($mus_adi) || empty($mus_soyadi) || empty($mus_mail)|| empty($mus_tc)|| empty($mus_adres)|| empty($mus_tel)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }

    if (!filter_var($mus_mail, FILTER_VALIDATE_EMAIL)) {
        die("<p>Lütfen geçerli bir e-posta adresin girin!</p>");
    }

    try {

        $sorgu = $baglanti->prepare("UPDATE musteriler SET mus_adi = ?, mus_soyadi = ? , mus_mail = ? , mus_tc = ? , mus_adres = ? , mus_tel = ? WHERE id = ?");
        $sorgu->bindParam(1, $mus_adi, PDO::PARAM_STR);
        $sorgu->bindParam(2, $mus_soyadi, PDO::PARAM_STR);
        $sorgu->bindParam(3, $mus_mail, PDO::PARAM_STR);
        $sorgu->bindParam(4, $mus_tc, PDO::PARAM_STR);
        $sorgu->bindParam(5, $mus_adres, PDO::PARAM_STR);
        $sorgu->bindParam(6, $mus_tel, PDO::PARAM_STR);
        $sorgu->bindParam(7, $id, PDO::PARAM_STR);

        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
    header("Location:home.php");
}
elseif (isset($_POST['mus_adi'], $_POST['mus_soyadi'], $_POST['mus_mail'], $_POST['mus_tc'], $_POST['mus_adres'], $_POST['mus_tel'])) {

    $mus_adi = trim(filter_input(INPUT_POST, 'mus_adi', FILTER_SANITIZE_STRING));
    $mus_soyadi = trim(filter_input(INPUT_POST, 'mus_soyadi', FILTER_SANITIZE_STRING));
    $mus_mail = trim(filter_input(INPUT_POST, 'mus_mail', FILTER_SANITIZE_EMAIL));
    $mus_tc = trim(filter_input(INPUT_POST, 'mus_tc', FILTER_SANITIZE_STRING));
    $mus_adres = trim(filter_input(INPUT_POST, 'mus_adres', FILTER_SANITIZE_STRING));
    $mus_tel = trim(filter_input(INPUT_POST, 'mus_tel', FILTER_SANITIZE_STRING));


    if (empty($mus_adi) || empty($mus_soyadi) || empty($mus_mail)|| empty($mus_tc)|| empty($mus_adres)|| empty($mus_tel)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }

    if (!filter_var($mus_mail, FILTER_VALIDATE_EMAIL)) {
        die("<p>Lütfen geçerli bir e-posta adresin girin!</p>");
    }

    try {

        $sorgu = $baglanti->prepare("INSERT INTO musteriler(mus_adi, mus_soyadi, mus_mail, mus_tc, mus_adres, mus_tel) VALUES(?, ?, ?, ?, ?, ?)");
        $sorgu->bindParam(1, $mus_adi, PDO::PARAM_STR);
        $sorgu->bindParam(2, $mus_soyadi, PDO::PARAM_STR);
        $sorgu->bindParam(3, $mus_mail, PDO::PARAM_STR);
        $sorgu->bindParam(4, $mus_tc, PDO::PARAM_STR);
        $sorgu->bindParam(5, $mus_adres, PDO::PARAM_STR);
        $sorgu->bindParam(6, $mus_tel, PDO::PARAM_STR);

        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
    header("Location:home.php");
}

?>