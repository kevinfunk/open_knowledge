This is meant to track Open Knowledge's progress to being Verified.


[KCS v6 Verified & Aligned Self-Assessment Worksheets](references.md)

| Status                         | Emoji | Count |
|--------------------------------|:-----:|------:|
| [Complete](tags/#_1)           | ✅    | 14    |
| [Incomplete](tags/#_2)         | ❌    |  6    |
| [Not Mandatory](tags/#_3)      | ❎    |  6    |
| [Unknown](tags/#_4)            | ❓    | 50    |
| Total                          |       | 76    |

##Definitions##

###OBConfig, for “out of the box” and/or configurable.###

Out of the box functionality should fulfill the functional requirement described with no additional customization.  Requirements marked for configuration should require some setting of parameters, use of administrative tools, or other non-programmatic methods for adjusting or specifying the behavior of the system in such a way that it meets the requirement.  For each OBConfig item, the vendor should specify:

The native product capability that is being used and configured
What mechanisms are being used for the configuration (e.g., configuration files, administrative web pages, graphical user interfaces, etc.)
The general strategy for the configuration (e.g., “create the following user classes by assigning permissions as shown…”)




###Cust, for “Customization.”###

Requirements marked for customization may require configuration but also require programming that leverages documented application programming interfaces (APIs), web services interfaces, and the like.  Typically, integration with external systems such as an authentication, directory, or incident tracking interface is accomplished with customization.  For each Cust item, the vendor should specify:

The native product capability that is being used configured and customized
What mechanisms are being used for the customization (e.g., specific APIs, extension loaders, web services calls, etc.) and the configuration (e.g., configuration files, administrative web pages, graphical user interfaces , etc.
The general strategy for the customization and configuration
Dependencies (e.g., third-party applications, libraries, developer tools,etc)
Specific documents or manuals in which the mechanisms for customization and configuration are described, and the relevant page numbers or sections
Documentation, reference implementations, or code samples specific to the specific customization, as available


###SF, for Separate Feature.###

This may be added to any of the above descriptions to indicate that additional software or services must be licensed, installed, or provisioned, and that additional fees may apply.  For each SF, please identify what a customer needs to do to gain access to this feature, including specific product or service names.



Note that the Consortium anticipates that sophisticated software is designed to be configured, extended, and integrated in a typical customer installation, and “Cust” responses are expected.  The key factor for KCS Verification is to make sure that customers, third-party integrators, and the vendor’s own professional services team are able to meet these requirements in a documented, repeatable, and efficient manner.    