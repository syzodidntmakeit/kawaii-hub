# 🪼 Jellyfin

Welcome to **Kawaii-Hub** — your personal homelab playground for self-hosting all things cute, nerdy, and anime-themed.  
From streaming your anime stash with Jellyfin to managing containers with Portainer, this repo helps you run your own kawaii kingdom. 🦖 rawr!

## 📜 Features
- **Netflix** - Your open-source Netflix for anime, movies, and music
- **Lightweight** – Written in Rust, uses less resources than the official Bitwarden server.
- **Custom domain** – Served at https://anime.kawaii-san.org.
- **Reverse proxy ready** – Works behind Traefik, Caddy, or Nginx with HTTPS.

## 🚀 Getting Started

### 1️⃣ Prerequisites
- Linux server (your kawaii-rig, of course)  
- [Docker](https://docs.docker.com/get-docker/) & [Docker Compose](https://docs.docker.com/compose/install/) installed  
- Storage space for your media  
- Ports 9004 (Jellyfin HTTP) open — 8920 if you wanna SSL it  

### 2️⃣ Setup Jellyfin
- use this [docker compose](docker-compose.yml) file for config.
- create Jellyfin folders:
```bash
mkdir -p config cache media
```
### 4️⃣ Start it up
```bash
docker-compose up -d
```

## 🔑 Access
Visit the `https://anime.kawaii-san.org` and setup your admin account.

## 🛠️ Maintenance
- **Update**:
```bash
docker-compose pull
docker-compose up -d
```
- **Backup**: Backup your `config` folder to save watch history * settings

## 🦖 Pro Tips
- Set proper permissions on your media folder so Jellyfin can read your anime
- Use a reverse proxy like Nginx or Caddy for SSL & nicer URLs
- Forward ports on your router if you want remote access (be careful with security!)
- Automate metadata scraping with plugins inside Jellyfin for max anime vibes

## 📚 Useful Links
- [Jellyfin Official](https://jellyfin.org/)
- [Docker Docs](https://docs.docker.com/)
- [Nginx Proxy Manager](https://nginxproxymanager.com/) for easy SSL reverse proxy
