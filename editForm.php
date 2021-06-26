<?php
include "./includes/class-autoload.inc.php";
require_once "./templates/header.php";

$pages = new Pages();
$page  = $pages->editPage($_GET['id']);

$id = $page['id'];
$title = $page['title'];
$body = $page['body'];
$reference = $page['reference'];
?>

<div class="text-center">
    <h4>UPDATE PAGE</h4>
</div>

<div class="col-md-7 mx-auto">
    <form action="page.process.php?id=<?= $page['id'] ?>" method="post">
        <div class="form-group">
            <label>Tittle:</label>
            <input type="text" class="form-control" name="page_title" value="<?= $title; ?>" required>
        </div>
        <div class="form-group">
            <label>Content:</label>
            <textarea type="text" class="form-control" name="page_body" required> <?= $body; ?> </textarea>
        </div>
        <div class="form-group">
            <label>Reference:</label>
            <input type="text" class="form-control" name="page_reference" value="<?= $reference; ?>" required>
        </div>
        <div class="modal-footer">
            <a href="index.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" name="update" class="btn btn-primary">Update Page</button>
        </div>
    </form>
</div>

<?php
require_once "./templates/footer.php";
?>
