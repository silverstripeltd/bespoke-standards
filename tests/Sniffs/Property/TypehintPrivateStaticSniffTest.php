<?php

namespace Silverstripe\Sniffs\Property;

use SlevomatCodingStandard\Sniffs\TestCase;
use SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff;

class TypehintPrivateStaticSniffTest extends TestCase
{
    public function testNoErrors(): void
    {
        $report = self::checkFile(
            __DIR__ . '/data/TypehintPrivateStaticSniff_NoErrors.php',
        );

        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(
            __DIR__ . '/data/TypehintPrivateStaticSniff_Errors.php', [
        ]);

        self::assertSame(7, $report->getErrorCount());

        self::assertSniffError($report, 9, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
        self::assertSniffError($report, 13, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
        self::assertSniffError($report, 17, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
        self::assertSniffError($report, 22, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
        self::assertSniffError($report, 24, PropertyTypeHintSniff::CODE_MISSING_ANY_TYPE_HINT);
        self::assertSniffError($report, 25, PropertyTypeHintSniff::CODE_MISSING_ANY_TYPE_HINT);
        self::assertSniffError($report, 26, PropertyTypeHintSniff::CODE_MISSING_ANY_TYPE_HINT);
        self::assertNoSniffError($report, 30);
        self::assertNoSniffError($report, 32);

        self::assertAllFixedInFile($report);
    }
}
