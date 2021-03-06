<?php
/**
 * Created by PhpStorm.
 * User: jo
 * Date: 06/05/18
 * Time: 00:51
 *
 * let a user create a game
 * @todo display a form with this user id as a hidden field named creator. This forms receives all the info for a game (schedule, system, description, name, etc...)
 * @todo the submit button adds this game to the database with its status sets at "looking for players"
 * @todo add the option to select related files
 */

require "../src/app/helpers.php";

if(!Auth::logged())
    redirect("games.php");


//query options for scrolling lists
$gamesystems = Gamesystem::make_list();
$reccurrences = Reccurrence::makelist();
$user = new User($_SESSION['user']);
$userfiles = $user->hisfiles();

$layout = new Layout("users");
include view("create_game_view.php");
$layout->show('Tables');