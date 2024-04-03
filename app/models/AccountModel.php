<?php
class AccountModel
{
    private $conn;
    private $table_name = "accounts";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function getAccountByUsername($email)
    {
        $query = "SELECT * FROM " . $this->table_name . " where username = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function save($username, $password, $name, $role = "user")
    {
        // Truy vấn tạo sản phẩm mới

        $query = "INSERT INTO " . $this->table_name . " (username, password, name, role) VALUES (:username, :password, :name, :role)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $username = htmlspecialchars(strip_tags($username));
        $name = htmlspecialchars(strip_tags($name));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':role', $role);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}