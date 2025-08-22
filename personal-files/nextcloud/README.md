## 📁 Nextcloud (Personal Cloud Storage)
Nextcloud is a self-hosted productivity platform, similar to Google Drive or Dropbox. It allows you to store and sync your files, calendars, contacts, and more, all from your own server.

This setup includes three services:
- Nextcloud App: The Main web app.
- Postgres DB: The database used to store all of Nextcloud's metadata.
- Redis: A high-speed cache to improve the performance and responsiveness of the web UI.

### Configuraton
Use the [docker compose](./docker-compose.yml) file and configure your won settings and save it to the directory. (e.g. ~/nextcloud)

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs nextcloud
````
or
```
docker ps
````
to see all the services running.
