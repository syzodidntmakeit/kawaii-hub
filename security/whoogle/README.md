## 📁 Whoogle (Private Search Engine)

Whoogle is a self-hosted, privacy-respecting metasearch engine. It fetches Google search results on your behalf, but without the ads, trackers, and IP address logging. It's a simple way to get the power of Google Search while keeping your privacy intact.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/whoogle) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs whoogle
````
or
```
docker ps
````
to see all the services running.
