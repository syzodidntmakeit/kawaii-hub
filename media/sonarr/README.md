## 📁 Sonarr (TV Show Automation)

Sonarr is an automated TV show manager. It monitors for new episodes of your favorite shows, hands off download requests to qBittorrent, and then automatically renames and sorts the files into your media library.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/sonarr) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs sonarr
````
or
```
docker ps
````
to see all the services running.
