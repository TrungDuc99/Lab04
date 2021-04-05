
<?php

    require_once("./config/db.class.php");

    class Product{
        public $productID;
        public $productName;
        public $cateID;
        public $price;
        public $quantity;
        public $description;
        public $picture;

        public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture)
        {
            # code...
            $this->productName = $pro_name;
            $this->cateID      = $cate_id;
            $this->price       = $price;
            $this->quantity    = $quantity;
            $this->description = $desc;
            $this->picture     = $picture;
        }

        public function save()
        {
            # code...

            $file_temp = $this->picture['tmp_name'];
            $user_file = $this->picture['name'];
            $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
            $filepath  = "uploads/".$timestamp.$user_file;
            if( move_uploaded_file( $file_temp, $filepath ) == false ){
                return false;
            }

            $db = new Db();

            $sql = "INSERT INTO Product (ProductName, CateID, Price, Quantity, Description, Picture) 
                    VALUES ('$this->productName', 
                            '$this->cateID',
                            '$this->price',
                            '$this->quantity',
                            '$this->description',
                            '$filepath')";
        
            $result = $db->query_execute($sql);
            return $result;
        }

        public function list_product()
        {
            # code...
            $db = new Db();
            $sql = "SELECT * FROM product";
            $result = $db->select_to_array($sql);
            return $result;
        }
        public function del_product($id){
            
            $db = new Db();
            $query = "DELETE FROM `product` WHERE 'ProductId' = '$id'";
            $result = $this->db->delete($query); 
            
                 if($result){
                    $alert = "<span class= 'success'>Product Deleted Successfully</span>";
                    return $alert;
                    }else{
                        $alert = "<span class= 'error'>Product Deleted Not Success</span>";
                    return $alert;
                    } 
    
        }
        public function list_product_by_cateid( $cateid )
        {
            # code...
            $db = new Db();
            $sql = "SELECT * FROM product WHERE CateID='$cateid'";
            $result = $db->select_to_array($sql);
            return $result;
        }

        public function list_product_relate( $cateid, $id )
        {
            # code...
            $db = new Db();
            $sql = "SELECT * FROM product WHERE CateID='$cateid' AND productID!= '$id'";
            $result = $db->select_to_array($sql);
            return $result;
        }

        public static function get_product( $id )
        {
            # code...
            $db = new Db();
            $sql = "SELECT * FROM product WHERE productID='$id'";
            $result = $db->select_to_array($sql);
            return $result;
        }
    }
?>