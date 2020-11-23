<?php

require_once("../crud/php/component.php");
require_once("../crud/php/operation.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>

    <script src="https://kit.fontawesome.com/95ce14bdba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom stylesheet-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-book-open"></i>Atomic Habits</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "habit_id", ""); ?>   
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>", "Habit Name", "habit_name", ""); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "add", "dat-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                    <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "dat-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                    <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "dat-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash'></i>", "delete", "dat-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                </div>
            </form>
        </div>

        <!-- Bootstrap table -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Habit Name</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                        if(isset($_POST['read'])){
                            $result = getData();
                            if($result){
                                while($row = mysqli_fetch_assoc($result)){?>
                                    <tr>
                                        <td data-id="<?php echo $row['id'];?>"><?php echo $row['id'];?></td>
                                        <td data-id="<?php echo $row['id'];?>"><?php echo $row['habit_name'];?></td>
                                        <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id'];?>"></i></td>
                                    </tr>
                                <?php
                                }
                            }
                        }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="../crud/php/main.js"></script>
</body>
</html>