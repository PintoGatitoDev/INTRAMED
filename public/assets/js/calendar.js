function createCalendar(elem, year, month) {

      let mon = month - 1; // los meses en JS son 0..11, no 1..12
      let d = new Date(year, mon);
      var hoy = new Date();
      let anioActual = hoy.getFullYear() - year;
      console.log(anioActual);
      let ant = document.querySelector("#ant");
      if(month <= (hoy.getMonth() + 1) && anioActual >= 0 )
      {
        ant.setAttribute("style", "display: none");
        //console.log(hoy.getDate());
        d.setDate(hoy.getDate());
      }
      else
      {
        ant.setAttribute("style", "display: block");
      }
      let table = '<tr>';
      // espacios en la primera línea
      // desde lunes hasta el primer día del mes
      // * * * 1  2  3  4
      for (let i = 0; i < getDay(d); i++) {
        table += '<td class="NA"></td>';
      }
      var j = 0;
      // <td> con el día  (1 - 31)
      while (d.getMonth() == mon) {
        if(d.getDate() < 10)
        {
          table += '<td class="Dis" id="' + d.getFullYear() + "-" + d.getMonth() + "-0" + d.getDate() + '">' + d.getDate() + '</td>';
        }
        else
        {
          table += '<td class="Dis" id="' + d.getFullYear() + "-" + d.getMonth() + "-" + d.getDate() + '">' + d.getDate() + '</td>';
        }
        
        if (getDay(d) % 7 == 6) { // domingo, último dia de la semana --> nueva línea
          table += '</tr><tr>';
        }
        j++;

        d.setDate(d.getDate() + 1);
      }

      // espacios después del último día del mes hasta completar la última línea
      // 29 30 31 * * * *
      if (getDay(d) != 0) {
        for (let i = getDay(d); i < 7; i++) {
          table += '<td class="NA"></td>';
        }
      }

      // cerrar la tabla
      table += '</tr></table>';

      elem.innerHTML = table;
    }

    function getDay(date) { // obtiene el número de día desde 0 (lunes) a 6 (domingo)
      let day = date.getDay();
      if (day == 0) day = 7; // hacer domingo (0) el último día
      return day - 1;
    }

    function siguiente()
    {
      var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
      var anio = document.querySelector("#Panio").textContent;
      var mes = document.querySelector("#Pmes").textContent;

      if(mes == 12)
      {
        mes = 1;
        anio = parseInt(anio) + 1;
      }
      else
      {
        mes++;
      }

      createCalendar(cal_body,anio,mes);

      var diaCalendario = document.querySelectorAll(".Dis");
      diaCalendario.forEach(dia => {
        dia.addEventListener("click", asignarCitas);
      });

      Pmes.innerHTML = mes;
      Panio.innerHTML = anio;
      if(mes == 0)
      {
        Emes.innerHTML = meses[0];
      }
      else
      {
        Emes.innerHTML = meses[mes-1];
      }
    }

    function anterior()
    {
      var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
      var anio = document.querySelector("#Panio").textContent;
      var mes = document.querySelector("#Pmes").textContent;


      if(mes == 1)
      {
        mes = 12;
        anio -= 1;
      }
      else
      {
        mes--;
      }

      createCalendar(cal_body,anio,mes);

      var diaCalendario = document.querySelectorAll(".Dis");
      diaCalendario.forEach(dia => {
        dia.addEventListener("click", asignarCitas);
      });

      Pmes.innerHTML = mes;
      Panio.innerHTML = anio;
      Emes.innerHTML = meses[mes-1]
    }

    async function asignarCitas() {
      var boton = event.target;

      console.log(boton.id);

    /*const response = await fetch("http://localhost:8080/Citas/prueba?fecha=" fecha);
    try {
      const citas = await response.json();

    } catch (error) {
      console.error("Error parsing JSON:", error);
    }*/
  }

    var FechaActual = new Date();
    console.log(FechaActual);
    var mes = FechaActual.getMonth() + 1;
    var anio = FechaActual.getFullYear();

    createCalendar(cal_body, anio, mes);

    
    

    Pmes.innerHTML = mes;
    Panio.innerHTML = anio;

    document.querySelector("#sig").addEventListener("click", siguiente);
    document.querySelector("#ant").addEventListener("click", anterior);
    
