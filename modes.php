Warning: fopen(newfile.txt): Failed to open stream: File exists in C:\xampp\htdocs\php-practice\php_university\WT LAB\project\modes.php on line 27
File already exists!<?php
echo "<h2>PHP File Operations - All Modes</h2>";

// 1️⃣ Read only (r) - file must exist
echo "<b>Read mode (r):</b><br>";
if (file_exists("sample.txt")) {
    $file = fopen("sample.txt", "r");
    $content = fread($file, filesize("sample.txt"));
    echo nl2br($content)."<br>";
    fclose($file);
} else {
    echo "sample.txt not found!<br>";
}

// 2️⃣ Write only (w) - creates file or overwrites
echo "<b>Write mode (w):</b><br>";
$file = fopen("sample.txt", "w");
fwrite($file, "New content using w mode");
fclose($file);
echo "sample.txt written.<br>";

// 3️⃣ Append only (a) - creates file if missing, adds at end
echo "<b>Append mode (a):</b><br>";
$file = fopen("sample.txt", "a");
fwrite($file, "\nAppended text");
fclose($file);
echo "Text appended.<br>";

// 4️⃣ Create new file (x) - only if file doesn't exist
echo "<b>Create mode (x):</b><br>";
if (!file_exists("newfile.txt")) {
    $file = fopen("newfile.txt", "x");
    fwrite($file, "Created using x mode");
    fclose($file);
    echo "newfile.txt created.<br>";
} else {
    echo "newfile.txt already exists!<br>";
}

// 5️⃣ Read & Write (r+) - file must exist
echo "<b>Read & Write mode (r+):</b><br>";
$file = fopen("sample.txt", "r+");
fwrite($file, "Edited "); // overwrites from beginning
fclose($file);
echo "sample.txt edited with r+ mode.<br>";

// Read & Write Append (a+) - creates if missing, writes at end
echo "<b>Read & Append mode (a+):</b><br>";
$file = fopen("sample.txt", "a+");
fwrite($file, "\nMore text using a+ mode");
fclose($file);
echo "Text appended using a+ mode.<br>";

// Write & Read (w+) - truncates file
echo "<b>Write & Read mode (w+):</b><br>";
$file = fopen("sample_wplus.txt", "w+");
fwrite($file, "w+ mode overwrites and allows read");
fseek($file, 0); // move pointer to beginning for reading
echo nl2br(fread($file, filesize("sample_wplus.txt")))."<br>";
fclose($file);

//  Create & Read/Write (x+) - creates only if file doesn't exist
echo "<b>Create & Read/Write mode (x+):</b><br>";
if (!file_exists("newfile_xplus.txt")) {
    $file = fopen("newfile_xplus.txt", "x+");
    fwrite($file, "Created using x+ mode");
    fseek($file, 0);
    echo nl2br(fread($file, filesize("newfile_xplus.txt")))."<br>";
    fclose($file);
} else {
    echo "newfile_xplus.txt already exists!<br>";
}


?>
