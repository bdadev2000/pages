<?php
include ("./includes/class-autoload.inc.php");
require_once ("./templates/header.php");

?>

<!-- Button trigger modal -->
<div class="text-center">
    <button type="button" class="btn btn-primary my-5" data-bs-toggle="modal" data-bs-target="#addPost">
        Create A Page
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="page.process.php" method="post">
                    <div class="form-group">
                        <label>Tittle:</label>
                        <input type="text" class="form-control" name="page_title" required>
                    </div>
                    <div class="form-group">
                        <label>Content:</label>
                        <textarea type="text" class="form-control" name="page_body" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Reference:</label>
                        <input type="text" class="form-control" name="page_reference" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add Page</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <?php $pages = new Pages();?>
    <?php if($pages->getPage()): ?>
        <?php foreach ($pages->getPage() as $page): ?>
            <div class="card border-primary mb-3 mx-auto mt-5" style="max-width: 25rem;">
                <div class="card-header text-primary">
                    <h5 class="card-title"><?php echo $page['title'];?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $page['body'];?></p>
                    <h6 class="subtitle d-flex flex-row-reverse pt-2 pb-3">Reference:<?php echo $page['reference'];?></h6>
                    <div class="d-flex flex-row-reverse">
                        <a href="editForm.php?id=<?= $page['id'];?>" class="btn btn-warning">Edit</a>
                        <a href="page.process.php?id=<?= $page['id']; ?>&send=del" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php  endforeach; ?>
    <?php else: ?>
        Empty Pages
    <?php endif; ?>
</div>

<?php
require_once ("./templates/footer.php");
?>

