<?php
declare(strict_types=1);

use App\Money;
use App\Reason;

class MoneyController
{
    public function addMoney()
    {
        $cash = new Money();
        $cash->add((int)$_POST['cash'], (string)$_POST['description'],(string)$_POST['status']??'active');
        header('Location: /cashs');
        exit();
    }

    public function deleteMoney()
    {
        $moneyId = $_GET['id'] ?? null;
        $reasonId = $_GET['reason_id'] ?? null;
        if ($moneyId === null || $reasonId === null) {
            echo "Both 'id' and 'reason_id' must be provided.";
            exit;
        }

        $money = new Money();
        $money->delete((int)$moneyId, (int)$reasonId);

        header('Location: /cashs');
        exit();
    }

    public function addExpense()
    {
        $cash = new Money();
        $cash->addExpense((int)$_POST['expense'], (string)$_POST['expense-description'],(string)$_POST['status']??'Inactive');
        header('Location: /expense');
        exit();
    }

    public function deleteExpense()
    {
        $expenceId = $_GET['id'] ?? null;
        $reasonId = $_GET['reason_id'] ?? null;
        if ($expenceId === null || $reasonId === null) {
            echo "Both 'id' and 'reason_id' must be provided.";
            exit;
        }

        $expence = new Money();
        $expence->deleteExpense((int)$expenceId, (int)$reasonId);

        header('Location: /expense');
        exit();
    }
}