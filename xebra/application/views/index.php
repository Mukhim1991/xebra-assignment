<?php $this->load->view('common/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Registration List</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <?php
            if(isset($_SESSION['error_message'])){
          ?>
            <div class="alert alert-danger" role="alert">
              <?php
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
              ?>
            </div>
          <?php   
            }
          ?>

          <?php
            if(isset($_SESSION['success_message'])){
          ?>
            <div class="alert alert-success" role="alert">
              <?php
                echo $_SESSION['success_message'];
                unset($_SESSION['success_message']);
              ?>
            </div>
          <?php   
            }
          ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registration List</h3>
			  <div class="alert alert-success print-success-msg" style="display:none"></div>
              <span style="margin-left:3%; display:<?php echo ($_SESSION['user_type'] == 1) ? '' : 'none';?>">
				<button type="button" class="btn bg-addnew btn-flat margin" data-toggle="modal" data-target="#modal-default">Add New Registration</button>
			  </span>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="registration-table">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 5%">#</th>                 
                  <th>First Name</th>                                  
                  <th>Last Name </th>
                  <th>Email ID </th>
                  <th>Mobile Number</th>
                  <th>Address</th>
                  <th>Registration Date</th>
                  <th>View </th>
                  <th>Edit </th>
				  <?php if($_SESSION['user_type'] == '1') {?>				  
                  <th>Delete </th>
				  <?php } ?>
                </tr>
                </thead>
                <tbody>

                <?php    
                    $i=0;
                    foreach ($record as $val) {
                        $i++;
                ?> 
                <tr>
					<td><?php echo $i; ?></td>                 
					<td><?php echo $val['first_name']; ?></td>  					           
					<td><?php echo $val['last_name']; ?></td>  					           
					<td><?php echo $val['email']; ?></td>  	
					<td><?php echo $val['phone']; ?></td>  	
					<td><?php echo $val['address']; ?></td>  	
					<td><?php echo date("d-m-Y", strtotime($val['created_at']));?></td>  	
					<td>
						<a href="javascript:view_registration(<?php echo $val['registration_id'];?>)" id="<?php echo $val['registration_id'];?>" title="View">
                          <i class="fa fa-eye fa-2x"></i>
                        </a>
                    </td>	
					<td>
						<a href="javascript:edit_registration(<?php echo $val['registration_id'];?>)" id="<?php echo $val['registration_id'];?>" title="Edit">
                          <i class="fa fa-edit fa-2x"></i>
                        </a>
                    </td>
					<?php if($_SESSION['user_type'] == '1') {?>	
                    <td>
                        <a href="javascript:delete_registration(<?php echo $val['registration_id'];?>)" id="<?php echo $val['registration_id'];?>" title="Delete">
                          <i class="fa fa-times fa-2x"></i>
                        </a>
                    </td>
					<?php } ?>
                </tr>
                <?php
                  }
                ?>
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
	<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Registration</h4>
              </div>
			  <form role="form" action="#" method="post">
              <div class="modal-body">
                 <!-- general form elements -->
					
					<div class="alert alert-danger print-error-msg" style="display:none"></div>
				  <div class="box box-primary">					
					<!-- form start -->					
					  <div class="box-body">
						<div class="form-group">
						  <label for="exampleInputEmail1">First Name</label>
						  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" maxlength="50" required autofocus>
						  <span style="color:red;"><?php echo form_error('first_name'); ?></span>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Last Name</label>
						  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" maxlength="50" required>
						  <span style="color:red;"><?php echo form_error('last_name'); ?></span>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Email Id</label>
						  <input type="email" class="form-control" name="email" id="email" placeholder="Email Id" required>
						  <span style="color:red;"><?php echo form_error('email'); ?></span>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Mobile Number</label>
						  <input type="text" class="form-control" name="phone" id="phone" placeholder="Mobile Number" maxlength="10" minlength="10" onkeypress="return isNumber(event)" required>
						  <span style="color:red;"><?php echo form_error('phone'); ?></span>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Address</label>
						  <input type="text" class="form-control" name="address" id="address" placeholder="Address" maxlength="100" required>
						  <span style="color:red;"><?php echo form_error('address'); ?></span>
						</div>	
					  </div>
					  <!-- /.box-body -->					
				  </div>
				  <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_btn">Save</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
	
	<!--========================= Edit Registration ===========================-->
	
	<div class="modal fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Registration</h4>
              </div>
			  <form role="form" action="#" method="post">
			  <input type="hidden" name="e_registration_id" id="e_registration_id">
              <div class="modal-body">
                 <!-- general form elements -->
				 <div class="alert alert-danger print-error-msg-edit" style="display:none"></div>
				  <div class="box box-primary">					
					<!-- form start -->					
					  <div class="box-body">
						<div class="form-group">
						  <label for="exampleInputEmail1">First Name</label>
						  <input type="text" class="form-control" name="first_name" id="e_first_name" placeholder="First Name" maxlength="50" required autofocus>
						  <span style="color:red;"><?php echo form_error('first_name'); ?></span>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Last Name</label>
						  <input type="text" class="form-control" name="last_name" id="e_last_name" placeholder="Last Name" maxlength="50" required>
						  <span style="color:red;"><?php echo form_error('last_name'); ?></span>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Email Id</label>
						  <input type="email" class="form-control" name="email" id="e_email" placeholder="Email Id" required>
						  <span style="color:red;"><?php echo form_error('email'); ?></span>
						</div>
						<div class="form-group">
						  <label for="exampleInputEmail1">Mobile Number</label>
						  <input type="text" class="form-control" name="phone" id="e_phone" placeholder="Mobile Number" maxlength="10" minlength="10" onkeypress="return isNumber(event)" required>
						  <span style="color:red;"><?php echo form_error('phone'); ?></span>
						</div>	
						<div class="form-group">
						  <label for="exampleInputEmail1">Address</label>
						  <input type="text" class="form-control" name="address" id="e_address" placeholder="Address" maxlength="250" required>
						  <span style="color:red;"><?php echo form_error('address'); ?></span>
						</div>	
					  </div>
					  <!-- /.box-body -->					
				  </div>
				  <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update_btn">Update</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
	
	<script type="text/javascript">
		function edit_registration(registration_id)
		{    
			var sapid = sapid;					
			 $.ajax({				
				url: '<?php echo base_url('index.php/admin/edit_registration');?>',			
				data:"registration_id="+registration_id,
				type:'POST',				
				success:function(res){						

						var result = jQuery.parseJSON(res);					
						var arr = $.map(result, function (el) {								
							return el								
						});							
						var registration_id = arr[0].registration_id;
						var first_name = arr[0].first_name;							
						var last_name = arr[0].last_name;
						var email = arr[0].email;												
						var phone = arr[0].phone;												
						var address = arr[0].address;												
					
						$('#e_registration_id').val(registration_id);
						$('#e_first_name').val(first_name);
						$('#e_last_name').val(last_name);
						$('#e_email').val(email);		
						$('#e_phone').val(phone);		
						$('#e_address').val(address);		

						$('#modal-edit').modal('show');	
					}	
				});			 
		}
	</script>
	
	<script>
		$(document).ready(function(){			
			$("#update_btn").click(function() {
			var registration_id = document.getElementById("e_registration_id").value;				
			var first_name = document.getElementById("e_first_name").value;				
			var last_name = document.getElementById("e_last_name").value;				
			var email = document.getElementById("e_email").value;				
			var phone = document.getElementById("e_phone").value;		
			var address = document.getElementById("e_address").value;		
			
			if(first_name != '' && last_name != '' && phone != '' && email != '')
			{
				$.ajax({		
					dataType: "json",	
					type: 'POST',
					url: '<?php echo base_url('index.php/admin/update_registration');?>',						
					data: "first_name=" + first_name + "&last_name=" + last_name + "&email=" + email + "&phone=" + phone  + "&address=" + address + "&registration_id=" + registration_id,	
					success: function (res)
					{	
						if(res.status==200)
						{
							alert('update Successfully');
							
							
							$(".print-success-msg").css('display','block');
							$(".print-success-msg").html(res.message);
							
							$('#modal-edit').modal('hide');	
							
							$("#registration-table" ).load(window.location.href + " #registration-table" );	
							document.getElementById('e_registration_id').value='';
							document.getElementById('e_first_name').value='';
							document.getElementById('e_last_name').value='';
							document.getElementById('e_phone').value='';
							document.getElementById('e_email').value='';
							document.getElementById('e_address').value='';
						}
						else
						{
							$(".print-error-msg-edit").css('display','block');
							$(".print-error-msg-edit").html(res.error);
						}		
					}					
				}); 
			}	
			else
			{
				alert('All field compulsory');
			}
		
			});
		});
	</script>
	
	
	<!--========================= View Registration ===========================-->
	<div class="modal fade" id="modal-view">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Details</h4>
              </div>
              <div class="modal-body">
				  <div class="box box-primary">										
					  <div class="box-body">
						<div class="form-group">
						  <table class="table table-striped">
							<tbody>
							  <tr>
								<th>First Name</th>
								<td id="v_first_name"></td>
							  </tr>
							  <tr>
								<th>Last Name</th>
								<td id="v_last_name"></td>
							  </tr>
							  <tr>
								<th>Email</th>
								<td id="v_email"></td>
							  </tr>
							  <tr>
								<th>Mobile Number</th>
								<td id="v_phone"></td>
							  </tr>
							  <tr>
								<th>Address</th>
								<td id="v_address"></td>
							  </tr>
							</tbody>
						  </table>
						</div>
					  </div>				
				  </div>
              </div>
            </div>
          </div>
    </div>
	
	<script type="text/javascript">
		function view_registration(registration_id)
		{    
			var registration_id = registration_id;					
			 $.ajax({				
				url: '<?php echo base_url('index.php/admin/edit_registration');?>',	
				data:"registration_id="+registration_id,
				type:'POST',				
				success:function(res){						

						var result = jQuery.parseJSON(res);					
						var arr = $.map(result, function (el) {								
							return el								
						});							
						var registration_id = arr[0].registration_id;
						var first_name = arr[0].first_name;							
						var last_name = arr[0].last_name;
						var email = arr[0].email;												
						var phone = arr[0].phone;												
						var address = arr[0].address;												
						
						document.getElementById('v_first_name').innerHTML = first_name;	
						document.getElementById('v_last_name').innerHTML = last_name;	
						document.getElementById('v_email').innerHTML = email;	
						document.getElementById('v_phone').innerHTML = phone;	
						document.getElementById('v_address').innerHTML = address;	

						$('#modal-view').modal('show');	
					}	
				});			 
		}
	</script>
	
	
	
	<script>
		$(document).ready(function(){			
			$("#save_btn").click(function() {
			var first_name = document.getElementById("first_name").value;				
			var last_name = document.getElementById("last_name").value;				
			var email = document.getElementById("email").value;				
			var phone = document.getElementById("phone").value;				
			var address = document.getElementById("address").value;				
			
			if(first_name != '' && last_name != '' && phone != '' && email != '')
			{
				$.ajax({				
					type: 'POST',
					dataType: "json",
					url: '<?php echo base_url('index.php/admin/add_registration');?>',						
					data: "first_name=" + first_name + "&last_name=" + last_name + "&phone=" + phone + "&email=" + email + "&address=" + address,	
					success: function (res)
					{	
						if(res.status==200)
						{
							$(".print-success-msg").css('display','block');
							$(".print-success-msg").html(res.message);
							
							$('#modal-default').modal('hide');	
							$("#registration-table" ).load(window.location.href + " #registration-table" );	
							document.getElementById('first_name').value='';
							document.getElementById('last_name').value='';
							document.getElementById('phone').value='';
							document.getElementById('email').value='';
							document.getElementById('address').value='';
							
							
						}
						else
						{
							$(".print-error-msg").css('display','block');
							$(".print-error-msg").html(res.error);
						}		
					}					
				}); 
			}	
			else
			{
				alert('All field compulsory');
			}
		
			});
		});
	</script>
	
	<script type="text/javascript">
		function delete_registration(registration_id)
		{    
			if(confirm('Sure To Delete This Entry ?'))
			{
				var registration_id = registration_id;					
				 $.ajax({				
					url: '<?php echo base_url('index.php/admin/delete_registration');?>',	
					data:"registration_id="+registration_id,
					type:'POST',				
					success:function(res){	
							alert('record deleted successfully');
							
							$("#registration-table" ).load(window.location.href + " #registration-table" );	
							$(".print-success-msg").css('display','block');
							$(".print-success-msg").html(res.status);
						}	
					});			 
			}	
		}
	</script>
	
	
	<script>
		function isNumber(evt) 
		{
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}
			return true;
		}
	</script>
<?php $this->load->view('common/footer'); ?>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
		$('#example').DataTable({
			ordering: true,"autoWidth": false,
			paging: true,
			"pageLength": 100,
			searching: true,
			dom: 'Bftripl',
			buttons: [
				{
					extend: 'excelHtml5',
					title: 'Windchimes Communication',
					message: "( Date : <?php echo date('d-m-Y');?> )\n",
					
					exportOptions: {
						columns: ':visible'
					}

				},
				{
					extend: 'csvHtml5',
					title: 'Windchimes Communication',
					customize: function (csv) {
						  return " ( Date : <?php echo date('d-m-Y');?> ) \n"+csv;
					  },
					exportOptions: {
						columns: ':visible'
					}
				},
			
				
				{
					extend: 'print',
					message: "( Date : <?php echo date('d-m-Y');?> )",
					title: '<center> <h3 style="margin-top:-10px; font-weight:600"> Windchimes Communication </h3> <center>',
					
					customize: function ( win ) {
						$(win.document.body)
							.prepend(
								'<img src="<?php echo base_url();?>/assets/images/logo.jpg" style="position:absolute; width:60%; top:20%; left:20%; opacity: 0.1" />'
							);		 
					},
						
					exportOptions: {
						columns: ':visible'
					}
				},
				
				'colvis'

			] 

		}); 
</script>