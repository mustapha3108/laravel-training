import './bootstrap';
import 'preline';
//import "flyonui/flyonui.js";
//import "flyonui/dist";


//theme presistence
if (document.documentElement.getAttribute("data-theme") === "fantasy") {
    document.getElementById("th").checked=false
} else {
    document.getElementById("th").checked=true
}
document.getElementById("th").addEventListener("click", function () {
    if(document.getElementById("th").checked){
        localStorage.setItem("theme", "forest")
        document.documentElement.setAttribute("data-theme","forest")
    }else{
        localStorage.setItem("theme", "fantasy")
        document.documentElement.setAttribute("data-theme","fantasy")
    }
});
