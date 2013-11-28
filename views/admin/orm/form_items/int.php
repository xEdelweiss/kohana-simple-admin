<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $element_name = $object->object_name().'_'.$object->pk().'_'.$column->column_name ?>

<div class="form-group">
    <label for="<?=$element_name?>" class="col-sm-2 control-label"><?= $column->column_name ?></label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="<?=$element_name?>" value="<?= $object->{$column->column_name} ?>" />
    </div>
</div>