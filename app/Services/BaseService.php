<?php

namespace App\Services;
use App\Enums\AtributeType;

class BaseService
{

    protected $_model;

    public function __construct()
    {
        $this->setModel();
    }


    public function getModel()
    {
    }


    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }


    public function show()
    {
        return $this->_model->get();
    }


    public function find($id)
    {
        $result = $this->_model->where('id', $id)->first();
        return $result;
    }


    public function store(array $attributes)
    {
        return $this->_model->create($attributes);
    }


    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $this->_model->where('id', $id)->update($attributes);
            return $result;
        }
        return false;
    }


    public function destroy($id)
    {
        $result = $this->_model->where('id', $id)->get();
        if ($result) {
            $this->_model->where('id', $id)->delete();
            return true;
        }
        return false;
    }


    // HAND MAKE

    public function sidebar()
    {
        return  View::share('data', Category::get());
    }

    public function shareHeadFoot()
    {
        $cat = Category::get();
        $typ = Type::get();

        return  View::share([
            'cat' => $cat,
            'typ' => $typ,
        ]);
    }


    public function changeStatus($id)
    {
        $st = $this->_model->findOrFail($id);
        if ($st->status == "0" || $st->status == "2") {
            $st->status = "1";
        } else {
            $st->status = "2";
        }
        $st->save();
        flash("Status Change Success")->success();
    }

    public function getData($request, $is_paginate = 0)
    {
        $objects = $this->_model::orderBy('id', 'desc');
        if ($request->search) {
            $search = $request->search;
            $objects = $objects->where(function ($alb) use ($search) {
                $alb->Where($this->_model::raw("CONCAT('#',id)"), 'like', "%$search%")
                    ->orwhere('name', 'like', "%$search%");
            });
        }
        if ($request->status) {
            if ($request->status !=  AtributeType::ACTIVE) {
                $objects = $objects->where('status',AtributeType::DEACTIVE);
            } else {
                $objects = $objects->where('status', AtributeType::ACTIVE);
            }
        }
      
        if ($request->joined_date) {
            $objects = $objects->whereDate('created_at', $request->joined_date);
        }
        if ($is_paginate) {
            $objects = $objects->paginate($is_paginate);
        } else {
            $objects = $objects->get();
        }
        return $objects;
    }

    public function requestImg($requestImg){
        $image = NULL;
        if(!empty($requestImg)){
            $url = api_asset($requestImg);
            if(!empty($url)){
                $image = $url;
            }
        }
        return $image;
    }
}
