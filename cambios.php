<?php
//$max=cantidad de entradas del changelog a visualizar
function cambios($max=-1){
//tipo='simple' o 'todos'



//actualizar las FAQ
//TV3 MEDIO REESCRITA. COMPROBAR CÓDIGO EXTRA

//creo que ya esta hecho bien, pero por si acaso dejo la anotación como 'tengo que probarlo' (por ejemplo, con soundcloud o antena 3, que tiene multivideo, y rtve, de uno solo)
//ACTUALIZAR GESTOR A NUEVA WEB
//si resultados=1, nombre=nombre principal
//si son varios, el nombre será el titulo/nombre del enlace (solo estará uno de los dos presentes)



$todos[]=array(
'18-Junio-2015'
,'fix:Los vídeos de eitb.tv con bitrate (calidad) desconocido no tendrán indicado este dato y los resultados no serán ordenados por el bitrate del vídeo.'
,'fix:RITB.tv descarga directa quitada porque ya no funciona. Agregada opción de descarga F4M.'
,'fix:Problemas con algunos vídeos de Mundofox arreglados.'
);

$todos[]=array(
'24-Marzo-2015'
,'fix:AllMyVideos vuelve a funcionar.'
);

$todos[]=array(
'12-Marzo-2015'
,'fix:Cambiado subdominio de los vídeos de rtve.'
,'fix:Cambiada la fecha de la anterior actualización ya que era incorrecta.'
);

$todos[]=array(
'11-Marzo-2015'
,'del:Mediaset. <a href="http://descargavid.blogspot.com.es/2015/03/telecinco-c-d.html">Más información aquí</a>.'
,'del:boing.wardcampbell.com.'
);

$todos[]=array(
'10-Marzo-2015'
,'fix:pasouoquepasou.crtvg.es no funcionaba.'
,'fix:Los vídeos de YouTube que no funcionan por culpa de un Geobloqueo por parte de Descargavídeos ahora ofrecen la posibilidad de usar el bookmarklet V2 para descargarlos.'
);

$todos[]=array(
'28-Febrero-2015'
,'fix:Algunos vídeos de rtve que funcionan usando flv ahora funcionan.'
);

$todos[]=array(
'27-Febrero-2015'
,'add:Nbcuniverso.com, soporte completo (Puede necesitar proxy y/o tener cuenta en la web.'
);

$todos[]=array(
'25-Febrero-2015'
,'add:Nbcuniverso.com, soporte parcial y en pruebas.'
,'add:Subtítulos para Univisión'
,'fix:now.telemundo.com vuelve a funcionar (listado de posibles enlaces, no todos funcionan).'
);

$todos[]=array(
'23-Febrero-2015'
,'add:Nuevo bookmarklet (V2) en pruebas, se encuentra en la <a href="/lab#lab_bookmarklet">página lab</a>.'
,'fix:Dailymotion mp4 en lugar de m3u8 usando el nuevo bookmarklet.'
,'fix:Vídeos de YouTube que pueden verse pero aparecen como geobloqueados por Descargavídeos ahora funcionan usando el nuevo bookmarklet.'
,'fix:Más calidades y mejor descripción de las opciones de descarga de YouTube.'
);

$todos[]=array(
'22-Febrero-2015'
,'fix:RTVE audio vuelve a funcionar.'
);

$todos[]=array(
'21-Febrero-2015'
,'fix:RTVE.es vuelto a cambiar para que funcione.'
);

$todos[]=array(
'19-Febrero-2015'
,'fix:RTVE.es vuelve a funcionar.'
);

$todos[]=array(
'15-Febrero-2015'
,'add:boing.wardcampbell.com.'
);

$todos[]=array(
'9-Febrero-2015'
,'add:mundofox.com.'
,'add:noticiasmundofox.com'
,'fix:Mundofox resultados sin descarga directa en lugar de fallar se pueden descargar por m3u8.'
,'fix:Mundofox algunas imágenes no funcionaban.'
);

$todos[]=array(
'8-Febrero-2015'
,'fix:Vídeos de telemundo con varias partes ahora funcionan (hay que descargar las partes individualmente).'
);

$todos[]=array(
'4-Febrero-2015'
,'fix:RTVE.es vuelve a funcionar.'
,'fix:ccma.cat (TV3) soporte para multiples vídeos en una página. Mejor detección de los vídeos en lugar de fallar.'
,'fix:allmyvideos.net actualizado, vuelve a funcionar.'
);

$todos[]=array(
'3-Febrero-2015'
,'add:ondaluz.tv'
,'add:Youtube 1080p WebM (Vídeo solo).'
,'fix:Vuelve a aparecer la opción Audio WebM (Audio solo).'
,'fix:RTVE.es, detección del vídeo principal en páginas genéricas (sin reproductor del vídeo en cuestión).'
,'fix:RTVE.es, audios ahora con título e imagen.'
);

$todos[]=array(
'2-Febrero-2015'
,'fix:Todos los enlaces de rtmp que contenían en el atributo -r la cadena "-o" no funcionaban.'
);

$todos[]=array(
'31-Enero-2015'
,'fix:rtvcm.es ahora usa http en lugar de rtmp.'
);

$todos[]=array(
'30-Enero-2015'
,'add:Nueva publicidad (epom.com).'
,'fix:Algunos vídeos de rtve con extensión flv no funcionaban si un resultado posible era un mp4 incorrecto.'
,'del:Publicidad Adsense. <a href="http://descargavid.blogspot.com.es/2015/01/publicidad-en-la-web.html">Más información aquí</a>.'
);

$todos[]=array(
'28-Enero-2015'
,'fix:Youtube arreglado (Vídeos marcados como geobloqueados desde el servidor en realidad no lo estaban).'
);

$todos[]=array(
'24-Enero-2015'
,'add:Vídeos públicos de facebook.com.'
,'fix:Mejor soporte para Easy-rtmpdump.'
,'del:Quitada nueva publicidad, ha resultado ser engañosa.'
);

$todos[]=array(
'23-Enero-2015'
,'add:Nuevo tipo de publicidad en la web.'
);

$todos[]=array(
'22-Enero-2015'
,'add:arucitys.com.'
,'fix:Títulos para vídeos de now.telemundo.com.'
,'fix:Listado de posibles enlaces del vídeo para los vídeos de telemundo bloqueados por llave.'
,'fix:8tv arreglado soporte para algunos vídeos.'
);

$todos[]=array(
'21-Enero-2015'
,'add:En caso de buscar algo que no sea una url se usará el buscador de google (customizado) para descargar una posible url. <a href="http://descargavid.blogspot.com/2015/01/ahora-con-buscador.html">Más información aquí</a>.'
,'fix:rtve actualizado (nuevos subdominios para los vídeos).'
);

$todos[]=array(
'20-Enero-2015'
,'fix:Televisa. Mejor búsqueda de la ID del vídeo (algunos vídeos no funcionaban por no encontrar la ID).'
);

$todos[]=array(
'17-Enero-2015'
,'add:8tv.cat.'
,'fix:Títulos en canalplus.es.'
);

$todos[]=array(
'16-Enero-2015'
,'fix:Los vídeos de telemundo públicos vuelven a funcionar.'
,'fix:Soporte para vídeos antiguos de univisión que no pueden verse desde la página oficial al no contar con reproductor de vídeo.'
);

$todos[]=array(
'11-Enero-2015'
,'fix:crtvg.es nuevo tipo de vídeos (bloque de multiple vídeos).'
);

$todos[]=array(
'10-Enero-2015'
,'fix:canalsur.es no funcionaban bien los títulos de los vídeos hasta el punto de desmontar la web.'
,'fix:canalsur.es lista mejor los vídeos cuando tienen varias partes.'
,'fix:Liveleak.com, soporte para vídeos con aviso de restricción.'
,'fix:Algunos vídeos de vk.com no funcionaban.'
);

$todos[]=array(
'8-Enero-2015'
,'add:canalplus.es.'
);

$todos[]=array(
'1-Enero-2015'
,'fix:allmyvideos.net (algunos vídeos no funcionaban al no ser embedidos).'
,'fix:soundcloud.com vuelve a funcionar.'
);

$todos[]=array(
'29-Diciembre-2014'
,'fix:Nuevo tipo de IDs para TV3.'
);

$todos[]=array(
'23-Diciembre-2014'
,'fix:Enlace a los subtítulos de los vídeos de RTVE que los tienen.'
);

$todos[]=array(
'20-Diciembre-2014'
,'fix:Algunos vídeos de eitb.tv en lugar de usar rtmp usan http por lo que funcionan si necesidad de programas extra.'
);

$todos[]=array(
'19-Diciembre-2014'
,'add:eitb.eus, nuevo dominio para eitb.com.'
);

$todos[]=array(
'13-Diciembre-2014'
,'fix:RTVE cambiado el subdominio de los enlaces.'
,'fix:discoverymax.es ahora es discoverymax.marca.com.'
);

$todos[]=array(
'12-Diciembre-2014'
,'add:Soporte para uvideos.com.'
,'fix:Problemas en soundcloud.com al no encontrar la id de los usuarios.'
);

$todos[]=array(
'11-Diciembre-2014'
,'fix:Telemundo vuelve a funcionar para vídeos del subdominio now.telemundo.com.'
,'fix:Algunos vídeos de rtve no se podían descargar ya que de los posibles enlaces al vídeo a veces se elejía el incorrecto.'
,'fix:Mejorada la IA que resuelve ciphers de youtube.'
,'fix:Nuevo mensaje de error en caso de intentar calcular un vídeo sin introducir una url.'
);

$todos[]=array(
'7-Diciembre-2014'
,'fix:Hogarutil vuelve a funcionar tras adaptar el script un pequeño cambio en el funcionamiento de los vídeos.'
);

$todos[]=array(
'28-Noviembre-2014'
,'add:now.telemundo.com.'
);

$todos[]=array(
'27-Noviembre-2014'
,'fix:Arreglo para Telemundo.com.'
);

$todos[]=array(
'26-Noviembre-2014'
,'fix:Bug SabreAMF esquivado que daba fallo en algunos vídeos de brightcove.'
);

$todos[]=array(
'25-Noviembre-2014'
,'fix:Tv3, ahora ccma.cat, vuelve a funcionar (Usado handler de tv3 para ccma.cat parece funcionar).'
);

$todos[]=array(
'4-Noviembre-2014'
,'del:<a href="http://descargavid.blogspot.com/2014/11/atresmedia-c-d.html">Quitado antena3, la sexta y atresplayer</a>.'
);

$todos[]=array(
'30-Octubre-2014'
,'fix:Cambiado mensaje de información de atresplayer para intentar dejar más claro cómo funciona (avalancha de avisos de resultado incorrecto a pesar de funcionar).'
);

$todos[]=array(
'23-Octubre-2014'
,'add:replay.disneychannel.es.'
);

$todos[]=array(
'21-Octubre-2014'
,'fix:Quitados espacios iniciales y finales de los títulos.'
,'fix:Rtpa títulos e imágenes arreglados.'
,'fix:Canal extremadura títulos e imágenes arregladas.'
,'fix:RT.com, algunos vídeos habían dejado de funcionar.'
,'fix:Arreglado canaldehistoria.es, ahora canalhistoria.es.'
,'add:Soporte para vídeos embedidos de vimeo.'
,'del:Intereconomia.com (ahora radiointereconomia.com) deja de funcionar debido a un cambio completo del funcionamiento de la web.'
,'del:Toons.tv deja de funcionar debido a un cambio completo del funcionamiento de la web.'
,'fix:Cope.es vuelve a funcionar.'
,'fix:Arreglos en Cadenaser.'
,'fix:Algunos vídeos de Televisa no funcionaban.'
,'fix:Títulos y descripciones en Hogarutil.'
,'fix:Cambios en netd.com para que volviera a funcionar.'
,'fix:TVMelilla soporte para vídeos vimeo incrustados.'
,'del:Magnovideo ha cerrado.'
);

$todos[]=array(
'18-Octubre-2014'
,'fix:Rtve vídeos geobloqueados no funcionaban.'
);

$todos[]=array(
'16-Octubre-2014'
,'fix:Atresplayer ya no requiere flash (sigue necesitando el complemento del user agent o el programa F4M-Downloader).'
);

$todos[]=array(
'15-Octubre-2014'
,'fix:Canalsur es compatible con vídeos flv (antes sólo lo era con mp4).'
);

$todos[]=array(
'9-Octubre-2014'
,'fix:Atresplayer vuelve a funcionar con calidad baja pero es necesario entrar a la web desde un móvil o modificar el user-agent del navegador para que ponga "Android".'
,'fix:Univisión no encontraba enlaces de algunos vídeos.'
,'fix:Concretado el mensaje de información de atresplayer que pide la descarga del programa F4M-Downloader para indicar que también hace falta ejecutarlo.'
,'add:Agregado un enlace en los resultados de atresplayer que apunta a <a href="http://descargavid.blogspot.com.es/2014/10/atresplayer-por-que-tantas.html">una entrada del blog que guarda relación</a>.'
);

$todos[]=array(
'1-Octubre-2014'
,'fix:Algunos vídeos de eitb no se podían obtener por culpa de una expresión regular que no contemplaba ciertos casos.'
);

$todos[]=array(
'28-Septiembre-2014'
,'fix:Arreglado dailymotion.com (Ahora funciona usando el programa m3u8).'
);

$todos[]=array(
'24-Septiembre-2014'
,'fix:Discoverymax.es esquivado geobloqueo mediante el uso de flash (es el usuario el que debe esquivar el geobloqueo).'
,'fix:Algunas redirecciones de rtve.es a vídeos no funcionaban por ser URI sin protocolo ni dominio (path absoluto).'
);

$todos[]=array(
'21-Septiembre-2014'
,'add:13.cl.'
);

$todos[]=array(
'20-Septiembre-2014'
,'add:Discoverymax.es.'
,'fix:Problema al usar el bookmarklet o el addon desde un resultado de descargavideos. Ahora se extrae el enlace de la url de descargavideos y se recalcula el enlace del vídeo en lugar de dar fallo.'
,'fix:Cambiado mensaje de error de youtube por geobloqueo.'
,'fix:Títulos e imágenes de resultados de antena3 no siempre aparecían o eran incorrectos.'
);

$todos[]=array(
'18-Septiembre-2014'
,'fix:Algunos vídeos no se podían ver en el reproductor por culpa de tener una extensión incorrecta.'
);

$todos[]=array(
'13-Septiembre-2014'
,'fix:Algunos vídeos de atresplayer que usan rtmp ahora funcionan.'
,'fix:Ampliado soporte para vídeos de tune.pk que no siguen el mismo patrón para indicar los vídeos.'
,'fix:URIs que comiencen por http://http://, posiblemente por error, ahora funcionarán.'
);

$todos[]=array(
'7-Septiembre-2014'
,'fix:Televisa. Nuevos tipos de vídeos.'
,'add:crunchyroll.com'
,'add:telemundo.com'
);

$todos[]=array(
'31-Agosto-2014'
,'fix:Títulos en aragón televisión.'
);

$todos[]=array(
'30-Agosto-2014'
,'fix:RTVE Geobloqueo quitado.'
);

$todos[]=array(
'29-Agosto-2014'
,'fix:Títulos en Goear.'
,'fix:Fix RTVE para algunos vídeos que no funcionaban al alajir la url de vído incorrecta.'
,'fix:Fix RTVE soporte para vídeos flv.'
);

$todos[]=array(
'27-Agosto-2014'
,'fix:vimeo vuelve a funcionar.'
,'fix:Soporte para más vídeos de TV3.'
);

$todos[]=array(
'26-Agosto-2014'
,'fix:7rm.es arreglado para funcionar con RTMP-Downloader.'
,'add:Descripción en los resultados.'
,'fix:Nombre de archivo en comando para vídeos rtmp.'
,'fix:adnstream.com vuelve a funcionar.'
,'fix:Texto de error personalizado para los vídeos de TV3 que fueron borrados.'
,'fix:Títulos para los vídeos de AllMyVideos en lugar de la id del vídeo.'
,'fix:No se mostraban todos los títulos en los resultados múltiples de ATresPlayer.'
,'fix:RTVE vuelve a funcionar tras las actualizaciones de rtve.'
,'fix:Dailymotion vuelve a funcionar.'
,'add:Soporte para Dailymotion de vídeos embedidos por iframe.'
,'fix:Petición para introducir el correo en los avisos rápidos de una forma más directa.'
);

$todos[]=array(
'25-Agosto-2014'
,'fix:RTVE vuelve a funcionar con vídeos que requieren autorización por parámetros en la url.'
,'add:Aviso de error específico para enlaces múltiples'
);

$todos[]=array(
'24-Agosto-2014'
,'fix:Nombre de los vídeos RTMP de eitb.tv.'
,'add:Agregado soporte para LiveLeak.com.'
);

$todos[]=array(
'23-Agosto-2014'
,'fix:Mejores botones para resultados que requieren el uso de un programa.'
,'fix:Soporte para urls de eitb.tv con carácteres extraños (&).'
,'fix:Los botones redimensionan menos la web.'
);

$todos[]=array(
'22-Agosto-2014'
,'fix:Los avisos para descargar el programa RTMP-Downloader y F4M-Downloader equivalen a "info" y en lugar de "warning".'
	,'add:En caso de que se introduza un enlace con texto entre medias se intenta extraer el enlace.'
	,'fix:Youtube arreglado (soporte para más vídeos y recuperado soporte para vídeos que antes funcionaban).'
);

$todos[]=array(
'21-Agosto-2014'
,'fix:Pequeña mejora en youtube. Pérdida de soporte para algunos vídeos geobloqueados.'
	,'add:Soporte para telemadrid2020.es.'
	,'fix:Algunos vídeos rtmp no se descargaban por culpa de no tener un nombre de archivo predefinido.'
	,'fix:Audios de rtve fallaban con enlaces rtmp.'
);

$todos[]=array(
'20-Agosto-2014'
,'fix:Allmyvideos.net actualizado.'
	,'add:Botón para subir a la cabecera de la web.'
	,'fix:Cambiado mensaje de información de ATresPlayer.'
	,'fix:Cambiado mensaje de información para el aviso rápido.'
	,'del:Quitado soporte para gestor de descargas.'
);

$todos[]=array(
'8-Agosto-2014'
,'add:Soporte para vídeos F4M.'
,'add:Soporte para más vídeos de ATresPlayer y más calidades usando el programa F4M-Downloader. <a href="http://descargavid.blogspot.com/2014/08/f4m-downloader.html">Más información aquí</a>.'
,'fix:Arreglado Medici.tv.'
,'fix:Telemadrid.es ahora usa rtmp.'
,'fix:Pequeños cambios en el js y css.'
);

$todos[]=array(
'13-Julio-2014'
,'add:Alerta para mitele indicando la necesidad de estar en España para ver algunos vídeos.'
,'fix:Arreglo para youtube.'
);

$todos[]=array(
'7-Julio-2014'
,'fix:Aumentado soporte de vídeos de YouTube.'
);

$todos[]=array(
'29-Junio-2014'
,'fix:Vídeos que no pueden funcionar de ATresPlayer indicaban funcionar a pesar de no hacerlo.'
,'fix:Audios de rtve.es con el inicio de la url repetida.'
);

$todos[]=array(
'28-Junio-2014'
,'fix:Soporte ampliado para rt.com.'
,'fix:Algunos vídeos de Telemadrid no funcionaban.'
,'add:Nuevo mensaje de error para vídeos de eitb.tv.'
);

$todos[]=array(
'25-Junio-2014'
,'add:Alertas para resultados específicos.'
,'add:Alerta para univisión indicando que se requiere proxy.'
,'fix:Resultados de ATresPlayer con la letra # en la url daban fallo para múltiples vídeos.'
,'fix:Ligeros cambios de estilo.'
);

$todos[]=array(
'18-Junio-2014'
,'fix:Hogarutil.com actualizado, vuelve a funcionar.'
,'fix:Mitele rtmp arreglado.'
);

$todos[]=array(
'17-Junio-2014'
,'fix:Telecinco actualizado para funcionar con vídeos rtmp.'
);

$todos[]=array(
'14-Junio-2014'
,'fix:Los vídeos de univisión que no tienen calidad 2000kbps no muestran dicha calidad.'
);

$todos[]=array(
'13-Junio-2014'
,'add:Soporte para los vídeos de VTelevisión que usan brightcove.'
,'fix:Arreglados algunos vídeos de la sexta que funcionan de una nueva forma.'
);

$todos[]=array(
'9-Junio-2014'
,'add:De no indicar el capítulo de una serie en mitele se usará la destacada en la página.'
,'fix:Resultados con títulos con el carácter % no funcionaban correctamente.'
);

$todos[]=array(
'4-Junio-2014'
,'add:Subtítulos para ATresPlayer.'
,'fix:Fix A3P Para chrome.'
,'fix:Algunos vídeos de mitele se obtenían con una ID erronea.'
);

$todos[]=array(
'3-Junio-2014'
,'fix:Fallo en Televisa por culpa de números mayores que int32.'
,'fix:Vídeos insertados por js de eitb.com fallaban.'
,'fix:Resultados con más de 10 enlaces no siempre se mostraban correctamente.'
,'fix:Limitados resultados múltiples de ATresPlayer a 30 máximo.'
,'fix:Puesto título para cada enlace en los resultados múltiples de ATresPlayer.'
);

$todos[]=array(
'2-Junio-2014'
,'add:Los resultados que requieren flash informan de la necesidad de tener flash para funcionar.'
,'fix:Problemas con resultados rtmp tras la actualización del css y js.'
,'fix:No todos los vídeos de TV3 tienen enlace de descarga directa.'
,'fix:Resultados con comillas simples en el título podían fallar.'
);

$todos[]=array(
'1-Junio-2014'
,'add:Comentarios para los avisos rápidos.'
,'fix:Algunos vídeos de Dailymotion no funcionaban.'
);

$todos[]=array(
'31-Mayo-2014'
,'add:Cambios en css y js para mejorar la fluidez de la web.'
);

$todos[]=array(
'30-Mayo-2014'
,'fix:Dailymotion en formato mp4 en lugar de flv.'
);

$todos[]=array(
'29-Mayo-2014'
,'fix:Telefe.com.'
);

$todos[]=array(
'28-Mayo-2014'
,'add:Dailymotion.com.'
);

$todos[]=array(
'24-Mayo-2014'
,'add:Youtube soporte para urls del tipo https://www.youtube.com/v/ID_VIDEO.'
);

$todos[]=array(
'20-Mayo-2014'
,'fix:Arreglado ATresPlayer para chrome e IE (Requiere flash).'
);

$todos[]=array(
'19-Mayo-2014'
,'fix:Arreglado ATresPlayer (Requiere flash).'
);

$todos[]=array(
'9-Mayo-2014'
,'fix:Habilitadas nuevas calidades de vídeo en youtube (formato de solo vídeo en WebM).'
);

$todos[]=array(
'30-Abril-2014'
,'fix:Algunos de los vídeos de youtube que antes no funcionaban, ahora funcionan.'
);

$todos[]=array(
'27-Abril-2014'
,'fix:RTVE Infantil no funcionaba con enlaces acabados en "/todos".'
,'fix:Nuevo tipo de enlaces en RTVE.'
,'fix:Canalsur rectificado después de un fallo con uno de los últimos cámbios.'
,'fix:ATresPlayer, soporte para grupos de vídeos.'
,'fix:Youtube con enlaces acortados del tipo youtu.be.'
);

$todos[]=array(
'25-Abril-2014'
,'fix:Algunos resultados rtmp no se mostraban con enlace por lo que no se podrían descargar.'
,'fix:Codificación utf-8 para rtvcm.'
);

$todos[]=array(
'24-Abril-2014'
,'fix:Texto en resultados de Antena3 en lugar de urls.'
,'fix:Imagen incorrecta en algunos resultados de Antena3.'
);

$todos[]=array(
'21-Abril-2014'
,'fix:Algunos vídeos válidos de RTVE indicaban estar borrados.'
);

$todos[]=array(
'20-Abril-2014'
,'add:Soporte para buscar a partir de un iframe.'
,'fix:vk.com. La mayor parte de los vídeos no funcionaban.'
,'fix:rtve.es. Soporte para algunas páginas sin vídeo con imagen que redirecciona al vídeo.'
,'fix:Los resultados con imagen erronea ya no muestran una imagen de color blanco.'
,'fix:Imágenes en algunos resultados de mitele no funcionaba.'
,'fix:Imágenes en mtv.es no funcionaban en algunas resultados.'
,'fix:Enlaces de mtv.es rectificados.'
);

$todos[]=array(
'15-Abril-2014'
,'fix:Antena 3, nuevo formato de vídeos.'
);

$todos[]=array(
'11-Abril-2014'
,'add:Played.to. Requiere tener flash instalado por problemas con IP.'
,'add:AllMyVideos.net. Requiere tener flash instalado por problemas con IP.'
);

$todos[]=array(
'6-Abril-2014'
,'fix:Cambios internos que posibilitan la traducción del sitio.'
,'fix:Mejora de la interfaz para la usabilidad de la web móvil.'
);

$todos[]=array(
'5-Abril-2014'
,'fix:Magnovideo. Requiere tener flash instalado por problemas con IP.'
);

$todos[]=array(
'3-Abril-2014'
,'fix:Algunos resultados de RTVE mostraban un resultado incorrecto al no existir un vídeo en lugar de informar del fallo.'
);

$todos[]=array(
'2-Abril-2014'
,'add:vk.com.'
);

$todos[]=array(
'1-Abril-2014'
,'add:Magnovideo.com.'
,'fix:Los enlaces RTMP de Aragon TV se calculaban con partes de la url mal obtenidas.'
,'fix:Los enlaces RTMP de EITB.tv eran incorrectos en cuando pertenecian a brightcove.'
,'fix:Optimizaciones para consumir menos ram.'
);

$todos[]=array(
'31-Marzo-2014'
,'fix:Las urls con caracteres no-ascii provocaban fallo de url inválida.'
,'fix:nuevo formato de vídeos incorporado a EITB.'
,'fix:Cambiado el mensaje de error por introducir una URL de una web no soportada.'
);

$todos[]=array(
'30-Marzo-2014'
,'add:Reproductor HTML5 en caso de no encontrarse el plugin de flash.'
);

$todos[]=array(
'28-Marzo-2014'
,'fix:Algunos vídeos de TV3 usaban rtmp en lugar de http.'
);

$todos[]=array(
'23-Marzo-2014'
,'fix:Univisión actualizado para soportar los nuevos vídeos.'
);

$todos[]=array(
'18-Marzo-2014'
,'add:CRTVG. Agregada url m3u8.'
,'fix:Mitele. Algunos enlaces fallaban con el método nuevo.'
,'fix:Mitele. Algunos vídeos no tenían imagen.'
,'fix:Algunos vídeos de ATresPlayer con subtitulos con la opción de descargarlos arreglada (bookmarklet).'
);

$todos[]=array(
'6-Marzo-2014'
,'fix:RTPA Actualizado.'
,'fix:Mitele handler simula ser la url de un mp4 para evitar algún posible problema en la dirección.'
);

$todos[]=array(
'5-Marzo-2014'
,'add:Los vídeos de ATresPlayer con subtítulos tienen un enlace para descargarlos junto al resultado. Incluído también en el bookmarklet para ATresPlayer.'
);

$todos[]=array(
'3-Marzo-2014'
,'fix:Ahora los vídeos de youtube se descargan con el mismo nombre de archivo que el título.'
);

$todos[]=array(
'2-Marzo-2014'
,'fix:TV3 Actualizado.'
);

$todos[]=array(
'1-Marzo-2014'
,'fix:Ampliado el soporte para vídeos de YouTube.'
,'fix:Información de errores con YouTube más concretos.'
,'fix:Mejora del estilo de la web para pantallas pequeñas.'
);

$todos[]=array(
'28-Febrero-2014'
,'add:ideal.es a petición de un mensaje por el formulario contacta.'
);

$todos[]=array(
'27-Febrero-2014'
,'fix:AragonTV enlace rtmp incorrecto en vídeos individuales.'
);

$todos[]=array(
'24-Febrero-2014'
,'fix:Arreglado fallo de seguridad XSS.'
,'fix:Código interno reestructurado.'
,'fix:Velocidad de Mitele rtmp.'
,'fix:Algunos vídeos de Mitele no funcionaban.'
);

$todos[]=array(
'23-Febrero-2014'
,'add:tvmelilla.es a petición de un usuario mediante contacta.'
,'add:tune.pk a petición de un usuario mediante contacta.'
);

$todos[]=array(
'22-Febrero-2014'
,'fix:Reajuste en Univision para los últimos cambios que han hecho.'
,'fix:AragonTV, enlaces rtmp incorrectos arreglados.'
,'fix:CanalExtremadura actualizado por cambios.'
);

$todos[]=array(
'21-Febrero-2014'
,'add:youtube.com'
,'fix:crtvg.es Ahora es compatible con RTMP-Downloader.'
);

$todos[]=array(
'19-Febrero-2014'
,'fix:Los vídeos borrados de RTVE dan error indicando que están borrados en lugar de mostrar un resultado incompleto.'
);

$todos[]=array(
'18-Febrero-2014'
,'add:Soporte para los vídeos de Mitele que usan RTMP. <a href="http://descargavid.blogspot.com.es/2014/02/rtmp-downloader-v02-mitele.html">Más información aquí</a>.'
,'fix:Aumento de velocidad de la página gracias a gzip.'
,'fix:Cambios menores.'
);

$todos[]=array(
'4-Febrero-2014'
,'add:toons.tv.'
,'fix:Vulnerabilidad XSS en el reproductor.'
);

$todos[]=array(
'3-Febrero-2014'
,'add:Telefe.com.'
);

$todos[]=array(
'31-Enero-2014'
,'fix:Telecinco y cuatro no mostraban el enlace del vídeo.'
,'fix:Hogarutil.com actualizado.'
);

$todos[]=array(
'30-Enero-2014'
,'fix:Múltiples arreglos para IE8+.'
);

$todos[]=array(
'29-Enero-2014'
,'fix:Mitele vuelve a funcionar tras la última actualización.'
,'fix:El bookmarklet para ATresPlayer funciona en IE8+'
,'fix:ATresPlayer funciona en IE8+ desde la web'
);

$todos[]=array(
'26-Enero-2014'
,'add:Agregado soporte para la web netd.com por petición a través de contacta.'
);

$todos[]=array(
'20-Enero-2014'
,'fix:Rectificado el script para cambiar el nombre para RTMP-Downloader para que funcione en chrome.'
,'fix:Se muestan imágenes en resultados de MTV que antes no tenían.'
);

$todos[]=array(
'18-Enero-2014'
,'add:Soporte para el programa RTMP-Downloader. <a href="http://descargavid.blogspot.com.es/2014/01/rtmp-downloader-v01.html">Más información aquí</a>.'
,'add:Se puede indicar el nombre de los archivos para RTMP-Downloader desde Descargavideos'
,'fix:Los botones de descarga son completamente clicables'
);

$todos[]=array(
'16-Enero-2014'
,'add:Reproductor en ATresPlayer'
,'fix:Títulos en ATresPlayer'
,'fix:Aviso de error para los vídeos de ATresPlayer que requieren del usuario con la sesión iniciada.'
);

$todos[]=array(
'14-Enero-2014'
,'fix:aragontv actualizado, http deja de funcionar y pasa a rtmp'
);

$todos[]=array(
'12-Enero-2014'
,'fix:Imágenes y títulos de telecinco por iframe.'
,'fix:Los botones de descarga son clicables en más espacio, no solo el texto.' 
);

$todos[]=array(
'7-Enero-2014'
,'add:adnstream.com.'
,'fix:Canal Historia actualizado.'
,'fix:Canal Rias Baixas actualizado.'
,'fix:Canal Sur ahora permite más vídeos y "a la carta" actualizado.'
,'fix:Cope ahora soporta vídeos.'
,'fix:Títulos en 7rm.'
,'fix:Títulos e imágenes en Cadena SER.'
);

$todos[]=array(
'5-Enero-2014'
,'add:Telemadrid.es.'
,'fix:Títulos en Univisión.'
);

$todos[]=array(
'4-Enero-2014'
,'add:Versión web movil de Descargavideos.'
,'fix:EITB.tv formato enlaces rtmp modificado.'
);

$todos[]=array(
'4-Diciembre-2013'
,'add:Soporte para ATresPlayer desde Descargavideos sin necesidad de bookmarklet.'
);

$todos[]=array(
'30-Noviembre-2013'
,'fix:Título en los vídeos de Aragón Televisión del tipo alacarta.aragontelevision.es/ajax/ajax.php?id=.'
,'fix:Compatibilidad con IE8 mejorada.'
);

$todos[]=array(
'25-Noviembre-2013'
,'del:Gamespot. Ha cambiado el funcionamiento.'
);

$todos[]=array(
'17-Noviembre-2013'
,'del:Grooveshark. Ha cambiado el funcionamiento.'
,'fix:Intentar resolver un enlace de ATresPlayer redirige a <a href="http://descargavid.blogspot.com.es/2013/11/segunda-solucion-para-atresplayer.html">esta entrada del blog</a>.'
);

$todos[]=array(
'24-Octubre-2013'
,'fix:Univisión. Soporte para los vídeos en Univision.mobi.'
,'fix:Univisión. Los vídeos bloqueados indican el fallo correspondiente.'
);

$todos[]=array(
'13-Octubre-2013'
,'add:Soporte para ATresPlayer. <a href="http://descargavid.blogspot.com.es/2013/10/m3u8-downloader-v02-atresplayer.html">Más información aquí</a>.'
);

$todos[]=array(
'25-Septiembre-2013'
,'fix:Algunos vídeos de Telecinco y Cuatro vuelven a funcionar.'
);

$todos[]=array(
'23-Septiembre-2013'
,'fix:Cambio del fondo vuelve a funcionar.'
);

$todos[]=array(
'21-Septiembre-2013'
,'add:Nuevo dominio. Descargavideos.tk se translada a Descargavideos.TV'
,'fix:Cambios en los plugins sociales para apuntar al nuevo dominio, nueva página de facebook y correciones en css.'
);

$todos[]=array(
'18-Septiembre-2013'
,'fix:Los vídeos borrados en RTVE dejan de dar fallo. En su lugar, ahora se informa de la imposibilidad de acceder a ellos.'
,'fix:Las canciones encontradas dejan de amontonarse por detrás de la página.'
);

$todos[]=array(
'13-Septiembre-2013'
,'fix:Fallo en Televisa (string por int). Mismo fallo que en eitb.tv.'
);

$todos[]=array(
'7-Septiembre-2013'
,'fix:Fallo en eitb.tv (string por int).'
);

$todos[]=array(
'3-Septiembre-2013'
,'fix:Canalsur vuelve a funcionar.'
);

$todos[]=array(
'2-Septiembre-2013'
,'add:Botón para avisar de un fallo con rapidez desde la misma página.'
,'fix:F1 de antena3 ahora da el listado completo.'
,'fix:Fallo en algunas URLs de RTVE.'
,'fix:Mitele, Telecinco, cuatro, etc. Solucionado problema de referer.'
,'fix:problema con la redirección a www.'
);

$todos[]=array(
'31-Agosto-2013'
,'add:Soporte para Eitb. <a href="http://descargavid.blogspot.com.es/2013/08/agregado-soporte-para-eitb.html">Más información aquí</a>.'
,'add:M3U8-Downloader'
);

$todos[]=array(
'29-Agosto-2013'
,'fix:Funcionamiento general cambiado: Servidores secundarios quitados.'
);

$todos[]=array(
'26-Agosto-2013'
,'fix:Subdominio para F1 de Antena3 actualizado (F1 vuelve a funcionar).'
);

$todos[]=array(
'23-Agosto-2013'
,'fix:Goear vuelve a funcionar (canciones individuales, listas y canciones de usuario).'
,'fix:Goear vuelve a funcionar (búsqueda de canciones).'
,'fix:Fallos menores.'
);

$todos[]=array(
'22-Agosto-2013'
,'add:Soporte para Televisa y Esmas. <a href="http://descargavid.blogspot.com.es/2013/08/brightcove.html">Más información aquí</a>.'
,'fix:Problemas con algunos vídeos de TV3'
,'fix:En el formulario contacta se solicita adjuntar la URL que provoca el fallo que se quiera informar'
,'fix:Fallos menores'
);

$todos[]=array(
'16-Agosto-2013'
,'fix:Fallos en mitele, cuatro, telecinco y mitelekids.'
);

$todos[]=array(
'6-Agosto-2013'
,'fix:RTVV reescrita.'
,'fix:Optimización en todos los scripts para que funcionen más rápido.'
);

$todos[]=array(
'29-Julio-2013'
,'fix:En caso de que el proxy de MTV de fallo se reseteará.'
);

$todos[]=array(
'25-Julio-2013'
,'add:Soporte para mitelekids.es.'
);

$todos[]=array(
'23-Julio-2013'
,'add:Soporte para cadenaser.com (en pruebas).'
,'add:Soporte para cope.es.'
,'add:Soporte para archivos de audio en Intereconomía.'
,'fix:Problema con algunos vídeos de Intereconomía.'
,'fix:En caso de que el resultado carezca de imagen se mostrará una por defecto.'
,'fix:Arreglos en el texto de los resultados con problemas de codificación.'
,'fix:Cuando se usa el bookmarklet, la URL buscada se escribe en el formulario de búsqueda principal.'
,'fix:Arreglos menores.'
);

$todos[]=array(
'22-Julio-2013'
,'fix:Menor peso de imágenes en la web.'
,'del:Control de servidores secundarios aislado de la página principal a un javascript.'
);

$todos[]=array(
'12-Julio-2013'
,'fix:Control de servidores secundarios aislado de la página principal a un javascript.'
);

$todos[]=array(
'8-Julio-2013'
,'add:Control de servidores secundarios encargados de averiguar los enlaces. Ahora en caso de que estén caidos no serán usados.'
);

$todos[]=array(
'23-Junio-2013'
,'add:Previsualización de los estilos sin activarlos préviamente y desplegable para elegirlos en la página principal.'
);

$todos[]=array(
'20-Junio-2013'
,'fix:Arreglos en TV3 para soportar vídeos que antes fallaban.'
);

$todos[]=array(
'16-Junio-2013'
,'fix:Actualizando el estilo web: 100%.'
);

$todos[]=array(
'30-Mayo-2013'
,'add:Reproductor (Beta).'
,'fix:Antena3 ya no tiene Geobloqueo.'
,'fix:Arreglos menores.'
);

$todos[]=array(
'21-Mayo-2013'
,'fix:Imagen y título en audios de RTVE.'
);

$todos[]=array(
'16-Mayo-2013'
,'fix:Cuatro, Telecinco y Divinity funcionan ahora del mismo modo modo que mitele.'
,'fix:Pequeño reajuste para evitar fallos aleatorios en Mitele, Cuatro, Telecinco y Divinity.'
,'fix:Actualizadas las instrucciones para descargar los vídeos en los resultados.'
);

$todos[]=array(
'11-Mayo-2013'
,'add:Fondo seleccionable entre varios de un listado. <a href="http://descargavid.blogspot.com/2013/05/fondo-elegible-de-un-listado.html">Más información aquí</a>'
);

$todos[]=array(
'9-Mayo-2013'
,'add:Soporte para Grooveshark. <a href="http://descargavid.blogspot.com.es/2013/05/agregado-soporte-para-grooveshark.html">Más información aquí</a>'
);

$todos[]=array(
'6-Mayo-2013'
,'add:Soporte para Vimeo.com. <a href="http://descargavid.blogspot.com.es/2013/05/agregado-soporte-para-vimeo.html">Más información aquí</a>'
);

$todos[]=array(
'30-Abril-2013'
,'fix:Actualizando el estilo web: 90%.'
,'add:Versión movil funcional'
);

$todos[]=array(
'26-Abril-2013'
,'fix:Fallo leve en todos los canales con algunos vídeos y enlaces.'
);

$todos[]=array(
'23-Abril-2013'
,'fix:Actualizando el estilo web: 33%.'
);

$todos[]=array(
'1-Abril-2013'
,'fix:MTV.'
,'fix:Letrero RTMP en los resultados.'
,'fix:Buscador de MP3 informa cuando no se encuentran resultados.'
);

$todos[]=array(
'30-Marzo-2013'
,'fix:Soundcloud vuelve a soportar listas de reproducción.'
,'fix:Fallo en el buscador de canciones.'
,'fix:Mejor funcionamiento del reproductor del buscador de canciones.'
);

$todos[]=array(
'27-Marzo-2013'
,'fix:Antena 3.'
);

$todos[]=array(
'20-Marzo-2013'
,'fix:Mitele (bloqueo).'
);

$todos[]=array(
'16-Marzo-2013'
,'fix:Actualización de SoundCloud (1/2).'
);

$todos[]=array(
'10-Marzo-2013'
,'fix:Corregido fallo con Gamespot.'
);

$todos[]=array(
'1-Marzo-2013'
,'add:Intereconomia.com a petición de un usuario: <a href="http://descargavid.blogspot.com.es/2013/01/mega-actualizacion.html?showComment=1362172509385#c562993595352448264">Comentario</a>.'
);

$todos[]=array(
'25-Febrero-2013'
,'add:Buscador de canciones usando diversos motores de búsqueda simultaneamente. En fase Beta.'
);

$todos[]=array(
'10-Febrero-2013'
,'fix:Problema con el script que enlaza mitele.'
);

$todos[]=array(
'9-Febrero-2013'
,'fix:Nuevo sistema de mostrado de enlaces.'
);

$todos[]=array(
'1-Febrero-2013'
,'add:Soporte para búsquedas de vídeos sin conocer el enlace a traves de la web (mediante google).'
,'fix:RTVE en algunos vídeos'
);

$todos[]=array(
'31-Enero-2013'
,'fix:Souncloud rectificado para canciones individuales'
);

$todos[]=array(
'28-Enero-2013'
,'add:Nuevo estilo web'
,'add:Nuevo metodo de obtención de enlaces más rápido'
);

$todos[]=array(
'23-Enero-2013'
,'fix:TV3. variables cruzadas en el script'
);

$todos[]=array(
'20-Enero-2013'
,'fix:Soundcloud en listas'
);

$todos[]=array(
'17-Enero-2013'
,'add:MTV'
,'add:Listas de reproducción de Goear'
,'add:Soporte http para medici'
,'fix:Imagen en los resultados de Veoh'
,'fix:Más Velocidad en Goear'
,'fix:Fallos en RT'
,'fix:Fallos en RTPA'
,'fix:SoundCloud mejorado'
,'fix:Mejorado RTVE'
,'fix:rtvcm actualizado'
,'fix:Muestra todas las canciones de un usuario de Goear'
,'fix:Nuevo sistema de enlaces con nombres más claros'
,'fix:Títulos en CRTVG'
,'fix:readaptado para Antena 3'
,'fix:Títulos en Aragon Televisión'
,'fix:Títulos en Canalsur'
,'fix:Nombre enlaces de Mitele'
,'fix:Fallo menor en RTVV'
,'fix:Resolución indicada en los enlaces de GameSpot'
,'fix:Arreglos menores'
);

$todos[]=array(
'27-Diciembre-2012'
,'fix:Estilo web reescrito'
);

$todos[]=array(
'21-Diciembre-2012'
,'fix:Mitele. Nuevo sistema gracias a <a href="http://descargavid.blogspot.com.es/2012/09/solucion-para-mitele.html?showComment=1355742944937#c7315317042485455375">Javiero</a>: <a href="http://eljaviero.com/descargarvideosdelasexta/">Web</a>'
);

$todos[]=array(
'18-Diciembre-2012'
,'fix:SoundCloud actualizado'
);

$todos[]=array(
'17-Diciembre-2012'
,'fix:Antena3, capítulos completos. Gracias a AlguiennFTV: <a href="http://www.elbarco.tk">www.elbarco.tk</a>'
);

$todos[]=array(
'6-Diciembre-2012'
,'add:TVG'
);

$todos[]=array(
'25-Noviembre-2012'
,'fix:Mitele'
);

$todos[]=array(
'1-Noviembre-2012'
,'fix:TV3'
);

$todos[]=array(
'22-Octubre-2012'
,'add:CanaldeHistoria.es'
,'fix:AragonTV. Más soporte'
);

$todos[]=array(
'3-Octubre-2012'
,'fix:Nuevo servidor'
,'fix:Nuevo modo de funcionamiento'
,'del:3XL servidor'
);

$todos[]=array(
'1-Octubre-2012'
,'fix:Mejoras de rendimiento'
);

$todos[]=array(
'28-Septiembre-2012'
,'fix:RTVE. Soporte ampliado'
);

$todos[]=array(
'26-Septiembre-2012'
,'fix:Mitele. <a href="http://descargavid.blogspot.com.es/2012/09/solucion-para-mitele.html">Más información aquí</a>'
);

$todos[]=array(
'24-Septiembre-2012'
,'add:Gestor de descargas. <a id=enl href="http://descargavid.blogspot.com.es/2012/09/gestor-de-descargas.html">Más información aquí</a>'
,'fix:RTVE actualizado. Pueden surgir algunos fallos temporalmente.</a>'
);

$todos[]=array(
'26-Septiembre-2012'
,'fix:Mitele. <a href="http://descargavid.blogspot.com.es/2012/09/solucion-para-mitele.html">Más información aquí</a>'
);

$todos[]=array(
'17-Septiembre-2012'
,'add:Goear. <a id=enl href="http://descargavid.blogspot.com.es/2012/09/goear-agregado.html">Más información aquí</a>'
);

$todos[]=array(
'15-Septiembre-2012'
,'fix:Rectificaciones de cambios anteriores'
,'fix:Titulos mejorados'
,'fix:Ajustes menores'
);

$todos[]=array(
'14-Septiembre-2012'
,'add:Addon para firefox. <a id=enl href="http://descargavid.blogspot.com.es/2012/09/addon-para-firefox.html">Más información aquí</a>'
,'fix:Soporte completo para Antena3: Vídeos de la web y modo salón'
,'fix:Cambios internos'
,'fix:Nuevo formato urls'
,'fix:Mejor uso del cache'
,'fix:Titulos con caracteres extraños'
,'fix:Ajustes menores'
,'del:Youtube desactivado'
);

$todos[]=array(
'13-Septiembre-2012'
,'fix:Web movil ahora redimensiona correctamente con cualquier tamaño de pantalla'
,'fix:Problemas con el nuevo servidor'
,'del:Descarga experimental desactivada'
);

$todos[]=array(
'11-Septiembre-2012'
,'fix:LaSexta'
);

$todos[]=array(
'8-Septiembre-2012'
,'fix:Nuevo servidor'
);

$todos[]=array(
'4-Septiembre-2012'
,'fix:TV3. Nuevo formato para descargas HTTP'
,'fix:TV3. Títulos'
);

$todos[]=array(
'26-Agosto-2012'
,'add:Medici. Solo RTMP. <a id=enl href="http://descargavid.blogspot.com.es/2012/08/medicitv-agregada.html">Más información aquí</a>'
,'fix:Resultados'
,'fix:Youtube'
);

$todos[]=array(
'25-Agosto-2012'
,'add:Versión móvil. <a id=enl href="http://descargavid.blogspot.com.es/2012/08/ahora-con-version-para-movil.html">Más información aquí</a>'
);

$todos[]=array(
'23-Agosto-2012'
,'add:Sección FAQ'
,'add:Sección Lab'
,'add:Texto de descripción en inicio'
,'add:URLs amigables'
,'add:Sitemap.xml'
,'fix:Mejoras visuales en la web'
);

$todos[]=array(
'21-Agosto-2012'
,'fix:La web solicita al usuario que desactive AdBlock en caso de estar activo. La elección de activarlo o desactivarlo no influirá en la navegación del sitio'
);

$todos[]=array(
'4-Agosto-2012'
,'fix:Reproductor con enlaces RTMPe'
);

$todos[]=array(
'1-Agosto-2012'
,'fix:Reproductor actualizado'
);

$todos[]=array(
'28-Julio-2012'
,'fix:Problema con YouTube'
);

$todos[]=array(
'27-Julio-2012'
,'fix:Rectificada la anterior modificación por un fallo que bloqueaba la obtención de vídeos'
);

$todos[]=array(
'26-Julio-2012'
,'fix:Mitele (cuatro, divinity, mitele y telecinco) readaptadas al nuevo formato de petición del token'
);

$todos[]=array(
'13-Julio-2012'
,'add:V television. <a id=enl href="http://descargavid.blogspot.com.es/2012/07/vtelevision-agregada.html">Más información aquí</a>'
);

$todos[]=array(
'11-Julio-2012'
,'fix:Gamespot'
);

$todos[]=array(
'10-Julio-2012'
,'add:Sistema de descargas por bypass experimental'
);

$todos[]=array(
'8-Julio-2012'
,'fix:títulos en youtube'
);

$todos[]=array(
'7-Julio-2012'
,'add:Youtube. <a id=enl href="http://descargavid.blogspot.com.es/2012/07/youtube-en-pruebas.html">Más información aquí</a>'
,'fix:Mitele actualizado a un pequeño cambio'
);

$todos[]=array(
'3-Julio-2012'
,'fix:Mitele en enlaces RTMPe'
,'fix:Interprete de los enlaces'
,'fix:Mitele actualizado a varios pequeños nuevos cambios'
);

$todos[]=array(
'1-Julio-2012'
,'add:Reproductor online para los resultados'
);

$todos[]=array(
'29-Junio-2012'
,'add:AragonTV extrae todos los vídeos de una página de "alacarta"'
);

$todos[]=array(
'26-Junio-2012'
,'fix:Resultados de F1 de Antena3 con las imágenes'
);

$todos[]=array(
'24-Junio-2012'
,'add:Univision deja de estar en pruebas'
,'add:Canalextremadura deja de estar en pruebas'
);

$todos[]=array(
'13-Junio-2012'
,'add:Univision en pruebas'
);

$todos[]=array(
'13-Junio-2012'
,'add:RT. <a id=enl href="http://descargavid.blogspot.com.es/2012/06/rt-agregado.html">Más información aquí</a>'
,'fix:RTVE'
);

$todos[]=array(
'13-Junio-2012'
,'add:RT. <a id=enl href="http://descargavid.blogspot.com.es/2012/06/rt-agregado.html">Más información aquí</a>'
,'fix:RTVE'
);

$todos[]=array(
'12-Junio-2012'
,'fix:La Sexta'
,'fix:RTVV'
);

$todos[]=array(
'9-Junio-2012'
,'fix:Estilo web mejorado'
,'fix:Canalsuralacarta'
,'fix:La Sexta'
);

$todos[]=array(
'7-Junio-2012'
,'fix:Canal Rías Baixas'
,'fix:Canalsuralacarta'
);

$todos[]=array(
'6-Junio-2012'
,'add:Gamespot.com'
,'fix:Titulo del resultado de soundcloud'
,'fix:Nuevo estilo web arreglado'
);

$todos[]=array(
'4-Junio-2012'
,'add:Nuevo estilo web. Ambos están disponibles y se puede saltar entre ambos. <a id=enl href="http://descargavid.blogspot.com.es/2012/06/nuevo-estilo-web.html">Más información aquí</a>'
);

$todos[]=array(
'3-Junio-2012'
,'add:Canalextremadura en pruebas. <a id=enl href="http://descargavid.blogspot.com.es/2012/06/canal-extremadura-agregado.html">Más información aquí</a>'
,'add:RTVCM. Solo RTMP'
,'add:Los resultados rtmp contienen la linea que se necesita introducir para descargarlos con RTMPDump'
,'add:LaSexta deja de estar en pruebas'
,'fix:Antena 3'
);

$todos[]=array(
'2-Junio-2012'
,'fix:Mejorado servicio de LaSexta'
,'fix:Fallo menor en descargas'
);

$todos[]=array(
'30-Mayo-2012'
,'add:Canalextremadura. Aunque está disponible no está en pruebas todavía'
,'fix:TV3'
,'fix:La Sexta'
);

$todos[]=array(
'26-Mayo-2012'
,'fix:Estilo web actualizado'
,'fix:La Sexta'
);

$todos[]=array(
'24-Mayo-2012'
,'add:Soundcloud admite listas de reproducción'
,'fix:Algunas URLs que daban fallo por caracteres "extraños" funcionan'
);

$todos[]=array(
'23-Mayo-2012'
,'add:La Sexta en pruebas. <a id=enl href="http://descargavid.blogspot.com/2012/05/la-sexta-agregada.html">Más información aquí</a>'
,'add:LaSextaNoticias en pruebas. <a id=enl href="http://descargavid.blogspot.com/2012/05/la-sexta-agregada.html">Más información aquí</a>'
);

$todos[]=array(
'16-Mayo-2012'
,'fix:RTVE'
);

$todos[]=array(
'16-Mayo-2012'
,'fix:RTVV'
,'fix:Imagenes en el resultado de RTVE'
);

$todos[]=array(
'15-Mayo-2012'
,'add:Orm.es, 7rm.es y RTPA.es dejan de estar en pruebas'
);

$todos[]=array(
'14-Mayo-2012'
,'add:Veoh.com'
);

$todos[]=array(
'12-Mayo-2012'
,'add:Todos los enlaces obtenidos están acompañados de un título y una imagen. <a id=enl href="http://descargavid.blogspot.com.es/2012/05/miniaturas-y-titulo-en-los-resultados.html">Más información aquí</a>'
);

$todos[]=array(
'10-Mayo-2012'
,'add:324.cat'
,'add:Orm.es en pruebas. <a id=enl href="http://descargavid.blogspot.com.es/2012/05/7-region-de-murcia-y-onda-regional-de.html">Más información aquí</a>'
,'add:7rm.es en pruebas. <a id=enl href="http://descargavid.blogspot.com.es/2012/05/7-region-de-murcia-y-onda-regional-de.html">Más información aquí</a>'
,'add:RTPA.es en pruebas. <a id=enl href="http://descargavid.blogspot.com.es/2012/05/rtpa-radiotelevision-del-principado-de.html">Más información aquí</a>'
,'add:Soporte para formula1 de antena 3'
,'add:TV3, 3XL, Esport3 y Super3 dejan de estar en pruebas'
,'add:TVE.es. Estos vídeos pertenecen a rtve pero tienen un funcionamiento diferente'
,'fix:3alacarta'
);

$todos[]=array(
'8-Mayo-2012'
,'add:Super3.cat'
,'add:Blogs.tv3.cat'
,'fix:TV3 arreglado'
);

$todos[]=array(
'5-Mayo-2012'
,'fix:RTVV'
);

$todos[]=array(
'4-Mayo-2012'
,'add:Contadores en la web'
,'add:Soporte para los vídeos del grupo mitele a traves del enlace de insercion:<br/>&lt;iframe src=... &gt;&lt;/iframe&gt;'
,'add:Los enlaces premium tienen su propio mensaje de error y ya no se guarda dicho enlace en el listado de enlaces fallidos para ser solucionados'
,'fix:Mitele'
);

$todos[]=array(
'28-Abril-2012'
,'fix:Mitele'
);

$todos[]=array(
'22-Abril-2012'
,'add:3XL.cat'
);

$todos[]=array(
'20-Abril-2012'
,'fix:TV3.cat'
);

$todos[]=array(
'18-Abril-2012'
,'fix:TV3.cat'
);

$todos[]=array(
'18-Abril-2012'
,'add:Canalsuralacarta. <a id=enl href="http://descargavid.blogspot.com.es/2012/04/canal-sur.html">Más información aquí</a>'
,'fix:Actualizado Antena3. Algunos vídeos han cambiado el formato'
,'fix:Varios cambios estéticos'
);

$todos[]=array(
'16-Abril-2012'
,'add:AragonTV. <a id=enl href="http://descargavid.blogspot.com.es/2012/04/aragontv.html">Más información aquí</a>'
);

$todos[]=array(
'15-Abril-2012'
,'add:TV3.cat en pruebas'
,'add:Esport3.cat en pruebas'
);

$todos[]=array(
'14-Abril-2012'
,'add:RTVE soporta los enlaces de audio del formato "http://www.rtve.es/alacarta/live_audio_PopUp.shtml"'
,'fix:Tras las mejoras del pasado 12 de Abril cometí un error en el servicio de RTVE. Pido disculpas e informo que dicho error se encuentra solucionado'
);

$todos[]=array(
'12-Abril-2012'
,'add:La web cuenta con blog:<br/><a id=enl href=http://descargavid.blogspot.com.es/>descargavid.blogspot.com.es</a><br/>Si se cae, hay algun fallo o cualquier otro problema, se informará allí'
,'add:Nuevas secciones (contacta y changelog)'
);

$todos[]=array(
'8-Abril-2012'
,'fix:Mayor velocidad para obtener los enlaces de todos los servidores'
);

$todos[]=array(
'2-Abril-2012'
,'fix:El enlace obtenido de RTVE es el de mayor calidad de imagen'
);

$todos[]=array(
'1-Abril-2012'
,'fix:RTVE'
,'fix:Mejoras internas para más velocidad'
);

$todos[]=array(
'22-Marzo-2012'
,'fix:Mitele'
);

$todos[]=array(
'21-Marzo-2012'
,'fix:Audio de RTVE'
);

$todos[]=array(
'18-Marzo-2012'
,'add:Telecinco'
,'add:Divinity'
,'add:Soundcloud'
);

$todos[]=array(
'17-Marzo-2012'
,'add:Estilo web'
,'add:KONY&#9660;2012'
);

$todos[]=array(
'15-Marzo-2012'
,'fix:RTVV'
);

$todos[]=array(
'14-Marzo-2012'
,'add:Nuevo estilo de la web'
);

$todos[]=array(
'11-Marzo-2012'
,'add:Nuevos vídeos de RTVE'
);

if($max==-1)
	$max=count($todos);
elseif($max>count($todos))
	$max=count($todos);
else $max=0;

$res='<div id="changelog">';
for($i=0;$i<$max;$i++){
	$res.='<div class="tit">'.$todos[$i][0].'</div>';
	for($j=1;$j<$j_t=count($todos[$i]);$j++){
		$f=strpos($todos[$i][$j],':');
		$tipo=substr($todos[$i][$j],0,$f);
		$mod=substr($todos[$i][$j],$f+1);
		$res.='<div class="in '.$tipo.'">'.$mod.'</div>';
	}
}
return $res.'</div>';
}
?>