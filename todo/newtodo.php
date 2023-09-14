<?php

//echo '<prev>';
//var_dump($_POST);
//echo '</prev>';

$todoName = $_POST['todo_name']??'';
$todoName = trim($todoName);

if($todoName)
{
    if(file_exists('todo.json'))
    {
        $json= file_get_contents('todo.json');
        $jsonArray= json_decode($json, true);
    }
    else
    {
        $jsonArray=[];
    }
    $jsonArray[$todoName]=['completed' =>false];
//    echo '<prev>';
//    var_dump($jsonArray);
//    echo '</prev>';
    file_put_contents('todo.json',json_encode($jsonArray, JSON_PRETTY_PRINT));
}
header('Location: index.php');