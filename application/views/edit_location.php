<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location</title>
</head>
<body>
    <h1>Edit Location</h1>
    <form action="<?= site_url('index.php/ProjectLocationController/update_location/' . $location['id']); ?>" method="post">
        <label for="namaLokasi">Nama Lokasi:</label>
        <input type="text" name="namaLokasi" value="<?= $location['namaLokasi']; ?>" required><br>

        <label for="negara">Negara:</label>
        <input type="text" name="negara" value="<?= $location['negara']; ?>" required><br>

        <label for="provinsi">Provinsi:</label>
        <input type="text" name="provinsi" value="<?= $location['provinsi']; ?>" required><br>

        <label for="kota">Kota:</label>
        <input type="text" name="kota" value="<?= $location['kota']; ?>" required><br>

        <button onclick="location.href='<?php echo site_url('/'); ?>'">cancel</button>
        <button type="submit">Update Location</button>
    </form>
</body>
</html>
