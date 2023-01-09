function cambiarCreditos() {
   let situacion = document.getElementById("situacion");
   var creditosMaximos;
   document.getElementById("creditos-total").setAttribute("disabled", "");
   switch (situacion.value) {
      case "extraordinario":
         creditosMaximos = 26;
         document.getElementById("creditos-total").removeAttribute("disabled", "");
         break;
      case "regular":
         creditosMaximos = 22;
         break;
      case "irregular":
         creditosMaximos = 12;
         break;
   }
   console.log(creditosMaximos);
   document.getElementById("creditos-total").value = creditosMaximos;
}

function modificarCreditosSeleccionados() {
   var creditosSeleccionados = 0;
   for (var i = 0; i < document.getElementsByClassName("curso-creditos").length; i++) {
      if (document.getElementsByClassName("curso-estado")[i].checked) {
         creditosActual = Number(document.getElementsByClassName("curso-creditos")[i].innerHTML);
         creditosSeleccionados = creditosSeleccionados + creditosActual;
      }

   }




   document.getElementById("creditos-selec").value = creditosSeleccionados;

}

