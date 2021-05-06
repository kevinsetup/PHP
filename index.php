<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Document</title>
<style type = "text/css">
.container { 
    margin-top: 150px;
    
     }
</style>
</head>
<body>

    <div class="container">
    <div class="row d-flex justify-content-center" >
        <h1 class = "d-flex justify-content-center" >Sistema de venta</h1>
    <div class="col-lg-4">
    <label for="">Fecha inicio</label>
   <br>
        <input type="date" name="" id="fecha_ini" class = "form-select">
     </div>
      <div class="col-lg-3">
     <label for="">Fecha final</label>
        <br>
     <input type="date" name="" id="fecha_final" class = "form-select">
    
    </div>
     
    <div class="col-lg-3">
    <label for="cars" >Cliente:</label>

            <select name="cars" id="cliente" class = "form-select">
              <option value="">Sin datos</option>
            </select>
    
    </div>
    <div class="col-lg-3">
    <br>
    <button class = "btn btn-primary" id = "button">Generar Reporte</button>
    <input type="text" id= "id" hidden >
    </div>

    </div>
   
    </div>
</body>
<script>
$(document).ready(() =>{
    const fecha_ini = document.getElementById("fecha_ini");
    fecha_ini.addEventListener("change", () =>{
        //console.log(typeof(fecha_ini.value.trim()))
        // console.log(fecha_ini.value)
        const fecha_final = document.getElementById("fecha_final");
         fecha_final.addEventListener("change", () =>{
       //console.log(typeof(fecha_final.value.trim()))
       //console.log(fecha_final.value)
       $.ajax({ 
            type : "GET",
            url : "ajax.php",
            data : {
            fecha_ini : fecha_ini.value.trim() , 
            fecha_fin : fecha_final.value.trim()
            },
            dataType : "html"
        })
        .done((msg) => {
            console.log(msg);   
            //$('#cliente option:selected').text(msg.replace(/[0-9]/g, ''))
            $('#cliente').html(msg.replace(/[0-9]/g, ''))      
        }) 
       })
    });
    const cliente = document.getElementById("cliente");
    cliente.addEventListener("change", () =>{
        $.ajax({ 
            type : "GET",
            url : "GetId.php",
            data : {
             nombre : cliente.value , 
            },
            dataType : "html"
        })
        .done((msg) =>{
            console.log(msg);
            $('#id').val(msg.replace(/\D/g,''));
        })
    });
    $('#button').click(() =>{
        let id = document.getElementById('id').value;
        console.log(id);
        $.ajax({ 
            type : "GET",
            url : "GeneratingAjax.php",
            data :  {
                id : id
            },
            dataType : "html"      
        })
        .done((msg) =>{
            swal("XML Creado correctamente !", "Genial :D!", "success");
            console.log(msg)
        })
    });
});

</script>
</html>

