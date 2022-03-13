#=======================#
# composer já instalado #
#=======================#
FROM adrianowead/viware-base-php:1.1.0

# instalar nodejs
RUN curl -fsSL https://deb.nodesource.com/setup_current.x | bash -

RUN apt-get install -y nodejs

# copiando configs do apache
COPY apache/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN usermod -a -G sudo www-data

RUN chmod -R 775 /var/www/html

# ajustando permissão da pasta para o apache
# e habilitando alguns módulos
RUN chown -R www-data:www-data /var/www/html

# abrindo porta 80
EXPOSE 80

# iniciando supervisor
ENTRYPOINT ["supervisord"]
