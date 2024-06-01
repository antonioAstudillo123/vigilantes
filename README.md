<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Sobre el sistema

El objetivo de este sistema, es el de registrar las rondas de vigilancia que realizan los vigilantes dentro de los distintos planteles

## Características
El sistema tiene una arquitectura de Controlador ->  Servicio -> Repositorio 

Cada petición realizada a los distintos controladores es gestionada por una clase servicio, la cual interactua directamente con clases 
repositorios, estas ultimas son las que realizan las operaciones directamente a la base de datos. 

Utilizamos Livewire para la creación de componentes. 

Al igual, usamos la API de google charts, para la realización del apartado gráfico del sistema 






