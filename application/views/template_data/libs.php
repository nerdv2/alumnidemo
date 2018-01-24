    <!-- Bootstrap and necessary plugins -->
    <script src="<?php echo base_url("assets/admin/node_modules/jquery/dist/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/admin/node_modules/popper.js/dist/umd/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/admin/node_modules/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/admin/node_modules/pace-progress/pace.min.js"); ?>"></script>

    <!-- DataTables.net -->
    <script src="<?php echo base_url('assets/admin/node_modules/datatables.net/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="<?php echo base_url("assets/admin/node_modules/chart.js/dist/Chart.min.js"); ?>"></script>


    <!-- GenesisUI main scripts -->

    <script src="<?php echo base_url("assets/admin/js/app.js"); ?>"></script>


    <!-- Plugins and scripts required by this views -->

    <!-- Custom scripts required by this view -->
    <script src="<?php echo base_url("assets/admin/js/views/main.js"); ?>"></script>

    <script type="text/javascript">

    $(document).ready( function () {
        $('.datatable').DataTable();
    } );

    function submit_form()
    {
        $('.formdata').submit();
    }

    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
    </script>