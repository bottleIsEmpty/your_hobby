var https = require('https');
var fs = require('fs');
require('events').EventEmitter.prototype._maxListeners = 300;

var innerData = fs.readFileSync('innerData.txt', {encoding: 'utf8'}).split('\n');

innerData.forEach(function(item, i, array){
    innerData[i] = JSON.parse(innerData[i]);
});

console.log('Было считано ' + innerData.length + ' фильмов');

innerData.forEach(function(item, i, array){
    var date = Date.now();
    var filename = 'film_logo_' + date.toString() + '.jpg';
    downloadFile(filename,  item.poster_film_big);
    innerData[i].real_photo = filename;

});

function downloadFile (filename, downloadLink){
    file = fs.createWriteStream('images/' + filename),

    request = https.get(downloadLink, function(response){
        response.pipe(file);
        console.log('Файл под названием ' + filename +  ' по ссылке ' + downloadLink + ' был успешно загружен');
    });
    file.close();
}




