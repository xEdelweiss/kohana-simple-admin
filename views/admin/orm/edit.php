<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $belongs_to_relations = $object->belongs_to(); ?>
<?php $has_one_relations = $object->has_one(); ?>
<?php $has_many_relations = $object->has_many(); ?>

<div class="row clearfix">
    <div class="col-md-12 column">

        <form method="post" class="form-horizontal" role="form">
            <?php foreach ($columns as $column): ?>
                <?= View::factory('admin/orm/form_items/'.strtok($column->data_type, ' '), array('object' => $object, 'column' => $column)); ?>
                <?php if (isset($column->relations)): ?>
                    <?= View::factory('admin/orm/form_items/edit_relations', array('object' => $object, 'column' => $column)); ?>
                <?php endif; ?>
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