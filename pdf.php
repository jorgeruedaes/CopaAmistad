<?php 
require('fpdf/fpdf.php');
require('conexion.php');
mysql_query("DELETE FROM te_amonestaciones");
class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('EscudoTorneoN.png',20,8,33);

      $this->SetFont('Arial','B',12);

      $this->Cell(0,10,'Copa Amistad Profesional',0,0,'C');
      $this->Ln();
      $this->Cell(0,10,'AMONESTACIONES ',0,0,'C');

   }
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetMargins(20, 25 , 30);
$pdf->SetFont('Times','',9);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf-> Cell(40,10,'Equipo',1,0,'C');
$pdf-> Cell(60,10,'Nombre del Jugador',1,0,'C');
$pdf-> Cell(40,10,'Amonestacion',1,0,'C');
$pdf-> Cell(30,10,'Valor',1,1,'C');
$pdf-> Cell(30,10,'Comentar',1,1,'C');

$matriz['100']['4']=0;
$consulta= mysql_query("SELECT * FROM tr_amonestacionesxjugador WHERE estado_amonestacion='1'");
$consultavalor=mysql_num_rows($consulta);
$i=0;
while ($sql1=mysql_fetch_array($consulta)){

$idjugador=$sql1['jugador'];
$idamonestacion=$sql1['amonestacion'];

$consulta2= mysql_query("SELECT * FROM tb_jugadores WHERE id_jugadores=$idjugador");

while ($sql=mysql_fetch_array($consulta2)){

	$idequipo = $sql['equipo'];


$consulta3= mysql_query("SELECT * FROM tb_amonestaciones WHERE id_amonestacion=$idamonestacion");
$consulta4= mysql_query("SELECT * FROM tb_equipos WHERE id_equipo=$idequipo order by nombre_equipo asc");
$resultado4=mysql_fetch_array($consulta4);

while($sql2=mysql_fetch_array($consulta3)){

$matriz[$i]['0']=$resultado4['nombre_equipo'];
$matriz[$i]['1']=$sql['nombre1']." ".$sql['nombre2']." ".$sql['apellido1']." ".$sql['apellido2'];
$matriz[$i]['2']=$sql2['nombre'];
$matriz[$i]['3']=$sql2['valor'];
$matriz[$i]['4']="comentario";
$i=$i+1;
}
}
}
for ($i=0; $i <$consultavalor ; $i++) { 
$nombreequipo=$matriz[$i]['0'];
$nombrejugador=$matriz[$i]['1'];
$nombreamonestacion=$matriz[$i]['2'];
$numero=$matriz[$i]['3'];
$comentario=$matriz[$i]['4'];
mysql_query("INSERT INTO te_amonestaciones(`equipo`, `jugador`, `amonestacion`, `valor`, `Comentario`)
 VALUES ('$nombreequipo','$nombrejugador','$nombreamonestacion','$numero','$comentario');");
}

$consulta5= mysql_query("SELECT * FROM te_amonestaciones ORDER BY equipo ASC,jugador ASC");


while($sql1=mysql_fetch_array($consulta5)){



$pdf->Cell(40,5,$sql1['equipo'],1,0,'C');
$pdf->Cell(60,5,$sql1['jugador'],1,0,'C');
$pdf->Cell(40,5,$sql1['amonestacion'],1,0,'C');
$pdf->Cell(30,5,$sql1['valor'],1,0,'C');

$pdf->Ln();

}

$pdf->Output();
?>
