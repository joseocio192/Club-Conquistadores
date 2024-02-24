# Proyecto
Proyecto de Ingeniería de software(SCD-1011) donde se busca solucionar una problemática ficticia de los club conquistadores
## Documentación
[aqui](https://laravel.com/docs/10.x) podrás encontrar documentación de laravel
## Instalación
### requerimientos
- XAMP
- COMPOSER
- NODEJS
- PHP(XAMPP)
  ## Instalar el proyecto
- Abrir XAMPP y empezar los servicios de MySql y Apache
- En la carpeta donde se tendrá el proyecto abrir PowerShell
```
#Elegir la ruta del proyecto
cd 'C:\xampp\htdocs'

git clone https://github.com/joseocio192/Club-Conquistadores

#Estar en la ruta del proyecto
cd '.\Club Conquistadores\'

composer install
```
En el proyecto cambiar el nombre de '.env.example' por '.env'
![.env.example](image.png)

```
php artisan key:generate

php artisan serve
```
 - Y ya se tendría la pagina en http://127.0.0.1:8000 ó usar el dominio del localhost
