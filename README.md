# Fast-food restaurant management system website using PHP with MVC architecture

# Usage

## Start services
```
docker-compose up -d
```
You should be able to access websites at **localhost:6969**

## Stop services
```
docker-compose down
```

## Reset database according to sql file
```
docker-compose down -v
docker-compose build
docker-compose up
```