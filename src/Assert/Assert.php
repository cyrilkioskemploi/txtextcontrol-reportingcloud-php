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

use TxTextControl\ReportingCloud\Exception\InvalidArgumentException;
use Webmozart\Assert\Assert as ParentAssert;

/**
 * Class Assert
 *
 * @package TxTextControl\ReportingCloud
 */
class Assert extends ParentAssert
{
    use AssertApiKeyTrait;
    use AssertBase64DataTrait;
    use AssertCultureTrait;
    use AssertDateTimeTrait;
    use AssertDocumentDividerTrait;
    use AssertDocumentExtensionTrait;
    use AssertImageFormatTrait;
    use AssertLanguageTrait;
    use AssertPageTrait;
    use AssertReturnFormatTrait;
    use AssertTemplateExtensionTrait;
    use AssertTemplateFormatTrait;
    use AssertTemplateNameTrait;
    use AssertTimestampTrait;
    use AssertZoomFactorTrait;
    use FilenameExistsTrait;
    use FileFormatsTrait;

    /**
     * Customized version of parent::reportInvalidArgument to throw
     *
     *     TxTextControl\ReportingCloud\Exception\InvalidArgumentException
     *
     * exception instead of parent's
     *
     *     InvalidArgumentException
     *
     * @param $message
     */
    protected static function reportInvalidArgument($message)
    {
        throw new InvalidArgumentException($message);
    }

}
