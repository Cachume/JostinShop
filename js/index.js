menu = document.getElementById("sidebar")
var estado = false

function menuShow() {
    if (!estado) {
        menu.style.width = "100%"
        estado = true
    } else {
        menu.style.width = "0%" 
        estado=false
    }
    
}