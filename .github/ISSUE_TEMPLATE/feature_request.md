---
name: Feature request
about: Suggest an Sniff for this project
title: "Short clear titles please"
labels: ["enhancement", "sniff", "triage"]
assignees: ''

---
## {{ Title for your Feature Request }}

<!-- Update the following example to be relevant -->

PHP version: `8.1`  
Proposed Sniff name: `Silverstripe.Sniffs.Extension.DisallowOwnerPropertySniff`

{{ Description }}

## Reason for proposed change

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
