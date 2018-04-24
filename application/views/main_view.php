<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Asisten</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>style.css">
</head>
<body>
    <div class="top-nav">
        <a class="add" role="button" id="add">Tambah Data</a>
    </div>
    <div class="container">
        
        <h1><center>Daftar Asisten</center></h1>

        <div class="container">

            <?php if (!empty($asisten)) { ?>
            <table class="table" border="0" id="dataAsisten">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Uang Bulanan</th>
                        <th>Matkul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($asisten as $data) { ?>
                    <tr>
                        <td class="number"><?php echo $no; $no++; ?></td>
                        <td><?php echo $data->nim; ?></td>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->bulanan; ?></td>
                        <td><?php echo $data->namamatkul; ?></td>
                        <td class="action"><a role="button" class="edit" id="edit">Edit</a> <a href="index.php/main/delete/<?php echo $data->nim; ?>" role="button" class="hapus" id="hapus">Hapus</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>

                <center><p>Data asisten kosong</p></center>

            <?php } ?>

        </div>

    </div>

    <div class="modal" id="modalInsert">

        <div class="modal-content">
            <?php echo form_open_multipart('main/insert') ?>

                <h1><center>Tambah Asisten</center></h1>

                <input type="text" placeholder="NIM" name="nim" required>

                <input type="text" placeholder="Nama" name="nama" required>

                <input type="text" placeholder="Uang Bulanan" name="ub" required>
                    
                <input type="file" name="foto" required>

                <select name="matkul">
                    <?php if (!empty($matkul)) { foreach ($matkul as $data) { ?>
                    <option value="<?php echo $data->kodematkul; ?>"><?php echo $data->namamatkul; ?></option>
                    <?php }} ?>
                </select>
                
                <button type="submit" class="tambah">Tambah</button>

            <?php echo form_close(); ?>
        </div>
    
    </div>

    <div class="modal" id="modalEdit">

        <div class="modal-content">
            <?php echo form_open_multipart('main/edit') ?>

                <h1><center>Edit Asisten</center></h1>
                
                <input type="hidden" placeholder="NIM" name="nim" id="editNim" required>
                
                <label for="nama">Nama</label>
                <input type="text" placeholder="Nama" name="nama" id="editNama" required>

                <label for="ub">Uang Bulanan</label>
                <input type="text" placeholder="Uang Bulanan" id="editBulanan" name="ub" required>
                
                <center>
                <button type="submit" class="simpan">Simpan</button>
                <button class="batal" id="btnBatal">Batal</button>
                </center>
            
            <?php echo form_close(); ?>
        </div>

    </div>

    

    <script>
        var tableAsisten = document.getElementById('dataAsisten');
        var btnAdd = document.getElementById('add');
        var btnEdit = document.getElementsByClassName('edit');
        var btnBatal = document.getElementById('btnBatal');
        var modalInsert = document.getElementById('modalInsert');
        var modalEdit = document.getElementById('modalEdit');

        btnAdd.onclick = function(){
            modalInsert.style.display = "block";
        }

        btnBatal.onclick = function(){
            modalEdit.style.display = "none";
        }
        
        for (var i = 0; i < btnEdit.length; i++){
            btnEdit[i].onclick = function(){
                var d1 = this.closest('tr').cells[1].textContent;
                var d2 = this.closest('tr').cells[2].textContent;
                var d3 = this.closest('tr').cells[3].textContent;
                modalEdit.style.display = "block";
                document.getElementById('editNim').value = d1;
                document.getElementById('editNama').value = d2;
                document.getElementById('editBulanan').value = d3;
            }
        }

        window.onclick = function(event){
            if (event.target == modalInsert || event.target == modalEdit){
                modalInsert.style.display = "none";
                modalEdit.style.display = "none";
            }
        }
    </script>

</body>
</html>