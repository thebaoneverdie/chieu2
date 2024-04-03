<?php class AccountController
{
    private $db;
    private $accountModel;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }
    function login()
    {
        include_once "app/views/account/login.php";
    }
    function register()
    {
        include_once "app/views/account/register.php";
    }
    function logout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["role"]);
        header("Location: /chieu2");
    }
    function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $errors = [];
            if (empty($username)) {
                $errors['username'] = 'Tài khoản không được để trống';
            }
            if (empty($password)) {
                $errors['password'] = 'Mật khẩu không hợp lệ';
            }
        }
        if (count($errors) > 0) {
            include_once "app/views/account/login.php";
        }
        $account = $this->accountModel->getAccountByUsername($username);
        if ($account && password_verify($password, $account->password)) {
            //Dang nhap thanh cong
            //Luu trang thai dang nhap
            $_SESSION["username"] = $account->username;
            $_SESSION["role"] = $account->role;
            header("location: /chieu2");
        } else {
            $errors['account'] = 'Dang nhap that bai';
            include_once "app/views/account/login.php";
        }
    }
    function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmpassword = $_POST['confirmpassword'] ?? '';
            $fullname = $_POST['fullname'] ?? '';

            $errors = [];
            if (empty($fullname)) {
                $errors['fullname'] = 'Tên không được để trống';
            }
            if (empty($username)) {
                $errors['username'] = 'Tài khoản không được để trống';
            }
            if (empty($password)) {
                $errors['password'] = 'Mật khẩu không hợp lệ';
            }
            if ($password != $confirmpassword) {
                $errors["confirmpassword"] = "Mat khau xac nhan chua dung";
            }

            $account = $this->accountModel->getAccountByUsername($username);
            if ($account) {
                $errors["account"] = "Tai khoan nay da co nguoi dang ky";
            }

            if (count($errors) > 0) {
                include_once "app/views/account/register.php";
            } else {
                $password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
                $result = $this->accountModel->save($username, $password, $fullname);
                if ($result) {
                    header("Location: /chieu2/account/login");
                }
            }
        }
    }
}