# Basic Eloquent Relationships

Ahora que comprendes las relaciones básicas, hemos decidido que un artículo pertenece a un usuario en un usuario tiene muchos artículos, pero para que eso funcione, necesitamos alguna asociación entre el artículo y el usuario, por lo que es lógico. que necesitamos una nueva ID de usuario, llámalo bien. Volveré a nuestra migración de tabla de creación de artículos. ¿Por qué no lo hiciste? Esto será un entero grande sin firmar y vamos a hacer referencia a la ID de usuario, así que ahora tenemos una manera para asociar un artículo con un usuario y realmente rápido si tiene curiosidad sobre el entero sin firmar de forma predeterminada con las migraciones de laravel, la clave principal se establecerá en un entero grande, así que aquí está la migración de la tabla del usuario que viene con cada instalación de laravel. un gran incremento que es una clave primaria sin firmar con un tipo de un entero grande, así que cuando establezcamos nuestras claves externas, queremos asegurarnos de que coincidan con la clave externa también en el tipo en el que pueden ocurrir bien, así que ahora voy a Repetir nuestras migraciones a y si vuelvo a la tabla, además, hemos perdido sus datos si actualizo, pero ahora tenemos una columna de ID de usuario bien, tan a menudo cuando está jugando de esta manera, es útil tener datos ficticios, por ejemplo, una forma de decir rápidamente dame un usuario o dame rápidamente un artículo y no solo es útil para las pruebas manuales, sino que también puede hacer referencia a esto para sus pruebas automatizadas y hablaré sobre el final de la serie, por lo que si abro la carpeta de la base de datos de la barra lateral, verá esto New One Factory y listo para usar, tenemos un usuario Factory piensa en esto como una forma de ampliar rápidamente a los usuarios básicos.

Para qué sirve extraer esta biblioteca de figuras que nos permite generar rápidamente y generar cualquier forma de datos ficticios un nombre, un párrafo, una palabra y un número de palabras en el correo electrónico. Guardo el correo electrónico. Hay cientos de opciones diferentes. Es muy útil en situaciones en las que no No importa cuál sea el valor, solo quiere un párrafo para el nombre o un correo electrónico o una dirección de todos modos, tenemos esta Fábrica lista para usar, podemos usarla para que Peach sea un artesano y llamaremos a un ayudante. función llamada Factory Quiero crear rápidamente una fábrica para un usuario, por lo que obtenemos la ruta al usuario y llamamos a la función create Factory, él dio el nombre de la clase y luego llama a crear, así que lo que hará es desencadenar una disfunción que generará una conjunto único de datos ficticios y luego los persistirá y ahora vuelvo a la tabla plus y actualizo tenemos un nuevo usuario, hagámoslo de nuevo y ahora tengo dos usuarios o digamos que queremos cinco usuarios diferentes. Puedo proporcionar el recuento como segundo argumento a la fábrica fu nction bien ahora debería tener un total de 7 usuarios, así que no se olviden de esto, es realmente útil durante la prueba, retoque, bien, el siguiente paso, aunque quiero un artículo y si trato de ejecutarlo como si me quedo mucho tiempo un artículo para mí no va a funcionar y eso es porque no tenemos un artículo Fábrica, no hay nada ahí bien, hagamos un PHP artesano y si subo a la sección de creación, verá que hay una opción para hacer una fábrica, así que podría decir primero si no sabe lo que puede pasar por ella, siempre amigo sobre el comando, está bien, así que las opciones dadas, así como un nombre y el nombre es el nombre de la clase y también noté que podemos darlo. una bandera m también para hacer referencia al modelo.

![vagrant](faker.png "vagrant")

![vagrant](fore.png "vagrant")

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


        public function user()
        {
            # code...
            return $this->belongsTo(User::class);// user id
        }
    }

# Many to many relationship with linking tables

Si tiene una relación un poco más confusa y eso es lo que pertenece a muchos, aquí tenemos nuestra clase de artículo una vez más y creemos que es muy común asociar impuestos con un artículo, por lo que si escribo un artículo sobre la ayuda de Lyra, por ejemplo, podría ponerle una etiqueta de trabajo Podría darle una etiqueta de PHP Podría darle una etiqueta de laravel, por lo que parece que un artículo tiene muchos impuestos al menos a primera vista, está bien, pero no hagamos lo contrario si tuviera una etiqueta ¿una etiqueta pertenece a un artículo? Eso no parece estar un poco más abajo, así que si tuviéramos un artículo llamado aprender laravel, podríamos agregar una etiqueta de PHP laravel, educación laboral, cosas así, bien, pero eso significa que el alaire aguantó.

No, eso no es correcto, esta etiqueta de laravel podría pertenecer a muchos artículos, por lo que ahora tenemos un tipo de relación ligeramente diferente aquí en el artículo, puede tener muchos bocadillos, pero una sola etiqueta también puede tener muchos artículos, así que esto es lo que llamamos una relación mini a muchos y El artículo puede tener muchas etiquetas y una etiqueta puede tener muchos años. Representamos que si quiero tocar las etiquetas de un artículo, voy a regresar, no tiene muchas, pero en lugar de pulmones, demasiadas.

    public function tags()
    {
        # code...
        return$this->belongsToMany(Tag::class);
    }

![vagrant](modelo.png "vagrant")

    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('article_id');
            $table->timestamps();
        });
    }

Y se agrega la llave foranea

     public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('article_id');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();


            $table -> unique(['article_id','tag_id']);

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

# Display all tags under each article

Muy bien, hagamos un resumen rápido, tenemos usuarios, tenemos artículos en cada artículo que pertenecen a etiquetas de identificación de usuario y eso es un poco más complicado porque la etiqueta no pertenece a un artículo, una etiqueta junto a demasiados artículos en un artículo podría pertenecer a demasiadas situaciones configuramos una tabla para asociar un artículo y una etiqueta, así que ahora me gustaría mostrar cada etiqueta debajo de un artículo. Eché un vistazo usando nuestros pequeños proyectos de demostración. Aquí es donde mostramos un artículo, así que es extraño que tengas razón. aquí abajo, dentro de una etiqueta de párrafo, lo que podríamos hacer es decir bien para cada una de las etiquetas de Artículos, vamos a mostrar y tal vez obtener una muy simple, así que averiguaremos la URL en un momento, pero al comienzo mostrará el nombre de las etiquetas, así que si Vuelva a Firefox y actualice. Ahora visitaré cualquier artículo en la parte inferior, seguro que podemos ver que se ha aplicado algún impuesto.

    <p>
        @foreach ($article->tags as $tag)
            <a href="#">{{$tag->name}}</a>
        @endforeach
    </p>

O también de la siguiente manera

           <p>
                @foreach ($article->tags as $tag)
                    <a href="/articles?tag={{$tag->name}}">{{$tag->name}}</a>
                @endforeach
            </p>

El método index debeía verse así

    public function index(){

        if(request('tag')){
            $articles = Tag::where('name',request('tag'))->firstOrFail()->articles;
            
        }else{
            $article = Article::latest()->get();
        }
        
        return view('articles.index',['articles'=>$article]);
    }

# Attach and validate many to many inserts

Parchee y muestre todas las etiquetas para náutica, asegurémonos también de que podemos adjuntarlas durante el ejemplo del servidor de proceso de creación. vamos a artículo / crear y el otro vamos así que hagamos esto copiemos este bloque aquí para que podamos reutilizarlo lo mejor ahora será una sección para nuestras etiquetas, tendremos una selección aquí, hablaremos de esto más en un momento y luego Tendré el mensaje de error para los ataques aquí en esta nota. Un consejo rápido cuando use la directiva de error como esta. Le aseguro que puede captar el mensaje de error, así que también hay una forma abreviada de que podría usar la variable de mensaje y eso generará el error mensaje para lo que sea que esté esta clave en el mensaje de vuelta, cualquiera de los dos funciona correctamente, tenemos nuestra sección de etiquetas, pero aún no hemos agregado ninguna opción.

    <div class="field">
        <label for="body" class="label">Tags</label>
        <div class="control">
            <select name="tags[]" id=""></select>
               @error('tags')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
        </div>
    </div>

Muéstreme que lo tengo y si llega a uno, mostraremos una opción donde el valor que se envía a la base de datos es el ID de la etiqueta y luego la etiqueta que ve el usuario será simplemente el nombre del paquete, pero sí, si tuviera que hacerlo regrese a Firefox y actualícelo, seguramente dirá que no sé qué variable de texto está bien para que podamos manejar esto.

    public function create(){

        return view('articles.show',['tags'=> Tag::all()]);
    }

Un poco más limpio si vuelvo y actualizo ahora podemos ver todo el texto y nuevamente tomar nota de que el valor de cada uno será el ID en la etiqueta porque eso es realmente lo que nos importa, bien, así que pensemos en ello si completamos Saque el formulario y envíelo, luego nos dirigiremos al método de la tienda, así que para comenzar solo como una demostración, voy a descargar todo lo solicitado para que lo vea, ejecutemos, parece que la etiqueta de la guarida Hill enviada y, por supuesto, usted Veremos que las etiquetas es igual a una matriz, no la número uno y que quede claro esta semana.

     <div class="field">
                    <label for="body" class="label">Tags</label>
                    <div class="control">
                        <select class="textarea @error('body') is-danger" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                        <select name="tags[]" id="" multiple>
                            @foreach
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach

                        </select>
                        @error('tags')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


Baje la tecla de comando en la Mac. Puedo seleccionar cualquier cantidad de impuestos y luego, cuando envié todas esas etiquetas, se agrupan en una sola matriz y luego se pueden adjuntar y nuestra gente que nos gusta, así es como funciona, así que volvamos Voy a volver a mi controlador y vamos a tuitear esto un poco por varias razones primero un par de episodios para ir, recuerde que actualizamos nuestra migración de artículos para incluir un usuario un usuario crea un artículo pero en nuestro caso aún no hemos hablado sobre la autenticación y resulta que todo el próximo capítulo tratará de eso hasta entonces, simplemente voy a codificar y a la identificación de usuario y luego volveremos a eso más tarde para que Parece que no puedo crear este artículo todavía porque no hay una ID de usuario. Comenzaré por crear una instancia. Se enviará un artículo a través de los atributos validados y luego estableceré la asociación aquí, así que nuevamente lo cubriré una vez que aprenda sobre la estación desactivada. de Hill hacen cosas como esta identificación del sábado al a quien esté conectado actualmente o puede usar relaciones elocuentes, por lo que podría decirme el usuario que inició sesión y luego tal vez tenga una relación como esta o cree o guarde más probablemente un artículo cuando adopte este enfoque para extranjeros clave en este caso yo sería el ID de usuario la clave externa sería automáticamente estas son todas las cosas que aprenderá sobre lo mínimo por ahora artículo instanciado que relacionamos con estos campos luego establecemos el propietario de un usuario que escribió el artículo y luego podemos persistente, así que ahora en este punto, creo que aún no hemos configurado las etiquetas. Puede adjuntar o separar registros en una tabla de Lincoln utilizando los métodos de adjuntar y separar. Quiero adjuntar estas nuevas etiquetas y a qué hora están en la solicitud. una matriz antes de revisar esto en el navegador, quiero mostrarte esto.

    public function store(){

        $article  = new Article($this->validateArticle());
        $article->user_id = 1;
        $article->save();
        $articles->tags()->attach(request('tags'));
        return redirect('/articles');
    }

Está en sus pistas en la capa de validación que puede hacer eso para que yo pueda decir que las etiquetas y podemos usar esta regla de validación existe en la tabla de tanques y específicamente para echar un vistazo a la columna de ID, así que lo que esto significa es la etiqueta si es una identificación o una matriz de identificaciones que necesita para existir en las tablas de impuestos, en última instancia, la regla de validación realizará una consulta contra su tabla de tiempos para asegurarse de que todo coincida.

    protected function validateArticle(){
        return request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required',
            'tags' => 'exists:tags,id'
        ]);
    }

Entonces, si volví para ver si puedo volver a ejecutarlo, sí, si me desplazo hacia abajo, lo suficientemente seguro, dice que las etiquetas seleccionadas no son válidas y esto es lo que quiero. Prefiero detectar el problema lo antes posible en lugar de llegar hasta la consulta SQL. Dije que eso es todo, finalmente, solo un pequeño consejo rápido si estamos usando espuma o si la estás usando. esta semana y fuera de la clase de Select y es múltiple y creo que debería limpiar un poco la pantalla, sí, se ve bien ahora porque estamos validando impuestos como parte de esta solicitud de formulario, mientras que tenemos que modificar un poco las cosas. y le mostraré por qué intentemos crear algo enviado y ahora verá que tenemos una matriz para encadenar una conversión y eso es porque ahora o al menos originalmente validaríamos el artículo y luego lo pasaríamos a la instancia del artículo. 

    public function store(){
        $this->validateArticle();
        
        $article  = new Article(request(['title','excerpt','body']));
        $article->user_id = 1;
        $article->save();
        $articles->tags()->attach(request('tags'));
        return redirect('/articles');
    }