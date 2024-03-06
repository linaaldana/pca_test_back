Pasos para inicializar el proyecto:
Para poder correr el proyecto, se debe tener instalado Docker, Docker Compose
1. en la raiz del proyecto (pca_test_back) ejecutar el comando docker compose up -d --build
2. ingresar al contenedor mysql, crear base de datos reserva_vuelos (CREATE DATABASE reserva_vuelos;)
3. cargar archivo reserva_vuelos_dump.sql (mysql -u username -p reserva_vuelos < reserva_vuelos_dump.sql)
4. Agregar linea 127.0.0.1 dev.reservavuelos.local en el archivo hosts del sistema
5. Ingresar en el navegador a la ruta dev.reservavuelos.local
   
