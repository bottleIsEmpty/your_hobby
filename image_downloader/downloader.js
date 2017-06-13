/*globals require*/
var http = require('https');
var fs = require('fs');

// парсинг данных
var innerData = fs.readFileSync('innerData.txt', {
    encoding: 'utf8'
}).split('\n');

var count, filename;

for (count = 0; count < innerData.length; count++) {
    innerData[count] = JSON.parse(innerData[count]);
}

/*globals console*/
console.log('Было считано ' + innerData.length + ' фильмов');

function downloadFile(filename, downloadLink) {
    'use strict';
    
    var request = http.get(downloadLink, function (response) {
               
            var imageData = '';

            response.setEncoding('binary');
            
            response.on('error', function (chunk) {
                console.log(chunk.stack);
                return;
            });
            
            response.on('data', function (chunk) {
                imageData += chunk;
            });
            
            response.on('end', function () {
                
                fs.writeFile('images/' + filename, imageData, 'binary', function (err) {
                    if (err) { throw err; }
                    console.log('File: ' + filename + " written! Link: " + downloadLink);
                });
                
            });
            
        });
}


for (count = 0; count < innerData.length; count++) {
    
    // создание имени файла
    filename = 'film_logo_' + count + '.jpg';
    
    // загрузка
    downloadFile(filename, innerData[count].poster_film_small);

    innerData[count].real_photo = filename;
}