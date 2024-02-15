<div class="card shadow-lg">
    <div class="card-header">
        <h3 class="card-title">Création de votre compte (2/2)</h3>
    </div>
    <form action="" wire:submit.prevent="submit">
        <div class="card-body">
            <div class="d-flex flex-row align-items-center mb-10">
                <span class="fw-bold me-3">Provider de connexion:</span>
                <span>{{ Str::ucfirst($provider) }}</span>
            </div>
            <!--begin::Main wrapper-->
            <div class="fv-row" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Label-->
                    <label class="form-label fw-semibold fs-6 mb-2">
                        Nouveau Mot de passe
                    </label>
                    <!--end::Label-->

                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid"
                               type="password" placeholder="" name="password" autocomplete="off" wire:model="password"/>
                        @error("password")
                        <span class="text-danger error">{{ $message }}</span>
                        @enderror

                        <!--begin::Visibility toggle-->
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                              data-kt-password-meter-control="visibility">
                                <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        </span>
                        <!--end::Visibility toggle-->
                    </div>
                    <!--end::Input wrapper-->

                    <!--begin::Highlight meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Highlight meter-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Hint-->
                <div class="text-muted">
                    Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles.
                </div>
                <!--end::Hint-->
            </div>
            <!--end::Main wrapper-->
        </div>
        <div class="card-footer">
            <x-form.button />
        </div>
    </form>
</div>
