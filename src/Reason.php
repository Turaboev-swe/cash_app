<?php

declare(strict_types=1);

namespace App;

use DB;
use mysqli;

class Reason
{
    private mysqli $mysqli;

    public function __construct()
    {
        $this->mysqli = DB::connect();
    }
    public function addReasonExpense(string $reason,string $status = 'Active') : void
    {
        $stmt = $this->mysqli->prepare("INSERT INTO reasons ( reasons, status ) VALUES ( ?, ? )");

        if (!$stmt) {
            die("Error preparing statement: " . $this->mysqli->error);
        }
        $stmt->bind_param("ss", $reason,$status);

        if ($stmt->execute()) {
            echo "Money added successfully.";
        } else {
            echo "Error adding money record: " . $stmt->error;
        }
    }
    public function addReasonCash(string $reason_cash,string $status = 'Inactive') : void
    {

        $stmt = $this->mysqli->prepare("INSERT INTO reasons ( reason_cash, status ) VALUES ( ?, ? )");

        if (!$stmt) {
            die("Error preparing statement: " . $this->mysqli->error);
        }
        $stmt->bind_param("ss", $reason_cash,$status);

        if ($stmt->execute()) {
            echo "Reason added successfully.";
        } else {
            echo "Error adding money record: " . $stmt->error;
        }
    }

    public function getAllForCash(): array
    {
        $result = $this->mysqli->query('SELECT * FROM reasons WHERE status = "Inactive" AND reason_cash  IS NOT NULL');

        if (!$result) {
            die("Query error: " . $this->mysqli->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllForExpense(): array
    {
        $result = $this->mysqli->query('SELECT reasons FROM reasons WHERE status = "Active" AND reasons  IS NOT NULL ');

        if (!$result) {
            die("Query error: " . $this->mysqli->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int|string $id): array
    {
        $id = (int) $id;
        $query = 'SELECT reasons FROM reasons WHERE id = ?';
        $stmt = $this->mysqli->prepare($query);

        if (!$stmt) {
            die("Prepare error: " . $this->mysqli->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc() ?: [];
    }
    public function getByIdCash(int|string $id): array
    {
        $id = (int) $id;
        $query = 'SELECT reason_cash FROM reasons WHERE id = ?';
        $stmt = $this->mysqli->prepare($query);

        if (!$stmt) {
            die("Prepare error: " . $this->mysqli->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc() ?: [];
    }
}