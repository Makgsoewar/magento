<?php
// app/code/local/Envato/Custompaymentmethod/controllers/PaymentController.php
class Shopmyar_Twoctwop_PaymentController extends Mage_Core_Controller_Front_Action 
{
  public function gatewayAction() 
  {
    $data = $this->getRequest()->getParams();

    if ($data && $this->getRequest()->get('merchant_id') === "104840000000051")
    {
      $arr_querystring = array(
        'orderId' => $this->getRequest()->get("order_id"),
        'paymentStatus' => $this->getRequest()->get("payment_status"),
        'requestTimestamp' => $this->getRequest()->get("request_timestamp"),
        'merchantId' => $this->getRequest()->get("merchant_id")
        );
      Mage_Core_Controller_Varien_Action::_redirect('twoctwop/payment/response', array('_secure' => true, '_query'=> $arr_querystring));
    }else{
      die();
    }
  }
   
  public function redirectAction() 
  {
    $this->loadLayout();
    $block = $this->getLayout()->createBlock('Mage_Core_Block_Template','twoctwop',array('template' => 'twoctwop/redirect.phtml'));
    $this->getLayout()->getBlock('content')->append($block);
    $this->renderLayout();
  }
 
  public function responseAction() 
  {
    $postData = $this->getRequest()->get("paymentStatus");
    $orderId2c2p = $this->getRequest()->get("orderId");
    $orderId = "SO". substr($orderId2c2p, 12);
    $order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
    $order->setState(Mage_Sales_Model_Order::STATE_PAYMENT_REVIEW, true, 'Payment Success.');
    
    switch ($postData) {
      case "000":
      $order->save();
       
      Mage::getSingleton('checkout/session')->unsQuoteId();
      Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/success', array('_secure'=> false));
      break;
      case "001":
      $order->setState(Mage_Sales_Model_Order::STATE_PENDING_PAYMENT, true, 'Padding Payment.');
      $order->save();
       
      Mage::getSingleton('checkout/session')->unsQuoteId();
      Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/failure', array('_secure'=> false));
      break;
      case "002":
      echo "Rejected (Failed payment)";
      break;
      case "003":
      echo "User cancel (Failed payment)";
      break;
      case "999":
      echo "Error (Failed payment)";
      break;
      default:
      echo "Something was wrong";
    }
  }
}