# Starting fresh 🌱

To implement this in a new project follow the following details

## Installation 🧞
As this is a private repository be sure to add the following configuration to your `composer.json`

```shell
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

```shell
composer require --dev silverstripeltd/bespoke-standards
```


don't forget to ensure `slevomat/coding-standard` is removed from your projects dependencies.
```shell
composer remove --dev slevomat/coding-standard
```

## Usage 🛸

There are two possible ways to use this package. They both have pros and cons.

For a brand-new project [Option 1](#Option-1:-Override-the-base-standards) will likely be better; as this allows custom project level overrides without waiting for this project to update to handle them


### Option 1: Override the base standards

From your project root directory, create /edit the `phpcs.xml` to match the following content

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
