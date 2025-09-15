<?php
require 'Database.php';

$db = new Database();

$result = $db->select("SELECT NOW()");
print_r($result);

