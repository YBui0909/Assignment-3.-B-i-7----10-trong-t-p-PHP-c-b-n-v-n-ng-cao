<?php
include_once('../connect.php');

$icon = $_FILES['image']['name'];
$anhminhhoa_tmp = $_FILES['image']['tmp_name'];

if (move_uploaded_file($anhminhhoa_tmp, "../image/" . $icon)) {
    $theloai = $_POST['TenTL'];
    $thutu = $_POST['ThuTu'];
    $an = $_POST['AnHien'];

    $sl = $connect->prepare("INSERT INTO theloai (TenTL, ThuTu, AnHien, icon) VALUES (?, ?, ?, ?)");
    $sl->bind_param("siss", $theloai, $thutu, $an, $icon);

    if ($sl->execute()) {
        echo "<script language='javascript'>alert('Them thanh cong');";
        echo "location.href='theloai.php';</script>";
    } else {
        echo 'Lỗi: ' . $connect->error;
    }
} else {
    echo 'Lỗi: File upload failed.';
}

$connect->close();
