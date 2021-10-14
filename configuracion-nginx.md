# Instalación de Nginx

## Instalar Nginx:
~~~
apt-get install nginx
~~~

## Instalar Certbot
~~~
apt-get update
apt-get install software-properties-common
add-apt-repository ppa:certbot/certbot
apt-get update 
apt-get install certbot
~~~

## Obtenemos el certificado
~~~
service nginx stop
certbot certonly --standalone -d midominio.com
service nginx start
~~~
## Creamos el archivo de configuracion de nuestro midominio.com
~~~
sudo nano /etc/nginx/sites-available/midominio.com
~~~
## Pegamos el siguiente contenido
~~~
server {

        listen 80;

        client_max_body_size 500M;

        return 301 https://midominio.com$request_uri;

        }



server {

        ssl_stapling off;

        ssl_stapling_verify off;

        listen 443 ssl;

        client_max_body_size 1500M;

        server_name midominio.com;

        ssl_certificate     /etc/letsencrypt/live/midominio.com/fullchain.pem;

        ssl_certificate_key /etc/letsencrypt/live/midominio.com/privkey.pem;

        ssl_protocols       TLSv1 TLSv1.1 TLSv1.2;

        ssl_ciphers         HIGH:!aNULL:!MD5;

        location / {

                proxy_pass http://127.0.0.1:3000;

                proxy_read_timeout 360s;

                proxy_next_upstream error timeout invalid_header http_500 http_502 http_503 http_504;

                proxy_redirect off;

                proxy_buffering off;

                proxy_set_header        Host            $host;

                proxy_set_header        X-Real-IP       $remote_addr;

                proxy_set_header        X-Forwarded-For $proxy_add_x_forwarded_for;

                proxy_set_header        X-Forwarded-Proto $scheme;

                }

        }
~~~        

## Activamos la configuración de nginx
~~~     
ln -s /etc/nginx/sites-available/dominio.com /etc/nginx/sites-enabled/dominio.com
/etc/init.d/nginx restart
~~~     

## Creamos un cron
~~~  
crontab -e
~~~  

## Agregamos lo siguiente
~~~  
30 2 * * 1 certbot renew >> /var/log/le-renew.log
35 2 * * 1 /etc/init.d/nginx reload
~~~  
