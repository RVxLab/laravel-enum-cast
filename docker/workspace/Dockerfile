FROM php:7.3

ARG PUID
ARG PGID

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN groupadd -g $PGID user
RUN useradd -g $PGID -u $PUID user
RUN chown user:user /var/www/html

RUN apt-get update && \
    apt-get dist-upgrade -y && \
    apt-get install -y zip unzip && \
    pecl install pcov && \
    docker-php-ext-enable pcov && \
    apt-get clean && rm -rf /var/lib/apt/lists/

USER user
WORKDIR /var/www/html
