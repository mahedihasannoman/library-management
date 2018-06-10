<h1><?= $title; ?></h1>

<div class="form_validation_error">
    <?php echo validation_errors(); ?>
</div>
<?php echo form_open('students/create'); ?>

  <div class="form-group required">
    <label class="control-label">Title</label>
    <input type="text" class="form-control" name="name" placeholder="Name">
  </div>

  <div class="form-group required">
    <label class="control-label">Class</label>
    <input type="text" class="form-control" name="class" placeholder="Class">
  </div>

  
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>