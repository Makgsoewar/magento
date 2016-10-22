<html>

<head>

<style>
label {
    font-weight: bold;
}

.explanation {
    font-style: italic;
    font-weight: bold;
}

.notes {
    font-size: larger;
    font-weight: bold;
}
</style>

</head>

<body>
<?php
// Retrieve order
$_order = new Mage_Sales_Model_Order();
$orderId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
$_order->loadByIncrementId($orderId);
// >>>>>>>>>>>>>>>> AKSM : MPU <<<<<<<<<<<<<<<<<<<<<< Start
//$amount = (int)$_order->getBaseGrandTotal();
// $mmk_amount = $_order['grand_total'];
// if($_order['order_currency_code'] == "USD") {

//     $baseCurrencyCode = Mage::app()->getBaseCurrencyCode();

//     $allowedCurrencies = Mage::getModel('directory/currency')->getConfigAllowCurrencies();

//     $currencyRates = Mage::getModel('directory/currency')->getCurrencyRates($baseCurrencyCode, array_values($allowedCurrencies));

//     $rate = (int)$currencyRates['MMK'];
//     $mmk_amount = $mmk_amount*$rate;
// }
#remove decimal number
/*$mmk_amount = (int)$mmk_amount;*/
// $mmk_amount = sprintf("%012d", $mmk_amount*100);
// $merchantId = "205104000100826";
?>
<?php $_mpuPath = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB); ?>
<form name="paymant_form" method="post" action="<?php echo $_mpuPath.'mpu/checkout_processing.php'; ?> ">
    <input type="hidden" id="merchantID" name="merchantID" value="205104000100826" />
    <input type="hidden" id="invoiceNo" name="invoiceNo" value="<?php echo $orderId;?>" />
    <input type="hidden" id="productDesc" name="productDesc" value="Myanmar's Premium Online Shop" >
    <input type="hidden" id="amount" name="amount" value="<?php echo $mmk_amount;?>" />
    <input type="hidden" id="currencyCode" name="currencyCode" value="104" />
    <input type="submit" value="Click here if it is taking too long to redirect!" /> 
</form>
 <script>
        function submitForm()
        {
            document.forms["paymant_form"].submit();
        }
        
        if(window.attachEvent)
        {
            window.attachEvent("onload", submitForm);
        }
        else
        {
            window.addEventListener("load", submitForm, true);
        }
    </script>
</body>

</html>