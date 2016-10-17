<?php 
	class Makgsoewar_Mytest_IndexController extends Mage_Core_Controller_Front_Action
	{
		public function indexAction(){
			echo "Hello from mytest controller";
		}
		public function testAction(){
			echo "Another route test";
		}
	}
 ?>