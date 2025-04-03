<?php

declare(strict_types=1);


use App\Reason;

$reasons     = new Reason();
$reasonList = $reasons->getAll();
?>

<form action="/expense" method="post" class="row row-cols-lg-auto py-4">
    <div class="col">Chiqimlar</div>
    <div class="col-12">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>

        <label for="number" class="form-label">Input Money</label>
        <input type="number" id="number" class="form-control" name="expense" aria-label="Cash input field" required>

        <label for="description" class="form-label">Input description</label>
        <input type="text" id="description" class="form-control" name="expense-description" aria-label="description input field">

        <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="reason_id">
                <option selected disabled>Reason</option>
                <?php  foreach ($reasonList as $reason): ?>
                    <option value="<?= htmlspecialchars((string) $reason['id']) ?>">
                        <?= htmlspecialchars((string) $reason['reasons']) ?>
                    </option>

                <?php endforeach; ?>
            </select>
            <label for="floatingSelect">selects</label>
            <input type="hidden" name="status" value="Inactive">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">+</button>

</form>