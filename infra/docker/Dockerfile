FROM php:8.2-fpm

WORKDIR /var/www

COPY --chown=www-data:www-data . .

# Movendo arquivos de configuracao.
RUN  mv -vf ./infra/scripts/entry-point.sh /tmp/entry-point.sh \
     && chmod +x /tmp/entry-point.sh

# Baixar e dar permissão ao instalador de extensões do PHP.
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

# Instalar as extensões necessárias (incluindo pgsql e pdo_pgsql)
RUN install-php-extensions pgsql pdo_pgsql

RUN chown -R www-data:www-data ./ \
    && chmod -R 765 ./

EXPOSE 80

ENTRYPOINT ["/tmp/entry-point.sh"]
CMD ["/bin/ash","-c", "service nginx restart; php-fpm"]
