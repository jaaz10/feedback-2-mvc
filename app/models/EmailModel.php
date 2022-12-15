<?php

class EmailModel
{
    protected $conn;

    public function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function selectAll()
    {
        $sql = 'SELECT * FROM feedback'; // select all from feedback table
        $result = mysqli_query($this->mysqli, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
