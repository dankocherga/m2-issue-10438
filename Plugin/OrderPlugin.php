<?php
namespace TestCompany\TestModule\Plugin;

use Magento\Sales\Api\Data\OrderAddressInterface;

class OrderPlugin
{
    private $addressExtensionFactory;

    public function __construct(
        \Magento\Sales\Api\Data\OrderAddressExtensionFactory $addressExtensionFactory
    ) {
        $this->addressExtensionFactory = $addressExtensionFactory;
    }

    public function afterGetShippingAddress(
        \Magento\Sales\Model\Order $subject,
        \Magento\Sales\Model\Order\Address $result
    ) {
        $result->setExtensionAttributes($this->addressExtensionFactory->create());
        return $result;
    }

    public function afterGetBillingAddress(
        \Magento\Sales\Model\Order $subject,
        \Magento\Sales\Model\Order\Address $result
    ) {
        $result->setExtensionAttributes($this->addressExtensionFactory->create());
        return $result;
    }
}