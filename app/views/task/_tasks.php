<? $show_creator = !empty($task_users) ?>
<table class="default zebra tasks" data-tag="<?= htmlReady($tag) ?>">
    <colgroup>
        <col style="width: 44%">
        <col style="width: 50%">
        <? if ($show_creator) : ?>
        <col style="width: 10%">
        <? endif ?>
        <col span="2" style="width: 2%">
        <col span="2" style="width: 2%">
        <col span="2" style="width: 2%">
    </colgroup>
    <caption><?= htmlReady($tag) ?></caption>
    <thead>
        <tr>
            <th><?= _('Aufgabe') ?></th>
            <th><?= _('Schlagworte') ?></th>
            <? if (!empty($show_creator)) : ?>
            <th><?= _('Erstellt von') ?></th>
            <? endif ?>
            <th colspan="2"><?= _('Bearbeitet') ?></th>
            <th colspan="2"><?= _('Feedback') ?></th>
            <th colspan="2"><?= _('Aktionen') ?></th>
        </tr>
    </thead>
    <tbody>

        <? if ($show_creator) :
            foreach ($tasks as $task_user) :
                $tags = $task_user->task->tags->orderBy('tag')->pluck('tag');
                $task = $task_user->task;
                ?>
                <?= $this->render_partial('task/_task', compact('task', 'tags', 'task_user', 'show_creator')); ?>
            <? endforeach ?>
        <? else : ?>
            <? foreach ($tasks as $task) :
                $tags = $task->tags->orderBy('tag')->pluck('tag');
                $task_user = $task->task_users->findOneBy('user_id', $user->id);
                ?>

                <?= $this->render_partial('task/_task', compact('task', 'tags', 'task_user')); ?>
            <? endforeach ?>
        <? endif ?>
    </tbody>
</table>