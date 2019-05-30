# Consideraciones

- Para poder utilizar la API, primero se deberán importar los datos necesarios 
a MongoDB. La Base de Datos creada se debe llamar 'local'. A continuación se 
debe guardar la información del archivo 'messages.json' en una colección de 
nombre 'messages', mientras que la información del archivo 'users.json' debe 
ser guardada en una colección llamada 'users'.
 
- Con el servicio de MongoDB corriendo, se puede probar la API utilizando 
Postman. Previamente se debe haber ejecutado el archivo 'main.py', que 
corresponde a la API montada en Flask.

- La dirección en la que está corriendo la API se indicará como "API/" en este 
Readme.

- Para enviar parámetros se debe elegir la opción application/json de tipo Raw 
en Postman (en el Body), donde se ingresan dichos parámetros en forma de 
diccionario json.

- Para el Text Search se deben enviar los siguientes parámetros:
    - 'required': [Lista De Strings Que Representan Las Frases Obligatorias]
    - 'desirable': [Lista De Strings Que Representan Las Palabras Deseables]
    - 'prohibited': [Lista De Strings Que Representan Las Palabras Prohibidas]
    
  En el caso de que sólo se busque por palabras prohibidas, se entregarán 
  todos los resultados sin nigún tipo de filtro.
 
# Rutas Tipo GET

- En la ruta "API/messages" se obtienen todos los mensajes de la base de datos. 
También acepta los parámetros del Text Search para filtrar los mensajes.

- En la ruta "API/messages/mid" se obtiene toda la información del mensaje con 
id 'mid'.

- En la ruta "API/users/uid" se obtiene toda la información del usuario con id 
'uid'. También acepta los parámetros del Text Search para filtrar los mensajes 
emitidos por dicho usuario.

- En la ruta "API/communication/uid_1/uid_2" se obtienen todos los mensajes 
intercambiados entre los usuarios con id 'uid_1' y 'uid_2'.

# Rutas Tipo POST

- La ruta "API/messages" (modo POST) acepta los parámetros para guardar en la 
base de datos un nuevo mensaje entre 2 usuarios. Estos parámetros son: 
'message', 'sender', 'receptant', 'lat', 'long', 'date' (los mismos que ya 
estaban indicados en la variable MESSAGES_KEYS del 'main.py' entregado).

# Rutas Tipo DELETE

- En la ruta "API/messages/mid" (modo DELETE) se puede eliminar de la base de 
datos el mensaje con id 'mid'.
