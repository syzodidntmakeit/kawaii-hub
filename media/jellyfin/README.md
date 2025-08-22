## 📁 Jellyfin (Video Media Server)

Jellyfin is a free and open-source personal media server. It provides a beautiful, Netflix-like interface for streaming your movies and TV shows to any device on your network.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/jellyfin) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs jellyfin
````
or
```
docker ps
````
to see all the services running.
