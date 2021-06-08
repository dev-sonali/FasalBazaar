<?php
// require "../logger/LoggerFile.php";

class DbConnection
{
    //creating static property for later use
    private static $con;

    //Store required data in the static properties
    private static $server = "localhost";
    private static $username = "root";
    private static $password = "";

    //Establish database connection
    public static function getConnection()
    {
        // Logger::_info("Database Connection Established.");

        self::$con = mysqli_connect(self::$server, self::$username, self::$password);
        return self::$con;
    }

    //Close database connection
    public static function closeConnection()
    {
        // Logger::_info("Database Connection Close.");
        self::$con->close();
    }
}
