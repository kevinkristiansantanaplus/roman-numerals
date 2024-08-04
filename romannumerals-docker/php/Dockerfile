# Usar PHP 8.0 FPM como base
FROM php:8.0-fpm

# Argumentos definidos no docker-compose.yml
ARG user
ARG uid

# Atualizar e instalar pacotes
RUN apt-get update && apt-get install -y \
    nano \
    git \
    curl \
    unzip \
    libzip-dev \
    zip \
    wget \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libaio1 \
    build-essential \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Obter a última versão do Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar um usuário de sistema para executar o Composer e os comandos Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && mkdir /home/$user/oracle \
    && chown -R $user:$user /home/$user

# Instalação das extensões do PHP
RUN docker-php-ext-install \
            iconv \
            mbstring \
            intl \
            gd \
            mysqli \
            pdo_mysql \
            soap \
            sockets \
            zip

# Definir o diretório de trabalho
WORKDIR /var/www

# Trocar para o usuário especificado
USER $user