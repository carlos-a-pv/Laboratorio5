<?php                    
    include('conexion.php'); 
    echo '<div style="text-align:center; background-color:black; color: white;"><b><font size="5">RESULTADOS DE LA OPERACION</font></b></div>';
    echo '<br>';
    echo '<hr align="center" width="70%" size="3" color="#FF0000" />';
    echo '<br>';
    
    $opcion=0;       
    if (isset($_POST["Agregar"]))
       $opcion = 1;   
    else if (isset($_POST["Eliminar"])) 
       $opcion = 2; 
    else if (isset($_POST["Consultar"])) 
       $opcion = 3; 
    else if (isset($_POST["Modificar"])) 
       $opcion = 4;
       
    switch($opcion){
       case 1:$agre=agregar($conexion); 
              break; 
              
       case 2:$elim=eliminar($conexion); 
              break;  
       
       case 3:$bus=buscar($conexion); 
              break;
       
       case 4:$modi=modificar($conexion); 
              break;           
    }   
    mysqli_close($conexion);  
    echo '<br><br><br>';
    echo '<div style="text-align:center;"><a href="Clientes.php">Retornar</a></div>'; 
           
   function agregar($conexion){
       $cedula = $_POST['cedula'];
       $nombre = $_POST['nombre'];
       $fecha_nacimientp = $_POST['fecha_nacimiento'];
       $direccion = $_POST['direccion'];
       //$tel = $_POST['txtTelC'];  
       //$cup = $_POST['cmbCupC']; 
             
       $resultado = mysqli_query($conexion,"insert into profesores (cedula, nombre, fecha_nacimiento, direccion) Values ('$cedula','$nombre','$fecha_nacimiento','$direccion')"); 
       
       if($resultado)
       {
          echo '<script type="text/javascript">'
          ,'alert("Registro almacenado");'  
          ,'</script>'
          ;   
       }
       else
       {  
          echo '<script type="text/javascript">'
          , 'alert("Registro No almacenado");' 
          ,'</script>'
         ;             
       } 
     } 
      
    
   
   function buscar($conexion){
       $cedula = $_POST['txtCedC'];  
             
       $resultad = mysqli_query($conexion,"select * from profesores where cedula='$cedula';"); 
       
       if($resultad && mysqli_num_rows($resultad) == 1){     
         $filas=mysqli_fetch_array($resultad); 
         $ced=$filas[0];
         $nom=$filas[1];
         $fec=$filas[2]; 
         $dir=$filas[3];
         $tel=$filas[4];
         $cup=$filas[5]; 
         echo '<div style="text-align:center"><font size="4">Datos del Cliente</font></div>';
         echo '<hr align="center" width="70%" size="3" color="#FF0000"/>';       
         echo '<div style="text-align:center">';
         echo '<table align="center" width="70%" border="1" cellpadding="2" cellspacing="2">';
         echo '<tr valign="top">';
              echo '<td style="border-width : 0px;"><b>CEDULA</b></td>';
              echo '<td style="border-width : 0px;"><b>NOMBRE</b></td>';
              echo '<td style="border-width : 0px;"><b>FECHA NTO</b></td>';
              echo '<td style="border-width : 0px;"><b>DIRECCION</b></td>';
              echo '<td style="border-width : 0px;"><b>TELEFONO</b></td>';
              echo '<td style="border-width : 0px;"><b>CUPO</b></td>';
         echo '</tr>';
         echo '<tr valign="top">';
              echo '<td style="border-width : 0px;">',$ced,'</td>';
              echo '<td style="border-width : 0px;">',$nom,'</td>';
              echo '<td style="border-width : 0px;">',$fec,'</td>';
              echo '<td style="border-width : 0px;">',$dir,'</td>';
              echo '<td style="border-width : 0px;">',$tel,'</td>';
              echo '<td style="border-width : 0px;">',$cup,'</td>';
         echo '</tr>';
         echo '</table>';
         echo '</div>';                                       
       }
       else
       {  
         echo '<div style="text-align:center">Registro No encontrado</div>';             
       }
    }  
               
   function eliminar($conexion){
      $cedu = $_POST['txtCedC'];  
                  
      $resultado = mysqli_query($conexion,"delete from cliente where cedula='$cedu';"); 
      
      if($resultado && mysqli_affected_rows($conexion)==1)
      {
         echo '<script type="text/javascript">'
         ,'alert("Registro eliminado");'  
         ,'</script>';  
      }       
      else
      {   
         echo '<script type="text/javascript">'
         , 'alert("El registro No pudo eliminarse");' 
         ,'</script>';            
      }  
    }
   
   
   function modificar($conexion){ 
      $ced = $_POST['txtCedC'];
      $nom = $_POST['txtNomC'];
      $fec = $_POST['ctrlFN'];
      $dir = $_POST['txtDirC'];
      $tel = $_POST['txtTelC'];  
      $cup = $_POST['cmbCupC'];   
      
      $resultado = mysqli_query($conexion,"update cliente set nombre='$nom', fechanto='$fec', direccion='$dir', telefono='$tel', cupo='$cup' where cedula='$ced';"); 
      
      if($resultado)
      {
         echo '<script type="text/javascript">'
         ,'alert("Registro modificado");'  
         ,'</script>'
         ;   
      }
      else
      {  
         echo '<script type="text/javascript">'
         , 'alert("Registro No modificado");' 
         ,'</script>'
      ;             
      }  
   }          
?>
