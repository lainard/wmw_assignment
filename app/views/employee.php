
<div id="box" style="padding-bottom: 65px;">
	<div class="row" id="employee">

	</div>
</div>
<script>
$('document').ready(function(){
$.ajax({
    url: "<?php echo base_url(); ?>table/employee",
    type: "GET",
    data: {
        page: "0"
    },
    dataType:"json",
    success: function(response){
        if(response){
        	console.log(response.data);
        	response.data.forEach(function(employee) {
        	$('#employee').append('<div class="col-sm-3 mb-3"><div class="card border-primary" style="max-width: 20rem;"><div class="card-header">'+employee.first_name+' '+employee.last_name+' #'+employee.id+'</div><div class="card-body text-center"><img src="'+employee.avatar+'"><p class="card-text">'+employee.email+'</p><p><a href="#" onclick="OpenEmployee('+employee.id+')" class="btn btn-sm btn-primary">Detail</a></div></div></div>');
        });

    }
}
});
});
</script>
<script>
function OpenEmployee(id){
$('#detail').modal('toggle');
		$.ajax({
    url: "<?php echo base_url(); ?>table/get_employee/"+id,
    type: "GET",
    dataType:"json",
    success: function(response){
        if(response){
        	console.log(response);

          $('#first_name').val(response.data.first_name)
          $('#last_name').val(response.data.last_name)
          $('#email').val(response.data.email)
           $('#id').val(response.data.id)


    }
}
});
}
</script>
<div class="modal" id="detail">
  <form method="post" action="<?php echo base_url(); ?>dashboard/update">
    <input name="id" value="" id="id" type="hidden">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Employee detail</h5>
        <button type="button" class="btn btn-sm btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">
	<div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="text" class="form-control" name="email" id="email">
    </div>
		<div class="form-group">
      <label for="exampleInputEmail1">Firstname</label>
      <input type="text" class="form-control" name="first_name" id="first_name">
    </div>
    	<div class="form-group">
      <label for="exampleInputEmail1">Lastname</label>
      <input type="text" class="form-control" name="last_name" id="last_name">
    </div>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</form>
</div>

