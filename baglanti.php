<?php
$baglanti = new PDO("mysql:host=localhost;dbname=is_basvurusu", "root", "");
$baglanti->exec("SET NAMES utf8");
$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);