<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function destroy(Email $email) {
        $email->delete();
        return redirect()->back();
    }
}
