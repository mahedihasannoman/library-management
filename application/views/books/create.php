<h1><?= $title; ?></h1>

<div class="form_validation_error">
    <?php echo validation_errors(); ?>
</div>
<?php echo form_open('books/create'); ?>

  <div class="form-group required">
    <label class="control-label">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>

  <div class="form-group required">
    <label class="control-label">Author</label>
    <input type="text" class="form-control" name="author" placeholder="Author">
  </div>

  <div class="form-group required">
    <label class="control-label">Price</label>
    <input type="text" class="form-control" name="price" placeholder="Price">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>