<?php

class SQLConnection
{
    /** Connects to database **/
    public static function open_connection()
    {
        return @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    }

    /** Disconnects from database **/
    public static function close_connection($connection)
    {
        @mysqli_close($connection);
    }
}
