## 📁 Actual Budget (Personal Finance Manager)

Actual Budget is a self-hosted, local-first personal finance application. It's designed for privacy and long-term data ownership, providing a powerful and flexible way to manage your budget without relying on a cloud service.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/actualbudget) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs actualbudget
````
or
```
docker ps
````
to see all the services running.
