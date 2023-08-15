# Updating an existing project 🚜

Adding this to an existing project is a bit more of an undertaking. Please thoroughly read this file.


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

You may find the project code is already adhearing to the ruleset, you may not.

### Initial adoption

Typically [Option 1](#option-1-override-the-base-standards) is the easier option to head towards.

And an easy way to phase into that is by simply adding

```xml
<rule ref="./vendor/silverstripeltd/bespoke-standards/phpcs.xml"></rule>
```
to the top of your project level `phpcs.xml`.

Once you have done that you can slowly comment out lines beneath it whilst running `phpcs` to work out where/what needs to be updated to meet this new standard if anything fails.

> 💡 This way is advisable as sometimes there can be a hell of a lot of details to update and/or exclude; and this can be commited and worked on over time



### Final implementation options


#### Option 1: Override the base standards

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

#### Option 2: Update your project composer scripts to use the new ones supplied here and remove your project level `phpcs.xml`

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



## Common issues/gotchas

- `SlevomatCodingStandard.Files.TypeNameMatchesFileName` failures

  You might need to check if you have any top level specific/custom `rootnamespaces` eg: `app/test` vs `app/tests` vs `app/tests/php` etc
  eg
  ```xml
  <?xml version="1.0"?>
  <ruleset name="{project-name}-coding-standards">
    <description>Coding standards for {project-name} - using the Silverstripe Bespoke Coding Standard</description>

    <rule ref="./vendor/silverstripeltd/bespoke-standards/phpcs.xml">
        <!-- Exclude anything you need to at a project level here -->
    </rule>

    <!-- Any further additional project specific additions can go here if needed -->
    <rule ref="SlevomatCodingStandard.Files.TypeNameMatchesFileName">
        <properties>
            <!-- Set the root namespace for our src dir and phpunit dir. Please change these as required -->
            <!-- <property name="rootNamespaces" type="array" value="../../../app/src=>App,../../../app/tests=>App\Tests"/> -->
            <property name="rootNamespaces" type="array">
                <element key="../../../app/src" value="App"/>
                <element key="../../../app/tests/php" value="App\Tests" /> <!-- <-- CUSTOM PATH -->
            </property>
            <property name="ignoredNamespaces" type="array">
                <element value="Slevomat\Services"/>
            </property>
        </properties>

        <!-- allow only class Page and PageController to not match path -->
        <exclude-pattern>Page\.php</exclude-pattern>
        <exclude-pattern>PageController\.php</exclude-pattern>
    </rule>
  </ruleset>
  ```
