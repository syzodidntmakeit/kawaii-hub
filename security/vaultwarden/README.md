## 📁 Vaultwarden (Password Manager)

Vaultwarden is an unofficial, lightweight server implementation of the Bitwarden API. It provides a secure, self-hosted password manager that is fully compatible with all official Bitwarden client applications (browser extensions, desktop, and mobile apps).

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/vaultwarden) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs vaultwarden
````
or
```
docker ps
````
to see all the services running.
