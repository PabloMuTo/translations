<?php

namespace Src\Translations\Infrastructure\Controllers;

use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function __invoke()
    {
        return view('detail');
        // NOT IN USE

    }
}
