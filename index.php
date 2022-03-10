<?php
include('koneksi.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <form action="tambah.php" method="post" action="tambah.php" enctype="multipart/form-data">
        <input type="text" name="nama" id="nama" placeholder="Nama Todo" />
        <button type="submit">Tambah</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Todo</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM todo ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi) .
                    " - " . mysqli_error($koneksi));
            }

            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['status'] == 0) {
                    $status = "Belum Selesai";
                } else {
                    $status = "Selesai";
                }
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $status; ?></td>
                    <td>
                        <a href="status.php?id=<?php echo $row['id']; ?>&status=<?php echo $row['status']; ?>" onclick="return confirm('Ingin mengubah status?')">Ubah Status</a> |
                        <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                    </td>
                </tr>

            <?php
                $no++; //untuk nomor urut terus bertambah 1
            }
            ?>
        </tbody>
    </table>
</body>

</html>