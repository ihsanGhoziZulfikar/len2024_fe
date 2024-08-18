<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project and Location</title>
</head>
<body>
    <h1>Create New Project</h1>
    <form action="<?= site_url('index.php/ProjectLocationController/add_project'); ?>" method="post">
        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" name="namaProyek" required><br>

        <label for="client">Client:</label>
        <input type="text" name="client" required><br>

        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="date" name="tglMulai" required><br>

        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="date" name="tglSelesai" required><br>

        <label for="pimpinanProyek">Pimpinan Proyek:</label>
        <input type="text" name="pimpinanProyek" required><br>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" required></textarea><br>

        <button onclick="location.href='<?php echo site_url('/'); ?>'">cancel</button>
        <button type="submit">Submit Project</button>
    </form>

    <h1>Create New Location</h1>
    <form action="<?= site_url('index.php/ProjectLocationController/add_location'); ?>" method="post">
        <label for="namaLokasi">Nama Lokasi:</label>
        <input type="text" name="namaLokasi" required><br>

        <label for="negara">Negara:</label>
        <input type="text" name="negara" required><br>

        <label for="provinsi">Provinsi:</label>
        <input type="text" name="provinsi" required><br>

        <label for="kota">Kota:</label>
        <input type="text" name="kota" required><br>

        <button onclick="location.href='<?php echo site_url('/'); ?>'">cancel</button>
        <button type="submit">Submit Location</button>
    </form>
</body>
</html>
