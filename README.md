Pasos para inicializar el proyecto:
Para poder correr el proyecto, se debe tener instalado Docker, Docker Compose
1. en la raiz del proyecto (pca_test_back) ejecutar el comando docker compose up -d --build
2. ingresar contenedor php (docker exec -i -t pca_test_back-php-1 /bin/bash)
3. Ingresar a ruta /var/www/reserva_vuelos y ejecutar composer install
4. ingresar al contenedor mysql, crear base de datos reserva_vuelos (CREATE DATABASE reserva_vuelos;)
5. cargar archivo reserva_vuelos_dump.sql (mysql -u username -p reserva_vuelos < reserva_vuelos_dump.sql)
6. Agregar linea 127.0.0.1 dev.reservavuelos.local en el archivo hosts del sistema
7. Ingresar en el navegador a la ruta dev.reservavuelos.local
   
