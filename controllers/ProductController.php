<?php

    include '../../models/Product.php';
    include 'Response.php';
    

    class ProductController {

        public static function delete($id) {
            if (!isset($id)) {
                return new Response(["message" => "You must pass an id"], 400);
            }

            if (!ctype_digit($id)) {
                return new Response(["message" => "Invalid id"], 400);
            }

            if ((int) $id < 1) {
                return new Response(["message" => "The id must be major than zero"], 400);
            }

            $product = new Product(["id" => $id]);
            $product->delete();
            return new Response(["message" => "Product deleted succesfully"], 200);
        }

        public static function select_one($id) {
            if (!isset($id)) {
                return new Response(["message" => "You must pass an id"], 400);
            }

            if (!ctype_digit($id)) {
                return new Response(["message" => "Invalid id"], 400);
            }

            if ((int) $id < 1) {
                return new Response(["message" => "The id must be major than zero"], 400);
            }

            $product = Product::from_id($id);
            if ($product == null) {
                return new Response(["message" => "There's no product with this id"], 404);
            }
            return new Response($product, 200);
        }

        public static function select_all() {
            $products = Product::get_all();
            return new Response($products, 200);
        }

        public static function save($name, $price) {
            if (!isset($name)) {
                return new Response(["message" => "You must pass a name"], 400);
            }
            if (!isset($price)) {
                return new Response(["message" => "You must pass a price"], 400);
            }

            if (!is_numeric($price)) {
                return new Response(["message" => "The price must be a float"], 400);
            }

            $product = new Product(["name" => $name, "price" => $price]);
            $product->save();
            return new Response($product, 201);
        }
    }

?>