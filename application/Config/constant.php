<?php
define('APPNAME', "Hpetax");
define('ASSETS',BASE_URL.'assets/');
define('ASSETS_FRONT',BASE_URL.'assets/front/');
define('LOGIN', BASE_URL ."login");
define('LOGOUT', BASE_URL ."logout");
define('LARGE_IMAGES',BASE_URL.'uploads/large/');
define('MEDIUM_IMAGES',BASE_URL.'uploads/medium/');
define('THUMB_IMAGES',BASE_URL.'uploads/thumb/');
define('ORIGINAL_IMAGES',BASE_URL.'uploads/original/');


//***************************************************************************************************//
//*****************************************Front Side***************************************//
//***************************************************************************************************//
//**************************Front Link********************//
define('FRONT_EPAYMENT_UNREGISTERE', BASE_URL.'epayment');
define('FRONT_EPAYMENT_TREASURY', BASE_URL.'epaymenttreasury');
define('FRONT_COMMODITY_LIST_LINK', BASE_URL ."front-commodity-list-ajax");
define('FRONT_COMMODITY_FIELD_LINK', BASE_URL ."front-commodity-field-ajax");
define('FRONT_ADD_TAX_ITEM_QUE_LINK', BASE_URL ."front-add-tax-item-que");
define('FRONT_DELETE_TAX_ITEM_QUE_LINK', BASE_URL ."front-delete-tax-item-que");
define('FRONT_CHECK_EXIST_TAX_ITEM_QUE_LINK', BASE_URL ."front-check-exist-tax-item-que");
define('FRONT_GET_MODIFY_TAX_ITEM_QUE_DETAILS_LINK', BASE_URL ."front-get-mofify-tax-item-que-details");
define('FRONT_UPDATE_TAX_ITEM_QUE_LINK', BASE_URL ."front-update-tax-item-que");

//**************************Front Title*********************//
define('TITLE_FRONT_EPAYMENT_UNREGISTER', "e-payment");
define('TITLE_FRONT_EPAYMENT_TREASURY', "e-payment treasury");
define('TITLE_FRONT_COMMON','Welcome to hptax.gov.in');
define('TITLE_FRONT_SIGNUP_FORM', "Signup");



//***********************************************************************End Level percent********************//
//**************************Admin Title*********************//
define('TITLE_DASHBOARD', "DASHBOARD");
//**************************Admin Link********************//
define('ADMIN_DASHBOARD_LINK', BASE_URL."dashboard");

//**************************tax_master*******************//
define('TITLE_TAX_MASTER_LIST', "Tax Master List");
define('TITLE_TAX_MASTER_ADD_FORM', "Tax Master Add");
define('TITLE_TAX_MASTER_EDIT_FORM', "Tax Master Edit");
define('ADMIN_TAX_MASTER_LIST_LINK', BASE_URL."tax-master-list");
define('ADMIN_TAX_MASTER_ADD_FORM_LINK', BASE_URL."tax-master-add-form");
define('ADMIN_TAX_MASTER_INSERT_LINK', BASE_URL."tax-master-insert");
define('ADMIN_TAX_MASTER_EDIT_FORM_LINK', BASE_URL."tax-master-edit-form/");
define('ADMIN_TAX_MASTER_EDIT_LINK', BASE_URL."tax-master-edit/");



//**************************tax_type*******************//
define('TITLE_TAX_TYPE_LIST', "Tax Type List");
define('TITLE_TAX_TYPE_ADD_FORM', "Tax Type Add");
define('TITLE_TAX_TYPE_EDIT_FORM', "Tax Type Edit");
define('ADMIN_TAX_TYPE_LIST_LINK', BASE_URL."tax-type-list");
define('ADMIN_TAX_TYPE_ADD_FORM_LINK', BASE_URL."tax-type-add-form");
define('ADMIN_TAX_TYPE_INSERT_LINK', BASE_URL."tax-type-insert");
define('ADMIN_TAX_TYPE_EDIT_FORM_LINK', BASE_URL."tax-type-edit-form/");
define('ADMIN_TAX_TYPE_EDIT_LINK', BASE_URL."tax-type-edit/");


//**************************tax_commodity*******************//
define('TITLE_TAX_COMMODITY_LIST', "Tax Commodity List");
define('TITLE_TAX_COMMODITY_ADD_FORM', "Tax Commodity Add");
define('TITLE_TAX_COMMODITY_EDIT_FORM', "Tax Commodity Edit");
define('ADMIN_TAX_COMMODITY_LIST_LINK', BASE_URL."tax-commodity-list");
define('ADMIN_TAX_COMMODITY_ADD_FORM_LINK', BASE_URL."tax-commodity-add-form");
define('ADMIN_TAX_COMMODITY_INSERT_LINK', BASE_URL."tax-commodity-insert");
define('ADMIN_TAX_COMMODITY_EDIT_FORM_LINK', BASE_URL."tax-commodity-edit-form/");
define('ADMIN_TAX_COMMODITY_EDIT_LINK', BASE_URL."tax-commodity-edit/");

//**************************reports*******************//
define('TITLE_TAX_TRANSACTION_REPORTS', "Tax Transaction Reports");
define('ADMIN_TAX_REPORTS_LINK', BASE_URL."tax-reports");
?>