<?php

namespace App\Models\Servicio;
use App\Models\Model;
use App\Services\proxy_bd;

/**
 * Base Model
 * ---
 * The base model provides a space to set atrributes
 * that are common to all models
 */
class Servicio_Manager extends Model
{
    public function queryServicios()
    {
        $proxy_bd = new proxy_bd();
        $servicios = $proxy_bd->queryServicios();
        return $servicios;
    }
}
