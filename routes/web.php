<?php

use Illuminate\Support\Facades\Route;
use Lightit\Shared\App\Exceptions\InvalidActionException;

Route::get('invalid', static fn() => throw new InvalidActionException("Is not valid"));
