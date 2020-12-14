FROM php:7.2-fpm

RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \
    git \
    supervisor \
    libmcrypt-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    apt-transport-https \
    vim \
    gnupg \
    jpegoptim \
    optipng \
    pngquant \
    ffmpeg \
    gifsicle  \
    zlib1g-dev \
    libzip-dev \
    cron

# Download Compose and setup php configration
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd pdo mbstring pdo_mysql exif pcntl zip bcmath

# Download and install NodeJS
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash
RUN apt-get install -y \
    nodejs \
    npm

# # Add user for laravel application
# RUN groupadd -g 1000 www
# RUN useradd -u 1000 -ms /bin/bash -g www www

WORKDIR /var/www

COPY . /var/www

RUN chown -R www-data:www-data /var/www

ENV TZ=Europe/Istanbul
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

EXPOSE 9000
ENTRYPOINT php-fpm
