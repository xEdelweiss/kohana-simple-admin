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
        $content->columns = $this->get_columns_list($model_name);

        $this->template->content = $content;
//        var_dump($this->get_columns_list($model_name)); die;
    }

    /**
     * Returns columns list for $model_name with relations
     * @see ORM::list_columns()
     * @param $model_name
     * @return mixed|null
     */
    private function get_columns_list($model_name)
    {
        $model = ORM::factory($model_name);
        $columns = $model->list_columns();
        $relations_set = array(
            'belongs_to' => $model->belongs_to(),
            'has_one' => $model->has_one(),
            'has_many' => $model->has_many(),
        );

        foreach ($relations_set as $relation_type => $relations)
        {
            foreach ($relations as $relation_name => $relation)
            {
                // @todo is column index always == column column_name?
                // @todo think about this
                $related_column = $relation_type == 'belongs_to' ? $relation['foreign_key'] : $model->primary_key();
                $columns[$related_column]['relations'][$relation_name] = array(
                    'type' => $relation_type,
                    'options' => $relation,
                );
            }
        }

        return json_decode(json_encode($columns));
    }
}