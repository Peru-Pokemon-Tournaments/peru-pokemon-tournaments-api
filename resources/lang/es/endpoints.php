<?php

/*
|--------------------------------------------------------------------------
| Endpoints Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used by the endpoint response messages.
|
*/

return [
    'auth' => [
        'admin_login_user' => [
            'ok' => 'Has ingresado a Perú Pokémon Tournaments Admin',
            'unauthorized' => 'No se pudo autenticar',
        ],
        'login_user' => [
            'ok' => 'Has ingresado a Perú Pokémon Tournaments',
            'unauthorized' => 'No se pudo autenticar',
        ],
        'register_user' => [
            'created' => 'Registrado satisfactoriamente',
        ],
    ],
    'device'     => [
        'fetch_devices' => [
            'ok' => 'Dispositivos encontrados',
        ],
    ],
    'game' => [
        'fetch_games' => [
            'ok' => 'Juegos encontrados',
        ],
        'get_games' => [
            'ok' => 'Juegos encontrados',
        ],
    ],
    'game_generation' => [
        'fetch_game_generations' => [
            'ok' => 'Generaciones de Juegos encontradas',
        ],
    ],
    'people' => [
        'fetch_people' => [
            'ok' => 'Personas encontradas',
        ],
    ],
    'role' => [
        'get_roles' => [
            'ok' => 'Roles encontrados',
        ],
    ],
    'tournament' => [
        'competitor' => [
            'inscription' => [
                'delete_competitor_tournament_inscription' => [
                    'ok' => 'Se eliminó la inscripción',
                    'not_found' => 'No se eliminó la inscripción',
                ],
                'get_competitor_tournament_inscription' => [
                    'ok' => 'Inscripción encontrada',
                ],
            ],
            'is_competitor_enrolled_to_tournament' => [
                'ok' => 'El competidor está incrito',
                'not_found' => 'El competidor no está inscrito',
            ],
        ],
        'inscription' => [
            'create_complete_tournament_inscription' => [
                'created' => 'Inscripción creada',
            ],
            'get_tournament_competitors' => [
                'ok' => 'Competidores encontrados',
            ],
        ],
        'create_complete_tournament' => [
            'created' => 'Torneo creado',
        ],
        'get_complete_tournament' => [
            'ok' => 'Torneo encontrado',
        ],
        'get_tournaments' => [
            'ok' => 'Torneos encontrados',
        ],
    ],
    'tournament_inscription' => [
        'delete_tournament_inscription' => [
            'ok' => 'Se eliminó la inscripción',
            'not_found' => 'No se eliminó la inscripción',
        ],
        'get_tournament_inscription' => [
            'ok' => 'Inscripción encontrada',
        ],
        'update_tournament_inscription' => [
            'ok' => 'Inscripción actualizada',
        ],
        'update_tournament_inscription_status' => [
            'ok' => 'Estado de inscripción actualizado',
        ],
    ],
    'tournament_rule' => [
        'fetch_tournament_rules' => [
            'ok' => 'Reglas de Torneos encontradas',
        ],
    ],
    'user' => [
        'password' => [
            'create_password_reset' => [
                'ok' => 'Enlace de cambio de contraseña enviado a su correo electrónico',
            ],
            'reset_password' => [
                'ok' => 'Se actualizó la contraseña',
                'forbidden' => 'No se pudo actualizar la contraseña',
            ],
        ],
        'fetch_users' => [
            'ok' => 'Usuarios encontrados',
        ],
    ],
];
