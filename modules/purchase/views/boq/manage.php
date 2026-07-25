<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
	<div class="content">
		<div class="row">
			<div class="panel_s mbot10">
				
            <div class="row">
				<div class="col-md-12" id="small-table">
					<div class="panel_s">
						<div class="panel-body">
	                    <?php $table_data = array(
                           _l('Work Order'),
                           _l('Item'),
                           _l('Project'),
                           _l('Order Date'),
                           _l('Options'),
                           );
                       render_datatable($table_data,'table_boq_items'); ?>
							
						</div>
					</div>
				</div>
            	
			<div class="col-md-7 small-table-right-col">
			    <div id="pur_order" class="hide">
			    </div>
			 </div>
            </div>
		</div>
	</div>
</div>




<?php init_tail(); ?>
<script>
   $(document).ready(function() {

      var table_boq_items = $('.table-table_boq_items');
      var Params = {};
      initDataTable(table_boq_items, admin_url + 'purchase/table_boq_items', [], [], Params, [3, 'desc']);

   });
</script>
</body>
</html>
