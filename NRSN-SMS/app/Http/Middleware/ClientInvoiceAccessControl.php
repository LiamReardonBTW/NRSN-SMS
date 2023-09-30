<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ClientInvoiceAccessControl
{
    public function handle($request, Closure $next)
    {
        $invoicePath = $request->route('invoice_path');

        if (Auth::user() && (Auth::user()->isAdmin() || Auth::user()->isManager())) {
            return $next($request); // Allow admins and managers unrestricted access
        } else {
            // Handle unauthorized access
            return redirect()->route('dashboard')->with('alert-fail', 'Error: You do not have permission to access this file.');
        }


    }
}
