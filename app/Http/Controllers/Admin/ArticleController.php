<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ArticleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param ArticleDataTable $articleDataTable
     * @return Response
     */
    public function index(ArticleDataTable $articleDataTable, Article $article)
    {
        return $articleDataTable->render('admin.articles.index');
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        /** @var Article $article */
        $article = $this->articleRepository->makeModel();

        $article->publish_at = date('Y-m-d H:i:s');
        $article->status = Article::STATUS_PUBLISH;

        return view('admin.articles.create')->with('article', $article);
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();

        $article = $this->articleRepository->create($input);

        Flash::success(__('Успешно сохранено'));

        return redirect(route('admin.articles.index'));
    }

    /**
     * Display the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.articles.index'));
        }

        return view('admin.articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.articles.index'));
        }

        return view('admin.articles.edit')->with('article', $article);
    }

    /**
     * Update the specified Article in storage.
     *
     * @param  int              $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.articles.index'));
        }

        $article = $this->articleRepository->update($request->all(), $id);

        Flash::success(__('Успешно обновлено'));

        return redirect(route('admin.articles.index'));
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.articles.index'));
        }

        $this->articleRepository->delete($id);

        Flash::success(__('Успешно удалено'));

        return redirect(route('admin.articles.index'));
    }
}
