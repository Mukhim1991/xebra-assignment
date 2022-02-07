<script>
		$("document").ready(function(){		
			setTimeout(function(){
 
			$(".alert").hide("2000")
			 
			}, 3000);

		});
	</script>
<script>
		$("#payment_method").change(function(){
			var payment_method = $("#payment_method").val();

			if(payment_method == ""){
				$("#Display").hide();
				$("#Display_Cash").hide();
				$("#Display_File").hide();
			}

			if(payment_method == "Cash"){
				$("#Display_Cash").show();
				$("#Display").hide();
				$("#Display_File").hide();
			}

			if(payment_method == "Cheque"){
				$("#Display_Cash").hide();
				$("#Display").show();
				$("#Display_File").show();
			}

			if(payment_method == "Demand Draft"){
				$("#Display_Cash").hide();
				$("#Display").show();
				$("#Display_File").show();
			}
			
			if(payment_method == "Online Transfer"){
				$("#Display_Cash").hide();
				$("#Display").hide();
				$("#Display_File").show();
			}
		});
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

<footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?></strong> All rights
    reserved.
  </footer>

  
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<!-- <script src="<?php echo base_url();?>assets/admin/bower_components/chart.js/Chart.js"></script> -->
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/admin/plugins/chartjs/Chart.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>assets/admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<!-- Jquery Form Validator http://www.formvalidator.net -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
	
	 //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    })
	
	 //Date picker
    $('#dt').datepicker({
      autoclose: true
    })
	
	 //Date picker
    $('#task_dt').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
	<script>
  $(function () {
	$("#example3").dataTable().fnDestroy()
    $('#example3').DataTable( {
		
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ],
		'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : false,
			'autoWidth'   : false,
			"pageLength": 25
    } );
  
  })

</script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/manual/css/buttons.dataTables.min.css">
<script src="<?php echo base_url();?>assets/admin/manual/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/manual/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/manual/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/manual/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/admin/manual/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/manual/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/manual/js/buttons.colVis.min.js"></script>
	

</body>
</html>