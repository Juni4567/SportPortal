<?php
/**
 * Created by PhpStorm.
 * User: Juni
 * Date: 8/28/2015
 * Time: 4:48 PM
 */
if (!mysql_connect("localhost", "root", "")) {
    die('oops connection problem ! --> ' . mysql_error());
}
if (!mysql_select_db("sp_db")) {
    die('oops database selection problem ! --> ' . mysql_error());
}
?>