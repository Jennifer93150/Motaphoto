//DISPLAY POST REFERANCE IN FORM MODAL
window.addEventListener("DOMContentLoaded", (event) => {
// SELECT CONTENT HTMLELEMENT REFERENCE
var singleRef = document.getElementById('single-reference');
if(singleRef){
    var textContentSingleRef = singleRef.textContent;
}

// CHANGE VALUE FORM REFERENCE INPUT WITH CONTENT HTMLELEMENT REFERENCE
$(document).ready(function () {
    $("#reference").val(textContentSingleRef);
});
});