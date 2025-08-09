# 📂 FileBrowser

## Overview
FileBrowser is a web-based file manager that allows you to browse, upload, download, and manage files directly through your browser.  
In Kawaii Hub, FileBrowser is configured to give easy access to the `~/` directory so you can manage your server’s files without needing SSH.

## 🚀 Features
- Web-based file explorer
- Upload, download, rename, delete files
- Built-in text editor
- User authentication
- Simple permissions setup

## 🚀 Deployment

### 1️⃣ Prerequisites
- **Docker** and **Docker Compose** installed
- A subdomain (`files.kawaii-san.org`) pointing to the server
- Reverse proxy with SSL (Traefik, Caddy, or Nginx)

### 2️⃣ Docker Compose
Use the [docker compose](./docker-compose.yml) file.

### 3️⃣ Create config files
```bash
mkdir -p config database
chown -R 1000:1001 config database 
```
Or use this command to check your permissions:
```
id
```

### 4️⃣ Start
```bash
docker compose up -d
```

## 🔑 Access
- **Frontend**: `https://files.kawaii-san.org`
- **Initial Setup**: On first login, Username: `admin` and the password can be found at
```bash
docker logs filebrowser
```
## 🛠 Maintenance
- **Update**:
```bash
docker compose pull
docker compose up -d
```
