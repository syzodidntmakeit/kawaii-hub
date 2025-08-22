## 📁 qBittorrent (Download Client)

This is a self-hosted torrent client. In this setup, it's configured to run its network through the Gluetun VPN container for privacy and security. It handles all torrent downloads from the Arr services.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/gluetun) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs qbittorrent
````
or
```
docker ps
````
to see all the services running.
