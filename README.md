# Grupo 48 IIC2413

## Supuestos y Consideraciones

- La página web se encuentra alojada en el link solicitado (carpeta entrega3 dentro de Sites): http://bases.ing.puc.cl/~grupo48/entrega3/index.php

- La app también está respaldada en la carpeta 'Entrega3' dentro del directorio del grupo48 en el server, al igual que este README.

- Se recomienda utilizar los botones presentes al final de las páginas para moverse entre ellas, ya que el uso del navegador para volver forzadamente hacia atrás puede llevar a avisos de reenvío del formulario (requieren refrescar la página). También se recomienda el usar el botón de Cerrar Sesión en la página principal del usuario cuando se desee salir de la cuenta, en vez de poner directamente el link en el navegador o forzar el ir hacia atrás.
  
- Según lo entendido al leer el apartado de Login en el enunciado, no se consideró el registro de nuevos usuarios en la aplicación (Sign Up), sino que se utilizaron todos los que ya estaban en la base de datos desde la entrega anterior (se asumieron previamente registrados), agregándoles la contraseña '123456' por simpleza (misma para todos). De esta manera, se puede Iniciar Sesión con cualquiera de los usuarios presentes en la BDD de la Entrega 2, utilizando su correo y la contraseña indicada anteriormente. Adicionalmente, se agregó un usuario para poder testear sin afectar a los que ya estaban, que posee de correo 'example@example.cl' y de contraseña '123456'.

- Un usuario que no ha Iniciado Sesión puede navegar y utilizar el filtro de búsqueda, pero no tiene la opción de guardar o modificar ningún tipo de dato en la BDD, ni tampoco de acceder a su perfil.

- Las opciones de reserva de habitaciones, registro en senderos y guardado de restaurantes favoritos se muestran al navegar sobre sus apartados respectivos (por ejemplo al ver las habitaciones de un hotel se pueden reservar con un link que aparece a la derecha, si así lo desea el usuario). La opción de actualizar estado en los senderos está presente dentro del Perfil del usuario, al momento de revisar los senderos en los que está registrado.

- Los filtros de búsqueda pedidos están integrados en la navegación, y para que encuentren correctamente los nombres deseados es necesario considerar el uso de mayúsculas y minúsculas al ingresar las palabras clave.
