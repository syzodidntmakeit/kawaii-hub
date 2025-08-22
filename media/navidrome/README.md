## 📁 Navidrome (Music Media Server)

Navidrome is a lightweight and fast music server. It scans your music collection and provides a clean web UI for streaming your music anywhere. It's the perfect self-hosted alternative to Spotify.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/navidrome) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs navidrome
````
or
```
docker ps
````
to see all the services running.
