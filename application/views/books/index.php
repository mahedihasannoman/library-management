<h1><?= $title; ?></h1>

<a class="btn btn-info pull-right" href="<?php echo base_url(); ?>books/create">Add Book</a><br><br>

<?php echo form_open('books'); ?>
    <div class="form-group" style="display: inline;">
        <input type="text" name="search" value="<?php echo (isset($keyword)&&$keyword!=''?$keyword:''); ?>" class="form-control" placeholder="Search.." style="width:auto;display: inline;">
    </div>

    <div class="form-group" style="display: inline;">
        <select name="filter" class="form-control" style="width:auto;display: inline;">
            <option value="">None</option>
            <option value="1" <?php echo (isset($filter) && $filter=='1'?'selected="selected"':''); ?>>Issued</option>
            <option value="0" <?php echo (isset($filter) && $filter=='0'?'selected="selected"':''); ?>>Free</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-default">Go</button>
</form>

<?php if(empty($books)): ?>
    <p class="alert alert-danger">No record found.</p>
<?php endif; ?>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Author</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
        <?php foreach($books as $book): ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td>$ <?php echo $book['price']; ?></td>
                <td>
                    <?php if($book['is_assigned'] == 1): ?>
                        <span style="background:red;color:white;padding: 0px 7px;border-radius: 5px;">Issued</span>
                    <?php else: ?>
                        <span style="background:green;color:white;padding: 0px 7px;border-radius: 5px;">Free</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-info" href="<?php echo base_url(); ?>books/edit/<?php echo $book['id']; ?>">Edit</a>
                 </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
  </table>