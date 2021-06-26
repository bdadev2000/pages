<?php
include "./includes/class-autoload.inc.php";
$pages = new Pages();

//Add a new Page
if(isset($_POST['submit'])){
    $title = $_POST['page_title'];
    $body = $_POST['page_body'];
    $reference = $_POST['page_reference'];

    $pages->addPage($title,$body,$reference);
    header("location:{$_SERVER['HTTP_REFERER']}");
}
elseif(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['page_title'];
    $body = $_POST['page_body'];
    $reference = $_POST['page_reference'];

    $pages->updatePage($title,$body,$reference,$id);
    header("location:http://localhost/CRUD_PDO_OOP/02");
}
elseif($_GET['send']==='del'){
    $id = $_GET['id'];
    $pages->delPage($id);
    header("location:http://localhost/CRUD_PDO_OOP/02");

}
