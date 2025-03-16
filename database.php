<?php

namespace classes;

use mysqli_sql_exception;

class database
{
    protected static $server = "localhost";
    protected static $user = "root";
    protected static $password = "";
    protected static $databaseName = "web_app";

    public static function get()
    {
        try {
            return mysqli_connect(database::$server, database::$user, database::$password, database::$databaseName);
        } catch (mysqli_sql_exception) {
            function_alert("Error during connecting database!");
        }
    }
    public static function is_connected()
    {
        return mysqli_connect(database::$server, database::$user, database::$password, database::$databaseName);
    }
    public static function query($databaseData)
    {
        try {
            return mysqli_query(database::get(), $databaseData);
        } catch (mysqli_sql_exception) {
            function_alert("Error during connecting database query!");
        }
    }
    public static function fetch($databaseData)
    {
        try {
            return mysqli_fetch_assoc($databaseData);
        } catch (mysqli_sql_exception) {
            function_alert("Error during connecting database query!");
        }
    }
}