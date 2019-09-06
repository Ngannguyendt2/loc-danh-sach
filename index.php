<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    From: <input type="text" name="from" placeholder="yyyy/mm/dd" required>
    To:<input type="text" name="to" placeholder="yyyy/mm/dd" required>
    <input type="submit" value="Loc">
</form>
<?php
$arraylist = array(
    "1" => array("ten" => "Mai Van Hoan",
        "ngaysinh" => "1983-08-20",
        "diachi" => "Ha Noi",
        "anh" => "image/1.jpeg"),
    "2" => array("ten" => "Tran Dang Khoa",
        "ngaysinh" => "1983=08-23",
        "diachi" => "Quang Binh",
        "anh" => "image/2.jpeg"),
    "3" => array("ten" => "Hoang Quoc Viet",
        "ngaysinh" => "1978-08-22",
        "diachi" => "Quang Nam",
        "anh" => "image/3.jpeg")
);
function serachBydate($arr, $from, $to)
{
    if (empty($from) && empty($to)) {
        return $arr;
    } else {
        $filterCustom = [];
        foreach ($arr as $key) {
            if (strtotime($from) <= strtotime($key['ngaysinh']) && strtotime($to) >= strtotime($key['ngaysinh'])) {
                $filterCustom[] = $key;
            }
        }
        return $filterCustom;
    }
}
$filterCustom=serachBydate($arraylist,$_POST['from'],$_POST['to']);
?>
<table>
    <tr>
        <td>Tên </td>
        <td>Ngày sinh </td>
        <td>Địa chỉ </td>
        <td>Ảnh </td>
    </tr>
    <?php
    foreach ($filterCustom as $key => $value) :
        ?>
    <tr>
        <td><?php echo $value['ten'] ?></td>
        <td><?php echo $value['ngaysinh'] ?></td>
        <td><?php echo $value['diachi'] ?></td>
        <td><?php echo "<img src=" . $value['anh'] . "'width='50px' height='100px'>" ?></td>
    </tr>
    <?php endforeach;?>

</table>
</body>
</html>