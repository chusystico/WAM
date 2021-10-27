# WAM: Prueba técnica
Backend Developer - We Are Marketing

-----------------------------------------------------------------------------------------------------------------

Enunciado de la prueba:

Desarrollar una aplicación que obtenga de un servidor externo un listado de reservas realizadas en
formato CSV. La aplicación tiene que mostrar el listado de las reservas y permitir buscar por un texto libre que
pueda aparecer en los campos del listado.

Por último, tiene que poderse descargar el listado en formato json.

La prueba debe hacerse en PHP 7.2 o superior.

Información:
- http://tech-test.wamdev.net/
- Orden de los campos del CSV: Localizador;Huésped,fecha de entrada,fecha de
salida,Hotel,Precio,Posibles Acciones

Se valorará(no requerido):

● Cobertura y calidad de test
● Buenas prácticas en el desarrollo de la prueba
● Arquitectura elegida
● Uso de estándares de código
● Uso de Github para alojar la prueba
● La calidad descriptiva del histórico de los commits(preferible, para esta prueba, no fusionar commits)

-----------------------------------------------------------------------------------------------------------------

Comentarios:

Esta aplicación ha sido desarrollada completamente en PHP para la captura de datos y creación de un 
JSON con el que poder operar la tabla gracias al plug-in Datatables, al que le he añadido el plugin 
completo para el castellano. En la toma de datos para el plug-in he usado AJAX a modo de rellenar datos.

Para la parte del Front·End he usado HTML5 y Bootstrap 4, que me encuentro muy cómodo con él. 
Además el repositorio de Font-Awesome para los iconos.

Todo el repositorio se puede encontrar en:
  - GitHub (https://github.com/chusystico/WAM)
  - Hosting personal (https://test.chusystico.com)

He dejado todo lo mejor comentado posible y en las partes que creo que pueden ser más confusas. Está 
todo comentado en PHP para que estos no aparezcan en la depuración.

Por último, quería dejar todos los datos en una base de datos en MySQL sobre uno de mis servidores, pero la 
carga inicial tomaba un tiempo y como no sabía si esto iba a ser valorable lo he omitido para no entorpecerla.
De todas formas he dejado los archivos globales para su configuración y las funciones de Conexión/desconexión.

Un saludo,
											- Jesús Pineda -