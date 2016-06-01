<?php

/**
 * ReportingCloud PHP Wrapper
 *
 * Official wrapper (authored by Text Control GmbH, publisher of ReportingCloud) to access ReportingCloud in PHP.
 *
 * @link      http://www.reporting.cloud to learn more about ReportingCloud
 * @link      https://github.com/TextControl/ReportingCloud.PHP for the canonical source repository
 * @license   https://github.com/TextControl/ReportingCloud.PHP/blob/master/LICENSE.md New BSD License
 * @copyright © 2016 Text Control GmbH
 */
namespace TXTextControl\ReportingCloud\PropertyMap;

/**
 * Abstract property map
 *
 * @package TXTextControl\ReportingCloud
 * @author  Jonathan Maron (@JonathanMaron)
 */
abstract class AbstractPropertyMap implements PropertyMapInterface
{
    /**
     * Assoc array of properties
     * camelCase properties => Lower case underscore array keys
     *
     * @var array
     */
    protected $map;

    /**
     * Return the property map
     *
     * @return array
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set the property map
     *
     * @param array $map Assoc array of property data
     *
     * @return $this;
     */
    public function setMap($map)
    {
        $this->map = $map;

        return $this;
    }
}