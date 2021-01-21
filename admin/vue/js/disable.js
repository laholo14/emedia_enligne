
window.oncontextmenu = function () {
    return false;
}
$(document).keydown(function (event) {
    if (event.keyCode == 123) {
        return false;
    }
    else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74) || (event.ctrlKey && event.shiftKey && event.keyCode == 67) || (event.ctrlKey && event.keyCode == 83) || (event.ctrlKey && event.keyCode == 80)) {
        return false;
    }
});
  
