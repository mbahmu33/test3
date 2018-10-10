<?php
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = '7y341zDol9PRxZTBQbUBH+G/hMz2HU/ddJY6TP1ym61Onnws3oOoHTUYn7tFz8BvWYbuYRS0GLb9cuv+IXgqrX2Si9N00U4G3k1XaocU324vr8jlzOJdpDBxzIidKLZUTPnLjqix60PALljIQhqKggdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '773ac39b8de82b0cdc49237ddcc42dda';//sesuaikan
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId     = $client->parseEvents()[0]['source']['userId'];
$groupId    = $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp  = $client->parseEvents()[0]['timestamp'];
$type       = $client->parseEvents()[0]['type'];
$message    = $client->parseEvents()[0]['message'];
$messageid  = $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = explode(" ", $message['text']);
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
#-------------------------[Function Open]-------------------------#
function tv($keyword) {
    $uri = "https://rest.farzain.com/api/acaratv.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal AcaraTV」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nStasiun : " . $keyword . "-";
    $result .= "\nJadwal : ";
    $result .= $json['result'];
    $result .= "\n「Done~」";
    return $result;
}
function lirik($keyword) {
    $uri = "https://rest.farzain.com/api/joox.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Lirik Lagu」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nPenyanyi : ";
    $result .= $json['info']['penyanyi'];
    $result .= "\nJudul : ";
    $result .= $json['info']['judul'];
    $result .= "\nAlbum : ";
    $result .= $json['info']['album'];
    $result .= "\n\nLirik : ";
    $result .= $json['lirik'];
    $result .= "\n「Done~」";
    return $result;
}
function imgj($keyword) {
    $uri = "https://rest.farzain.com/api/joox.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['gambar'];
    return $result;
}
#-------------------------[Open]-------------------------#
function coolt($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://api.farzain.com/cooltext.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function qr($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://rest.farzain.com/api/qrcode.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
function ahli($keyword) {
    $uri = "https://rest.farzain.com/api/ahli.php?name=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
  
    $response = Unirest\Request::get("$uri");
  
    $json = json_decode($response->raw_body, true);
    $result = "「Ahli」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nNama : " . $keyword;
    $result .= "\nResult : ";
    $result .= $json['result']['result'];
    $result .= "\n「Done~」";
    return $parsed;
}
#-------------------------[Open]-------------------------#
function neon($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result .= "https://rest.farzain.com/api/photofunia/neon_sign.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function light($keyword) { 
    $uri = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20171227T171852Z.fda4bd604c7bf41f.f939237fb5f802608e9fdae4c11d9dbdda94a0b5&text=" . $keyword . "&lang=id-id"; 
 
    $response = Unirest\Request::get("$uri"); 
    $json = json_decode($response->raw_body, true); 
    $result .= " https://rest.farzain.com/api/photofunia/light_graffiti.php?text=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function quotes($keyword) {
    $uri = "https://rest.farzain.com/api/motivation.php?apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Quotes」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nQuotes : ";
    $result .= $json['result']['quotes'];
    $result .= "\nBy : ";
    $result .= $json['result']['by'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
function arti($keyword) {
    $uri = "https://rest.farzain.com/api/nama.php?q=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Arti Nama」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nNama : " . $keyword . "-";
    $result .= "\nArti Nama : ";
    $result .= $json['result'];
    $result .= "\n「Done~」";
    return $result;
}
function wiki($keyword) {
    $uri = "https://rest.farzain.com/api/wikipedia.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Wikipedia」";
    $result .= "\nStatus : ";
    $result .= $json['status'];
    $result .= "\nTitle : ";
    $result .= $json['title'];
    $result .= "\n\nDescription : ";
    $result .= $json['description'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Open]-------------------------#
function wib($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=Jakarta";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wit($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=jayapura";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wita($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=manado";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function tts($keyword) { 
    $uri = "https://translate.google.com/translate_tts?ie=UTF-8&tl=id-ID&client=tw-ob&q=" . $keyword; 

    $response = Unirest\Request::get("$uri"); 
    $result = $uri; 
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function urb_dict($keyword) {
    $uri = "http://api.urbandictionary.com/v0/define?term=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['list'][0]['definition'];
    $result .= "\n\nExamples : \n";
    $result .= $json['list'][0]['example'];
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function zodiak($keyword) {
    $uri = "https://script.google.com/macros/exec?service=AKfycbw7gKzP-WYV2F5mc9RaR7yE3Ve1yN91Tjs91hp_jHSE02dSv9w&nama=ervan&tanggal=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Zodiak Kamu」";
    $result .= "\nLahir : ";
    $result .= $json['data']['lahir'];
    $result .= "\nUsia : ";
    $result .= $json['data']['usia'];
    $result .= "\nUltah : ";
    $result .= $json['data']['ultah'];
    $result .= "\nZodiak : ";
    $result .= $json['data']['zodiak'];
    $result .= "\n\nPencarian : Google";
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function film_syn($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "Judul : \n";
    $result .= $json['Title'];
    $result .= "\n\nSinopsis : \n";
    $result .= $json['Plot'];
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function film($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Informasi Film」";
    $result .= "\nJudul :";
    $result .= $json['Title'];
    $result .= "\nRilis : ";
    $result .= $json['Released'];
    $result .= "\nTipe : ";
    $result .= $json['Genre'];
    $result .= "\nActors : ";
    $result .= $json['Actors'];
    $result .= "\nBahasa : ";
    $result .= $json['Language'];
    $result .= "\nNegara : ";
    $result .= $json['Country'];
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal shalat」";
    $result .= "\nLokasi : ";
    $result .= $json['location']['address'];
    $result .= "\nTanggal : ";
    $result .= $json['time']['date'];
    $result .= "\n\nShubuh : ";
    $result .= $json['data']['Fajr'];
    $result .= "\nDzuhur : ";
    $result .= $json['data']['Dhuhr'];
    $result .= "\nAshar : ";
    $result .= $json['data']['Asr'];
    $result .= "\nMaghrib : ";
    $result .= $json['data']['Maghrib'];
    $result .= "\nIsya : ";
    $result .= $json['data']['Isha'];
    $result .= "\n\nPencarian : Google";
    $result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
function instagram($keyword) {
    $uri = "https://rest.farzain.com/api/ig_profile.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
  
    $response = Unirest\Request::get("$uri");
  
    $json = json_decode($response->raw_body, true);
    $parsed = array();
    $parsed['a1'] = $json['info']['username'];
    $parsed['a2'] = $json['info']['bio'];
    $parsed['a3'] = $json['count']['followers'];
    $parsed['a4'] = $json['count']['following'];
    $parsed['a5'] = $json['count']['post'];
    $parsed['a6'] = $json['info']['full_name'];
    $parsed['a7'] = $json['info']['profile_pict'];
    $parsed['a8'] = "https://www.instagram.com/" . $keyword;
    return $parsed;
}
#-------------------------[Open]-------------------------#
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
//show menu, saat join dan command,menu
if ($command == '/menu') {
    $text .= "「Keyword RpdBot~」\n\n";
    $text .= "- Help\n";
    $text .= "- /jam \n";
    $text .= "- /quotes \n";
    $text .= "- /say [teks] \n";
    $text .= "- /definition [teks] \n";
    $text .= "- /cooltext [teks] \n";
    $text .= "- /shalat [lokasi] \n";
    $text .= "- /qiblat [lokasi] \n";
    $text .= "- /film [teks] \n";
    $text .= "- /qr [teks] \n";
    $text .= "- /neon [teks] \n";
    $text .= "- /ahli [nama] \n";
    $text .= "- /arti-nama [nama] \n";
    $text .= "- /light [teks] \n";
    $text .= "- /film-syn [Judul] \n";
    $text .= "- /lirik [Judul] \n";
    $text .= "- /wikipedia [Judul] \n";
    $text .= "- /zodiak [tanggal lahir] \n";
        $text .= "- /instagram [unsername] \n";
        $text .= "- /jadwaltv [stasiun] \n";
    $text .= "- /creator \n";
    $text .= "\n「Done~」";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $text,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
        )
    );
}
if ($type == 'join') {
    $text = "Terimakasih Telah invite aku ke group ini silahkan ketik Help untuk lihat command aku :)";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $text,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
        )
    );
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/quotes') {
        $result = quotes($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}   
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
if ($command == '/jam') { 
     
        $result = wib($options); 
        $result2 = wit($options); 
        $result3 = wita($options); 
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                  'type' => 'template', 
                  'altText' => 'Jam Indonesia', 
                  'template' =>  
                  array ( 
                    'type' => 'carousel', 
                    'columns' =>  
                    array ( 
                      0 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/gXGfLU/20180913_194713.jpg', 
                        'imageBackgroundColor' => '#FFFFFF', 
                        'title' => 'WIB', 
                        'text' => 'Jam Indonesia WIB', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['time'], 
                            'data' => $result['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['date'],
                            'data' => $result['date'],
                          ), 
                        ), 
                      ), 
                      1 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/nxaPfU/20180913_194725.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WIT', 
                        'text' => 'Jam Indonesia WIT', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['time'], 
                            'data' => $result2['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['date'],
                            'data' => $result2['date'],
                          ), 
                        ), 
                      ), 
                      2 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/cPdc0U/20180913_194744.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WITA', 
                        'text' => 'Jam Indonesia WITA', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['time'], 
                            'data' => $result3['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['date'],
                            'data' => $result3['date'],
                          ), 
                        ),  
                      ),
                    ), 
                  ), 
                ) 
            ) 
        ); 
}
}
if($message['type']=='text') {
        if ($command == '/jadwaltv') {
        $result = tv($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Open]-------------------------#
#-------------------------[Open]-------------------------#  
if($message['type']=='text') {
    if ($command == '/instagram') { 
        
        $result = instagram($options);
        $altText2 = "Followers : " . $result['a3'];
        $altText2 .= "\nFollowing :" . $result['a4'];
        $altText2 .= "\nPost :" . $result['a5'];
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Instagram @' . $options, 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result['a7'], 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => $result['a6'], 
                            'text' => $altText2, 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Check', 
                                'uri' => $result['a8'],
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
    if ($command == '/say') {

        $result = tts($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                'type' => 'audio',
                'originalContentUrl' => $result,
                'duration' => 10000,
                )
            )
        );
}
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if ($message['type'] == 'text') {
    if ($command == '/definition') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Definition : ' . urb_dict($options)
                )
            )
        );
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/ahli') { 
     
        $result = ahli($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            ) 
        ); 
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/cooltext') {
        $result = coolt($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result,
                  'previewImageUrl' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/zodiak') {

        $result = zodiak($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
if($message['type']=='text') {
        if ($command == '/lirik') {
        $result2 = imgj($options);
        $result = lirik($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                  'type' => 'image',
                  'originalContentUrl' => $result2,
                  'previewImageUrl' => $result2
                ),
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/creator') { 
     
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'About Creator RpdBot', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://bpptik.kominfo.go.id/wp-content/uploads/2016/09/Programmer.jpg', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Muhammad Raihan Permadi', 
                            'text' => 'Creator RpdBot', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Contact', 
                                'uri' => 'https://line.me/ti/p/~rhnprmd', 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film-syn') {
        $result = film_syn($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film') {

        $result = film($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/shalat') {

        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
if($message['type']=='text') {
        if ($command == '/wikipedia') {

        $result = wiki($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' => 
  array (
    'type' => 'bubble',
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'text' => $result,
          'wrap' => True,
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
if($message['type']=='text') {
        if ($command == '/test1') {

        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                  'type' => 'flex',
                  'altText' => 'this is a flex message',
                  'contents' => 
                  array (
                    'type' => 'bubble',
                    'body' => 
                    array (
                      'type' => 'box',
                      'layout' => 'vertical',
                      'contents' => 
                      array (
                        0 => 
                        array (
                          'type' => 'text',
                          'text' => $result,
                          'wrap' => True,
                        ),
                      ),
                    ),
                  ),
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/qiblat') { 
     
        $result = qibla($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Qiblat shalat', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Qiblat Shalat', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#----------------------------------#
if($message['type']=='text') {
        if ($command == '/arti-nama') {
        $result = arti($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array( 
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#----------------------------------#
if($message['type']=='text') {
        if ($command == 'Help' || $command == 'help') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                      'type' => 'template',
                      'altText' => 'this is a image carousel template',
                      'template' => 
                      array (
                        'type' => 'image_carousel',
                        'columns' => 
                        array (
                          0 => 
                          array (
                            'imageUrl' => 'https://is5-ssl.mzstatic.com/image/thumb/Purple118/v4/64/c9/6f/64c96f0c-0202-09f6-78b5-1ef915086215/Prod-1x_U007emarketing-85-220-0-5.png/246x0w.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Instagram',
                              'text' => 'Contoh: /instagram jokowi',
                            ),
                          ),
                          1 => 
                          array (
                            'imageUrl' => 'https://rest.farzain.com/api/photofunia/neon_sign.php?text=RpdBot&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Neon Teks',
                              'text' => 'Contoh: /neon RpdBot Mantap',
                            ),
                          ),
                          2 => 
                          array (
                            'imageUrl' => 'https://pbs.twimg.com/profile_images/907880885848088578/maJDkfTn_400x400.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'TTS',
                              'text' => 'Contoh: /say Mantap Jiwa',
                            ),
                          ),
                          3 => 
                          array (
                            'imageUrl' => 'https://bestanimations.com/HomeOffice/Clocks/clock-animated-gif-5.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Jam Indo',
                              'text' => '/jam',
                            ),
                          ),
                          4 => 
                          array (
                            'imageUrl' => 'https://bpptik.kominfo.go.id/wp-content/uploads/2016/09/Programmer.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Creator',
                              'text' => '/creator',
                            ),
                          ),
                          5 => 
                          array (
                            'imageUrl' => 'https://2.bp.blogspot.com/-rj1nxBPkzT0/UEJCW4qHsGI/AAAAAAAAAu0/6xKNlKRHi9U/s1600/perahi+kertas.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Lirik',
                              'text' => 'Contoh: /lirik asal kau bahagia',
                            ),
                          ),
                          6 => 
                          array (
                            'imageUrl' => 'https://www.dailygizmo.tv/wp-content/uploads/2016/04/Joox-Logo-1440x937.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Music',
                              'text' => 'Contoh: /song asal kau bahagia',
                            ),
                          ),
                          7 => 
                          array (
                            'imageUrl' => 'https://www.kiblat.net/files/2018/02/shalat.jpg',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Shalat',
                              'text' => 'Contoh: /shalat Bandung',
                            ),
                          ),
                          8 => 
                          array (
                            'imageUrl' => 'https://us.123rf.com/450wm/nulinukas/nulinukas1202/nulinukas120200019/12251019-boy-watching-tv-cartoon.jpg?ver=6',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'Jadwal Tv',
                              'text' => 'Contoh: /jadwaltv rcti',
                            ),
                          ),
                          9 => 
                          array (
                            'imageUrl' => 'https://pa1.narvii.com/6342/76ec050c2d184bbe728f7cedd48aadc29250b325_hq.gif',
                            'action' => 
                            array (
                              'type' => 'message',
                              'label' => 'More Command',
                              'text' => '/menu',
                            ),
                          ),
                        ),
                      ),
                    )
            )
        );
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/qr') { 
     
        $result = qr($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Qr-code Generator', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Qr-code', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/neon') { 
     
        $result = neon($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Neon teks', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Teks Image Generator', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/light') { 
     
        $result = light($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Light teks', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Teks Image Generator', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
