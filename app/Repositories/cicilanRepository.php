<?php

namespace App\Repositories;
use App\Cicilan;

public class getCicilanById($id)
{
    $listCicilan = Cicilan::all()->where("user_id", "=", $id);
    return listCicilan;
}
?>