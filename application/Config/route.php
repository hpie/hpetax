<?php
$route = array();
//**************************ADMIN ROUTE*******************//
$route['login'] = 'login_c';
$route['logout'] = 'login_c/logout';
$route['dashboard'] = 'admin_c';


//**************************************************************************************//
//********************************Front side********************************************//
$route[''] = 'home_c';
$route['home'] = 'home_c';
$route['epayment'] = 'home_c/epayment';
$route['epaymenttreasury'] = 'home_c/epaymenttreasury';
$route['front-commodity-list-ajax'] = 'home_c/commodityListAjax';
$route['front-commodity-field-ajax'] = 'home_c/commodityFieldAjax';
$route['front-add-tax-item-que'] = 'home_c/addTaxItemQueAjax';
$route['front-delete-tax-item-que'] = 'home_c/deleteTaxItemQueAjax';
$route['front-check-exist-tax-item-que'] = 'home_c/checkExistTaxItemQue';
$route['front-get-mofify-tax-item-que-details'] = 'home_c/getModifyTaxItemQueAjax';
$route['front-update-tax-item-que'] = 'home_c/updateTaxItemQueAjax';
$route['front-wrfapplicationuser'] = 'home_c/wrfapplicationuser';
$route['signup'] = 'home_c/signupform';
$route['registration'] = 'home_c/registration';
$route['login-dealer'] = 'login_c/loginDealer';
$route['logout-dealer'] = 'login_c/logoutDealer';

//**************************************************************************************//

//**************************tax_master*******************//
$route['tax-master-list'] = 'admin_c/taxMasterList';
$route['tax-master-add-form'] = 'admin_c/taxMasterAddForm';
$route['tax-master-insert'] = 'admin_c/taxMasterInsert';
$route['tax-master-edit-form/(:any)'] = 'admin_c/taxMasterEditForm';
$route['tax-master-edit/(:any)'] = 'admin_c/editTaxMaster';


//**************************tax_type*******************//
$route['tax-type-list'] = 'admin_c/taxTypeList';
$route['tax-type-add-form'] = 'admin_c/taxTypeAddForm';
$route['tax-type-insert'] = 'admin_c/taxTypeInsert';
$route['tax-type-edit-form/(:any)'] = 'admin_c/taxTypeEditForm';
$route['tax-type-edit/(:any)'] = 'admin_c/editTaxType';


//**************************tax_commodity*******************//
$route['tax-commodity-list'] = 'admin_c/taxCommodityList';
$route['tax-commodity-add-form'] = 'admin_c/taxCommodityAddForm';
$route['tax-commodity-insert'] = 'admin_c/taxCommodityInsert';
$route['tax-commodity-edit-form/(:any)'] = 'admin_c/taxCommodityEditForm';
$route['tax-commodity-edit/(:any)'] = 'admin_c/editTaxCommodity';

//**************************reports*******************//
$route['tax-reports'] = 'admin_c/reports';

//**************************challan*******************//
$route['addChalan'] = 'home_c/addChalan';
$route['verify-epayment'] = 'home_c/epaymentVerify';
