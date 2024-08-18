<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
</head>
<body>
    <h1>Edit Project</h1>
    <form action="<?= site_url('index.php/ProjectLocationController/update_project/' . $project['id']); ?>" method="post">
        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" name="namaProyek" value="<?= $project['namaProyek']; ?>" required><br>

        <label for="client">Client:</label>
        <input type="text" name="client" value="<?= $project['client']; ?>" required><br>

        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="date" name="tglMulai" value="<?= date('Y-m-d', strtotime($project['tglMulai'])); ?>" required><br>

        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="date" name="tglSelesai" value="<?= date('Y-m-d', strtotime($project['tglSelesai'])); ?>" required><br>

        <label for="pimpinanProyek">Pimpinan Proyek:</label>
        <input type="text" name="pimpinanProyek" value="<?= $project['pimpinanProyek']; ?>" required><br>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" required><?= $project['keterangan']; ?></textarea><br>

        <button onclick="location.href='<?php echo site_url('/'); ?>'">cancel</button>
        <button type="submit">Update Project</button>
    </form>
</body>
</html>
