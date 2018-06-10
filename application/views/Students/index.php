<h1><?= $title; ?></h1>
<a class="btn btn-info" href="<?php echo base_url(); ?>students/create">Add Student</a><br><br>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
      </tr>
    </thead>
    <tbody>
      
        <?php foreach($students as $student): ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['class']; ?></td>
                
            </tr>
        <?php endforeach; ?>

    </tbody>
  </table>