
<?php

class DbConnection
{
    private $conn;

    // constructor
    function construct()
    {
        // connecting to database
        $this->connect();
    }

   
    function connect()
    {
       
        $this -> conn = new mysqli('localhost', 'myyhospital_1','myyhospital_user','qgR-@1xk8RGm');

        if(mysqli_connect_errno())
        {
            echo "Database Bağlanamadı amk" . mysqli_connect_error();
            return null;
        }

        return $this -> conn;
    }

}