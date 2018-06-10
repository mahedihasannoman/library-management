<h1><?= $title; ?></h1>
<a class="btn btn-info" href="<?php echo base_url(); ?>book_management/issue">Issue Books</a><br><br>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Books Name</th>
        <th>Issue Date</th>
        <th>Return Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
        <?php foreach($assignments as $assignment): ?>
            <tr>
                <td><?php echo $assignment['bid']; ?></td>
                <td><?php echo $assignment['name']; ?></td>
                <td>
                    <?php 
                        foreach($assignment['books'] as $book):
                            echo $book->title.'<br>';
                        endforeach;
                    ?>    
                </td>
                <td><?php echo $assignment['issue_date']; ?></td>
                <td>
                    <?php echo $assignment['return_date']; ?>
                </td>
                <td>
                    <?php if($assignment['status']==1): ?>
                        <span>Book Received<span>
                    <?php else: ?>
                    <a class="btn btn-info" href="<?php echo base_url(); ?>book_management/receive/<?php echo $assignment['bid']; ?>">Receive Book</a>
                    <?php endif; ?>
                    
                 </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
  </table>