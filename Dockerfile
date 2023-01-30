FROM php:8.2-rc-fpm

LABEL version="1.0"
LABEL description="Imagem php8.2-fpm costumizada."
LABEL manintainer="Marcos Pachêco"
LABEL email="marcos.hr.pacheco@gmail.com"

# define o workdir
WORKDIR /var/www

# instala depêndencias
RUN apt-get update 
RUN apt-get install -y build-essential libxpm-dev libwebp-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev locales zip jpegoptim optipng pngquant gifsicle vim nano unzip git curl libzip-dev zlib1g-dev libicu-dev libgmp-dev libpq-dev libxml2-dev cron libmagickwand-dev libmagickcore-dev imagemagick npm
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-enable opcache
RUN docker-php-ext-configure gd --prefix=/usr --with-jpeg --with-webp --with-xpm --with-freetype
RUN docker-php-ext-install gd
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install bcmath exif pcntl zip calendar intl gmp pdo pdo_pgsql pgsql soap sockets

# instala node
RUN npm install npm@latest -g && npm install n -g && n latest

# limpa o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* 

# instala o composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# adiciona usuário
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# copia os dados do diretorio atual para o workdir
COPY . /var/www

# copia as permissões atuais dos arquivos
COPY --chown=www:www . /var/www

# muda o usuário atual
USER www

# expõe a porta 9000 e inicia o servidor
EXPOSE 9000
CMD ["php-fpm"]
