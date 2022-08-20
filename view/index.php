<?php 
//$fecha1= new DateTime("2020-03-20");
//$fecha2= new DateTime("2020-03-30");
//$diff = $fecha1->diff($fecha2);

// El resultados sera 3 dias
//echo $diff->days . ' dias';
//echo $ahora = date("Y-m-d H:i:s");

?>



<section class="content">
	<div class="row">
		<div class="col-md-12" style="padding-top:5em;text-align: center;">
			<div class="login-logo">        
        		<img src="assets/dist/img/logo.png" alt="" style="width: 100px;">
      		</div><!-- /.login-logo -->
		</div>
		<div class="col-md-12">
			
		<?php
			
			echo '<pre>' ;
				$variable=1;
				print_r($variable.'<br>');
				print_r('<br>');


				//Ejemplo de dias de la semana
				$semana[0]='lunes'.'<br>';
				$semana[1]='martes'.'<br>';
				$semana[2]='miercoles'.'<br>';
				$semana[3]='jueves'.'<br>';
				$semana[4]='viernes'.'<br>';
				$semana[5]='sábado'.'<br>';
				$semana[6]='domingo'.'<br>';

				for ($i=0; $i<count($semana);$i++)
				{
					echo $semana[$i];
				}
				print_r('<br>');



				//Ejemplo de cursos
				$cursos = array('Analisis Complejo','Matemática Básica','Optimización','Tesis','Calculo I','Estadística');
	
				print_r($cursos);
				//echo($cursos); No se puede usar echo por que es un variable
				print_r('<br>');


				print_r('El cuarto curso asignado es: '.$cursos[3]);
				print_r('<br>');

				echo count($cursos);
				print_r('<br>');
				print_r('<br>');


				//foreach con la variable cursos
				//$arreglo = [];
				$arreglo = array();
				$j=0;

				foreach ($cursos as $key) {
					//$arreglo[1][$j]['subindices']=$key;
					$arreglo['cursos'][$j]=$key;
					$j++;
				}
				print_r($arreglo);
				print_r('<br>');
				print_r('<br>');

				//ver informacion de los tipo de variable
				var_dump($arreglo);

				echo '</pre>' ;	
			?>
		</div>
	</div>	




</section>



