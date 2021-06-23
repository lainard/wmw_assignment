<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WMW assigment - <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <style>
    	#cover {
    background: #222 url('https://unsplash.it/1920/1080/?random') center center no-repeat;
    background-size: cover;
    height: 100%;
    text-align: center;
    display: flex;
    align-items: center;
    position: relative;
}

#cover-caption {
    width: 100%;
    position: relative;
    z-index: 1;
}

/* only used for background overlay not needed for centering */
form:before {
    content: '';
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    background-color: rgba(0,0,0,0.3);
    z-index: -1;
    border-radius: 10px;
}

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>
  <body>
  	<!--  Start Container -->
 <?php if (isset($this->session->id)) {?>
<div class="container">
<div style="padding-bottom: 20px;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Employee</a>
          <div class="dropdown-menu" data-bs-popper="none">
             <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/employee"><i class="fa fa-user"></i> Employee List</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/add_employee"><i class="fa fa-plus-circle"></i> Add New Employee</a>
          </div>
        </li>
      </ul>
    <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hi <?php echo $this->session->name; ?></a>
          <div class="dropdown-menu" data-bs-popper="none">
             <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/setting"><i class="fa fa-user"></i> My Account</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/logout"><i class="fa fa-sign-out"></i> Logout</a>
          </div>
        </li>

      </ul>

    </div>
  </div>
</nav>
</div>
<?php if (!empty($this->session->flashdata('success'))) {?>
<div class="alert alert-dismissible alert-success">
  <?php echo $this->session->flashdata('success'); ?>
</div>
<?php }?>
<?php if (!empty($this->session->flashdata('error'))) {?>
<div class="alert alert-dismissible alert-danger">
  <?php echo $this->session->flashdata('error'); ?>
</div>
<?php }?>


<?php }?>