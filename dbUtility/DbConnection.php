<?php

class DbConnection
{
    private static $con;

    private static $server ="localhost";
    private static $username ="root";
    private static $password ="";

    //Establish database connection
    public static function getConnection()
    {
        self::$con = mysqli_connect(self::$server, self::$username, self::$password);
        return self::$con;
    }

    //Close database connection
    public static function closeConnection()
    {
        self::$con->close();
    }

}

?>