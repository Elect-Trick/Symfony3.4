FROM php:7.4.30

# Set the working directory for the Symfony app
WORKDIR /var/www/html

# Install PHP extensions required by Symfony 3.4
RUN apt-get update && apt-get install -y libicu-dev && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl pdo pdo_mysql
# COPY composer.json .

# Install composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && \
    apt-get install -y supervisor && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copy the Symfony application into the container
# Replace 'symfony-app' with the actual path to your Symfony app
COPY . .

# Install Symfony dependencies using composer
RUN composer install --optimize-autoloader
# Install Apache
RUN apt-get update &&  apt-get install -y apache2

# Enable Apache modules
RUN a2enmod rewrite

# Remove default Apache config and replace with Symfony config
RUN rm /etc/apache2/sites-available/000-default.conf
COPY apache.conf /etc/apache2/sites-available/000-default.conf

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
# ENV DATABASE_HOST=host.docker.internal
# ENV DATABASE_PORT=3306
# ENV DATABASE_NAME=auto_trader
# ENV DATABASE_USER=root
# ENV DATABASE_PASSWORD=''
# ENV SECRET=ThisTokenIsNotSoSecretChangeIt


# Expose the port that Symfony will run on (adjust if necessary)
EXPOSE 8000

# Start the Symfony 3.4 server when the container is launched
# CMD ["php", "bin/console", "server:run"]
CMD ["supervisord", "-n"]
# CMD service php7.4-fpm start && apache2-foreground



# CMD bash -c "php bin/console server:run"