<?php
/**
 * See LICENSE.md for license details.
 */
namespace Dhl\ExpressRates\Model\Config;

use Dhl\ExpressRates\Api\Data\ShippingProductsInterface;
use Dhl\ExpressRates\Model\Carrier\Express;
use Dhl\ExpressRates\Model\Config\ModuleConfig;
use Dhl\ExpressRates\Model\Config\Source\DomesticProducts;
use Dhl\ExpressRates\Model\Rate\Processor\HandlingFee;
use Magento\Quote\Model\Quote\Address\RateResult\Method;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Magento\TestFramework\ObjectManager;

/**
 * HandlingFeeTest
 *
 * @package Dhl\ExpressRates\Test\Integration
 * @author  Rico Sonntag <rico.sonntag@netresearch.de>
 * @license https://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link    https://www.netresearch.de/
 */
class HandlingFeeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var $objectManager ObjectManager
     */
    private $objectManager;

    /**
     * @var ModuleConfigInterface
     */
    private $config;

    /**
     * @var MethodFactory
     */
    private $methodFactory;

    /**
     * @var DomesticProducts
     */
    private $domesticProducts;

    /**
     * Config fixtures are loaded before data fixtures. Config fixtures for
     * non-existent stores will fail. We need to set the stores up first manually.
     *
     * @link http://magento.stackexchange.com/a/93961
     */
    public static function setUpBeforeClass()
    {
        require realpath(TESTS_TEMP_DIR . '/../testsuite/Magento/Store/_files/core_fixturestore_rollback.php');
        require realpath(
            TESTS_TEMP_DIR . '/../testsuite/Magento/Store/_files/core_second_third_fixturestore_rollback.php'
        );

        require realpath(TESTS_TEMP_DIR . '/../testsuite/Magento/Store/_files/core_fixturestore.php');
        require realpath(TESTS_TEMP_DIR . '/../testsuite/Magento/Store/_files/core_second_third_fixturestore.php');

        parent::setUpBeforeClass();
    }

    /**
     * Delete manually added stores.
     *
     * @see setUpBeforeClass()
     */
    public static function tearDownAfterClass()
    {
        require realpath(TESTS_TEMP_DIR . '/../testsuite/Magento/Store/_files/core_fixturestore_rollback.php');
        require realpath(
            TESTS_TEMP_DIR . '/../testsuite/Magento/Store/_files/core_second_third_fixturestore_rollback.php'
        );

        parent::tearDownAfterClass();
    }

    protected function setUp()
    {
        parent::setUp();

        $this->objectManager = ObjectManager::getInstance();

        $this->config           = $this->objectManager->create(ModuleConfig::class);
        $this->methodFactory    = $this->objectManager->create(MethodFactory::class);
        $this->domesticProducts = $this->objectManager->create(DomesticProducts::class);
    }

    /**
     * Test handling domestic fee calculation with fixed handling fee.
     *
     * @test
     *
     * @magentoConfigFixture current_store carriers/dhlexpress/domestic_handling_type F
     * @magentoConfigFixture current_store carriers/dhlexpress/domestic_handling_fee  3
     */
    public function processMethodsWithFixedDomesticHandlingFee()
    {
        $method = $this->methodFactory->create(
            [
                'data' => [
                    'carrier'       => Express::CARRIER_CODE,
                    'carrier_title' => 'TEST',
                    'method'        => ShippingProductsInterface::CODE_DOMESTIC,
                    'method_title'  => 'LABEL',
                    'price'         => 6.0,
                    'cost'          => 6.0,
                ]
            ]
        );

        $handlingFee = new HandlingFee($this->config, $this->domesticProducts);
        $methods     = $handlingFee->processMethods([ $method ]);

        self::assertSame(9.0, $methods[0]->getPrice());
        self::assertSame(9.0, $methods[0]->getCost());
    }

    /**
     * Test handling international fee calculation with fixed handling fee.
     *
     * @test
     *
     * @magentoConfigFixture current_store carriers/dhlexpress/international_handling_type F
     * @magentoConfigFixture current_store carriers/dhlexpress/international_handling_fee  3
     */
    public function processMethodsWithFixedInternationalHandlingFee()
    {
        $method = $this->methodFactory->create(
            [
                'data' => [
                    'carrier'       => Express::CARRIER_CODE,
                    'carrier_title' => 'TEST',
                    'method'        => ShippingProductsInterface::CODE_INTERNATIONAL_09_00_DUTYFREE,
                    'method_title'  => 'LABEL',
                    'price'         => 6.0,
                    'cost'          => 6.0,
                ]
            ]
        );

        $handlingFee = new HandlingFee($this->config, $this->domesticProducts);
        $methods     = $handlingFee->processMethods([ $method ]);

        self::assertSame(9.0, $methods[0]->getPrice());
        self::assertSame(9.0, $methods[0]->getCost());
    }

    /**
     * Test handling fee calculation with percent handling fee.
     *
     * @test
     *
     * @magentoConfigFixture current_store carriers/dhlexpress/domestic_handling_type P
     * @magentoConfigFixture current_store carriers/dhlexpress/domestic_handling_fee  50
     */
    public function processMethodsWithPercentHandlingFee()
    {
        $method = $this->methodFactory->create(
            [
                'data' => [
                    'carrier'       => Express::CARRIER_CODE,
                    'carrier_title' => 'TEST',
                    'method'        => ShippingProductsInterface::CODE_DOMESTIC,
                    'method_title'  => 'LABEL',
                    'price'         => 6.0,
                    'cost'          => 6.0,
                ]
            ]
        );

        $handlingFee = new HandlingFee($this->config, $this->domesticProducts);
        $methods     = $handlingFee->processMethods([ $method ]);

        self::assertSame(9.0, $methods[0]->getPrice());
        self::assertSame(9.0, $methods[0]->getCost());
    }

    /**
     * Test handling fee calculation with fixed negative handling fee not dropping below 0.
     *
     * @test
     *
     * @magentoConfigFixture current_store carriers/dhlexpress/domestic_handling_type F
     * @magentoConfigFixture current_store carriers/dhlexpress/domestic_handling_fee  -10
     */
    public function processMethodsWithFixedNegativeHandlingFee()
    {
        $method = $this->methodFactory->create(
            [
                'data' => [
                    'carrier'       => Express::CARRIER_CODE,
                    'carrier_title' => 'TEST',
                    'method'        => ShippingProductsInterface::CODE_DOMESTIC,
                    'method_title'  => 'LABEL',
                    'price'         => 6.0,
                    'cost'          => 6.0,
                ]
            ]
        );

        $handlingFee = new HandlingFee($this->config, $this->domesticProducts);
        $methods     = $handlingFee->processMethods([ $method ]);

        self::assertSame(0.0, $methods[0]->getPrice());
        self::assertSame(0.0, $methods[0]->getCost());
    }
}
