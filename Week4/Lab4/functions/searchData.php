<?php
$mode = filter_input(INPUT_GET, 'searchby');
$value = filter_input(INPUT_GET, 'searchFxn');
$db = getDatabase();
switch ($mode) {
    case "corp":
        $stmt = $db->prepare("SELECT * FROM corps WHERE UPPER(corp) LIKE CONCAT(:value,'%') AND active = 1 ORDER BY corp ASC");
        $binds = array(
            ":value" => strtoupper($value)
        );
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        break;
    case "owner":
        $stmt = $db->prepare("SELECT * FROM corps WHERE UPPER(owner) LIKE CONCAT(:value,'%') AND active = 1 ORDER BY owner ASC");
        $binds = array(
            ":value" => strtoupper($value)
        );
        $results = array();
        if ($stmt->execute($binds)) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        break;
    case "zipcode":
        $stmt = $db->prepare("SELECT * FROM corps WHERE UPPER(zipcode) LIKE CONCAT(:value,'%') AND active = 1 ORDER BY zipcode ASC");
        $binds = array(
            ":value" => $value
        );
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        break;
    default:
}
