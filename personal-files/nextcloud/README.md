# ☁️ Nextcloud

This folder contains the **Nextcloud** setup.  
Nextcloud is a self-hosted, open-source platform for file syncing, sharing, and collaboration.

## 📜 Features
- **File Storage & Sync** – Access files from any device.
- **Collaboration Tools** – Built-in calendar, contacts, and document editing.
- **Privacy First** – All data stored on our own server.
- **App Ecosystem** – Extend with plugins for music, notes, kanban boards, and more.
- **End-to-End Encryption** – Secure file sharing.

## 🚀 Deployment

### 1️⃣ Prerequisites
- Docker + Docker Compose installed
- Reverse proxy with SSL (e.g., Traefik, Caddy, or Nginx)
- Database (MariaDB recommended)
- Domain or subdomain pointing to your server (e.g., `cloud.kawaii-san.org`)

---

### 2️⃣ Docker Compose
You can use the [docker compose](./docker-compose.yml) file.

### 3️⃣ Start
```bash
docker compose up -d
```

## 🔑 Access
- **Frontend**: `https://cloud.kawaii-san.org`
- **Initial Setup**: On first login, create an admin account and configure storage/database connection.

## 🛠 Maintenance
- **Update**:
```bash
docker compose pull
docker compose up -d
```
- **Backup**: Save both the `data/` and `db/` directories - they contain all files and database data.

## 📚 References
- [Nextcloud Documentation](https://docs.nextcloud.com/)
- [Nextcloud on Docker Hub](https://hub.docker.com/_/nextcloud)
