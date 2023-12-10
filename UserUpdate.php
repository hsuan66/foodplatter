<?php
require_once("db-connect.php");
session_start();

if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id=$_SESSION["user"]["user_id"];


$sql="SELECT * FROM users WHERE user_id=$id AND user_valid=1";

$result=$conn->query($sql);
$userCount=$result->num_rows;
$row=$result->fetch_assoc();

if($_POST["head"]==""){
    $_POST["head"]=$row["user_img"];
}

if($_POST["sex"]==""){
    $_POST["sex"]=$row["user_sex"];
}

// if($_POST["birth"]=="" || $_POST["birth"]=="0000-00-00"){
//     $_POST["birth"]=null;
// }

$id=$_POST["id"];
$head=$_POST["head"];
$name=$_POST["name"];
$sex=$_POST["sex"];
$birth=$_POST["birth"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$county_text=$_POST["county_text"];
$district_text=$_POST["district_text"];
// $password=$_POST["password"];
$address=$_POST["address"];
$zip=$_POST["zip"];
// $credit_card=$_POST["credit_card"];

// date_default_timezone_set('Asia/Taipei');
$time=date('Y-m-d H:i:s');

if(empty($name)){
    $message="請輸入姓名";
    $_SESSION["error"]["message"]=$message;
    header("location:user_edit.php");
    // echo "請輸入email";
    exit;
}


if(empty($email)){
    $message="請輸入信箱";
    $_SESSION["error"]["message"]=$message;
    header("location:user_edit.php");
    // echo "請輸入email";
    exit;
}

if(empty($phone)){
    $message="請輸入電話";
    $_SESSION["error"]["message"]=$message;
    header("location:user_edit.php");
    // echo "請輸入email";
    exit;
}


$sql = "UPDATE users SET user_img='$head', user_name='$name', user_sex='$sex', user_birth='$birth', user_phone='$phone', user_email='$email',modified_at='$time', user_cities='$zip',user_address_all='$county_text$district_text$address', user_address='$address' WHERE user_id=$id";

var_dump($sql);

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

$conn->close();

unset($_SESSION["error"]);

header("location:user_index.php");

?>