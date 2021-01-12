<?php
/**
 * @var $installer Mage_Core_Model_Resource_Setup
 */
$installer = $this;
$installer->startSetup();

$installer->addAttribute(
    'order',
    'hitpay_reference',
    [
        'type' => 'varchar',
        'label' => 'HitPay Reference',
        'source' => '',
        'backend' => '',
        'frontend' => '',
        'visible' => true,
        'required' => false,
        'visible_on_front' => false,
        'user_defined' => false
    ]
);

$installer->endSetup();
	 