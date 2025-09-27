# Dockerfile pour Laravel
FROM php:8.2-cli

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql zip exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Autoriser Composer à tourner en root
ENV COMPOSER_ALLOW_SUPERUSER=1

# Installer les dépendances du projet
RUN composer install --optimize-autoloader --no-dev

# Créer les dossiers de storage nécessaires et définir les permissions
RUN mkdir -p storage/framework/cache/data \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# Créer le lien symbolique pour le storage public si nécessaire
RUN php artisan storage:link || true

# Générer la clé d'application si elle n'existe pas
#RUN php artisan key:generate || true

# Optimiser l'application pour la production
#RUN php artisan config:cache \
#    && php artisan route:cache \
#    && php artisan view:cache

# Exposer le port 8000
EXPOSE 8000

# Lancer les migrations puis le serveur Laravel
CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
