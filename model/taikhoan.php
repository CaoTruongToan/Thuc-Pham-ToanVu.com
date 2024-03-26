<?php 

    function insert_taikhoan($name, $address, $email, $user, $pass)
    {
        $conn = connectdb();
        $sql = "INSERT INTO tbl_user(name, address, email, user, pass) VALUES ('$name', '$address', '$email', '$user','$pass')";
        $conn->exec($sql);
    }

    function checkuser($user, $pass){
        $sql = "SELECT * FROM tbl_user WHERE user= '". $user."' AND pass= '". $pass."'";
        return get_One($sql);
    }

?>  