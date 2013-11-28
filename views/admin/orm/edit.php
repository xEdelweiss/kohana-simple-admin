<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $columns = $model->list_columns(); ?>
<?php $belongs_to_relations = $object->belongs_to(); ?>
<?php $has_one_relations = $object->has_one(); ?>
<?php $has_many_relations = $object->has_many(); ?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">

            <form method="post" class="form-horizontal" role="form">
                <?php foreach ($columns as $column): ?>
                    <?php // @todo check for relations ?>
                    <?= View::factory('admin/orm/form_items/'.strtok($column['data_type'], ' '), array('object' => $object, 'column' => (object)$column)); ?>
                <?php endforeach; ?>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a class="btn btn-default pull-left" href="/admin/orm/list/<?=$model_name?>">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>