<?php

$alumnos=[

    [
        'nombre'=> 'Nemesis',
        'apellido'=> 'Valencia',
        'carnet'=> 'VR211067',
        'CUM'=> 6,
        'materias'=>['LIS04','APN501','PED104']
    ],
    [
        'nombre'=> 'Miguel',
        'apellido'=> 'Flores',
        'carnet'=> 'FC231445',
        'CUM'=> 8,
        'materias'=>['LIS04','APN501','ESA501']
    ],
    [
        'nombre'=> 'Laura',
        'apellido'=> 'Martinez',
        'carnet'=> 'MR225877',
        'CUM'=> 6,
        'materias'=>['CAD501','APN501','ESA501']
    ]
    ];
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Carnet</th>
            <th>CUM</th>
            <th>Materias Inscritas</th>
        </tr>
        <?php
        foreach($alumnos as $alumno){


        
        ?> 
        
        <tr>
            <td><?=$alumno['nombre' ]?></th>
            <td><?=$alumno['apellido' ]?></th>
            <td><?=$alumno['carnet' ]?></th>
            <td><?=$alumno['CUM' ]?></th>
            <td><?= implode(' ',$alumno['materias' ],) ?></th>
        </tr>
        <?php
        }
        ?>

</table>