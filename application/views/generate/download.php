<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head><body>

    <h1 style="text-align: center;"><?= $events->organizer ?></h1>
    <!-- <h3 style="text-align: center;">TERAKREDITASI "B"</h3> -->
    <p style="text-align: center;">
    Jl. Arridho No. 166 Kp. Sawah RT. 01/04 Jatimulya – Cilodong – Depok 16413 Telp. (021) 87900425
    <br>
    Website: www.smkyajdepok.sch.id Email: smk_yajdepok@gmail.com
    </p>

    <hr>
    <hr>
   

    <h1 style="text-align: center;">SERTIFIKAT <?= $events->event_name ?></h1>
    <p style="text-align: center;">Diberikan kepada :</p>
    <h1 style="text-align: center;"><?= $sertifikat->participant_name ?></h1>
    <p style="text-align: center;"><?= $sertifikat->certificate_text ?></p>
    <h2 style="text-align: center;"><?= $events->location ?></h2>
    <p style="text-align: center;">Pada tanggal: <?= $events->event_date ?></p>

</body></html>