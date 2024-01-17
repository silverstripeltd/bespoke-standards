<?php

namespace Silverstripe\Sniffs\Extension;

use Silverstripe\Sniffs\Extension\DisallowOwnerPropertySniff;
use SlevomatCodingStandard\Sniffs\TestCase;

class DisallowOwnerPropertySniffTest extends TestCase
{
    public function testNoErrors(): void
    {
        $report = self::checkFile(
            __DIR__ . '/data/DisallowOwnerPropertySniff_NoErrors.php',
            [],
            [],
            [
                '--standard=Silverstripe'
            ]
        );
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(
            __DIR__ . '/data/DisallowOwnerPropertySniff_Errors.php',
            [],
            [],
            [
                '--standard=Silverstripe'
            ]
        );

        self::assertSame(6, $report->getErrorCount());

        self::assertSniffError($report, 11, DisallowOwnerPropertySniff::CODE_OWNER_PROPERTY);
        self::assertSniffError($report, 13, DisallowOwnerPropertySniff::CODE_OWNER_PROPERTY);
        self::assertSniffError($report, 25, DisallowOwnerPropertySniff::CODE_OWNER_PROPERTY);
        self::assertSniffError($report, 27, DisallowOwnerPropertySniff::CODE_OWNER_PROPERTY);
        self::assertSniffError($report, 39, DisallowOwnerPropertySniff::CODE_OWNER_PROPERTY);
        self::assertSniffError($report, 41, DisallowOwnerPropertySniff::CODE_OWNER_PROPERTY);

        self::assertAllFixedInFile($report);
    }
}
