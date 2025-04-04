<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">Cash App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php use App\Money;

                if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/cashs">Kirim saqlash  </a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/expense">Chiqim Saqlash</a>
                    </li>
                <?php endif; ?>
            <?php $total = new Money();
            $totalExpense = $total->getTotalExpense();
            $totalCash = $total->getTotalCash();
            ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link">
                            Hisobdagi Kirim: <?= number_format($totalCash, 2) ?> UZS
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link">
                            Hisobdagi Chiqim: <?= number_format($totalExpense, 2) ?> UZS
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
            <?php if (!isset($_SESSION['username'])): ?>
                <a href="/login" class="btn btn-outline-primary mx-2">Login</a>
                <a href="/register" class="btn btn-outline-success">Register</a>
            <?php else: ?>
                <span class="navbar-text">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
                <a href="/logout" class="btn btn-outline-danger mx-2">Logout</a>
<!--                --><?php
//                $token=rand(1000000000,9999999999);
//                $db = DB::connect();
//                $stmt = $db->prepare("UPDATE users SET temp_token=:token WHERE email=:email");
//                $stmt->bind_param(':token', $token);
//                $stmt->bind_param(':email', $_SESSION['email']);
//                $stmt->execute();
                ?>
<!--                <a href="https://t.me/app_to_do_bot?start=--><?php //$token ?><!--" class="btn btn-outline-danger mx-2">Connect to Telegram</a>-->
            <?php endif; ?>
        </div>
    </div>
    <div class="container mt-4">
    <form method="get" action="">
        <div class="row mb-3">
            <div class="col">
                <label for="start_date" class="form-label">Boshlanish sanasi:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="<?= $_GET['start_date'] ?? '' ?>">
            </div>
            <div class="col">
                <label for="end_date" class="form-label">Tugash sanasi:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="<?= $_GET['end_date'] ?? '' ?>">
            </div>
            <div class="col align-self-end">
                <button type="submit" class="btn btn-primary">Filtrlash</button>
            </div>
        </div>
    </form>
    </div>
</nav>
</body>
</html>
