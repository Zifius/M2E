<?php

/*
 * @copyright  Copyright (c) 2013 by  ESS-UA.
 */

class Ess_M2ePro_Block_Adminhtml_Common_Amazon_Order_Edit_ShippingAddress_Form extends Mage_Adminhtml_Block_Widget_Form
{
    private $order;

    public function __construct()
    {
        parent::__construct();

        // Initialization block
        //------------------------------
        $this->setId('amazonOrderEditShippingAddressForm');
        //------------------------------

        $this->setTemplate('M2ePro/common/amazon/order/edit/shipping_address.phtml');
        $this->order = Mage::helper('M2ePro/Data_Global')->getValue('temp_data');
    }

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id'      => 'edit_form',
            'action'  => $this->getUrl('*/*/save'),
            'method'  => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    protected function _beforeToHtml()
    {
        //------------------------------
        $this->setData('countries', Mage::helper('M2ePro/Magento')->getCountries());
        //------------------------------

        $this->setData('buyer_name', $this->order->getData('buyer_name'));
        $this->setData('buyer_email', $this->order->getData('buyer_email'));
        $this->setData('address', $this->order->getShippingAddress()->getData());
        $this->setData('region_code', $this->order->getShippingAddress()->getRegionCode());

        return parent::_beforeToHtml();
    }
}