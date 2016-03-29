#!/usr/bin/env bash

#Base image
FROM nginx

########################################################
#Build instructions starts here
########################################################
#Remove default nignx configs.case
RUN rm -f /etc/nginx/conf.d/*

#Install packages
RUN apt-get update && apt-get install -my \
  supervisor \
  curl \
  wget \
  php5-curl \
  php5-fpm \
  php5-gd \
  php5-memcached \
  php5-mysql \
  php5-mcrypt \
  php5-xdebug

# Ensure that PHP5 FPM is run as root.
RUN sed -i "s/user = www-data/user = root/" /etc/php5/fpm/pool.d/www.conf
RUN sed -i "s/group = www-data/group = root/" /etc/php5/fpm/pool.d/www.conf

# Pass all docker environment
RUN sed -i '/^;clear_env = no/s/^;//' /etc/php5/fpm/pool.d/www.conf

# Add configuration files
COPY docker/conf/nginx.conf /etc/nginx/
COPY docker/conf/supervisord.conf /etc/supervisor/conf.d/
#COPY conf/php.ini /etc/php5/fpm/conf.d/40-custom.ini


########################################################
#Volumes Configuration
########################################################
VOLUME ["/var/www", "/etc/nginx/conf.d"]

########################################################
#PORT Configuration
########################################################
EXPOSE 80 443 9000

################################################################################
# Entrypoint
################################################################################

ENTRYPOINT ["/usr/bin/supervisord"]
