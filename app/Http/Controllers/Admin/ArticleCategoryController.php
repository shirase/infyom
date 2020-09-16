<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateArticleCategoryRequest;
use App\Http\Requests\Admin\UpdateArticleCategoryRequest;
use App\Repositories\ArticleCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ArticleCategoryController extends AppBaseController
{
    /** @var  ArticleCategoryRepository */
    private $articleCategoryRepository;

    public function __construct(ArticleCategoryRepository $articleCategoryRepo)
    {
        $this->articleCategoryRepository = $articleCategoryRepo;
    }

    /**
     * Display a listing of the ArticleCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articleCategories = $this->articleCategoryRepository->paginate(2);

        return view('admin.article_categories.index')
            ->with('articleCategories', $articleCategories);
    }

    /**
     * Show the form for creating a new ArticleCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.article_categories.create');
    }

    /**
     * Store a newly created ArticleCategory in storage.
     *
     * @param CreateArticleCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleCategoryRequest $request)
    {
        $input = $request->all();

        $articleCategory = $this->articleCategoryRepository->create($input);

        Flash::success('Article Category saved successfully.');

        return redirect(route('admin.article-categories.index'));
    }

    /**
     * Display the specified ArticleCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articleCategory = $this->articleCategoryRepository->find($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('admin.articleCategories.index'));
        }

        return view('admin.article_categories.show')->with('articleCategory', $articleCategory);
    }

    /**
     * Show the form for editing the specified ArticleCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articleCategory = $this->articleCategoryRepository->find($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('admin.article-categories.index'));
        }

        return view('admin.article_categories.edit')->with('articleCategory', $articleCategory);
    }

    /**
     * Update the specified ArticleCategory in storage.
     *
     * @param int $id
     * @param UpdateArticleCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleCategoryRequest $request)
    {
        $articleCategory = $this->articleCategoryRepository->find($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('admin.article-categories.index'));
        }

        $articleCategory = $this->articleCategoryRepository->update($request->all(), $id);

        Flash::success('Article Category updated successfully.');

        return redirect(route('admin.article-categories.index'));
    }

    /**
     * Remove the specified ArticleCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articleCategory = $this->articleCategoryRepository->find($id);

        if (empty($articleCategory)) {
            Flash::error('Article Category not found');

            return redirect(route('admin.article-categories.index'));
        }

        $this->articleCategoryRepository->delete($id);

        Flash::success('Article Category deleted successfully.');

        return redirect(route('admin.article-categories.index'));
    }
}
