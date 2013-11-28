<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $element_id = $object->object_name().'_'.$object->pk().'_'.$column->column_name ?>
<?php $element_name = $column->column_name; ?>
<?php // @todo add combobox if options count > 3 ?>

<div class="form-group">
    <label class="col-md-4 control-label" for="<?=$element_name?>"><?= $column->column_name ?></label>
    <div class="col-md-4">
        <?php foreach ($column->options as $k => $option): ?>
            <label class="radio-inline" for="<?=$element_id?>_<?=$k?>">
                <input type="radio" name="<?=$element_name?>" id="<?=$element_id?>_<?=$k?>" value="<?= $option ?>" <?= $object->{$column->column_name} == $option ? 'checked="checked"' : ''?>>
                <?= $option ?>
            </label>
        <?php endforeach; ?>
    </div>
</div>
