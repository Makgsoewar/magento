<?php 
	class Mdg_Giftregistry_Model_Type_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract{
		public function _construct(){
			$this->_init('mdg_registry/type');
			parent::_construct();
		}
	}



 ?>