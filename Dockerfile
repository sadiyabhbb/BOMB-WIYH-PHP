# Base PHP image
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install cURL (PHP extension)
RUN docker-php-ext-install curl

# Expose port (Vercel/Render uses this)
EXPOSE 8080

# Start PHP built-in server serving /api
CMD ["php", "-S", "0.0.0.0:8080", "-t", "api"]
