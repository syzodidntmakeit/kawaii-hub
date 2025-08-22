## 📁 Dashdot (System Dashboard)

Dashdot is a modern, lightweight, and aesthetically pleasing server dashboard. It provides a simple, real-time view of your server's key metrics, such as CPU usage, memory, storage, and network information.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/dashdot) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs dashdot
````
or
```
docker ps
````
to see all the services running.
