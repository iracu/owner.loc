<?php

require __DIR__ . '/autoload.php';

$users = \App\Models\User::ow_find_all();
var_dump($users);