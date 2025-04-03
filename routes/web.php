<?php

declare(strict_types=1);
require_once 'controller/MoneyController.php';

Router::get('/', fn() => require 'view/pages/home.php');

Router::get('/cashs', fn() => require 'view/pages/cashs.php');

Router::post('/cashs', fn() => (new MoneyController())->addMoney());

Router::get('/delete-money', fn() => (new MoneyController())->deleteMoney());


Router::get('/expense', fn() => require 'view/pages/expenses.php');

Router::post('/expense', fn() => (new MoneyController())->addExpense());

Router::get('/delete-expense', fn() => (new MoneyController())->deleteExpense());

Router::get('/login', fn() => require 'view/pages/auth/login.php');
Router::post('/login', fn() => (new User())->login());

Router::get('/register', fn() => require 'view/pages/auth/resgister.php');
Router::post('/register', fn() => (new User())->register());

Router::get('/logout', fn() => (new User())->logout());
