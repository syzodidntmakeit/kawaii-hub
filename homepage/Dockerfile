# Use the official PHP image with FPM and Nginx
FROM trafex/php-nginx:latest

# Temporarily switch to the root user to install packages
USER root

# Install essential PHP extensions for making API calls
RUN apk --no-cache add php-curl php-json

# The container will automatically switch back to its default non-root user.
# The USER www-data line has been removed as that user does not exist in this image.

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your website files into the container
# This copies index.html, health.php, and the assets folder
COPY . .

# Copy your custom Nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Expose port 80 (the default Nginx port inside the container)
EXPOSE 80
