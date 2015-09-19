<?php
$mode = filter_input(INPUT_GET, 'order');
$value = filter_input(INPUT_GET, 'searchby');
$db = getDatabase();
switch ($mode) {
    case "ASC":
        if ($value == "corp") {
            $stmt = $db->prepare("SELECT * FROM corps WHERE active = 1 ORDER BY corp asc");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        if ($value == "owner") {
            $stmt = $db->prepare("SELECT * FROM corps WHERE active = 1 ORDER BY owner asc");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        if ($value == "zipcode") {
            $stmt = $db->prepare("SELECT * FROM corps WHERE active = 1 ORDER BY zipcode asc");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        break;
    case "DESC":
        if ($value == "corp") {
            $stmt = $db->prepare("SELECT * FROM corps WHERE active = 1 ORDER BY corp desc");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        if ($value == "owner") {
            $stmt = $db->prepare("SELECT * FROM corps WHERE active = 1 ORDER BY owner desc");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        if ($value == "zipcode") {
            $stmt = $db->prepare("SELECT * FROM corps WHERE active = 1 ORDER BY zipcode desc");
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        break;
    default:
}
