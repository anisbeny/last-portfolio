var formValid = document.querySelector("form");
var nom = document.querySelector("#nom");
var mail = document.querySelector("#mail")
var text = document.querySelector("#message");
var missName = document.querySelector(".missname");
var missMail =document.querySelector(".missmail");
var missText =document.querySelector(".misstext");
var missCheck =document.querySelector(".misscheck");
var rgpd = document.querySelector("#rgpd");
function checkName(input, miss){
    var myRegex = /^[a-zA-Z-\s]+$/; 
    if(input.value.trim() === ""){
        miss.textContent="Il faut remplir le champ nom";
    }else if(myRegex.test(input.value)=== false){
        miss.textContent="Le nom ne doit pas comporter des caractères spéciaux";
    }
}
function checkEmail(input, miss){
    var myRegexMail = new RegExp("\\S+@\\S+\\.\\S+");
if(input.value.trim()=== ""){
    miss.textContent="Il faut remplir le champ e-mail";
  
}else if(myRegexMail.test(input.value)=== false){
    miss.textContent="L'email n'est pas valide";
}
}
function checkTextAria(input, miss){
    if(input.value.trim()=== ""){
        miss.textContent="Il faut remplir le champ message";
}
}
function checkRgpd(input, miss){
if(input.checked === false){
    miss.textContent="la case n'est pas cochée" ; 
}
}
formValid.addEventListener("submit", (event)=>{
    event.preventDefault();
    checkName(nom, missName);
    checkEmail(mail, missMail);
    checkTextAria(text, missText);
    checkRgpd(rgpd, missCheck);
    
});