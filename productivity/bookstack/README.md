## 📁 BookStack (Documentation & Wiki)

BookStack is a simple and easy-to-use platform for organizing and storing information. It's like a personal or collaborative wiki, structured in a familiar book/chapter/page format, making it great for documentation, guides, and storing knowledge.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/bookstack) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs bookstack
````
or
```
docker ps
````
to see all the services running.
