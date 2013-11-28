<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $columns = $model->list_columns(); ?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">

            <form class="form-horizontal" role="form">
                <h3>Properties</h3>
                <?php foreach ($columns as $column): ?>
                    <?= View::factory('admin/orm/form_items/'.$column['type'], array('object' => $object, 'column' => (object)$column)); ?>
                <?php endforeach; ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Save</button>
                    </div>
                </div>
            </form>

            <form>

            </form>

        </div>
    </div>
</div>