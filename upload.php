<?php
$uploadMessage = "";
$uploadedFile = "";

if (isset($_POST['submit'])) {

    if (isset($_FILES['file'])) {

        $fileName = $_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];

        $uploadFolder = "uploads/" . basename($fileName);

        if ($fileError === 0) {

            if (move_uploaded_file($tempName, $uploadFolder)) {
                $uploadMessage = "File uploaded successfully!";
                $uploadedFile = $fileName;
            } else {
                $uploadMessage = "Error uploading file.";
            }

        } else {
            $uploadMessage = "File upload error.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>

<h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <br><br>
    <button type="submit" name="submit">Upload</button>
</form>

<p style="color:green;"><?php echo $uploadMessage; ?></p>

<?php if ($uploadedFile != "") { ?>
    <a href="download.php?file=<?php echo $uploadedFile; ?>">
        <button>Download File</button>
    </a>
<?php } ?>

</body>
</html>