<?php
include 'dbconnection.php';
$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
