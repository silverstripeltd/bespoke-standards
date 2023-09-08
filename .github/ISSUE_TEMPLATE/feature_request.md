---
name: Feature request
about: Suggest an Sniff for this project
title: "[Request]: "
labels: ["enhancement", Sniff"]
assignees: ''

---

<!-- Update the following example to be relevant -->

PHP version: `8.1`
Proposed Sniff name: `Silverstripe.Sniffs.Extension.DisallowOwnerPropertySniff`

{{ Description }}

## Reason for proposed change

- {{ TBA }}
- {{ TBA }}
- {{ TBA }}


## Disallowed Example

```diff
class MyClass {

-   public function do_cool_thing() {
    
    }
}
```
## Accepted Example

```diff 
class MyClass {

+   public function doCoolThing() {
    
    }
}
```
