<?php

namespace App\Services;

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
        $result = $this->_model->where('id', $id)->get();
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
}
