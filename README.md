# Bespoke Backend Standards

Silverstripe backend standards for Bespoke squads.
This package contains some tools and a predefined ruleset


This package also utilizing the following third-party tools
* [PHP Parallel Lint](https://github.com/php-parallel-lint/PHP-Parallel-Lint)
* [Slevomat Coding Standard](https://github.com/slevomat/coding-standard)



## Installation 🧞

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

then import dependency with composer require

```bash
composer require --dev silverstripeltd/bespoke-standards
```
as a bonus, as `slevomat/coding-standard` is a dependency of this module.You can remove it from your projects dependencies.
```shell
composer remove --dev slevomat/coding-standard
```
## Usage 🛸

There are two possible ways to use this package.


### Option 1: Override the base standards

From your project root directory, create /edi the `phpcs.xml` to match the following content

```xml
<?xml version="1.0"?>
<ruleset name="{project-name}-coding-standards">
    <description>Coding standards for {project-name} - using the Silverstripe Bespoke Coding Standard</description>

    <rule ref="./vendor/silverstripeltd/bespoke-standards/phpcs.xml">
        <!-- Exclude anything you need to at a project level here -->

    </rule>

    <!-- Any further additional project specific additions can go here if needed -->
</ruleset>
```

Using the above configuration file, you can exclude and modify the configuration
of the coding standard to meet your project requirements.

---

### Option 2: Update your project composer scripts to use the new ones supplied here and remove your project level `phpcs.xml`

There are some scripts added into this module.

They are smart in that they will default to what ever you have in your project level `phpcs.xml` and if the file is missing it will default to the Silverstripe ruleset here.


These scripts are:


##### Check if the code comply with the coding standards.

   ```shell
   vendor/bin/app-cs
   ```

##### Fix errors automatically. (using phpcbf under the hood)
Note: not all errors are fixable.

   ```bash
   vendor/bin/app-cs-fix
   ```

##### Check the syntax of PHP files.

   ```bash
   vendor/bin/app-lint
   ```

---

## Help with migrating to this standard 🚧

Coming soon

Common issues/gothas:

- `SlevomatCodingStandard.Files.TypeNameMatchesFileName` failures

  You might need to check if you have any top level specific/custom `rootnamespaces` eg: `app/test` vs `app/tests` vs `app/tests/php` etc

---

## Maintainers 🤓
- Silverstripers! 💖

---

## Updates and PR guidelines 💞
* Anyone is welcome to contribute to the package and open Pull Request.
* Pull requests will be approved by a PD/Tech Lead

---

## Links 🔗

* [License](./LICENSE)
