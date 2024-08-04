# Usar uma imagem base com Node.js
FROM node:20.16

# Diretório de trabalho dentro do container
WORKDIR /var/www/romannumerals-app

# Atualizar pacotes e instalar Angular CLI
RUN apt-get update \
  && npm install -g @angular/cli \
  && rm -rf /tmp/* /var/cache/apk/* *.tar.gz ~/.npm \
  && npm cache clean --force \
  && yarn cache clean \
  && sed -i -e "s/bin\/ash/bin\/sh/" /etc/passwd

# Definir usuário como root
USER root

# Expor a porta da aplicação Angular
EXPOSE 4200