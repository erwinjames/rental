</div>
<footer class="main-footer">
                    <div class="pull-right hidden-xs">
                       <b>Renz Rental Costumes</b> | @2022
                    </div>
                    &nbsp;
              </footer>
              <script>
                    var xValues = <?php echo json_encode($productname);?>;
                   var yValues =  <?php echo json_encode($sale);?>;
// var xValues = ["2021", "2022", "2023", "2024", "2025"];
// var yValues = [0, 5000, 10000, 15000, 20000];
var barColors = ["skyblue", "skyblue","skyblue","skyblue","skyblue"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Yearly Income"
    }
  }
});
console.log(xValues);
</script>    
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- PACE -->
        <script src="assets/plugins/pace/pace.min.js"></script>
        <!-- Select2 -->
        <script src="assets/plugins/select2/select2.full.min.js"></script>

        <!-- DataTables -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script src="assets/plugins/datatables/extra/dataTables.buttons.min.js"></script>



        <script src="assets/plugins/datatables/extra/jszip.min.js"></script>
        <script src="assets/plugins/datatables/extra/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/extra/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/extra/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/extra/buttons.print.min.js"></script>

        <!-- datepicker -->
        <script src="assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- timepicker -->
        <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- Bootstrap slider -->
        <script src="assets/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
        <!-- Summernote WYSIHTML5 -->
        <script src="assets/plugins/summernote/summernote.min.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
        <!-- Slimscroll -->
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

        <!-- jQuery Knob -->
        <script src="assets/plugins/knob/jquery.knob.min.js"></script>
        <!-- FastClick -->
        <script src='assets/plugins/fastclick/fastclick.min.js'></script>
        <!-- Clipboard -->
        <script src='assets/plugins/clipboard/clipboard.min.js'></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/app.min.js" type="text/javascript"></script>
      

        <script src="assets/app.js" type="text/javascript"></script>   
                       
                   <script type="text/javascript">
            $(document).ready(function() {
                // DATATABLES
                $("#dataTablesFull").dataTable( {
                    "dom": '<"top"f>rt<"bottom"><"row dt-margin"<"col-md-6"i><"col-md-6"p><"col-md-12"B>><"clear">',
                    "buttons":  [ 'copy', 'csv', 'excel', 'pdf', 'print' ],
                    "oLanguage": {
                        "sSearch": "<i class='fa fa-search text-gray dTsearch'></i>",
                        "sEmptyTable": "No entries to show",
                        "sZeroRecords": "Nothing found",
                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "sInfoEmpty": "",
                        "oPaginate": {
                            "sNext": "Next",
                            "sPrevious": "Previous",
                            "sFirst": "First Page",
                            "sLast": "Last Page"
                        }
                    },
                    "columnDefs": [ { "orderable": false, "targets": -1 } ] }
                );

            });
            
        </script>
          
</body>
</html>

