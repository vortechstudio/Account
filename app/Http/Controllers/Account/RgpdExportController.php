<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class RgpdExportController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $user->load('profil', 'socials', 'services');
        $pdf = Pdf::loadView('auth.rgpd', compact('user'));
        return $pdf->download('rgpd.pdf');
    }
}
