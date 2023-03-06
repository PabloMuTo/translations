<?php

namespace Src\Translations\Infrastructure\Controllers;

use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function __invoke()
    {
        return view('list');

    }
}
