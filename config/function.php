<?php

session_start();

require 'dbconnection.php';

// Input fields validation
function validate($inputData) {
    global $connection;
    $validatedData = mysqli_escape_string($connection, $inputData);
    return trim($validatedData);
}

// Redirect from 1 page to another page with the message (status)
function redirect($url, $status) {
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}

// Display messages or status after any process.
function alertMessage() {
    if(isset($_SESSION['status'])) {        
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            '. $_SESSION['status'].'
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        unset($_SESSION['status']);
    }
}

// Insert records or data
function insert($tableName, $data) {
    global $connection;

    $table = validate($tableName);

    $columns = array_keys($data);
    $values = array_values($data);

    $finalColumn = implode(',', $columns);
    $finalValues = "'".implode("', '", $values)."'";

    $query = "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($connection, $query);
    return $result;
}

// Update data
function update($tableName, $id, $data) {
    global $connection;

    $table = validate($tableName);
    $id = validate($id);

    $updateDataString = "";

    foreach($data as $column => $value) {
        $updateDataString .= $column.'='."'$value',";
    }

    $finalUpdateData = substr(trim($updateDataString),0,-1);

    $query = "UPDATE $table SET $finalUpdateData WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    return $result;
}

// Get all data
function getAll($tableName, $status = NULL) {
    global $connection;

    $table = validate($tableName);
    $status = validate($status);

    if($status == 'status') {
        $query = "SELECT * FROM $table WHERE status='0'";
    }

    else {
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($connection, $query);
}

// Get data by id
function getById($tableName, $id)
{
    global $connection;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if($result) {
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $response = [
                'status' => 201,
                'data' => $row,
                'message' => 'Record found!'
            ];
            return $response;
        }

        else{
            $response = [
                'status' => 404,
                'message' => 'Not data found!'
            ];
            return $response;
        }
    }

    else {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong!'
        ];
        return $response;
    }
}

// Delete data from database using id
function delete($tableName, $id) {
    global $connection;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($connection, $query);
    return $result;
}

?>