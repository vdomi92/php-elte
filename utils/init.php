<?php
ini_set("display_errors", "on");
error_reporting(E_ALL);

session_start();

require_once("utils/storage.php");
require_once("utils/input.php");
require_once("utils/flash.php");
require_once("utils/navigation.php");
require_once("utils/user.php");

const DATA_FILE_USERS = "data/users.json";
const DATA_FILE_VOTES = "data/votes.json";

$users = load_from_file(DATA_FILE_USERS);
$votes = load_from_file(DATA_FILE_VOTES);

$current_user = get_logged_in_user($users);