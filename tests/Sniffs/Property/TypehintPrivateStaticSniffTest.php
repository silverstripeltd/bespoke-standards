<?php

// Disabling until fixed in https://github.com/silverstripeltd/bespoke-standards/pull/33

// namespace Silverstripe\Sniffs\Property;

// use SlevomatCodingStandard\Sniffs\TestCase;
// use SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff;

// class TypehintPrivateStaticSniffTest extends TestCase
// {
//     public function testNoErrors(): void
//     {
//         $report = self::checkFile(
//             __DIR__ . '/data/TypehintPrivateStaticSniff_NoErrors.php',
//         );

//         self::assertNoSniffErrorInFile($report);
//     }

//     public function testErrors(): void
//     {
//         $report = self::checkFile(
//             __DIR__ . '/data/TypehintPrivateStaticSniff_Errors.php', [
//         ]);

//         self::assertSame(7, $report->getErrorCount());

//         self::assertSniffError($report, 8, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
//         self::assertSniffError($report, 12, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
//         self::assertSniffError($report, 16, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
//         self::assertSniffError($report, 21, PropertyTypeHintSniff::CODE_MISSING_NATIVE_TYPE_HINT);
//         self::assertSniffError($report, 23, PropertyTypeHintSniff::CODE_MISSING_ANY_TYPE_HINT);
//         self::assertSniffError($report, 24, PropertyTypeHintSniff::CODE_MISSING_ANY_TYPE_HINT);
//         self::assertSniffError($report, 25, PropertyTypeHintSniff::CODE_MISSING_ANY_TYPE_HINT);
//         self::assertNoSniffError($report, 29);
//         self::assertNoSniffError($report, 31);

//         self::assertAllFixedInFile($report);
//     }
// }
