<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
   <div class="content">
      <div class="row">
         <div class="panel_s mbot10">
            <div class="panel-body">
               <div class="row">
                  <div class="_buttons col-md-3">
                     <?php if (has_permission('record_payment', '', 'create') || is_admin()) { ?>
                        <a href="<?php echo admin_url('purchase/add_record_payment'); ?>" class="btn btn-info pull-left mright10 display-block">
                           <?php echo _l('new_work_order'); ?>
                        </a>
                     <?php } ?>
                     <!-- <div class="btn-group pull-left">
                              <a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo _l('po_voucher'); ?>&nbsp;<span class="caret"></span></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li class="hidden-xs"><a href="<?php echo admin_url('purchase/po_voucher?output_type=I'); ?>"><?php echo _l('view_pdf'); ?></a></li>
                                 <li class="hidden-xs"><a href="<?php echo admin_url('purchase/po_voucher?output_type=I'); ?>" target="_blank"><?php echo _l('view_pdf_in_new_window'); ?></a></li>
                                 <li><a href="<?php echo admin_url('purchase/po_voucher'); ?>"><?php echo _l('download'); ?></a></li>
                                 <li>
                                    <a href="<?php echo admin_url('purchase/po_voucher?print=true'); ?>" target="_blank">
                                    <?php echo _l('print'); ?>
                                    </a>
                                 </li>
                              </ul>
                           </div> -->
                  </div>

                  <div class="_buttons col-md-1 pull-right">
                     <a href="#" class="btn btn-default btn-with-tooltip toggle-small-view hidden-xs pull-right" onclick="toggle_small_pur_order_view('.table-table_pur_order','#pur_order'); return false;" data-toggle="tooltip" title="<?php echo _l('estimates_toggle_table_tooltip'); ?>"><i class="fa fa-angle-double-left"></i></a>
                  </div>
               </div>

            </div>
         </div>
         <div class="row">
            <div class="col-md-12" id="small-table">
               <div class="panel_s">
                  <!-- <div class="panel-body">
                     <?php echo form_hidden('work_orderid', $work_orderid); ?>
                     <?php $table_data = array(
                        _l('work_order'),
                        _l('vendor'),
                        _l('order_date'),
                        _l('type'),
                        _l('project'),
                        _l('department'),
                        _l('wo_description'),
                        _l('wo_value'),
                        _l('tax_value'),
                        _l('wo_value_included_tax'),
                        _l('tags'),
                        _l('approval_status'),
                        _l('delivery_date'),
                        _l('delivery_status'),
                        _l('payment_status'),
                        _l('convert_expense'),
                     );
                     render_datatable($table_data, 'table_wo_order'); ?>

                  </div> -->
               </div>
            </div>

            <div class="col-md-7 small-table-right-col">
               <div id="wo_order" class="hide">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<?php init_tail(); ?>
</body>

</html>