# Use the official PHP image with FPM and Nginx
FROM trafex/php-nginx:latest

# Temporarily switch to the root user to install packages
USER root

# Install essential PHP extensions for making API calls
RUN apk --no-cache add php-curl php-json

# Switch back to the default non-root user for security
USER www-data

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your website files into the container
# This copies index.html, health.php, and the assets folder
COPY . .

# Copy your custom Nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Expose port 80 (the default Nginx port inside the container)
EXPOSE 80
