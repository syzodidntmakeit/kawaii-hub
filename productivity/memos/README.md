## 📁 Memos (Quick Notes & Knowledge Base)

Memos is a lightweight, self-hosted note-taking service. It's designed for capturing fleeting thoughts and ideas quickly, with a simple and clean interface. Think of it as a private, self-hosted version of Twitter or a digital sticky-note board.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/memos) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs memos
````
or
```
docker ps
````
to see all the services running.
