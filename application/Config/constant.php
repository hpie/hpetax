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

define('ADD_TAX_CHALLAN',BASE_URL_API.'api/v1/tax_challan/add-tax-challan');
define('ADD_TAX_CHALLAN_ITEM',BASE_URL_API.'api/v1/tax_challan_item/add-tax-challan-item');

define('PAYMENT_POST_URL','https://himkosh.hp.nic.in/echallan/WebPages/wrfApplicationRequest.aspx');
define('PAYMENT_POST_RETURN_URL',BASE_URL.'payment/updateTreasuryPayment/');
define('PAYMENT_POST_API_URL',BASE_URL_API.'api/v1/transactionlist/hpetax-payment');

//***************************************************************************************************//
//*****************************************Front Side***************************************//
//***************************************************************************************************//
//**************************Front Link********************//
define('FRONT_EPAYMENT_UNREGISTERE', BASE_URL.'epayment');
define('FRONT_EPAYMENT_TREASURY', BASE_URL.'epaymenttreasury');
define('FRONT_MAKE_EPAYMENT_TREASURY', BASE_URL.'makepayment');
define('FRONT_VIEW_CHALLAN', BASE_URL.'viewChallan/');
define('FRONT_ADD_CHALLAN_LINK', BASE_URL.'addChalan');
define('FRONT_COMMODITY_LIST_LINK', BASE_URL ."front-commodity-list-ajax");
define('FRONT_COMMODITY_FIELD_LINK', BASE_URL ."front-commodity-field-ajax");
define('FRONT_ADD_TAX_ITEM_QUE_LINK', BASE_URL ."front-add-tax-item-que");
define('FRONT_DELETE_TAX_ITEM_QUE_LINK', BASE_URL ."front-delete-tax-item-que");
define('FRONT_CHECK_EXIST_TAX_ITEM_QUE_LINK', BASE_URL ."front-check-exist-tax-item-que");
define('FRONT_GET_MODIFY_TAX_ITEM_QUE_DETAILS_LINK', BASE_URL ."front-get-mofify-tax-item-que-details");
define('FRONT_UPDATE_TAX_ITEM_QUE_LINK', BASE_URL ."front-update-tax-item-que");
define('FRONT_VERIFY_E_PAYMENT_LINK', BASE_URL ."verify-epayment");
define('FRONT_SIGN_UP_LINK', BASE_URL ."signup");
define('FRONT_SIGN_UP_INSERT_LINK', BASE_URL ."registration");
define('FRONT_LOGIN_DEALER_LINK', BASE_URL ."login-dealer");
define('FRONT_LOGIN_EMPLOYEE_LINK', BASE_URL ."login-employee");
define('FRONT_LOGIN_EMPLOYEE_LOGIN_FORM_LINK', BASE_URL ."employee-login-form");

define('FRONT_CHANE_PASSWORD_EMPLOYEE_FORM_LINK', BASE_URL ."change-password-employee");
define('FRONT_CHANE_PASSWORD_EMPLOYEE_LINK', BASE_URL ."update-password-employee");

define('FRONT_CHANE_PASSWORD_DEALER_FORM_LINK', BASE_URL ."change-password");
define('FRONT_CHANE_PASSWORD_DEALER_LINK', BASE_URL ."update-password");
define('LOGOUT_DEALER', BASE_URL ."logout-dealer");
define('FRONT_EMPLOYEE_EDT_LINK', BASE_URL ."edt");
define('FRONT_DEALER_LIST_LINK', BASE_URL ."tax-dealer-list");



//**************************Front Title*********************//
define('TITLE_FRONT_EPAYMENT_UNREGISTER', "e-payment");
define('TITLE_FRONT_VIEW_CHALLAN', "view challan");
define('TITLE_FRONT_MAKE_EPAYMENT', "makepayment");
define('TITLE_FRONT_EPAYMENT_TREASURY', "e-payment treasury");
define('TITLE_FRONT_COMMON','Welcome to hptax.gov.in');
define('TITLE_FRONT_SIGNUP_FORM', "Signup");
define('TITLE_FRONT_VERIFY_E_PAYMENT', "Verify e-Payment");
define('TITLE_FRONT_CHANGE_PASSWORD', "Change Password");
define('TITLE_FRONT_EMPLOYEE_LOGIN','Employee login');


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

//**************************tax_employee*******************//
define('ADMIN_TAX_EMPLOYEE_LIST_LINK', BASE_URL."employee-list");
define('ADMIN_TAX_EMPLOYEE_ADD_FORM_LINK', BASE_URL."employee-add-form");
define('ADMIN_TAX_EMPLOYEE_EDIT_FORM_LINK', BASE_URL."employee-edit-form/");
define('ADMIN_TAX_EMPLOYEE_EDIT_LINK', BASE_URL."employee-edit/");
define('ADMIN_EMPLOYEE_APPROVE_LINK',BASE_URL."/employee-approve");


//**************************tax_dealer credential*******************//
define('ADMIN_TAX_DEALER_LIST_LINK', BASE_URL."dealer-list");
define('ADMIN_TAX_DEALER_PENDING_LIST_LINK', BASE_URL."dealer-list-pending");
define('ADMIN_DEALER_APPROVE_LINK',BASE_URL."/dealer-approve");
define('TITLE_TAX_DEALER_CREDENTIAL_ADD_FORM', "Dealer Credetial Add");
define('TITLE_TAX_DEALER_CREDENTIAL_EDIT_FORM', "Tax Credetial Edit");
define('ADMIN_TAX_DEALER_CREDENTIAL_EDIT_FORM_LINK', BASE_URL."tax-delaer-credential-edit-form/");
define('ADMIN_TAX_DEALER_CREDENTIAL_EDIT_LINK', BASE_URL."tax-delaer-credential-edit/");

//**************************reports*******************//
define('TITLE_TAX_TRANSACTION_REPORTS', "Tax Transaction Reports");
define('ADMIN_TAX_REPORTS_LINK', BASE_URL."tax-reports/");
define('ADMIN_TAX_REPORTS_LIST_LINK', BASE_URL."tax-reports-list/");
define('ADMIN_TAX_EMPLOYEE_INSERT_LINK', BASE_URL."employee-insert");

define('FRONT_404_LINK', BASE_URL."404");

define('TITLE_TAX_DEALER_LIST', "Tax Dealer List");
define('TITLE_TAX_DEALER_LIST_PENDING', "Tax Dealer List Pending");

define('TITLE_TAX_EMPLOYEE_LIST', "Employee List");
define('TITLE_TAX_EMPLOYEE_ADD_FORM', "Employee Add");
define('TITLE_TAX_EMPLOYEE_EDIT_FORM', "Employee Edit");
define('TITLE_TAX_REPORTS_LIST', "reports-list");
define('TITLE_TAX_EMPLOYEE_EDT', "EDT");
?>