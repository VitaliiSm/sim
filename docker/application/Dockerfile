FROM php:8.1-fpm-buster

WORKDIR /var/www/

# Install dependencies
RUN apt-get update && apt-get install -y \
    mariadb-client                       \
    librdkafka-dev                       \
    libpng-dev                           \
    libpq-dev                            \
    libxml2-dev                          \
    zip                                  \
    unzip                                \
    git                                  \
    curl                              && \
                                         \
    apt-get clean                     && \
    rm -rf /var/lib/apt/lists/*



# Install PHP Extensions
# Install PHP Extensions
RUN docker-php-ext-install \
    pdo                    \
    pdo_mysql              \
    mysqli                 \
    xml                    \
    dom

# Create User
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

USER www

# Install composer
COPY --from=composer:2.2.2 /usr/bin/composer /usr/bin/composer

