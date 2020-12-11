<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Page;
use App\Repositories\PageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Kalnoy\Nestedset\NestedSet;
use Response;

class PageController extends AppBaseController
{
    /** @var  PageRepository */
    private $pageRepository;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepository = $pageRepo;
    }

    /**
     * Display a listing of the Page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pages = $this->pageRepository->allQuery()->orderBy(NestedSet::LFT)->get();

        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create()
    {
        /** @var Page $page */
        $page = $this->pageRepository->makeModel();

        $page->status = Page::STATUS_PUBLISH;

        return view('admin.pages.create')->with('page', $page);
    }

    /**
     * Store a newly created Page in storage.
     *
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();

        $page = $this->pageRepository->create($input);

        Flash::success(__('Успешно сохранено'));

        return redirect(route('admin.pages.index'));
    }

    /**
     * Display the specified Page.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        return view('admin.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        return view('admin.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param int $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePageRequest $request)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        $page = $this->pageRepository->update($request->all(), $id);

        Flash::success(__('Успешно обновлено'));

        return redirect(route('admin.pages.index'));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error(__('Не найдено'));

            return redirect(route('admin.pages.index'));
        }

        $this->pageRepository->delete($id);

        Flash::success(__('Успешно удалено'));

        return redirect(route('admin.pages.index'));
    }

    public function tree(Request $request, $id = null)
    {
        if ($request->ajax()) {
            $data = [];
            $query = $this->pageRepository->allQuery()->orderBy(NestedSet::LFT);
            if ($id != '#') {
                $query->descendantsOf($id);
            }
            $pages = $query->get();
            foreach ($pages as $page) {
                $data[] = [
                    'id' => $page->id,
                    'parent' => $page->parent_id ?: '#',
                    'text' => $page->title,
                ];
            }
            return $data;
        }

        return view('admin.pages.tree');
    }
}
