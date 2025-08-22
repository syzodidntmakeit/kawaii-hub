## 📁 Gluetun (VPN Client)

This container acts as a powerful, lightweight VPN client. Its primary purpose is to provide a secure network for other containers, such as qBittorrent, ensuring all traffic is routed through a private VPN connection.

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
docker logs gluetun
````
or
```
docker ps
````
to see all the services running.
