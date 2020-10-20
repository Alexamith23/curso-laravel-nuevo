# Eventing pros and cons

Creo que podemos pasar con seguridad a Eventing, así que analicemos los pros y los inconvenientes de su enfoque para escuchar que tengo un controlador de pagos y, si lo piensa, cuando se procesa un pago, ¿cuál es la acción principal o del cuerpo, por supuesto, procesar la pago utilizando algún proveedor de facturación como stripe, entonces tal vez necesite desbloquear la compra y tal vez esto tome la forma de generar Alexis o algo así, realmente eso es, solo una lógica central que debe tener lugar como parte de esta solicitud, sin embargo, además de que hay una serie de efectos secundarios que a menudo tendrán que ocurrir un efecto secundario se notifica al usuario enviarle un correo electrónico enviarle un mensaje de texto que el pago se ha procesado por lógica pero es un efecto secundario importante, así que notifique al usuario sobre el el dolor tiene otro efecto secundario si está tratando de averiguar cuáles son sus efectos secundarios, solo piense en las cosas que deben suceder en respuesta a esta acción importante o este evento importante en su aplicación Los efectos secundarios de una letra pueden ser similares, tal vez lo tenga y cada 6 compras obtenga un nuevo logro en su cuenta. Parece que es un punto en el que necesitamos activar la lógica que inspeccionará al usuario, revisará sus compras y determinará si califica o no para esta insignia de logro.

![vagrant](contro-event.png "vagrant")

hagamos una más, tal vez quieras azotar a un usuario de Twitter, así que tal vez programemos un correo electrónico para 2 días a partir de ahora y tal vez eso incluya un cupón para compartir. Esperamos que estés disfrutando el producto si eres tuyo 20 % de descuento en compartir con un amigo, así que envía un cupón para compartir para usarla nuevamente, así es como puedes estructurar esto es muy importante que diferentes autores tengan muchas formas diferentes de hacerlo, cada una con sus propios pros y contras a la opción más obvia que puede ser la más simple al menos lo primero sería hacer lo que me corresponde mantenerlo como un procedimiento procesar un código de licencia de generador de pago enviar un correo electrónico para verificar los logros y luego enviar un código de cupón ponerlo todo en esta opción de controlador y luego terminar con él y usted sé lo que creo que hay más en eso, puede ser más fácil volver a un año a partir de ahora si necesita saber qué sucede cuando se procesa un pago, simplemente eche un vistazo a las 70 líneas aquí en esta especie de el atractivo de la traditio El código de procedimiento nal no está cambiando limpiamente 20 clases diferentes para descubrir todas las cosas que colocan pero, por supuesto, podríamos encontrar después de seguir con este método es que en algún momento se vuelve muy pesado y ya no es fácil de consumir cada vez. agrega un nuevo oyente que está pendiente a una opción de controlador de 70 líneas y ya no se siente bien, por lo que en ese momento comienza a considerar otras opciones cuando podría crear un vidrio de servicio, otra opción podría ser crear lo que llamamos ese caso de uso sería un clase con un nombre que refleja lo que está haciendo ¿cuál es el uso de cocina mientras compramos un producto? En esa clase tiene varios métodos que representan las muchas cosas que deben suceder. Este puede ser un enfoque útil, pero no lo es. el que Lil Skies hoy maneja eventos y oyentes un evento representa una acción que acaba de tener lugar en su sistema, entonces, ¿cuál es el evento? El producto se compró algo así.

Notificamos a todo nuestro sistema y luego cada una de estas podrían ser sus propias clases que escuchan ese evento y luego responden como lo necesitan, así que si este es su evento, estos son sus oyentes, obtengamos las tomas ahora. nota rápida.

![vagrant](contro-event2.png "vagrant")

php artisan o si estás usando un segundo o encontrarás un comando ejecutar cualquier cosa en esto es realmente útil para algunos comandos rápidos, así que si echamos un vistazo a todos los comandos y verá dos comandos principales relacionados con la construcción de una clase de evento y una clase de escucha, pero si me equivoco un poco más si también ve algunos eventos generales, hay algunos comandos que puede revisar aquí hay otro espacio para eventos AP Art Center lista de eventos esto me mostrará todos los eventos en mi aplicación junto con sus respectivos oyentes, un usuario está registrado, luego enviará una notificación de verificación por correo electrónico, luego la relación si ocurre este evento, luego active este oyente ahora encontrará que esta es la multa si vamos a nuestra aplicación directorio de proveedores aquí hay un proveedor de servicios de eventos que ha prescrito para todo, pero las rejillas de ventilación en su aplicación notarán de inmediato que aún no hemos aquí, que es efectivamente un mapa que encuentra todos los eventos en la clave y todos los oyentes como el valor.

![vagrant](send-verify.png "vagrant")

# Limit access to authorized users

La autorización en laravel es muy fácil, déjame mostrarte para demostrar que he creado un formulario en miniatura para que tengamos una lista de conversaciones. Podemos revisar el cuerpo y las respuestas ahora antes de profundizar. Déjame darte un rápido. descripción general, tenemos que terminar la configuración / conversaciones corresponde a esta página, pero luego también podemos ver una sola conversación, así que bien, veamos el controlador controlador nuevamente, carga muy simple si usted y pasa todas las conversaciones o la primera conversación única hola para ver más allá del conjunto final de la conversación, vayamos al fusible en sí, así que para todas las conversaciones iteramos sobre una colección y predicamos una, escupimos el título y ahí lo tienes para una sola conversación nuevamente, lo mismo, así que tenemos el título por quién fue escrito también. como el cuerpo y luego una colección de respuestas, pero puede revisar aquí, todo esto debería ser un resumen en este punto, está bien, ahora tenemos un nuevo trabajo para cualquier conversación, el Creador puede elegir cualquier respuesta como la mejor y seguro que son las b La respuesta es muy similar a la que tenemos en el formulario personalizado de la guarida, así que piénselo, tenemos que permitir esto en el elocuente en el extremo de la base de datos. La guarida también debe haber un nivel de autorización correcto. responde mejor solo el propietario o el creador del hilo tiene permiso o está autorizado para hacerlo, averigüemos cómo este es el primer paso que voy a volver a mi conversación.

Excelente para fines de autorización, así que vayamos afuera. Parece que cuando veo una respuesta aquí, tal vez estés aquí con mucha forma y tendremos un botón que dice lo mejor. para volar la actualización de Switchback, no me importa demasiado esto, pero decimos que es un botón y sin relleno.

Y finalmente me envié un mensaje de texto que lo hizo y eso es lo suficientemente bueno para saber si hay un problema, ella seguramente la lista de invitados tiene una ventana privada, incluso si solo soy un invitado.Todavía veo un formulario en Market como la mejor respuesta.No estoy autorizado. para hacer eso, entonces, ¿cómo podemos mostrar condicionalmente elementos como este.

![vagrant](view-replies.png "vagrant")

¿Cómo puede hacer que esto sea legible dentro de una directiva blade y resulta que hay una llamada nuevamente si el usuario actual puede actualizar la conversación un poco más de unos momentos pasados por nuestra autorización el usuario actual puede actualizar la conversación dada solo en esa condición debería mostrar  encontrar algo con la cadena o así no sabemos lo que significa tener una conversación, así que si regreso y recargo la página, no vemos nada porque no hay autorización para encontrar para todos.

![vagrant](view-replies2.png "vagrant")

A continuación, le mostramos cómo podemos cambiarlo para que entre en nuestros proveedores en lc1, cancele los servicios de autorización y medicamentos registrados del proveedor de servicios de nuevo, literalmente, vale la pena que esté creando una puerta entre el usuario y alguna acción que tal vez desee realizar, por lo que es importar esto y voy a definir una nueva política de cortos y una conversación de actualización de acuerdo, así que esto va a aceptar la conversación de ID de usuario actual y adecuadamente.

![vagrant](boot.png "vagrant")

Realmente rápido, solo para refrescar su memoria, pasamos a través de una conversación, así que aceptamos que aquí mismo, véalo, excepto que, sin embargo, para los invitados, iré a una pestaña de incógnito en el exterior y se supone que tiene un usuario autenticado válido y si no regresa de inmediato, es falso, una especie de como, bueno, debe iniciar sesión y luego, si está conectado a la electricidad, la siguiente aplicación confirma que esta condición devuelve verdadero pero no son sustituciones que desea previsión de autorización por varias razones, por lo que puede hacer que la opción del usuario diga que no es obligatorio y ahora, si puede actualizar incluso el gas, puede ver esto que no es realmente relevante en este caso, así que lo traeré de vuelta.

Escribimos en un modelo de conversación. Tengo una relación entre la conversación y el usuario, por lo que puedo decir que obtenga el usuario que escribió la conversación y, si ese es el usuario actualmente autenticado, puede ir a ver si es distribuidor autorizado. aviso de actualización Estoy en el creador de la conversación, por lo que la condición vuelve verdadera y tengo acceso a ese formulario de respuesta rápida cuando no escribí esto fue escrito por Anna Marie y no veo ese botón si no lo creé perfecto, esta es la autorización 101 noté que debemos encontrar una nueva clave aquí y puede ser cualquier cosa que quieras responder. Tengo una conversación y sus configuraciones eliminan al usuario cualquier clave que quieras que puedas usar usando la directiva pecan.

![vagrant](boot2.png "vagrant")

# Athorization filters

Revisemos la solución de tareas, por lo que debemos configurar los ganchos de autorización globales antes y después y aquí hay un ejemplo de por qué es posible que desee que, en este caso, inicie sesión como yo mismo y, por supuesto, si creé un hilo, tengo permiso para elegir un comentario como la mejor respuesta, pero para cualquier otro hilo porque no lo olvidé No tengo ese permiso, clima, ¿qué pasa si soy el administrador del sitio? ¿Qué pasa si soy el propietario del sitio y esas situaciones? para hacer lo que quiera, pero en este momento no podemos volver a mostrar aquí es donde entran en juego los ganchos de autorización. Podemos hacer esto en dos niveles primero, vayamos a nuestra política de conversación y puedo agregar un método antes de aceptar a mi usuario. fuego.

Porque la capacidad de autorización real se prueba si el usuario es un administrador, tal vez tenga un método como este o tal vez vaya a verificar las reglas si tiene algo así configurado o tal vez solo esté verificando la ID para ir a duerme bien Pro para este ejemplo, tengo un 90 de 13 de nuevo, tal vez tal vez haya una columna de personas llamada, puede mantenerlo tan simple como sea necesario, pero solo voy a verificar la identificación si la identificación es 13 digo que he estado aquí, luego devuelvo verdadero si vuelvo a cambiar y lo actualizo allí, vamos porque soy un administrador, tengo autorización completa, pero ahora una pequeña advertencia rápida, asegúrese de ejecutar sus condiciones como esta, otras palabras no No regrese pase lo que pase, así que no solo estamos por dar vuelta un poco aquí y le mostraré lo que quiero decir con eso si volvemos y le damos una actualización, él cree que todavía trabaja para ir, pero en realidad cambiamos el el flujo y la funcionalidad y no es lo que queremos, lo que sucede es si devolvemos una respuesta no no de t Este método será tratado como el resultado de que la política cumpla con el método que se acaba de llamar vamos a simplemente.

Nnunca llamaremos a ese método; sin embargo, si venimos y hablamos con usted antes del gancho, ahora lo hacemos bien, así que esto es importante, estamos comenzando a ver bien porque regreso del antes del gancho, nunca pasamos al siguiente paso porque se supone que los resultados de esto son su respuesta a esto, es por eso que debemos cambiarlo a si la ID de usuario es 13, entonces está listo, pero observe que nunca hago nada como esto está bien, así que ahora, si lo damos para actualizar, funciona, pero hagamos que falle, digamos que no soy un administrador, si lo actualizo, ahora lo hacemos desplegar y llamamos al método de habilidad real en esto es lo que queremos, así que solo tenga eso en cuenta, así que se trata de Hooks de autorización específicos de la política y, por cierto, también puede hacer uno después de que se pruebe la discapacidad si es necesario, sin embargo, para situaciones como buscar un administrador, no quiero hacer esto para todos política, entonces, ¿por qué no subimos de nivel y lo manejamos globalmente una vez Si vuelvo a cambiar, actualícelo. Soy administrador, pero todavía no puedo ver el botón de mejor respuesta. Regresaré con mi proveedor de servicios desactivado y lo manejaremos.

![vagrant](before.png "vagrant")

Muy bien, voy a regresar con mi proveedor de servicio externo y lo manejaremos aquí, diremos puerta y agregaré un gancho global anterior aquí, así que ahora se verá igual si la ID de usuario es 13 luego su administrador y está listo para continuar; de lo contrario, continúe para revisar.

![vagrant](admin.png "vagrant")

Entonces regresamos, podemos actualizar y ahora, una vez más, si el ID de usuario es 13, instantáneamente devolvemos verdadero.

# Guessing the ability name

Aquí hay una característica opcional que podría considerar que notará cuando autorizamos la incapacidad, proporcionamos el nombre de la habilidad y luego el modelo asociado; sin embargo, si echamos un vistazo debajo del capó, verá que un caballo tiene la habilidad en argumentos y lo hace por comprobando si proporcionó un nombre de habilidad explícito y si él no leyó el nombre del método de acciones del controlador de velocidad e intenta adivinar la capacidad en función de eso, así que esto es lo que quiero decir si eliminara esto por completo como este laravel intentará averiguar averiguar a qué método de política debe llamar cambiar.

![vagrant](store.png "vagrant")


No se preocupe mucho por el entrenador, pero podemos leer esto con bastante facilidad, analizar la capacidad de depuración de seguimiento o lo que está haciendo aquí es leer solo el nombre del método del controlador, de modo que devolverá el nombre del método que normaliza la pedofilia. Al leer este mapa de capacidad de recursos, verá que es solo un mapeo entre la acción del controlador y el nombre de la política asociada en esto, siguiendo las convenciones estándar, si podemos crear una nueva mejor respuesta, al menos esa es la forma en que lo estamos pensando aquí. así que ambos mapas para crear, lo que significa que si lo mantenemos así no va a funcionar del todo porque tenemos una acción de actualización aquí, así que si lo probamos si se actualiza.

Seleccionamos uno aquí, no, no estamos autorizados, sin embargo, si cambio esto para crear y si vuelvo actualizado, ya no lo vemos una y otra vez, eso se debe a que, desde nuestro punto de vista, codificamos esa capacidad para poder hacer esto, pero de todos modos si ahora selecciono uno que funciona tan bien, de nuevo, completamente opcional, puede acceder a esto si lo desea y creo que encontrará que se divide en una preferencia.

![vagrant](can.png "vagrant")

Y se desglosa en una preferencia, algo súper simple ¿te gusta la forma en que se ve esto autoriza la conversación? ¿Te gusta ser explícito sobre la habilidad? Nombrar tu llamada? Depende de ti sea explícito para que me quede.


![vagrant](store-reply-update.png "vagrant")

Intento ser explícito para seguir con mi acción de actualización porque eso tiene más sentido para mí y luego, finalmente, traigamos esto de vuelta a lo que teníamos antes y tenemos que ir a algo a tener en cuenta.

![vagrant](function-update.png "vagrant")

![vagrant](form-update.png "vagrant")

# Middleware base authentication

![vagrant](auth-routes.png "vagrant")

Ahora, además de autorizar una solicitud desde dentro de una acción de controlador, también podemos hacerlo en el nivel de escritura como un middleware, ilustremos esto como un ejemplo, digamos que solo puede ver una conversación si la creó, no tiene sentido tal vez como un borrador podría tener sentido. ¿Cómo lo haríamos? Dejemos saber en el momento.

Puede que tenga sentido. ¿Cómo lo haríamos? En el momento en que sepamos lo que estoy haciendo en el nivel del controlador antes de mostrar una conversación, autorizaremos que pueda verla para que podamos hacerlo así o, como aprendimos en el último episodio, podría eliminar ¿Depende de usted ahora, en este momento, no tenemos esta capacidad para encontrar lo que significa que si lo actualizo, el valor predeterminado es falso no autorizado cuando se cambia?

![vagrant](autorizar-vista.png "vagrant")

Qué cambia a nuestra política y vamos a duplicar esto, así que ahora vamos a verificar si el usuario dado puede ver la conversación y nuevamente es básicamente lo mismo, así que ahora si vuelvo y actualizo porque creé este hilo, tengo permiso, pero si lo comprobamos como invitado, no estoy autorizado.

![vagrant](function-view.png "vagrant")

Así que eso es principalmente un resumen, sin embargo, también podemos hacer esto, como señalé en la introducción del video, también podemos hacerlo como middleware, así que intentemos. Lo movimos, lo que significa que ahora cualquiera puede acceder a esta conversación y arreglarlo o pasar a nuestro archivo de rutas y ahora voy a decir aplicar y el identificador o nombre del middleware puede ser como en las directivas de su placa, a continuación, queremos el nombre de la habilidad en sí lo llamamos unos pocos y finalmente queremos que el comodín recuerde si hago referencia a la conversación aquí, aprovechará la vinculación del modelo de trampa, tomará el identificador aquí, será 5 tal vez y automáticamente atraerá la conversación con un ID de 5.

![vagrant](middleware.png "vagrant")

Esta sería otra forma de hacerlo si regreso y le doy una actualización como invitado, ya no estoy autorizado, pero si regreso a donde he iniciado sesión y obtengo la actualización, por supuesto, estoy autorizado para que esto funcione. También y nuevamente, depende de la preferencia, ¿le gusta que su autorización en su autenticación se realice como un middleware de ruta antes de llegar al controlador o le gusta hacerlo a través del juego en una acción del controlador? Sé que es difícil de sus desarrolladores a quienes les gustan ambos, así que depende de usted.


# Roles and abilities

Llevemos las cosas a un nivel superior en la revisión de la autorización basada en roles para los usuarios de su sistema, pero cada uno de esos usuarios desempeña un papel determinado, ¿no es un súper ejemplo? Tal vez John desempeñe el papel de moderador y se le permita moderar el formulario y eso solo. Sally es una gerente que puede moderar en cuarto lugar, pero tal vez también pueda publicar contenido o si usted Trenton cosas así y finalmente tal vez Frank es el propietario, por supuesto, puede hacer todo, pero tal vez también pueda revisar informes financieros que ningún otro papel puede desempeñar, así que ahora. Tenemos estos rollos para encontrar en cada uno de ellos. Los roles incluyen ciertas habilidades para que el moderador pueda editar el formulario, entre otras cosas, puede ser que el propietario pueda Ver informes financieros, se hace una idea y si alguna vez ha trabajado con WordPress antes, en realidad, esté bastante familiarizado. a su derecha para que los usuarios jueguen roles en cada una de esas reglas viene con ciertas habilidades. Creo que estamos listos para comenzar. Comenzará con una migración. Voy a poner todo esto en el mismo archivo para hacer una migración.

![vagrant](comments.png "vagrant")

Creo que estamos listos para comenzar. Comenzaremos con una migración. Voy a poner todos estos en el mismo archivo. Hacer una migración llamada crear tablas de reglas. Puede comenzar con sus roles. Vayamos allí y ahora y preguntaré. de nuevo, así que no voy a tener el método abajo aquí si muero, crea esos cada vez menos cuando quiero hacer un cambio, crearé una nueva migración y haré el cambio, están bien si de todos modos, así que si un usuario juega un rol en su sistema, bueno, por supuesto, comenzamos con grandes incrementos, a continuación, necesitamos el nombre del rol como moderador o gerente o suscriptor, cosas así que serán una cadena simple, pero luego, opcionalmente, configuremos una etiqueta personalizada para eso. Pueden ser situaciones en las que el nombre del Rollo sea un poco diferente de la etiqueta si dice que desea mostrarle al usuario la oferta de vuelos, pero no es obligatorio, tal vez si no incluye una etiqueta, escribiremos el nombre en mayúscula y prepárate para ir. Finalmente, incluiremos algunas marcas de tiempo y eso será para tiradas a la derecha por lo que las tiradas incluyen ciertas habilidades.

![vagrant](table-roles.png "vagrant")

Así que hagamos que uno también en el pasado haya llamado permisos Me gustan las habilidades y básicamente lo mismo si tu incapacidad tiene un nombre como editar formulario una vez más, la etiqueta podría ser algo diferente como editar el formulario o administrar el formulario cada vez que quiero que estas tablas sean bastante similares, de acuerdo, pero ahora, por supuesto, tenemos un minuto de relación aquí, por lo que necesitamos una tabla para almacenar en la conexión entre un rol en particular en una habilidad particular para inscribirse puede tener muchas habilidades en cualquier habilidad puede tener muchas reglas para ubicar esto una vez más y la convención de nomenclatura estándar que usa el nivel es el nombre de las dos tablas en singular en orden alfabético; en este caso, sería una tirada de bilidad desde cero para el rol, por lo que sería una Ensign biginteger, necesitamos una referencia a la ID de la regla, necesitamos una referencia a la ID de la capacidad, si lo desea, podemos incluir marcas de tiempo aquí y, finalmente, podemos configurar las restricciones externas para que pueda decir que la ID real es en realidad, una clave externa que hace referencia a la columna de ID en la tabla de reglas ahora, si elimina ese rollo, vamos a Cascade y borramos cualquiera de estos registros también y luego exactamente lo mismo para el ID de habilidad.

![vagrant](creation-tables.png "vagrant")

El esfuerzo es la columna de ID en la tabla de habilidades final, aquí para la clave principal, podríamos hacer esto de un par de formas, pero podría considerar convertirlo en la combinación de la ID real y la ID de habilidad de esa manera, esos dos deben ser únicos. ella podría hacer una clave primaria típica y luego varias ID e ID de capacidad para jenique bien, así que casi terminamos, pero piénselo, necesitamos una cosa más si un usuario puede tener cualquier número de roles, lo cual es muy común, necesitamos uno más en una tabla en capaz de almacenar la ID de usuario y la ID real asociada con ellos para que podamos copiar esto una vez más que estuvieron en esto será para el usuario de rol de usuario en orden alfabético y luego necesitamos el ID de usuario en cuestión, la idea de rol corresponde ay luego movamos esta columna hacia arriba, todo a la derecha en la tabla del usuario, lo mismo aquí y luego finalmente ID de usuario e ID real y creo que estamos listos para ir aquí, así que sigamos adelante y.

![vagrant](table-role-user.png "vagrant") 

`Cambio la palabra "table" por create` por que dará un error cuando quiera ejecutar la migración.

Divididos, tenemos un primer rol que un usuario coloca a continuación, tenemos una habilidad asociada con ese rol y tal vez estemos bien por un minuto, así que vayamos a nuestra tabla de reglas, imagina que tienes un cierto rol como moderador nuevamente que tiene ciertas habilidades. asociado con él, así que configuré que las habilidades de relación en esto serán una relación que pertenece a muchos el próximo cambio de luz.

![vagrant](a-muchos.png "vagrant") 

A continuación, cambie la luz a la habilidad y haga lo contrario si tiene una habilidad en particular y desea tomar todos los roles que incluyen esa habilidad que también será para relacionarse bien a continuación.

![vagrant](abilities.png "vagrant") 

Bien, a continuación, cambiaré al modelo de usuario y si nos desplazamos hacia abajo nuevamente, digamos que tiene un usuario y desea tomar todos los roles asignados a ellos, queremos estas reglas de relación y luego, una vez más, está bien, pero a continuación.

![vagrant](user-model.png "vagrant") 

Sería útil si pudiera asignar un rol a un usuario, así que, por supuesto, finalmente haríamos algo como esto, guarde el rol correctamente, obtengamos un nombre agradable como usted, señor Grant, o asigne un rol al usuario que no sea tan malo. Intentaré asignar un rol, esto aceptaría algún tipo de rol, no estamos seguros de si es una cadena o un objeto, o ambos, así que diría que esto salve a Wilson, es un objeto por el momento y será algo así. bien, echemos un vistazo a los usuarios que tienen rollos y se les puede asignar un troll.

![vagrant](user-rol.png "vagrant") 

Tiene ciertas habilidades y en realidad lo mismo si tenemos un rol y queremos asignar una nueva habilidad, tal vez podríamos hacer algo como esto permitido y luego aceptamos la habilidad y serían discapacidades muy similares, guarde la habilidad bien, así que ahora un El rol tiene habilidades y puede permitir una nueva habilidad y finalmente la habilidad.

![vagrant](allowTo.png "vagrant") 


Y puede permitir una nueva habilidad y luego, por último, la habilidad que nuevamente está en el Foro o publicar contenido o eliminar registros cosas como que cada habilidad está asociada con rollos y una última cosa aquí que logré olvidar porque tenemos marcas de tiempo para Claritin nuestro Migración, necesitamos aplicarlos explícitamente para que lo hagamos aquí y luego aquí y luego, finalmente, ¿estás segura mamá y siempre olvidaste que la primera vez estamos listos para comenzar

En los métodos que agregó al final agregue el código `withTimestamps`


Volvamos a rodar y, a menudo, estableceré los campos rellenables o los campos protegidos para saber porque estoy feliz manejando que por mi cuenta también podría extenderse desde un modelo donde se sienta este club hasta tarde, solo tenga cuidado y asegúrese de saber que estas haciendo.

![vagrant](guarded.png "vagrant")

![vagrant](guarded_habilities.png "vagrant")

Bien, así que volvamos a `php/storm`, ve a mi remodelación de uso si quiero agarrar, lo haré aquí abajo si quiero agarrar todas las habilidades y esta no es una relación elocuente, así que tenemos que llamarlo como un método estándar, pero podríamos hacer algo como esto bien, así que ahora verifique.

![vagrant](function-habilities.png "vagrant")


La página  deshacerse de todo esto está bien, así que imagina que tienes una lista de enlaces y uno de ellos será editar el formulario; sin embargo, por supuesto, solo deberías ver este enlace si tienes permiso para editar el formulario ahora que tenemos estas habilidades, pero Todavía quiero envolverlo. Me encargaría de que la funcionalidad de la puerta sea súper simple.Todavía me gusta que la directiva can pueda editar el formulario.Todavía quiero que esto funcione, así que asegurémonos de conectar estas habilidades en la funcionalidad de puerta del infierno de la guarida primero si ejecutamos esto en el navegador que no vemos.


![vagrant](lista.png "vagrant")

Voy a desplazarme hacia abajo hasta el método de arranque en el pasado, hicimos cosas como esta puerta Definir para que pueda imaginar hacer algo como tomar la capacidad de los usuarios autenticados y luego, para cada uno, básicamente, una definición dinámica con el nombre de la capacidad y usted entiendo la idea, sin embargo, puede haber algunos problemas allí porque en este punto no tenemos acceso para ser un usuario autenticado, así que en su lugar, configuremos una puerta global antes del filtro y lo aprendí de Joseph Solberg, digo que es una gran idea, así que digamos puerta antes vamos a ejecutar esto antes de cualquier autorización, por supuesto, que acepte al usuario, así como el nombre de la habilidad es recordar que la habilidad se pasaría.

![vagrant](gate-before.png "vagrant")

Pase por aquí el formulario de edición está bien, así que ahora en Disco se activa la parte posterior, tenemos un usuario autenticado, esta es la persona que inició sesión, pero ahora, ¿cómo verificamos si el usuario califica para discapacidad? Bueno, piénselo, tenemos una variedad de sus habilidades son correctas, entonces, ¿por qué no leemos esa matriz y verificamos si contiene la capacidad actual y devolvemos el resultado? Es tan fácil, así que ahora, si regresamos a Firefox y le damos una actualización, recuerde que es.

Una vez más, nos alegramos de que ni siquiera tengamos un sistema de autenticación, simplemente diré que no inicie sesión con ID y después de que mi registro de prueba sea 13 correcto.

![vagrant](login-using-id.png "vagrant")

No hago nada que haría a veces, lo que hago es llamar ``async` y lo que esto hará es básicamente reemplazar todos los registros existentes en la tabla dinámica con esta colección y cualquiera que no esté incluido en esta colección pero que esté en el La base de datos se eliminará, pero en este caso no quiero eliminar nada, así que voy a establecer esto en falso y, si echan un vistazo.

![vagrant](ass-role.png "vagrant")

Coloque la página de bienvenida en otra aquí si y solo si puede revisar los informes, agregaré un enlace para ver los informes, no es así si vuelvo y los obtengo.

![vagrant](view-re.png "vagrant")

Lo están, así que asegurémonos de que cambiamos para pensar que está bien, si tengo un rol, llamemos a `sync` aquí. Es una manera fácil de resolver este problema. Bien, ahora ejecútelo nuevamente y nos dejaron allí.

![vagrant](allowTo-sync.png "vagrant")


Entonces, finalmente, si volvemos a nuestra bienvenida, no olvides recorrer los puntos finales, así que tal vez tengamos uno llamado informes y encontrarlo realmente.

![vagrant](reports.png "vagrant")

Llame a los informes para encontrarlo realmente rápido, por lo que si visita `/reports`, le devolveremos los informes secretos en este momento.

![vagrant](get-reports.png "vagrant")

¿No es que en este momento alguien puede acceder a este punto final, bloqueémoslo, solo puede acceder a este punto final si puede realizar una accion determinada 

![vagrant](can2.png "vagrant")

Ese es nuestro paso final y luego habremos terminado, vamos a usar su modelo y sí, aquí estábamos esperando una instancia de rol cuando decimos que no obtendremos lo que nos dio es una cadena, luego rastreemos el rol, así que todos sabemos que el nombre es roll persifor fail así y luego lo retomaremos, así que ahora regresemos.

![vagrant](ass-role2.png "vagrant")

Y luego, por último, algo rápido sobre el modelo a seguir, hagamos lo mismo aquí, así que si tiene un rol y desea permitir editar el formulario, podemos esperar un objeto o una cadena como ese. 

![vagrant](allowTo2.png "vagrant")


































