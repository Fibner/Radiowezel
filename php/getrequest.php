<?php
session_start();
require "dbconnection.php";
require "Class/DbRepo.php";

echo DbRepo::GetRequest();