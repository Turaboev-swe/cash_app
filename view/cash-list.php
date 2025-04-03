<?php

declare(strict_types=1);


use App\Money;

use App\Reason;

$money     = new Money();
$cashList = $money->getCash();

$reasons   = new Reason();
$reasonList = $reasons->getAll();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>

<div class="list-group">
    <?php foreach ($cashList as $money): ?>
        <?php
        $moneyId = $money['id'];
        $reason = $reasons->getById($money['reason_id']);
        ?>
        <div class="d-flex list-group-item">
            <p><?= htmlspecialchars((string) $money['body'] ) ?></p>
            <p><strong> :Nima uchun = </strong><?= htmlspecialchars((string) $reason['reasons']) ?></p>
            <p><strong>: Sarlavha = </strong><?= htmlspecialchars((string)$money['description']) ?></p>
            <form action="/delete-money" method="get" class="ms-2">
                <input type="hidden" name="id" value="<?= $moneyId ?>">
                <input type="hidden" name="reason_id" value="<?= $money['reason_id'] ?>">
                <button type="submit" class="btn btn-link text-danger"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
