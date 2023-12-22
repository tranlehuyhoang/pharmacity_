<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacity</title>
    <link rel="icon" href="img/pharmalogo.svg">
    <!---adding logo icon-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productDetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
    <style>
    /* Additional styles for table */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        width: 100px;
        height: auto;
    }

    .total-row td {
        font-weight: bold;
        color: red;
    }

    #btn {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    #btn button {
        width: 100px;
        height: 40px;
    }
    </style>
</head>
</head>

<body>
    <?php include_once 'header.php' ;

    if(isset($_POST['checkout'])){
        $sql = "INSERT INTO MATHANG WHERE MaMH = '$product_id'";
        $result = $conn->query($sql);
    }
    if(isset($_GET['del'])){
        array_splice($_SESSION['cart'], $_GET['del'], 1);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>GIỎ HÀNG CỦA BẠN</h1>
    <br>
    <br>
    <br>
    <div id="container" style="display:flex;flex-direction:column;justify-content:center;width:100%">
        <table border="1" style="width:100%">
            <thead>
                <tr>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $tong=0;
            $i=0;
                if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key) {
                        $tong=$tong+$key['total'];
                        echo'
                        <tr>
            <td><img src="'.$key['img'].'"></td>
            <td>'.$key['nameProduct'].'</td>
            <td>'.$key['price'].' vnđ</td>
            <td>'.$key['quantity'].'</td>
            <td>'.$key['total'].' vnđ</td>
            <td><a href="cart.php?del='.$i.'">Xóa</a></td>
            </tr>
                        ';
                        $i++;
                    }
                }
            ?>
            </tbody>
            <thead>
                <tr>
                    <td colspan="4" style="font-size: 24px; font-weight: bold; color: #ff0000;">TỔNG TIỀN :</td>
                    <td><?php echo  $tong.' vnđ'; ?></td>
                </tr>
            </thead>
        </table>
        <br>
        <br>
        <br>
        <form action="checkout.php" method="POST">
            <div id="btn" style="display:flex; justify-content:right;">
                <input type="number" value="<?php echo  $tong; ?>" name="total" hidden>
                <button type="submit" name="order" style="width:10%; height:50px;">ĐẶT HÀNG</button>
            </div>
        </form>
        <br>
        <br>
        <br>
    </div>
    <?php include_once 'footer.php' ?>
</body>

</html>