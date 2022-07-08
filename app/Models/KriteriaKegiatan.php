<?php
namespace App\Models;

use Franzose\ClosureTable\Models\Entity;

class KriteriaKegiatan extends Entity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kriteria_kegiatans';

    /**
     * ClosureTable model instance.
     *
     * @var \App\KriteriaKegiatanClosure
     */
    protected $closure = 'App\KriteriaKegiatanClosure';
}
