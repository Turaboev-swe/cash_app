<?php

declare(strict_types=1);


use App\Money;
use App\Reason;

$money     = new Money();
$expenseList = $money->getExpense();

$reasons   = new Reason();
$reasonList = $reasons->getAllForExpense();

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>

<table class="table table-white table-hover">
    <thead>
    <tr>
        <th>Summa</th>
        <th>Nima uchun</th>
        <th>Sarlavha</th>
        <th>O'chirish</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($expenseList as $expense_money): ?>
        <?php
        $Expense_moneyId = $expense_money['id'];
        $reason = null;
        if (!empty($expense_money['reason_id'])) {
            $reason = $reasons->getById($expense_money['reason_id']);
        }
        ?>
        <tr>
            <td><?= htmlspecialchars((string) $expense_money['expense']) ?></td>
            <td><?= htmlspecialchars((string) $reason['reasons']) ?></td>
            <td><?= htmlspecialchars((string) $expense_money['expense_description']) ?></td>
            <td>
                <form action="/delete-expense" method="get" class="ms-2">
                    <input type="hidden" name="id" value="<?= $Expense_moneyId ?>">
                    <input type="hidden" name="reason_id" value="<?= $expense_money['reason_id'] ?>">
                    <button type="submit" class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


