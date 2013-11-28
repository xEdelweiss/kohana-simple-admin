<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $element_id = $object->object_name().'_'.$object->pk().'_'.$column->column_name ?>
<?php $element_name = $column->column_name; ?>

<div class="form-group">
    <label for="<?=$element_id?>" class="col-sm-2 control-label"><?= $column->column_name ?></label>
    <div class="col-sm-10">
        <input type="datetime" class="form-control" id="<?=$element_id?>" name="<?=$element_name?>" value="<?= $object->{$column->column_name} ?>" data-date-format="yyyy-mm-dd hh:ii:ss" />
    </div>
</div>