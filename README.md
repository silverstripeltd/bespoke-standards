# Bespoke Backend Standards

Silverstripe backend standards for Bespoke squads, this package contains some tools and a predefined ruleset.

This package also utilizing the following third-party tools:
* [PHP Parallel Lint](https://github.com/php-parallel-lint/PHP-Parallel-Lint)
* [Slevomat Coding Standard](https://github.com/slevomat/coding-standard)

## What is the Goal of this module? 🥅
Simply put, this module aims to centralise, maintain and handle all the details relating to coding standards for the Silverstripe Bespoke teams.

A fully implemented code base will have no specifics about coding standards present within it.

Currently, this is focusing on PHP with a Silverstripe framework in mind.

This may change in the future. 🚀


## Installation 🧞
> ⚠️ If you are looking to add this to an existing project please head over to the [updating an existing project](./docs/updating-existing-projects/index.md) section
---

💀 If you're creating a new project from skeleton consumption of this module will already be configured.


## Usage 🛸

These scripts are as follows:

##### Check if the code complies with the Silverstripe Bespoke Coding Standards.

```shell
vendor/bin/silverstripe-phpcs
```

##### Fix errors automatically, where possible. (using phpcbf under the hood)
```shell
vendor/bin/silverstripe-phpcbf
```

##### Check the syntax of PHP files.

```shell
vendor/bin/silverstripe-phplint
```


##### In must cases these will already be configured in the `composer.json` scripts area and can be run as per the table below.

| commands           | `vendor/bin/app-cs`   | `vendor/bin/app-cs-fix`   | `vendor/bin/app-lint`   |
|--------------------|-----------------------|---------------------------|-------------------------|
| project equivalent | `composer run app-cs` | `composer run app-cs-fix` | `composer run app-lint` |


## Overriding the ruleset here ⛔️
We strongly advise against doing this, but there may be situations where you will need to.

This can be done with creating a `phpcs.xml` in your project directory with the following structure
```xml
<?xml version="1.0"?>
<ruleset name="{project-name}-coding-standards">
    <description>Coding standards for {project-name} - using the Silverstripe Bespoke Coding Standard</description>

    <rule ref="./vendor/silverstripeltd/bespoke-standards/phpcs.xml">
        <!-- Exclude anything you need to at a project level here -->

    </rule>

    <!-- Any further additional project specific additions can go here if needed -->
    <!-- Do note: rule > properties > property notation does not merge, you have to define the full details -->

</ruleset>
```

Consider when you're thinking about overriding something, why? Is it a new slevomat sniff thats turned up? Should the Silverstripe Bespoke Coding Standards update and handle this?

Open an [issue](https://github.com/silverstripeltd/bespoke-standards/issues) to discuss or [PR](https://github.com/silverstripeltd/bespoke-standards/pulls) to fix it

## Custom Silverstripe sniffs ✨
- `Silverstripe.Sniffs.Extension.DisallowOwnerPropertySniff`

## Maintainers 🤓
- Silverstripers! 💖


## Updates and PR guidelines 💞
* Anyone is welcome to contribute to the package and open Pull Request.
* Pull requests will only be approved by a Principal Dev/Tech Leads


## Links 🔗
* [Updating an existing project to use this module](./docs/updating-existing-projects/index.md)
* How to create a custom sniff – Coming soon
* [License](./LICENSE)
