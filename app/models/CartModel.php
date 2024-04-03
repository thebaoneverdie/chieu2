<?php

class CartModel {
    private $sessionKey = 'cart';
    
    // Lấy toàn bộ giỏ hàng từ session
    public function getCart() {
        $this->startSession();
        return isset($_SESSION[$this->sessionKey]) ? $_SESSION[$this->sessionKey] : array();
    }
    
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($productId, $quantity) {
        $this->startSession();
        $cart = $this->getCart();
        
        if (array_key_exists($productId, $cart)) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }
        
        $_SESSION[$this->sessionKey] = $cart;
    }
    
    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($productId) {
        $this->startSession();
        $cart = $this->getCart();
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $_SESSION[$this->sessionKey] = $cart;
            return true;
        }
        
        return false;
    }
    
    // Cập nhật số lượng của sản phẩm trong giỏ hàng
    public function updateQuantity($productId, $quantity) {
        $this->startSession();
        $cart = $this->getCart();
        
        if (isset($cart[$productId])) {
            $cart[$productId] = $quantity;
            $_SESSION[$this->sessionKey] = $cart;
            return true;
        }
        
        return false;
    }
    
    // Xóa toàn bộ giỏ hàng
    public function clearCart() {
        $this->startSession();
        unset($_SESSION[$this->sessionKey]);
    }
    
    // Khởi động session nếu chưa được bắt đầu
    private function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}
