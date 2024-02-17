<div class="container">
    <div class="rounded-3 bg-light p-5 shadow-lg">
        <div class="d-flex flex-column">
            <div class="d-flex flex-row align-items-center mb-10">
                <span class="bullet bullet-vertical w-5px h-15px bg-warning me-5"></span>
                <span class="fs-3 fw-bolder">Mot de passe à usage unique (MFA)</span>
            </div>
            <p class="mb-10">
                Réglez les paramètres de sécurité de votre compte Vortech Studio. Pour pouvoir utiliser le système de mot
                de passe à usage unique et augmenter la sécurité de votre compte, vous devez être en possession de
                l'identificateur tiers (Google Authenticator, Microsoft Authenticator ou autres).
            </p>
            <div class="rounded-4 bg-gray-300 p-5 mb-5 fw-bold fs-4">
                Status de l'authentificateur Vortech Studio
            </div>
            <div class="d-flex justify-content-center mb-5 w-50 mx-auto">
                <table class="table table-striped table-bordered gap-5 gy-5 gs-5 gx-5 fs-3">
                    <tbody>
                    <tr>
                        <td class="bg-light-info fw-bolder">Code d'identification</td>
                        <td class="text-end">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td class="bg-light-info fw-bold">Authentificateur</td>
                        <td class="text-end">{!! $user->otp_status !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @if($two_factor_enabled)
                {!! request()->user()->twoFactorQrCodeSvg() !!}
            @else
                <button class="btn btn-flex btn-outline btn-outline-primary px-6">
                    <span class="symbol symbol-40px me-3">
                        <i class="fa-solid fa-key fs-2"></i>
                    </span>
                    <span>Activer l'authentificateur Double facteur (MFA)</span>
                </button>
            @endif
        </div>
    </div>
</div>
