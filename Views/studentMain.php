<?php 
    namespace Views;

    use Models\Student as Student;

    $student = new Student();
    $student = $_SESSION["student"];
    var_dump($student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $student->getFirstName();?></title>
</head>
<body>
    <table class="table bg-light-alpha">
                    <thead>
                         <th>Id de estudiante</th>
                         <th>Id de carrera</th>
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>DNI</th>
                         <th>Numero de legajo</th>
                         <th>Genero</th>
                         <th>Fecha de nacimiento</th>
                         <th>Email</th>
                         <th>Telefono</th>
                         <th>Actividad</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $student->getStudentId(); ?></td>
                            <td><?php echo $student->getCareerId(); ?></td>
                            <td><?php echo $student->getFirstName(); ?></td>
                            <td><?php echo $student->getLastName(); ?></td>
                            <td><?php echo $student->getDni(); ?></td>
                            <td><?php echo $student->getFileNumber(); ?></td>
                            <td><?php echo $student->getGender(); ?></td>
                            <td><?php echo $student->getBirthDate(); ?></td>
                            <td><?php echo $student->getEmail(); ?></td>
                            <td><?php echo $student->getPhoneNumber(); ?></td>
                            <td><?php echo $student->getActive(); ?></td>
                        </tr>
                    </tbody>
               </table>
</body>
</html>