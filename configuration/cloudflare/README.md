# Setting Up a Cloudflare Tunnel on Arch
This guide will walk you through setting up `cloudflared`, the Cloudflare Tunnel daemon, on a headless Arch Linux server. This allows you to securely expose your self-hosted services (like Jellyfin, Nextcloud, etc.) to the internet without opening any ports on your home router.

It's more secure, easier to manage than a traditional reverse proxy, and gives you free, automatically renewing SSL certificates.

<img width="1200" height="397" alt="Cloudflare_Logo svg" src="https://github.com/user-attachments/assets/9a6acb37-8a84-4f37-90f9-fcfd194a2d55" />

## Part 0: Prerequisites
Before you start, make sure you have the following:
1. **A Cloudflare Account**: It's free. Sign up at [cloudflare.com](https://www.cloudflare.com/).
2. **A Domain Name**: You need to own a domain (e.g., `kawaii-san.org`). You don't have to buy it through Cloudflare, but you must change its nameservers to point to Cloudflare. They guide you through this when you add a site to your account.
3. **A Working Arch Linux Server**: This guide assumes you have a server up and running with your Docker services already configured.

## Part 1: Cloudflare Dashboard Setup
First, we need to create the tunnel on the Cloudflare side.
1. **Log in to Cloudflare**: Go to your dashboard.
2. **Navigate to Zero Trust**: On the left-hand sidebar, find and click on the Zero Trust link. You might have to do a quick one-time setup for the free plan if you've never used it.
3. **Create the Tunnel**:
   - In the Zero Trust dashboard, go to Access -> Tunnels.
   - Click **Create a tunnel**.
   - Choose **Cloudflared** as the connector type and click Next.
   - Give your tunnel a name (e.g., `arch-server`) and click **Save tunnel**.
4. **Get Your Token**:
   - You'll now be on a page asking you to install the connector. Choose **Debian** as the OS and 64-bit as the architecture.
   - **DO NOT** run the command it shows you. We only need the token from it. The command will look something like this:
     ```
     sudo cloudflared service install a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6
     ```
   - Copy that long string of random characters (`a1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6`). That's your tunnel token. Save it somewhere safe for the next part.
   - Click **Next**. You can skip the Public Hostname configuration for now; we'll do that in a file later.
  
## Part 2: Server-Side Setup (`cloudflared Daemon)
Now, let's install and configure the cloudflared daemon on your Arch server.
1. **Install** `cloudflared`:
   It's available in the official Arch repositories.
   ```
   sudo pacman -S cloudflared
   ```
2. **Authenticate the Daemon**:
   Run the following command. It will prompt you to open a URL in your browser, where you'll log in to Cloudflare and authorize the tunnel you just created.
   ```
   cloudflared tunnel login
   ```
   After you authorize it, it will download a cert.pem file to ~/.cloudflared/.
3. **Create the Tunnel Configuration Directory**:
   The cloudflared service runs as a specific user, so we need to put its configuration files in a place it can access.
   ```
   sudo mkdir /etc/cloudflared
   ```
4. **Move the Certificate**:
   Move the certificate file you just downloaded into the new directory.
   ```
   sudo mv ~/.cloudflared/cert.pem /etc/cloudflared/
   ```

## Part 3: The `config.yml` File
This is where the magic happens. We'll create a single file that tells the tunnel how to route traffic from your public hostnames to your local Docker services.
1. **Create the Config File**:
   ```
   sudo nano /etc/cloudflared/config.yml
   ```
2. **Populate the Config**:
   Paste the following into the file. This is a template based on your setup. You can add, remove, or change any of the services.
   ```
   # The UUID of your tunnel. You can find this on the Cloudflare dashboard.
   tunnel: 4a6adaa7-1d9b-4666-b91c-738c833902f8
   # The path to the certificate file you moved earlier.
   credentials-file: /etc/cloudflared/4a6adaa7-1d9b-4666-b91c-738c833902f8.json

   # This is where you define your public hostnames and where they point.
   ingress:
     # Rule 1: Homepage
      - hostname: home.kawaii-san.org
        service: http://localhost:8080

      # Rule 2: Vaultwarden
      - hostname: passwords.kawaii-san.org
        service: http://localhost:9001

      # Rule 3: Jellyfin
      - hostname: watch.kawaii-san.org
        service: http://localhost:9006

      # Add all your other services here following the same pattern...
      # - hostname: service-name.kawaii-san.org
      #   service: http://localhost:<port>

      # This is a catch-all rule. Any traffic that doesn't match a hostname
      # above will get a 404 error. This is required to be the last rule.
      - service: http_status:404
   - `tunnel`: The UUID of your tunnel. You can find this on the Cloudflare Tunnels dashboard.
   - `credentials-file`: The path to a JSON file containing your tunnel's credentials. You'll create this in the next step.
   - `ingress`: This is the list of rules. Each rule maps a public `hostname` to a local `service`. Since your Docker containers expose ports to `localhost`, you just point the tunnel to `http://localhost:<port>`.
3. **Create the Credentials File**:
   Run the following command, replacing `<Tunnel-Name>` with the name you gave your tunnel in the Cloudflare dashboard (e.g., `arch-server`).
   ```
   cloudflared tunnel token --cred-file /etc/cloudflared/<your-tunnel-uuid>.json <Tunnel-Name>
   ```
   This will generate the JSON credentials file that your `config.yml` is pointing to.

## Part 4: Running as a Service
Finally, let's enable `cloudflared` to run as a `systemd` service so it starts automatically on boot.
1. **Enable the Service**:
   ```
   sudo systemctl enable --now cloudflared
   ```
2. **Check the Status**:
   Verify that it's running without errors.
   ```
   sudo systemctl status cloudflared
   ```
   If it's `active (running)`, you're done!
3. **Check the Logs (for troubleshooting)**:
   If something goes wrong, the logs are your best friend.
   ```
   sudo journalctl -u cloudflared -f
   ```
## You're Live!
That's it. Your services should now be accessible via their public `https://` URLs. Cloudflare is handling all the routing and SSL for you, and your server has zero open ports to the outside world.
