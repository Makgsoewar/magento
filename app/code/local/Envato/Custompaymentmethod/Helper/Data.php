<?php
// app/code/local/Envato/Custompaymentmethod/Helper/Data.php
class Envato_Custompaymentmethod_Helper_Data extends Mage_Core_Helper_Abstract
{
  function getPaymentGatewayUrl() 
  {
  	// $data = $this->getRequest()->get("orderId");
  	echo "We are Here! to come to fuck u";
    return Mage::getUrl('custompaymentmethod/payment/gateway', array('_secure' => false, ));
  }
}