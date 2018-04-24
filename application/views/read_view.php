<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Daftar Asisten Praktikum</h1>

    <a href="<?php echo base_url(); ?>" role="button">Tambah Data</a>

    <?php if (!empty($asisten)) { ?>
    <table>
        <thead>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Uang Bulanan</th>
            <th>Matkkul</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php foreach ($asisten as $data) { ?>
            <td><?php echo $no; ?></td>
            <td><?php echo $data->nim; ?></td>
            <td><?php echo $data->nama; ?></td>
            <td><?php echo $data->bulanan; ?></td>
            <td><?php echo $data->matkul; ?></td>
            <td><a href="">Hapus</a><a href="">Ubah</a></td>
            <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
    <h2>Data Tidak Ada</h2>
    <?php } ?>
</body>
</html>