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
vendor/bin/app-cs
```

##### Fix errors automatically, where possible. (using phpcbf under the hood)
```shell
vendor/bin/app-cs-fix
```

##### Check the syntax of PHP files.

```shell
vendor/bin/app-lint
```


##### In must cases these will already be configured in the `composer.json` scripts area and can be run as per the table below.

| commands           | `vendor/bin/app-cs`  | `vendor/bin/app-cs-fix`  | `vendor/bin/app-lint`   |
|--------------------|----------------------|--------------------------|-------------------------|
| project equivalent | `composer run phpcs` | `composer run phpcs-fix` | `composer run php-lint` |



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
