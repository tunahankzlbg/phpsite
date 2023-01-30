<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

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
    $cek = mysqli_query($db, "SELECT * from kayit ORDER BY id ASC");
    $toplam = mysqli_num_rows($cek);
    echo "<div class='font-semibold text-black text-xl m-12'>Toplam Hesap Sayısı: {$toplam} </div> ";
    while ($goster = mysqli_fetch_array($cek)) {
        extract($goster);
        echo "<div class = 'flex flex-col bg-white w-100 h-auto m-12 p-4'>" . "<div> <strong>ID: </strong> "  . $id . "</div>" . "<div> <strong>Ad ve soyad: </strong> "  . $adsoyad . "</div>" . "<br/>" .
            "<div class = 'w-full'> <strong>Kullanıcı adı: </strong> " . $kullanici_adi . "</div>" . "<br/>" .
            "<div class = 'w-full'> <strong>E-posta: </strong> "  . $eposta . "</div>" . "<br/>" .
            "<div class = 'w-full'> <strong>Şifre: </strong> "  . "<input type='password' disabled value ='$sifre' id = 'pass'>" . "</input>" . "<input type='checkbox' onclick='passw()'> Şifreyi göster" . " <br/>  <a href='duzenle.php?id=$id class='font-bold text-red-500 inline-block mt-4'> Düzenle </a>  </div>" . "<br/>" .
            "</div>";
    }
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
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