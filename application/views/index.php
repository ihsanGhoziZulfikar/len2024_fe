<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects and Locations</title>
</head>
<body>
    <h1>Halaman Utama</h1>
    <h1>Project List</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Project Name</th>
                <th>Client</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Head of Project</th>
                <th>Information</th>
                <th>Locations</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($projects)) : ?>
                <?php $counter = 1;?>
                <?php foreach ($projects as $project) : ?>
                    <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= $project['namaProyek']; ?></td>
                        <td><?= $project['client']; ?></td>
                        <td><?= $project['tglMulai']; ?></td>
                        <td><?= $project['tglSelesai']; ?></td>
                        <td><?= $project['pimpinanProyek']; ?></td>
                        <td><?= $project['keterangan']; ?></td>
                        <td>
                            <?php 
                                $lokasiNames = array_map(function($lokasi) {
                                    return $lokasi['namaLokasi'];
                                }, $project['lokasiProyek']);
                                echo implode(', ', $lokasiNames);
                            ?>
                        </td>
                        <td>
                            <a href="<?= site_url('index.php/ProjectLocationController/edit_project/' . $project['id']); ?>">Edit</a> |
                            <a href="<?= site_url('index.php/ProjectLocationController/delete_project/' . $project['id']); ?>" onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="2">No locations found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <button onclick="location.href='<?php echo base_url('index.php/ProjectLocationController/form'); ?>'">Add Project</button>
<br>

    <h1>Locations List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Location Name</th>
                <th>Country</th>
                <th>Province</th>
                <th>City</th>
                <th>Project in this location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($locations)) : ?>
                <?php $counter = 1;?>
                <?php foreach ($locations as $location) : ?>
                    <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= $location['namaLokasi']; ?></td>
                        <td><?= $location['negara']; ?></td>
                        <td><?= $location['provinsi']; ?></td>
                        <td><?= $location['kota']; ?></td>
                        <td>
                            <?php 
                                $proyekNames = array_map(function($proyek) {
                                    return $proyek['namaProyek'];
                                }, $location['lokasiProyek']);
                                echo implode(', ', $proyekNames);
                            ?>
                        </td>
                        <td>
                            <a href="<?= site_url('index.php/ProjectLocationController/edit_location/' . $location['id']); ?>">Edit</a> |
                            <a href="<?= site_url('index.php/ProjectLocationController/delete_location/' . $location['id']); ?>" onclick="return confirm('Are you sure you want to delete this location?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="2">No locations found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <button onclick="location.href='<?php echo base_url('index.php/ProjectLocationController/form'); ?>'">Add Location</button>
<br>
    <h1>Locations Project Relation List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Project Name</th>
                <th>Location Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($locationProjects)) : ?>
                <?php $counter = 1;?>
                <?php foreach ($locationProjects as $locationProject) : ?>
                    <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= $locationProject['namaProyek']; ?></td>
                        <td><?= $locationProject['namaLokasi']; ?></td>
                        <td>
                            <a href="<?= site_url('index.php/ProjectLocationController/delete_location_project/' . $locationProject['id']); ?>" onclick="return confirm('Are you sure you want to delete this location project relation?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="2">No locations found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <button onclick="location.href='<?php echo base_url('index.php/ProjectLocationController/relation_form'); ?>'">Add Relation</button>

</body>
</html>
