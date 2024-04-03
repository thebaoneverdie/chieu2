<?php

class CartController {
    
    // Hàm thêm sản phẩm vào giỏ hàng
    public function addToCart($productId, $quantity) {
        $this->startSession();
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        
        if (array_key_exists($productId, $_SESSION['cart'])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
        echo "Sản phẩm đã được thêm vào giỏ hàng.";
        include_once 'app/views/cart/add.php';
    }
    
    // Hàm xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($productId) {
        $this->startSession();
        
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            echo "Sản phẩm đã được xóa khỏi giỏ hàng.";
        } else {
            echo "Sản phẩm không tồn tại trong giỏ hàng.";
        }
    }
    
    // Hàm cập nhật số lượng của sản phẩm trong giỏ hàng
    public function updateQuantity($productId, $quantity) {
        $this->startSession();
        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = $quantity;
            echo "Số lượng sản phẩm đã được cập nhật.";
        } else {
            echo "Sản phẩm không tồn tại trong giỏ hàng.";
        }
    }
    
    // Hàm khởi động session nếu chưa được bắt đầu
    private function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
   
}
?>