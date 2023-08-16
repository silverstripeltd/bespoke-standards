# Updating an existing project 🚜

Adding this to an existing project is a bit more of an undertaking.
Please thoroughly read this file.

It may be straight forward; it may. not. at. all...

### Table of contents
- [Updating an existing project 🚜](#updating-an-existing-project---)
    * [Implementation 🧞](#implementation---)
    * [Common issues/gotchas](#common-issues-gotchas)
        + [`SlevomatCodingStandard.Files.TypeNameMatchesFileName`](#-slevomatcodingstandardfilestypenamematchesfilename-)

<small><i><a href='http://ecotrust-canada.github.io/markdown-toc/'>Table of contents generated with markdown-toc</a></i></small>

---


## Implementation 🧞
1. As this is a private repository be sure to add the following configuration to your `composer.json`

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

2. import dependency with composer require

```shell
composer require --dev silverstripeltd/bespoke-standards
```


3. ensure `slevomat/coding-standard` is removed from your projects dependencies.
```shell
composer remove --dev slevomat/coding-standard
```

4. Update the associated scripts in the composer.jsons script.

Be mindful of if you are changing the base script names, you'll need to update all references to these (i.e. circleCI configs, script that reference others)

A nice final result we found is the below example
```json

{
  "scripts": {
      ...
      "silverstripe-standards": [
          "@stan-debug",
          "@app-lint",
          "@app-cs",
          "yarn lint",
          "yarn prettier:check"
      ],
      "app-lint": "app-lint",
      "app-cs": "app-cs",
      "app-cs-fix": "app-cs-fix",
      ...
  }
}
```

5. Add a reference to the Silverstripe Bespoke Coding Standard ruleset.xml after the description in your projects

```xml
<rule ref="./vendor/silverstripeltd/bespoke-standards/phpcs.xml"></rule>
```

6. Begin testing that code adheres to the standard.

Depending on how old your codebase is, and if it directly references an old slevomat ruleset you will either have **zero** errors here or a few that have been added into sleveomat since the point your project specifically referenced.

> 💡
> We recommend tackling adherence in stages. Keep the PR's smaller and manageable.

7. Remove specific sniff `<rules>`/`<excludes>` from your project `phpcs.xml` and fix issues that turn up and commit them

Eventually you will have only a handful of rules left.
Open an [issue](https://github.com/silverstripeltd/bespoke-standards/issues) to discuss or [PR](https://github.com/silverstripeltd/bespoke-standards/pulls) to fix it if you think Silverstripe Bespoke Coding standards should cover it.

8. Once you have nothing custom in your project level `phpcs.xml`

You've done it 🎉
Please delete the file !




## Common issues/gotchas


### `SlevomatCodingStandard.Files.TypeNameMatchesFileName`

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
        <property name="rootNamespaces" type="array">
            <element key="./app/src" value="App"/>
            <element key="./app/tests/php" value="App\Tests" /> <!-- <==== CUSTOM PATH -->
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
