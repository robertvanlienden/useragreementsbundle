FROM php:8.2-alpine3.21

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY --chown=php:nginx ./ /www

RUN apk add --no-cache \
    bash  \
    git \
    zip \
    unzip

WORKDIR /www

RUN set -eux; \
    COMPOSER_MEMORY_LIMIT=2G composer install --prefer-dist --no-autoloader --no-scripts --no-progress; \
    composer clear-cache

CMD ["sleep", "infinity"]
