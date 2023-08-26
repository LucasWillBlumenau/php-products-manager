<?php

    class Product {
        
        public $id;
        public $name;
        public $price;

        public function __construct($args) {
            $this->id = isset($args["id"])? $args["id"]: null;
            $this->name = isset($args["name"])? $args["name"]: null;
            $this->price = isset($args["price"])? $args["price"]: null;
        }

        public function save() {
            $conn = get_connection();
            $sql = "INSERT INTO products(name, price) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sd", $this->name, $this->price);
            $stmt->execute();
            $this->id = mysqli_insert_id($conn);
            $conn->close();
        }

        public function delete() {
            $conn = get_connection();
            $sql = "DELETE FROM products WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $conn->close();
        }

        public static function get_all() {
            $conn = get_connection();
            $sql = "SELECT * FROM products";
            $query_result = $conn->query($sql);
            $conn->close();
            
            $products = array();
            foreach($query_result as $row) {
                array_push($products, $row);
            }
            return $products;
        }

        public static function from_id($id) {
            $conn = get_connection();

            $sql = "SELECT * FROM products WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $conn->close();

            if ($data == null) {
                return null;
            }
            return new Product($data);
        }
    }

?>