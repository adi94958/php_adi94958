<?php
$totalRows = (int)($_POST['rows'] ?? 1);
$totalCols = (int)($_POST['cols'] ?? 1);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Soal 1B</title>
</head>

<body>
    <form action="soal1c.php" method="post">
        <?php for ($rowIndex = 1; $rowIndex <= $totalRows; $rowIndex++): ?>
            <?php for ($colIndex = 1; $colIndex <= $totalCols; $colIndex++): ?>
                <label><?php echo $rowIndex . "." . $colIndex . ":"; ?></label>
                <input type="text" name="cell[<?php echo $rowIndex; ?>][<?php echo $colIndex; ?>]">
            <?php endfor; ?>
            <br>
        <?php endfor; ?>
        <input type="hidden" name="rows" value="<?php echo $totalRows; ?>">
        <input type="hidden" name="cols" value="<?php echo $totalCols; ?>">
        <button type="submit">SUBMIT</button>
    </form>
</body>

</html>