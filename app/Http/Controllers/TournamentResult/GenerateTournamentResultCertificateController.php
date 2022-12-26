<?php

namespace App\Http\Controllers\TournamentResult;

use App\Http\Controllers\BasicController;
use App\Models\TournamentResult;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GenerateTournamentResultCertificateController extends BasicController
{
    /**
     * Generates a tournament result certificate.
     *
     * @param TournamentResult $tournamentResult
     * @return Application|Factory|View
     */
    public function __invoke(TournamentResult $tournamentResult)
    {
        $pokemons = $this->parsePokemons($tournamentResult->tournamentInscription->pokemonShowdownTeam->team);

        return view(
            'certificates.tournament-result-certificate',
            compact(
                'tournamentResult',
                'pokemons'
            )
        );
    }

    private function strContains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }

    private function nameSpeciesGenderAndItem(string $firstLine): array
    {
        $results = [
            'name' => null,
            'specie' => null,
            'gender' => 'M',
            'item' => null,
        ];

        $hasFemaleGender = substr_count($firstLine, '(F)') >= 1;
        $hasMaleGender = substr_count($firstLine, '(M)') >= 1;
        $hasGender = $hasFemaleGender || $hasMaleGender;

        $parenthesisCount = 0;

        if ($hasFemaleGender || $hasMaleGender) {
            $parenthesisCount += 1;
        }

        $hasName = substr_count($firstLine, '(') >= ($parenthesisCount + 1);

        if ($hasMaleGender) {
            $results['gender'] = 'M';
        } elseif ($hasFemaleGender) {
            $results['gender'] = 'F';
        }

        if (($hasName && $hasGender) || ($hasName && !$hasGender)) {
            if (preg_match('/^([^(]*(?=\s*\())/', $firstLine, $matches)) {
                $results['name'] = trim($matches[1]);
            }

            if (preg_match('/\(([^)]*)\)/', $firstLine, $matches)) {
                $results['specie'] = trim($matches[1]);
            }

            if (preg_match('/@\s*(.*)$/', $firstLine, $matches)) {
                $results['item'] = trim($matches[1]);
            }
        }

        if (!$hasName && $hasGender) {
            $specie = trim(explode($results['gender'], $firstLine)[0]);
            $specie = trim(explode('(', $specie)[0]);

            $results['specie'] = $specie;

            if (preg_match('/@\s*(.*)$/', $firstLine, $matches)) {
                $results['item'] = trim($matches[1]);
            }
        }

        if (!$hasName && !$hasGender) {
            $results['specie'] = trim(explode('@', $firstLine)[0]);

            if (preg_match('/@\s*(.*)$/', $firstLine, $matches)) {
                $results['item'] = trim($matches[1]);
            }
        }

        return $results;
    }

    private function parseStats(string $exportLine): array
    {
        $statsLine = explode(':', $exportLine);
        $statsParts = explode('/', $statsLine[1]);

        $stats = [
            'hp' => null,
            'atk' => null,
            'def' => null,
            'spa' => null,
            'spd' => null,
            'spe' => null,
        ];

        foreach ($statsParts as $statsPart) {
            if ($this->strContains(strtolower($statsPart), 'spa')) {
                $stats['spa'] = (int) trim(explode('spa', strtolower($statsPart))[0]);
            } elseif ($this->strContains(strtolower($statsPart), 'spd')) {
                $stats['spd'] = (int) trim(explode('spd', strtolower($statsPart))[0]);
            } elseif ($this->strContains(strtolower($statsPart), 'spe')) {
                $stats['spe'] = (int) trim(explode('spe', strtolower($statsPart))[0]);
            } elseif ($this->strContains(strtolower($statsPart), 'def')) {
                $stats['def'] = (int) trim(explode('def', strtolower($statsPart))[0]);
            } elseif ($this->strContains(strtolower($statsPart), 'atk')) {
                $stats['atk'] = (int) trim(explode('atk', strtolower($statsPart))[0]);
            } elseif ($this->strContains(strtolower($statsPart), 'hp')) {
                $stats['hp'] = (int) trim(explode('hp', strtolower($statsPart))[0]);
            }
        }

        return $stats;
    }

    private function parseOther(string $exportLine, string $separator, int $at): string
    {
        $line = explode($separator, $exportLine);

        if ($at >= 0 && $at < count($line)) {
            return trim($line[$at], ' ');
        }

        return trim($line[0], ' ');
    }

    private function getSprite(string $specie): ?string
    {
        try {
            $url = 'https://pokeapi.co/api/v2/pokemon/' . Str::lower($specie);
            $url = Str::replace(' ', '-', $url);
            $response = Http::get($url);

            return $response->json('sprites.other.official-artwork.front_default');
        } catch (\Exception $exception) {
            // TODO: Add Logger here for specie
            return null;
        }
    }

    private function parsePokemon(string $pokemonExport): \stdClass
    {
        $exportLines = explode("\r\n", $pokemonExport);

        $pokemon = new \stdClass();
        $pokemon->name = null;
        $pokemon->specie = null;
        $pokemon->gender = null;
        $pokemon->item = null;
        $pokemon->ability = null;
        $pokemon->shiny = false;
        $pokemon->hiddenPower = null;
        $pokemon->nature = null;
        $pokemon->movements = [];
        $pokemon->sprite = null;

        $evs = new \stdClass();
        $evs->hp = 0;
        $evs->atk = 0;
        $evs->def = 0;
        $evs->spa = 0;
        $evs->spd = 0;
        $evs->spe = 0;

        $ivs = new \stdClass();
        $ivs->hp = 31;
        $ivs->atk = 31;
        $ivs->def = 31;
        $ivs->spa = 31;
        $ivs->spd = 31;
        $ivs->spe = 31;

        $pokemon->evs = $evs;
        $pokemon->ivs = $ivs;

        foreach ($exportLines as $index => $exportLine) {
            if ($index == 0) {
                $data = $this->nameSpeciesGenderAndItem($exportLine);
                $pokemon->name = $data['name'];
                $pokemon->specie = $data['specie'];
                $pokemon->gender = $data['gender'];
                $pokemon->item = $data['item'];
            }

            if (strpos($exportLine, 'Ability') !== false) {
                $pokemon->ability = $this->parseOther($exportLine, ':', 1);
            }

            if (strpos($exportLine, 'Shiny') !== false) {
                if (strtolower($this->parseOther($exportLine, ':', 1)) == 'yes') {
                    $pokemon->shiny = true;
                }
            }

            if (strpos($exportLine, 'Hidden Power') !== false) {
                $pokemon->hiddenPower = $this->parseOther($exportLine, ':', 1);
            }

            if (strpos($exportLine, 'Nature') !== false) {
                $pokemon->nature = $this->parseOther($exportLine, ' ', 0);
            }

            if (strpos($exportLine, '-') !== false) {
                $pokemon->movements[] = $this->parseOther($exportLine, '- ', 1);
            }

            if (strpos($exportLine, 'EVs') !== false) {
                $evs = $this->parseStats($exportLine, $evs);
                if ($evs['hp']) {
                    $pokemon->evs->hp = $evs['hp'];
                }
                if ($evs['atk']) {
                    $pokemon->evs->atk = $evs['atk'];
                }
                if ($evs['def']) {
                    $pokemon->evs->def = $evs['def'];
                }
                if ($evs['spa']) {
                    $pokemon->evs->spa = $evs['spa'];
                }
                if ($evs['spd']) {
                    $pokemon->evs->spd = $evs['spd'];
                }
                if ($evs['spe']) {
                    $pokemon->evs->spd = $evs['spe'];
                }
            }

            if (strpos($exportLine, 'IVs') !== false) {
                $ivs = $this->parseStats($exportLine, $ivs);
                if ($ivs['hp']) {
                    $pokemon->ivs->hp = $ivs['hp'];
                }
                if ($ivs['atk']) {
                    $pokemon->ivs->atk = $ivs['atk'];
                }
                if ($ivs['def']) {
                    $pokemon->ivs->def = $ivs['def'];
                }
                if ($ivs['spa']) {
                    $pokemon->ivs->spa = $ivs['spa'];
                }
                if ($ivs['spd']) {
                    $pokemon->ivs->spd = $ivs['spd'];
                }
                if ($ivs['spe']) {
                    $pokemon->ivs->spd = $ivs['spd'];
                }
            }
        }

        $pokemon->sprite = $this->getSprite($pokemon->specie);

        return $pokemon;
    }

    private function parsePokemons(string $fullExport): array
    {
        $pokemonExports = explode("\n\n", trim($fullExport));

        // Handle special breakline coding at some databases, like mysql
        if (count($pokemonExports) == 1) {
            $pokemonExports = explode("\r\n\r\n", trim($fullExport));
        }

        $pokemons = [];

        foreach ($pokemonExports as $pokemonExport) {
            $pokemons[] = $this->parsePokemon(trim($pokemonExport));
        }

        return $pokemons;
    }
}
