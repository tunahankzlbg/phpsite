<?php

include("db.php");

// db.php içine aşağıdaki kodu koy 
# ->     $veritabani = new PDO("mysql:host=localhost;dbname=uye_kayit", "root", "");
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <link rel="stylesheet" href="./dist/output.css">
    <title>Anasayfa</title>
</head>

<body class="h-[100vh] bg-slate-200">
    <div class="flex w-full h-20 bg-white items-center justify-center ">
        <ul class="flex gap-8">
            <li><a href="">Anasayfa</a></li>
            <li><a href="./anasayfa.php">Hesaplar</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="index.php">Kayıt ol!</a></li>
        </ul>
    </div>
    <?php


    if ($_POST["guncelle"]) {  #butona tıkladığında name değeri ile tetiklenicek
        $adsoyad = $_POST["adsoyad"];
        $kullanici_adi = $_POST["kullanici_adi"];
        $eposta = $_POST["eposta"];
        $sifre = $_POST["sifre"];

        $guncelleme_islemi = $veritabani->prepare("UPDATE kayit SET adsoyad=:adsoyad, kullaniciadi=:kullaniciadi, eposta=:eposta, sifre=:sifre  WHERE id=:id");
        $guncelleme_islemi->execute(array(
            "id" => $id,
            "adsoyad" => $adsoyad,
            "kullanici_adi" => $kullanici_adi,
            "eposta" => $eposta,
            "sifre" => $sifre
        ));

        if ($guncelleme_islemi) {
            echo "Başarılı";
        } else {
            echo "Başarısız";
        }
    } else {

        $id = $_GET["id"];

        $veritabani_islemi = $veritabani->prepare("SELECT * FROM kayit WHERE id ='$id'");
        $veritabani_islemi->execute(array(
            "id" => $id
        ));

        $sonuc = $veritabani_islemi->fetchAll(PDO::FETCH_OBJ);
        foreach ($sonuc as $veriler) {
    ?>
            <div class='flex flex-col bg-white w-100 h-auto m-12 p-4'>
                <form action='' method='post'>
                    <table cellpadding='5' cellspacing='5'>
                        <tr>
                            <td> Ad ve soyad: </td>
                            <td> <input type='text' name="adsoyad" value='<?php $veriler->adsoyad ?>'></td>
                        </tr>
                        <tr>
                            <td> Kullanıcı adı: </td>
                            <td> <input type='text' name="kullaniciadi" value='<?php $veriler->kullaniciadi ?>'></td>
                        </tr>
                        <tr>
                            <td> Eposta: </td>
                            <td> <input type='text' name="eposta" value='<?php $veriler->eposta ?>'></td>
                        </tr>
                        <tr>
                            <td> Şifre: </td>
                            <td> <input type='text' name="sifre" value='<?php $veriler->sifre ?>'></td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> <button type="submit" name="guncelle">GÜNCELLE</button></td>
                        </tr>
                    </table>
                </form>
            </div>"
    <?php
        }
    }

    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        /* Bunu Tetiklememişsin ???? */
        function passw() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
