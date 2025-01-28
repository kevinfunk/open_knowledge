---
tags:
  - Content Health
  - Global Support Considerations
  - 'Technique 5.8: Global Support Considerations'
  - ✅
---

Status: Complete ✅

##Mandatory##

Describe your strategy for supporting locale-specific or multilingual content, including support for translation workflow or machine translation. List supported languages and restrictions associated with specific languages, if any.  Example: Include double-byte languages and right-to-left languages. Is a master-slave relationship between translated documents supported? Must there be a single master language, or can content in any language be the"master" for a given article.

##Practice/Technique##

* Content Health
* Global Support Considerations

##Reference: KCS v6 Practices Guide##

[Technique 5.8: Global Support Considerations](https://library.serviceinnovation.org/KCS/KCS_v6/KCS_v6_Practices_Guide/030/040/010/055)

##Demo Requirements for Verified Only##


##OB/Config/Cust/NS/SF##
###Out of the Box###
During the install, the first option is which language to use. There are 118
languages at the time of this writing.

[List of Supported Languages](https://localize.drupal.org/translate/languages)

There are no known restrictions to the type of languages.


##Native Product Capability##
Drupal Core provides four modules for Multilingual. Content Translation is used
for translating articles.

There is a Default language, but not a Master language. If English and Spanish
are supported, and English is the default. An article in just Spanish can be
created.

When an article is translated, all the translations have the same article id.

##Mechanism for Config##

##Config Strategy##
The Drupal community module, [Translation Management Tool](https://www.drupal.org/project/tmgmt),
is included but not enabled by default. It gives three translation strategies:

1. Machine translation
2. [External translation services](https://www.drupal.org/project/tmgmt/ecosystem)
3. Local users


##Dependencies & Version Numbers##


##Documentation##
https://localize.drupal.org/

https://localize.drupal.org/translate/languages

https://www.drupal.org/project/tmgmt
