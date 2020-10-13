# Collections

Escuchemos algunos conceptos básicos en laravel, el primer paso es el terminal de colecciones, pero, por supuesto, si está trabajando junto con phpstorm, también puede hacerlo desde la vista al terminal de Windows e incluso puede expandirlo y cambiar el tamaño a pantalla completa, así que esto funcionaría. a lo que quieras ahora Comenzaré por buscar el primer artículo en nuestra base de datos, así que ten en cuenta que solo estamos obteniendo un artículo y la respuesta obtenemos una instancia del artículo, lo que significa que puedo acceder a cualquiera de esos atributos de inmediato; sin embargo, si lo hicieras, eso es todos o muchos artículos en este caso, ¿qué tenemos como una docena de artículos diferentes? Están llenos, por supuesto, en ese caso no vas a entrar en arte.

Los artículos de Saints Row 4 cloquean y si dijera bien, tenía las etiquetas pero específicamente quiero que el nombre dentro de ellas no funcione y eso se debe a que nuevamente tienes una colección de etiquetas, por lo que lo que podemos hacer es pseudo aplanar usando esto estrella aquí etiquetas. Estrella y luego el elemento de nombre para cada uno de los que están dentro de la subcolección, así que ahora tenemos uno nuevo, pero se dará cuenta si ingresas a tu carrera y eso se debe a que algunos de estos artículos no tienen etiquetas asociadas, así que una vez más. tenemos que colapsarlos o aplanarlos bien y ahora obtenemos lo mismo de nuevo y podríamos agarrar los elementos únicos allí bien, así que sí, en este caso, la estrella básicamente tiene el mismo propósito que un colapso, tenemos sus etiquetas y luego para cada colección dentro de ella, queremos tomar el atributo de nombre de ella y luego, a partir de ese resultado, contraerla a un solo nivel de valores y darnos los elementos únicos dentro de ella y logramos que no sea una educación, así que lo que podría hacer es decir eso a algo como etiquetas relevantes y ya está listo para comenzar, pero ahora es una cosa menos para nosotros crédito, tal vez desee actividades dentro de un botón o algo así, pero desea que estén en mayúsculas, bueno, por supuesto. podrías ver las palabras directamente allí, pero Si quieres una vez más, puedes mapear cada uno de los elementos y devolverlo allí, así que ahora tenemos todo lo que necesitamos. Creo que es genial.

    use Illuminate\Support\Collection;
    use Illuminate\Support\Str;

    Collection::macro('toUpper', function () {
        return $this->map(function ($value) {
            return Str::upper($value);
        });
    });

    $collection = collect(['first', 'second']);

    $upper = $collection->toUpper();

## Available Methods

![vagrant](metodos.png "vagrant")

# csrf attacks with examples

Laravel facilita la protección de su aplicación de los ataques de falsificación de solicitudes entre sitios (CSRF). Las falsificaciones de solicitudes entre sitios son un tipo de exploit malicioso mediante el cual se ejecutan comandos no autorizados en nombre de un usuario autenticado. Laravel genera automáticamente un "token" CSRF para cada sesión de usuario activa administrada por la aplicación. Este token se utiliza para verificar que el usuario autenticado es el que realmente realiza las solicitudes a la aplicación. Siempre que defina un formulario HTML en su aplicación, debe incluir un campo de token CSRF oculto en el formulario para que el middleware de protección CSRF pueda validar la solicitud. Puede usar la directiva @csrf Blade para generar el campo token :.

    <form method="POST" action="/profile">
        @csrf
        ...
<   /form>


El middleware VerifyCsrfToken, que se incluye en el grupo de middleware web, verificará automáticamente que el token en la entrada de la solicitud coincide con el token almacenado en la sesión.

Tokens CSRF y JavaScript
Al crear aplicaciones basadas en JavaScript, es conveniente que su biblioteca HTTP de JavaScript adjunte automáticamente el token CSRF a cada solicitud saliente. De forma predeterminada, la biblioteca HTTP de Axios proporcionada en el archivo resources / js / bootstrap.js envía automáticamente un encabezado X-XSRF-TOKEN utilizando el valor de la cookie XSRF-TOKEN cifrada. Si no está utilizando esta biblioteca, deberá configurar manualmente este comportamiento para su aplicación.

## Excluir URI de la protección CSRF

A veces, es posible que desee excluir un conjunto de URI de la protección CSRF. Por ejemplo, si está utilizando Stripe para procesar pagos y está utilizando su sistema de webhook, deberá excluir la ruta del controlador de webhook de Stripe de la protección CSRF, ya que Stripe no sabrá qué token CSRF enviar a sus rutas.

Por lo general, debe colocar este tipo de rutas fuera del grupo de middleware web que RouteServiceProvider aplica a todas las rutas en el archivo routes / web.php. Sin embargo, también puede excluir las rutas agregando sus URI a la propiedad $ except del middleware VerifyCsrfToken:

    <?php

    namespace App\Http\Middleware;

    use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

    class VerifyCsrfToken extends Middleware
    {
        /**
        * The URIs that should be excluded from CSRF verification.
        *
        * @var array
        */
        protected $except = [
            'stripe/*',
            'http://example.com/foo/bar',
            'http://example.com/foo/*',
        ];
    }


## X-CSRF-TOKEN
Además de verificar el token CSRF como parámetro POST, el middleware VerifyCsrfToken también buscará el encabezado de solicitud X-CSRF-TOKEN. Podría, por ejemplo, almacenar el token en una metaetiqueta HTML:

    <meta name="csrf-token" content="{{ csrf_token() }}">

# Service container fundamental

El siguiente concepto central es el contenedor de servicio laravel y este es realmente importante porque es básicamente el fundamento de todo el marco, así que revisemos que se refiere para ayudarlo a comprender que vamos a construir nuestro propio contenedor solo como ejemplo, será realmente rápido el contenedor de servicio. exactamente lo que suena como un contenedor de servicios es un lugar para almacenar y recuperar servicios y comprar Servicios una especie de término general para cualquier tipo de datos podría ser una cadena Podría ser un número podría ser un objeto que podría ser una colección todo lo que quieras escuchar Solo puedo responder demostración, vamos a eliminar esto en unos minutos, pero creé una clase de contenedor que quiero usar ahora si vuelvo al archivo de rutas, juguemos con en nuestro inicio Sé que quiero que instales ese contenedor bonito clavo imagina cómo debería funcionar bien si quiero almacenar cosas podríamos usar cualquier método que queramos poner agregar laravel usa un método llamado encontrar, así que cuando pensamos que necesitamos obtener una clave ys Algunos tipos de datos que deberían estar asociados con él.

Así que creemos uno en la rectoría mayetta Estoy agregando una nueva clase llamada ejemplo, vamos a vincular un ejemplo clave y eso devolverá lo que necesitemos, así que en este caso estamos locos haciendo trampa en esa clase de ejemplo, pero a menudo qué que se necesita para crear una instancia de la clase es algo complejo tal vez hay tres o cuatro opiniones diferentes tal vez tenga que leer de un archivo de configuración, por lo que no siempre es tan simple como instanciar esto imagine que para la demostración tal vez haya algunos objetos que deban instanciarse para crear un ejemplo en una oración, está bien, pero de todos modos esto es.

![vagrant](service.png "vagrant")

Haga lo que quiera, puede regresar a Falls, puede lanzar una excepción de que no hay llave en el contenedor, todo lo que él quiera, pero esta es la estructura básica para el contenedor de servicio ahora, por supuesto, el contenedor de servicio de almacén tiene muchas más campanas y silbidos, pero este es el idea básica, encuentra algo en el contenedor y luego puede resolverlo en el contenedor, así que vayamos a nuestro ejemplo de clase y saeko y diremos que funciona ahora, por supuesto, y nos demos cuenta de que este tipo de lógica no funcionaría. más típicamente entraría.

![vagrant](resolve.png "vagrant")

Un proveedor de servicios y hablaremos de eso más en un par de episodios en este punto, podríamos decir example go y si vuelve a Firefox, la actualización funciona, encontramos la clave en el contenedor, esta clave se resolverá con lo que proporcionemos aquí. con cualquier Constructor rxr Setter o configuración que tengamos que leer y de esa manera, cuando lo hicimos, podemos resolver a Becky fuera del contenedor e instantáneamente tenemos su objeto listo para funcionar.

![vagrant](resolve2.png "vagrant")

# Automatycally resolve

Ahora entiendo que un contenedor de servicios es literalmente un contenedor para cualquier servicio en su aplicación, así que revisemos qué tan tarde son esos contenedores, ya que resulta que el contenedor de salud de alira es en realidad la aplicación en sí y podemos acceder mal usando esta función de ayuda de la aplicación, así que puedo decir siesta y al igual que antes, voy a vincular un ejemplo que devolverá lo que necesitemos, así que una vez más creemos esa clase de ejemplo y vamos y vamos a un nuevo horno de leña, ahora tenemos una nueva clave en el contenedor de servicio. Lo que ahora es buscar este servicio de comillas y comillas y podemos hacerlo de un par de formas, a menos que se haya dicho que usamos este método llamado función de ayuda resuelta resuelta en laravel, así que si digo resolver la clave llamada niveles de ejemplo, lo buscaré en un contenedor. Veré si tengo algo llamado ejemplo, regresemos, se encontraron dos que podríamos hacer esto y luego, una vez más, lo mencionaré para usted o con usted, así que si cambiamos.


![vagrant](example_co.png "vagrant")

Lo hicimos manualmente, no siempre queremos leer la configuración, busque todo lo necesario para que Amber construya estos objetos, en su lugar declarará lo que se necesita una vez para que obtengamos nuestra configuración de alimentos y podamos leer cualquiera de estos archivos de configuración proporcionando el nombre del archivo junto con el nombre de la clave, por lo que el nombre del archivo es Servicios, la clave es Servicios de alimentos. Bien, ahora obtuvimos una configuración de configuración que necesitamos y la pasamos a nuestra instancia de ejemplo, así que ahora una vez más, si le doy una actualización, puede ver que leímos el archivo de configuración en ese valor que se pasó a nuestra instancia de ejemplo. está bien, pero ahora aquí es donde se pone realmente genial, así que regresemos exactamente a lo que tenía antes de algo tan simple como eso, así que una vez más, si lo doy para actualizar, tenemos su instancia de ejemplo, pero ahora aquí es donde se vuelve un poco loco. si no hice esto en absoluto a menos que ahora cambie la clave a una ruta a la clase para que sea un ejemplo.

Lo pienso más tarde. Falls intentará ayudarte aquí. Se dará cuenta. Está bien, necesitas un ojo de colaborador. Parece que puedo instantáneamente ser un colaborador. Lo tengo, pero luego dirá o lo que necesitas. Foo, no hay tipo. asociado con él para poder inspeccionar que no sé si quién es un flujo o un número o qué no puedo ayudarlo aquí, así que si ahora intentamos ejecutarlo, obtendrá una excepción diferente que se llama resolución de enlace excepción, así que cuando obtienes esto, es una forma laravel de decir que estoy tratando de resolver esto fuera del contenedor para ti, pero no sé cómo y me has instruido cómo, por lo que es en situaciones como esta cuando necesitas ser explícito, aquí es donde tendrías algo como esto, podrías decir, está bien, vamos a vincular el ejemplo y construiremos nuestro colaborador, creo que sí y luego pasaremos al colaborador y luego la comida sería igual para ti, sabes lo que sea apropiado de nuevo. Y ahí lo tienes, ahora trabajando explícitamente sobre cómo crear un ejemplo si vengo volver y actualizar ahora funciona una vez más, así que la clave aquí es el orden de las operaciones en nuestro controlador, intentamos solicitar un ejemplo para revisar ese ciclo una vez más.


![vagrant](app.png "vagrant")

Bueno, ¿ya tenemos algo con esa clave exacta en el contenedor y en este caso la respuesta fue sí, así que simplemente desencadena la divulgación y el retorno como resultado? Sin embargo, en el caso de que no haya encontrado nada con esa clave, es cuando se mueve. en el siguiente paso avanza bien es esta cuerda escucha una clase y si es así, déjame ver si puedo construir eso para ellos automáticamente, está bien, así que te advertiré que todavía espero que esto te resulte confuso. Espero que pienses bien. Todavía no sé realmente por qué buscaría esto y es completamente normal para el curso en este punto de su aprendizaje. Solo necesito que comprendas los conceptos básicos generales para que podamos pasar a cosas como fachadas líricas y proveedores de servicios, así que terminaré mostrándote dónde puedes almacenar este tipo de pensamiento, ahí es donde notó que la ubicación típica es un proveedor en laravel que incluye un proveedor de servicios de aplicaciones para ti listo para usar aquí. vamos a registrar cualquier serv hielos en el contenedor de servicio, así que vamos a colocar todo eso allí mismo.

![vagrant](cola.png "vagrant")

# Service providers are the missing piece

Ahora que se siente más cómodo con el contenedor de servicios y luego con las fachadas de laravel, finalmente podemos pasar a los proveedores de servicios, así que eche un vistazo. Voy a ir a mi directorio de proveedores y preguntarle que sepa que aquí es donde se instalan las dependencias del compositor y como resulta que el marco de laravel en sí es Fulton a través del compositor, al menos la parte del marco de todos modos, si echamos un vistazo a esto, podemos ver que el marco está dividido en componentes en cada componente incluye un proveedor de servicios, así que aquí está el proveedor de servicios del sistema de archivos. elija otro, ¿qué tal los Osos de efectivo al proveedor de servicios de efectivo? uno más, ¿qué tal la validación? Sí, está el proveedor de servicios de validación y, de hecho, si solo buscamos un proveedor de servicios de laravel, por supuesto, vemos docenas de ellos, generalmente 1 / componente, ¿qué es exactamente un proveedor de servicios, es lo que parece que proporciona un servicio al marco y, como tal, puede necesitar registrar claves en el contenedor de servicios o puede que necesite tri gger algo de funcionalidad después de que se haya iniciado el sistema de archivos del marco, veamos qué hace este dos veces y resulta que cualquier proveedor de servicios puede implementar dos métodos de registro y arranque. El método de registro es para registrar claves en el contenedor de servicios.

![vagrant](registro.png "vagrant")

Si observamos que estamos registrando esta clave llamada archivos en el contenedor, es un Singleton, lo que significa que solo debería haber una instancia de ella y si la resolviera, recibiría una nueva instancia de esta clase ahora en por otro lado, el método de arranque, no creo que haya uno en este caso particular, lo haría si ese método se activara después de que todos los proveedores de servicios en el marco se hayan registrado, por lo que puede pensar en él como una especie de solución primero framework Recorre todos sus proveedores y le mostraré dónde se declaran si ingresa a su configuración en la rectoría y si nos desplazamos hacia abajo aquí, aquí hay una lista de proveedores que se cargarán como parte del marco y es Básicamente, el marco en sí, por lo que si nos desplazamos hacia arriba, es seguro que existe el proveedor de servicios del sistema de archivos que acabamos de ver, por lo que el marco se desplazará sobre esto y para cada uno llamará a un método de registro para cuál de estos proveedores s se registrará con el, comprará algo y será un contenedor de servicio que luego se puede usar en referencia y resolver Nextel una vez que todos los proveedores se hayan registrado, luego hará una segunda pasada y llamaré a un método de arranque en el proveedor, por lo que esta sería su oportunidad nuevamente para activar algún tipo de funcionalidad con la seguridad de que todos los demás proveedores se han registrado u otras palabras si necesita activar alguna funcionalidad después de que se haya registrado el marco, este es el método que desea registrar para el sistema de archivos, estamos registrando esta clave llamada archivos en el contenedor y eso la resolverá en una nueva instancia de esta clase de sistema de archivos, por lo que significa que si la clave es.

![vagrant](file.png "vagrant")

Hagamos que Tribeca mire hacia atrás en los proveedores de servicios en un momento una vez más, tendremos una clase llamada ejemplo y manejaremos el ejemplo y todo lo que esto va a hacer es decir que funciona a continuación. Quiero crear una fachada que sea proxy de esta clase. creará otro aquí, lo llamaré ejemplo de fachada, de acuerdo y para que esto funcione, necesitamos extender la clase de fachada y finalmente anulemos el método de acceso de fachada tcat, esto devolverá la clave en el contenedor y esto es lo que podemos También lo haré primero en pasos, sí, podemos definirlo como cualquier cadena que queramos.

![vagrant](get.png "vagrant")

Encontrar una excepción de resolución, por lo que esas son las situaciones nuevamente en las que desea ser explícito en el contenedor de servicios y puede usar una cadena o nuevamente puede usar ese cierre en la cadena al final del día y luego hacer que devuelva lo que sea Necesario ahora vendimos en la pieza que falta así que si lo probamos una vez más.

![vagrant](apikey.png "vagrant")

Vendimos la pieza que faltaba, así que si lo intentamos una vez más, funciona una vez más. Terminaré con esto. Espero que esto se sienta confuso. No somos las palabras si tuviera que adivinar cuál es el mayor obstáculo para los recién llegados dice que yo diría que probablemente esté relacionado con el contenedor de servicios y los proveedores de servicios, incluso el término proveedor de servicios puede parecer confuso y elegante y luego, sobre su cabeza, no es tan complicado, pero lleva un poco de tiempo, así que si termina con esto y todavía estás confundido, no sabes muy bien cuándo lo alcanzas, eso está totalmente bien en este punto, mi único objetivo es que comprendas los conceptos básicos de lo que está sucediendo aquí, así que eso se hace en el próximo episodio. algo un poco más amigable hablaremos de correo.