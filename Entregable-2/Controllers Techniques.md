# Leverage route model binding
## ¿ Qué pasa si tenemos un articulo que no existe ?

Tenemos un error porque no tuvimos en cuenta el hecho de que el usuario solicitaría un 90 que no existe. Podemos resolver este problema cambiando nuestro método de buscar a buscar o fallar, intente encontrar el artículo con un id de lo contrario fallará.

    $article = Article::findOrFail($id);

También se podría dejar de esta manera

    public function show(Article $article){
        // $article = Article::findOrFail($id);
        return view('articles.show',['article'=>$article]);
    }

> Lo que está sucediendo es que laravel capturó esto y sabe que el artículo es el siguiente cuando solicitamos en la instancia de Oracle laravel lo suficientemente inteligente como para saber que está bien que desea una instancia de artículo en el comodín correspondiente.

> Le estoy diciendo dame el artículo donde la clave principal es `x` y dame el primer resultado y ese resultado se pasará a tu método show. Todo esto sucede detrás de escena.

> Termine el artículo, pudimos eliminar una línea para el método, de acuerdo, hagamos exactamente en todos los métodos, nos desharemos de eso y lo actualizaremos bien, creo que sí y esos son sus primeros auxilios para mejorar la claridad de sus controladores.

# Reduce duplication

> La próxima técnica, si me desplazo hacia abajo hasta el método de la tienda, note que validamos la solicitud y luego creamos un artículo asignando atributos, no hay forma de limpiar esto primero. 

    public function store(){
        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        return redirect('/articles')
    }


Podría usar el método de creación de artículos y aquí podemos proporcionar una matriz para asignar todo cuando hablamos de crearlo, asignará los atributos y lo guardará todo de una vez, lo que significa que podría eliminar esto y quedar así

    public function store(){
        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);

        Article::create([
            'title'=>request('title'),
            'excerpt'=>request('excerpt'),
            'body'=>request('body')
        ]);
        return redirect('/articles');
    }

Sin embargo, hay un pequeño error del que tener en cuenta.
Laravel quiere que sea explícito, pero le mostraré una manera de desactivar esto por ahora si fue explícito. una propiedad llamada `fillable` y aquí puede especificar todos los valores que se pueden enmascarar, en este caso, el `title` `excerpt``body`, así que ahora, si vuelvo y lo actualizo, funcionará una vez más. ya que estás a salvo y no terminas en situaciones en las que, por ejemplo, tomas todo, desde la solicitud todo y se lo pasas a Arco.
Esto se hace en el modelo

    <?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    class Article extends Model
    {
        //
        protected $fillable = ['title','excerpt','body'];
    }

Crear cosas como esta puede ser muy peligroso, piénselo, seguro que actualizará el nombre del usuario y su correo electrónico, pero ¿qué pasa si el usuario, por ejemplo, es un administrador o si es un suscriptor de pago o si su cuenta es una fuente activa de cosas que nunca debe permitir que el usuario cambie, debe tener el control de ello, pero si pasa todo de la solicitud, es trivial agregar parámetros adicionales como parte de esa solicitud para que pueda decir Wilshire, voy a actualizar el nombre del usuario al nuevo nombre, pero también voy a colarse en este estado de suscriptor y establecer esto como verdadero como parte de él y aunque no estoy pagando y aunque soy un invitado sin que ustedes sepan que pude actualizar el estado de mis suscriptores para asistir a estos son el tipo de escenarios contra los que laravel te está protegiendo; sin embargo, mientras no estés haciendo esto, eres libre de revertir esto, podrías decir que lo tengo, no sé un empleado de oficina para ayudarme a escucharlo. Entiende lo que estoy haciendo, así que no te gua Yo estaré a cargo de cualquier cosa, así que ahora, si le damos a esto otra vez, todo va a funcionar porque ahora ellos son los que no buscan nada, así que depende completamente de usted cuánta protección automática quiere.

    <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Article extends Model
    {
        //
        protected $guarded = [];
    }

Depende totalmente de usted la cantidad de protección automática que quiera, de acuerdo, regresemos a nuestro controlador de artículos y ahora esto es un poco más limpio, sin embargo, incluso podemos dar un paso más, notar los dos para caitian. Aquí declaramos el extracto del título y el cuerpo y luego estamos Esfuerza nuevamente el cuerpo del extracto del título y puede imaginar un formulario con 10 campos diferentes y con mucha duplicación después de que la validación sea exitosa, devolverá los atributos validados de la llamada a la función para echar un vistazo a esto si regreso validado atributos y regresamos, intentamos crear un artículo nuevo, pasaremos toda la validación y, efectivamente, obtenemos esta matriz y notamos que esta matriz es idéntica a lo que queremos aquí, lo que significa que podría reemplazar esto por completo con los atributos validados y todo todavía funcionaba o incluso podría ir más allá en línea, eso es completamente y terminamos con que validamos la solicitud y luego pasamos los atributos validados al método de creación y esto es lo que terminamos bien, ahora desplácese hacia abajo y hagamos lo mismo.

    public function store(){
        Article::create(request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]));
        return redirect('/articles');
    }

Ahora desplácese hacia abajo y hagamos lo mismo con el método de actualización. Ahora, en esta situación, no vamos a llamar a la creación de artículos nuevamente porque ya tenemos un artículo existente, así que en estas situaciones, en su lugar llamar y actualizar el método y pasamos los atributos, así que una vez más, puede guardar esto en un atributo o partícula en cualquier cosa que desee y luego puede hacer referencia aquí o una vez más y aterrizar ahora No puedo eliminar todo este parpadeo, así que quiero para que quede claro y tenga en cuenta que el método de creación asigna los atributos y los guarda en la base de datos de una sola vez, al igual que.

    public function store(){
        Article::create(request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]));
        return redirect('/articles');
    }

The Buttes y el todo-en-uno persistente van finalmente una última pieza del rompecabezas.Aviso en ambos casos: la validación es idéntica a esta, siempre sea el caso, a veces, la validación de la actualización será ligeramente diferente, pero en este caso idéntica. en mente, ¿por qué no extraemos esto a un método y lo llamaremos validar artículo así? Ahora validar artículo lo declara una vez y podemos hacer referencia a él.

    protected function validateArticle(){
        return request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
    }

# Consider named routes

Aquí hay otra técnica ahora si me desplazo hacia abajo hasta el método de actualización después de actualizar el artículo, redirigimos a esta página y, además, si vamos al artículo / índice una vez más, escribimos esa ruta completa a nada al respecto, ¿qué pasa si es algún punto en el En el futuro, cambiamos este URI, tal vez se convierta en / blog /article, ahora todas las ubicaciones donde te duele, ¿podría ser que estés? Necesitaré ser actualizado y el gran esquema de las cosas si no estás ejecutando un lado masivo, no es un gran cosa, pero sé que puedo ser una molestia, así que si quieres moverte, puedes usar algo llamado ruta con nombre y así es como, después de declarar la ruta, le daré un nombre llamado hija. Muestre ahora que puede usar cualquier convención de nomenclatura que desee, pero sea coherente al respecto en este caso, haré un enfoque similar sobre cómo nombramos nuestras vistas, así que ahora puedo hacer referencia a este URI usando el nombre aquí, por ejemplo, si vamos a artículo / índice aquí mismo voy a cambiarlo con la ruta nombrada como esta ruta artículos que muestran, sin embargo, si lo piensas, esta ruta requiere un comodín.

    Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');  

Qué es ese comodín para que pueda hacer eso como segundo argumento, puede hacerlo de dos maneras, primero puede proporcionarlo explícitamente y no trabajo, sin embargo, también podríamos proporcionar el artículo en sí y laravel automáticamente ahora para obtener el correcto nombre clave así que ahora?


    @extends('layout')

    @section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @foreach
            <div id="content">
                <div class="title">
                    <h2>
                    <a href="{{ route('articles.show', $article) }}">{{$articles->title}}</a>    
                    </h2>

                </div>
                <p><img src="../images/banner.jpg" alt="" class="image image-full" /> </p>
                {!! $article->excerpt !!}

            </div>
            @endforeach
        </div>
    </div>
    <div id="copyright" class="container">
        <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
    </div>
    @endsection

En laravel, ahora automáticamente buscará el nombre de clave correcto, así que ahora, si vuelvo a la página de artículos, cualquiera de estos seguirá funcionando como antes, pero ahora no estoy cubriendo que estés bien, así que ahora si vuelvo al controlador podemos actualizar esta redirección de los artículos de ruta de espectáculos de bicicletas. Muestre y luego revise el artículo, por lo que es posible que desee actualizar este también o si desea ceñirse a la frecuencia cardíaca de sus ojos si no se ve cambiando estos caminos muy a menudo, está bien. No sería religioso. esto de cualquier manera se reduce principalmente a sus necesidades y su preferencia adoptó ese enfoque.

Una cosa que encontrará en nuevos proyectos es que con frecuencia se vincula a un recurso específico, así que dame el enlace a ese artículo o ese proyecto desgasta a ese usuario y lo que personalmente haré en mis propios proyectos es visitar mi modelo y Addie. método llamado ruta aquí Devolveré una cadena que representa la ruta a ese artículo específico ahora aquí si no está usando rutas de nombres que hizo con recubrimiento duro o puede hacer ambas cosas si estamos tratando de hacer referencia de esta manera y ha terminado el artículo que sería la instancia actual cuando obtienes algo así.

    <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Article extends Model
    {
        //
        protected $guarded = [];

        public function path(){
            return route('article.show', $this);
        }
    }


Vayamos al artículo y eso es lo que nos colocamos y lo alcanzaremos porque creo que mejora un poco la claridad, así que, por ejemplo de cosas como esta ruta están cerradas. Muestra que tiene el artículo, está bien, es solo un poco más detallado que decir redirección a la ruta de artículos personalmente. Me gusta la forma en que se lee lo mismo sería cierto para el artículo / índice, manténgalo así si lo desea o cámbielo a la ruta de artículos y eso lo hará para su primer conjunto de técnicas para limpiar su controlador, así que esto es lo que terminamos con un vistazo a esto.

    public function update(Article $article){
        $article->update($this->validateArticle());
        return redirect($article->path());
    }

# Basic eloquent relationships


¿Cuál es el proyecto de ejemplo? Tenemos tres modelos elocuentes. Proyecto de usuario. Un artículo sobre la relación entre esos modelos, lo cual es muy importante, por ejemplo, el usuario, un artículo. ¿Cuál es la conexión allí? ¿Qué los une? También digamos que un usuario tiene artículos para imaginar en algún lugar de su base de código, usted tiene un incienso de usuario y desea acceder a todos los artículos de ese usuario específico. Idealmente, podríamos hacer algo como esto. Dame los artículos de los usuarios actuales. Necesito el método de un artículo en el usuario y mantendremos ese pensamiento,

     public function articles()
    {
        # code...
    }

 ¿qué pasa con la inversa si tenemos un artículo a la inversa? Si tengo una instancia de artículo y quiero capturar al usuario que lo escribió, ¿tal vez podría hacer esto?

    public function users()
    {
        # code...
    }

    public function articles()
    {
        # code...
        return $this->hasMany(Article::class); // select * from articles where user_id = 1
    }