<?php 
    // global $img_path;
    function viewcart(){
        $i = 1;
        $id = 0;
        $tongtien = 0;

        echo'
            <tr>
                <th class="text-center align-middle">STT</th>
                <th class="text-center align-middle">Hình ảnh</th>
                <th class="text-center align-middle">Tên sản phẩm</th>
                <th class="text-center align-middle">Đơn giá</th>
                <th class="text-center align-middle">Số lượng</th>
                <th class="text-center align-middle">Thành tiền</th>
                <th class="text-center align-middle">Thao tác</th>
            </tr>
        ';

        foreach ($_SESSION['mycart'] as $cart) {
            $hinh = $cart[2]; //lấy đường dẫn hình 
            //$gia = $cart[3];
            //$soluong = $cart[4];
            $thanhtien =$cart[3] * $cart[4];
            //$thanhtien = $gia * $soluong;
            $tongtien += $thanhtien;

            $xoasp = '
                <a href="index.php?act=delcart&idcart=' . $id . '">
                    <i class="fa-regular fa-trash-can"></i> 
                </a>';
            // $sl = '
            //     <div class="input-group d-flex align-items-center quantity-container" style="max-width: 150px;">
            //         <div class="input-group-prepend">
            //             <button onclick="giamsoluong(this)" class="btn btn-outline-black decrease" type="button">−</button>
            //         </div>
            //         <input type="text" onkeyup="kiemtrasoluong(this)" class="form-control text-center quantity-amount" value="'. $cart[4] .'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            //         <div class="input-group-append">
            //             <button onclick="tangsoluong(this)" class="btn btn-outline-black increase" type="button">+</button>
            //         </div>
            //         <input type="hidden" value="'.$cart[0].'">
            //     </div>
            // ';

            //<input type="hidden" value="'.$cart["IDSP"].'">

            echo '
                <tr >
                    <td class="text-center align-middle">' . $i . '</td>
                    <td class="text-center align-middle"><img src="' . $hinh . '" alt="" height= 50px;></td>
                    <td class="text-center align-middle">' . $cart[1] . '</td>
                    <td class="text-center align-middle">' . number_format($cart[3], 3, ',', '.') . '</td>
                    <td class="text-center align-middle">' . $cart[4]. '</td>
                    <td class="text-center align-middle">' . number_format($thanhtien, 3, ',', '.') . '</td>
                    <td class="text-center align-middle fs-5">' . $xoasp . '</td>
                </tr>
                ';
            $i++;
            $id++;
        }
    }

    function viewChiTietCart(){
        $i = 1;
        $id = 0;
        $tongtien = 0;
        
        echo '
        <tr>
            <th class="text-center align-middle">STT</th>
            <th class="text-center align-middle">Tên sản phẩm</th>
            <th class="text-center align-middle">Đơn giá</th>
            <th class="text-center align-middle">Số lượng</th>
            <th class="text-center align-middle">Thành tiền</th>
        </tr>
        ';

        foreach ($_SESSION['mycart'] as $cart) {
            $gia = $cart[3];
            $soluong = $cart[4];
            $thanhtien = $gia * $soluong;
            $tongtien = $tongtien + $thanhtien;
            echo '
                <tr >
                    <td class="text-center align-middle">' . $i . '</td>
                    <td class="text-center align-middle">' . $cart[1] . '</td>
                    <td class="text-center align-middle">' . number_format($gia, 3, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($soluong, 0, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($thanhtien, 3, ',', '.') . '</td>
                </tr>
                ';
            $i++;
            $id++;
        }
        echo '
            <tr>
                <td class="text-center align-middle fw-bold" colspan = "4">Tổng đơn hàng cần thanh toán</td>
                <td class="text-center align-middle fw-bold">' . number_format($tongtien, 3, ',', '.') . '</td>
            </tr>
        ';
    }

    function bill_chi_tiet($listbill){
        $i = 1;
        $tongtien = 0;
    
        echo'
            <tr>
                <th class="text-center align-middle">STT</th>
                <th class="text-center align-middle">Hình ảnh</th>
                <th class="text-center align-middle">Tên sản phẩm</th>
                <th class="text-center align-middle">Đơn giá</th>
                <th class="text-center align-middle">Số lượng</th>
                <th class="text-center align-middle">Thành tiền</th>
            </tr>
        ';
    
        foreach ($listbill as $cart) {
            $hinh = $cart['img']; //lấy đường dẫn hình 
            $gia = $cart['price'];
            $soluong = $cart['soluong'];
            $tongtien += $cart['thanhtien']; // Cộng dồn tổng tiền

            echo '
                <tr>
                    <td class="text-center align-middle">' . $i . '</td>
                    <td class="text-center align-middle"><img src="' . $hinh . '" alt="" height="50px"></td>
                    <td class="text-center align-middle">' . $cart['name'] . '</td>
                    <td class="text-center align-middle">' . number_format($gia, 3, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($soluong, 0, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($cart['thanhtien'], 3, ',', '.') . '</td>
                </tr>
            ';
            $i++;
        }
    
        echo '
            <tr>
                <td class="text-center align-middle fw-bold" colspan="5">Tổng đơn hàng cần thanh toán</td>
                <td class="text-center align-middle fw-bold">' . number_format($tongtien, 3, ',', '.') . '</td>
            </tr>
        ';
    }


    function tongdonhang(){
        $tongtien = 0;
        foreach ($_SESSION['mycart'] as $cart) {
            $gia = $cart[3];
            $soluong = $cart[4];
            $thanhtien = $gia * $soluong;
            $tongtien = $tongtien + $thanhtien;
        }
        return $tongtien;
    }

    function insert_bill($iduser, $name, $address, $tel, $email, $pttt, $ngaydathang, $tongdonhang)
    {
        $conn = connectdb();
        $sql = "INSERT INTO tbl_bill (iduser, bill_name, bill_address, bill_tel, bill_email, bill_pttt, ngaydathang, total) 
                VALUES ('$iduser', '$name', '$address', '$tel', '$email','$pttt','$ngaydathang', '$tongdonhang')";
        return pdo_execute_return_lastInsertId($sql);
    }

    function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
    {
        $conn = connectdb();
        $sql = "INSERT INTO tbl_giohang (iduser, idpro, img, name, price, soluong, thanhtien, idbill) 
                VALUES ('" . $iduser . "', '" . $idpro . "', '" . $img . "','" . $name . "','" . $price . "','" . $soluong . "', '" . $thanhtien . "','" . $idbill . "')";
        $conn->exec($sql);
    }

    function loadOne_bill($id){
        $sql = "SELECT * FROM tbl_bill WHERE id= ". $id;
        return get_All($sql);
    }   

    function loadAll_cart($idbill){
        if (!isset($idbill) || empty($idbill)) {
            return []; 
        }
        $sql = "SELECT * FROM tbl_giohang WHERE idbill= ". $idbill;
        return get_All($sql);
    }

    function loadAll_cart_count($idbill){
        $sql = "SELECT * FROM tbl_giohang WHERE idbill= ". $idbill;
        return sizeof(get_All($sql));
    }

    // function loadAll_bill($kyw = "" ,$iduser = 0){
    //     $sql = "SELECT * FROM tbl_bill WHERE 1"; 
    //     if (isset($iduser) > 0 ) {
    //         $sql .= " AND iduser= ". $iduser;
    //     }
    //     if ($kyw != "" ) {
    //         $sql .= " AND id LIKE '%".$kyw."%'";
    //     }
    //     $sql .= " ORDER BY id";
    //     return get_All($sql);
    // }

    function loadAll_bill($kyw = "" , $iduser  = 0 ){
        $sql = "SELECT * FROM tbl_bill WHERE 1"; 
        // if (isset($iduser) > 0 ) {
        //     $sql .= " AND iduser= ". $iduser;
        // }
        if ($kyw != "" ) {
            $sql .= " AND id LIKE '%".$kyw."%'";
        }
        $sql .= " ORDER BY id";
        return get_All($sql);
    }

    //delete san pham
    function delbill($id){
        $conn = connectdb();
        try {
            // Tắt chế độ kiểm tra khóa ngoại để có thể xóa bản ghi trong tbl_bill
            $conn->exec("SET foreign_key_checks = 0");
    
            // Xóa chi tiết đơn hàng từ bảng tbl_cart
            $sql_cart = "DELETE FROM tbl_giohang WHERE idbill=" . $id;
            $conn->exec($sql_cart);
    
            // Bật lại chế độ kiểm tra khóa ngoại
            $conn->exec("SET foreign_key_checks = 1");
    
            // Xóa đơn hàng từ bảng tbl_bill
            $sql = "DELETE FROM tbl_bill WHERE id=" . $id;
            $conn->exec($sql);
    
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function get_ttdh($n){
        switch ($n) {
            case '0':
                $tt = "Đơn hàng mới";
                break;
            case '1':
                $tt = "Đang xử lý";
                break;
            case '2':
                $tt = "Đang giao hàng";
                break;
            case '3':
                $tt = "Hoàn tất";
                break;
            default:
                $tt = "Đơn hàng mới";
                break;
        }
        return($tt);
    }
    

?>

