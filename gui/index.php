<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link href="/fontawesome-pro-5.2.0-web/css/all.css" rel="stylesheet">
    <link href="/style.css" rel="stylesheet">
    <title>Come on IRene!</title>
  </head>
  <body>
    <div class="container">
      <table>
        <tbody>
          <tr align="center">
			<td class="underlined"><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_POWER')"><i class="fas fa-power-off fa-5x fa-fw"></i></button></td>		  
            <td colspan="2" class="underlined"><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_MEDIA')"><i class="fas fa-tv-retro fa-5x fa-fw"></i></button></td>
          </tr>
          <tr align="center" valign="bottom" height="250">
            <td><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_VOLUMEUP')"><i class="fas fa-volume-up fa-5x fa-fw"></i></button></td>
            <td><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_CHANNELUP')"><i class="fas fa-chevron-up fa-5x fa-fw"></i></button></td>
            <td ><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_MUTE')"><i class="fas fa-volume-mute fa-5x fa-fw"></i></button></td>
          </tr>
          <tr align="center">
            <td><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_VOLUMEDOWN')"><i class="fas fa-volume-down fa-5x fa-fw"></i></button></td>
            <td><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_CHANNELDOWN')"><i class="fas fa-chevron-down fa-5x fa-fw"></i></button></td>
            <td><button type="button" class="btn btn-outline-dark" onclick="irsend('KEY_TEXT')"><i class="fas fa-align-right fa-5x fa-fw"></i></button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
  <script src="/jquery-3.3.1/jquery-3.3.1.min.js"></script>
  <script src="/script.js"></script>  
</html>
