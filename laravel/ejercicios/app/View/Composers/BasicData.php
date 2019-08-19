<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;

class BasicData
{
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        // $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('genres', \app\Genre::orderBy('name')->get());
    }
}
