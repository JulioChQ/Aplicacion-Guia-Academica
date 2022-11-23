SELECT asignatura.id_asignatura, asignatura.nombre, asignatura.horas_teoria + asignatura.horas_laboratorio/2 + asignatura.horas_practica/2 as creditos, asignatura.nro_ciclo  FROM (asignatura INNER JOIN curricula ON asignatura.id_curricula = curricula.id_curricula) INNER JOIN usuario ON usuario.id_curricula = curricula.id_curricula WHERE usuario.codigo = '2018-119025';

SELECT asignatura.id_asignatura, asignatura.nombre, asignatura.horas_teoria, asignatura.horas_laboratorio, asignatura.horas_practica, asignatura.nro_ciclo, situacion_asignatura.tipo FROM ((asignatura INNER JOIN curricula ON asignatura.id_curricula = curricula.id_curricula) INNER JOIN usuario ON usuario.id_curricula = curricula.id_curricula) inner JOIN situacion_asignatura ON usuario.id_usuario = situacion_asignatura.id_usuario WHERE usuario.codigo = '2018-119025';

call cursos_por_usuario("2018-119025");