# ✨ Kawaii-hub ✨
Homelabbing; the joys of self hosting and running my own websites all for free... or almost free.
Welcome to my kawaii self-hosting empire. Use this as your guide and inspiration if you wanna dive into the chaotic fun of running your own server

## PC Specs ⚡
- Ryzen 5 5600
- 16GB 3600MHz
- Rx 6600 8GB
- 1TB NVMe SSD

<img width="500" height="500" alt="pc-image" src="https://github.com/user-attachments/assets/5e2afcf8-e879-4085-b1ce-37e3cff49b3d" />

It's not perfect for running as a server but it's super overkill for what I want to do.

## Should you? 😕

Unless you're curious, wouldn't mind leaving your comfort and making mistakes, I wouldn't recommend doing this. 
If you want to host your own server, buy an old office PC; OptiPlex, Elitedesk, or you might even have one at home.

With this hobby, I learn how to use Arch Linux in CLI, how to manage services and look cool doing it. If this doesn't interest you, just watch a kid over the internet do it instead.

## Prerequisites 🏁

### Arch <img width="17" height="17" alt="image" src="https://github.com/user-attachments/assets/939bff59-1377-48a4-82d2-ab03e79b7608" />
- Super lightweight, unlike Windows, means it doesn't have unwanted applications running int he background and very responsives.
- Command Line Based. All of Linux can be used in CLI (command line interface) which removes any GUI (graphical user interface) and gives you full control. And trust, it's not overwhelming, you want control.
- Brag. "I use Arch Btw" is probably the most heard phrase in the Linux community. Superiority complex 🤷

### Tailscale <img width="17" height="17" alt="images" src="https://github.com/user-attachments/assets/de6c9047-6ff5-4444-b2d2-903aaeb671e8" />
Since both my home network is behind a CGNAT (yes. i have Starhub & ViewQuest for internet) I have to make my own mesh netowrk. Why?
- Bypass any other network limitation like CGNAT or DNS (domain name system) set by my ISP (internet service provider).
- My server isn't public meaning only devices within my mesh network can access my services.

### Cloudflare ☁️🟠
We ❤️ Cloudflare. These are the people that use Lava Lamps for authentic RNG (random number generator) because computers are "not good enough". Legends. I bought a domain name kawaii-san.org and it makes this project significantly easier and more fun.
Reasons for domain:
- No need to remember individual IP web address for each services. (e.g. http://192.168.x.x:8080)
- SSL Certificates. The 's' in https stands for secure... or sugoi. Cloudflare offers free seurity for your domains.
- DNS Record manager. We need not use services like NPM (nginx proxy manager) to manage subdomains.

Cloudflare my pookie 😘

### Docker <img width="17" height="17" alt="png-clipart-docker-logo-thumbnail-tech-companies-thumbnail" src="https://github.com/user-attachments/assets/27466ede-e4bf-47b1-a574-f6607d4a0b26" />
If you hate dependency hell and love repeatable setups, Docker is your waifu.
- Run services in containers instead of VMs (virtual machines) or Bare-Metal
- Deployment based on updates. So we can implement new features without bringing the whole thing down and back up again.
- Extremely lightweight.
- Must have for self hosting. Everyone you know who self hosts is using docker.

## Service 🐱

### 🏠 Homepage
- **Homer** | Houses all the subdomains in a simplle web UI. # Simpson

### 🗂 Personal Files
- **Nextcloud** | Full Google Drive/Docs/Calendar alternative.   
- **FileBrowser** | Web-based file manager for your server’s files.
- **qBittorrent** | Torrent files, download and seed locally.

### 🎥 Media
- **Jellyfin** | Open-source Netflix alternative.
- **Navidrome** | Spotify-like music streaming from your library.

### 🔒 Security & Privacy
- **Vaultwarden** | Already running for password management.
- **Whoogle** | Google without being tracked.

### 📊 Admin
- **Portainer** | Web GUI for managing Docker containers.
- **Netdata** | 	Real-time server monitoring.

### 🖋️ Productivity
- **Ollama + Open WebUI** | Local AI models and chatbot web interface.
- **Trilium** | Note-taking supporting markdown and plain text.

### Full collection

| **Number** | **Name** | **Domain** | **Function** |
| --- | --- | --- | --- |
| 00 | [Homer](/homer) 🏡                                     | [home](https://home.kawaii-san.org) | Homepage |
| 01 | [Vaultwarden](./security-and-privacy/vaultwarden) ⚙️   | [passwords](https://passwords.kawaii-san.org) | Password Manager |
| 02 | [Portainer](./admin/portainer) 🐳                      | [docker](https://docker.kawaii-san.org) | Docker Containers and Images Manager |
| 03 | [Nextcloud](./personal-files/nextcloud) ☁️             | [cloud](https://cloud.kawaii-san.org) | Cloud Storage |
| 04 | [Jellyfin](./media/jellyfin) 🪼                        | [anime](https://anime.kawaii-san.org) | Stream Anime |
| 05 | [Navidrome](/navidrome) 💽                             | [music](https://music.kawaii-san.org) | Stream Music |
| 06 | [Filebrowser](./personal-files/filebrowser) 📁         | [files](https://files.kawaii-san.org) | Browse Server Files |
| 07 | [qBittorrent](./personal-files/qbittorrent) 🔧         | [torrent](https://torrent.kawaii-san.org) | Download and Seed Files |
| 08 | [whoogle](./security-and-privacy/whoogle) <img width="20" height="20" alt="GoogleLogo" src="https://github.com/user-attachments/assets/632bd88b-fda1-4a87-be8b-52ef9a6008c8" /> | [search](https://search.kawaii-san.org) | Search Google without tracker |
| 09 | [netdata](./netdata) 🖥️                                | [monitor](https://monitor.kawaii-san.org) | Manage Server performance |
| 10 | [AI Chatbot](./ai-chatbot) 🤖                          | [mypookie](https://mypookie.kawaii-san.org) | AI Chatbot assisstant |
| 11 | [Trilium](./trilium) 📝                                | [notes](https://notes.kawaii-san.org) | Note Taking hierarchy supports Markdown |
| 12 | [Ghost](./blog) 👻                                     | [blog](https://blog.kawaii-san.org) | Blog |
