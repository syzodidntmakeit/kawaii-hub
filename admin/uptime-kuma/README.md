## 📁 Uptime Kuma (Service Monitor)

Uptime Kuma is a self-hosted, user-friendly monitoring tool. It allows you to monitor the uptime of your services (via HTTP/S, TCP, Ping, etc.) and provides a clean dashboard and public status pages to display their health.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/uptime-kuma) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs uptime-kuma
````
or
```
docker ps
````
to see all the services running.
