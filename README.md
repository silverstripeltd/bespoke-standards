# Silverstripe bespoke-standards


## What is this? 📚
This the home of the current PHPCS standards for php for bespoke squads

## Getting started 🧞

### Installation

As this is a private repo be sure to add the repositiory to your `composer.json`

```shell
composer config repositories.bespoke_standards vcs git@github.com:silverstripeltd/bespoke-standards.git
```
or manually add
```json
{
    "type": "vcs",
    "url": "git@github.com:silverstripeltd/bespoke-standards.git"
}
```


Then add the module to your setup;
```shell
composer require --dev silverstripeltd/bespoke-standards
```

Then update your project level `phpcs.xml` to the following, updating details where needed

```xml
<?xml version="1.0"?>
<ruleset name="silverstipe-bespoke-coding-standards">
    <description>Coding standards for {project-name} - using the Silverstripe Bespoke Coding Standard</description>

    <rule ref="./vendor/silverstripeltd/bespoke-standards/ruleset.xml">
        <!-- Exclude anything you need to at a project level here -->

        <!--
            Please open a PR here https://github.com/silverstripeltd/bespoke-standards if you think
            they should be available for all projects
        -->
    </rule>

    <!-- Any further additional project specific addions can go here if needed -->
</ruleset>

```

Now carry on using phpcs 🪄✨


## Help with migrating 🚧
_Coming soon_

Common issues though:
- `SlevomatCodingStandard.Files.TypeNameMatchesFileName`
  - You might need to check if you have any top level specific rootnamespaces
  eg: `app/test` vs `app/tests` vs `app/tests/php` etc

### Requirements
- `slevomat/coding-standard`: >8.1
- Php 🐘

## Updates and PR guidelines
* PR's can be opened by any one
* PR's need to be approved by a minimum of 2 PD/Tech Lead

### Maintainers 🤓
You! 💖


## Example custom site level

```xml
<?xml version="1.0"?>
<ruleset name="silverstipe-bespoke-coding-standards">
    <description>Coding standards for {project-name} - using the Silverstripe Bespoke Coding Standard</description>

    <rule ref="./vendor/silverstripeltd/bespoke-standards/ruleset.xml">
        <!-- Exclude anything you need to at a project level here -->

        <!--
            Please open a PR here https://github.com/silverstripeltd/bespoke-standards if you think
            they should be available for all projects
        -->
        <exclude-pattern>./app/tests/*</exclude-pattern>
    </rule>

    <!-- Any further additional project specific addions can go here if needed -->
    <rule ref="SlevomatCodingStandard.Files.TypeNameMatchesFileName">
        <properties>
            <!-- Set the root namespace for our src dir and phpunit dir. Please change these as required -->
            <property name="rootNamespaces" type="array">
                <element key="app/src" value="App"/>
                <element key="app/tests/php" value="App\Tests" /> <!-- non standard test directory -->
            </property>
        </properties>
    </rule>

</ruleset>

```
