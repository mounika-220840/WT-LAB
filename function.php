<?php
echo "<h2>FILE READ/WRITE</h2>";
//create and write file
$file=fopen("sample.txt","w");
fwrite($file,"hello mouni!\nwelcome to php file handling.\n");
fclose($file);

//Read file using fread()
$file = fopen("sample.txt", "r");
$content = fread($file, filesize("sample.txt"));
echo "File content using fread():<br>";
echo nl2br($content);
fclose($file);

//file_get_contents()
echo "<br><br>using file_get_contents():<br>";
echo nl2br(file_get_contents("sample.txt"));
//file_put_contents()
file_put_contents("sample2.txt","This is another file created using file_put_contents().");

//file()-reads file into array
echo "<br><br>using file() function:<br>";
$lines=file("sample.txt");
print_r($lines);

echo "<h2>FILE INFORMATIONFUNCTIONS</h2>";
$file="sample.txt";
if(file_exists($file)){
    echo "File exsits<br>";
    echo "File Size:".filesize($file)."bytes<br>";
      echo "Last Access Time: " . date("Y-m-d H:i:s", fileatime($file)) . "<br>";
    echo "Last Modified Time: " . date("Y-m-d H:i:s", filemtime($file)) . "<br>";
    echo "Creation Time: " . date("Y-m-d H:i:s", filectime($file)) . "<br>";
    echo "Permissions: " . fileperms($file) . "<br>";
    echo "Owner ID: " . fileowner($file) . "<br>";
    echo "Group ID: " . filegroup($file) . "<br>";
    echo "Inode: " . fileinode($file) . "<br>";
}

echo "<h2>FILE &FOLDER MANEGEMENT</h2>";
//copy file
copy("sample.txt","copy_sample.txt");
echo "File Copied<br>";

// Rename file
rename("copy_sample.txt", "renamed_sample.txt");
echo "File Renamed<br>";

// Check file and directory
if(is_file("sample.txt")){
    echo "sample.txt is a file<br>";
}

// Create directory
mkdir("test_folder");
echo "Directory Created<br>";

if(is_dir("test_folder")){
    echo "test_folder is a directory<br>";
}

// Delete file
unlink("renamed_sample.txt");
echo "File Deleted<br>";

// Remove directory
rmdir("test_folder");
echo "Directory Removed<br>";

echo "<h2>DIRECTORY HANDLING</h2>";
//current directory
echo "current working directory:".getcwd()."<br>";
//scan directory
echo "<br>using scandir():<br>";
print_r(scandir(getcwd()));
//using opendir(),readdir()
echo "<br><br>using opendir():<br>";
$dir = opendir(getcwd());
while (($file = readdir($dir)) !== false) {
    echo $file . "<br>";
}
closedir($dir);
echo "<h2>FILE LOCKING</h2>";
$file=fopen("lockfile.txt","w");
if(flock($file,LOCK_EX)){
    fwrite($file,"This file is locked while writing.");
    flock($file,LOCK_UN);
    ECHO "FILE LOCKED AND WRITTEN SUCCESSFULLY.";
}
else{
    echo "could not lock file";
}
fclose($file);

?>