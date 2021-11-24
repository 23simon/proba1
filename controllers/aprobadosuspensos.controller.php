<?php

$data['titulo'] = "A";
$data["div_titulo"] = "A";
$resultado = array();

if (isset($_POST['submit'])) {
    $array = json_decode($_POST['introduccion'], true);

    foreach ($array as $asignatura => $alumno) {
        $media = 0;
        $suspensos = 0;
        $aprobados = 0;
        $notaMax = 0;
        $notaMin = 10;
        foreach ($array[$asignatura] as $alumno => $nota) {
            if ($nota < $notaMin) {
                $alumnoMin = $alumno;
                $notaMin = $nota;
            } else if ($nota > $notaMax) {
                $alumnoMax = $alumno;
                $notaMax = $nota;
            }
            $media = $media + $nota;
            if ($nota < 5) {
                $suspensos++;
            } else {
                $aprobados++;
            }
        }

        $resultado[$asignatura]['media'] = $media / count($array[$asignatura]);
        $resultado[$asignatura]['suspensos'] = $suspensos;
        $resultado[$asignatura]['aprobados'] = $aprobados;
        $resultado[$asignatura]['max']['alumno'] = $alumnoMax;
        $resultado[$asignatura]['max']['nota'] = $notaMax;
        $resultado[$asignatura]['min']['alumno'] = $alumnoMin;
        $resultado[$asignatura]['min']['nota'] = $notaMin;
    }
    $tabla = '<table class="table-bordered table"><tbody>';

    $tabla .= '<thead>';

    $tabla .= "<th></th>";
    $tabla .= '<th>media</th>';
    $tabla .= '<th>suspensos</th>';
    $tabla .= '<th>aprobados</th>';
    $tabla .= '<th>alumno-NotaMax</th>';
    $tabla .= '<th>notaMax</th>';
    $tabla .= '<th>alumno-NotaMin</th>';
    $tabla .= '<th>notaMin</th>';

    $tabla .= '</thead>';

    foreach ($resultado as $asignatura => $datos) {
        $tabla .= "<tr><th>" . $asignatura . "</th>
                <td>" . $resultado[$asignatura]['media'] . "</td>
                <td>" . $resultado[$asignatura]['suspensos'] . "</td>
                <td>" . $resultado[$asignatura]['aprobado'] . "</td>
                <td>" . $resultado[$asignatura]['max']['alumno'] . "</td>
                <td>" . $resultado[$asignatura]['max']['nota'] . "</td>
                <td>" . $resultado[$asignatura]['min']['alumno'] . "</td>
                <td>" . $resultado[$asignatura]['min']['nota'] . "</td>";

        $tabla .= "</tr>";
    }

    $tabla .= "</tbody></table>";

    $data['resultado'] = $tabla;
}


include 'views/templates/header.php';
include 'views/aprobadosuspensos.view.php';
include 'views/templates/footer.php';
