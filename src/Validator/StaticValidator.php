<?php

/**
 * ReportingCloud PHP Wrapper
 *
 * PHP wrapper for ReportingCloud Web API. Authored and supported by Text Control GmbH.
 *
 * @link      http://www.reporting.cloud to learn more about ReportingCloud
 * @link      https://github.com/TextControl/txtextcontrol-reportingcloud-php for the canonical source repository
 * @license   https://raw.githubusercontent.com/TextControl/txtextcontrol-reportingcloud-php/master/LICENSE.md
 * @copyright © 2018 Text Control GmbH
 */

namespace TxTextControl\ReportingCloud\Validator;

use TxTextControl\ReportingCloud\Exception\InvalidArgumentException;
use Zend\Validator\StaticValidator as StaticValidatorValidatorZend;

/**
 * StaticValidator validator
 *
 * @package TxTextControl\ReportingCloud
 * @author  Jonathan Maron (@JonathanMaron)
 */
class StaticValidator extends StaticValidatorValidatorZend
{
    /**
     * ReportingCloud Validator classes
     *
     * @var array
     */
    static protected $invokableClasses
        = [
            ApiKey::class,
            Base64Data::class,
            DateTime::class,
            DocumentDivider::class,
            DocumentExtension::class,
            Culture::class,
            FileExists::class,
            FileExtension::class,
            FileHasExtension::class,
            ImageFormat::class,
            Language::class,
            Page::class,
            ReturnFormat::class,
            TemplateExtension::class,
            TemplateFormat::class,
            TemplateName::class,
            Timestamp::class,
            TypeArray::class,
            TypeBoolean::class,
            TypeInteger::class,
            TypeString::class,
            ZoomFactor::class,
        ];

    /**
     * Statically call a Validator and throw exception on failure
     *
     * @param mixed  $value     Value
     * @param string $className Class name
     * @param array  $options   Options
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public static function execute($value, $className, array $options = [])
    {
        if (count($options) > 0 && array_values($options) === $options) {
            $message = 'Invalid options provided via $options argument; must be an associative array';
            throw new InvalidArgumentException($message);
        }

        $pluginManager = static::getPluginManager();

        $validator = $pluginManager->get($className, $options);

        $ret = $validator->isValid($value);

        if (false === $ret) {
            $message  = null;
            $messages = $validator->getMessages();
            if (count($messages) > 0) {
                $message = array_shift($messages);
            }
            throw new InvalidArgumentException($message);
        }

        return $ret;
    }

    /**
     * Get plugin manager for loading validator classes, adding ReportingCloud Validator classes
     *
     * @return \Zend\Validator\ValidatorPluginManager
     */
    public static function getPluginManager()
    {
        $pluginManager = parent::getPluginManager();

        foreach (self::$invokableClasses as $invokableClass) {

            $segments = explode('\\', $invokableClass);
            $name     = array_pop($segments);

            $pluginManager->setInvokableClass($name, $invokableClass);
        }

        return $pluginManager;
    }
}
