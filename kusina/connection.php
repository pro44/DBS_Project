<?php

session_start();

class db {

     public $conn;
     public $last_id;
     
        function __construct(){
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "restaurant_system";
            $this->conn = new mysqli($host,$username,$password,$database)or die("connection failed");
            if($this->conn->connect_error){
                echo "fail";
            }else{
                //echo "success";
            }
        }
        
        function delete($table,$id){
            $q = "DELETE FROM ".$table." WHERE id = '".$id."' ";
            $result=$this->conn->query($q);
            if($result === TRUE){
                return 1;
            }else{
                return 0;
            }
        }
        
        function deleteCartItem($item_id){
            $q = "DELETE FROM `cart` WHERE `product_id` = '".$item_id."' ";
            $result=$this->conn->query($q);
            if($result === TRUE){
                return 1;
            }else{
                return 0;
            }
        }
        
        
        function deletez($table,$col,$val){
            $q = "DELETE FROM ".$table." WHERE `".$col."` = '".$val."' ";
            $result=$this->conn->query($q);
            if($result === TRUE){
                return 1;
            }else{
                return 0;
            }
        }
    
        function getTotal($table_name) {
        $data = array();
        $i = 0;
        $q = "SELECT count(`id`) as `totalz` FROM `".$table_name."`";
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
            while ($row = $r->fetch_assoc()) {
                $result[$i] = $row;
                $i++;
            }
            return $result;
        }
    
     function getRow($table_name,$column,$criteria)
        {
            $query="SELECT * FROM `".$table_name."` WHERE `".$column."`='".$criteria."'";
            $result=$this->conn->query($query);
            return $result->fetch_Assoc();
        }
        
    function getSingleData($tablename,$column,$value) {
        $data = array();
        $i = 0;
        $q = "SELECT * FROM `" . $tablename . "` WHERE `".$column."` = '".$value."' ";
        if ($result = $this->conn->query($q)) {
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    $data[$i][$key] = $value;
                }
            }
        }
        if (count($data) > 0) {
            return $data;
        } else {
            return 0;
        }
    }
    
    function getCartData($tablename,$column,$value) {
        $data = array();
        $query = "SELECT * FROM `" . $tablename . "` WHERE `".$column."` = '".$value."' ";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function insertRecord($arr, $tablename) {
        if (count($arr) > 0 && $tablename != "") {
            $q = "INSERT INTO `" . $tablename . "` (";
            $k = "";
            $v = " VALUES(";
            foreach ($arr as $key => $value) {
                $k.=$key . ",";
                $v.="'" . $value . "',";
            }
            $k = substr($k, 0, -1);
            $v = substr($v, 0, -1);
            $k.=")";
            $v.=")";
            $q.= $k . $v;
            $r = $this->conn->query($q);
            if ($r === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }

       
    function insertCustomer($arr) {
        if (count($arr) > 0) {
            $q = "INSERT INTO `customers` (";
            $k = "";
            $v = " VALUES(";
            foreach ($arr as $key => $value) {
                $k.=$key . ",";
                $v.="'" . $value . "',";
            }
            $k = substr($k, 0, -1);
            $v = substr($v, 0, -1);
            $k.=")";
            $v.=")";
            $q.= $k . $v;
            $r = $this->conn->query($q);
            if ($r === TRUE){
                $this->last_id = $this->conn->insert_id;
                return $this->last_id;
            } else {
                return 0;
            }
        }
    }

    
    function getMultiData($table_name) {
        $query = "SELECT * FROM `".$table_name."`";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function updateRecord($arr, $tablename, $id) {
        if (count($arr) > 0 && $tablename != "") {
            $q = "UPDATE `" . $tablename . "` SET ";
            foreach ($arr as $key => $value) {
                $q.="`" . $key . "` = ";
                $q.="'" . $value . "',";
            }
            $q = substr($q, 0, -1);
            $q.=" WHERE `id` = ".$id."";
            
            $r = $this->conn->query($q);          
            
            if ($r === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    
    
    function updateCartItem($arr, $tablename, $product_id) {
        if (count($arr) > 0 && $tablename != "") {
            $q = "UPDATE `" . $tablename . "` SET ";
            foreach ($arr as $key => $value) {
                $q.="`" . $key . "` = ";
                $q.="'" . $value . "',";
            }
            $q = substr($q, 0, -1);
            $q.=" WHERE `product_id` = ".$product_id."";
            
            $r = $this->conn->query($q);          
            
            if ($r === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    
     function checkCartItem($id,$session_id) {
            $q = "SELECT * FROM `cart` WHERE `product_id` = '".$id."' AND `session_id` = '".$session_id."'";
            $r = $this->conn->query($q);
            if($r->num_rows > 0){ 
                return 1; 
             }
            else{
                return 0;
            }
     }
     
    function makeOrder($arr) {
        if (count($arr) > 0) {
            $q = "INSERT INTO `orders` (";
            $k = "";
            $v = " VALUES(";
            foreach ($arr as $key => $value) {
                $k.=$key . ",";
                $v.="'" . $value . "',";
            }
            $k = substr($k, 0, -1);
            $v = substr($v, 0, -1);
            $k.=")";
            $v.=")";
            $q.= $k . $v;
            $r = $this->conn->query($q);
            if ($r === TRUE) {
               $this->last_id = $this->conn->insert_id;
                return $this->last_id;
            } else {
                return 0;
            }
        }
        
            }
            
     function getLatestCollections() {
        $data = array();
        $i = 0;
        $q = "SELECT * FROM `collections` ORDER BY `id` DESC LIMIT 3";
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
      function getLatestProducts() {
        $data = array();
        $i = 0;
        $q = "SELECT * FROM `products` ORDER BY `id` DESC LIMIT 6";
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
     function getProductByCollection($col_id) {
        $query = "SELECT products.id AS `product_id`,product_name,price,image_one FROM `products` JOIN `collections` 
WHERE products.col_id = collections.id 
AND collections.id = ".$col_id."";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
   
    function priceLessThan($price) {
        $data = array();
        $i = 0;
        $q = "SELECT * FROM `products` HAVING `price` <= " . $price . "";
       
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function priceGreaterThan($price) {
        $data = array();
        $i = 0;
        $q = "SELECT * FROM `products` HAVING `price` >= " . $price . "";
       
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
     function getUser($username, $password) {
        $q = "SELECT * FROM `login` where `username` = '" . $username . "' AND `password` = '" . $password . "'";
        $r = $this->conn->query($q);

        $total_rows = $r->num_rows;
        if ($total_rows > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            return 1;
                        
        } else {
            return 0;
        }
    }
    
     function getLatestReviews() {
        $data = array();
        $i = 0;
        $q = "SELECT * FROM `reviews` ORDER BY `id` DESC LIMIT 5";
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function getItemsByCategory($id) {
        $query = "SELECT i.item_name,i.item_price,i.item_image,i.item_desc,cat.category_name FROM `items` AS i JOIN `categories` AS cat WHERE i.c_id = cat.id AND i.status = 1 AND cat.id = ".$id."";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
}
?>