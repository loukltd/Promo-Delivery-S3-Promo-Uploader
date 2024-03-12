var swapCodes = new Array(8211, 8212, 8216, 8217, 8220, 8221, 8226, 8230); // dec codes from char at
var swapStrings = new Array("--", "--", "'", "'", "\"", "\"", "*", "...");

function cleanWordClipboard(input) {
    // Replace special characters
    var output = input;
    for (var i = 0; i < swapCodes.length; i++) {
        var swapper = new RegExp("\\u" + swapCodes[i].toString(16), "g"); // hex codes
        output = output.replace(swapper, swapStrings[i]);
    }
    // Replace line breaks with <br>
    output = output.replace(/\n/g, "<br>");
    return output;
}
