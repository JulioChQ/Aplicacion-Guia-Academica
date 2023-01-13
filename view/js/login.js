function guardarSesion(){
   if(document.getElementById("recuerdame").checked){
      var codigo = document.getElementById("floatingInput").value;
      document.cookie="usuario="+codigo+"; recuerdame=true";
   }else{
      document.cookie="usuario=;recuerdame=false";
   }
   console.log(document.cookie);
}

function getCookie(cname) {
   let name = cname + "=";
   let decodedCookie = decodeURIComponent(document.cookie);
   let ca = decodedCookie.split(';');
   for(let i = 0; i <ca.length; i++) {
     let c = ca[i];
     while (c.charAt(0) == ' ') {
       c = c.substring(1);
     }
     if (c.indexOf(name) == 0) {
       return c.substring(name.length, c.length);
     }
   }
   return "";
 }

let usuario = getCookie("usuario");
if(usuario != ""){
   document.getElementById("recuerdame").checked = true;
   document.getElementById("floatingInput").value = usuario;
}
console.log(document.cookie);