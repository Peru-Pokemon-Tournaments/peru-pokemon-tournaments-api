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
        'create_device' => [
            'created' => 'Dispositivo creado',
        ],
        'fetch_devices' => [
            'ok' => 'Dispositivos encontrados',
        ],
        'update_device' => [
            'ok' => 'Dispositivo actualizado',
        ],
    ],
    'game' => [
        'create_game' => [
            'created' => 'Juego creado',
        ],
        'fetch_games' => [
            'ok' => 'Juegos encontrados',
        ],
        'get_games' => [
            'ok' => 'Juegos encontrados',
        ],
        'update_game' => [
            'ok' => 'Juego actualizado',
        ],
    ],
    'game_generation' => [
        'create_game_generation' => [
            'created' => 'Generación de Juego creada',
        ],
        'fetch_game_generations' => [
            'ok' => 'Generaciones de Juegos encontradas',
        ],
        'update_game_generation' => [
            'ok' => 'Generación de Juego actualizada',
        ],
    ],
    'people' => [
        'fetch_people' => [
            'ok' => 'Personas encontradas',
        ],
    ],
    'role' => [
        'create_role' => [
            'created' => 'Rol creado',
        ],
        'fetch_roles' => [
            'ok' => 'Roles encontrados',
        ],
        'get_roles' => [
            'ok' => 'Roles encontrados',
        ],
        'update_role' => [
            'ok' => 'Rol actualizado',
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
        'fetch_tournaments' => [
            'ok' => 'Torneos encontrados',
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
        'create_tournament_rule' => [
            'created' => 'Regla de Torneo creada',
        ],
        'fetch_tournament_rules' => [
            'ok' => 'Reglas de Torneos encontradas',
        ],
        'update_tournament_rule' => [
            'ok' => 'Regla de Torneo actualizada',
        ],
    ],
    'tournament_system' => [
        'create_tournament_system' => [
            'created' => 'Sistema de Torneo creada',
        ],
        'fetch_tournament_systems' => [
            'ok' => 'Sistemas de Torneos encontrados',
        ],
        'update_tournament_system' => [
            'ok' => 'Sistema de Torneo actualizada',
        ],
    ],
    'tournament_type' => [
        'fetch_tournament_types' => [
            'ok' => 'Tipos de Torneos encontrados',
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
