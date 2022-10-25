# Blackfire sandbox for API Platform

This repository holds several pre-configured API Platform distributions ready for production and to be benchmarked with Blackfire.

## How to

Go to the directory of your choice, add your resources and test files then use something like this to start API Platform in production mode:

```
APP_SECRET=averysecret CADDY_MERCURE_JWT_SECRET=averylongkeythatlikescowmilk POSTGRES_PASSWORD=123456 docker compose -f docker-compose.yml -f docker-compose.prod.yml up
```

Note that you'll also need to configure the Blackfire environment variables.
Because OPCache preload is activated, if you want to update the changes of your code you'll need to:

```
docker composer restart php
```
