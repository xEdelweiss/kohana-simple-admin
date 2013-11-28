<?php /** @var ORM $object */ /** @var ORM $model */ ?>
<?php $columns = $model->list_columns(); ?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">

            <table class="table">
                <thead>
                    <tr>
                        <?php foreach ($columns as $column): ?>
                            <th><?= $column['column_name'] ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($objects as $object): ?>
                        <tr>
                            <?php foreach ($columns as $column): ?>
                                <td>
                                    <?= $object->{$column['column_name']} ?>
                                </td>
                            <?php endforeach; ?>
                            <td class="btn-group">
                                <a class="btn btn-primary btn-xs" href="/admin/orm/edit/<?=$model_name?>/<?=$object->id?>">edit</a>
                                <a class="btn btn-danger btn-xs" href="#remove">remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>