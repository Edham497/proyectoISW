# 1- Introduccion

 
## 1.1 Proposito

Este documento se realiza para describir los casos de usos y requerimientos del sistema a desarrollar para la guardería 'por definir', se implementará para mejorar la administración actual del establecimiento, será una plataforma web responsiva y amigable para el usuario, también se hará uso de una página de presentación donde se mostrara las instalaciones, información general sobre inscripciones y beneficios que maneja la guardería.

## 1.2 Ambito General

- Mejorara el control de Entradas y Salidas de los niños.
- Publicidad de la guarderia en la pagina web de la guarderia.
- El sistema generara reportes al administrador y a los tutorados.
- La página de la guardería tendrá un login para los usuarios de la plataforma, trabajadores y el administrador. Los usuarios podrán ver el estatus de sus hijos.
- Se implementarán distintos formularios para agilizar funciones de la guardería que actualmente se hacen por escrito.
- Se hará uso un sistema de categorías para alojar en cierto grado a los niños dependiendo de su edad ira de un año a 6 años

## 1.3 Definiciones, Acrónimos, Abreviaturas
- ABC => Altas, Bajas y Consultas
- ### Categorías
   |Sala|Rango de edades|
   |-|-|
   |Maternal 1|1 año a 1 año 6 meses|
   |Maternal 2|1 año 6 meses a 2 años|
   |Maternal 3|2 años a 2 años 6 meses|
   |Maternal 4|2 años 6 meses a 3 años|
   |Maternal 5|3 años a 4 años|
   |por definir|4 años a 6 años|
   
      Nota: este servicio aplica hasta los 6 años.


## Objetivo General
   Mejorar la gestion de la guarderia empleando tecnologias web para que pueda ser accesible en la mayoria de los dispositivos con lo que contamos hoy dia

# Lógica del negocio
 
### Recepcionista
   - Registra la entrada y salida de un niño
   - Registra la hora del evento y la maestra que participó
   - Gestiona las asistencias
   - Recibe documentos y datos de los no autorizados
 
### Maestra
   - Recibe y entrega a los niños
   - Administra los recursos que usarán los niños
   - Alimenta a los niños
   - Pone actividades a los niños
   - Participa en las juntas con los padres
 
### Enfermera
   - Revisa justificantes
   - Revisa el historial médico del niño
   - Puede asumir roles de los maestros
   - Genera reportes en caso de enfermedad
 
### Administrador
   - Inscribe niños
   - Archiva los documentos entregados en la inscripción
   - Cobra las mensualidades y multas
   - Hace cambio de tutor y autorizados
   - Hace los expedientes de los niños
   - Archiva los documentos de los autorizados
   - Tiene junta con los padres
 
# Lógica del sistema
   - Generar Reporte: Maestros, Enfermeros
   - Recepción de niños: Cualquiera
   - Entrega de niños: Cualquiera
   - Inscripción: Administrador
   - Cambio de tutorado y autorizados: Administrador
   - Cobrar: Administrador
   - Rol de recepcionista: cualquiera

   ### ADMINISTRADOR:
   - Sera el encargado de registrar a los niños en el sistema
   - Se Registraran todos y cada uno de los documentos necesarios para llevar a cabo la inscripcion y sea aprobada
   - El sistema avisara o notificara de los cobros de mensualidades y avisara de multas de los padres de familia
   - Registrara en el sistema los cambios de tutores y autorizados
   - Registrara los expedientes de los niños
   - En el sistema hay que regstrar a los autorizados
   - Registrara juntas para los padres de familia
   - Generara reportes sobre los alumnos por fecha

```js
class Administrador{
   registrarNiño()
   alertarPago(Tutor)
   cambiarTutor(Niño)
   cambiarAutorizado(Niño)
   generarExpediente()
}
```

   ### Maestros(as):
   - Registrara entradas y/o salidas de los niños
   - Registrara asistencias en las juntas 
   - Registrara las actividades realizadas con los niños


      - ### recepcionista:
         - Registrara Entrada de los niños

      ### Enfermera(o):
      -  En el sistema se podra revisar el expediente medico de los niños
      - Generara reportes de los niños en caso de que un maestro falte

```js
class Mastro{
   registrarEntrada(Niño);
   registrarSalida(Niño);

};

class recepcionista : Maestro{

};

class Enfermera : Enfermera{

};
```

### tutor
- Podra ver la bitacora del niño
- Obtendra historial academico del niño
- Notificaciones de pago de colegiaturas   

```js
class tutor{
   Niño hijo[];
   Pago colegiatura;

   verBitacora();
   obtenerHistorial();
   alertarPago();
}
```
---
 
# Estudio de Viabilidad
La implementación del sistema ayudará a reducir la redundancia de datos, agiliza y mejora los procesos de registro, recepción y entrega de niños, generando reportes, anuncios de la guardería, pagos.
 
La implementación del sistema es viable operacional ya que la guardería cuenta con el personal suficiente, y estos cuentan con la capacidad y conocimientos suficientes para usar el equipo necesario, solo se le dará una capacitación al administrador.
 
Económicamente es viable ya que se dispone de suficiente tiempo para el desarrollo del sistema y los recursos no son muchos.
 
# Estudio de Factibilidad
Este sistema viene a agilizar la gestión de entrada y salida de los niños, con una mayor seguridad y cuidado de los niños, se generarán reportes con mayor rapidez e información clara para el administrador. Los padres también tendrán acceso a esta información por medio de una plataforma web, en la cual podrá visualizar de forma gráfica el estatus del alumno o alumnos bajo su tutela.


# Requisitos funcionales
|Numero de Requisito|No. 1|||
|-|-|-|-|
|Nombre del Requisito|Inscripción del niño|
|Tipo| [x] Requisito| [ ] Restriccion|
|Fuente del Requisito||
|Prioridad| [x] Alto| [ ] Medio| [ ] Bajo|
|Descripcion|Ingrese descripcion|


|Numero de Requisito|No. 2|||
|-|-|-|-|
|Nombre del Requisito|Inscripción del niño|
|Tipo| [x] Requisito| [ ] Restriccion|
|Fuente del Requisito||
|Prioridad| [x] Alto| [ ] Medio| [ ] Bajo|
|Descripcion|Ingrese descripcion|