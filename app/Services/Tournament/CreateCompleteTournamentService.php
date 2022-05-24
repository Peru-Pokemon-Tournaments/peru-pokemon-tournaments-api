<?php

namespace App\Services\Tournament;

use App\Contracts\Repositories\ExternalBracketRepository;
use App\Contracts\Repositories\FileRepository;
use App\Contracts\Repositories\ImageRepository;
use App\Contracts\Repositories\TournamentPriceRepository;
use App\Contracts\Repositories\TournamentPrizeRepository;
use App\Contracts\Repositories\TournamentRepository;
use App\Models\ExternalBracket;
use App\Models\Image;
use App\Models\Tournament;
use App\Models\TournamentPrice;
use App\Models\TournamentPrize;
use Illuminate\Support\Arr;

class CreateCompleteTournamentService
{
    /**
     * The tournament repository.
     *
     * @var TournamentRepository
     */
    private TournamentRepository $tournamentRepository;

    /**
     * The external bracket repository.
     *
     * @var ExternalBracketRepository
     */
    private ExternalBracketRepository $externalBracketRepository;

    /**
     * The tournament price repository.
     *
     * @var TournamentPriceRepository
     */
    private TournamentPriceRepository $tournamentPriceRepository;

    /**
     * The tournament prize repository.
     *
     * @var TournamentPrizeRepository
     */
    private TournamentPrizeRepository $tournamentPrizeRepository;

    /**
     * The tournament image repository.
     *
     * @var ImageRepository
     */
    private ImageRepository $imageRepository;

    /**
     * The file repository.
     *
     * @var FileRepository
     */
    private FileRepository $fileRepository;

    /**
     * Create new CreateCompleteTournamentService.
     *
     * @param   TournamentRepository $tournamentRepository
     * @param   ExternalBracketRepository $externalBracketRepository
     * @param   TournamentPriceRepository $tournamentPriceRepository
     * @param   TournamentPrizeRepository $tournamentPrizeRepository
     * @param   ImageRepository $imageRepository
     * @param   FileRepository  $fileRepository
     * @return  void
     */
    public function __construct(
        TournamentRepository $tournamentRepository,
        ExternalBracketRepository $externalBracketRepository,
        TournamentPriceRepository $tournamentPriceRepository,
        TournamentPrizeRepository $tournamentPrizeRepository,
        ImageRepository $imageRepository,
        FileRepository $fileRepository
    ) {
        $this->tournamentRepository = $tournamentRepository;
        $this->externalBracketRepository = $externalBracketRepository;
        $this->tournamentPriceRepository = $tournamentPriceRepository;
        $this->tournamentPrizeRepository = $tournamentPrizeRepository;
        $this->imageRepository = $imageRepository;
        $this->fileRepository = $fileRepository;
    }

    /**
     * Creates a new tournament.
     *
     * @param   array $data
     * @return  Tournament
     */
    public function __invoke(array $data): Tournament
    {
        $image = $this->makeImage($data);

        $tournament = $this->makeTournament($data, $image);

        $this->makeAndAttachTournamentPrice($data, $tournament);

        $this->makeAndAttachTournamentPrizes($data, $tournament);

        $this->makeAndAttachExternalBracket($data, $tournament);

        $tournament->games()->attach(Arr::pluck(Arr::get($data, 'games'), 'id'));
        $tournament->devices()->attach(Arr::pluck(Arr::get($data, 'devices'), 'id'));
        $tournament->tournamentSystems()->attach(Arr::pluck(Arr::get($data, 'tournament_systems'), 'id'));
        $tournament->tournamentRules()->attach(Arr::pluck(Arr::get($data, 'tournament_rules'), 'id'));

        return $tournament;
    }

    /**
     * Make the base of the tournament.
     *
     * @param   array $data
     * @param   ?Image $image
     * @return  Tournament
     */
    private function makeTournament(array $data, ?Image $image): Tournament
    {
        $tournament = new Tournament();

        $tournament->title = $data['title'];
        $tournament->description = $data['description'];
        $tournament->place = $data['place'];
        $tournament->start_date = $data['start_date'];
        $tournament->end_date = $data['end_date'];
        $tournament->created_by_person_id = Arr::get($data, 'created_by_person.id');
        $tournament->tournament_type_id = Arr::get($data, 'tournament_type.id');
        $tournament->tournament_format_id = Arr::get($data, 'tournament_format.id');

        if (!is_null($image)) {
            $tournament->image_id = $image->id;
        }

        $this->tournamentRepository->save($tournament);

        return $tournament;
    }

    /**
     * Make tournament price and attach to tournament.
     *
     * @param   array $data
     * @param   Tournament $tournament
     * @return  void
     */
    private function makeAndAttachTournamentPrice(array $data, Tournament $tournament): void
    {
        $tournamentPrice = new TournamentPrice();

        $tournamentPrice->symbol = Arr::get($data, 'tournament_price.symbol');
        $tournamentPrice->amount = Arr::get($data, 'tournament_price.amount');
        $tournamentPrice->tournament_id = $tournament->id;

        $this->tournamentPriceRepository->save($tournamentPrice);
    }

    /**
     * Make tournament prizes and attach to tournament.
     *
     * @param   array $data
     * @param   Tournament $tournament
     * @return  void
     */
    private function makeAndAttachTournamentPrizes(array $data, Tournament $tournament): void
    {
        foreach ($data['tournament_prizes'] as $prizeData) {
            $tournamentPrize = new TournamentPrize();

            $tournamentPrize->title = $prizeData['title'];
            $tournamentPrize->description = $prizeData['description'];
            $tournamentPrize->tournament_id = $tournament->id;

            $this->tournamentPrizeRepository->save($tournamentPrize);
        }
    }

    /**
     * Make external bracket if exists and attach to tournament.
     *
     * @param   array $data
     * @param   Tournament $tournament
     * @return  void
     */
    private function makeAndAttachExternalBracket(array $data, Tournament $tournament): void
    {
        if (
            !Arr::has($data, 'external_bracket') ||
            (Arr::has($data, 'external_bracket') &&
            is_null(Arr::get($data, 'external_bracket')))) {
            return;
        }

        $externalBracket = new ExternalBracket();

        $externalBracket->reference = Arr::get($data, 'external_bracket.reference');
        $externalBracket->url = Arr::get($data, 'external_bracket.url');
        $externalBracket->tournament_id = $tournament->id;

        $this->externalBracketRepository->save($externalBracket);

        $tournament->externalBracket()->associate($externalBracket);
    }

    /**
     * Make an image and file if exists.
     *
     * @param   array $data
     * @return  Image|null
     */
    private function makeImage(array $data): ?Image
    {
        if (!Arr::has($data, 'tournament_image_file') ||
            (Arr::has($data, 'tournament_image_file') &&
            is_null(Arr::get($data, 'tournament_image_file')))) {
            return null;
        }

        $imageFile = $data['tournament_image_file'];

        $image = new Image();

        $image->name = $imageFile->getClientOriginalName();
        $image->url = '_';

        $this->imageRepository->save($image);

        $fileId = $this->fileRepository->save($imageFile, $image->id);

        $image->url = $this->fileRepository->findUrl($fileId);

        $this->imageRepository->save($image);

        return $image;
    }
}
