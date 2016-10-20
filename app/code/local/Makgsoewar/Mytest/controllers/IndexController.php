<?php 
	class Makgsoewar_Mytest_IndexController extends Mage_Core_Controller_Front_Action
	{
		public function indexAction($data){
			// $data = $this->getRequest()->getparam('custom1');
			// $data = array();
			var_dump($data);
			echo $data . "Hello from mytest controller " ;
		}
		public function testAction(){
			echo "Another route test";
		}
	}
 ?>