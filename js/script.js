window.onload = function(){
var pageurl = location.href;
const links = document.querySelectorAll("nav> ul>li>a")
for (let link of links){
    if(link.href == pageurl){
        if (window.matchMedia("(min-width: 1024px)").matches) {
        link.style.borderBottom = "4px solid #1e90ff";

        link.style.paddingBottom = "10px"
        }
    }
    
}


}