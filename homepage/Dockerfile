# Use the official lightweight Nginx image
FROM nginx:alpine

# Set the working directory
WORKDIR /usr/share/nginx/html

# Copy your website files into the container
COPY . .

# THIS IS THE FIX:
# Change the ownership of all files in the web root to the nginx user.
# This gives the server process permission to read them.
RUN chown -R nginx:nginx /usr/share/nginx/html

# Copy your custom Nginx configuration
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port 80, which Nginx uses by default
EXPOSE 80
