FROM php:8.3-apache

# Copiar los archivos del proyecto al directorio público de Apache
COPY . /var/www/html/

# Asegurar permisos correctos para el servidor web
RUN chown -R www-data:www-data /var/www/html

# Adaptar el puerto de Apache al puerto asignado por Render ($PORT) o 80 por defecto
CMD sed -i "s/80/${PORT:-80}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf && apache2-foreground

EXPOSE 80
