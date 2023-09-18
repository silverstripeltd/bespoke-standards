## {{ Title for your PR }}

<!-- Update the following example details to be relevant -->

PHP version: `8.1`  
Proposed Sniff name: `Silverstripe.Sniffs.Extension.DisallowOwnerPropertySniff`


## Description
{{ General description about the change }}

## Reason for the change

- {{ Reason 1 }}
- {{ Reason 2 }}
- {{ etc }}


## Disallowed Code Example

```diff
class MyClass {

-   public function do_cool_thing() {
    
    }
}
```
## Allowed Code Example

```diff 
class MyClass {

+   public function doCoolThing() {
    
    }
}
```

## Usage

{{ Describe how to use the Sniff. How to exclude and how to customise it if possible/required }}


## Final checklist for reviewer
- [ ] ReadMe updated with Sniff name and link to docs in Wiki
- [ ] Unit test(s) added
- [ ] Disallowed/Allowed code examples added

