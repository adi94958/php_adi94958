<?php
$totalRows = (int)($_POST['rows'] ?? 1);
$totalCols = (int)($_POST['cols'] ?? 1);
$cellValues = $_POST['cell'] ?? [];
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Soal 1C</title>
</head>

<body>
    <div style="border:1px solid #333; padding:12px; width:200px;">
        <?php
        for ($rowIndex = 1; $rowIndex <= $totalRows; $rowIndex++) {
            for ($colIndex = 1; $colIndex <= $totalCols; $colIndex++) {
                echo $rowIndex . "." . $colIndex . ": " . ($cellValues[$rowIndex][$colIndex] ?? '') . "<br>";
            }
        }
        ?>
    </div>
</body>

</html>