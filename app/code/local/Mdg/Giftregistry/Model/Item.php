<?php
class Mdg_Giftregistry_Model_Item extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		$this->_init('mdg_giftregistry/item');
		parent::_construct();
	}
}