<?php

declare(strict_types=1);

use App\Reason;
use JetBrains\PhpStorm\NoReturn;

class ReasonController
{
    public function addReasonExpense(): void
    {
        $reason = new Reason();
        $reason->addReasonExpense((string)$_POST['reason']);
        header('Location: /reasons');
        exit();
    }
    public function addReasonCash(): void
    {

        $reason_cash = new Reason();
        $reason_cash->addReasonCash((string)$_POST['reason_cash']);
        header('Location: /reasons');
        exit();
    }
}