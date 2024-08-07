<?php
ob_start();
session_start(); // iniates user session 
error_reporting(0);
date_default_timezone_set('Africa/Kampala');
$dtime = date("Y-m-d H:i:s A", time());
$now = date("Y-m-d h:i:s A", time());
$today = date("Y-m-d");
defined("APP_DIR") or define("APP_DIR", "academy/admin");
defined("DB_URL") or define("DB_URL", $_SERVER['HTTP_HOST']);
defined("DS") or define("DS", DIRECTORY_SEPARATOR);
defined("BASE_URL") or define("BASE_URL", $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']);

switch (DB_URL) {
	case 'localhost':
		defined("DB_SERVER") or define("DB_SERVER", 'localhost');
		defined("DB_USER") or define("DB_USER", "root");
		defined("DB_PASS") or define("DB_PASS", "Trail#123");
		defined("DB_NAME") or define("DB_NAME", "zadecada_sysdb");
		defined("SITE_URL") or define("SITE_URL", BASE_URL . '/' . APP_DIR . '/');
		$login_url = 'http://localhost/academy/';
		break;
	case 'https://zadecadacademy.com': //when its running online 
		defined("DB_SERVER") or define("DB_SERVER", 'localhost');
		defined("DB_USER") or define("DB_USER", "zadecada_superadmin");
		defined("DB_PASS") or define("DB_PASS", "LSEjaBhsNXxx21t");
		defined("DB_NAME") or define("DB_NAME", "zadecada_sysdb");
		defined("SITE_URL") or define("SITE_URL", "https://zadecadacademy.com/admin/");
		$login_url = 'https://zadecadacademy.com';
		break;

	case '127.0.0.1:8080':
		defined("DB_SERVER") or define("DB_SERVER", 'localhost');
		defined("DB_USER") or define("DB_USER", "root");
		defined("DB_PASS") or define("DB_PASS", "Trail#123");
		defined("DB_NAME") or define("DB_NAME", "zadecada_sysdb");
		defined("SITE_URL") or define("SITE_URL", BASE_URL . '/' . APP_DIR . '/');
		break;

	default:
		defined("DB_SERVER") or define("DB_SERVER", 'localhost');
		defined("DB_USER") or define("DB_USER", "zadecada_superadmin");
		defined("DB_PASS") or define("DB_PASS", "LSEjaBhsNXxx21t");
		defined("DB_NAME") or define("DB_NAME", "zadecada_sysdb");
		defined("SITE_URL") or define("SITE_URL", "https://zadecadacademy.com/admin/");
		$login_url = 'https://zadecadacademy.com';
}

try {
	$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$dbh = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => true));
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
	echo $e->getMessage();
}

function redirect_page($url)
{
	//print_r($url);exit;
	header("Location: {$url}");
	exit;
}

function dbSQL($q = '')
{ // function to query rows and return an array
	global $dbh;
	if (empty($q)) return FALSE;
	$r = $dbh->prepare($q);
	$r->execute();
	$results = array();
	while ($row = $r->fetch(PDO::FETCH_OBJ)) {
		$results[] = $row;
	}
	return $results;
}

function dbRow($query = '')
{ // function to get one row 
	//print_r($query);exit;
	global $dbh;
	$r = $dbh->prepare($query);
	$r->execute();
	//print_r($r->fetch(PDO::FETCH_OBJ));exit;
	return $r->fetch(PDO::FETCH_OBJ); // returns a row 
}

function dbOne($query = '', $field = '')
{ // returns a field from the query 
	global $dbh;
	$r = dbRow($query);
	return $r ? $r->$field : NULL; // returns one field 
}

function dbDelete($tbl = '', $field = '', $id = '')
{
	global $dbh;
	if ($tbl != '' && $field != '' && $id != '') {
		$sql = 'DELETE FROM ' . $tbl . ' WHERE ' . $field . ' = ' . $id . '';
		return $dbh->exec($sql);
	} else {
		return NULL;
	}
}


function get_lecturers()
{
	$result = dbSQL("SELECT * FROM team order by name ");
	return $result;
}

function get_programs()
{
	$result = dbSQL("SELECT * FROM programs order by pg_name ");
	return $result;
}

function get_courses()
{
	$result = dbSQL("SELECT * FROM courses INNER JOIN programs ON programs.pid=courses.program order by courses.cs_name ");
	return $result;
}

function convertDate($date)
{
	$date_array = explode("-", $date); // split the array
	$var_year = $date_array[0]; //year segment
	$var_month = $date_array[1]; //month segment
	$var_day = $date_array[2]; //day seqment

	if ($var_month == 1) {
		$month = "January";
	} elseif ($var_month == 2) {
		$month = "February";
	} elseif ($var_month == 3) {
		$month = "March";
	} elseif ($var_month == 4) {
		$month = "April";
	} elseif ($var_month == 5) {
		$month = "May";
	} elseif ($var_month == 6) {
		$month = "June";
	} elseif ($var_month == 7) {
		$month = "July";
	} elseif ($var_month == 8) {
		$month = "August";
	} elseif ($var_month == 9) {
		$month = "September";
	} elseif ($var_month == 10) {
		$month = "October";
	} elseif ($var_month == 11) {
		$month = "November";
	} else {
		$month = "December";
	}
	$new_date_format = "$month $var_day, $var_year"; // join them together
	return $new_date_format;
}

function slugify($string)
{
	$preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
	$pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
	$string = preg_replace($pattern, '', $string);
	$string = preg_replace('~[^\\pL\d]+~u', '-', $string);
	$string = trim($string, '-');
	$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
	$string = strtolower($string);
	$string = preg_replace('~[^-\w]+~', '', $string);

	return $string;
}