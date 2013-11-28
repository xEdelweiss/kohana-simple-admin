<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ORM extends Controller_Template {

    public function action_list_model()
    {
        $model_name = $this->request->param('model');
        $objects = ORM::factory($model_name)->find_all();

        $content = View::factory('admin/orm/list_model');
        $content->objects = $objects;
        $content->model = ORM::factory($model_name);
        $content->model_name = $model_name;

        $this->template->content = $content;
    }

    public function action_edit()
    {
        $model_name = $this->request->param('model');
        $object_id = $this->request->param('id');

        $object = ORM::factory($model_name, $object_id);

        // id is specified but not found
        if ($object_id && !$object->loaded())
        {
            throw HTTP_Exception::factory(404, "Object {$model_name}:{$object_id} not found");
        }

        $content = View::factory('admin/orm/edit');
        $content->object = $object;
        $content->model = ORM::factory($model_name);
        $content->model_name = $model_name;

        $this->template->content = $content;
    }

}
