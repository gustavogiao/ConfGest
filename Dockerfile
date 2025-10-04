FROM php:8.4-apache

# Instala extensões necessárias para Laravel + PostgreSQL
RUN apt-get update && \
    apt-get install -y libpq-dev git unzip && \
    docker-php-ext-install pdo pdo_pgsql

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia o código da aplicação
COPY . /var/www/html/

WORKDIR /var/www/html

# Instala Node.js e npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Instala dependências do Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Instala dependências do npm (se usares frontend)
RUN npm install && npm run build

RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

EXPOSE 80
