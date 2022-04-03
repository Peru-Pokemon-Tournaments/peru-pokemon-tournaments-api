<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Incripción realizada</title>
</head>
<body>
    <ul>
        <li>
            <b>Inscripción: </b>
            <br />
            <b>ID:</b>
            <span>{{ $tournamentInscription->id }}</span>
            <br />
            <b>Estado:</b>
            <span>{{ $tournamentInscription->status }}</span>
        </li>
        <li>
            <b>Competidor: </b>
            <br />
            <b>ID:</b>
            <span>{{ $tournamentInscription->competitor->id }}</span>
            <br />
            <b>Nombre: </b>
            <span>{{ $tournamentInscription->competitor->fullName }}</span>
        </li>
        <li>
            <b>Torneo: </b>
            <br />
            <b>ID:</b>
            <span>{{ $tournamentInscription->tournament->id }}</span>
            <br />
            <b>Título:</b>
            <span>{{ $tournamentInscription->tournament->title }}</span>
        </li>
        <li>
            <b>Equipo: </b>
            <br />
            <span style="white-space: pre-line;">{{ $tournamentInscription->pokemonShowdownTeam->team }}</span>
        </li>
    </ul>
</body>
</html>
