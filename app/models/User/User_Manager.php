<?php

namespace App\Models\User;

use App\Models\Model;
use App\Models\User\Admin;
use App\Models\User\Medic;
use App\Models\User\Patient;
use App\Services\proxy_bd;


class User_Manager extends Model
{
    /*public function queryAdmin() : Admin
    {

    }

    public function queryMedic() : Medic
    {

    }*/

    public function queryPatient(int $id_user) : Patient
    {
        $bd = new proxy_bd();
        $user = $bd->queryPatient($id_user);
        return $user;
    }
}