# Using the API
Before getting started, be sure to follow the instructions in the
[INSTALL.md](INSTALL.md) file.

## Making Requests
There are 3 ways to get information out of the API.

### Navigate to it
You can navigate to GeoIP directly assuming you have a "public" ip address
and a JSON object will be returned containing the geo-location data for 
your public IP.

*Because GeoIP doesn't have information about IP addresses in reserved
subnets, it can't determine your location based on private IPs including
localhost.*

### HTTP POST
Make a POST request to `/` containing one field only:

    `'ip' => 'x.x.x.x'`

Again, GeoIP will return a JSON object containing geo-location data.

### HTTP GET
Send a request to `/index.php?ip=x.x.x.x` and the same JSON object will
be returned.

## Errors
When a request is made using an invalid IP address, the following response
is returned:
```
HTTP/1.0 400 Bad Request
```

```json
{
    "error": true,
    "errorDetail": "invalid or no ip address given" 
}
```

## Sample Response
```
GET /index.php?ip=8.8.8.8 HTTP/1.0
```

```json
{
    "continentName": "North America",
    "countryIsoCode": "US",
    "countryName": "United States",
    "mostSpecificSubdivisionIsoCode": "CA",
    "mostSpecificSubdivisionName": "California",
    "cityName": "Mountain View",
    "postalCode": null,
    "metroCode": 807,
    "latitude": 37.386,
    "longitude": -122.0838,
    "timeZone": "America\/Los_Angeles",
    "query" : {
        "ip": "8.8.8.8",
        "queryMethod": "get"
    }
}
```
