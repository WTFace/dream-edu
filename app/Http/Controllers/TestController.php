<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;

class TestController extends Controller
{
  public function index() {
    TestEvent::dispatch('alert');
    return inertia()->render('Test');
  }
}
