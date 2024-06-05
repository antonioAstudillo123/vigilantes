<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Sobre el sistema

El objetivo primordial del proyecto es desarrollar un sistema que permita registrar de manera precisa y sistemática los rondines de vigilancia llevados a cabo por el personal de seguridad en los distintos campus universitarios. 

## Funcionalidad
El proyecto opera de la siguiente manera: mediante un código QR, los vigilantes accederán a la página web del sistema. Una vez en la página, deberán registrarse ingresando su número de empleado. Una vez realizado este paso, se registrará automáticamente la fecha y hora en la que el vigilante realizó su ronda de vigilancia, así como también se almacenará la información personal del vigilante, incluyendo su nombre completo y el plantel en el que está asignado.

Es importante destacar que el método de registro basado en una página web no garantiza la eficacia total, ya que los vigilantes podrían acceder a ella sin necesidad de utilizar el código QR, lo que podría comprometer la honestidad en el registro de las rondas de vigilancia. Por esta razón, el sistema debe ser complementado con auditorías periódicas que verifiquen la realización adecuada de las rondas de vigilancia en los distintos campus universitarios. Estas auditorías son fundamentales para garantizar la integridad y la efectividad del sistema de seguridad.

La estrategia propuesta consiste en posicionar códigos QR en diversos puntos visibles por las cámaras de seguridad. Estos códigos QR serán simbólicos y se colocarán estratégicamente para crear la percepción de que los vigilantes deben escanearlos para registrar sus rondas de vigilancia. Sin embargo, es importante tener en cuenta que el sistema de registro está basado en una página web, lo que significa que los vigilantes podrían acceder a ella desde cualquier dispositivo con conexión a Internet, sin necesidad de escanear el código QR.
Para garantizar la integridad del sistema y verificar la realización efectiva de las rondas de vigilancia, se llevarán a cabo auditorías periódicas. Durante estas auditorías, se verificará que las horas y días registrados por el sistema coincidan con las rondas de vigilancia efectivamente realizadas. Las cámaras de seguridad proporcionarán evidencia visual adicional para respaldar estas verificaciones.


## Características
El sistema está diseñado con una arquitectura de Controlador -> Servicio -> Repositorio.

Cada petición realizada a los distintos controladores es gestionada por una clase de servicio, la cual interactúa directamente con clases de repositorio. Estas últimas son las responsables de realizar las operaciones directamente en la base de datos.

Utilizamos Livewire para la creación de componentes interactivos. Además, empleamos la API de Google Charts para la generación de gráficos en el sistema.

El sistema cuenta con un apartado de gestión de usuarios. En este apartado, es posible resetear la contraseña del usuario (actualmente predeterminada como Univer#1), eliminar usuarios y modificar su información, siempre y cuando el usuario autenticado sea el mismo al que se desea modificar. No se permite a un usuario modificar la información de otro usuario.






