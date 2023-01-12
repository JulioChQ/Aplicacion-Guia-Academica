var existeCuartaMat = false;

function cambiarCreditos() {
   let situacion = document.getElementById("situacion");
   var creditosMaximos;
   document.getElementById("creditos-total").setAttribute("readonly", "");
   switch (situacion.value) {
      case "destacado":
         creditosMaximos = 26;
         document.getElementById("creditos-total").removeAttribute("readonly", "");
         break;
      case "regular":
         creditosMaximos = 22;
         break;
      case "especial":
         creditosMaximos = 12;
         break;
   }
   console.log(creditosMaximos);
   document.getElementById("creditos-total").value = creditosMaximos;
   actualizarRestriccion();
}

function validarCreditosSeleccionados(){
   var creditosSeleccionados = Number(document.getElementById("creditos-selec").value);
   var creditosMaximos = Number(document.getElementById("creditos-total").value);
   console.log(creditosMaximos);
   console.log(creditosSeleccionados);
   if(creditosSeleccionados<=creditosMaximos){
      return true;
   }else{
      return false;
   }
}

function actualizarRestriccion(){
   if(!validarCreditosSeleccionados()){
      var creditosMaximos = document.getElementById("creditos-total").value;
      var creditosSeleccionados = document.getElementById("creditos-selec").value;
      alert("¡Creditos Excedidos, Deselecciona " + (creditosSeleccionados - creditosMaximos) + " credito(s) o más!");
      for (var i = 0; i < document.getElementsByClassName("curso-creditos").length; i++) {
         if (!document.getElementsByClassName("curso-estado")[i].checked) {
            document.getElementsByClassName("nro-matricula")[i].setAttribute("disabled", "");
            document.getElementsByClassName("curso-estado")[i].setAttribute("disabled", "");
         }
   
      }
   }else{
      for (var i = 0; i < document.getElementsByClassName("curso-creditos").length; i++) {
         if (!document.getElementsByClassName("curso-estado")[i].checked && !existeCuartaMat) {
            document.getElementsByClassName("nro-matricula")[i].removeAttribute("disabled", "");
            document.getElementsByClassName("curso-estado")[i].removeAttribute("disabled", "");
         }
   
      }
   }
}

function modificarCreditosSeleccionados() {
   var creditosSeleccionados = 0;
   var horasTeoria = 0;
   var horasPractica = 0;
   var horasLaboratorio = 0;
   var horasTotal = 0;
   for (var i = 0; i < document.getElementsByClassName("curso-creditos").length; i++) {
      if (document.getElementsByClassName("curso-estado")[i].checked) {
         creditosActual = Number(document.getElementsByClassName("curso-creditos")[i].innerHTML);
         horasTeoria = Number(document.getElementsByClassName("curso-ht")[i].innerHTML);
         horasPractica = Number(document.getElementsByClassName("curso-hp")[i].innerHTML);
         horasLaboratorio = Number(document.getElementsByClassName("curso-hl")[i].innerHTML);
         horasTotal = horasTotal + horasTeoria + horasPractica + horasLaboratorio;
         document.getElementsByClassName("estado-aux")[i].value = "si";
         creditosSeleccionados = creditosSeleccionados + creditosActual;
      }else{
         document.getElementsByClassName("estado-aux")[i].value = "no";
      }

   }
   document.getElementById("creditos-selec").value = creditosSeleccionados;
   document.getElementById("horas-total").value = horasTotal;
   actualizarRestriccion();
}

function actualizarEstadoCursos() {
   const cantidadCursos = document.getElementsByClassName("curso-creditos").length;
   var contadorCuartaMat = 0;
   
   for (var i = 0; i < cantidadCursos; i++) {
      var numeroMatricula = document.getElementsByClassName("nro-matricula")[i].value;
      document.getElementsByClassName("nro-matricula-aux")[i].value = numeroMatricula;
      if (numeroMatricula == "1" && !existeCuartaMat ) {
         
         document.getElementsByClassName("curso-estado")[i].removeAttribute("checked", "");
         document.getElementsByClassName("estado-aux")[i].value = "no";
         document.getElementsByClassName("curso-estado")[i].removeAttribute("disabled", "");
      } else {
         if (numeroMatricula == "2" || numeroMatricula == "3") {
            document.getElementsByClassName("curso-estado")[i].setAttribute("checked", "");
            document.getElementsByClassName("estado-aux")[i].value = "si";
            document.getElementsByClassName("curso-estado")[i].setAttribute("disabled", "");
         } else {
            if (numeroMatricula == "4") {
               contadorCuartaMat++;
               existeCuartaMat = true;
               document.getElementsByClassName("curso-estado")[i].setAttribute("checked", "");
               document.getElementsByClassName("estado-aux")[i].value = "si";
               document.getElementsByClassName("curso-estado")[i].setAttribute("disabled", "");
               for (var j = 0; j < cantidadCursos; j++) {
                  var numeroMatricula2 = document.getElementsByClassName("nro-matricula")[j].value;
                  if (numeroMatricula2 == "1") {
                     document.getElementsByClassName("curso-estado")[j].removeAttribute("checked", "");
                     document.getElementsByClassName("estado-aux")[i].value = "no";
                     document.getElementsByClassName("curso-estado")[j].setAttribute("disabled", "");
                  }
               }
            }
         }
         
      }
      
   }
   if(contadorCuartaMat == 0){
      existeCuartaMat = false;
   }
   modificarCreditosSeleccionados();
}