<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Repositories\DataRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DataController extends AppBaseController
{
    /**
     * @var DataRepository
     */
    private $dataRepository;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function store($key, Request $request)
    {
        $model = $this->dataRepository->getByKey($key);
        $model->data = $request->post();
        $model->save();

        return __('Сохранено успешно');
    }

    public function string($key)
    {
        $model = $this->dataRepository->getByKey($key);

        return view('admin.data.string')->with('model', $model);
    }
}
