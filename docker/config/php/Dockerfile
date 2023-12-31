FROM php:fpm

ARG VERSION=v18.7.0
ARG USERNAME=phpdev

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \ 
    libzip-dev \
    zip \
    vim \
    git \
    wget \
    yui-compressor \
    poppler-utils libtidy-dev \
    icu-devtools libicu-dev \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd 

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

RUN docker-php-ext-install intl pdo pdo_mysql

RUN cd /usr/local/etc/php/conf.d/ && \
    echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-ram-limit.ini

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install tidy && docker-php-ext-enable tidy

RUN docker-php-ext-install exif

RUN docker-php-ext-install zip

WORKDIR /

COPY composerInstall.sh .

RUN chmod +x composerInstall.sh && ./composerInstall.sh && rm -f composerInstall.sh

RUN apt-get install -y procps

RUN apt-get clean && apt-get autoremove -y && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/src

RUN addgroup --gid 1073 ${USERNAME}

RUN adduser --disabled-password --gecos "" --force-badname --ingroup ${USERNAME} ${USERNAME}

RUN usermod -G 1073 www-data

# doesn't work on mounted volume on MacOS:(
RUN echo "umask 0002" >> /home/${USERNAME}/.bashrc

WORKDIR /var/www/html

RUN mkdir -p /home/${USERNAME}/.vscode-server/extensions \
    /home/${USERNAME}/.vscode-server-insiders/extensions \
    && chown -R ${USERNAME} \
    /home/${USERNAME}/.vscode-server \
    /home/${USERNAME}/.vscode-server-insiders

RUN mkdir -p /home/${USERNAME}/.composer/cache/{repo,files} \
    /home/${USERNAME}/.config/composer \
    && chown -R ${USERNAME} \
    /home/${USERNAME}/.composer \
    /home/${USERNAME}/.config

USER ${USERNAME}
