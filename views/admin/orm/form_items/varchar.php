<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $element_id = $object->object_name().'_'.$object->pk().'_'.$column->column_name ?>
<?php $element_name = $column->column_name; ?>

<div class="form-group">
    <label for="<?=$element_id?>" class="col-sm-2 control-label"><?= $column->column_name ?></label>
    <div class="col-sm-10">
        <?php if ($column->character_maximum_length > 50): ?>
            <textarea class="form-control" rows="4" id="<?=$element_id?>" name="<?=$element_name?>" maxlength="<?=$column->character_maximum_length?>"><?= $object->{$column->column_name} ?></textarea>
        <?php else: ?>
            <input type="text" class="form-control" id="<?=$element_id?>" name="<?=$element_name?>" value="<?= $object->{$column->column_name} ?>" maxlength="<?=$column->character_maximum_length?>" />
        <?php endif; ?>
    </div>
</div>