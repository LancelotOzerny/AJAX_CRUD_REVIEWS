<?php
require_once __DIR__ . '/autoload.php';

$reviews = \classes\ReviewTable::Read();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CRUD комментариев</title>

    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <script src="assets/js/jQuery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</head>
<body>
<div id="spinner" class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <img src="assets/img/spinner.gif">
</div>

<div id="messages" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"></div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="display-4 my-5 text-center">CRUD комментариев</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <button id="testButton" class="btn btn-outline-danger">press me</button>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"><a href="#" class="text-dark">ID</a></th>
            <th scope="col"><a href="#" class="text-dark">Пользователь</a></th>
            <th scope="col"><a href="#" class="text-dark">Email</a></th>
            <th scope="col">Комментарий</th>
            <th scope="col"><a href="#" class="text-dark">Дата</a></th>
        </tr>
        </thead>
        <tbody id="ReviewsList">
        </tbody>
    </table>
</div>

<div class="container">
    <div class="row my-5">
        <div class="col-12 d-flex justify-content-center">
            <div class="btn-group-lg">
                <button class="btn btn-outline-secondary">0</button>
                <button class="btn btn-secondary">1</button>
                <button class="btn btn-outline-secondary">2</button>
                <button class="btn btn-outline-secondary">3</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mx-5 py-5">
        <hr>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form class="form mb-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div>
                            <label for="InputName" class="form-label">Ваше имя</label>
                            <p class="form-text">Имя может содержать от 4 до 16 латинских букв или цифр</p>
                            <input id="InputName" class="form-control" type="text" placeholder="John">
                            <p id="NameInputErrors" class="form-text text-danger"></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div>
                            <label for="InputEmail" class="form-label">Ваш email</label>
                            <p class="form-text">Не забудьте <s>выгулять собаку</s> добавить @ в ваш email</p>
                            <input id="InputEmail" class="form-control" type="text" placeholder="John">
                            <p id="EmailInputErrors" class="form-text text-danger"></p>
                        </>
                    </div>
                </div>

                <div>
                    <label for="InputMessage" class="form-label">Комментарий</label>
                    <textarea id="InputMessage" class="form-control" style="min-height: 200px"
                              placeholder="Смотрел тут на днях фильм..."></textarea>
                    <p id="TextInputErrors" class="form-text text-danger"></p>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-end mb-5">
            <button id="CreateReviewButton" class="btn btn-md btn-success">Написать</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => $("#spinner").remove());
</script>
<script src="assets/js/updateTable.js"></script>
<script src="assets/js/addReview.js"></script>
</body>
</html>