<?php
session_start();

class db {

     public $conn;
        function __construct() {
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "restaurant_system";
            $this->conn = new mysqli($host,$username,$password,$database)or die("connection failed");
            if($this->conn->connect_error){
                echo "fail";
            }else{
               // echo "success";
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
        
    
        function deleteTransactionCart($session_id){
            $q = "DELETE FROM `transactions_cart` WHERE `session_id` = '".$session_id."' ";
            $result=$this->conn->query($q);
            if($result === TRUE){
                return 1;
            }else{
                return 0;
            }
        }
    
        function deleteTransactionCartItem($transaction_cart_item_id, $session_id){
            $q = "DELETE FROM `transactions_cart` WHERE `session_id` = '".$session_id."' AND `item_id` = '".$transaction_cart_item_id."'";
            $result=$this->conn->query($q);
            if($result === TRUE){
                return 1;
            }else{
                return 0;
            }
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
    
     function getInvoiceProducts($invoice_id) {
        $query = "SELECT * FROM `invoices_details` where invoice_id = ".$invoice_id."";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    
     
    function insertInvoice($arr) {
        if (count($arr) > 0) {
            $q = "INSERT INTO `invoices` (";
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
     
    function insertInvoiceDetails($arr, $invoice_id) {
        if (count($arr) > 0) {
            $q = "INSERT INTO `invoices_details` (";
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
                return $invoice_id;
            } else {
                return 0;
            }
        }
    }

    
    function getCurrentInvoiceDetails($invoice_id) {
        $query = "SELECT * FROM `invoices` AS i1 WHERE i1.id = ".$invoice_id."";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
     
    function getInfoForInvoice() {
        $query = "SELECT * FROM `basic_info` AS b JOIN `contact_info` AS c WHERE b.id = c.id";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function getCartItemsBySession($session_id) {
        $query = "SELECT * FROM `transactions_cart` WHERE `session_id` = '".$session_id."'";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
     
    function checkCartItem($id,$session_id) {
            $q = "SELECT * FROM `transactions_cart` WHERE `item_id` = '".$id."' AND `session_id` = '".$session_id."'";
            $r = $this->conn->query($q);
            if($r->num_rows > 0){ 
                return 1; 
             }
            else{
                return 0;
            }
     }
    function getNotSelectedCategories($c_id) {
        $query = "SELECT * FROM `categories` where id != ".$c_id."";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
     
    
    function getMessages() {
        $query = "SELECT * FROM `messages` ORDER BY `id` DESC";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function getLatestMessages() {
        $query = "SELECT * FROM `messages` ORDER BY `id` DESC LIMIT 4";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    function getItemsByCategory($c_id) {
        $query = "SELECT * FROM `items` WHERE c_id = ".$c_id."";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
     
    function setUnreadToRead($id) {
        $query = "UPDATE `messages` set `is_read` = 1 where `id` = '".$id."' ";
        $r = $this->conn->query($query);
         if ($r === TRUE) {
                return 1;
            } else {
                return 0;
            }
    }
    function getTransactions() {
        $query = "SELECT * FROM `invoices` ORDER BY `id` DESC";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
     function getSingleTransactionDetails($invoice_id) {
        $query = "SELECT i2.item_name,i2.item_price,i2.item_quantity,i3.item_image,i.total,i.invoice_date FROM `invoices` AS i JOIN `invoices_details` AS i2 JOIN `items` AS i3 WHERE i.id=i2.invoice_id AND i.id='".$invoice_id."' AND i2.item_id=i3.id";
        $r = $this->conn->query($query);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function updateFacts($arr) {
         if ( count($arr) > 0 ) {
            $q = "UPDATE `facts` SET ";
            foreach ($arr as $key => $value) {
                $q.="`" . $key . "` = ";
                $q.="'" . $value . "',";
            }
            $q = substr($q, 0, -1);
            $q.="";
            
            $r = $this->conn->query($q);          
            
            if ($r === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    
    function updateOpenHours($arr) {
         if ( count($arr) > 0 ) {
            $q = "UPDATE `open_hours` SET ";
            foreach ($arr as $key => $value) {
                $q.="`" . $key . "` = ";
                $q.="'" . $value . "',";
            }
            $q = substr($q, 0, -1);
            $q.="";
            
            $r = $this->conn->query($q);          
            
            if ($r === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
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
    
    function getTotalUnreadForData() {
        $data = array();
        $i = 0;
        $q = "SELECT COUNT(`id`) AS `unread` FROM `messages` WHERE `is_read` = '0'";
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function getTotalCartItemsBySession($session_id) {
        $data = array();
        $i = 0;
        $q = "SELECT count(`id`) as `total` FROM `transactions_cart` WHERE `session_id` = '".$session_id."'";
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
        while ($row = $r->fetch_assoc()) {
            $result[$i] = $row;
            $i++;
        }
        return $result;
    }
    
    function getUnread() {
        $data = array();
        $i = 0;
        $q = "SELECT count(`id`) as `total_unread` FROM `messages` where `is_read` = 0";
        $r = $this->conn->query($q);
        $result = array();
        $i = 0;
            while ($row = $r->fetch_assoc()) {
                $result[$i] = $row;
                $i++;
            }
            return $result;
        }
    function updateCartItem($arr, $item_id, $session_id) {
        if (count($arr) > 0 ) {
            $q = "UPDATE `transactions_cart` SET ";
            foreach ($arr as $key => $value) {
                $q.="`" . $key . "` = ";
                $q.="'" . $value . "',";
            }
            $q = substr($q, 0, -1);
            $q.=" WHERE `item_id` = '".$item_id."' AND `session_id`= '".$session_id."'";
            
            $r = $this->conn->query($q);          
            
            if ($r === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
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
        }}
    
     function getItemsByCategoryForTransaction($id) {
        $query = "SELECT i.id,i.item_name,i.item_price,i.item_image,i.item_desc,cat.category_name FROM `items` AS i JOIN `categories` AS cat WHERE i.c_id = cat.id AND i.status = 1 AND cat.id = ".$id."";
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