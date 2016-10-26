<?php
// app/code/local/Envato/Custompaymentmethod/Helper/Data.php
class Shopmyar_Twoctwop_Helper_Data extends Mage_Core_Helper_Abstract
{
  function getPaymentGatewayUrl() 
  {
    return Mage::getUrl('twoctwop/payment/gateway', array('_secure' => false));
  }
}