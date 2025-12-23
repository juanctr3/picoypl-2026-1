<?php
/**
 * Clase PicoYPlaca
 * Calcula las restricciones de pico y placa según ciudad y fecha
 */

class PicoYPlaca {
    private $ciudad;
    private $fecha;
    private $ciudades;
    private $festivos;
    private $tipo;
    private $restricciones;
    private $configCiudad;
    
    public function __construct($ciudad, DateTime $fecha, $ciudades, $festivos) {
        $this->ciudad = $ciudad;
        $this->fecha = $fecha;
        $this->ciudades = $ciudades;
        $this->festivos = $festivos;
        
        $this->configCiudad = $ciudades[$ciudad] ?? null;
        $this->tipo = $this->configCiudad['tipo'] ?? 'dia-semana';
        $this->restricciones = $this->configCiudad['restricciones'] ?? [];
    }
    
    /**
     * Obtiene las placas con restricción para la fecha
     */
    public function getRestricciones() {
        // Regla general: No hay pico y placa sábados, domingos o festivos
        // (A menos que la ciudad tenga lógica específica para sábados como Bucaramanga en el futuro)
        if ($this->esFinDeSemana() || $this->esFestivo()) {
            return [];
        }
        
        switch ($this->tipo) {
            case 'dia-impar-par':
                return $this->getRestriccionesPorImparPar();
            
            case 'ibague-rotativo':
                return $this->getRestriccionesIbague();
                
            case 'dia-semana':
            default:
                return $this->getRestriccionesPorDiaSemana();
        }
    }

    /**
     * Lógica Especial para Ibagué (Rotación por periodos)
     */
    private function getRestriccionesIbague() {
        $fechaActualStr = $this->fecha->format('Y-m-d');
        $periodos = $this->configCiudad['periodos'] ?? [];
        $diaSemana = $this->fecha->format('l');
        
        foreach ($periodos as $p) {
            if ($fechaActualStr >= $p['inicio'] && $fechaActualStr <= $p['fin']) {
                return $p['reglas'][$diaSemana] ?? [];
            }
        }
        
        // Fallback si la fecha no está en los rangos definidos
        return $this->configCiudad['restricciones_default'][$diaSemana] ?? [];
    }
    
    /**
     * Obtiene las placas permitidas
     */
    public function getPermitidas() {
        $restricciones = $this->getRestricciones();
        $todas = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        return array_values(array_diff($todas, $restricciones));
    }
    
    /**
     * Calcula restricciones por día impar/par
     */
    private function getRestriccionesPorImparPar() {
        $dia = (int)$this->fecha->format('d');
        $esImpar = ($dia % 2) === 1;
        
        if ($esImpar) {
            return $this->restricciones['impar'] ?? [];
        } else {
            return $this->restricciones['par'] ?? [];
        }
    }
    
    /**
     * Calcula restricciones por día de semana
     */
    private function getRestriccionesPorDiaSemana() {
        $diaSemana = $this->fecha->format('l'); // Monday, Tuesday, etc.
        return $this->restricciones[$diaSemana] ?? [];
    }
    
    /**
     * Verifica si es fin de semana
     */
    public function esFinDeSemana() {
        $dia = $this->fecha->format('w');
        return in_array($dia, [0, 6]); // 0 = Domingo, 6 = Sábado
    }
    
    /**
     * Verifica si es festivo
     */
    public function esFestivo() {
        $fechaStr = $this->fecha->format('Y-m-d');
        return in_array($fechaStr, $this->festivos);
    }
    
    /**
     * Obtiene el nombre del día en español
     */
    public function getDiaEnEspanol() {
        $dias = [
            'Monday' => 'lunes',
            'Tuesday' => 'martes',
            'Wednesday' => 'miércoles',
            'Thursday' => 'jueves',
            'Friday' => 'viernes',
            'Saturday' => 'sábado',
            'Sunday' => 'domingo'
        ];
        $diaIngles = $this->fecha->format('l');
        return $dias[$diaIngles] ?? 'desconocido';
    }
    
    /**
     * Obtiene el nombre de la ciudad
     */
    public function getNombreCiudad() {
        return $this->configCiudad['nombre'] ?? 'Desconocida';
    }
    
    /**
     * Obtiene el horario de pico y placa
     */
    public function getHorario() {
        return $this->configCiudad['horario'] ?? '6:00 a.m. - 9:00 p.m.';
    }
    
    /**
     * Obtiene el estado (activo/inactivo)
     */
    public function getEstado() {
        if ($this->esFinDeSemana()) {
            return 'sin_restriccion_fin_semana';
        }
        if ($this->esFestivo()) {
            return 'sin_restriccion_festivo';
        }
        if (count($this->getRestricciones()) > 0) {
            return 'con_restriccion';
        }
        return 'sin_restriccion';
    }
    
    /**
     * Verifica si pico y placa está activo ahora
     */
    public function estaActivo() {
        if ($this->esFinDeSemana() || $this->esFestivo()) {
            return false;
        }
        
        $ahora = new DateTime();
        $horaActual = (int)$ahora->format('H');
        $horarioInicio = $this->configCiudad['horarioInicio'] ?? 6;
        $horarioFin = $this->configCiudad['horarioFin'] ?? 21;
        
        return $horaActual >= $horarioInicio && $horaActual < $horarioFin;
    }
}
?>
