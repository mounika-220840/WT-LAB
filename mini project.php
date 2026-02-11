<?php
$dir = "uploads/";

if (!file_exists($dir)) {
    mkdir($dir);
}

/* -------- FILE UPLOAD -------- */
if (isset($_POST['upload'])) {
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, $dir . $file);
}

/* -------- FILE DELETE -------- */
if (isset($_GET['delete'])) {
    unlink($dir . $_GET['delete']);
}

/* -------- FILE DOWNLOAD -------- */
if (isset($_GET['download'])) {
    $file = $dir . $_GET['download'];
    header("Content-Disposition: attachment; filename=" . basename($file));
    header("Content-Length: " . filesize($file));
    readfile($file);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini File Manager</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; padding:20px; }
        table { width:100%; border-collapse: collapse; background:#fff; }
        th, td { padding:10px; border:1px solid #ccc; text-align:center; }
        th { background:#333; color:#fff; }
        a { text-decoration:none; color:blue; }
    </style>
</head>
<body>

<h2>📁 Mini File Manager</h2>

<!-- Upload Form -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit" name="upload">Upload</button>
</form>

<br>

<table>
<tr>
    <th>File Name</th>
    <th>Size (KB)</th>
    <th>Last Modified</th>
    <th>Download</th>
    <th>Delete</th>
</tr>

<?php
$files = scandir($dir);

foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo "<tr>";
        echo "<td>$file</td>";
        echo "<td>" . round(filesize($dir.$file)/1024, 2) . "</td>";
        echo "<td>" . date("d-m-Y H:i:s", filemtime($dir.$file)) . "</td>";
        echo "<td><a href='?download=$file'>Download</a></td>";
        echo "<td><a href='?delete=$file' onclick='return confirm(\"Delete?\")'>Delete</a></td>";
        echo "</tr>";
    }
}
?>

</table>

</body>
</html>