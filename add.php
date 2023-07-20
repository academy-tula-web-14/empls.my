<?php include_once "funcs.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Employees list</title>
</head>
<body>
    <div class="container">
    
    <?php include "header.tpl.php"; ?>
    <?php $link = connect(); ?>

    <h3>Add Employee</h3>
    <form action="add_db.php" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name last</span>
            <input required type="text" name="name_last" class="form-control" aria-describedby="basic-addon1">

            <span class="input-group-text" id="basic-addon2">Name first</span>
            <input type="text" name="name_first" class="form-control" aria-describedby="basic-addon2">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Birth date</span>
            <input type="date" name="birth_date" class="form-control" aria-describedby="basic-addon3">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4">Salary</span>
            <input type="number" name="salary" class="form-control" aria-describedby="basic-addon4">
        </div>

        <div class="input-group mb-3">
            <?php
                $sql = "SELECT * 
                            FROM department";
                $result = $link->query($sql);
            ?>
            <select class="form-select" aria-label="Default select example" name="department_id">
                <?php foreach($result as $row): ?>
                <option value="<?=$row["id"];?>"><?=$row["title"];?></option>
                <?php 
                    endforeach; 
                    $result->free();
                ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-success" value="Add employee">
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
    
    <?php include "footer.tpl.php"; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>