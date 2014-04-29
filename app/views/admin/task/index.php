<?php

$infobox_content[] = array(
    'kategorie' => _('Aktionen'),
    'eintrag'   => array(
        array(
            'icon' => 'icons/16/black/info.png',
            'text' => sprintf(_('%sNeue Aufgabe anlegen%s'), '<a href="'.  $controller->url_for('admin/task/new/' . $portfolio->id) .'">', '</a>')
        )
    )
);

$infobox = array('picture' => $infobox_picture, 'content' => $infobox_content);    
?>

<div id="portfolio">
    <h1><?= sprintf(_('Aufgaben im Set "%s"'), $portfolio->name) ?></h1>
    <? if (!sizeof($portfolio->tasks)) : ?>
        <?= MessageBox::info(sprintf(_('Es sind bisher keine Aufgaben in diesem Aufgabensets vorhanden. %sLegen Sie eine neue Aufgabe an.%s'),
            '<a href="'. $controller->url_for('admin/task/new/' . $portfolio->id) .'">', '</a>')) ?>
    <? else : ?>
        <table class="default zebra">
            <thead>
                <tr>
                    <th><?= _('Name') ?></th>
                    <th><?= _('Enthalten in Sets') ?></th>
                    <th><?= _('Tags') ?></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <? foreach ($portfolio->tasks as $task) : ?>
                <tr>
                    <td>
                        <a href="<?= $controller->url_for('admin/task/edit/' . $portfolio->id .'/'. $task->id) ?>">
                            <?= $task->title ?>
                        </a>
                    </td>
                    <td>
                        <ul style="margin: 0px; padding-left: 0px;">
                            <?= implode(',', array_map(function($data) use ($controller) { 
                                return '<a href="'. $controller->url_for('admin/task/index/' . $data['id']) .'">'. $data['name'] .'</a>';
                            } , $task->tasksets->toArray())); ?>
                        </ul>                        
                    </td>
                    <td>
                        <?= implode(', ', $task->tags->pluck('tag')); ?>
                    </td>
                    
                    <td>
                        <a href="<?= $controller->url_for('admin/task/edit/' . $portfolio->id .'/'. $task->id) ?>">
                            <?= Assets::img('icons/16/blue/edit.png') ?>
                        </a>
                    </td>

                    <td>
                        <a href="<?= $controller->url_for('admin/task/delete/' . $portfolio->id .'/'. $task->id) ?>">
                            <?= Assets::img('icons/16/blue/trash.png') ?>
                        </a>
                    </td>                    
                </tr>
            <? endforeach ?>
            </tbody>
        </table>
    <? endif ?>
</div>
