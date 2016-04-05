<?php 
// connect to db - local
$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200243850', 'gc200243850', '*pBRQ3AD');
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>