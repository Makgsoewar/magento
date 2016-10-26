<?php
// app/code/local/Envato/Custompaymentmethod/Block/Form/Custompaymentmethod.php
class Shopmyar_Twoctwop_Block_Form_Twoctwop extends Mage_Payment_Block_Form
{
  protected function _construct()
  {
    parent::_construct();
    $this->setTemplate('twoctwop/form/twoctwop.phtml');
  }
}