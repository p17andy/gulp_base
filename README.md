https://frontendlabs.io/1669--gulp-js-en-espanol-tutorial-basico-primeros-pasos-y-ejemplos

¿CÓMO INSTALAR GULP.JS?

Para instalar Gulp.js el único requisito es tener instalado Node.js. si usas Linux Ubuntu y aún no lo tienes instalado este post te puede servir.

INSTALANDO GULP.JS DE FORMA GLOBAL EN NUESTRO SISTEMA


npm install -g gulp

Si estás usando Linux o Mac, tal vez necesites anteponer la palabra sudo para poder ejecutar este comando con los permisos de administrador, así:


sudo npm install -g gulp

Verificamos que Gulp.js ha sido instalado correctamente.


gulp -v

Si lo tenemos instalado correctamente, nos mostrará lo siguiente:


CLI version 3.8.6
Local version undefined

Donde CLI version es la versión de Gulp.js instalada en nuestro sistema y Local version es la versión de Gulp.js instalada en nuestro proyecto local, pero como aún no hemos creado nuestro proyecto nos saldrá undefined.

¿CÓMO USAR GULP.JS?

Una vez instalado en nuestro sistema estamos listos para crear nuestro primer proyecto usando Gulp.js, nuestro pequeño proyecto concatenará dos archivos .js en uno solo y luego lo minificará. Así que configuraremos 2 tareas(concatenar y minificar), todo esto contenido en una tarea llamada “demo”.

Creamos una carpeta llamada: gulp-primeros-pasos, ingresamos a esa carpeta mediante terminal.

Luego allí dentro creamos nuestro archivo: gulpfile.js, que es el archivo que Gulp.js necesita para saber que tareas realizará y de momento no le podremos ningún contenido.

Luego escribimos lo siguiente(en este punto suponemos que tenemos instalado Node.js):


npm init

Npm nos pedirá los datos de nuestro proyecto, ya que en esta ocasión sólo estamos haciendo un demo. Simplemente presionaremos Enter a todas las preguntas.

Con esto, Npm nos debe haber creado un archivo llamado: package.json, que contendrá algo parecido a lo siguiente:


{
  "name": "gulp-primeros-pasos",
  "version": "0.0.1",
  "description": "Gulp: Primeros pasos",
  "main": "gulpfile.js",
  "author": "jansanchez",
  "license": "MIT"
}

Ahora agregaremos las dependencias de desarrollo a nuestro proyecto, la primera a instalar será: gulp, así que escribimos lo siguiente en nuestra terminal:


npm install --save-dev gulp

Luego instalamos: gulp-concat


npm install --save-dev gulp-concat

Y finalmente instalamos: gulp-uglify


npm install --save-dev gulp-uglify

Tengamos en cuenta que sí no agregamos el parámetro: –save-dev, entonces Npm no agregará este paquete como una dependencia de desarrollo de nuestro proyecto y mucho menos lo agregará a nuestro archivo package.json.

Como podremos observar, nuestro archivo package.json a cambiado y debería contener algo parecido a lo siguiente:


{
  "name": "gulp-primeros-pasos",
  "version": "0.0.1",
  "description": "Gulp: Primeros pasos",
  "main": "gulpfile.js",
  "author": "jansanchez",
  "license": "MIT",
  "devDependencies": {
    "gulp": "^3.8.7",
    "gulp-concat": "^2.3.4",
    "gulp-uglify": "^0.3.1"
  }
}

Como vemos, se agregó la clave devDependencies y en su interior se comienzan a guardar nuestras dependencias de desarrollo y la versión que hemos instalado localmente.

Luego vamos a crear las siguientes carpetas y archivos:

Creamos la carpeta js y dentro de esta carpeta crearemos la carpeta source.

Dentro de la carpeta source crearemos el archivo 1.js y le agregaremos el siguiente contenido:


// contenido del archivo 1.js

var sumar = function (a, b){
  return a + b;
};

Nuevamente dentro de la carpeta source crearemos el archivo 2.js y le agregaremos el siguiente contenido:


// contenido del archivo 2.js

var restar = function (a, b){
  return a - b;
};

Ahora vamos a poner el siguiente contenido a nuestro archivo gulpfile.js:


/*
* Dependencias
*/
var gulp = require('gulp'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify');

/*
* Configuración de la tarea 'demo'
*/
gulp.task('demo', function () {
  gulp.src('js/source/*.js')
  .pipe(concat('todo.js'))
  .pipe(uglify())
  .pipe(gulp.dest('js/build/'))
});

Con esto ya tenemos todo configurado, así que para ponerlo a prueba en nuestra terminal escribimos lo siguiente:


gulp demo

