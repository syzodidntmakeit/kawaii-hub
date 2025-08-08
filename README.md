# kawaiisan/homelab — Personal Self‑Hosted Stack

> **Owner:** Syzo (a.k.a. kawaiisan)

> *Short version:* I turned my gaming PC into a headless homelab that hosts my own cloud, media, music, file manager, torrent client and password vault — private AF, entirely self‑hosted, and controlled with Docker + Cloudflare Tunnel + Tailscale. This repo documents the setup, architecture, and the exact commands you need to replicate it.

---

## Why I built this

I’m a broke-ass student who likes video games, anime and HipHop, but I refuse to trust big tech with my shit. I wanted a setup that:

* *Actually works* (no fragged tutorials).
* Is **easy to maintain** — separate compose files for each service so I can update or reboot one thing without nuking everything.
* Lets me stream my anime & music, manage files, sync notes, and store passwords privately.
* Runs on my gaming PC (Ryzen 5 5600, 16GB RAM, RX 6600, 1TB NVMe, Arch Linux — headless).

Result: Vaultwarden, Nextcloud, Jellyfin, Navidrome, FileBrowser and qBittorrent, all deployed via Docker and exposed securely with Cloudflare Tunnel and Tailscale.

---

## What’s included (the stack)

* **Nextcloud** — personal cloud + WebDAV for syncing (Joplin, phone clients, files)
* **Vaultwarden** — self-hosted Bitwarden alternative for passwords
* **Jellyfin** — media server for anime/movies
* **Navidrome** — lightweight music streaming server
* **FileBrowser** — web file manager to upload/download/manage files
* **qBittorrent** — manual torrenting (upload .torrent files via web UI)
* **Cloudflared (Cloudflare Tunnel)** — zero-port-forwarding secure tunnel + DNS
* **Tailscale** — peer-to-peer mesh networking (+ optional MagicDNS)
* **Portainer / Watchtower / Uptime Kuma** (optional) — management & monitoring utilities

---

## Repo layout (suggested files for your GitHub)

```
README.md                       # this file
docs/                           # optional: diagrams, screenshots, how-tos
compose/                         # single place for per-service compose snippets (not the running files)
  jellyfin/docker-compose.yml
  qbittorrent/docker-compose.yml
  nextcloud/docker-compose.yml
  navidrome/docker-compose.yml
  filebrowser/docker-compose.yml
  vaultwarden/docker-compose.yml
scripts/
  backup_nextcloud.sh
  restore_nextcloud.sh
  sync_media.sh
LICENSE
CONTRIBUTING.md
```

> Note: I keep *actual* running compose files in `~/service` on my server (e.g. `~/nextcloud/docker-compose.yml`). This repo documents patterns, examples and the exact commands I ran.

---

## Architecture & Design Choices

* **Per-service compose files** — every service lives in `~/<service>` on the server. This keeps things modular and reduces blast radius for updates.
* **Bind mounts to absolute paths** — use `/home/<user>/<service>/...` so Docker volumes are explicit and easy to backup.
* **Cloudflare Tunnel** for public exposure — simpler than dealing with ISP CGNAT / router ports and provides TLS.
* **Tailscale** for private remote admin access (SSH + internal services) — convenient for maintenance when Cloudflare is down or misbehaving.
* **No Nginx proxy** — Cloudflared handles ingress. If you prefer a local proxy (and want fine-grained control), replace Cloudflared with Traefik or Nginx as a reverse proxy.

---

## Quickstart — replicate my setup (TL;DR)

> These are the exact commands I use on **Arch Linux**. Replace `kawaiisan` with your username.

```bash
# prepare service folders
mkdir -p ~/nextcloud/html ~/nextcloud/data
mkdir -p ~/vaultwarden/vw-data
mkdir -p ~/jellyfin/config ~/jellyfin/cache
mkdir -p ~/navidrome/data
mkdir -p ~/filebrowser/config ~/filebrowser/data
mkdir -p ~/qbittorrent/config ~/media/anime ~/media/downloads

# set ownership to your UID:GID (check with `id`)
sudo chown -R 1000:1000 ~/{nextcloud,vaultwarden,jellyfin,navidrome,filebrowser,qbittorrent,media}

# install Docker + docker-compose
sudo pacman -Syu docker docker-compose
sudo systemctl enable --now docker

# test
docker run hello-world
```

Then add each service's `docker-compose.yml` to `~/nextcloud`, `~/vaultwarden`, etc., and run them individually:

```bash
cd ~/vaultwarden && docker compose up -d
cd ~/jellyfin && docker compose up -d
# etc
```

Add Cloudflare Tunnel ingress routes (see `docs/cloudflared-config.example.yml`) and create matching CNAMEs for `passwords.kawaii-san.org`, `cloud.kawaii-san.org`, `anime.kawaii-san.org`, etc.

---

## Example Cloudflared ingress (drop into `/etc/cloudflared/config.yml` or `~/.cloudflared/config.yml`)

```yaml
ingress:
  - hostname: cloud.kawaii-san.org
    service: http://localhost:9002 # Nextcloud
  - hostname: passwords.kawaii-san.org
    service: http://localhost:8222 # Vaultwarden
  - hostname: anime.kawaii-san.org
    service: http://localhost:9005 # Jellyfin
  - hostname: music.kawaii-san.org
    service: http://localhost:4533 # Navidrome
  - hostname: files.kawaii-san.org
    service: http://localhost:9004 # FileBrowser
  - service: http_status:404
```

After editing, restart the Cloudflared service:

```bash
sudo systemctl restart cloudflared
```

And create CNAME records in Cloudflare DNS pointing to your tunnel’s `*.cfargotunnel.com` name.

---

## Security & Backups (don’t be lazy)

* **Vaultwarden**: enable an `ADMIN_TOKEN` env var and backup the `vw-data` folder frequently.
* **Nextcloud**: daily rsync backups of `~/nextcloud/data` + daily DB dumps of MariaDB/Postgres. Use `cron` or systemd timers.
* **Secrets**: keep your keys and tokens out of Git. Use `.env` files on the server and never push them to GitHub.
* **Automatic updates**: `watchtower` can auto-update containers, but I run updates manually to avoid unexpected breakage.

Example backup script (very simple):

```bash
#!/bin/bash
DATE=$(date +%F)
DEST=~/backups/nextcloud/$DATE
mkdir -p "$DEST"
rsync -a --delete ~/nextcloud/data "$DEST/data"
docker exec nextcloud_db mariadb-dump -unextcloud -psupersecret nextcloud > "$DEST/db.sql"
# Keep 7 days
find ~/backups/nextcloud -type d -mtime +7 -exec rm -rf {} \;
```

---

## Notes about running on Arch + AMD GPU (for AI or transcoding later)

* I run **Arch** for full control, but ROCm (AMD GPU acceleration) can be finicky on Arch. For GPU transcoding or LLM inference, consider switching to an Ubuntu LTS VM or dedicated distro for the GPU workload if you hit driver issues.
* For Jellyfin hardware transcoding with AMD, look into VA-API on Linux — sometimes easier than wrestling ROCm.

---

## Day‑to‑day ops and tips

* Keep containers modular — when something dies, `cd ~/thatservice && docker compose up -d` fixes 90% of shit.
* Use `docker logs -f <container>` to tail errors. `docker exec -it <container> sh` or `bash` lets you poke around.
* If Cloudflared refuses to run as a service: copy your `~/.cloudflared/config.yml` and `*.json` creds to `/etc/cloudflared/` and run `sudo cloudflared service install`.

---

## Example `docker-compose.yml` snippets

> I keep full compose files per service in the repo `compose/` folder *as examples*. Below are minimal snippets — adapt to your needs and add env vars / volumes as required.

**Vaultwarden (minimal)**

```yaml
services:
  vaultwarden:
    image: vaultwarden/server:latest
    restart: unless-stopped
    volumes:
      - ./vw-data:/data
    environment:
      - WEBSOCKET_ENABLED=true
    ports:
      - 8222:80
```

**Jellyfin (minimal)**

```yaml
services:
  jellyfin:
    image: lscr.io/linuxserver/jellyfin:latest
    restart: unless-stopped
    environment:
      - PUID=1000
      - PGID=1000
    volumes:
      - ./config:/config
      - /home/kawaiisan/media/anime:/media
    ports:
      - 9005:8096
```

**qBittorrent (minimal)**

```yaml
services:
  qbittorrent:
    image: lscr.io/linuxserver/qbittorrent:latest
    restart: unless-stopped
    environment:
      - PUID=1000
      - PGID=1000
      - WEBUI_PORT=8080
    volumes:
      - ./config:/config
      - /home/kawaiisan/media/downloads:/downloads
    ports:
      - 9006:8080
      - 6881:6881
      - 6881:6881/udp
```

---

## What I learned (so you don’t repeat my mistakes)

* **Keep config & data separate** from the app code (`/var/www/html` vs `/var/www/html/data`) — Nextcloud hates being installed into a single bind mount.
* **Fix permissions early**: `sudo chown -R 1000:1000 <service-folders>` is your friend.
* **Cloudflared** wants root-level config for `service install` — copy `~/.cloudflared/config.yml` into `/etc/cloudflared` before installing the systemd service.
* **Test each service locally** before exposing publicly through Cloudflare.

---

## Screenshots / demo (optional)

Drop screenshots into `/docs/screenshots/` and reference them in the README for a pretty portfolio page.

---

## License

MIT — do whatever, just don’t be a dick.

---

## Contact / Credits

Built by **Syzo** (kawaiisan). Hit me up if you want the full server snapshot or a custom compose bundle for your own homelab.

---

Fancy a PR that adds your own service or a prettier architecture diagram? I’ll review and roast your YAML gently.

Peace, and may your server be
