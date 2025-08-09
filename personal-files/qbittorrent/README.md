# 🦦 qBittorrent

Your lightweight, self-hosted torrent client — because you don’t need some bloated ass software to get your anime stash.

## 📜 Features
- **Lightweight & Efficient** — Runs smooth on your kawaii-rig without sucking resources  
- **Web UI** — Manage your torrents from anywhere with a slick browser interface  
- **Custom port** — Configurable to avoid conflicts and keep your network tidy  
- **Dockerized** — Easy to deploy and update with Docker & Docker Compose

## 🚀 Getting Started

### 1️⃣ Prerequisites
- Linux server (aka your kawaii-rig)  
- [Docker](https://docs.docker.com/get-docker/) & [Docker Compose](https://docs.docker.com/compose/install/) installed  
- Open port (default **8080**) for the web UI access  
- Storage space for downloaded files

### 2️⃣ Setup qBittorrent

- Use the provided [`docker-compose.yml`](docker-compose.yml) file for config  
- Create necessary folders for config and downloads:  
```bash
mkdir -p config downloads
```

### 3️⃣ Start
```bash
docker-compose up -d
```

## 🔑 Access
Get to `https://torrent.kawaii-san.org`
Defualt login is for Username is admin. For password, check here.
```bash
docker logs qbittorrent
```

## 🛠️ Maintenance
- **Update**:
```bash
docker-compose pull
docker-compose up -d
```
- **Backup**: Save your `config` folder to keep your settings and torrent list safe.

## 🦖 Pro Tips
- Map your download folder correctly to avoid permission hell
- Use VPN or proxy inside the container for privacy if you’re into that
- Automate your downloads with RSS feeds and filters inside qBittorrent
- Forward port 8080 if you want remote web UI access (but secure that shit!)

## 📚 Useful Links
- [qBittorrent Official](https://www.qbittorrent.org/)
- [Docker Hub: qBittorrent](https://hub.docker.com/r/linuxserver/qbittorrent) (if u boo-boo)
- [Docker Docs](https://docs.docker.com/)
