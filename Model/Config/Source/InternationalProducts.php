<?php
/**
 * See LICENSE.md for license details.
 */
namespace Dhl\ExpressRates\Model\Config\Source;

use Dhl\Express\Api\Data\ShippingProductsInterface;

/**
 * Class InternationalDefaultProduct
 *
 * @package Dhl\ExpressRates\Model\Backend\Config\Source
 * @author Ronny Gertler <ronny.gertler@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @link http://www.netresearch.de/
 */
class InternationalProducts implements \Magento\Framework\Option\ArrayInterface
{
    const DELIMITER = ';';

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        $options = ShippingProductsInterface::PRODUCT_NAMES_INTERNATIONAL;

        return array_map(
            function ($label, $value) {
                $value = implode(self::DELIMITER, $value);
                return [
                    'value' => $value,
                    'label' => $label,
                ];
            },
            array_keys($options),
            $options
        );
    }
}
