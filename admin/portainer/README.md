# 🛠 Portainer

This folder contains the **Portainer** setup.  
Portainer is a lightweight, web-based UI for managing Docker containers, images, networks, and volumes.

## 📜 Features
- **Web UI** – Manage containers, networks, images, and volumes without CLI.
- **Secure Access** – Runs behind reverse proxy with HTTPS.
- **Multi-Environment** – Supports local Docker, remote endpoints, and Swarm.
- **Persistent Data** – Configurations saved in `data/` directory.
- **One-Click Updates** – Easily pull new container versions.

## 🚀 Deployment

### 1️⃣ Prerequisites
- Docker + Docker Compose installed
- Reverse proxy configured with SSL (e.g., Traefik, Caddy, or Nginx)
- Domain or subdomain pointing to your server (e.g., `portainer.kawaii-san.org`)

---

### 2️⃣ Docker Compose
You can use this [docker compose](./docker-compose.yml)

### 3️⃣ Start
```bash
docker compose up -d
```

## 🔑 Access
- Frontend: `https://portainer.kawaii-san.org`
- Initial Setup: On first login, create an admin user and set a good password.
- Endpoints: Add the lcoal Docker or remote environments through the UI.

## 🛠 Maintenance
- Update:
```bash
docker compose pull
docker compose up -d
```
- Backup: Save the `data/` directory — it contains all configuration and endpoint data.

## 📚 References
- [Portainer Documentation](https://docs.portainer.io/)
- [Portainer on Docker Hub](https://hub.docker.com/r/portainer/portainer-ce)
