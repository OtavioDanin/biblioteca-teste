FROM php:8.3-fpm-alpine3.21

RUN apk add --no-cache \
    nginx \
    supervisor \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    oniguruma-dev \
    postgresql-dev \
    && docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    zip \
    gd \
    opcache \
    && docker-php-ext-enable opcache

RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.revalidate_freq=0'; \
    echo 'opcache.validate_timestamps=0'; \
    echo 'opcache.max_accelerated_files=10000'; \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.max_wasted_percentage=10'; \
    echo 'opcache.interned_strings_buffer=16'; \
    echo 'opcache.fast_shutdown=1'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

RUN { \
    echo 'expose_php=Off'; \
    echo 'memory_limit=256M'; \
    echo 'upload_max_filesize=50M'; \
    echo 'post_max_size=50M'; \
    echo 'max_execution_time=300'; \
} > /usr/local/etc/php/conf.d/laravel.ini

RUN apk add supervisor
COPY default.conf /etc/nginx/http.d/default.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY ./ /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# EXPOSE 80 443
WORKDIR /var/www/html
RUN mkdir -p  /var/log/supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]