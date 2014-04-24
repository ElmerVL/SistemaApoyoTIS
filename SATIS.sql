CREATE TABLE foro (
  codforo SERIAL NOT NULL,
  autor VARCHAR(45) NULL,
  titulo VARCHAR(45) NULL,
  mensaje TEXT NULL,
  PRIMARY KEY(codforo)
);

CREATE TABLE Usuario (
  idUsuario INTEGER NOT NULL,
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
  CodGrupo_Empresa INTEGER NOT NULL,
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

CREATE TABLE GE_Documento (
  idGE_Documento INTEGER NOT NULL,
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

CREATE TABLE Consultor (
  idConsultor INTEGER NOT NULL,
  Usuario_idUsuario INTEGER NOT NULL,
  nombreConsultor VARCHAR(45) NULL,
  correoConsultor VARCHAR(45) NULL,
  PRIMARY KEY(idConsultor, Usuario_idUsuario),
  FOREIGN KEY(Usuario_idUsuario)
    REFERENCES Usuario(idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Calendario (
  codCalendario INTEGER NOT NULL,
  Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  acrtividad VARCHAR(120) NULL,
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

CREATE TABLE Evaluacion_Semanal (
  codEvaluacion_Semanal INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  Calendario_codCalendario INTEGER NOT NULL,
  Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  fecha DATE NULL,
  PRIMARY KEY(codEvaluacion_Semanal, Consultor_idConsultor, Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario, Consultor_Usuario_idUsuario),
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Calendario(codCalendario, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
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

CREATE TABLE Actividad (
  idActividad SERIAL NOT NULL,
  Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Calendario_codCalendario INTEGER NOT NULL,
  fechaInicio TIMESTAMP NULL,
  fechaFin TIMESTAMP NULL,
  titulo VARCHAR(45) NULL,
  descripcion TEXT NULL,
  PRIMARY KEY(idActividad, Calendario_Grupo_Empresa_Usuario_idUsuario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_codCalendario),
  FOREIGN KEY(Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario)
    REFERENCES Calendario(codCalendario, Grupo_Empresa_CodGrupo_Empresa, Grupo_Empresa_Usuario_idUsuario)
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

CREATE TABLE Cons_Documento (
  idCons_Documento INTEGER NOT NULL,
  Consultor_idConsultor INTEGER NOT NULL,
  Consultor_Usuario_idUsuario INTEGER NOT NULL,
  nombreDocumento VARCHAR(45) NULL,
  pathDocumentoConsultor VARCHAR(120) NULL,
  PRIMARY KEY(idCons_Documento, Consultor_idConsultor, Consultor_Usuario_idUsuario),
  FOREIGN KEY(Consultor_idConsultor, Consultor_Usuario_idUsuario)
    REFERENCES Consultor(idConsultor, Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Detalle_GE (
  idDetalle_GE INTEGER NOT NULL,
  Evaluacion_final_Semanal_Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Evaluacion_final_Semanal_Calendario_codCalendario INTEGER NOT NULL,
  Evaluacion_final_Semanal_Consultor_idConsultor INTEGER NOT NULL,
  Evaluacion_final_Semanal_codEvaluacion_Semanal INTEGER NOT NULL,
  Evaluacion_Semanal_Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Evaluacion_Semanal_Consultor_Usuario_idUsuario INTEGER NOT NULL,
  comentarioGE VARCHAR(120) NULL,
  PRIMARY KEY(idDetalle_GE, Evaluacion_final_Semanal_Calendario_Grupo_Empresa_CodGrupo_Empresa, Evaluacion_final_Semanal_Calendario_codCalendario, Evaluacion_final_Semanal_Consultor_idConsultor, Evaluacion_final_Semanal_codEvaluacion_Semanal, Evaluacion_Semanal_Calendario_Grupo_Empresa_Usuario_idUsuario, Evaluacion_Semanal_Consultor_Usuario_idUsuario),
  FOREIGN KEY(Evaluacion_final_Semanal_codEvaluacion_Semanal, Evaluacion_final_Semanal_Consultor_idConsultor, Evaluacion_final_Semanal_Calendario_codCalendario, Evaluacion_final_Semanal_Calendario_Grupo_Empresa_CodGrupo_Empresa, Evaluacion_Semanal_Calendario_Grupo_Empresa_Usuario_idUsuario, Evaluacion_Semanal_Consultor_Usuario_idUsuario)
    REFERENCES Evaluacion_Semanal(codEvaluacion_Semanal, Consultor_idConsultor, Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario, Consultor_Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Detalle_Cons (
  idDetalle_Cons INTEGER NOT NULL,
  Evaluacion_final_Semanal_Calendario_Grupo_Empresa_CodGrupo_Empresa INTEGER NOT NULL,
  Evaluacion_final_Semanal_Calendario_codCalendario INTEGER NOT NULL,
  Evaluacion_final_Semanal_Consultor_idConsultor INTEGER NOT NULL,
  Evaluacion_final_Semanal_codEvaluacion_Semanal INTEGER NOT NULL,
  Evaluacion_Semanal_Calendario_Grupo_Empresa_Usuario_idUsuario INTEGER NOT NULL,
  Evaluacion_Semanal_Consultor_Usuario_idUsuario INTEGER NOT NULL,
  evaluacionConsultor VARCHAR(120) NULL,
  PRIMARY KEY(idDetalle_Cons, Evaluacion_final_Semanal_Calendario_Grupo_Empresa_CodGrupo_Empresa, Evaluacion_final_Semanal_Calendario_codCalendario, Evaluacion_final_Semanal_Consultor_idConsultor, Evaluacion_final_Semanal_codEvaluacion_Semanal, Evaluacion_Semanal_Calendario_Grupo_Empresa_Usuario_idUsuario, Evaluacion_Semanal_Consultor_Usuario_idUsuario),
  FOREIGN KEY(Evaluacion_final_Semanal_codEvaluacion_Semanal, Evaluacion_final_Semanal_Consultor_idConsultor, Evaluacion_final_Semanal_Calendario_codCalendario, Evaluacion_final_Semanal_Calendario_Grupo_Empresa_CodGrupo_Empresa, Evaluacion_Semanal_Calendario_Grupo_Empresa_Usuario_idUsuario, Evaluacion_Semanal_Consultor_Usuario_idUsuario)
    REFERENCES Evaluacion_Semanal(codEvaluacion_Semanal, Consultor_idConsultor, Calendario_codCalendario, Calendario_Grupo_Empresa_CodGrupo_Empresa, Calendario_Grupo_Empresa_Usuario_idUsuario, Consultor_Usuario_idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
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


