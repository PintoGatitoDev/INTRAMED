<?php

namespace App\Models\Citas;
use App\Models\Model;

/**
 * Base Model
 * ---
 * The base model provides a space to set atrributes
 * that are common to all models
 */
class Dia extends Model
{
    protected string $fecha;
    protected array $horas;

	public function __constructor() {
	}

	public function getFecha() : string {
		return $this->fecha;
	}

	public function setFecha(string $value) {
		$this->fecha = $value;
	}

	public function getHoras() : array {
		return $this->horas;
	}

	public function setHoras(array $value) {
		$this->horas = $value;
	}

    public function limpiarhoras(array $citas) {
        foreach($citas as $cita)
        {
            if($cita->getFecha() == $this->fecha)
            {
                if(in_array($cita->getHora(), $this->horas))
                { 
                    foreach(array_keys($this->horas,$cita->getHora()) as $indice)
                    {
                        unset($this->horas[$indice]);
                    }
                }
            }
        }
    }
}