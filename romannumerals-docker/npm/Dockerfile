# Usar uma imagem base com Node.js
FROM node:12.18

# Diretório de trabalho dentro do container
WORKDIR /var/www/romannumerals-app

# Atualizar pacotes e instalar Angular CLI
RUN apt-get update \
  && npm install -g @angular/cli@20 \
  && rm -rf /tmp/* /var/cache/apk/* *.tar.gz ~/.npm \
  && npm cache clean --force \
  && yarn cache clean \
  && sed -i -e "s/bin\/ash/bin\/sh/" /etc/passwd

# Usar o usuário não root fornecido pela imagem base
USER node

# Expor a porta da aplicação Angular
EXPOSE 4200

# Comando padrão para iniciar a aplicação (pode ser ajustado conforme necessário)
CMD ["ng", "serve", "--host", "0.0.0.0", "--disable-host-check"]