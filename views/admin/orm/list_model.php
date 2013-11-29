<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $columns = $model->list_columns(); ?>

<div class="row clearfix">
    <div class="col-md-12 column">

        <table class="table">
            <thead>
                <tr>
                    <?php foreach ($columns as $column): ?>
                        <th><?= $column['column_name'] ?></th>
                    <?php endforeach; ?>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objects as $object): ?>
                    <tr>
                        <?php if (!$object->loaded()): ?>
                            <td colspan="<?=count($columns)?>"><i><?=$model_name?>:<?=$object->pk() ?: 'NULL'?> not found</i></td>
                        <?php else: ?>
                            <?php foreach ($columns as $column): ?>
                                <td>
                                    <?= $object->{$column['column_name']} ?>
                                </td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <td class="btn-group" style="display: table-cell; width: 100px;">
                            <a class="btn btn-primary btn-xs" href="/admin/orm/edit/<?=$model_name?>/<?=$object->id?>">edit</a>
                            <a class="btn btn-danger btn-xs" href="#remove">remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>