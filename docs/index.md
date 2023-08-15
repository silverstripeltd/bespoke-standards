# Documentation 📚

## Bespoke custom standards

The standards ruleset is defined in the root directory of the package [phpcs.xml](../phpcs.xml).

## Override the base standards

From your project root directory, create `phpcs.xml` with the following content

```xml
<?xml version="1.0"?>
<ruleset name="your-project-coding-standards">
    <description>Coding standards for {project-name} - using the Silverstripe Bespoke Coding Standard</description>

    <rule ref="./vendor/silverstripeltd/bespoke-standards/phpcs.xml">
        <!-- Exclude anything you need to at a project level here -->
        
    </rule>

    <!-- Any further additional project specific additions can go here if needed -->
</ruleset>
```

Using the above configuration file, you can exclude and modify the configuration 
of the coding standard to meet your project requirements.

Alternatively, you can add `phpcs.xml` to your project root directory without using 
`<rule ref="./vendor/silverstripeltd/bespoke-standards/phpcs.xml">`. This would not 
enable Silverstripe Custom Bespoke Coding Standard.
