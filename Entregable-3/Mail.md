# Send Raw Mail

Tenemos un formulario que acepta la dirección de correo electrónico, pero aprendamos a enviar el formulario y luego enviemos un correo electrónico a ese usuario.

Ahora si miramos la vista aquí tenemos un formulario bastante simple, tenemos nuestro correo electrónico y ponemos un botón para enviar el formulario.

    <!DOCTYPE html>
    <html lang="en" class="h-full">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mail Lesson</title>
    </head>
    <body>
        <form action="" method="post">
            @csrf
            <div class="mb-5">
                <label for="email"></label>
                <input type="text" id="email" name="email">
            </div>
            <button type="submit">Submit</button>
        </form>
    </body>
    </html>

Tenemos nuestro correo electrónico y ponemos un botón para enviar el formulario en el punto de contacto, ¿qué tal cuando envía el formulario, los Mets hacen una solicitud de publicación en el mismo punto final y llega a una acción de `store`

    Route::post('/contact','ArticlesController@store');



Nuestra acción `store` es aquí  donde enviamos el correo electrónico. Recibí un par de cosas primero, sabes que podemos leer cualquier entrada usando el ayudante de request.

    public  function store(){
        $email = request('email');
    }

Tenemos que tener cuidado, enviaremos un correo electrónico a una validación de dirección de correo electrónico no válida en el front-end y back-end con el back-end en nuestro controlador, ya debería saber que puede validar la solicitud así.

    public  function store(){
        request()->validate(['email' => 'required|email']);
        $email = request('email');
    }

Ahora que puede validar la solicitud, la dirección de correo electrónico es obligatoria y debe ser un correo electrónico válido, nunca llegará a este punto en la página anterior o Foreman nuevamente, pero proporciona comentarios.

Vamos a devolver el error en la pantalla para que el usuario vea que está mal lo que está intentando hacer

    <form action="" method="post">
        @csrf
        <div class="mb-5">
            <label for="email"></label>
            <input type="text" id="email" name="email">
            @erro
                <p>{{$message}}</p>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>

Y hay un par de formas de hacer esto, en primer lugar, esta es la forma más sencilla de enviar un correo electrónico con fachada de correo electrónico. 
Lo pondré en un correo de fachadas de soporte limitado y usaré este método sin procesar aquí, lo estamos enviando por correo electrónico de texto.
Funciona como un acercamiento aquí donde podemos definir los parámetros del ejemplo de mensaje quién es el mensaje para la persona esa dirección de correo electrónico antes del próximo cuál es el asunto ese correo electrónico para decir hola y tienes la idea de que el correo electrónico ha sido enviado por qué no reescribimos el reverso de la página de contacto.

    public  function store(){
        request()->validate(['email' => 'required|email']);
        Mail::raw('Todo correcto', function($message){
            $message->to(request('email'))->subject('Hello world!');
        });
        return redirect('/cotact');
    }

Y creo que estamos listos para intentarlo, así que regresaremos a Firefox y recargará la dirección de correo electrónico proporcionada por la página y, si la enviamos, lo hace para su ex, vuelva a esta página, pero no puedo notar que no hay comentarios. Pero primero intentemos leer el correo electrónico para saber cómo se envió, así que no se olvide en el archivo .env, aquí abajo, en la sección central, especificamos que el controlador masculino está bloqueado, lo que significa que no estamos enviando un correo electrónico, simplemente mensaje de inicio de sesión en un archivo, ahora descubrirá si tenemos un regalo para usted y este directorio de registros de almacenamiento y hay una gran cantidad de archivos y tenemos nuestro correo electrónico, tenemos nuestro asunto, quién es también, así como el cuerpo y un lugar muy rápido. fue hola en example.com Define. Esa es la dirección de correo electrónico Switchback que puede encontrar aquí explícitamente, pero también hay una dirección de correo electrónico global desde la que puede enviar.

Pensando que limpiará su archivo de correo de configuración, si nos desplazamos hacia abajo, verá que aquí está la dirección global de remitente y puedo notar que está predeterminada, así que si desea cambiarlo, si todos los correos electrónicos vendrán de example.com, entonces vaya a su archivo de entorno, lo agrega aquí y todos los correos electrónicos de características se enviarán desde allí, veamos una vez más, envíelo al correo electrónico aquí está el nuevo mensaje y noté que el frente se ha actualizado para admitir ese ejemplo. Com, así que ahora terminemos proporcionando un poco más de retroalimentación como vimos que enviamos un correo electrónico y se redirige, pero no hay indicios de que funcione y será muy confuso para la gente.

Lo que agrega un mensaje flash a un mensaje flash son básicamente datos que se colocan en una sesión para exactamente una solicitud, por lo que cuando no nos gusta este mensaje de correo electrónico enviado, lo que sucederá es cuando volvamos a escribir en la página de contacto una clave de mensaje aparecerá en la sección nuevamente para exactamente una solicitud, así que verifiquemos la entrevista y podemos hacerlo.

    public  function store(){
        request()->validate(['email' => 'required|email']);
        Mail::raw('Todo correcto', function($message){
            $message->to(request('email'))->subject('Hello world!');
        });
        return redirect('/cotact')->with('message','Email sent!');
    }

Solo busca una entrevista y podemos hacerlo. No sé, tal vez aquí abajo y podemos decir: Miro en la sesión, ¿tenemos algo para ese mensaje flash? Si es así, escuche la ropa que envíe el correo electrónico si le enviamos un mensaje de texto y ahora tiene su mensaje flash y, por supuesto, podemos resolver esto como queramos, así que ¿qué tal el texto?

    <!DOCTYPE html>
    <html lang="en" class="h-full">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mail Lesson</title>
    </head>
    <body>
        <form action="" method="post">
            @csrf
            <div class="mb-5">
                <label for="email"></label>
                <input type="text" id="email" name="email">
                @erro
                    <p>{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Submit</button>
            @if (session('message'))
                <p>
                    {{session('message')}}
                </p>
            @endif
        </form>
    </body>
    </html>







# Simulate an box using mailtrap

Es útil que podamos ver un registro de correo electrónico, pero ahora usemos mailtrap para simular una vida real en la caja ahora hay un plan gratuito para proyectos personales Ya tengo una cuenta, así que la firmaré bien, creemos una nueva bandeja de entrada llamada Emma. Veré todas las criaturas que requerimos aquí mismo, ya establecí una contraseña de recordatorio, la contraseña y ahora el porche ya está configurado en 2525, por lo que debería ser todo lo que necesitamos, tanta tranquilidad que el formulario de contacto original enviará un correo electrónico a Foo si anuncia qué bolsa Si solo toma 30 segundos, lo notará para enviar correos electrónicos de texto aquí, en la próxima lección, aprendamos cómo enviar correos electrónicos HTML.

# Send HTML email using mailable classes

Las clases de método califican para correos electrónicos simples de texto sin formato, pero para algo más que eso, queríamos un enfoque diferente. Mírelo y verá un comando de creación para una clase de correo electrónico para ayudar a hacer patriarcas masculinos y preparar comida y qué representa esto bien. para un poco más tarde que los contactos habituales.

    php artisan make:mail ContactMe

Entonces, si ejecuta esos comandos, verá una nueva carpeta de correo , aquí es donde construimos el mensaje y en este momento se hace referencia a usted, tal vez tengamos alguna carpeta de entrevistas del directorio de correos y eso ' Se me contactará. Tengo que desplazarme hacia abajo para crear un directorio de correo electrónico que se comunique conmigo nuevamente, así que ahora enviaremos un mensaje de texto pero

Volveremos a que nuestros contactos ya no envíen esto, así que lo ejecutaré y en su lugar diré correo a la dirección de correo electrónico desde el teléfono y nos vamos para enviar una nueva instancia de ese contacto Miller Choque y eso es todo lo que hay que enviar.

    public  function store(){
        request()->validate(['email' => 'required|email']);
        Mail::raw('Todo correcto', function($message){
            $message->to(request('email'))->subject('Hello world!');
        });


        Mail::to(request('mail'))->send(new ContactMe());



        return redirect('/cotact')->with('message','Email sent!');
    }

A menudo, cuando envíe un correo electrónico, necesitará hacer referencia a los datos.Tal vez los datos sobre el usuario actual o el uso de lecciones de muestra de pruebas de agua que lo usan aún no han visto algún tipo de datos que deberían transmitirse a la sensación de la misma manera que siempre hazlo, continuemos con el ejemplo tonto. Tal vez queramos enviarle un correo electrónico a la persona sobre algún tipo de tema. Parece que quiere escuchar más sobre algún tipo de tema, ya entiendes.

Por el momento, por supuesto, esto funcionará, regrese a mí oa la clase y diría que está bien, voy a esperar algún tipo de tema en mi opinión y hay algo bueno en mí, algunas clases pequeñas, cualquier propiedad pública, no solo privada. El valor de la propiedad pública pública estará disponible instantáneamente dentro de la vista.

Simplemente nos apasiona y esto suele ser el resultado de una consulta de base de datos o algo de un formulario y vamos a contactarnos sobre este tema. Envía un correo electrónico a Foo y vuelvo a cambiar, parece que quieres saber más sobre este tema.

    public  function store(){
        request()->validate(['email' => 'required|email']);
        Mail::raw('Todo correcto', function($message){
            $message->to(request('email'))->subject('Hello world!');
        });
        Mail::to(request('mail'))->send(new ContactMe('shirts'));
        return redirect('/cotact')->with('message','Email sent!');
    }

# Notifications versus mailables

Hasta ahora en este capítulo, hemos recurrido exclusivamente a las clases Mailable para enviar correos electrónicos; sin embargo, existe un enfoque alternativo que también podría considerar. Una clase de notificación se puede utilizar para notificar a un usuario en respuesta a alguna acción que realizó en su sitio web. La diferencia está en cómo se notifica al usuario. Claro, podemos enviarles un correo electrónico, pero también podemos notificarles a través de un mensaje de texto, una notificación de Slack, ¡o incluso como una tarjeta postal física!

Notifique al usuario y eso es a través de la fachada de notificación, así que trabajemos con el ejemplo. Dije un pago / creación de punto final; sin embargo, verá que requiere un usuario de inicio de sesión y, si lo cambié, podría estar adolorido si puede ver claramente que aquí notó el middleware apagado que ya revisamos y se registró como John, así que quiero venir a visitar esa página, podemos acceder a ella y todo lo que tengo aquí es un botón que estimula que se realice algún tipo de pago, así que cuando hagamos clic en el botón simulará el pago. y luego enviar una notificación al usuario de que el pago de hecho se ha recibido, así que lo envío ahora, verá que quiere una solicitud posterior a / payments pero no nos hemos molestado.

Realice una solicitud posterior a / payments in que dirigirá la tienda de aplicaciones del controlador de pagos y también requiere que su hijo lo haya hecho bien, así que volvamos al controlador de pagos, agregaremos un nuevo método de tienda y, sin embargo, aquí cuando realmente voy a realizar los pagos harán creer que tenía sentido y Logan luchó contra un correo electrónico de notificación hasta este punto, incluso usando mujeres deciden enviar correos electrónicos y eso es genial, sin embargo, un enfoque alternativo es usar la notificación si Assad y yo le mostraremos algunas formas es único, así que llegaremos allí y puedo decir que la notificación envíe una notificación a la persona que ha iniciado sesión actualmente y una notificación ahora es una notificación de que se ha recibido el pago, así que hagamos una notificación llamada pago recibido bien, así que ahora si subo al East Side Bar, verás alguno después de que te trate, ahora tienes un pequeño Dry Creek, pero también y el directorio de notificaciones en la tienda, las cosas pueden volverse un poco confusas porque crees que estás bien, deberíamos este sea un hombre o North Station y responda a esa pregunta.

Transwell es un poco complicado a veces hay superposición, pero como regla general, lo bueno de las notificaciones es que no se notifica al usuario y responde a alguna acción que tuvo lugar en el sitio web, por lo que realizaron un pago, cierran sus cuentas, les gusta algo todas estas son respuestas a una acción que tuvo lugar ahora, entonces lo que necesita para comprar notificaciones es la forma en que las notifica y toma muchas formas, no tiene que ser ningún correo la misma API, por lo que puede enviarles un correo electrónico. mensaje de texto, puede notificarlos en caso de holgura, incluso incluye un paquete de apoyo para enviarles una postal física en respuesta y también usa la misma notificación que se encargó de eso en contra de la técnica de comida tradicional o simplemente está enviando un correo electrónico, así que creo encontrará que es un poco, pero dependerá de usted decidir que no hay reglas estrictas allí.

¿Hay un formato del que hablaremos más adelante? Creo que estamos listos para enviar este correo electrónico cuando nuestro usuario haga clic en el botón de pago. Ellos presionarán el método de la tienda. Luego, enviaremos una notificación al usuario que inició sesión y esta es una notificación. apague Firefox, lo intentaré de nuevo y olvidé redirigir, pero está bien si se supone que estamos de regreso aquí y nos desplazamos hacia abajo y notamos cómo esto se traduce en una línea que representa básicamente un párrafo, la introducción a la notificación, la próxima acción que piensa en llamar a acción, pero es un botón con este texto en una URL a nuestra página de inicio, finalmente tenemos otro, así como el grado en efecto, hola es el saludo predeterminado, ¿qué pasa con él?
Cambie el saludo a sobre lo que está pasando y tendremos una línea aquí, hagamos otra línea de texto básico de lorem ipsum, luego tendremos nuestro botón de llamada a la acción como registrarse una línea más para decir gracias, ¿cuál debería ser el tema? 7 minutos como pago recibido, que nuevamente se basa en el nombre de la clase, está bien, sin embargo, cuando lo modificamos un poco cuando decimos que eres letra, el pago se recibió en un correo electrónico, así que si lo recibimos de nuevo, haz el pago a través de Ruta a correo electrónico y ahí lo tienes, haciendo clic en el botón nos llevará de vuelta a nuestro lado aquí.

Notificación enviar el pago del usuario recibido está bien, pero prefiero decir que solicite al usuario que les notifique que el pago se recibió un aviso mientras escribo que refleja más la forma en que naturalmente lo haríamos esta semana. Podemos hacer esto mismo, eche un vistazo si Echa un vistazo a nuestro modelo de usuario listo para usar requiere Salud incluye el notificable directamente llamado Echemos un vistazo, observe que estamos fuera de las notificaciones, si echa un vistazo a esto, aquí están los tres métodos específicos de notificaciones que podemos llamar La única diferencia entre notificar y están bien ahora es si se envía de inmediato o se envía con usted y eso es efectivamente lo mismo, está bien, así que si cambio el controlador, una vez más, puede hacer notificaciones y caminar y ser útil si está notificando a una colección de usuarios para cualquier otra cosa si está notificando a un calentador con este enfoque y se lee mucho más claramente como una variable de usuario, simplemente puede decir que el usuario notifique el recibo de pago Me gusta Mucho está bien, pero de todos modos, si está emocionado, el próximo capítulo está dedicado a Notificaciones, aprenderá a enviar mensajes de texto con varilla o incluso a almacenar las notificaciones en la base de datos para que puedan presentarse al usuario la próxima vez que cargue el sitio web, es bastante bueno .
