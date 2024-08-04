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

# Instalar extensões do PHP necessárias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        iconv \
        mbstring \
        intl \
        mysqli \
        pdo_mysql \
        soap \
        sockets \
        zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho
WORKDIR /var/www

# Copiar arquivos do aplicativo para o container
COPY . /var/www

# Trocar para o usuário especificado (se fornecido)
ARG user
ARG uid
RUN if [ -n "$user" ]; then \
    if ! id -u $user > /dev/null 2>&1; then \
        useradd -u $uid -m $user; \
    fi; \
    chown -R $user:$user /var/www; \
fi

USER $user

# Expor a porta padrão para PHP-FPM
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]