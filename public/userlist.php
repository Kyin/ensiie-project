<?php
/**
 * Created by PhpStorm.
 * User: jo
 * Date: 06/05/18
 * Time: 01:01
 *
 * Display the list of this site's users.
 */

require "../src/app/helpers.php";

if(!Auth::logged())
    redirect("index.php");

$userlist=User::userlist();
$usergamelist=User::usergamelist();
$layout = new Layout("users");
include view("user_list_view.php");
$layout->show("Tous les joueurs ");




