CREATE TABLE foro (
  codforo SERIAL NOT NULL,
  autor VARCHAR(45) NULL,
  titulo VARCHAR(45) NULL,
  mensaje TEXT NULL,
  PRIMARY KEY(codforo)
);

CREATE TABLE Usuario (
  idUsuario SERIAL NOT NULL,
  login VARCHAR(45) NULL,
  passwd VARCHAR(45) NULL,
  PRIMARY KEY(idUsuario)
);

CREATE TABLE Funcion (
  codFuncion INTEGER NOT NULL,
  tipoFuncion VARCHAR(45) NULL,
  PRIMARY KEY(codFuncion)
);

CREATE TABLE Rol (
  codRol INTEGER NOT NULL,
  tipoRol VARCHAR(45) NULL,
  PRIMARY KEY(codRol)
);

CREATE TABLE Tipo_Socio (
  codTipo_Socio INTEGER NOT NULL,
  nombreTipo VARCHAR(45) NULL,
  PRIMARY KEY(codTipo_Socio)
);

CREATE TABLE App (
  codApp INTEGER NOT NULL,
  nombreApp VARCHAR(45) NULL,
  PRIMARY KEY(codApp)
);

CREATE TABLE Grupo_Empresa (
  CodGrupo_Empresa SERIAL NOT NULL,
  Usuario_idUsuario INTEGER NOT NULL,
  nombrelargoGE VARCHAR(45) NULL,
  nombreCortoGE VARCHAR(45) NULL,
  tothlogoGE VARCHAR(120) NULL,
  correoGE VARCHAR(45) NULL,
  direccionGE VARCHAR(45) NULL,
  PRIMARY KEY(CodGrupo_Empresa, Usuario_idUsuario),
  FOREIGN KEY(Usuario_idUsuario)
    REFERENCES Usuario(idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);



CREATE TABLE Telf_GE (
  idTelf_GE INTEGER NOT NULL,
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
  idconsultor integer NOT NULL,
  usuario_idusuario integer NOT NULL,
  nombreconsultor character varying(45),
  correoconsultor character varying(45),
  CONSTRAINT consultor_pkey PRIMARY KEY (idconsultor, usuario_idusuario),
  CONSTRAINT consultor_usuario_idusuario_fkey FOREIGN KEY (usuario_idusuario)
      REFERENCES usuario (idusuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT consultor_idconsultor_key UNIQUE (idconsultor)
);

CREATE TABLE Calendario (
  codCalendario INTEGER NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  fecha DATE NULL,
  PRIMARY KEY(codCalendario, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario),
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Socio (
  idSocio INTEGER NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Tipo_Socio_codTipo_Socio INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
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
      ON UPDATE NO ACTION
);

CREATE TABLE User_Rol (
  codUser_Rol INTEGER NOT NULL,
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


CREATE TABLE Evaluacion_final (
  codEvaluacion_final INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  criterio VARCHAR(45) NULL,
  peso INTEGER NULL,
  puntuacion INTEGER NULL,
  fecha DATE NULL,
  PRIMARY KEY(codEvaluacion_final, Consultor_idConsultor, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario, Consultor_Usuario_idUsuario),
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Funcion_App (
  codFuncion_App INTEGER NOT NULL,
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
  codRol_Funcion INTEGER NOT NULL,
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

CREATE TABLE Hito_Pago (
  codHito_Pago INTEGER NOT NULL,
  Calendario_codCalendario INTEGER NOT NULL,
  Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  montoPago REAL NULL,
  actividad VARCHAR(120) NULL,
  fecha DATE NULL,
  PRIMARY KEY(codHito_Pago, Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario),
  FOREIGN KEY(Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Calendario(codCalendario, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
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
  idGE_Documento INTEGER NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Cons_Actividad_Consultor_idConsultor INTEGER NOT NULL,
  Cons_Actividad_Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Cons_Actividad_codCons_Actividad INTEGER NOT NULL,
  nombreDocumento VARCHAR(45) NULL,
  pathDocumentoGE VARCHAR(120) NULL,
  PRIMARY KEY(idGE_Documento, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario, Cons_Actividad_Consultor_idConsultor, Cons_Actividad_Consultor_Usuario_idUsuario, Cons_Actividad_codCons_Actividad),
  FOREIGN KEY(Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Grupo_Empresa(CodGrupo_Empresa, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Cons_Actividad_codCons_Actividad, Cons_Actividad_Consultor_Usuario_idUsuario, Cons_Actividad_Consultor_idConsultor)
    REFERENCES Cons_Actividad(codCons_Actividad, Consultor_Usuario_idUsuario, Consultor_idConsultor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Cons_Documento (
  idCons_Documento SERIAL NOT NULL,
  Cons_Actividad_Consultor_idConsultor INTEGER NOT NULL,
  Cons_Actividad_Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Cons_Actividad_codCons_Actividad INTEGER NOT NULL,
  nombreDocumento VARCHAR(45) NULL,
  pathDocumentoConsultor VARCHAR(120) NULL,
  PRIMARY KEY(idCons_Documento, Cons_Actividad_Consultor_idConsultor, Cons_Actividad_Consultor_Usuario_idUsuario, Cons_Actividad_codCons_Actividad),
  FOREIGN KEY(Cons_Actividad_codCons_Actividad, Cons_Actividad_Consultor_Usuario_idUsuario, Cons_Actividad_Consultor_idConsultor)
    REFERENCES Cons_Actividad(codCons_Actividad, Consultor_Usuario_idUsuario, Consultor_idConsultor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


CREATE TABLE Proyecto (
  idProyecto VARCHAR(10) NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  nombreProyecto VARCHAR(120) NULL,
  vigente BOOL NULL,
  PRIMARY KEY(idProyecto, Consultor_idConsultor, Consultor_Usuario_idUsuario),
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
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
  realizado character varying(120),
  observaciones character varying(120),
  CONSTRAINT detalle_cons_pkey PRIMARY KEY (iddetalle_cons, consultor_idconsultor, detalle_ge_evaluacion_semanal_codevaluacion_semanal, detalle_ge_evaluacion_semanal_calendario_codcalendario, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_codgrupo, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_usuario_, detalle_ge_iddetalle_ge),
  CONSTRAINT detalle_cons_consultor_idconsultor_fkey FOREIGN KEY (consultor_idconsultor)
      REFERENCES consultor (idconsultor) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT detalle_cons_detalle_ge_iddetalle_ge_fkey FOREIGN KEY (detalle_ge_iddetalle_ge, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_usuario_, detalle_ge_evaluacion_semanal_calendario_grupo_empresa_codgrupo, detalle_ge_evaluacion_semanal_calendario_codcalendario, detalle_ge_evaluacion_semanal_codevaluacion_semanal)
      REFERENCES detalle_ge (iddetalle_ge, evaluacion_semanal_calendario_grupo_empresa_usuario_idusuario, evaluacion_semanal_calendario_grupo_empresa_codgrupo_empresa, evaluacion_semanal_calendario_codcalendario, evaluacion_semanal_codevaluacion_semanal) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE Pago_Consultor (
  codPago_Consultor INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  Hito_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Hito_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Hito_Pago_Calendario_codCalendario INTEGER NOT NULL,
  Hito_Pago_codHito_Pago INTEGER NOT NULL,
  estadoPago VARCHAR(45) NULL,
  PRIMARY KEY(codPago_Consultor, Consultor_idConsultor, Consultor_Usuario_idUsuario, Hito_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario, Hito_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Hito_Pago_Calendario_codCalendario, Hito_Pago_codHito_Pago),
  FOREIGN KEY(Hito_Pago_Calendario_codCalendario, Hito_Pago_Calendario_Grupo_Empresa_CodGrupo_Empresa, Hito_Pago_Calendario_Grupo_Empresa_Usuario_idUsuario, Hito_Pago_codHito_Pago)
    REFERENCES Hito_Pago(Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario, codHito_Pago)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


