<?php 

    include_once("Clases/libExcel/PHPExcel.php"); 
    include_once("Clases/Conexion.php");
	
	$conexion = new Conexion();
	$prueba = new PHPExcel(); 

    $count = 2;   
    $np = 0; 
   
   	$sql = "SELECT * FROM titulacion";
    $result = $conexion->consulta($sql);
    $prueba->setActiveSheetIndex(0)->setCellValue("A1","PRUEBA"); 
    $prueba->setActiveSheetIndex(0)->setCellValue("A1","No.");
    $prueba->setActiveSheetIndex(0)->setCellValue("B1","Tipo");                        
    $prueba->setActiveSheetIndex(0)->setCellValue("C1","Nombre");                    
    $prueba->setActiveSheetIndex(0)->setCellValue("D1","Título");            
    $prueba->setActiveSheetIndex(0)->setCellValue("E1","Nombre del Rector");     
    $prueba->setActiveSheetIndex(0)->setCellValue("F1","Lugar y Fecha de Expedición de Titulo");        
    $prueba->setActiveSheetIndex(0)->setCellValue("G1","Libro");             
    $prueba->setActiveSheetIndex(0)->setCellValue("H1","Foja");              
    $prueba->setActiveSheetIndex(0)->setCellValue("I1","CURP");              
    $prueba->setActiveSheetIndex(0)->setCellValue("J1","Estudios de Bachillerato"); 
    $prueba->setActiveSheetIndex(0)->setCellValue("K1","Periodo");
    $prueba->setActiveSheetIndex(0)->setCellValue("L1","Entidad Federativa");
    $prueba->setActiveSheetIndex(0)->setCellValue("M1","Institución");         
    $prueba->setActiveSheetIndex(0)->setCellValue("N1","Carrera");               
    $prueba->setActiveSheetIndex(0)->setCellValue("O1","Periodo");       
    $prueba->setActiveSheetIndex(0)->setCellValue("P1","Entidad Federativa");   
    $prueba->setActiveSheetIndex(0)->setCellValue("Q1","Fecha de Examen");    
    $prueba->setActiveSheetIndex(0)->setCellValue("R1","Lugar y Fecha de la Certificación");         
    $prueba->setActiveSheetIndex(0)->setCellValue("S1","Administración Escolar");

    while($row = mysqli_fetch_array($result)){
    	$celda = "A";
    	$count++;
        $np++;
        $tt="";

        
        if($row['tipo_titulacion']=='1'){
            $tt = "UNO";
        }
        if($row['tipo_titulacion']=='2'){
            $tt = "DOS";
        }
    	
    	$elementos = (count($row,COUNT_NORMAL)/2)-1;
    	$nombre = $row['nombre']." ".$row['a_paterno']." ".$row['a_materno'];

  
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$np);					$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$tt);	                     $celda++;
        $prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$nombre);                    $celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['titulo']);			$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['nombre_rector']);		$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['exp_titulo']);		$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['libro']);				$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['foja']);				$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['curp']);				$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['nombre_bachillerato']); $celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['periodo_bachillerato']);$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['entidad_bachillerato']);$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['institucion']);		  $celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['carrera']);				$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['periodo_carrera']);		$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['entidad_institucion']);	$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['examen_profesional']);	$celda++;
    	$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['certificacion']);			$celda++;
		$prueba->setActiveSheetIndex(0)->setCellValue($celda.$count,$row['administracion_escolar']);$celda++;

    }
    
    

    $prueba->getActiveSheet()->setTitle("Titulacion"); 

    $objWriter = PHPExcel_IOFactory::createWriter($prueba, 'Excel2007'); 
    $objWriter->save('Exportables/exportableTitulacion.xlsx'); 
    
    ECHO "true";
 ?>