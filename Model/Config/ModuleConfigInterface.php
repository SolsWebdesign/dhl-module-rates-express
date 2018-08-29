<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\ExpressRates\Model\Config;

/**
 * ModuleConfigInterface
 *
 * @package  Dhl\ExpressRates\Model
 * @author   Ronny Gertler <ronny.gertler@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ModuleConfigInterface
{
    public const CONFIG_ROOT = 'carriers/dhlexpress/';

    public const CONFIG_XML_PATH_ENABLED = self::CONFIG_ROOT . 'active';
    public const CONFIG_XML_PATH_SORT_ORDER = self::CONFIG_ROOT . 'sort_order';
    public const CONFIG_XML_PATH_TITLE = self::CONFIG_ROOT . 'title';
    public const CONFIG_XML_PATH_EMULATED_CARRIER = self::CONFIG_ROOT . 'emulated_carrier';
    public const CONFIG_XML_PATH_SHIP_TO_SPECIFIC_COUNTRIES = self::CONFIG_ROOT . 'sallowspecific';
    public const CONFIG_XML_PATH_SPECIFIC_COUNTRIES = self::CONFIG_ROOT . 'specificcountry';
    public const CONFIG_XML_PATH_SHOW_IF_NOT_APPLICABLE = self::CONFIG_ROOT . 'show_method_if_not_applicable';
    public const CONFIG_XML_PATH_ERROR_MESSAGE = self::CONFIG_ROOT . 'specificerrmsg';
    public const CONFIG_XML_PATH_USERNAME = self::CONFIG_ROOT . 'username';
    public const CONFIG_XML_PATH_PASSWORD = self::CONFIG_ROOT . 'password';
    public const CONFIG_XML_PATH_SANDBOX_MODE = self::CONFIG_ROOT . 'sandboxmode';
    public const CONFIG_XML_PATH_ACCOUNT_NUMBER = self::CONFIG_ROOT . 'accountnumber';
    public const CONFIG_XML_PATH_LOGLEVEL = self::CONFIG_ROOT . 'loglevel';
    public const CONFIG_XML_PATH_ENABLE_LOGGING = self::CONFIG_ROOT . 'logging';
    public const CONFIG_XML_PATH_DUTY_TAXES_ACCOUNTNUMBER = self::CONFIG_ROOT . 'duty_taxes_accountnumber';
    public const CONFIG_XML_PATH_ALLOWED_DOMESTIC_PRODUCTS = self::CONFIG_ROOT . 'alloweddomesticproducts';
    public const CONFIG_XML_PATH_ALLOWED_INTERNATIONAL_PRODUCTS = self::CONFIG_ROOT . 'allowedinternationalproducts';
    public const CONFIG_XML_PATH_REGULAR_PICKUP = self::CONFIG_ROOT . 'regular_pickup';
    public const CONFIG_XML_PATH_PACKAGE_INSURANCE = self::CONFIG_ROOT . 'package_insurance';
    public const CONFIG_XML_PATH_PACKAGE_INSURANCE_FROM_VALUE = self::CONFIG_ROOT . 'package_insurance_from_value';
    public const CONFIG_XML_PATH_PICKUP_TIME = self::CONFIG_ROOT . 'pickup_time';
    public const CONFIG_XML_PATH_DOMESTIC_HANDLING_TYPE = self::CONFIG_ROOT . 'domestic_handling_type';
    public const CONFIG_XML_PATH_DOMESTIC_HANDLING_FEE = self::CONFIG_ROOT . 'domestic_handling_fee';
    public const CONFIG_XML_PATH_INTERNATIONAL_HANDLING_TYPE = self::CONFIG_ROOT . 'international_handling_type';
    public const CONFIG_XML_PATH_INTERNATIONAL_HANDLING_FEE = self::CONFIG_ROOT . 'international_handling_fee';
    public const CONFIG_XML_PATH_ROUNDED_PRICES_MODE = self::CONFIG_ROOT . 'round_prices_mode';
    public const CONFIG_XML_PATH_ROUNDED_PRICES_FORMAT = self::CONFIG_ROOT . 'round_prices_format';
    public const CONFIG_XML_PATH_ROUNDED_PRICES_STATIC_DECIMAL = self::CONFIG_ROOT . 'round_prices_static_decimal';
    public const CONFIG_XML_PATH_FREE_SHIPPING_SUBTOTAL = self::CONFIG_ROOT . 'free_shipping_subtotal';
    public const CONFIG_XML_PATH_FREE_SHIPPING_ENABLED = self::CONFIG_ROOT . 'free_shipping_enable';
    public const CONFIG_XML_PATH_FREE_SHIPPING_VIRTUAL_ENABLED = self::CONFIG_ROOT . 'free_shipping_virtual_products_enable';
    public const CONFIG_XML_PATH_DOMESTIC_FREE_SHIPPING_PRODUCTS = self::CONFIG_ROOT . 'domestic_free_shipping_products';
    public const CONFIG_XML_PATH_DOMESTIC_FREE_SHIPPING_SUBTOTAL = self::CONFIG_ROOT . 'domestic_free_shipping_subtotal';
    public const CONFIG_XML_PATH_INTERNATIONAL_FREE_SHIPPING_PRODUCTS = self::CONFIG_ROOT . 'international_free_shipping_products';
    public const CONFIG_XML_PATH_INTERNATIONAL_FREE_SHIPPING_SUBTOTAL = self::CONFIG_ROOT . 'international_free_shipping_subtotal';
    public const CONFIG_XML_PATH_CARRIER_LOGO = self::CONFIG_ROOT . 'carrier_logo_url';
    public const CONFIG_XML_PATH_CHECKOUT_SHOW_LOGO = self::CONFIG_ROOT . 'checkout_show_logo';
    public const CONFIG_XML_PATH_CHECKOUT_SHOW_DELIVERY_TIME = self::CONFIG_ROOT . 'checkout_show_delivery_time';
    public const CONFIG_XML_PATH_TERMS_OF_TRADE = self::CONFIG_ROOT . 'terms_of_trade';
    public const CONFIG_XML_PATH_CUT_OFF_TIME = self::CONFIG_ROOT . 'cut_off_time';
    public const CONFIG_XML_PATH_ENABLE_RATES_CONFIGURATION = self::CONFIG_ROOT . 'enable_rates_configuration';
    public const CONFIG_XML_PATH_WEIGHT_UNIT = 'general/locale/weight_unit';
    public const CONFIG_XML_SUFFIX_FIXED = '_fixed';
    public const CONFIG_XML_SUFFIX_PERCENTAGE = '_percentage';

    /**
     * Check if the module is enabled.
     *
     * @param string|null $store
     * @return bool
     */
    public function isEnabled($store = null): bool;

    /**
     * Get the sort order.
     *
     * @param string|null $store
     * @return int
     */
    public function getSortOrder($store = null): int;

    /**
     * Get the title.
     *
     * @param string|null $store
     * @return string
     */
    public function getTitle($store = null): string;

    /**
     * Get the emulated carrier.
     *
     * @param string|null $store
     * @return string
     */
    public function getEmulatedCarrier($store = null): string;

    /**
     * Check if shipping only to specific countries.
     *
     * @param string|null $store
     * @return bool
     */
    public function shipToSpecificCountries($store = null): bool;

    /**
     * Get the specific countries.
     *
     * @param string|null $store
     * @return string[]
     */
    public function getSpecificCountries($store = null): array;

    /**
     * Show DHL Express in checkout if there are no products available.
     *
     * @param string|null $store
     * @return bool
     */
    public function showIfNotApplicable($store = null): bool;

    /**
     * Get the error message.
     *
     * @param string|null $store
     * @return string
     */
    public function getNotApplicableErrorMessage($store = null): string;

    /**
     * Get the username.
     *
     * @param string|null $store
     * @return string
     */
    public function getUserName($store = null): string;

    /**
     * Get the password.
     *
     * @param string|null $store
     * @return string
     */
    public function getPassword($store = null): string;

    /**
     * Check if Sandbox mode is enabled.
     *
     * @param string|null $store
     * @return bool
     */
    public function sandboxModeEnabled($store = null): bool;

    /**
     * Check if Sandbox mode is disabled.
     *
     * @param string|null $store
     * @return bool
     */
    public function sandboxModeDisabled($store = null): bool;

    /**
     * Get the Logging status.
     *
     * @param string|null $store
     * @return bool
     */
    public function isLoggingEnabled($store = null): bool;

    /**
     * Get the log level.
     *
     * @param string|null $store
     * @return int
     */
    public function getLogLevel($store = null): int;

    /**
     * Get the account number.
     *
     * @param string|null $store
     * @return string
     */
    public function getAccountNumber($store = null): string;

    /**
     * Get the allowed domestic products.
     *
     * @param string|null $store
     * @return string[]
     */
    public function getAllowedDomesticProducts($store = null): array;

    /**
     * Get the allowed international products.
     *
     * @param string|null $store
     * @return string[]
     */
    public function getAllowedInternationalProducts($store = null): array;

    /**
     * Get the duty taxes account number.
     *
     * @param null $store
     * @return string
     */
    public function getDutyTaxesAccountNumber($store = null): string;

    /**
     * Check if regular pickup is enabled.
     *
     * @param null $store
     * @return bool
     */
    public function isRegularPickup($store = null): bool;

    /**
     * Return if packages are insured.
     *
     * @param string|null $store
     * @return bool
     */
    public function isInsured($store = null): bool;

    /**
     * Get the value from which the packages should be insured.
     *
     * @param string|null $store
     * @return float
     */
    public function insuranceFromValue($store = null): float;

    /**
     * Get the pickup time.
     *
     * @param null $store
     * @return string
     */
    public function getPickupTime($store = null): string;

    /**
     * Get the domestic handling type.
     *
     * @param string|null $store
     *
     * @return string
     */
    public function getDomesticHandlingType(?string $store = null): string;

    /**
     * Get the domestic handling fee.
     *
     * @param string|null $store
     *
     * @return float
     */
    public function getDomesticHandlingFee(?string $store = null): float;

    /**
     * Get the international handling type.
     *
     * @param string|null $store
     *
     * @return string
     */
    public function getInternationalHandlingType(?string $store = null): string;

    /**
     * Get the international handling fee.
     *
     * @param string|null $store
     *
     * @return float
     */
    public function getInternationalHandlingFee(?string $store = null): float;

    /**
     * Get mode for rounded prices.
     *
     * @param string|null $store
     * @return string|null
     */
    public function getRoundedPricesMode(?string $store = null): ?string;

    /**
     * Returns true when price should be rounded up.
     *
     * @param string|null $store
     * @return bool
     */
    public function roundUp(?string $store = null): bool;

    /**
     * Returns true when price should be rounded off.
     *
     * @param string|null $store
     * @return bool
     */
    public function roundOff(?string $store = null): bool;

    /**
     * Get rounded prices format.
     *
     * @param string|null $store
     * @return string
     */
    public function getRoundedPricesFormat(?string $store = null): string;

    /**
     * Get rounded prices static value.
     *
     * @param string|null $store
     * @return float
     */
    public function getRoundedPricesStaticDecimal(?string $store = null): float;

    /**
     * Returns whether free shipping is enabled or not.
     *
     * @param string|null $store Store name
     *
     * @return bool
     */
    public function isFreeShippingEnabled(?string $store = null): bool;

    /**
     * Returns whether virtual products should be included in the subtotal value calculation or not.
     *
     * @param string|null $store Store name
     *
     * @return bool
     */
    public function isFreeShippingVirtualProductsIncluded(?string $store = null): bool;

    /**
     * Get the domestic free shipping allowed products.
     *
     * @param string|null $store Store name
     *
     * @return string[]
     */
    public function getDomesticFreeShippingProducts(?string $store = null): array;

    /**
     * Get the domestic free shipping subtotal value.
     *
     * @param string|null $store Store name
     *
     * @return float
     */
    public function getDomesticFreeShippingSubTotal(?string $store = null): float;

    /**
     * Get the international free shipping allowed products.
     *
     * @param string|null $store Store name
     *
     * @return string[]
     */
    public function getInternationalFreeShippingProducts(?string $store = null): array;

    /**
     * Get the international free shipping subtotal value.
     *
     * @param string|null $store Store name
     *
     * @return float
     */
    public function getInternationalFreeShippingSubTotal(?string $store = null): float;

    /**
     * Get carrier logo url
     *
     * @param string|null $store
     * @return string
     */
    public function getCarrierLogoUrl(?string $store = null): string;

    /**
     * Check if logo should be displayed in checkout
     *
     * @param string|null $store
     * @return bool
     */
    public function isCheckoutLogoEnabled(?string $store = null): bool;

    /**
     * Check if delivery time should be displayed in checkout
     *
     * @param string|null $store
     * @return bool
     */
    public function isCheckoutDeliveryTimeEnabled(?string $store = null): bool;

    /**
     * Get terms of trade
     *
     * @param null $store
     * @return string
     */
    public function getTermsOfTrade($store = null): string;

    /**
     * Get the cut off time.
     *
     * @param null $store
     * @return string
     */
    public function getCutOffTime($store = null): string;

    /**
     * Check if rates configuration is enabled
     *
     * @param null $store
     * @return bool
     */
    public function isRatesConfigurationEnabled($store = null): bool;

    /**
     * Get the general weight unit.
     *
     * @param null $store
     * @return string
     */
    public function getWeightUnit($store = null): string;

    /**
     * Get the general dimensions unit.
     *
     * @return string
     */
    public function getDimensionsUOM(): string;

    /**
     * Maps Magento's internal unit names to SDKs unit names
     *
     * @param string $unit
     * @return string
     */
    public function normalizeDimensionUOM(string $unit): string;

    /**
     * Checks if route is dutiable by stores origin country and eu country list
     *
     * @param string $receiverCountry
     * @param mixed $store
     * @return bool
     *
     */
    public function isDutiableRoute(string $receiverCountry, $store = null): bool;

    /**
     * Returns countries that are marked as EU-Countries
     *
     * @param mixed $store
     * @return string[]
     */
    public function getEuCountries($store = null): array;

    /**
     * Returns the shipping origin country
     *
     * @see Config
     *
     * @param mixed $store
     * @return string
     */
    public function getOriginCountry($store = null): string;
}
