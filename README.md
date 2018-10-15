# wrestler
wRESTler - REST client that will knock out a simple API

# Usage
rename `credentials.json.dist` to `credentials.json` and fill up authorization data\
Rest can be seen in codeception integration tests\

## New api calls:
* extend `AbstractApiCall` and for new model best implement also an abstract class providing response adapter for them all
* create a response to data adapter by extending `AbstractResponseToModelAdapter`

## Authorization
Can be extended by implementation of `AuthorizationInterface`
