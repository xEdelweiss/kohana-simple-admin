<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $element_id = $object->object_name().'_'.$object->pk().'_'.$column->column_name ?>
<?php $element_name = $column->column_name; ?>

<div class="form-group">
    <label class="col-sm-2 control-label" for="<?=$element_name?>"><?= $column->column_name ?></label>
    <div class="col-sm-10">
        <!-- select -->
        <?php if (count($column->options) > 3): ?>
            <select id="<?=$element_id?>" name="<?=$element_name?>" class="form-control">
                <?php foreach ($column->options as $k => $option): ?>
                    <option value="<?= $option ?>" <?= $object->{$column->column_name} == $option ? 'selected="selected"' : ''?>><?= $option ?></option>
                <?php endforeach; ?>
            </select>

        <!-- radios -->
        <?php else: ?>
            <?php foreach ($column->options as $k => $option): ?>
                <label class="radio-inline" for="<?=$element_id?>_<?=$k?>">
                    <input type="radio" name="<?=$element_name?>" id="<?=$element_id?>_<?=$k?>" value="<?= $option ?>" <?= $object->{$column->column_name} == $option ? 'checked="checked"' : ''?>>
                    <?= $option ?>
                </label>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>