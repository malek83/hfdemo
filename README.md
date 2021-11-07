# H.F. Demo

The application entrypoint file is ```./bin/console``` (it's a php script)

## TL;DR

1. run script ```./run.sh``` build the docker setup
2. enter the hfdemo-php docker container ```docker exec -it hfdemo-php bash```
3. run the application: ```./bin/console read [FILENAME]``` where [FILENAME] is the source file i.e. 
 ```./bin/console read ./resources/sample.csv```

## Disclaimer

Some functionalites are simplified due to limited implementation time.