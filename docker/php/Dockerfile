FROM amazonlinux:2023.0.20230503.0

RUN dnf update && \
    dnf install -y \
      which \
      man \
      make \
      less \
      tar \
      git \
      zip \
      gcc \
      npm \
      php8.1-devel \
      php8.1-pgsql \
      php8.1-intl \
      php-pear \
      && \
    dnf clean all && \
    rm -rf /var/cache/dnf

RUN curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

RUN curl -o /tmp/libsodium-1.0.18.tar.gz https://download.libsodium.org/libsodium/releases/libsodium-1.0.18.tar.gz && \
    test $(sha256sum /tmp/libsodium-1.0.18.tar.gz | awk '{ print $1 }') = "6f504490b342a4f8a4c4a02fc9b866cbef8622d5df4e5452b46be121e46636c1"

RUN mkdir /tmp/libsodium-1.0.18 && \
    tar -xvzf /tmp/libsodium-1.0.18.tar.gz -C /tmp/libsodium-1.0.18 --strip-components 1 && \
    ls -lsah /tmp/libsodium-1.0.18 && \
    cd /tmp/libsodium-1.0.18 && \
    ./configure && \
    make && \
    make check && \
    make install && \
    pecl install -f libsodium

RUN echo 'extension=sodium.so' > /etc/php.d/40-sodium.ini

CMD ["symfony", "server:start"]
