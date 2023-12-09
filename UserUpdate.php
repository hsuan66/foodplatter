<?php
require_once("../db-connect.php");
if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁";
    exit;
}

// 通常不會用這種方式讓別人去修改東西，通常會躍登入，讓伺服器給他一個密要，才可以進去修改東西

$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
// echo $name;

$sql = "UPDATE users SET name='$name', phone='$phone', email='$email' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

$conn->close();

header("location:user.php?id=$id");

?>