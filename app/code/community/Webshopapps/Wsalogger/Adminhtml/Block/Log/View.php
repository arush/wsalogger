<?php

/**
 * WebShopApps
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    WebShopApps
 * @package     WebShopApps WsaLogger
 * @copyright   Copyright (c) 2011 Zowta Ltd (http://www.webshopapps.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Webshopapps_Wsalogger_Adminhtml_Block_Log_View extends Mage_Catalog_Block_Product_Abstract {
	 
    public function __construct() {
        parent::__construct();
        $this->setTemplate('webshopapps_wsalogger/view.phtml');
        $this->setNotificationId($this->getRequest()->getParam('notification_id', false));
    }


    public function getMessageData() {
        if( $this->getNotificationId()) {
	        return Mage::getModel('wsalogger/log')
	        			->load($this->getNotificationId());
        } else {
        	throw new Exception("No Notification Id given");
        }
    }

    public function getBackUrl() {
        return Mage::helper('adminhtml')->getUrl('*/adminhtml_log');
    }
    
}

