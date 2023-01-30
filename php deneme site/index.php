<?php
include("db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="stylesheet" href="./src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css" integrity="sha512-6mc0R607di/biCutMUtU9K7NtNewiGQzrvWX4bWTeqmljZdJrwYvKJtnhgR+Ryvj+NRJ8+NnnCM/biGqMe/iRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/regular.min.css" integrity="sha512-k2UAKyvfA7Xd/6FrOv5SG4Qr9h4p2oaeshXF99WO3zIpCsgTJ3YZELDK0gHdlJE5ls+Mbd5HL50b458z3meB/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css" integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" integrity="sha512-G/T7HQJXSeNV7mKMXeJKlYNJ0jrs8RsWzYG7rVACye+qrcUhEAYKYzaa+VFy6eFzM2+/JT1Q+eqBbZFSHmJQew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kayıt Ol</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="flex items-center justify-center h-[100vh] bg-slate-900">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php
    if ($_POST) {
        $adsoyad = $_POST["adsoyad"];
        $kullanici_adi = $_POST["kullanici_adi"];
        $eposta = $_POST["eposta"];
        $sifre = $_POST["sifre"];
        if (!empty($adsoyad) && !empty($kullanici_adi) && !empty($eposta) && !empty($sifre)) {
            $ekle = mysqli_query($db, "INSERT INTO kayit (adsoyad, kullanici_adi, eposta, sifre, onay) VALUES ('$adsoyad','$kullanici_adi','$eposta','$sifre',0)");
            if ($ekle) {
    ?>
                <form class="h-[40rem] w-96 rounded border  bg-zinc-800" action="index.php" method="post">
                    <div class="flex flex-col items-center w-full h-full">
                        <div class="text-lime-400 text-3xl pt-3">Başarıyla Gönderildi!</div>
                        <div class="text-lime-400 text-[100px]"> <i class="fa-solid fa-check"></i></div>
                        <div class="flex items-center w-full h-full justify-center text-amber-500 text-2xl"><a href="anasayfa.php">Ana sayfaya dön!</a></div>
                    </div>
                </form>
            <?php
            }
        } else {
            ?>
            <form class="h-[40rem] w-96 rounded border  bg-zinc-800" action="index.php" method="post">
                <h1 class="text-2xl text-white text-center pt-5">Kayıt Ol</h1>
                <div class="flex flex-col m-8 ">
                    <label for="adsoyad" class="text-white py-2">Ad soyad</label>
                    <input type="text" name="adsoyad" style="outline:none" class="px-1 text-zinc-900 h-8">
                    <label for="kullanici_adi" class="text-white py-2">Kullanıcı Adı</label>
                    <input type="text" name="kullanici_adi" style="outline:none" class="px-1 text-zinc-900 h-8">
                    <label for="eposta" class="text-white py-2">E-posta </label>
                    <input type="email" name="eposta" style="outline:none" class="px-1 text-zinc-900 h-8">
                    <label for="sifre" class="text-white py-2">Şifre </label>
                    <input type="password" name="sifre" style="outline:none" class="px-1 text-zinc-900 h-8">
                    <input type="submit" name="gonder" class="border p-3 rounded  text-lime-500 divide-solid mt-6 cursor-pointer">
                    <h1 class="text-red-800 font-bold text-2xl w-full h-full text-center mt-3">Lütfen boş alan bırakma!</h1>
                </div>
            </form>
        <?php
        }
    } else {
        ?>
        <form class="h-[40rem] w-96 rounded border  bg-zinc-800" action="index.php" method="post">
            <h1 class="text-2xl text-white text-center pt-5">Kayıt Ol</h1>
            <div class="flex flex-col m-8 ">
                <label for="adsoyad" class="text-white py-2">Ad soyad</label>
                <input type="text" name="adsoyad" style="outline:none" class="px-1 text-zinc-900 h-8">
                <label for="kullanici_adi" class="text-white py-2">Kullanıcı Adı</label>
                <input type="text" name="kullanici_adi" style="outline:none" class="px-1 text-zinc-900 h-8">
                <label for="eposta" class="text-white py-2">E-posta </label>
                <input type="email" name="eposta" style="outline:none" class="px-1 text-zinc-900 h-8">
                <label for="sifre" class="text-white py-2">Şifre </label>
                <input type="password" name="sifre" style="outline:none" class="px-1 text-zinc-900 h-8">
                <input type="submit" name="gonder" class="border p-3 rounded  text-lime-500 divide-solid mt-6 cursor-pointer">
            </div>
            <div class="flex w-full h-[100px] items-center justify-center">
                <a href="./anasayfa.php" class="text-white text-2xl">Anasayfa</a>
            </div>
        </form>
    <?php
    }
    ?>
    <!--
        $adsoyad = $_POST["adsoyad"];
        $kullanici_adi = $_POST["kullanici_adi"];
        $eposta = $_POST["eposta"];
        $sifre = $_POST["sifre"];
        if(!empty($adsoyad) && !empty($kullanici_adi) && !empty($eposta) && !empty($sifre)){
         $ekle =  mysqli_query($db, "INSERT INTO kayit (adsoyad, kullanici_adi, eposta, sifre, onay) VALUES ('$adsoyad','$kullanici_adi','$eposta','$sifre',0)");
            if($ekle){
                ?>
                 <form class="h-[40rem] w-96 rounded border  bg-zinc-800" action="index.php" method="post">
                <div class="text-lime-500 text-3xl">Başarıyla Gönderildi</div>
                 </form>  
-->
</body>

</html>