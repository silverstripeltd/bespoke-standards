<?php

class NoErrors
{
    // No private member before this one (used to throw "Undefined array key")
    protected static $cacheData = [];

    /**
     * @var string[]
     */
    private static array $db = [];
    private static string $table_name = '';
    private static bool $cool_config = true;

    private static int $cool_config_2 = 1;

    private $variable = '';

    // Must not be treated as private just because a private member precedes it
    public static $publicStatic = '';

    protected static $protectedStatic = [];

    public function get($var): void {}
}
