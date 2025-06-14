# Étape 1 : Base système
FROM ubuntu:24.04 AS base

LABEL maintainer="Taylor Otwell"

ARG WWWGROUP=1000
ARG NODE_VERSION=22
ARG MYSQL_CLIENT="mysql-client"
ARG POSTGRES_VERSION=17

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    DEBIAN_FRONTEND=noninteractive \
    TZ=UTC \
    SUPERVISOR_PHP_COMMAND="/usr/bin/php -d variables_order=EGPCS /var/www/html/artisan serve --host=0.0.0.0 --port=80" \
    SUPERVISOR_PHP_USER="sail"

WORKDIR /var/www/html

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN printf "Acquire::http::Pipeline-Depth 0;\nAcquire::http::No-Cache true;\nAcquire::BrokenProxy true;\n" > /etc/apt/apt.conf.d/99custom \
    && apt-get update && apt-get upgrade -y \
    && mkdir -p /etc/apt/keyrings \
    && apt-get install -y \
        gnupg gosu curl ca-certificates zip unzip git supervisor \
        sqlite3 libcap2-bin libpng-dev python3 dnsutils librsvg2-bin \
        fswatch ffmpeg nano

# Ajouter les dépôts externes (PHP, Node, Yarn, PostgreSQL)
RUN curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0xb8dc7e53946656efbce4c1dd71daeaab4ad4cab6' \
    | gpg --dearmor -o /etc/apt/keyrings/ppa_ondrej_php.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu noble main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc \
    | gpg --dearmor -o /etc/apt/keyrings/pgdg.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt noble-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor -o /etc/apt/keyrings/yarn.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list

# PHP, Node, Yarn, MySQL/PostgreSQL clients
RUN apt-get update && apt-get install -y \
    php8.4-cli php8.4-dev php8.4-pgsql php8.4-sqlite3 php8.4-gd \
    php8.4-curl php8.4-mongodb php8.4-imap php8.4-mysql \
    php8.4-mbstring php8.4-xml php8.4-zip php8.4-bcmath php8.4-soap \
    php8.4-intl php8.4-readline php8.4-ldap php8.4-msgpack \
    php8.4-igbinary php8.4-redis php8.4-swoole php8.4-memcached \
    php8.4-pcov php8.4-imagick php8.4-xdebug \
    nodejs yarn $MYSQL_CLIENT postgresql-client-$POSTGRES_VERSION \
    && npm install -g npm pnpm bun \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && apt-get autoremove -y && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.4

# Utilisateur sail
RUN userdel -r ubuntu || true \
    && groupadd --force -g $WWWGROUP sail \
    && useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

# Étape 2 : Build des dépendances Laravel/Node
FROM base AS build

COPY ../../ /var/www/html

COPY docker/8.4/php.ini /etc/php/8.4/cli/conf.d/99-sail.ini

RUN composer install --optimize-autoloader --no-dev \
    && npm install && npm run build

# Étape 3 : Image finale
FROM base AS final

COPY --from=build /var/www/html /var/www/html

COPY docker/8.4/start-container /usr/local/bin/start-container
COPY docker/8.4/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/8.4/php.ini /etc/php/8.4/cli/conf.d/99-sail.ini

# Créer les dossiers APRES avoir copié le projet
RUN mkdir -p /var/www/html/storage/framework/{cache,data,sessions,views} \
    && mkdir -p /var/www/html/bootstrap/cache \
    && chown -R sail:sail /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN chmod +x /usr/local/bin/start-container \
    && php artisan config:cache \
    && php artisan route:cache

EXPOSE 80
ENTRYPOINT ["start-container"]
