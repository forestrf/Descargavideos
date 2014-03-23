<?php

function univisionMovil() {
    global $web, $web_descargada;
    $retfull = $web_descargada;
    //$retfull=CargaWebCurl($web);

    $id = entre1y2($web . 'FINAL', '?id=', 'FINAL');
    dbug('id=' . $id);
    univisionID($id);
}

function univision() {
    global $web, $web_descargada;
    $retfull = $web_descargada;
    //$retfull=CargaWebCurl($web);

    if (enString($retfull, 'video_id=')) {
        $id = entre1y2($retfull, 'video_id=', ',');
    } elseif (enString($retfull, 'fw_video_asset_id')) {
        preg_match("@fw_video_asset_id.*?([0-9]+)@", $retfull, $match);
        $id = $match[1];
    } elseif (enString($retfull, 'videoEmbedCode')) {
        preg_match("@videoEmbedCode.*?([0-9]+)@", $retfull, $match);
        $id = $match[1];
    } else {
        return;
    }

    dbug('id=' . $id);
    univisionID($id);
}

function univisionID($id) {
    $ret = 'http://cdn-download.mcm.univision.com/videos_mcm/' . $id . '.js';
    dbug('url=' . $ret);

    $ret = CargaWebCurl($ret);

    if (enString($ret, "Access Denied")) {
        setErrorWebIntera("El vídeo de Univisión está bloqueado.");
        return;
    }

    $obtenido = array('enlaces' => array());

    //imagen
    $imagen = entre1y2($ret, '"src_image_url":"', '"');
    $imagen = strtr($imagen, array('\\' => ''));
    dbug('imagen=' . $imagen);

    //titulo
    $titulo = entre1y2($ret, '"def_title":"', '"');
    $titulo = jsonRemoveUnicodeSequences($titulo);
    $titulo = limpiaTitulo($titulo);
    dbug('titulo=' . $titulo);

    if (!enString($ret, '"published_urls":[]')) {

        $urlstemp = strtr($ret, array('\\'=>''));

        $urls = array();
        $sigue = 1;
        $ult = 0;
        while ($sigue) {
            if (enString($urlstemp, 'published_url_id', $ult)) {
                $p = strpos($urlstemp, 'published_url_id', $ult) + 17;
                $ult = $f = strpos($urlstemp, '}', $p) + 1;
                $t = substr($urlstemp, $p, $f - $p);

                if (enString($t, 'suburl')) {
                    //"suburl":"
                    $p = strposF($t, '"suburl":"');
                    $f = strpos($t, '"', $p);
                    $urlT = substr($t, $p, $f - $p);

                    //"format":"mp4"
                    $p = strposF($t, '"embed_url":"');
                    $f = strpos($t, '"', $p);
                    $ttt = substr($t, $p, $f - $p);

                    $p = strrpos($ttt, '.') + 1;
                    $f = strlen($ttt);
                    $ttt = substr($ttt, $p, $f - $p);
                    $urlT = 'http://h.univision.com/media' . $urlT . '.' . $ttt;

                    $p = strrpos($urlT, '_') + 1;
                    $f = strpos($urlT, '.', $p);
                    $calidad = substr($urlT, $p, $f - $p);

                    if ($ttt != 'm3u8') {
                        $sePuede = true;
                        $urls_length = count($urls);
                        for ($n = 0; $n < $urls_length; $n++)
                            if ($urlT == $urls[$n][0])
                                $sePuede = false;
                        if ($sePuede)
                            $urls[] = array($urlT, $calidad);
                    }
                }
            } else
                $sigue = 0;
        }
        //ya tenemos las urls en formato: /120615_2708697_El_Talisman_Capitulo_98_99___Ultimo_capitulo_1339800465_2000.mp4
        //ordenar
        $urls = sortmulti($urls, 1, "123", true);
    } else {
        dbug('No se pueden encontrar urls. Usando método 2');
        // http://vmscdn-download.s3.amazonaws.com/videos_mcm/variant/2912557.m3u8

        $m3u8FuenteUrls = 'http://vmscdn-download.s3.amazonaws.com/videos_mcm/variant/' . $id . '.m3u8';
        dbug('$m3u8FuenteUrls = ' . $m3u8FuenteUrls);

        $m3u8FuenteUrls = CargaWebCurl($m3u8FuenteUrls);
        dbug($m3u8FuenteUrls);

        preg_match('@http://.*media(.*?)_[0-9]{3,4}.m3u8@', $m3u8FuenteUrls, $matches);
        dbug_r($matches);

        $urlBase = $matches[1];

        $calidades = array(2000, 1200, 810, 800, 510, 500, 270, 150);

        $urls = array();
        foreach ($calidades as $calidad) {
            $urlT = 'http://h.univision.com/media' . $urlBase . '_' . $calidad . '.mp4';
            $urls[] = array($urlT, $calidad);
        }
        //ya tenemos las urls en formato: /120615_2708697_El_Talisman_Capitulo_98_99___Ultimo_capitulo_1339800465_2000.mp4
        //ya está ordenado
    }

    $urls_length = count($urls);
    for ($i = 0; $i < $urls_length; $i++) {
        if (esVideoAudioAnon($urls[$i][0])) {
            $tit = 'Calidad: ' . $urls[$i][1] . " Kbps";
            $url = $urls[$i][0];
            dbug($tit . " - " . $url);

            array_push($obtenido['enlaces'], array('url' => $url, 'tipo' => 'http', 'url_txt' => $tit));
        }
    }

    $obtenido['titulo'] = $titulo;
    $obtenido['imagen'] = $imagen;

    finalCadena($obtenido, false);
}
?>