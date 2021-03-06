CREATE TABLE registros (
  codHito INTEGER NOT NULL,
  codregistros INTEGER NOT NULL,
  entregatable VARCHAR(120) NULL,
  PRIMARY KEY(codHito, codregistros)
);
CREATE TABLE foro (
  codforo SERIAL NOT NULL,
  autor VARCHAR(45) NULL,
  titulo VARCHAR(45) NULL,
  mensaje TEXT NULL,
  PRIMARY KEY(codforo)
);

CREATE TABLE Usuario (
  idUsuario SERIAL NOT NULL,
  login VARCHAR(45) UNIQUE,
  passwd VARCHAR(45) NULL,
  habilitada BOOL NOT NULL,
  PRIMARY KEY(idUsuario)
);

CREATE TABLE Funcion (
  codFuncion SERIAL NOT NULL,
  tipoFuncion VARCHAR(45) NULL,
  PRIMARY KEY(codFuncion)
);

CREATE TABLE Rol (
  codRol SERIAL NOT NULL,
  tipoRol VARCHAR(45) NULL,
  PRIMARY KEY(codRol)
);

CREATE TABLE Tipo_Socio (
  codTipo_Socio SERIAL NOT NULL,
  nombreTipo VARCHAR(45) NULL,
  PRIMARY KEY(codTipo_Socio)
);

CREATE TABLE App (
  codApp SERIAL NOT NULL,
  nombreApp VARCHAR(45) NULL,
  PRIMARY KEY(codApp)
);

CREATE TABLE Grupo_Empresa (
  CodGrupo_Empresa SERIAL NOT NULL,
  Usuario_idUsuario INTEGER NOT NULL,
  nombrelargoGE VARCHAR(45) UNIQUE,
  nombreCortoGE VARCHAR(45) NOT NULL,
  correoGE VARCHAR(45) NOT NULL,
  direccionGE VARCHAR(45) NOT NULL,
  telefonoGE INTEGER NOT NULL,
  PRIMARY KEY(CodGrupo_Empresa, Usuario_idUsuario),
  FOREIGN KEY(Usuario_idUsuario)
    REFERENCES Usuario(idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Telf_GE (
  idTelf_GE SERIAL NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  numeroTelf INTEGER NULL,
  PRIMARY KEY(idTelf_GE, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario),
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE consultor
(
  idconsultor SERIAL NOT NULL,
  usuario_idusuario integer NOT NULL,
  nombreconsultor character varying(45),
  correoconsultor character varying(45),
  telefonoconsultor INTEGER NOT NULL,
  CONSTRAINT consultor_pkey PRIMARY KEY (idconsultor, usuario_idusuario),
  CONSTRAINT consultor_usuario_idusuario_fkey FOREIGN KEY (usuario_idusuario)
      REFERENCES usuario (idusuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT consultor_idconsultor_key UNIQUE (idconsultor)
);

CREATE TABLE calendario
(
  codcalendario SERIAL NOT NULL,
  grupo_empresa_codgrupo_empresa integer NOT NULL,
  grupo_empresa_usuario_idusuario integer NOT NULL,
  dia_reunion_fijado boolean DEFAULT false,
  CONSTRAINT calendario_pkey PRIMARY KEY (codcalendario, grupo_empresa_codgrupo_empresa, grupo_empresa_usuario_idusuario),
  CONSTRAINT calendario_grupo_empresa_codgrupo_empresa_fkey FOREIGN KEY (grupo_empresa_codgrupo_empresa, grupo_empresa_usuario_idusuario)
      REFERENCES grupo_empresa (codgrupo_empresa, usuario_idusuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE plan_pago
(
  codplan_pago SERIAL NOT NULL,
  calendario_codcalendario integer NOT NULL,
  calendario_grupo_empresa_codgrupo_empresa integer NOT NULL,
  calendario_grupo_empresa_usuario_idusuario integer NOT NULL,
  montototal real,
  porcentajesatisfaccion integer,
  CONSTRAINT plan_pago_pkey PRIMARY KEY (codplan_pago, calendario_codcalendario, calendario_grupo_empresa_codgrupo_empresa, calendario_grupo_empresa_usuario_idusuario),
  CONSTRAINT plan_pago_calendario_codcalendario_fkey FOREIGN KEY (calendario_codcalendario, calendario_grupo_empresa_codgrupo_empresa, calendario_grupo_empresa_usuario_idusuario)
      REFERENCES calendario (codcalendario, grupo_empresa_codgrupo_empresa, grupo_empresa_usuario_idusuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE Socio (
  idSocio SERIAL NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Tipo_Socio_codTipo_Socio INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Usuario_idUsuario INTEGER NOT NULL,
  nombreSocio VARCHAR(15) NULL,
  apellidosSocio VARCHAR(25) NULL,
  estadoCivil VARCHAR(15) NULL,
  direccion VARCHAR(45) NULL,
  edad INTEGER NULL,
  profecion VARCHAR(45) NULL,
  PRIMARY KEY(idSocio, Grupo_Empresa_CodGrupo_Empresa, Tipo_Socio_codTipo_Socio, Grupo_Empresa_Usuario_idUsuario),
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Tipo_Socio_codTipo_Socio)
    REFERENCES Tipo_Socio(codTipo_Socio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Usuario_idUsuario)
    REFERENCES Usuario(idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE User_Rol (
  codUser_Rol SERIAL NOT NULL,
  Usuario_idUsuario INTEGER NOT NULL,
  Rol_codRol INTEGER NOT NULL,
  PRIMARY KEY(codUser_Rol, Usuario_idUsuario, Rol_codRol),
  FOREIGN KEY(Usuario_idUsuario)
    REFERENCES Usuario(idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Rol_codRol)
    REFERENCES Rol(codRol)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE evaluacion_semanal
(
  codevaluacion_semanal serial NOT NULL,
  calendario_codcalendario integer NOT NULL,
  calendario_grupo_empresa_codgrupo_empresa integer NOT NULL,
  calendario_grupo_empresa_usuario_idusuario integer NOT NULL,
  fecha date,
  CONSTRAINT evaluacion_semanal_pkey PRIMARY KEY (codevaluacion_semanal, calendario_codcalendario, calendario_grupo_empresa_codgrupo_empresa, calendario_grupo_empresa_usuario_idusuario),
  CONSTRAINT evaluacion_semanal_calendario_codcalendario_fkey FOREIGN KEY (calendario_codcalendario, calendario_grupo_empresa_codgrupo_empresa, calendario_grupo_empresa_usuario_idusuario)
      REFERENCES calendario (codcalendario, grupo_empresa_codgrupo_empresa, grupo_empresa_usuario_idusuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);



CREATE TABLE Tipo_Criterio (
  id_tipo serial NOT NULL,
  tipo VARCHAR(15) NULL,
  PRIMARY KEY(id_tipo)
);



CREATE TABLE Registro_Evaluacion_Final (
  idRegistro_Evaluacion_Final serial NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  PRIMARY KEY(idRegistro_Evaluacion_Final, Consultor_Usuario_idUsuario, Consultor_idConsultor),
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


CREATE TABLE Criterio (
  id_criterio serial NOT NULL,
  Tipo_Criterio_id_tipo INTEGER NOT NULL,
  Registro_Evaluacion_Final_idRegistro_Evaluacion_Final INTEGER NOT NULL,
  Registro_Evaluacion_Final_Consultor_idConsultor INTEGER NOT NULL,
  Registro_Evaluacion_Final_Consultor_Usuario_idUsuario INTEGER NOT NULL,
  porcentaje INTEGER NULL,
  PRIMARY KEY(id_criterio, Tipo_Criterio_id_tipo, Registro_Evaluacion_Final_idRegistro_Evaluacion_Final, Registro_Evaluacion_Final_Consultor_idConsultor, Registro_Evaluacion_Final_Consultor_Usuario_idUsuario),
  FOREIGN KEY(Tipo_Criterio_id_tipo)
    REFERENCES Tipo_Criterio(id_tipo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Registro_Evaluacion_Final_idRegistro_Evaluacion_Final, Registro_Evaluacion_Final_Consultor_Usuario_idUsuario, Registro_Evaluacion_Final_Consultor_idConsultor)
    REFERENCES Registro_Evaluacion_Final(idRegistro_Evaluacion_Final, Consultor_Usuario_idUsuario, Consultor_idConsultor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


CREATE TABLE Evaluacion_final (
  codEvaluacion_final INTEGER NOT NULL,
  Criterio_Registro_Evaluacion_Final_idRegistro_Evaluacion_Final INTEGER NOT NULL,
  Criterio_Tipo_Criterio_id_tipo INTEGER NOT NULL,
  Criterio_id_criterio INTEGER NOT NULL,
  Criterio_Registro_Evaluacion_Final_Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Criterio_Registro_Evaluacion_Final_Consultor_idConsultor INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  fecha DATE NOT NULL,
  nota INTEGER NOT NULL,
  PRIMARY KEY(codEvaluacion_final, Criterio_Registro_Evaluacion_Final_idRegistro_Evaluacion_Final, Criterio_Tipo_Criterio_id_tipo, Criterio_id_criterio, Criterio_Registro_Evaluacion_Final_Consultor_Usuario_idUsuario, Criterio_Registro_Evaluacion_Final_Consultor_idConsultor, Grupo_Empresa_Usuario_idUsuario, Grupo_Empresa_CodGrupo_Empresa),
  FOREIGN KEY(Criterio_id_criterio, Criterio_Tipo_Criterio_id_tipo, Criterio_Registro_Evaluacion_Final_idRegistro_Evaluacion_Final, Criterio_Registro_Evaluacion_Final_Consultor_idConsultor, Criterio_Registro_Evaluacion_Final_Consultor_Usuario_idUsuario)
    REFERENCES Criterio(id_criterio, Tipo_Criterio_id_tipo, Registro_Evaluacion_Final_idRegistro_Evaluacion_Final, Registro_Evaluacion_Final_Consultor_idConsultor, Registro_Evaluacion_Final_Consultor_Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Funcion_App (
  codFuncion_App SERIAL NOT NULL,
  App_codApp INTEGER NOT NULL,
  Funcion_codFuncion INTEGER NOT NULL,
  PRIMARY KEY(codFuncion_App, App_codApp, Funcion_codFuncion),
  FOREIGN KEY(App_codApp)
    REFERENCES App(codApp)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Funcion_codFuncion)
    REFERENCES Funcion(codFuncion)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Rol_Funcion (
  codRol_Funcion SERIAL NOT NULL,
  Rol_codRol INTEGER NOT NULL,
  Funcion_codFuncion INTEGER NOT NULL,
  PRIMARY KEY(codRol_Funcion, Rol_codRol, Funcion_codFuncion),
  FOREIGN KEY(Rol_codRol)
    REFERENCES Rol(codRol)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Funcion_codFuncion)
    REFERENCES Funcion(codFuncion)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Cons_Actividad (
  codCons_Actividad SERIAL NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  visiblePara VARCHAR(30) NULL,
  requiereRespuesta VARCHAR(15) NULL,
  fechaInicio TIMESTAMP NULL,
  fechaFin TIMESTAMP NULL,
  horaInicio TIME NULL,
  horaFin TIME NULL,
  titulo VARCHAR(30) NULL,
  descripcion TEXT NULL,
  activo BOOL NULL,
  contestada BOOL NULL,
  PRIMARY KEY(codCons_Actividad, Consultor_Usuario_idUsuario, Consultor_idConsultor),
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);
CREATE TABLE GE_Documento (
  idGE_Documento SERIAL NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  nombreDocumento VARCHAR(45) NULL,
  pathDocumentoGE VARCHAR(120) NULL,
  PRIMARY KEY(idGE_Documento, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario),
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Cons_Documento (
  idCons_Documento SERIAL NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  nombreDocumento VARCHAR(45) NULL,
  descripcionConsultorDocumento TEXT NULL,
  pathDocumentoConsultor VARCHAR(120) NULL,
  PRIMARY KEY(idCons_Documento),
  FOREIGN KEY(Consultor_idConsultor)
    REFERENCES Consultor(idConsultor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Proyecto (
  codProyecto VARCHAR(10) NOT NULL,
  nombreProyecto VARCHAR(45) NULL,
  fechaFinProyecto DATE NULL,
  vigente BOOL NULL,
  PRIMARY KEY(codProyecto)
);

CREATE TABLE detalle_ge
(
  iddetalle_ge serial NOT NULL,
  evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario integer NOT NULL,
  evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa integer NOT NULL,
  evaluacion_semanal_calendario_codcalendario integer NOT NULL,
  evaluacion_semanal_codevaluacion_semanal integer NOT NULL,
  rol character varying(120),
  esperado character varying(120),
  CONSTRAINT detalle_ge_pkey PRIMARY KEY (iddetalle_ge, evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario, evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa, evaluacion_semanal_calendario_codcalendario, evaluacion_semanal_codevaluacion_semanal),
  CONSTRAINT detalle_ge_evaluacion_semanal_codevaluacion_semanal_fkey FOREIGN KEY (evaluacion_semanal_codevaluacion_semanal, evaluacion_semanal_calendario_codcalendario, evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa, evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario)
      REFERENCES evaluacion_semanal (codevaluacion_semanal, calendario_codcalendario, calendario_grupo_empresa_codgrupo_empresa, calendario_grupo_empresa_usuario_idusuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE detalle_cons
(
  iddetalle_cons serial NOT NULL,
  consultor_idconsultor integer NOT NULL,
  detalle_ge_evaluacion_semanal_codevaluacion_semanal integer NOT NULL,
  detalle_ge_evaluacion_semanal_calendario_codcalendario integer NOT NULL,
  detalle_ge_evaluacion_semanal_calendario_grupo_empresa_codgrupo integer NOT NULL,
  detalle_ge_evaluacion_semanal_calendario_grupo_empresa_usuario_ integer NOT NULL,
  detalle_ge_iddetalle_ge integer NOT NULL,
  realizado text,
  observaciones text,
  detalle_esperado text,
  CONSTRAINT detalle_cons_pkey PRIMARY KEY (iddetalle_cons, consultor_idconsultor, detalle_ge_evaluacion_semanal_codevaluacion_semanal, detalle_ge_evaluacion_semanal_calendario_codcalendario, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_codgrupo, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_usuario_, detalle_ge_iddetalle_ge),
  CONSTRAINT detalle_cons_consultor_idconsultor_fkey FOREIGN KEY (consultor_idconsultor)
      REFERENCES consultor (idconsultor) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT detalle_cons_detalle_ge_iddetalle_ge_fkey FOREIGN KEY (detalle_ge_iddetalle_ge, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_usuario_, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_codgrupo, detalle_ge_evaluacion_semanal_calendario_codcalendario, detalle_ge_evaluacion_semanal_codevaluacion_semanal)
      REFERENCES detalle_ge (iddetalle_ge, evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario, evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa, evaluacion_semanal_calendario_codcalendario, evaluacion_semanal_codevaluacion_semanal) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE consultor_proyecto_grupo_empresa (
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Proyecto_codProyecto VARCHAR(10) NOT NULL,
  PRIMARY KEY(Consultor_Usuario_idUsuario, Consultor_idConsultor, Grupo_Empresa_Usuario_idUsuario, Grupo_Empresa_CodGrupo_Empresa, Proyecto_codProyecto),
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Proyecto_codProyecto)
    REFERENCES Proyecto(codProyecto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Hito_Pagable (
  codHito_Pagable SERIAL NOT NULL,
  Plan_Pago_codPlan_Pago INTEGER NOT NULL,
  Plan_Pago_Calendario_codCalendario INTEGER NOT NULL,
  Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  hitoevento VARCHAR(120) NULL,
  porcentajepago INTEGER NULL,
  monto REAL NULL,
  fechapago DATE NULL,
  PRIMARY KEY(codHito_Pagable, Plan_Pago_codPlan_Pago, Plan_Pago_Calendario_codCalendario, Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario),
  FOREIGN KEY(Plan_Pago_codPlan_Pago, Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario, Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Plan_Pago_Calendario_codCalendario)
    REFERENCES Plan_Pago(codPlan_Pago, Calendario_Grupo_Empresa_Usuario_idUsuario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_codCalendario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);
CREATE TABLE entregables (
  codentregables SERIAL NOT NULL,
  Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Hito_Pagable_Plan_Pago_Calendario_codCalendario INTEGER NOT NULL,
  Hito_Pagable_Plan_Pago_codPlan_Pago INTEGER NOT NULL,
  Hito_Pagable_codHito_Pagable INTEGER NOT NULL,
  entregable VARCHAR(120) NULL,
  PRIMARY KEY(codentregables, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Hito_Pagable_Plan_Pago_Calendario_codCalendario, Hito_Pagable_Plan_Pago_codPlan_Pago, Hito_Pagable_codHito_Pagable),
  FOREIGN KEY(Hito_Pagable_codHito_Pagable, Hito_Pagable_Plan_Pago_codPlan_Pago, Hito_Pagable_Plan_Pago_Calendario_codCalendario, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Hito_Pagable(codHito_Pagable, Plan_Pago_codPlan_Pago, Plan_Pago_Calendario_codCalendario, Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Pago_Consultor (
  codPago_Consultor INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Hito_Pagable_Plan_Pago_codPlan_Pago INTEGER NOT NULL,
  Hito_Pagable_codHito_Pagable INTEGER NOT NULL,
  Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Hito_Pagable_Plan_Pago_Calendario_codCalendario INTEGER NOT NULL,
  hitooevento VARCHAR(120) NULL,
  porcentajesatisfaccion INTEGER NULL,
  porcentajeAlcazado INTEGER NULL,
  estadoPago VARCHAR(45) NULL,
  PRIMARY KEY(codPago_Consultor, Consultor_idConsultor, Consultor_Usuario_idUsuario, Hito_Pagable_Plan_Pago_codPlan_Pago, Hito_Pagable_codHito_Pagable, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Hito_Pagable_Plan_Pago_Calendario_codCalendario),
  FOREIGN KEY(Hito_Pagable_codHito_Pagable, Hito_Pagable_Plan_Pago_codPlan_Pago, Hito_Pagable_Plan_Pago_Calendario_codCalendario, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Hito_Pagable_Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Hito_Pagable(codHito_Pagable, Plan_Pago_codPlan_Pago, Plan_Pago_Calendario_codCalendario, Plan_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Plan_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


INSERT INTO rol(tiporol)
    VALUES ('administrador');
INSERT INTO rol(tiporol)
    VALUES ('consultor');
INSERT INTO rol(tiporol)
    VALUES ('empresa');
INSERT INTO rol(tiporol)
    VALUES ('socio');
INSERT INTO usuario(
             login, passwd,habilitada)
    VALUES ( 'admin', 'admin',TRUE);

INSERT INTO user_rol(
            usuario_idusuario, rol_codrol)
    VALUES ('1', '1');
INSERT INTO tipo_socio(nombretipo)
               VALUES ('representante legal');
INSERT INTO tipo_socio(codtipo_socio, nombretipo)
               VALUES ('socio regular');

