<?php   

    function connectdb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
    
        try {
            $conn = new PDO("mysql:host=$servername;dbname=ql_freshmarket", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully";
            } catch(PDOException $e) {
                //echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }

    function get_All($sql){
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        $conn = null;
        return $kq;
    }

    function get_One($sql){
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetch();
        $conn = null;   
        return $kq;
    }

    //trả về id của đơn hàng (mã đơn hàng)
    function pdo_execute_return_lastInsertId($sql){
       $sql_args = array_slice(func_get_args(),1);
        try {
            $conn = connectdb();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            return $conn->lastInsertId();
        } catch (Throwable $e) {
           throw $e;
        }
        finally {
            unset($conn);
        }
    }

?>
