<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"> </script>
    <script src = "script.js">
 
    </script>
</head>
<body>
    <h1>Заполнение поездок и их вывод</h1>
    <h2>Внесение поездок</h2>
    <label for="">Имя курьера</label>
    <select name="fio" id="">
        <?php foreach ($resultFio as $key => $value) { ?>
            <option value="<?= $value['fio'] ?>"><?= $value['fio'] ?></option>
        <?php }; ?>
    </select><br>
    <label for="">Название города</label>
    <select name="region" id="">
        <?php foreach ($resultRegions as $key => $value) { ?>
            <option value="<?= $value['city'] ?>"><?= $value['city'] ?></option>
        <?php }; ?>
    </select><br>
    <label for="">дата выезда</label>

    <input type="date" id="date_of_daperture">
    <br>
    <div id="div">дата прибытия</div>
    <br>
    <input type="button" class="btn btn-primary" id="but" value="готово">
    <div id="result"></div>

    <h2>Поездки курьеров</h2>
    <table class="table" id="table">
        <thead>
            <tr>
                <th>№</th>
                <th scope="col">
                    <select name="name">
                        <option selected="selected"></option>


                    </select>
                </th>
                <th scope="col">
                    <select name="city">
                        <option selected="selected"></option>
                    </select>
                </th>
                <th scope="col">Дата отправки</th>
                <th scope="col">Дата приезда в пункт назначения</th>
                <th scope="col">Дата прибытия в Москву</th>
                <th scope="col">Редактировать поездку</th>
                <th scope="col">Обновить поездку</th>
                <th scope="col">Удалить поездку</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <input type="button" class="btn btn-primary" id="but1" value="обновить таблицу">
    </table>
</body>

</html>