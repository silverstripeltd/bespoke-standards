# Bespoke Backend Standards

Silverstripe backend standards for Bespoke squads. The package contains tools and predefined ruleset.

* [PHP Parallel Lint](https://github.com/php-parallel-lint/PHP-Parallel-Lint)
* [Slevomat Coding Standard](https://github.com/slevomat/coding-standard) 


## Installation 🧞

1. Install this package:


As this is a private repository be sure to add the following configuration to your `composer.json`

    ```bash
    composer config repositories.bespoke_standards vcs git@github.com:silverstripeltd/bespoke-standards.git
    ```

or manually add,

    ```json
    {
        "type": "vcs",
        "url": "git@github.com:silverstripeltd/bespoke-standards.git"
    }
    ```
 
Import dependency with composer require

    ```bash
    composer require --dev silverstripeltd/bespoke-standards
    ```

## Usage 🛸

Check if the code comply with the coding standards.

   ```bash
   $ vendor/bin/app-cs
   ```

Fix errors automatically. Note, not all errors are fixable. 

   ```bash
   $ vendor/bin/app-cs-fix
   ```

Check the syntax of PHP files.

   ```bash
   $ vendor/bin/app-lint
   ```

### Maintainers 🤓
- Silverstripers! 💖

## Updates and PR guidelines 💞
* Anyone is welcome to contribute to the package with Pull Request.
* Pull requests need to be approved by a PD/Tech Lead

## Links 🔗

* [License](./LICENSE)
* [Documentation](./docs/index.md)
