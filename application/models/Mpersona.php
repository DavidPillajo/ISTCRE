<?php
class Mpersona extends CI_Model {
   
   //Funcion en la cual muestra cada seleccion que ingresemos
   function getdatosItems(){
        $datos = new stdClass();
        $consulta=$_POST['_search'];
        $numero=  $this->input->post('numero');
        $datos->econdicion ='PER_ESTADO<>1';
		$user=$this->session->userdata('US_CODIGO');
                
              if (!empty($numero)){
                  $datos->econdicion .=" AND PER_SECUENCIAL=$numero";              
				  }
              $datos->campoId = "ROWNUM";
			   $datos->camposelect = array("ROWNUM",
											"PER_SECUENCIAL",
											"PER_SEC_JUNTA",
											"PER_FECHAINGRESO",
											"PER_CEDULA",
											"PER_NOMBRES",
											"PER_APELLIDOS",
											"PER_EMAIL",
											"PER_CONVENCIONAL",
											"PER_CELULAR",
											"(CASE PER_GENERO
											WHEN 'M' THEN 'Masculino'
											WHEN 'F' THEN 'Femenino'
											ELSE '--'
											END) PER_GENERO",
											"PER_NOMBRE_REFERENCIA",
											"PER_TELEFONO_REFERENCIA",
											"(CASE PER_ESTADO_CIVIL
											WHEN 'S' THEN 'Soltero'
											WHEN 'C' THEN 'Casado'
											WHEN 'V' THEN 'Viudo'
											WHEN 'D' THEN 'Divorciado'
											WHEN 'U' THEN 'Union Libre'
											ELSE '--'
											END)  PER_ESTADO_CIVIL",
											"PER_TITULO",
											"(select LOC_DESCRIPCION 
											from ISTCRE_APLICACIONES.LOCALIZACION
											WHERE LOC_SECUENCIAL=PER_LUGAR_ESTUDIO) 
											PER_LUGAR_ESTUDIO",

											"PER_DIRECCION_ESTUDIO",

											"(select LOC_DESCRIPCION 
											from ISTCRE_APLICACIONES.LOCALIZACION
											WHERE LOC_SECUENCIAL=PER_LUGAR_RESIDENCIA)
											PER_LUGAR_RESIDENCIA",

											"PER_DIRECCION_RESIDENCIA",

											"(select LOC_DESCRIPCION 
											from ISTCRE_APLICACIONES.LOCALIZACION
											WHERE LOC_SECUENCIAL=PER_LUGAR_NACIMIENTO)
											PER_LUGAR_NACIMIENTO",

											"PER_DIRECCION_NACIMIENTO",
											
											"(select LOC_DESCRIPCION 
											from ISTCRE_APLICACIONES.LOCALIZACION
											WHERE LOC_SECUENCIAL=PER_LUGAR_TRABAJO)
											PER_LUGAR_TRABAJO",

											"PER_DIRECCION_TRABAJO",
											"PER_TELEFONO_TRABAJO",
											"PER_NIVEL_CONDUCCION",
											"(CASE PER_TIPO_SANGRE
											WHEN 'OP' THEN 'O Positivo'
											WHEN 'ON' THEN 'O Negativo'
											WHEN 'AP' THEN 'A Positivo'
											WHEN 'AN' THEN 'A Negativo'
											WHEN 'BP' THEN 'B Positivo'
											WHEN 'BN' THEN 'B Negativo'
											WHEN 'ABP' THEN 'AB Positivo'
											WHEN 'ABN' THEN 'AB Negativo'
											ELSE '--'
											END)  PER_TIPO_SANGRE",
											"PER_RESPONSABLE",
											"PER_ESTADO");
			  $datos->campos = array( "ROWNUM",
										"PER_SECUENCIAL",
											"PER_SEC_JUNTA",
											"PER_FECHAINGRESO",
											"PER_CEDULA",
											"PER_NOMBRES",
											"PER_APELLIDOS",
											"PER_EMAIL",
											"PER_CONVENCIONAL",
											"PER_CELULAR",
											"PER_GENERO",
											"PER_NOMBRE_REFERENCIA",
											"PER_TELEFONO_REFERENCIA",
											"PER_ESTADO_CIVIL",
											"PER_TITULO",
											"PER_LUGAR_ESTUDIO",
											"PER_DIRECCION_ESTUDIO",
											"PER_LUGAR_RESIDENCIA",
											"PER_DIRECCION_RESIDENCIA",
											"PER_LUGAR_NACIMIENTO",
											"PER_DIRECCION_NACIMIENTO",
											"PER_LUGAR_TRABAJO",
											"PER_DIRECCION_TRABAJO",
											"PER_TELEFONO_TRABAJO",
											"PER_NIVEL_CONDUCCION",
											"PER_TIPO_SANGRE",
											"PER_RESPONSABLE",
											"PER_ESTADO");
			  $datos->tabla="PERSONA";
              $datos->debug = false;	
           return $this->jqtabla->finalizarTabla($this->jqtabla->getTabla($datos), $datos);
   }
   
   //Datos que seran enviados para la edicion o visualizacion de cada registro seleccionado
   function dataPersona($numero){
       $sql="select
				PER_SECUENCIAL,
				PER_SEC_JUNTA,
				PER_FECHAINGRESO,
				PER_CEDULA,
				PER_NOMBRES,
				PER_APELLIDOS,
				PER_EMAIL,
				PER_CONVENCIONAL,
				PER_CELULAR,
				PER_GENERO,
				PER_ALERGIAS,
				PER_NOMBRE_REFERENCIA,
				PER_TELEFONO_REFERENCIA,
				PER_ESTADO_CIVIL,
				PER_TITULO,
				PER_LUGAR_ESTUDIO,
				PER_DIRECCION_ESTUDIO,
				PER_LUGAR_RESIDENCIA,
				PER_DIRECCION_RESIDENCIA,
				PER_LUGAR_NACIMIENTO,
				PER_DIRECCION_NACIMIENTO,
				PER_LUGAR_TRABAJO,
				PER_DIRECCION_TRABAJO,
				PER_TELEFONO_TRABAJO,
				PER_NIVEL_CONDUCCION,
				PER_TIPO_SANGRE,
				PER_ASIST_RUTA,
				PER_ASIST_RUTAANT,
				PER_DOCUM_RUTA,
				PER_DOCUM_RUTAANT,
				PER_RESPONSABLE,
				PER_ESTADO
          FROM PERSONA WHERE PER_SECUENCIAL=$numero";
         $sol=$this->db->query($sql)->row();
         if ( count($sol)==0){
                $sql="select
							PER_SECUENCIAL,
							PER_SEC_JUNTA,
							PER_FECHAINGRESO,
							PER_CEDULA,
							PER_NOMBRES,
							PER_APELLIDOS,
							PER_EMAIL,
							PER_CONVENCIONAL,
							PER_CELULAR,
							PER_GENERO,
							PER_ALERGIAS,
							PER_NOMBRE_REFERENCIA,
							PER_TELEFONO_REFERENCIA,
							PER_ESTADO_CIVIL,
							PER_TITULO,
							PER_LUGAR_ESTUDIO,
							PER_DIRECCION_ESTUDIO,
							PER_LUGAR_RESIDENCIA,
							PER_DIRECCION_RESIDENCIA,
							PER_LUGAR_NACIMIENTO,
							PER_DIRECCION_NACIMIENTO,
							PER_LUGAR_TRABAJO,
							PER_DIRECCION_TRABAJO,
							PER_TELEFONO_TRABAJO,
							PER_NIVEL_CONDUCCION,
							PER_TIPO_SANGRE,
							PER_ASIST_RUTA,
							PER_ASIST_RUTAANT,
							PER_DOCUM_RUTA,
							PER_DOCUM_RUTAANT,
							PER_RESPONSABLE,
							PER_ESTADO
                          FROM PERSONA WHERE PER_SECUENCIAL=$numero";
                         $sol=$this->db->query($sql)->row();
						}
          return $sol;
		}
    	
	//funcion para crear un nuevo reporte o cabecera
    function agrPersona(){
			$sql="select to_char(SYSDATE,'MM/DD/YYYY HH24:MI:SS') FECHA from dual";		
			$conn = $this->db->conn_id;
			$stmt = oci_parse($conn,$sql);
			oci_execute($stmt);
			$nsol=oci_fetch_row($stmt);
			oci_free_statement($stmt);            
            $PER_FECHAINGRESO="TO_DATE('".$nsol[0]."','MM/DD/YYYY HH24:MI:SS')";
			$PER_RESPONSABLE=$this->session->userdata('US_CODIGO');
			
			//VARIABLES DE INGRESO
			$PER_GENERO=$this->input->post('genero');
			$PER_SEC_JUNTA=$this->input->post('PER_SEC_JUNTA');
			$PER_CEDULA=prepCampoAlmacenar($this->input->post('PER_CEDULA'));			
			$PER_NOMBRES=prepCampoAlmacenar($this->input->post('PER_NOMBRES'));			
			$PER_APELLIDOS=prepCampoAlmacenar($this->input->post('PER_APELLIDOS'));			
			$PER_EMAIL=prepCampoAlmacenar($this->input->post('PER_EMAIL'));			
			$PER_CONVENCIONAL=prepCampoAlmacenar($this->input->post('PER_CONVENCIONAL'));			
			$PER_CELULAR=prepCampoAlmacenar($this->input->post('PER_CELULAR'));			
			$PER_ALERGIAS=prepCampoAlmacenar($this->input->post('PER_ALERGIAS'));			
			$PER_NOMBRE_REFERENCIA=prepCampoAlmacenar($this->input->post('PER_NOMBRE_REFERENCIA'));			
			$PER_TELEFONO_REFERENCIA=prepCampoAlmacenar($this->input->post('PER_TELEFONO_REFERENCIA'));			
			$PER_ESTADO_CIVIL=prepCampoAlmacenar($this->input->post('civil'));			
			$PER_TITULO=prepCampoAlmacenar($this->input->post('PER_TITULO'));			
			$PER_LUGAR_ESTUDIO=$this->input->post('ciudad_estudios');
			$PER_DIRECCION_ESTUDIO=prepCampoAlmacenar($this->input->post('PER_DIRECCION_ESTUDIO'));			
			$PER_LUGAR_RESIDENCIA=$this->input->post('ciudad_residencia');
			$PER_DIRECCION_RESIDENCIA=prepCampoAlmacenar($this->input->post('PER_DIRECCION_RESIDENCIA'));			
			$PER_LUGAR_NACIMIENTO=$this->input->post('ciudad_nacimiento');
			$PER_DIRECCION_NACIMIENTO=prepCampoAlmacenar($this->input->post('PER_DIRECCION_NACIMIENTO'));			
			$PER_LUGAR_TRABAJO=$this->input->post('ciudad_trabajo');			
			$PER_DIRECCION_TRABAJO=prepCampoAlmacenar($this->input->post('PER_DIRECCION_TRABAJO'));			
			$PER_TELEFONO_TRABAJO=prepCampoAlmacenar($this->input->post('PER_TELEFONO_TRABAJO'));			
			$PER_NIVEL_CONDUCCION=$this->input->post('PER_NIVEL_CONDUCCION');
			$PER_TIPO_SANGRE=prepCampoAlmacenar($this->input->post('tipoSangre'));			
			
			//VARIABLES DE RUTAS
			$PER_ASIST_RUTA=NULL;
			$PER_ASIST_RUTAANT=NULL;
			$PER_DOCUM_RUTA=NULL;
			$PER_DOCUM_RUTAANT=NULL;
			
				$sql="INSERT INTO PERSONA (
							PER_SEC_JUNTA,
							PER_FECHAINGRESO,
							PER_CEDULA,
							PER_NOMBRES,
							PER_APELLIDOS,
							PER_EMAIL,
							PER_CONVENCIONAL,
							PER_CELULAR,
							PER_GENERO,
							PER_ALERGIAS,
							PER_NOMBRE_REFERENCIA,
							PER_TELEFONO_REFERENCIA,
							PER_ESTADO_CIVIL,
							PER_TITULO,
							PER_LUGAR_ESTUDIO,
							PER_DIRECCION_ESTUDIO,
							PER_LUGAR_RESIDENCIA,
							PER_DIRECCION_RESIDENCIA,
							PER_LUGAR_NACIMIENTO,
							PER_DIRECCION_NACIMIENTO,
							PER_LUGAR_TRABAJO,
							PER_DIRECCION_TRABAJO,
							PER_TELEFONO_TRABAJO,
							PER_NIVEL_CONDUCCION,
							PER_TIPO_SANGRE,
							PER_ASIST_RUTA,
							PER_ASIST_RUTAANT,
							PER_DOCUM_RUTA,
							PER_DOCUM_RUTAANT,
							PER_RESPONSABLE,
							PER_ESTADO) VALUES 
							($PER_SEC_JUNTA,
							$PER_FECHAINGRESO,
							'$PER_CEDULA',
							'$PER_NOMBRES',
							'$PER_APELLIDOS',
							'$PER_EMAIL',
							'$PER_CONVENCIONAL',
							'$PER_CELULAR',
							'$PER_GENERO',
							'$PER_ALERGIAS',
							'$PER_NOMBRE_REFERENCIA',
							'$PER_TELEFONO_REFERENCIA',
							'$PER_ESTADO_CIVIL',
							'$PER_TITULO',
							$PER_LUGAR_ESTUDIO,
							'$PER_DIRECCION_ESTUDIO',
							$PER_LUGAR_RESIDENCIA,
							'$PER_DIRECCION_RESIDENCIA',
							$PER_LUGAR_NACIMIENTO,
							'$PER_DIRECCION_NACIMIENTO',
							$PER_LUGAR_TRABAJO,
							'$PER_DIRECCION_TRABAJO',
							'$PER_TELEFONO_TRABAJO',
							$PER_NIVEL_CONDUCCION,
							'$PER_TIPO_SANGRE',
							'$PER_ASIST_RUTA',
							'$PER_ASIST_RUTAANT',
							'$PER_DOCUM_RUTA',
							'$PER_DOCUM_RUTAANT',
							'$PER_RESPONSABLE',
							0)";
            $this->db->query($sql);
            //print_r($sql);
			$PER_SECUENCIAL=$this->db->query("select max(PER_SECUENCIAL) SECUENCIAL from PERSONA")->row()->SECUENCIAL;
			echo json_encode(array("cod"=>$PER_SECUENCIAL,"numero"=>$PER_SECUENCIAL,"mensaje"=>"Persona: ".$PER_SECUENCIAL.", insertado con éxito"));    
    }
    
	//funcion para editar un registro selccionado
    function editPersona(){
			$PER_SECUENCIAL=$this->input->post('PER_SECUENCIAL');
			
			//VARIABLES DE INGRESO
			$PER_GENERO=$this->input->post('genero');
			$PER_SEC_JUNTA=$this->input->post('PER_SEC_JUNTA');
			$PER_CEDULA=prepCampoAlmacenar($this->input->post('PER_CEDULA'));			
			$PER_NOMBRES=prepCampoAlmacenar($this->input->post('PER_NOMBRES'));			
			$PER_APELLIDOS=prepCampoAlmacenar($this->input->post('PER_APELLIDOS'));			
			$PER_EMAIL=prepCampoAlmacenar($this->input->post('PER_EMAIL'));			
			$PER_CONVENCIONAL=prepCampoAlmacenar($this->input->post('PER_CONVENCIONAL'));			
			$PER_CELULAR=prepCampoAlmacenar($this->input->post('PER_CELULAR'));			
			$PER_ALERGIAS=prepCampoAlmacenar($this->input->post('PER_ALERGIAS'));			
			$PER_NOMBRE_REFERENCIA=prepCampoAlmacenar($this->input->post('PER_NOMBRE_REFERENCIA'));			
			$PER_TELEFONO_REFERENCIA=prepCampoAlmacenar($this->input->post('PER_TELEFONO_REFERENCIA'));			
			$PER_ESTADO_CIVIL=prepCampoAlmacenar($this->input->post('civil'));			
			$PER_TITULO=prepCampoAlmacenar($this->input->post('PER_TITULO'));			
			$PER_LUGAR_ESTUDIO=$this->input->post('ciudad_estudios');
			$PER_DIRECCION_ESTUDIO=prepCampoAlmacenar($this->input->post('PER_DIRECCION_ESTUDIO'));			
			$PER_LUGAR_RESIDENCIA=$this->input->post('ciudad_residencia');
			$PER_DIRECCION_RESIDENCIA=prepCampoAlmacenar($this->input->post('PER_DIRECCION_RESIDENCIA'));			
			$PER_LUGAR_NACIMIENTO=$this->input->post('ciudad_nacimiento');
			$PER_DIRECCION_NACIMIENTO=prepCampoAlmacenar($this->input->post('PER_DIRECCION_NACIMIENTO'));			
			$PER_LUGAR_TRABAJO=$this->input->post('ciudad_trabajo');			
			$PER_DIRECCION_TRABAJO=prepCampoAlmacenar($this->input->post('PER_DIRECCION_TRABAJO'));			
			$PER_TELEFONO_TRABAJO=prepCampoAlmacenar($this->input->post('PER_TELEFONO_TRABAJO'));			
			$PER_NIVEL_CONDUCCION=$this->input->post('PER_NIVEL_CONDUCCION');
			$PER_TIPO_SANGRE=prepCampoAlmacenar($this->input->post('tipoSangre'));			
			
			//VARIABLES DE RUTAS
			$PER_ASIST_RUTA=NULL;
			$PER_ASIST_RUTAANT=NULL;
			$PER_DOCUM_RUTA=NULL;
			$PER_DOCUM_RUTAANT=NULL;
			
				$sql="UPDATE PERSONA SET
							PER_SEC_JUNTA=$PER_SEC_JUNTA,
							PER_CEDULA='$PER_CEDULA',
							PER_NOMBRES='$PER_NOMBRES',
							PER_APELLIDOS='$PER_APELLIDOS',
							PER_EMAIL='$PER_EMAIL',
							PER_CONVENCIONAL='$PER_CONVENCIONAL',
							PER_CELULAR='$PER_CELULAR',
							PER_GENERO='$PER_GENERO',
							PER_ALERGIAS='$PER_ALERGIAS',
							PER_NOMBRE_REFERENCIA='$PER_NOMBRE_REFERENCIA',
							PER_TELEFONO_REFERENCIA='$PER_TELEFONO_REFERENCIA',
							PER_ESTADO_CIVIL='$PER_ESTADO_CIVIL',
							PER_TITULO='$PER_TITULO',
							PER_LUGAR_ESTUDIO=$PER_LUGAR_ESTUDIO,
							PER_DIRECCION_ESTUDIO='$PER_DIRECCION_ESTUDIO',
							PER_LUGAR_RESIDENCIA=$PER_LUGAR_RESIDENCIA,
							PER_DIRECCION_RESIDENCIA='$PER_DIRECCION_RESIDENCIA',
							PER_LUGAR_NACIMIENTO=$PER_LUGAR_NACIMIENTO,
							PER_DIRECCION_NACIMIENTO='$PER_DIRECCION_NACIMIENTO',
							PER_LUGAR_TRABAJO=$PER_LUGAR_TRABAJO,
							PER_DIRECCION_TRABAJO='$PER_DIRECCION_TRABAJO',
							PER_TELEFONO_TRABAJO='$PER_TELEFONO_TRABAJO',
							PER_NIVEL_CONDUCCION=$PER_NIVEL_CONDUCCION,
							PER_TIPO_SANGRE='$PER_TIPO_SANGRE'
                 WHERE PER_SECUENCIAL=$PER_SECUENCIAL";
         $this->db->query($sql);
		 //print_r($sql);
         echo json_encode(array("cod"=>1,"numero"=>$PER_SECUENCIAL,"mensaje"=>"Persona: ".$PER_SECUENCIAL.", editado con éxito"));            
    }

}
?>