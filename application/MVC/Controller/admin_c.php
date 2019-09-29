<?php

//tax_master, tax_type, tax_commodity
class admin_c extends Controllers {

    public $admin_m;

    public function __construct() {
        parent::__construct();
        sessionCheck();
        $this->admin_m = $this->loadModel('admin_m');
    }
    public function invoke() {
        $this->data['TITLE'] = TITLE_DASHBOARD;
        loadview('dashboard/', 'dashboard.php', $this->data);
    }

//**************************tax_master*******************//
    public function taxMasterList() {
        $result = $this->admin_m->getTaxMasterList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_MASTER_LIST;
        loadview('tax_master/', 'list.php', $this->data);
    }

    public function taxMasterAddForm() {
        $this->data['TITLE'] = TITLE_TAX_MASTER_ADD_FORM;
        loadview('tax_master/', 'add.php', $this->data);
    }

    public function taxMasterInsert() {
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_master_id'], 'tax_master_id', 'tax_master');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_transaction_head'], 'tax_transaction_head', 'tax_master');
        $existRecord2 = $this->admin_m->getExistRecordByColumn($_POST['tax_transaction_dept'], 'tax_transaction_dept', 'tax_master');
        $existRecord3 = $this->admin_m->getExistRecordByColumn($_POST['tax_transaction_ddo'], 'tax_transaction_ddo', 'tax_master');
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['tax_transaction_head_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        if ($existRecord2) {
            $_SESSION['data'] = $_POST;
            $_SESSION['tax_transaction_dept_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        if ($existRecord3) {
            $_SESSION['data'] = $_POST;
            $_SESSION['tax_transaction_ddo_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
        $result = $this->admin_m->taxMasterInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {
            $_SESSION['adddata'] = 1;
            redirect(ADMIN_TAX_MASTER_LIST_LINK);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_MASTER_ADD_FORM_LINK);
        }
    }

    public function taxMasterEditForm($id) {
        $result = $this->admin_m->getSingleRecordById($id, 'tax_master_id', 'tax_master');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_MASTER_EDIT_FORM;
        loadview('tax_master/', 'edit.php', $this->data);
    }

    public function editTaxMaster($Id) {
        $tax_transaction_head_exisit = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_transaction_head'], 'tax_transaction_head', 'tax_master');
        if ($tax_transaction_head_exisit) {
            $_SESSION['tax_transaction_head_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
        $tax_transaction_dept_exisit = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_transaction_dept'], 'tax_transaction_dept', 'tax_master');
        if ($tax_transaction_dept_exisit) {
            $_SESSION['tax_transaction_dept_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
        $tax_transaction_ddo_exisit = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_transaction_ddo'], 'tax_transaction_ddo', 'tax_master');
        if ($tax_transaction_ddo_exisit) {
            $_SESSION['tax_transaction_ddo_exisit'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
        $result = $this->admin_m->editTaxMaster($_POST, $Id);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_MASTER_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_MASTER_EDIT_FORM_LINK . $Id);
        }
    }

//**************************tax_type*******************//
    public function taxTypeList() {
        $result = $this->admin_m->getTaxTypeList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_TYPE_LIST;
        loadview('tax_type/', 'list.php', $this->data);
    }

    public function taxTypeAddForm() {       
        $this->data['TITLE'] = TITLE_TAX_TYPE_ADD_FORM;
        loadview('tax_type/', 'add.php', $this->data);
    }

    public function taxTypeInsert() {
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_type_id'], 'tax_type_id', 'tax_type');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_type_name'], 'tax_type_name', 'tax_type');
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(ADMIN_TAX_TYPE_ADD_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord1'] = 1;
            redirect(ADMIN_TAX_TYPE_ADD_FORM_LINK);
        }
        $result = $this->admin_m->taxTypeInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {
            $_SESSION['adddata'] = 1;
            redirect(ADMIN_TAX_TYPE_LIST_LINK);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_TYPE_ADD_FORM_LINK);
        }
    }

    public function taxTypeEditForm($id) {
        $result = $this->admin_m->getSingleRecordById($id, 'tax_type_id', 'tax_type');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_TYPE_EDIT_FORM;
        loadview('tax_type/', 'edit.php', $this->data);
    }

    public function editTaxType($Id) {
        $tax_type_name_exist = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_type_name'], 'tax_type_name', 'tax_type');
        if ($tax_type_name_exist) {
            $_SESSION['tax_type_name_exist'] = 1;
            redirect(ADMIN_TAX_TYPE_EDIT_FORM_LINK . $Id);
        }
        $result = $this->admin_m->editTaxType($_POST, $Id);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_TYPE_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_TYPE_EDIT_FORM_LINK . $Id);
        }
    }

//**************************tax_commodity*******************//
    public function taxCommodityList() {
        $result = $this->admin_m->getTaxCommodityList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_COMMODITY_LIST;
        loadview('tax_commodity/', 'list.php', $this->data);
    }

    public function taxCommodityAddForm() {
        $result = $this->admin_m->getTaxTypeList();
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_COMMODITY_ADD_FORM;
        loadview('tax_commodity/', 'add.php', $this->data);
    }

    public function taxCommodityInsert() {
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_commodity_id'], 'tax_commodity_id', 'tax_commodity');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_commodity_name'], 'tax_commodity_name', 'tax_commodity');
        if ($existRecord) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord'] = 1;
            redirect(ADMIN_TAX_COMMODITY_ADD_FORM_LINK);
        }
        if ($existRecord1) {
            $_SESSION['data'] = $_POST;
            $_SESSION['existrecord1'] = 1;
            redirect(ADMIN_TAX_COMMODITY_ADD_FORM_LINK);
        }
        $result = $this->admin_m->taxCommodityInsert($_POST);
        if ($result['res'] == 1 || !empty($result['id'])) {
            $_SESSION['adddata'] = 1;
            redirect(ADMIN_TAX_COMMODITY_LIST_LINK);
        } else {
            $_SESSION['data'] = $_POST;
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_COMMODITY_ADD_FORM_LINK);
        }
    }

    public function taxCommodityEditForm($id) {
        $result1 = $this->admin_m->getTaxTypeList();
        $this->data['result1'] = $result1;
        
        $result = $this->admin_m->getSingleRecordById($id, 'tax_commodity_id', 'tax_commodity');
        $this->data['result'] = $result;
        $this->data['TITLE'] = TITLE_TAX_COMMODITY_EDIT_FORM;
        loadview('tax_commodity/', 'edit.php', $this->data);
    }

    public function editTaxCommodity($Id) {
        $tax_commodity_name_exist = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_commodity_name'], 'tax_commodity_name', 'tax_commodity');
        if ($tax_commodity_name_exist) {
            $_SESSION['tax_commodity_name_exist'] = 1;
            redirect(ADMIN_TAX_COMMODITY_EDIT_FORM_LINK.$Id);
        }
        $result = $this->admin_m->editTaxCommodity($_POST,$Id);
        if ($result) {
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_COMMODITY_LIST_LINK);
        } else {
            $_SESSION['Error'] = 1;
            redirect(ADMIN_TAX_COMMODITY_EDIT_FORM_LINK.$Id);
        }
    }
    
    //**************************Reports*******************//
    public function reports() {
        $pending = $this->admin_m->getTaxTransactionStatus('PENDING');
        $success = $this->admin_m->getTaxTransactionStatus('SUCCESS');
        $failed = $this->admin_m->getTaxTransactionStatus('FAILED');        
        $this->data['pending'] = $pending;
        $this->data['success'] = $success;
        $this->data['failed'] = $failed;
        $this->data['TITLE'] = TITLE_TAX_TRANSACTION_REPORTS;
        loadview('reports/', 'reports.php', $this->data);
    }
}

?>