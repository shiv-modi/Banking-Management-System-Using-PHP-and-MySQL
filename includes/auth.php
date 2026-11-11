<?php

function authenticate($con, $table, $email, $password, $type = null)
{
    $tables = array('useraccounts', 'login', 'manager');
    if (!in_array($table, $tables, true)) {
        return null;
    }

    $sql = "select * from {$table} where email = ?";
    if ($type !== null) {
        $sql .= " and type = ?";
    }

    $stmt = $con->prepare($sql);
    if ($type === null) {
        $stmt->bind_param("s", $email);
    } else {
        $stmt->bind_param("ss", $email, $type);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $account = $result->fetch_assoc();

    if (!$account) {
        return null;
    }

    $storedPassword = (string) $account['password'];
    $valid = password_verify($password, $storedPassword);
    $legacyPassword = hash_equals($storedPassword, (string) $password);

    if (!$valid && !$legacyPassword) {
        return null;
    }

    if ($legacyPassword || password_needs_rehash($storedPassword, PASSWORD_DEFAULT)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $update = $con->prepare("update {$table} set password = ? where id = ?");
        $update->bind_param("si", $hash, $account['id']);
        $update->execute();
        $account['password'] = $hash;
    }

    return $account;
}
