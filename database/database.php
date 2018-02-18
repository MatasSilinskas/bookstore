<?php

class Database {
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "Bookstore";
    public static $db = null;
    private $custom_query = "";
    private $custom_query_clause = "WHERE";
    
    function __construct() {
        if(Database::$db === null )
        {
            ob_start();
            Database::$db = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        }
    }
}

?>