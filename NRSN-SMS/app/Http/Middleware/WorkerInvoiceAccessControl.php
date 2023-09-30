<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Invoice; // Import the Invoice model or use the appropriate namespace.

class WorkerInvoiceAccessControl
{
    public function handle($request, Closure $next)
    {
        $invoiceFullPath = $request->fullUrl();

        if (Auth::user()) {
            $user = Auth::user();

            // Retrieve the invoice based on the path (you may need to adjust this logic based on your actual database structure)
            $invoice = Invoice::where('pdf_path', $invoiceFullPath)->first();

            if ($invoice) {
                // Check if the user is an admin
                if ($user->isAdmin() || $user->isManager()) {
                    // Allow access for admin users
                    return $next($request);
                }

                // Check if the invoice belongs to the authenticated user
                if ($invoice->recipient_id === $user->id) { // Update 'user_id' to match your database structure
                    // Allow access for the invoice owner
                    return $next($request);
                }
            }
        }

        // Handle unauthorized access
        return redirect()->route('dashboard')->with('alert-fail', 'Error: You do not have permission to access this file.');
    }
}
