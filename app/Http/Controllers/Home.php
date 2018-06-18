<?php
namespace App\Http\Controllers;

use App\Data\Models\Edition;
use App\Data\Repositories\Articles;
use App\Data\Repositories\Articles as ArticlesRepository;

class Home extends Controller
{
    /**
     * @var ArticlesRepository
     */
    private $articlesRepository;

    public function __construct(ArticlesRepository $articlesRepository)
    {
        $this->articlesRepository = $articlesRepository;
    }

    public function index($number = 'last')
    {
        return view('home.index')->with(
            'currentEdition',
            $this->articlesRepository->findEditionByNumber($number)
        );
    }

    public function post()
    {
        return view('home.post');
    }

    public function editions($number)
    {
        return $this->index($number);
    }
}
