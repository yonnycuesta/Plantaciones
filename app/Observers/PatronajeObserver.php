<?php

namespace App\Observers;

use App\Models\Patronaje;
use Brian2694\Toastr\Facades\Toastr;

class PatronajeObserver
{
    public $id_estanteria, $id_patronaje;
    public $accion = 1;

    /**
     * Handle the Patronaje "created" event.
     *
     * @param  \App\Models\Patronaje  $patronaje
     * @return void
     */
    public function created(Patronaje $patronaje)
    {
        //
    }

    /**
     * Handle the Patronaje "updated" event.
     *
     * @param  \App\Models\Patronaje  $patronaje
     * @return void
     */
    public function updated(Patronaje $patronaje)
    {
        //
    }

    /**
     * Handle the Patronaje "deleted" event.
     *
     * @param  \App\Models\Patronaje  $patronaje
     * @return void
     */
    public function deleting()
    {
       
    }
    /**
     * Handle the Patronaje "restored" event.
     *
     * @param  \App\Models\Patronaje  $patronaje
     * @return void
     */
    public function restored(Patronaje $patronaje)
    {
        //
    }

    /**
     * Handle the Patronaje "force deleted" event.
     *
     * @param  \App\Models\Patronaje  $patronaje
     * @return void
     */
    public function forceDeleted(Patronaje $patronaje)
    {
        //
    }
}
