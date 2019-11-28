<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="SHOW DATABASES";

$link = mysqli_connect($servername,$username,"") or die ('Error connecting to mysql: ' . mysqli_error($link).'\r\n');

if (!($result=mysqli_query($link,$sql))) {
        printf("Error: %s\n", mysqli_error($link));
    }

while( $row = mysqli_fetch_row( $result ) ){
        if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
            echo $row[0]."\r\n";
        }
    }
?> <br><br><br> <?php
$sql="/bin/mysqldump -u root -ppassword --opt >/tmp/alldatabases.sql";

if (!($result=mysqli_query($link,$sql))) {
        printf("Error: %s\n", mysqli_error($link));
    }

while( $row = mysqli_fetch_row( $result ) ){
        if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
            echo $row[0]."\r\n";
        }
    }
?> <br><br><br> <?php
$sql="DESCRIBE user";

if (!($result=mysqli_query($conn,$sql))) {
    printf("Error: %s\n", mysqli_error($link));
}

while( $row = mysqli_fetch_row( $result ) ){
    if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
        echo $row[0]."\r\n";
    }
}
?> <br><br><br> <?php
$sql="SHOW TABLES FROM performance_schema";

if (!($result=mysqli_query($link,$sql))) {
    printf("Error: %s\n", mysqli_error($link));
}

while( $row = mysqli_fetch_row( $result ) ){
    if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
        echo $row[0]."\r\n";
    }
}
?> <br><br><br> <?php
$sql="SHOW TABLES FROM phpmyadmin";

if (!($result=mysqli_query($link,$sql))) {
    printf("Error: %s\n", mysqli_error($link));
}

while( $row = mysqli_fetch_row( $result ) ){
    if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
        echo $row[0]."\r\n";
    }
}
?> <br><br><br> <?php
$sql="SHOW TABLES FROM register";

if (!($result=mysqli_query($link,$sql))) {
    printf("Error: %s\n", mysqli_error($link));
}

while( $row = mysqli_fetch_row( $result ) ){
    if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
        echo $row[0]."\r\n";
    }
}
?> <br><br><br> <?php
$sql="SHOW TABLES FROM test";

if (!($result=mysqli_query($link,$sql))) {
    printf("Error: %s\n", mysqli_error($link));
}

while( $row = mysqli_fetch_row( $result ) ){
    if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
        echo $row[0]."\r\n";
    }
}
?> <br><br><br> <?php
$sql="SHOW TABLES FROM users";

if (!($result=mysqli_query($link,$sql))) {
    printf("Error: %s\n", mysqli_error($link));
}

while( $row = mysqli_fetch_row( $result ) ){
    if (($row[0]!="information_schema") && ($row[0]!="mysql")) {
        echo $row[0]."\r\n";
    }
}


?>