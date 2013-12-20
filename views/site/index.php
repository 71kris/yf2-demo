<?php use yii\helpers\Html; ?>
<?php echo Html::a('Create New Post', array('site/save'), array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<hr />
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Title</td>
        <td>Created</td>
        <td>Updated</td>
        <td>Options</td>
    </tr>
    <?php foreach ($models as $post): ?>
        <tr>
            <td>
                <?php echo Html::a($post->id, array('site/save', 'id'=>$post->id)); ?>
            </td>
            <td><?php echo Html::a(Html::encode($post->title), array('site/save', 'id'=>$post->id)); ?></td>
            <td><?php echo date('m/d/Y H:i', $post->create_time); ?></td>
            <td><?php echo date('m/d/Y H:i', $post->update_time); ?></td>
            <td>
                <?php echo Html::a('update', array('site/save', 'id'=>$post->id)); ?>
                <?php echo Html::a('delete', array('site/delete', 'id'=>$post->id)); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>