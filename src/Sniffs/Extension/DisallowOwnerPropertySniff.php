<?php
namespace Silverstripe\Standards\Sniffs\Extension;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;
use SlevomatCodingStandard\Helpers\UseStatement;
use SlevomatCodingStandard\Helpers\UseStatementHelper;

/**
 * This sniff prohibits the use of $this->owner property within Extension class, in-favor of the method ->getOwner()
 */
class DisallowOwnerPropertySniff implements Sniff
{
    public const CODE_OWNER_PROPERTY = 'OwnerProperty';

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array(int)
     */
    public function register()
    {
        return [T_VARIABLE, T_OBJECT_OPERATOR, T_STRING];
    }

    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param File $phpcsFile The current file being checked.
     * @param int $stackPtr The position of the current token in the stack passed in $tokens.
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        // Get all token within current file
        $tokens = $phpcsFile->getTokens();

        // Get fully qualified class name from the extended class
        $classExtend = $this->findExtendClass($phpcsFile, (int) $stackPtr);

        // Whether or not the extended class is a Silverstripe extension
        $isExtension = $this->isExtensionClass($classExtend);

        // Check for call to ->owner
        $prevToken = $phpcsFile->findPrevious(T_OBJECT_OPERATOR, $stackPtr, $stackPtr - 1, false, '->');
        if ($isExtension && $tokens[$stackPtr]['content'] === 'owner' && $prevToken) {
            // Add error message that can be automatically fixed
            $fix = $phpcsFile->addFixableError(
                'Use of ->owner in extension is disallowed;',
                $stackPtr,
                self::CODE_OWNER_PROPERTY
            );

            // If request to fix the error, then apply the fix
            if ($fix) {
                $this->fix($phpcsFile, (int) $stackPtr);
            }
        }
    }

    private function fix(File $phpcsFile, int $stackPtr): void
    {
        // Start fixing
        $phpcsFile->fixer->beginChangeset();

        // Apply a fix - replace owner with getOwner()
        $phpcsFile->fixer->replaceToken($stackPtr, 'getOwner()');

        // Commit changes
        $phpcsFile->fixer->endChangeset();
    }

    /**
     * Get fully qualified class name for extended class.
     *
     * Note: Helper methods from SlevomatCodingStandard are used here.
     */
    protected function findExtendClass(File $phpcsFile, int $stackPtr): string
    {
        $classPtr = $phpcsFile->getCondition($stackPtr, T_CLASS);
        $classExtend = $phpcsFile->findExtendedClassName($classPtr);

        $fileUseStatements = UseStatementHelper::getFileUseStatements($phpcsFile);

        foreach ($fileUseStatements as $useStatements) {
            foreach ($useStatements as $useStatement) {
                assert($useStatement instanceof UseStatement);
                if ($classExtend === $useStatement->getNameAsReferencedInFile()) {
                    return $useStatement->getFullyQualifiedTypeName();
                }
            }
        }

        return '';
    }

    /**
     * Whether or not a class name is an instance of Silverstripe extension
     */
    protected function isExtensionClass(string $class): bool
    {
        $extensions = [
            'SilverStripe\\Core\\Extension',
            'SilverStripe\\ORM\\DataExtension',
        ];

        return in_array($class, $extensions, true);
    }
}
