<?php

$serverName="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="toDoLister";//database name

$conn=mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);//make connection to db

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());//if not connection successfull
}
