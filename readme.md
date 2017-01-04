# Betabeers Web

> Nueva versión de la web de betabeers.com

## Índice
- [Requisitos](#requisitos)
- [Instalación](#instalacion)
  1. [Homestead](#homestead)
  2. [Clonando el repositorio](#clonando-el-repositorio)
  3. [Instalar dependencias](#instalar-dependencias)
  4. [Configurar entorno](#configurar-entorno)
  5. [Migraciones y semillas](#migraciones-y-semillas)
- [Gestión del proyecto](#gestion-del-proyecto)
- [Colaboradores](#colaboradores)

## Requisitos
- [PHP 7.1](http://php.net/)
- [MySQL](https://www.mysql.com/)
- [NodeJS (npm)](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

> Todos los requisitos están dentro de Homestead <small>(ver más abajo)</small>

## Instalación

### Homestead

Homestead es el paquete oficial de Laravel para Vagrant. 

Instalar siguiendo la [documentación oficial](https://laravel.com/docs/5.3/homestead).

### Clonando el repositorio

Una vez instalado y configurado Homestead se clona el repositorio dentro de la máquina virtual.

```
git clone git@bitbucket.org:betabeers/web.git
```

### Instalar dependencias

Instalar las dependencias del proyecto:

```
composer install
```

Instalar las dependencias javascript:

```
npm install
```

### Configurar entorno

Para configurar el entorno hay que duplicar el archivo *.env.example* y nombrarlo como *.env*.

Una vez duplicado, se edita el archivo *.env* para adaptarlo a la configuración del entorno.

### Migraciones y semillas

Cuando se haya configurado el entorno correctamente se ejecuta el siguiente comando para crear la estructura de la base de datos e insertar los datos necesarios:

> Este paso no es necesario hasta que no se haya creado la estructura de datos.

```
php artisan migrate --seed
```


## Gestión del proyecto

La gestión de proyecto se realiza mediante [Trello](https://trello.com/b/kja1mSpP/bb-web-2017).

## Colaboradores
- [Fernando Carrascosa](http://fcarrascosa.es)
- [David Francos](https://twitter.com/davidfrancos)
- [Pablo RM](https://twitter.com/yondemon)
- [Jaime Sares](http://jaimesares.com)
- [Raul Torralba](https://twitter.com/raul_torralba)
- [Ver más...]()
