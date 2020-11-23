<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

if(isset($_POST['add'])){
    createData();
}

if(isset($_POST['update'])){
    updateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}


function createData(){
    $habitname = textboxValue('habit_name');

    if($habitname){
        $sql = "INSERT INTO atomic_habits (habit_name) VALUES ('$habitname')";
        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record successfully inserted...!");
        }else{
            TextNode("error", "Error");
        }

    }else{
        TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

//messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from mysql database
function getData() {
    $sql = "SELECT * FROM atomic_habits";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

//update data
function updateData(){
    $habitid = textboxValue("habit_id");
    $habitname = textboxValue("habit_name");

    if($habitid && $habitname){
        $sql = "
            UPDATE atomic_habits SET habit_name='$habitname' WHERE id='$habitid'
        ";
        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success","Data Successfully Updated");
        }else{
            TextNode("error","Unable to Update Data");
        }

    }else{
        TextNode("error","Select Entry First to Update");
    }

}

function deleteRecord(){
    $habitid = (int)textboxValue("habit_id");

    $sql = "DELETE FROM atomic_habits WHERE id=$habitid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success", "Record Deleted Successfully...!");
    }else{
        TextNode("error","Unable to Delete Record");
    }
}

// function deleteBtn(){
//     $result = getData();
//     $i = 0;
//     if($result){
//         while($row = mysqli_fetch_assoc($result)){
//             $i++;
//             if($i > 2){
//                 buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i> Delete All", "deleteall", "");
//                 return;
//             }
//         }
//     }
// }