<div x-data="{show: true, editing: false, updatePassword: false, updateMail: false, closeAccount: false}">
    <div x-show="show">
        <div class="card shadow-lg mb-10">
            <div class="card-header">
                <h3 class="card-title">Informations d'abonnées Vortech Studio</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-row-bordered border border-2 border-gray-500 table-row-gray-800 gap-5 gy-5 gs-5 w-50 mx-auto align-middle">
                        <tbody>
                        <tr>
                            <td class="bg-primary text-light fw-bold">Pays / région d'enregistrement</td>
                            <td>{{ auth()->user()->authentications()->first()->location['country'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-primary text-light fw-bold">Région Enregistré</td>
                            <td>{{ auth()->user()->authentications()->first()->location['timezone'] }}</td>
                        </tr>
                        <tr>
                            <td class="bg-primary text-light fw-bold">Adresse Mail</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <td class="bg-primary text-light fw-bold">Provider de connexion</td>
                            <td>
                                <div class="d-flex flex-row align-items-center">
                                    <div class="symbol symbol-50px me-2">
                                        <img src="{{ auth()->user()->socials()->first()->icon_provider }}" alt="">
                                    </div>
                                    <span>{{ Str::ucfirst(auth()->user()->socials()->first()->provider) }}</span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-center">
                    <button class="btn btn-primary w-50 btn-lg" @click="editing = ! editing" x-transition:enter-start="">
                        <span @click="show = false"></span>
                        Modifier vos informations
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div x-show="editing">
        <div class="card shadow-lg">
            <div class="card-header">
                <h3 class="card-title">Modifier vos informations d'abonnées</h3>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col">
                        <button @click="updatePassword =! updatePassword" class="btn btn-primary btn-flex align-items-center">
                            <span class="bullet bullet-vertical bg-warning h-25px w-5px me-5"></span> Modifier votre mot de passe
                        </button>
                    </div>
                    <div class="col">
                        <button @click="updateMail =! updateMail" class="btn btn-primary btn-flex align-items-center">
                            <span class="bullet bullet-vertical bg-warning h-25px w-5px me-5"></span> Modifier votre email
                        </button>
                    </div>
                    <div class="col">
                        <button @click="closeAccount =! closeAccount" class="btn btn-light-danger btn-flex align-items-center">
                            <span class="bullet bullet-vertical bg-danger h-25px w-5px me-5"></span> Supprimer votre compte
                        </button>
                    </div>
                </div>
                <div x-show="updatePassword">
                    <form wire:submit="updatePassword">
                        <x-form.input
                            type="password"
                            label="Mot de passe actuel"
                            name="current_password"
                            required="true" />

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
                                           type="password" placeholder="" name="new_password" autocomplete="off" wire:model="new_password"/>
                                    @error("new_password")
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

                        <div class="d-flex flex-row justify-content-center">
                            <x-form.button />
                        </div>
                    </form>
                </div>
                <div x-show="updateMail">
                    <form wire:submit="updateMail">
                        <x-form.input
                            type="email"
                            name="email"
                            label="Adresse Mail"
                            required="true" />
                        <div class="d-flex flex-row justify-content-center">
                            <x-form.button />
                        </div>
                    </form>
                </div>
                <div x-show="closeAccount">
                    <form wire:submit="closeAccount">
                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">
                            <!--begin::Close-->
                            <button type="button" class="position-absolute top-0 end-0 m-2 btn btn-icon btn-icon-danger" data-bs-dismiss="alert">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </button>
                            <!--end::Close-->

                            <!--begin::Icon-->
                            <i class="ki-duotone ki-cross-circle fs-5tx text-danger mb-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="text-center">
                                <!--begin::Title-->
                                <h1 class="fw-bold mb-5">Attention</h1>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
                                <!--end::Separator-->

                                <!--begin::Content-->
                                <div class="mb-9 text-gray-900">
                                    La fermeture de votre compte est définitive, l'accès aux différents services seront intérrompus et l'accès au service social également.<br>
                                    Vous pourrez toujours avoir accès à vos données personnels principal comme le stipule la charte RGPD Européenne.
                                </div>
                                <!--end::Content-->

                                <!--begin::Buttons-->
                                <div class="d-flex flex-center flex-wrap">
                                    <a href="#" class="btn btn-outline btn-outline-danger btn-active-danger m-2">Annuler</a>
                                    <x-form.button
                                        class-color="danger"
                                        text-submit="Supprimer définitivement mon compte" />
                                </div>
                                <!--end::Buttons-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
