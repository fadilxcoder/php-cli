<?php
    require_once('db-connect.php');

    # Errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    # Database Manipulation
    function converter($query)
    {
        $arr = array();
        while( $data = $query->fetch_assoc()):
            $arr[] = $data;
        endwhile;
        return $arr;
    }

    function selectAll()
    {
        global $connection;
        $sql    = "SELECT * FROM vip_list ORDER BY id ASC";
        $query  = $connection->query($sql);
        $result = converter($query);
        return $result;
    }

    function insert($tbl, $data)
    {
        global $connection;

        foreach( array_keys($data) as $key )
        {
            $fields[] = "`$key`";
            $values[] = "'" .$data[$key] . "'";
        }
        $fields = implode(",", $fields);
        $values = implode(",", $values);
        $sql = "INSERT INTO `$tbl`($fields) VALUES ($values)";
        $connection->set_charset("utf8"); // UTF8 settings
        $connection->query($sql);
        return $connection->insert_id;;
    }
?>