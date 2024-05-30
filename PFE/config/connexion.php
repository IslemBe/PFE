<?php
try{
$access = mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$access=new PDO ("mysql:host=localhost;port=3308;dbname=monshowroom;charset=utf8", "root", "");
        
    } catch (Exception $e){
        $e->getMessage();
    }
?>