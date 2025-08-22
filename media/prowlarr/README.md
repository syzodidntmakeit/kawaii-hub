## 📁 Prowlarr (Indexer Manager)

Prowlarr acts as the central hub for all your torrent indexers (search sites). It manages them in one place and then syncs them automatically to your other Arr applications.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/prowlarr) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs prowlarr
````
or
```
docker ps
````
to see all the services running.
