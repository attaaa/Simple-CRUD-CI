<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <style>
        input,select{
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <h1>Tambah Asisten</h1>
    <div class="container">
        <?php echo form_open_multipart('Main/insert') ?>
            <label for="nim">NIM</label><br/>
            <input type="text" name="nim" id="nim"><br/>
            <label for="nama">Nama</label><br/>
            <input type="text" name="nama" id="nama"><br/>
            <label for="ub">Uang Bulanan</label><br/>
            <input type="text" name="ub" id="ub"><br/>
            <label for="foto">foto</label><br/>
            <input type="file" name="foto" id="foto"><br/>
            <label for="matkul">Matakuliah</label></br>
            <select name="matkul" id="matkul">
                <option value="webpro">Pemrograman Webpro</option>
                <option value="std">Struktur Data</option>
            </select><br/>
            <button type="submit">Tambah</button><br/>
        <?php echo form_close(); ?>
    </div>
    <a href="<?php echo base_url(); ?>/index.php/main/read" role="button">Lihat Data</a>
</body>
</html>