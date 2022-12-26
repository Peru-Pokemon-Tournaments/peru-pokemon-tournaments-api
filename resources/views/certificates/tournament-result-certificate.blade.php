<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Diploma</title>
</head>
<body>
<main>
    <section>
        <header>
            <figure class="logo-figure">
                <img
                    class="logo-image"
                    src="{{ asset('assets/img/peru-pokemon-tournaments-logo.png') }}"
                    alt="Logo"
                />
            </figure>
            <span>Otorga este certificado a:</span>
            <h1>{{ $tournamentResult->tournamentInscription->competitor->full_name }}</h1>
            @if ($tournamentResult->place == 1)
                <h2>Campeón del torneo</h2>
            @elseif ($tournamentResult->place == 2)
                <h2>SubCampeón del torneo</h2>
            @elseif ($tournamentResult->place == 3)
                <h2>Tercer Puesto del torneo</h2>
            @elseif ($tournamentResult->place == 4)
                <h2>Cuarto Puesto del torneo</h2>
            @elseif ($tournamentResult->place == 5)
                <h2>Quinto Puesto del torneo</h2>
            @else
                <h2>Participante del torneo</h2>
            @endif
            <h3>{{ $tournamentResult->tournamentInscription->tournament->title }}</h3>
        </header>
        <ul id="pokemons">
            @foreach($pokemons as $pokemon)
            <li>
                <figure>
                    @if ($pokemon->sprite)
                        <img
                            src="{{ $pokemon->sprite }}"
                            alt="{{ $pokemon->specie }}"
                        />
                    @else
                        <img
                            src="{{ asset('assets/img/missing-no.webp') }}"
                            alt="{{ $pokemon->specie }}"
                        />
                    @endif
                    <figcaption>
                        @if ($pokemon->name)
                            <span>{{ $pokemon->name }}</span>
                            <span>({{ $pokemon->specie }})</span>
                        @else
                            <span>{{ $pokemon->specie }}</span>
                        @endif
                    </figcaption>
                </figure>
            </li>
            @endforeach
        </ul>
        <footer>
            @php
                \Carbon\Carbon::setLocale('es');
            @endphp
                <span id="date">{{ $tournamentResult->tournamentInscription->tournament->place }},
                    {{ $tournamentResult->tournamentInscription->tournament->formatted_locale_spanish_end_date }}
                </span>
            <small>
                &#169; 2022 Pokémon. &#169; 1995-2022 Nintendo/Creatures Inc./GAME
                FREAK inc. Los personajes de Pokémon son marcas registradas de
                Nintendo.
            </small>
        </footer>
    </section>
</main>
<style>
    html,
    body {
        margin: 0;
    }

    main {
        width: 1280px;
        height: 720px;
        /* border: 20px solid rgb(167, 53, 53); */
        background-image: url({{ asset('assets/img/tournament-result-certificate-background.png') }});
        background-repeat: no-repeat;
        background-size: cover;
    }

    header {
        width: 100%;
    }

    .logo-figure {
        width: 120px;
        height: 120px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
        padding-top: 60px;
    }

    img {
        width: inherit;
        height: inherit;
    }

    #date {
        display: block;
        text-align: center;
        font-size: 20px;
    }

    h1 {
        font-size: 35px;
        text-align: center;
    }

    h2 {
        font-size: 25px;
        text-align: center;
    }

    h3 {
        font-size: 23px;
        text-align: center;
    }

    #pokemons {
        list-style: none;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin: 10px 0;
    }

    #pokemons figure {
        width: 100px;
        height: 100px;
        text-align: center;
    }

    figcaption {
        text-align: center;
    }

    figcaption > span {
        font-size: 15px;
    }

    footer {
        margin-top: 40px;
        text-align: center;
    }

    footer span {
        margin-bottom: 20px;
    }

    footer small {
        font-size: 12px;
    }
</style>
</body>
</html>

