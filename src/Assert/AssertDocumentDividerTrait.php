<?php
declare(strict_types=1);

/**
 * ReportingCloud PHP Wrapper
 *
 * PHP wrapper for ReportingCloud Web API. Authored and supported by Text Control GmbH.
 *
 * @link      https://www.reporting.cloud to learn more about ReportingCloud
 * @link      https://github.com/TextControl/txtextcontrol-reportingcloud-php for the canonical source repository
 * @license   https://raw.githubusercontent.com/TextControl/txtextcontrol-reportingcloud-php/master/LICENSE.md
 * @copyright © 2019 Text Control GmbH
 */

namespace TxTextControl\ReportingCloud\Assert;

use ReflectionClass;
use ReflectionException;
use TxTextControl\ReportingCloud\ReportingCloud;

/**
 * Trait DocumentDividerTrait
 *
 * @package TxTextControl\ReportingCloud
 */
trait AssertDocumentDividerTrait
{
    public static function assertDocumentDivider(int $value, string $message = '')
    {
        $haystack = [];
        try {
            $reportingCloud  = new ReportingCloud();
            $reflectionClass = new ReflectionClass($reportingCloud);
            foreach ($reflectionClass->getConstants() as $constantKey => $constantValue) {
                if (0 === strpos($constantKey, 'DOCUMENT_DIVIDER_')) {
                    $haystack[] = $constantValue;
                }
            }
            unset($reportingCloud);
        } catch (ReflectionException $e) {
            $format  = 'Internal error validating %s';
            $message = sprintf($message ?: $format, static::valueToString($value));
            static::reportInvalidArgument($message);
        }

        if (!in_array($value, $haystack)) {
            $format  = '%s contains an unsupported document divider';
            $message = sprintf($message ?: $format, static::valueToString($value));
            static::reportInvalidArgument($message);
        }

        return null;
    }
}