## 📁 Portainer (Docker UI Manager)

Portainer is a powerful, lightweight management UI that allows you to easily manage your Docker environments. It provides a detailed overview of your containers, images, volumes, and networks, and lets you manage them without needing to use the command line.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/portainer) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs portainer
````
or
```
docker ps
````
to see all the services running.
