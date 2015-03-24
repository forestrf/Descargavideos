# Descargavideos
Descargavídeos es una web escrita en PHP capaz de obtener el enlace de un vídeo dada la url de otra web.

[Listado de webs soportadas](http://www.descargavideos.tv/faq#p_q_c_s_d)



## Estructura

- canales ```Logotipos de las webs soportadas```
- cpanel ```Panel de control de la web```
  - util ```Funciones para hacer pruebas```
- css ```Todas las hojas de estilo que usa la web. Versiones extendidas y minificadas```
- dominioextra ```Archivos para dominios extra para evitar esquivar bloqueos```
- gracias ```Mensaje de agradecimiento que se muestra al donar```
- idiomas ```archivos con el texto traducido (no todo el texto está aquí, por terminar)```
- img ```Todas las imágenes usadas en la web```
- js ```Todo el js de la web. Versiones extendidas y minificadas```
- paginas ```Las páginas listadas en el menú principal que son incrustadas en la plantilla```
- plantillas ```Distintas plantillas para respresentar los resultados (no todas funcionan)```
- player ```Reproductor online de vídeos embedidos, usando flash o html5```
- reproductor ```Reproductor flash de audio para las búsquedas de música```
- secundario ```Resolución de las webs a enlace de vídeo. Aquí se hace la búsqueda de los vídeos```
  - buscaMp3 ```Búsqueda de las canciones```
  - crypto ```Clases usadas para encriptar y desencriptar```
  - SabreAMF ```Versión ligéramente modificada de SabreAMF usada para manejar mensajes AMF```
  - 0 plantilla cadena.php ```Archivo de ejemplo para dar soporte a nuevas webs```
  - cadenas.php ```listados de las webs soportadas: Dominio y archivo php que se encarga de ellas```
  - index.php ```Procesa una url llamando a las clases correspondientes a partir de 'candenas.php' ```
- util ```Útiles```
- advertisement.js ```Usado únicamente para comprobar si el usuario usa AdBlock```
- bm2.php ```Usado por el bookmarklet V2```
- cambios.php ```Changelog```
- definiciones.php ```Configuraciones para el servidor, como el nombre del dominio```
- flag.php ```Llamado al hacer un aviso rápido de fallo. Los avisos se consultan en /cpanel```
- form.php ```formulario embedido en un iframe para usar en otras webs```
- funciones.php ```funciones genéricas de todo tipo```
- funcionesIndex.php ```funciones usadas sólo por index.php```
- geoiploc.php ```Usado para, en ocasiones de problemas conocidos con geobloqueos, mostrar una advertencia```
- g-search-xml.php ```Usado por google para el buscador incrustado```
- indexRender(Escritorio|Movil) ```html de la web```
- plantillaResultado.php ```Recoje un resultado y aplica la plantilla indicada para poder mostrarlo```
- publis.php ```snipets publicitarios```



## Uso

Necesario (Recomendado usar xampp con la configuración inicial):
- php >= 5.4
- servidor apache (.htaccess)
- Crear un archivo llamado ```.htpasswd``` en ```/var/pass/.htpasswd``` del servidor y configurarlo. [¿Qué?](http://www.htaccesstools.com/articles/htpasswd/) [¿Cómo?](http://www.htaccesstools.com/htpasswd-generator/)
- Copiar la raiz del repositorio a la raiz de la web. Al entrar al dominio/subdominio debe cargar ```index.php```.


## Problemas conocidos

- La web sólo funciona si está en la raíz del dominio/subdominio.
- En algunos sitios se llama al dominio *descargavideos.tv* en lugar del definido en definiciones.php.
- Las imágenes ligadas a la plantilla no están junto a las hojas de estilo.
- Algunos resultados fallidos no son detectados, mostrando al usuario en ocasiones resultados vacíos o incluso la web malformada.
- Sólo algunas clases de cadenas en la carpeta ```secundario``` están completadas. Ninguna es independiente por culpa de la llamada a la función ```finalCadena```.


