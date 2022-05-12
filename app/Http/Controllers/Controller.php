<?php

namespace App\Http\Controllers;

use App\Models\AppConst;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $model = '';

    protected $resourceName = '';

    public function setModel($model) {
        return $this->model = $model;
    }

    public function index () {
        $list = $this->model::paginate(AppConst::EXIST_PER_PAGE);
        return view($this->resourceName.'.index')->with(Str::plural($this->resourceName), $list);
    }

}
