---
name: Feature request
about: Suggest an Sniff for this project
title: ''
labels: enhancement, Sniff
assignees: ''

---

## Title

PHP version: `8.1`
Sniff name: `Silverstripe.Sniffs.Extension.DisallowOwnerPropertySniff`

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
