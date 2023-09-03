## Title

PHP version: `8.1`
Sniff name: `Silverstripe.Sniffs.Extension.DisallowOwnerPropertySniff`

- [ ] ReadMe updated with Sniff name and link to docs in Wiki
- [ ] Unit test(s) added
- [ ] Disallowed/Allowed examples added

{{ Description }}

## Reason for the change

- {{ TBA }}
- {{ TBA }}
- {{ TBA }}


## Disallow

```diff
class MyClass {

-   public function do_cool_thing() {
    
    }
}
```
## Allow

```diff 
class MyClass {

+   public function doCoolThing() {
    
    }
}
```

## Usage

{{ Describe how to use the Sniff. How to exclude and how to customise it if possible }}
