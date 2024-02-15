<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<h2>Vortech Studio</h2>
<p>{{ $user->name }}</p>
<p>{{ \Carbon\Carbon::now() }}</p>
<h3>Informations générales</h3>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Identité</th>
        <th scope="col">TAG</th>
        <th scope="col">E-mail</th>
        <th scope="col">Création du compte</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->token_tag }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at->calendar() }}</td>
    </tr>
    </tbody>
</table>
<h3>Services</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Service</th>
            <th scope="col">Souscrit le</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->services as $service)
            <tr>
                <td>{{ $service->service->name }}</td>
                <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($service->created_at))->format("d/m/Y à H:i") }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
