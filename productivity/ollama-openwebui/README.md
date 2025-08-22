## 📁 Ollama + Open WebUI (Local AI Chat)

This stack runs a local AI model server (Ollama) and provides a beautiful, feature-rich web interface (Open WebUI) to interact with it. It allows you to run powerful language models like Llama 3 and Mistral completely on your own hardware.

### Configuration
Save the [docker-compose](./docker-compose.yml) file in your directory (e.g. ~/ollama-openwebui) and change the settings.

### Quick Start
To laumch this container, run this in the directory:
```
docker compose up -d
```

### Maintain
To check if the service is actually running, do this:
```
docker logs openwebui && docker logs ollama
````
or
```
docker ps
````
to see all the services running.


### Post-Install
Once all is setup, run:
```
docker exec -it ollama ollama run mistral
