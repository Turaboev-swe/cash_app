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

    public function getAllForCash(): array
    {
        $result = $this->mysqli->query('SELECT * FROM reasons WHERE reason_cash IS NOT NULL');

        if (!$result) {
            die("Query error: " . $this->mysqli->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllForExpense(): array
    {
        $result = $this->mysqli->query('SELECT * FROM reasons WHERE reasons IS NOT NULL');

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