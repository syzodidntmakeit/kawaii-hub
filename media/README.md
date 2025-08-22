# Pirate Softwares 🏴‍☠️

## My Stack
This is my personal, self-hosted media stack, an automated system designed to discover, download, and organize movies, TV shows, and music. As usual, all services are containerized using Docker and managed with Docker Compose.

### Function
1. **Request**: I make a request to watch a show. Let's say Bocchi the Rock!
2. **Search**: Sonarr (or raddar) would seek from big brother Prowlarr to search for the show acorss sources. (we can use mutliple sources)
3. **Torrent**: Prowlarr finds the show goes to the torrent service to *go get it*. So qBittorrent downloads Bocchi the Rock! from some random degen.
4. **Organize**: When it's finished, Sonarr (or radarr) will take the files from qBittorrent, says thank you (yes it actually does that), and saves it into a new folder that the Jellyfin service can read.
5. **Serve**: Jelelyfin scans the folder periodically and sees "WOWZERS! New show? Lemme display that!" And you can now stream Bocchi the Rock! from Jellyfin.

### Core Components

#### VPN and Download client
- **Gluetun**: A VPN client in a container. Its primary role is to provide a secure, private internet connection for other containers. All of qBittorrent's traffic is forced through Gluetun, ensuring that my download activity remains private and my IP address is masked.
- [**qBittorrent**](/personal-files/qbittorrent): The workhorse of the operation. This is the torrent client that handles the actual downloading of files. It's configured to run its network through the Gluetun container, making all downloads secure and anonymous. This is techincally a subject of Personal Files but it's main function is the heart of the automation of this media stack, thus I mentioned it here.

#### Indexer Management
- **Prowlarr**: This is the master indexer manager. Instead of manually adding torrent sites (indexers) to Sonarr, Radarr, and Lidarr individually, I add them all to Prowlarr. Prowlarr then syncs these indexers across all the other *arr apps, keeping everything centralized and easy to manage.

#### Content Automation (The RAWRs)
- **Sonarr** (for TV Shows): The automated TV show manager. It monitors for new episodes of my favorite shows. When a new episode is released, Sonarr tells Prowlarr to find it, sends it to qBittorrent for download, and then automatically renames and moves the file into my Jellyfin TV show library.
- **Radarr** (for Movies): The movie equivalent of Sonarr. I can add movies that I want to watch (either new releases or old classics), and Radarr will automatically search for high-quality versions, download them, and place them in my movie library.
- ❎ **Lidarr** (for Music): This does for music what Sonarr and Radarr do for video. It monitors artists for new album releases, automatically grabs them when available, and organizes them neatly for Navidrome to stream. I will not be using Lidarr. I will explain later.
- ❎ **Bazarr** (for Subtitles): This works alongside Sonarr and Radarr. It scans my movie and TV show library, identifies any content that's missing subtitles, and automatically downloads the correct subtitle files, ensuring a complete viewing experience. I will not be using Bazzar because I am not a cuck.

#### Media Servers
- Jellyfin: My personal, self-hosted streaming service for video content. It scans my movie and TV show libraries, pulls in metadata and artwork, and provides a beautiful, Netflix-like interface to watch my content on any device, from my phone to my TV.
- Navidrome: The music-focused counterpart to Jellyfin. It scans my music library, organizes everything by artist and album, and provides a clean, fast web player to stream my music collection anywhere. It's my personal Spotify, powered by my own files.

### Why no lidarr? 😦
Because. I enjoy the idea of searching for music. I like going to music distros and torrent files that provide me with music content. It's like going to a record store and flipping through vinyls, cassetes and CDs for that anything interesting. Or to find that ONE album you're been FIENDING to own. Automating it would mean losing on something I enjoy more than software and networking. Thus I will not be using Lidarr. I take my music a little bit too serioulsy. But fear not. If you want to host Lidarr, there are a lot of documentation on it and/or alternatives too.
