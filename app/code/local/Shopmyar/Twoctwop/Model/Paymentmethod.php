	<?php
// app/code/local/Envato/Custompaymentmethod/Model/Paymentmethod.php
class Shopmyar_Twoctwop_Model_Paymentmethod extends Mage_Payment_Model_Method_Abstract {
  protected $_code  = 'twoctwop';
  protected $_formBlockType = 'twoctwop/form_twoctwop';
  protected $_infoBlockType = 'twoctwop/info_twoctwop';
 
  public function assignData($data)
  {
    $info = $this->getInfoInstance();
     
    if ($data->getCustomFieldOne())
    {
      $info->setCustomFieldOne($data->getCustomFieldOne());
    }
     
    if ($data->getCustomFieldTwo())
    {
      $info->setCustomFieldTwo($data->getCustomFieldTwo());
    }
 
    return $this;
  }
 
  public function validate()
  {
    parent::validate();
    $info = $this->getInfoInstance();
     
/*    if (!$info->getCustomFieldOne())
    {
      $errorCode = 'invalid_data';
      $errorMsg = $this->_getHelper()->__("CustomFieldOne is a required field.\n");
    }
     
    if (!$info->getCustomFieldTwo())
    {
      $errorCode = 'invalid_data';
      $errorMsg .= $this->_getHelper()->__('CustomFieldTwo is a required field.');
    }*/
 
    if ($errorMsg) 
    {
      Mage::throwException($errorMsg);
    }
 
    return $this;
  }
 
  public function getOrderPlaceRedirectUrl()
  {
    return Mage::getUrl('twoctwop/payment/redirect', array('_secure' => false));
  }
}