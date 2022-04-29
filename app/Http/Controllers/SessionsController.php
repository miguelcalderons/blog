<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller {
    //

    public function create() {
        return view( 'sessions.create' );
    }

    public function destroy() {
        auth()->logout();

        return redirect( '/' )->with( 'success', 'Goodbye' );
    }

    public function store() {
        $attributes = request()->validate( [
            'email'    => 'required|email',
            'password' => 'required'
        ] );

        if ( ! auth()->attempt( $attributes ) ) {
            throw ValidationException::withMessages( [
                'email' => 'Your Provided credentials could not be verified'
            ] );
        }


        session()->regenerate();

        return redirect( '/' )->with( 'success', 'Welcome back!' );
    }
}
