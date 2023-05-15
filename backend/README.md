Backend based on Slim Framework
-------
Needed tools:
- Docker
- make

Application execution:
1. Build application command: `make build`
2. Run application command: `make start`
3. Open http://localhost:8080/geoip/city?ip=8.8.8.8. If the application runs successfully you will see:
```
{
    "statusCode": 200,
    "data": {
        "countryCode": "US",
        "postalCode": "90009",
        "cityName": "Los Angeles",
        "timeZone": "America\/Los_Angeles",
        "accuracyRadius": 5
    }
}
```
4. Run `make stop` to stop the Docker container