<?php
declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * GuestLayout
 *
 * @package App\View\Components
 */
class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest');
    }
}
