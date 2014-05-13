<?php
    class Plantilla
    {
        protected $contenido;
        protected $claves;
        
        public function __construct($rutaContenido)
        {
            $handle = fopen($rutaContenido,"r");
            $this->contenido = fread($handle,filesize($rutaContenido));
            fclose($handle);
            $this->claves = array();
        }
        
        public function agregarContenido($clave,$valor)
        {
            $this->claves[$clave] = $valor;
        }
        
        public function agregarContenidoHtml($clave,$ruta)
	{
            $handler = fopen($ruta,"r");
            $this->claves[$clave] = fread($handler,filesize($ruta));
	}
        
        public function generar()
	{
            foreach($this->claves as $key=>$value)
            {
                $act = "$(".$key.")";
                $this->contenido = str_replace($act,$value,$this->contenido);
            }
            return $this->contenido;
	}

	public function mostrar()
	{
            echo $this->generar(); 
	}
    }
?>
