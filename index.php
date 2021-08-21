<!DOCTYPE html>
<html>

<head>
    <title>IMPORT CSV FILE TO MYSQL #1</title>
</head>

<body>
    <?php
    //-- konfigurasi koneksi ke server database
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='db_import';
    //-- membuat koneksi ke database server
    $db=new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    //-- Membuka file 'data.csv' dan membacanya
    $handle= fopen('data.csv', 'r');
    while (($data=fgetcsv($handle, 100, ','))!== false) {
        $sql="INSERT INTO data VALUES('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}')";
        $db->query($sql); //-- melakukan import
    }
    fclose($handle); //Menutup CSV file
    $db->close(); //Menutup koneksi ke database
    echo "<br><strong>Import data selesai.</strong>";
    ?>
</body>

</html>