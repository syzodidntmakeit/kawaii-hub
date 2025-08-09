# 🛡️ Vaultwarden — Kawaii Hub Self-Hosted Password Manager

This folder contains the **Vaultwarden** setup for the Kawaii Hub infrastructure.  
Vaultwarden is a lightweight, self-hosted password manager compatible with all official Bitwarden clients.  
It’s deployed here using Docker for easy management and updates.

## 📜 Features
- **Bitwarden-compatible API** – Works with browser extensions, mobile apps, and desktop clients.
- **Lightweight** – Written in Rust, uses less resources than the official Bitwarden server.
- **Secure** – End-to-end encrypted password storage.
- **Custom domain** – Served at `https://password.kawaii-san.org`.
- **Reverse proxy ready** – Works behind Traefik, Caddy, or Nginx with HTTPS.

## 🚀 Deployment

### 1️⃣ Prerequisites
- **Docker** and **Docker Compose** installed
- A domain/subdomain (`password.kawaii-san.org`) pointing to your server
- Reverse proxy with SSL (Traefik, Caddy, or Nginx)

### 2️⃣ Environment Setup
Create an `.env` file (optional) for custom variables:
```env
ADMIN_TOKEN=supersecretadmintoken
```
### 2️⃣ Docker Compose
You can use the [docker compose](./docker-compose.yml)
