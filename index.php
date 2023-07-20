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
    
    <div class="row">
        <div class="col">
            <a href="add.php" class="btn btn-primary">Add employee</a>
        </div>
        <div class="col">
            <a href="department.php" class="btn btn-success">Departmens Table</a>
        </div>
    </div>
    <hr>
    <div>
        <?php
            $sql = "SELECT e.id, 
                           e.name_first, 
                           e.name_last, 
                           e.birth_date, 
                           e.salary,
                           d.title
                        FROM employee AS e
                        LEFT OUTER JOIN department AS d
                            ON e.department_id = d.id";

            $result = $link->query($sql);
        ?>
        
        <table class="table table-striped">
            <thead>
                <th>Name Last</th>
                <th>Name First</th>
                <th>Birth Date</th>
                <th>Salary</th>
                <th>Department</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php foreach($result as $row): ?>
                <!-- <pre><?php print_r($row); ?></pre> -->
                <tr>
                    <td><?= $row["name_last"]?></td>
                    <td><?= $row["name_first"]?></td>
                    <td><?= $row["birth_date"]?></td>
                    <td><?= $row["salary"]?></td>
                    <td><?= $row["title"]?></td>
                    <td>
                        <form action="edit.php" method="post">
                            <!-- <input name="id" value="<?= $row["id"]?>" hidden>
                            <input type="submit" class="btn btn-primary" value="Edit"> -->
                            <a href="edit.php?id=<?= $row["id"]?>" class="btn btn-primary">Edit</a>
                        </form>
                    </td>
                    <td>
                        <form action="delete.php" method="post">
                            <input name="id" value="<?= $row["id"]?>" hidden>
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php 
                    endforeach; 
                    $result->free();
                ?>
            </tbody>
        </table>
    </div>

    


    <?php include "footer.tpl.php"; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>