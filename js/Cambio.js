function OfertasEnviadasInfoMore(){
  document.getElementById("OfertasEnviadasInfo").style.display = 'none';
  document.getElementById("OfertasEnviadasInfoMore").style.display = 'block';

}


function OfertasEnviadas(){
  document.getElementById("OfertasEnviadasInfo").style.display = 'grid';
  document.getElementById("OfertasEnRevisión").style.display = 'none';
  document.getElementById("OfertasConfirmadas").style.display = 'none';
  document.getElementById("ConfiguraciónDeCuenta").style.display = 'none';
  document.getElementById("CambiarContrasenia").style.display = 'none';
  document.getElementById("OfertasEnviadasInfoMore").style.display = 'none';
}

function OfertasenRevision(){
  document.getElementById("OfertasEnviadasInfo").style.display = 'none';
  document.getElementById("OfertasEnRevisión").style.display = 'grid';
  document.getElementById("OfertasConfirmadas").style.display = 'none';
  document.getElementById("ConfiguraciónDeCuenta").style.display = 'none';
  document.getElementById("CambiarContrasenia").style.display = 'none';
  document.getElementById("OfertasEnviadasInfoMore").style.display = 'none';
}

function OfertasConfirmadas(){
  document.getElementById("OfertasEnviadasInfo").style.display = 'none';
  document.getElementById("OfertasEnRevisión").style.display = 'none';
  document.getElementById("OfertasConfirmadas").style.display = 'grid';
  document.getElementById("ConfiguraciónDeCuenta").style.display = 'none';
  document.getElementById("CambiarContrasenia").style.display = 'none';
  document.getElementById("OfertasEnviadasInfoMore").style.display = 'none';
}

function ConfiguraciondeCuenta(){
  document.getElementById("OfertasEnviadasInfo").style.display = 'none';
  document.getElementById("OfertasEnRevisión").style.display = 'none';
  document.getElementById("OfertasConfirmadas").style.display = 'none';
  document.getElementById("ConfiguraciónDeCuenta").style.display = 'block';
  document.getElementById("CambiarContrasenia").style.display = 'none';
  document.getElementById("OfertasEnviadasInfoMore").style.display = 'none';
}

function CambiarContrasenia(){
  document.getElementById("OfertasEnviadasInfo").style.display = 'none';
  document.getElementById("OfertasEnRevisión").style.display = 'none';
  document.getElementById("OfertasConfirmadas").style.display = 'none';
  document.getElementById("ConfiguraciónDeCuenta").style.display = 'none';
  document.getElementById("CambiarContrasenia").style.display = 'block';
  document.getElementById("OfertasEnviadasInfoMore").style.display = 'none';
}










function sortTable(n,type) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
 
  table = document.getElementById("myTable");
  switching = true;
  
  dir = "asc";
 
  
  while (switching) {
    
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
