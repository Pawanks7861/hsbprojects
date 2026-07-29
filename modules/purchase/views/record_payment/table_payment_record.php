<?php

defined('BASEPATH') or exit('No direct script access allowed');

$aColumns = [
    'payment_code',
    'vendor',
    'staff_id',
    'amount',
    'payment_category',
    'payment_mode',
    'payment_type',
    'type_of_payment',
    'inv_no',
    'remarks',
    'created_on',
    'updated_on',
];

$sIndexColumn = 'id';
$sTable       = db_prefix() . 'record_payment';
$join         = [
    'LEFT JOIN ' . db_prefix() . 'pur_vendor ON ' . db_prefix() . 'pur_vendor.userid = ' . db_prefix() . 'record_payment.vendor',
];

$where = [];
$having = '';

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, ['id', 'company'], '', [], $having);

$output  = $result['output'];
$rResult = $result['rResult'];

$this->ci->load->model('purchase/purchase_model');

foreach ($rResult as $aRow) {
    $row = [];

    for ($i = 0; $i < count($aColumns); $i++) {
        if (strpos($aColumns[$i], 'as') !== false && !isset($aRow[$aColumns[$i]])) {
            $_data = $aRow[strafter($aColumns[$i], 'as ')];
        } else {
            $_data = $aRow[$aColumns[$i]];
        }



        if ($aColumns[$i] == 'payment_code') {
            $numberOutput = '';

            $numberOutput =  $aRow['payment_code'];

            $numberOutput .= '<div class="row-options">';

            
            if ((has_permission('record_payment', '', 'edit') || is_admin())) {
                $numberOutput .= '  <a href="' . admin_url('purchase/add_record_payment/' . $aRow['id']) . '">' . _l('edit') . '</a>';
            }
            if (has_permission('record_payment', '', 'delete') || is_admin()) {
                $numberOutput .= ' | <a href="' . admin_url('purchase/delete_record_payment/' . $aRow['id']) . '" class="text-danger _delete">' . _l('delete') . '</a>';
            }
            $numberOutput .= '</div>';

            $_data = $numberOutput;
        } elseif ($aColumns[$i] == 'vendor') {
            $_data = '<a href="' . admin_url('purchase/vendor/' . $aRow['vendor']) . '" >' .  $aRow['company'] . '</a>';
        } elseif ($aColumns[$i] == 'amount') {
            $_data = app_format_money($aRow['amount'], '₹');
        } elseif ($aColumns[$i] == 'created_on' || $aColumns[$i] == 'updated_on') {
            $_data = date('d M,Y H:i A', strtotime($aRow[$aColumns[$i]]));
        } elseif ($aColumns[$i] == 'payment_type') {
            $_data = _l($aRow['payment_type']);
        } elseif ($aColumns[$i] == 'payment_category') {
            $_data = _l($aRow['payment_category']);
        } elseif ($aColumns[$i] == 'type_of_payment') {
            $_data = _l($aRow['type_of_payment']);
        } elseif ($aColumns[$i] == 'payment_mode') {
            $_data = _l($aRow['payment_mode']);
        } elseif ($aColumns[$i] == 'staff_id') {
            $_data = get_staff_full_name($aRow['staff_id']);
        } else {
            if (strpos($aColumns[$i], 'date_picker_') !== false) {
                $_data = (strpos($_data, ' ') !== false ? _dt($_data) : _d($_data));
            }
        }

        $row[] = $_data;
    }
    $output['aaData'][] = $row;
}
