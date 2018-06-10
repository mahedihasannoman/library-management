<h1><?= $title; ?></h1>

<div class="form_validation_error">
    <?php echo validation_errors(); ?>
</div>
<?php echo form_open('book_management/issue'); ?>

  <div class="form-group required">
    <label class="control-label">Select Student</label>
    <select name="student_id" class="form-control" required>
        <option value="">None</option>
        <?php foreach($students as $student): ?>
        <option value="<?php echo $student['id']; ?>"><?php echo $student['name'].'->'.$student['class']; ?></option>
        <?php endforeach; ?>
	</select>
  </div>

  <div class="form-group required">
    <label class="control-label">Select Book (Maximum two)</label>
    <select name="book_ids[]" class="form-control multi_books" multiple>
        <option value="">None</option>
        <?php foreach($books as $book): ?>
        <option value="<?php echo $book['id']; ?>"><?php echo $book['title'].'->'.($book['is_assigned']==1?'Issued':'Free'); ?></option>
        <?php endforeach; ?>
	</select>
  </div>

  <div class="form-group required">
    <label class="control-label">Return Date</label>
    <input type="text" class="form-control datepicker" name="return_date" placeholder="date">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>