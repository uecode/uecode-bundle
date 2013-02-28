#Sponsored Ad Feed


## Getting Started:

This document will outline the steps necessary to implement and use our Sponsored Ad Feed.  This document should be used as a technical reference for your developers.

If you have any questions or need to report a problem, please email `support@undergroundelephant.com`.


## Requirements:

You will need a Publisher Id ( `pub_id` ) from Underground Elephant to access the Sponsored Ad Feed.
If you do not have this information or can no longer locate it, please contact Underground Elephant Rep or through the support email listed above.


## Querying the Feed:

The Sponsored Ad Feed is a basic Web Service that will return either a JSON or XML response of Ads.  The service requires certain arguments to be passed to it - though we also have optional arguments that can help better target specific Ads for users.

The Sponsored Ad Feed accepts these arguments as either `GET` or `POST` variables.


### Query Arguments:

Argument | Required | Description
--- | --- | ---
`format` | **Yes** | The desired Response Format, either `json` or `xml`
`pub_id` | **Yes** | Publisher ID provided by UE
`sub_id` | No | Used to differentiate traffic sources or listing types
`kw` | **Yes** | End User's specified search term ( ** URL Encoded ** )
`zip` | **Yes** | User's zip code, either User specified or derived from IP Location
`ip` | **Yes** | End User's IP Address
`xfwd` | No | X-Forwarded IP Address - This should be specified if passed with user's request
`ua` | **Yes** | The useragent passed with End User's request ( ** URL Encoded ** )
`num` | No | Number of requested Ads to display - this value defaults to 5 if not specified
`ref` | No | End User's Referering URL, if exists ( ** URL Encoded ** )
`url` | **Yes** | The URL which displayed the Sponsored Ad Feed ( ** URL Encoded ** )


### Example Request Url:

Below is an example request to the Sponsored Ad Feed using `GET` parameters to pass the required arguments (including all optional arguments):

> http://usrv.in/ex/?format=json&pub_id=123&sub_id=456
>  &kw=auto%20insurance&ip=127.0.0.2&xfwd=127.0.0.1
>  &ua=Mozilla%2F5.0%20(Windows%20NT%206.1%3B%20WOW64)%20AppleWebKit%2F537.17%20(KHTML%2C%20like%20Gecko)%20Chrome%2F24.0.1312.57%20Safari%2F537.17
>  &num=3&url=http%3A%2F%2Fexample.com%2Fsearch&ref=http%3A%2F%2Fwww.google.com&zip=92101

