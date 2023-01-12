# ColoCount

#### To run our application on your computer, you need to have the following instructions:

```shell
git clone https://github.com/Hundraw/colocount.git
```
### Development
___
#### Run the development server:
```shell
cd bin/
./deploy.sh dev up
```
or
```shell
sudo docker compose -f docker-compose.yml -f docker-compose.dev.yml up
```

#### Stop the development server:
```shell
cd bin/
./deploy.sh dev down
```

or
```shell
sudo docker compose -f docker-compose.yml -f docker-compose.dev.yml down
```

### Production
___
#### Run the production server:
```shell
cd bin/
./deploy.sh prod up
```
or
```shell
sudo docker compose -f docker-compose.yml -f docker-compose.prod.yml up
```

#### Stop the production server:
```shell
cd bin/
./deploy.sh prod up
```

or
```shell
sudo docker compose -f docker-compose.yml -f docker-compose.prod.yml down
```
