<?php

require('config.php');

class Connection
{

    protected $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->db->connect_errno) {
            echo "No se pudo conectar a la base de datos" . $this->db->connect_errno;
            return;
        }

        $this->db->set_charset(DB_CHARSET);
    }
}

?>