<?php
require "dbconnection.php";
require "Class/DbRepo.php";
echo DbRepo::getHistory(false);
return;
