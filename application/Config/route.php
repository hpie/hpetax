<?php
$route = array();
//**************************ADMIN ROUTE*******************//
$route['login'] = 'login_c';
$route['logout'] = 'login_c/logout';
$route['dashboard'] = 'admin_c';


//**************************tax_master*******************//

//**************************tax_type*******************//
$route['tax-type-list'] = 'admin_c/taxTypeList';
$route['tax-type-add-form'] = 'admin_c/taxTypeAddForm';
$route['tax-type-insert'] = 'admin_c/taxTypeInsert';
$route['tax-type-edit-form/(:any)'] = 'admin_c/taxTypeEditForm';
$route['tax-type-edit/(:any)'] = 'admin_c/editTaxType';
//**************************tax_commodity*******************//
