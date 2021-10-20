FROM wordpress:apache
COPY ./html/wp-config.php /var/www/html

COPY ./html/custom-theme/ ./wp-content/themes/