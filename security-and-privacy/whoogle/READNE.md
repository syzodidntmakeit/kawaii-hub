# 🔍 Whoogle — Kawaii Hub Private Search

This folder contains the **Whoogle Search** setup. 
Whoogle is a self-hosted, privacy-friendly front-end for Google Search — ad-free, JavaScript-light, and no tracking.

## 📜 Features
- **Private** – No logs, no tracking, no ads.
- **Google results** – Without Google seeing you.
- **Customizable** – Dark mode, safe search, language filtering.
- **Password protected** – Admin login required.
- **Reverse proxy ready** – Served at `https://search.kawaii-san.org`.

## 🚀 Deployment

### 1️⃣ Prerequisites
- Docker + Docker Compose
- Domain/subdomain pointing to the server (`search.kawaii-san.org`)
- Reverse proxy with SSL (Traefik, Caddy, Nginx)

### 2️⃣ Environment Variables
| Variable | Description | Example |
|----------|-------------|---------|
| `WHOOGLE_USER` | Username for login | `admin` |
| `WHOOGLE_PASS` | Password for login | `supersecurepassword` |
| `WHOOGLE_CONFIG_COUNTRY` | Country code | `SG` |
| `WHOOGLE_CONFIG_LANGUAGE` | Language code | `lang_en` |
| `WHOOGLE_CONFIG_SAFE` | Safe search level (0-2) | `1` |
| `WHOOGLE_CONFIG_THEME` | UI theme | `system` |

### 3️⃣ Docker Compose
You can use the [docker compose](./docker-compose.yml) file.

### 4️⃣ Start
```bash
docker compose up -d
```

## 🔑 Access
- Frontend: `https://search.kawaii-san.org`
- Login: Use the credentials in your env variables.

## 🛠️ Maintenance
- Update:
```bash
docker compose pull
docker compose up -d
```
- Backup:
Save the `data/` direcctory.

## 📚 References
- [Whoogle GitHub](https://github.com/benbusby/whoogle-search)
- [Caddy Web Server](https://caddyserver.com)
