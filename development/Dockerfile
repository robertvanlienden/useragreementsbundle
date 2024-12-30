FROM php:8.2-alpine3.21

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY --chown=php:nginx ./ /www

RUN apk add --no-cache \
    bash  \
    git \
    zip \
    unzip

WORKDIR /www

RUN apk add linux-headers --no-cache $PHPIZE_DEPS --virtual .build-deps; \
    pecl install xdebug; \
    docker-php-ext-enable xdebug; \
    apk del .build-deps;

RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/xdebug.ini;

RUN set -eux; \
    COMPOSER_MEMORY_LIMIT=2G composer install --prefer-dist --no-scripts --no-progress; \
    composer clear-cache

CMD ["sleep", "infinity"]
