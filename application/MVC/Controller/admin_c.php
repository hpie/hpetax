<?php

//tax_master, tax_type, tax_commodity
class admin_c extends Controllers {

    public $admin_m;

    public function __construct() {
        sessionCheck();
        $this->admin_m = $this->loadModel('admin_m');
    }

    public function invoke() {
        $this->data['TITLE'] = TITLE_DASHBOARD;
        loadview('dashboard/', 'dashboard.php', $this->data);
    }

//**************************tax_master*******************//
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
        $existRecord = $this->admin_m->getExistRecordByColumn($_POST['tax_type_id'], 'tax_type_id', 'tax_type');
        $existRecord1 = $this->admin_m->getExistRecordByColumn($_POST['tax_type_name'], 'tax_type_name', 'tax_type');
        if ($id != ($_POST['tax_type_id'])) {
            if (!$existRecord) {
                $existRecord2 = $this->admin_m->getExistRecordByColumnUk($Id, $_POST['tax_type_name'], 'tax_type_name', 'tax_type');
                if ($existRecord2) {
                    unset($_POST['tax_type_name']);
                } else {
                    $existRecord3 = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_type_name'], 'tax_type_name', 'tax_type');
                    if ($existRecord3) {
                        $_SESSION['existrecord1'] = 1;
                        redirect(ADMIN_TAX_TYPE_EDIT_FORM_LINK . $id);
                    }
                }
                $result = $this->admin_m->editTaxType($_POST, $Id);
                $_SESSION['dataupdate'] = 1;
                redirect(ADMIN_TAX_TYPE_LIST_LINK);
            }
        } else {
            $existRecord2 = $this->admin_m->getExistRecordByColumnUk($Id, $_POST['tax_type_name'], 'tax_type_name', 'tax_type');
            if ($existRecord2) {
                unset($_POST['tax_type_name']);
            } else {
                $existRecord3 = $this->admin_m->getExistRecordByColumnUk1($Id, $_POST['tax_type_name'], 'tax_type_name', 'tax_type');
                if ($existRecord3) {
                    $_SESSION['existrecord1'] = 1;
                    redirect(ADMIN_TAX_TYPE_EDIT_FORM_LINK . $id);
                }
            }
            $result = $this->admin_m->editTaxType($_POST, $Id);
            $_SESSION['dataupdate'] = 1;
            redirect(ADMIN_TAX_TYPE_LIST_LINK);
        }
    }

//**************************tax_commodity*******************//
}

?>