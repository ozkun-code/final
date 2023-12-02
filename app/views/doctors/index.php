<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dokter</title>
</head>
<body>
    <h1>Daftar Dokter</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>email</th>
                <th>Specialty</th>
            </tr>
        </thead>
        <tbody>
        <?php 

foreach ($data['doctors'] as $doctor) : ?>
    <tr>
        <td><?= $doctor['id'] ?></td>
        <td><?= $doctor['name'] ?></td>
        <td><?= $doctor['email'] ?></td>
        <td><?= $doctor['specialty'] ?></td>
    </tr>
<?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>
