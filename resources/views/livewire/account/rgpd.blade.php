<div class="container  ">
    <div class="card shadow-lg mb-10">
        <div class="card-header">
            <h3 class="card-title">Accès à mes informations</h3>
        </div>
        <div class="card-body">
            <p>
                Vous avez la possibilité d'accéder à vos informations personnelles mémorisées dans notre base de donnée.<br/>
                Vous avez juste à cliquer sur le bouton ci-dessous pour télécharger un document PDF comportant la totalité de vos données.
            </p>
            <a href="{{ route('account.rgpd.export') }}" class="btn btn-info w-100">
                Récupérer mes informations
            </a>
        </div>
    </div>
    <div class="card shadow-lg mb-10">
        <div class="card-header">
            <h3 class="card-title">Rectification des erreurs</h3>
        </div>
        <div class="card-body">
            <p>Vous pouvez modifier toutes les informations personnelles accessibles depuis votre espace personnelles.</p>
            <p>Pour d'autre rectifications, veuillez nous contacter à : contact@vortechstudio.fr.<br>Nous vous répondrons dès que possible !</p>
        </div>
    </div>
</div>
