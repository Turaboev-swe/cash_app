<?php

declare(strict_types=1);

use App\Money;
use App\Reason;

$money = new Money();
$reasons = new Reason();

$cashFilterList = 0;

if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
    $cashFilterList = $money->getCashByDateRange($_GET['start_date'], $_GET['end_date']);
}

    $cashList = $money->getCash();

$reasonList = $reasons->getAllForCash();

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>

<div class="container mt-4">

    <!-- Sana filter form -->
    <form method="get" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="start_date" class="form-label">Boshlanish sanasi</label>
            <input type="date" class="form-control" id="start_date" name="start_date"
                   value="<?= htmlspecialchars($_GET['start_date'] ?? '') ?>">
        </div>
        <div class="col-md-4">
            <label for="end_date" class="form-label">Tugash sanasi</label>
            <input type="date" class="form-control" id="end_date" name="end_date"
                   value="<?= htmlspecialchars($_GET['end_date'] ?? '') ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
        <li class="nav-item">
            <a class="nav-link">
                Hisobdagi Chiqim: <?= number_format($cashFilterList, 2) ?> UZS
            </a>
        </li>
    </form>

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
        <?php foreach ($cashList as $moneyItem): ?>
            <?php
            $moneyId = $moneyItem['id'];
            $reason = $reasons->getByIdCash($moneyItem['reason_id']);
            ?>
            <tr>
                <td><?= htmlspecialchars((string)$moneyItem['body']) ?></td>
                <td><?= htmlspecialchars((string)$reason['reason_cash']) ?></td>
                <td><?= htmlspecialchars((string)$moneyItem['description']) ?></td>
                <td>
                    <form action="/delete-money" method="get" class="ms-2">
                        <input type="hidden" name="id" value="<?= $moneyId ?>">
                        <input type="hidden" name="reason_id" value="<?= $moneyItem['reason_id'] ?>">
                        <button type="submit" class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
