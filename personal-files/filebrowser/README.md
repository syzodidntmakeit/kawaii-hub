## 📁 Filebrowser (Web File Manager)

Filebrowser is a simple and lightweight web-based file manager. It lets you browse, manage, and share files on your server directly from a web browser. It's perfect for when you need quick access to your files without firing up an SSH session.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/filebrowser) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs filebrowser
````
or
```
docker ps
````
to see all the services running.
