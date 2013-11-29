<?php /** @var ORM $object */ ?>
<?php foreach ($column->relations as $relation_name => $relation): ?>
    <div class="form-group">
        <label class="col-sm-2 control-label sub-control-label" for="button1id"><?=$relation_name?></label>
        <div class="col-sm-10">
            <?= View::factory('admin/orm/list_model', array('objects' => array($object->{$relation_name}), 'model' => $object->{$relation_name}, 'model_name' => $relation->options->model)) ?>
        </div>
    </div>
<?php endforeach; ?>