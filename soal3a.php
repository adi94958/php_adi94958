<?php
$host       = "localhost";
$username   = "root";
$password   = "";
$database   = "testdb";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$searchKeyword = $_GET['q'] ?? "";

$query = "
    SELECT hobi, COUNT(DISTINCT person_id) AS total_person
    FROM hobi
    WHERE ('$searchKeyword' = '' OR hobi LIKE '%$searchKeyword%')
    GROUP BY hobi
    ORDER BY total_person DESC, hobi ASC
";

$resultData = mysqli_query($connection, $query);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Hobi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            margin-bottom: 15px;
        }

        input[type=text] {
            padding: 6px;
            margin-right: 8px;
        }

        button {
            padding: 6px 12px;
        }

        table {
            border-collapse: collapse;
            width: 300px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>
    <h3>Laporan Hobi dan Jumlah Orang</h3>

    <form method="get">
        <input type="text" name="q" placeholder="Search by hobi" value="<?php echo htmlspecialchars($searchKeyword); ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>Hobi</th>
            <th>Jumlah Person</th>
        </tr>
        <?php if (mysqli_num_rows($resultData) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($resultData)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['hobi']); ?></td>
                    <td><?php echo $row['total_person']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Data tidak ditemukan</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>