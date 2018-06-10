<html>
	<head>
		<title>Library | Mahedi Hasan</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    
	</head>
	<body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>books">Books</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>students">Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>book_management">Book Issue  Managment</a>
            </li>

          </ul>
         
        </div>
      </nav>
    </header>




    <div class="container">
      <!-- Flash messages -->


      <?php if($this->session->flashdata('book_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('book_created').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('book_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('book_updated').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('student_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('student_created').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('book_assignment')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('book_assignment').'</p>'; ?>
      <?php endif; ?>
      
      <?php if($this->session->flashdata('book_update_error')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('book_update_error').'</p>'; ?>
      <?php endif; ?>
      
      