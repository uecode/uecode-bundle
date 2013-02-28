#Sponsored Ad Feed


## Getting Started:

This document will outline the steps necessary to implement and use our Sponsored Ad Feed.  This document should be used as a technical reference for your developers.

If you have any questions or need to report a problem, please email `support@undergroundelephant.com`.


## Requirements:

You will need a Publisher Id ( `pub_id` ) from Underground Elephant to access the Sponsored Ad Feed.
If you do not have this information or can no longer locate it, please contact Underground Elephant Rep or through the support email listed above.


## Querying the Feed:

The Sponsored Ad Feed is a basic Web Service that will return either a JSON or XML response of Ads.  The service requires certain arguments to be passed to it - though we also have optional arguments that can help better target specific Ads for users.

### Query Arguments

Argument | Required | Description
--- | --- | ---
`pub_id` | **Yes** | Publisher ID provided by UE
`sub_id` | No | Used to differentiate traffic sources or listing types
`ip` | **Yes** | End User's IP Address
`xfwd` | No | X-Forwarded IP Address - This should be specified if passed with user's request
`kw` | **Yes** | End User's specified search term
`num` | No | Number of requested Ads to display - this value defaults to 5 if not specified
`ref` | No | End User's Referering URL, if exists
`url` | **Yes** | The URL which displayed the Sponsored Ad Feed
`zip` | **Yes** | User's zip code, either User specified or derived from IP Location

