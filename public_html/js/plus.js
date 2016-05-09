/*
 MySQL Slow Query Log Visualizer Plus
 By J.R. MacMillian (http://www.macmillian.net)


 License (MIT)

 Permission is hereby granted, free of charge, to any person
 obtaining a copy of this software and associated documentation
 files (the "Software"), to deal in the Software without restriction,
 including without limitation the rights to use, copy, modify, merge,
 publish, distribute, sublicense, and/or sell copies of the Software,
 and to permit persons to whom the Software is furnished to do so,
 subject to the following conditions:

 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 OTHER DEALINGS IN THE SOFTWARE.
 */




function plus_loadFile(){
    var sourceLocation = "logs/" + plus_filename;

    $.ajaxSetup({ cache: false });

    $.get(sourceLocation, function(result) {
        plus_handleFileManualSelect(result);
    });

}


function plus_handleFileManualSelect(result) {
    var f = new Blob([result]);
    var output = [];
    output.push('<strong>', plus_pretty_filename, '</strong>  - ',  f.size, ' bytes');

    document.getElementById('drop_result').innerHTML = '<h2>Loading ' + output.join('') + '</h2>';

    var reader = new FileReader();

    // Closure to capture the file information.
    reader.onloadend = function(e) {
        if (e.target.readyState == FileReader.DONE) {
            var len = processLog(e.target.result);
            var span = document.createElement('span');
            span.innerHTML = "Imported " + len + " entries.";
            document.getElementById('load_result').insertBefore(span, null);
            createList();
            try {
                createChart();
            } catch (error) {
                console.log(error);
            }
        }
    };

    // Read in the image file as a data URL.
    reader.readAsText(f);
}