<?php
declare(strict_types=1);

namespace App;
use DB;
use mysqli;

class Money
{
    private mysqli $mysqli;

    public function __construct()
    {
        $this->mysqli = DB::connect();
    }

    public function add(int $money, string $description,string $status = 'Active'): void
    {

        $stmt = $this->mysqli->prepare("INSERT INTO cash (body, description, user_id, reason_id,status) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error preparing statement: " . $this->mysqli->error);
        }

        $stmt->bind_param("isiis", $money, $description, $_SESSION['user_id'], $_POST['reason_id'],$_POST['status']);

        if ($stmt->execute()) {
            echo "Money added successfully.";
        } else {
            echo "Error adding money record: " . $stmt->error;
        }
    }
    public function addExpense(int $expense, string $description, string $status = 'Inactive'): void
    {

        $stmt = $this->mysqli->prepare("INSERT INTO cash (expense, expense_description, user_id, reason_id, status) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error preparing statement: " . $this->mysqli->error);
        }

        $stmt->bind_param("isiis", $expense, $description, $_SESSION['user_id'], $_POST['reason_id'],$status);

        if ($stmt->execute()) {
            echo "Money added successfully.";
        } else {
            echo "Error adding expence record: " . $stmt->error;
        }
    }


    public function getCash(): array
    {
        $stmt = $this->mysqli->query('SELECT id,body, description, reason_id, user_id FROM cash WHERE status = "Active"');
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getExpense(): array
    {
        $stmt = $this->mysqli->query('SELECT id,expense, expense_description, reason_id, user_id FROM cash WHERE status = "Inactive"');
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getTotalExpense(): int
    {
        $stmt = $this->mysqli->query('SELECT SUM(expense) as totalExpense FROM cash');
        $result = $stmt->fetch_assoc();
        return (int) $result['totalExpense'];
    }
    public function getTotalCash(): int
    {
        $stmt = $this->mysqli->query('SELECT SUM(body) as totalCash FROM cash');
        $result = $stmt->fetch_assoc();
        return (int) $result['totalCash'];
    }

    public function delete(int $moneyId, int $reasonId): void
    {
        $sql = "DELETE FROM cash WHERE id = ? AND reason_id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ii", $moneyId, $reasonId);

        if ($stmt->execute()) {
            echo "Money record deleted successfully.";
        } else {
            echo "Error deleting money record: " . $stmt->error;
        }
    }
    public function deleteExpense(int $Expense_moneyId, int $reasonId): void
    {
        $sql = "DELETE FROM cash WHERE id = ? AND reason_id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ii", $Expense_moneyId, $reasonId);

        if ($stmt->execute()) {
            echo "Money record deleted successfully.";
        } else {
            echo "Error deleting money record: " . $stmt->error;
        }
    }
}
