---
tags:
  - Structure
  - Details on the Resolution Field
  - Not Mandatory
  - 'Technique 5.1: KCS Article Structure'
  - ✅
  - drupal/contrib/field_permissions
---

Status: Complete ✅

##Not Mandatory##

Visibility of content can be managed at the field level of the article based on the role and/or entitlement of the person looking at the article

##Practice/Technique##

* Structure
* Details on the Resolution Field

##Reference: KCS v6 Practices Guide##

Technique 5.1: KCS Article Structure

##Demo Requirements for Verified Only##


##OB/Config/Cust/NS/SF##
###Config###

1. Goto **admin/modules**
2. Enable the Field Permissions module.


##Native Product Capability##
Drupal provides a hook to granular control access at the field level,
[hook_entity_field_access](https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Entity%21entity.api.php/function/hook_entity_field_access).
The Field Permissions module uses this API hook.

##Mechanism for Config##
There is a form to configure field level access.

##Config Strategy##
Once Field Permissions module is installed, you need to edit the field settings form to enable permissions for each field where you need this feature. You can enable any of the following permission types:

* Create own value for the field
* Edit own value for the field
* Edit anyone's value for the field
* View own value for the field
* View anyone's value for the field

The settings for the Resolution field is located here: **admin/structure/types/manage/article/fields/node.article.field_resolution**

##Dependencies & Version Numbers##
[Field Permissions](https://www.drupal.org/project/field_permissions)

##Documentation##
