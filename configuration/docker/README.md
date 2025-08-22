# Setting Up Docker on Arch Linux

This guide covers the installation and configuration of Docker and Docker Compose on a fresh Arch Linux server. This setup is the backbone of any modern self-hosting environment, allowing you to run applications in isolated containers, making them portable, secure, and incredibly easy to manage.

<img width="4440" height="1140" alt="images" src="https://github.com/user-attachments/assets/8b664ab6-7025-465e-a3f8-3739efef5938" />

## Part 1: Installing Docker Engine

First, we'll install the Docker engine itself, which is the core runtime that builds and runs containers.

1.  **Install the Docker Package:**
    The `docker` package is available in the official Arch repositories.
    ```bash
    sudo pacman -S docker
    ```

2.  **Start and Enable the Docker Service:**
    We need to start the Docker daemon and enable it to launch automatically every time you boot the server.
    ```bash
    sudo systemctl start docker.service
    sudo systemctl enable docker.service
    ```

3.  **Verify the Installation:**
    Run the classic "hello-world" container to make sure everything is working.
    ```bash
    sudo docker run hello-world
    ```
    If you see a "Hello from Docker!" message, you're good to go.

## Part 2: Post-Installation Steps (Don't Skip This!)

By default, you have to use `sudo` for every single Docker command, which is a massive pain in the ass. We're going to fix that by adding your user to the `docker` group.

1.  **Add Your User to the `docker` Group:**
    This command adds your current user (`kendrickLamar`) to the `docker` group, granting it permission to run Docker commands without `sudo`.
    ```bash
    sudo usermod -aG docker $USER
    ```

2.  **Apply the Group Changes:**
    This change won't take effect until you start a new session. The easiest way to do this is to simply **reboot the server**.
    ```bash
    sudo reboot
    ```
    After rebooting, log back in and test it by running `docker ps` without `sudo`. It should work without any permission errors.

## Part 3: Installing Docker Compose

Docker Compose is a tool for defining and running multi-container Docker applications. Instead of running a bunch of long `docker run` commands, you define all your services in a single `docker-compose.yml` file. This is how you'll manage 99% of your services.

1.  **Install the Docker Compose Package:**
    It's also in the official repositories.
    ```bash
    sudo pacman -S docker-compose
    ```

2.  **Verify the Installation:**
    Check the version to make sure it's installed correctly.
    ```bash
    docker-compose --version
    ```

## Part 4: Setting Up a Shared Network (Best Practice)

For your services to talk to each other using their container names (e.g., `bookstack` talking to `mariadb`), they need to be on the same Docker network. Creating a shared "bridge" network is the cleanest way to manage this.

1.  **Create the Network:**
    We'll create a network, just like in your current setup. You only need to do this once. Call it whatever you want.
    ```bash
    docker network create <docker-network>
    ```

2.  **Using the Network in Compose Files:**
    In every `docker-compose.yml` file you create, you'll reference this external network. This allows containers from different compose files (e.g., your media stack and your notes stack) to communicate with each other.

    Here's how you'd add it to the bottom of a `compose.yml` file:
    ```yaml
    networks:
      <docker-network>:
        external: true
    ```
    And for each service in that file, you'd add:
    ```yaml
    services:
      some-service:
        # ... other settings
        networks:
          - <docker-network>
    ```

## You're Ready to Go!

Your server is now fully equipped to run containerized applications. You can start creating directories for each of your services, adding a `docker-compose.yml` file to each one, and launching them with a simple `docker compose up -d`. Welcome to the world of clean, manageable self-hosting.
