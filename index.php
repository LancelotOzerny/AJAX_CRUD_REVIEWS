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

<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="display-4 my-5 text-center">CRUD комментариев</p>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-borderess">
        <thead>
        <tr>
            <th scope="col"><a href="#" class="text-dark">ID</a></th>
            <th scope="col"><a href="#" class="text-dark">Пользователь</a></th>
            <th scope="col"><a href="#" class="text-dark">Email</a></th>
            <th scope="col">Комментарий</th>
            <th scope="col"><a href="#" class="text-dark">Дата</a></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>0</th>
            <td>Lancelot</td>
            <td>lancelot.ozernuy@gmail.com</td>
            <td>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae illo pariatur quidem.
                Aliquam beatae excepturi, illum in incidunt natus, neque, nihil obcaecati praesentium quas
                quod repellat sed similique tempora ullam.
            </td>
            <td>15:40:12<br/>19.10.2002</td>
        </tr>
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
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-md btn-success">
                Написать
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => $("#spinner").remove());
</script>
</body>
</html>