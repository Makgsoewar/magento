<?php 
class Mdg_Hello_IndexController extends Mage_Core_Controller_Front_Action
{
	public function IndexAction(){
		echo 'Hello World this is the default action Magento Developer Guide';
	}
	public function developerAction(){
		echo "Heloo developer this is a custom controller";
	}
}
?>
