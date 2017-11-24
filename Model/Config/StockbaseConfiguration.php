<?php

namespace Stockbase\Integration\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Stockbase\Integration\Model\Config\Source\Environment;

/**
 * Stockbase main mobule configuration resource wrapper.
 */
class StockbaseConfiguration
{

    const CONFIG_MODULE_ENABLED = 'stockbase/integration/module_enabled';
    const CONFIG_ENVIRONMENT = 'stockbase/integration/environment';
    const CONFIG_USERNAME = 'stockbase/integration/username';
    const CONFIG_PASSWORD = 'stockbase/integration/password';
    const CONFIG_EAN_FIELD = 'stockbase/integration/ean_field';
    const CONFIG_ORDER_PREFIX = 'stockbase/integration/order_prefix';
    const CONFIG_IMAGES_SYNC = 'stockbase/integration/images_sync_enabled';
    const CONFIG_IMAGES_EANS = 'stockbase/integration/images_eans';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * StockbaseConfiguration constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isModuleEnabled()
    {
        return (bool) $this->scopeConfig->getValue(self::CONFIG_MODULE_ENABLED);
    }

    /**
     * Gets Stockbase environment name.
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->scopeConfig->getValue(self::CONFIG_ENVIRONMENT) ?: Environment::STAGING;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->scopeConfig->getValue(self::CONFIG_USERNAME);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->scopeConfig->getValue(self::CONFIG_PASSWORD);
    }

    /**
     * @return string
     */
    public function getEanFieldName()
    {
        return $this->scopeConfig->getValue(self::CONFIG_EAN_FIELD);
    }

    /**
     * @return string
     */
    public function getOrderPrefix()
    {
        return $this->scopeConfig->getValue(self::CONFIG_ORDER_PREFIX);
    }

    /**
     * @return bool
     */
    public function isImagesSyncEnabled()
    {
        return (bool) $this->scopeConfig->getValue(self::CONFIG_IMAGES_SYNC);
    }

    /**
     * @return mixed
     */
    public function getImagesEans()
    {
        return $this->scopeConfig->getValue(self::CONFIG_IMAGES_EANS);
    }

    /**
     * @return mixed
     */
    public function saveImagesEans($eans)
    {
        return $this->scopeConfig->saveConfig(self::CONFIG_IMAGES_EANS, $eans, 'default', 0);
    }

}
