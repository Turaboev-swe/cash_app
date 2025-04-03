<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
    <title>Cash App</title>
</head>
<body>
<?php require 'view/partials/navbar.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="my-5">Chiqim</h1>
            <?php
            require './view/expenses-list.php';
            echo "<hr class='border border-2 opacity-50'>";
            ?>
            <div class="d-flex gap-4">
                <?php require './view/new-expense-form.php'; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>