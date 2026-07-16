<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Componente representa el layour principal de la aplicacion
 * Se encarga de cargar la vista base usada por las paginas autenticadas
 */
class GuestLayout extends Component
{
    public function render(): View {return view('layouts.guest');}
    
}