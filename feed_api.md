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

usrv.in/ex/?format=json&pub_id=123&sub_id=456&kw=auto%20insurance&ip=127.0.0.2&xfwd=127.0.0.1&ua=Mozilla%2F5.0%20(Windows%20NT%206.1%3B%20WOW64)<br/>%20AppleWebKit%2F537.17%20(KHTML%2C%20like%20Gecko)%20Chrome%2F24.0.1312.57%20Safari%2F537.17&num=3&url=http%3A%2F%2Fexample.com%2Fsearch&ref=http%3A%2F%2Fwww.google.com&zip=92101


### Example Response:

Below are example responses in both formats, `JSON` and `XML`

#### JSON
`{
"meta":{
"keyword":"auto insurance",
"zip":92101
},
"count":1,
"ads":[
{
"title":"Get Insurance Quotes Today!",
"desc":"Take Advantage of our Discounts in CA - Safe Drivers can Save 45% or More. Get a Free Online Auto Insurance Quote in Minutes.",
"display_url":"www.AutoInsuranceQuotes.com",
"click_url":"http:\/\/tkmtrack.net\/rr\/http\/29.xb4ken.com%252Fmedia%252Fredir.php%253Fprof%253D48%2526camp%253D7071%2526affcode%253Dkw1538426%2526url%253Dhttp%25253A%25252F%25252Fm.xp1.ru4.com%25252Fsclick%25253F_o%25253D15719%252526_t%25253D50373160%252526ssv_knsh_tid%25253D_kenshoo_clickid_%252526ssv_knsh_agid%25253D25046%252526ssv_knsh_cid%25253D7071%252526ssv_knsh_crid",
"logo":"http:\/\/cpc-images.quick-cdn.com\/8d7c7a55059b5f930642f8509d28da2e.jpg",
"favicon":"http:\/\/cpc-images.quick-cdn.com\/8d7c7a55059b5f930642f8509d28da2e.jpg"
}
]
}`
