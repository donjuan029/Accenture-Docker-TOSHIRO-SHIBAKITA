# Usa uma imagem oficial e leve do Nginx
FROM nginx:stable-alpine

# Remove configuração padrão (opcional, evita conflitos)
RUN rm /etc/nginx/conf.d/default.conf

# Copia o arquivo de configuração personalizado
COPY nginx.conf /etc/nginx/nginx.conf

# Expõe a porta padrão do Nginx
EXPOSE 80

# Comando padrão para iniciar o Nginx
CMD ["nginx", "-g", "daemon off;"]