FROM php:8-alpine

#ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer/composer:2.5.5-bin /composer /usr/bin/composer

WORKDIR /var/www/backend

# Install dependencies using Composer
COPY ./composer.json ./composer.lock* ./
RUN composer install --no-scripts --no-autoloader --ansi --no-interaction --no-progress --no-suggest

COPY . .

# Generate autoloader
RUN composer dump-autoload --optimize --classmap-authoritative

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]