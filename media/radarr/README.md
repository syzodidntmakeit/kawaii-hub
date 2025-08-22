## 📁 Radarr (Movie Automation)

Radarr is the movie counterpart to Sonarr. It automates the discovery, downloading, and organization of movies.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/radarr) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs radarr
````
or
```
docker ps
````
to see all the services running.
