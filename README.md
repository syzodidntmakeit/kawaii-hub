# ✨ Kawaii Server ✨
### I've always been interested in Cybersecurity, but my efforts were relenquished by Electronics Engineering. So I had to explore networking all alone. Besides, it was more fun this way. You could join me if you want. 😃

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

### [Arch](./configuration/arch) <img width="17" height="17" alt="image" src="https://github.com/user-attachments/assets/939bff59-1377-48a4-82d2-ab03e79b7608" />
- Super lightweight, unlike Windows, means it doesn't have unwanted applications running int he background and very responsives.
- Command Line Based. All of Linux can be used in CLI (command line interface) which removes any GUI (graphical user interface) and gives you full control. And trust, it's not overwhelming, you want control.
- Brag. "I use Arch Btw" is probably the most heard phrase in the Linux community. Superiority complex 🤷

### [Cloudflare](./configuration/cloudflare) ☁️🟠
We ❤️ Cloudflare. These are the people that use Lava Lamps for authentic RNG (random number generator) because computers are "not good enough". Legends. I bought a domain name kawaii-san.org and it makes this project significantly easier and more fun.
Reasons for domain:
- No need to remember individual IP web address for each services. (e.g. http://192.168.x.x:8080)
- SSL Certificates. The 's' in https stands for secure... or sugoi. Cloudflare offers free seurity for your domains.
- DNS Record manager. We need not use services like NPM (nginx proxy manager) to manage subdomains.

Cloudflare my pookie 😘

### [Docker](./configuration/docker) <img width="17" height="17" alt="png-clipart-docker-logo-thumbnail-tech-companies-thumbnail" src="https://github.com/user-attachments/assets/27466ede-e4bf-47b1-a574-f6607d4a0b26" />
If you hate dependency hell and love repeatable setups, Docker is your waifu.
- Run services in containers instead of VMs (virtual machines) or Bare-Metal
- Deployment based on updates. So we can implement new features without bringing the whole thing down and back up again.
- Extremely lightweight.
- Must have for self hosting. Everyone you know who self hosts is using docker.

### Ufw and Fail2ban
Is just a simple but effective way to protet yourself from attacks and malicious actors. I will not be showing how to set it up as it is very simple and quite personal.

## Services I will self host 🐱

### 🏠 Homepage
- **Custome** | I will be writing my own html code. This will house all my services into one page. Like a hub...

### 🗂 Personal Files
- **Nextcloud** | Google Drive sucks and I want to keep all my files to myself anyways. Google doesn't have to see my fanfiction of Rei Ayanami from Evangelion.
- **FileBrowser** | It's an absolute life saver for just having to copy and send files to and from the server in a web interface.
- **qBittorrent** | "Piracy" or whatever. If buying content isn't ownership, then torrenting isn't theft.

### 🎥 Media
- **Jellyfin** | Watch ALL the anime like a degenerate. And probably ogle at Rei Ayanami from Evangelion.
- **Navidrome** | I hate paying for music streaming. Shit quality, doesn't even have the content, doesn't pay artist. Pssh.
- **arr-stack** | A stack of *arr apps that I will explain in the [media](./media//README.md) section.

### 🔒 Security
- **Vaultwarden** | I ain't giving Google my passwords. And you want me to pay $60 a year just to host a 60kb pdf? I'll do it myself, thank you. Using bitwarden's architechure.
- **Whoogle** | The last brush stroke to a bigger picture. This is just a feature to my big plan of privacy. Search Google without being tracked.
- **ActualBudget** | Budget your finances, but in safe environment. I canNOT let anyone know I regularly have 96 cents in my bank account. 🥲
- **Gluetun** | Piracy is theft apperantly. And your ISP may throttle your connection if it knows what you're doing. So connect a VPN to your server like you a Sultan.

### 📊 Admin
- **Portainer** | Managing Docker containers and images. Shit **will** go wrong. And you will fix it.
- **Dashdot** | Web based monitoring. Just shows the utility of your compoments. Very handy
- **Uptime-Kuma** | Monitor your services. This is just a funny little green and red health bar for each services. It just makes sure it is all up and running.

### 🖋️ Productivity
- **Ollama + Open WebUI** | Local AI models and chatbot web interface.
- **Trilium** | Note-taking supporting markdown and plain text.
- **Memos** | Quick Notes for tasks.
- **Bookstack** | My OWN personal wiki that I can put in almost anything in pages and chapters. Or a *stack of books*.

## Alternative services I have decided to start using 🐈

### Mullvad Browser (Based on Tor Browser)
Who still uses Google Chrome? Now it's all about the Opera GX and the Firefox. Remember Edge? Me neither. Mullvad is **NOT** recommended for the average user, but it is **VERY** secure and safe. Which is what i want. Give up a little bit of convenience for full control of my data.

### Mullvad VPN ($7.48 a month)
NordVPN, SurfsharkVPN, ExpressVPN, ProtonVPN. All these services can't be trusted your data. "USE ME SO YOU CAN STAY SAFE" but it's just your data going to them instead of Big Tech Corps directly, which they sell to advertises... Which is exactly what Big Tech does anyways. It's a full circle. 
Mullvad, he don't give two shits. It is entirely open source and you are only paying for the servers instead. No premium plan. Just one price. Again, **NOT** recommended if you don't know what you're doing. But if you do, or you want to learn, this is probably the best 7 something dollars you will ever spend in the next 30 days. Trust me, bro.

### NewPipe (Mobile App)
YouTube is the biggest contentor for personal data. It knows you the best. So just... stop... NewPipe doesn't require sign ups. You just download and go. It's lightweight, and has similar features to YouTube premium. Yes. I have been wasting $8.98 a month for nothing.
Save your battery, save your data, save yourself from the algorithm. 

## Full collection

| **Number** | **Name** | **Domain** | **Function** |
| --- | --- | --- | --- |
| 00 | [Homepage](./homepage) 🏡 | [home](https://home.kawaii-san.org) | Homepage |
| 01 | [Vaultwarden](./security/vaultwarden) ⚙️ | [passwords](https://passwords.kawaii-san.org) | Manage Passwords |
| 02 | [Portainer](./admin/portainer) 🐋 | [docker](https://docker.kawaii-san.org) | Manage docker containers |
| 03 | [Prowlarr](./media/prowlarr) 🦁 | [prowlarr](https://prowlarr.kawaii-san.org) | Manages Indexers and Torrents |
| 04 | [Sonarr](./media/sonarr) 👧 | [anime](anime.kawaii-san.org) | Find anime (or any show you want) with ease |
| 05 | [qBittorrent](./personal-files/qbittorrent) 🐳 | [torrent](https://torrent.kawaii-san.org) | Torrent any content in the world |
| 06 | [Jellyfin](./media/jellyfin) :jellyfish: | [watch](https://watch.kawaii-san.org) | Watch Shows and Movies like it's on Netflix |
| 07 | [Radarr](./media/radarr) 📶 | [movies](https://movies.kawaii-san.org) | Find movies with ease |
| 08 | Not used | Not used | Not used |
| 09 | Not used | Not used | Not used |
| 10 | [Navidrome](./media/navidrome) 💽 | [music](https://music.kawaii-san.org) | Stream music as if Spotify is cattered to you |
| 11 | Not used | Not used | Not used |
| 12 | [Uptime Kuma](./admin/uptime-kuma) 🟢 | [kuma](https://kuma.kawaii-san.org) | Check the healths of servcies |
| 13 | [Dashdot](./admin/dashdot) 🔴 | [dash](https://dash.kawaii-san.org) | Monitor the server performance |
| 14 | [Filebrowser](./personal-files/filebrowser) 📁 | [files](https://files.kawaii-san.org) | Browse the server files over a webUI |
| 15 | [Trilium](./productivity/trilium) 📝 | [notes](https://notes.kawaii-san.org) | Note taking app that supports Markdown and other shit |
| 16 | [Whoogle](./security/whoogle) 🧒 | [search](https://search.kawaii-san.org) | Search Google without tracking |
| 17 | [AI Chatbot](./productivity/ollama-openwebui) 🤖 | [mypookie](https://mypookie.kawaii-san.org) | My own chatbot cattered to my needs |
| 18 | [Kiwix](./producitivy/kiwix) | [wiki](https://wiki.kawaii-san.org) | All the world's information in a thumbdrive |
| 19 | [Memos](./productivity/memos) 🗒️ | [memos](https://memeos.kawaii-san.org) | Note taking for the simple stuff |
| 20 | [Nextcloud](./personal-files.nextcloud) ☁️ | [cloud](https://cloud.kawaii-san.org) | Google Drive or Microsoft OneDrive but at home |
| 21 | [Bookstack](./productivity/bookstack) 📘 | [book](http://book.kawaii-san.org) | Personalized Wiki of your own thoughts |
| 22 | [ActualBudget](./security/actual-budget) 💵 | [budget](https://budget.kawaii-san.org) | Manage your finances on your own |
