<div class="row" style="padding-bottom: 65px;">
	<div class="col-6 ml-auto mr-auto">
<div class="card border-primary mb-3" style="max-width: 400rem;">
  <div class="card-header">Add new exmployee</div>
  <div class="card-body">
<form method="post" aciton="<?php echo base_url(); ?>dashboard/register">
  <fieldset>
    <legend>Employee Information</legend>

    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

     <div class="form-group">
      <label for="exampleInputPassword1">Firstname</label>
      <input type="text" name="first_name" class="form-control" id="exampleInputPassword1" placeholder="John" disabled>
    </div>

     <div class="form-group">
      <label for="exampleInputPassword1">Lastname</label>
      <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="Doe" disabled>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
  </div>
</div>
</div>
</div>