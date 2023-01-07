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
const DATA_FILE_VOTES = "data/polls.json";

$users = load_from_file(DATA_FILE_USERS);
$polls = load_from_file(DATA_FILE_VOTES);

$expiredPolls = array_filter($polls, function($poll){
    $today = new DateTime();
    $today->format("Y-m-d");
    return (new DateTime($poll['deadline']) < $today);
});

$activePolls = array_filter($polls, function($poll){
    $today = new DateTime();
    $today->format("Y-m-d");
    return (new DateTime($poll['deadline']) >= $today);
});

array_multisort (array_column($expiredPolls, 'deadline'), SORT_DESC, $expiredPolls);
array_multisort (array_column($activePolls, 'deadline'), SORT_DESC, $activePolls);

$current_user = get_logged_in_user($users);

$messages = load_from_flash("messages") ?? [];