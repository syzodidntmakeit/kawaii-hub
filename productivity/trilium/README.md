## 📁 Trilium Notes (Hierarchical Note-Taking)

Trilium is a hierarchical note-taking application focused on building a personal knowledge base. It's packed with features like rich text editing, diagrams, and relation maps to organize your thoughts and information.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/trilium) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs trilium
````
or
```
docker ps
````
to see all the services running.
