<?php class Auth
{
    static function isLoggedIn()
    {
        return isset($_SESSION["username"]);
    }
    static function isAdmin()
    {
        return (isset($_SESSION["username"]) && $_SESSION["role"] == "admin");
    }
    static function isUser()
    {
        return (isset($_SESSION["username"]) && $_SESSION["role"] == "user");
    }
}