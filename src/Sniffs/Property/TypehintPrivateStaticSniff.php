<?php

namespace Silverstripe\Sniffs\Property;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\PropertyHelper;
use SlevomatCodingStandard\Helpers\TokenHelper;
use SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff;
use const T_CONST;
use const T_FUNCTION;
use const T_PRIVATE;
use const T_PROTECTED;
use const T_PUBLIC;
use const T_STATIC;
use const T_VAR;
use const T_VARIABLE;

/**
 * Requires type hints on private static properties (Silverstripe config).
 *
 * This sniff runs the SlevomatCodingStandard PropertyTypeHint check on private static properties only.
 * It runs even when a project excludes SlevomatCodingStandard.TypeHints.PropertyTypeHint.
 * If a project does not exclude that sniff, both sniffs report the same error.
 */
class TypehintPrivateStaticSniff implements Sniff
{

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array(int)
     */
    public function register()
    {
        return [
            T_VAR,
            T_PUBLIC,
            T_PROTECTED,
            T_PRIVATE,
            T_STATIC,
        ];
    }

    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param File $phpcsFile The current file being checked.
     * @param int $stackPtr The position of the current token in the stack passed in $tokens.
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();

        $propertyPointer = TokenHelper::findNext($phpcsFile, [T_FUNCTION, T_CONST, T_VARIABLE], $stackPtr + 1);

        if ($propertyPointer === null || $tokens[$propertyPointer]['code'] !== T_VARIABLE) {
            return;
        }

        if (!PropertyHelper::isProperty($phpcsFile, $propertyPointer)) {
            return;
        }

        // Only private static properties (Silverstripe config)
        $property = $phpcsFile->getMemberProperties($propertyPointer);

        if ($property['scope'] !== 'private' || !$property['is_static']) {
            return;
        }

        // Process property type sniff from SlevomatCodingStandard
        $sniff = new PropertyTypeHintSniff();
        $sniff->enableNativeTypeHint = true;
        $sniff->enableIntersectionTypeHint = true;
        $sniff->enableMixedTypeHint = true;
        $sniff->enableStandaloneNullTrueFalseTypeHints = true;
        $sniff->enableUnionTypeHint = true;
        $sniff->process($phpcsFile, $stackPtr);
    }

}
