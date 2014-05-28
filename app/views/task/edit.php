<?php
$infobox_content[] = array(
    'kategorie' => _('Informationen'),
    'eintrag'   => array(
        array(
            'icon' => 'icons/16/black/info.png',
            'text' => _('Nutzer erhalten automatisch Zugriff auf dieses Aufgabenset, wenn sie in eine der ausgew�hlten Studiengangskombinationen studieren.')
        )
    )
);

$infobox = array('picture' => $infobox_picture, 'content' => $infobox_content);    
?>

<?= $this->render_partial('task/js_templates.php') ?>

<div id="portfolio">
    <h1><?= _('Aufgabe bearbeiten') ?></h1>
    <form method="post" action="<?= $controller->url_for('task/update/' . $portfolio_id .'/'. $task->id) ?>">
        <label>
            <span><?= _('Titel:') ?></span><br>
            <input type="text" name="title" required="required" value="<?= htmlReady($task->title) ?>"><br>
        </label>
        
        <label>
            <span><?= _('Aufgabenbeschreibung:') ?></span><br>
            <textarea name="content" required="required" class="add_toolbar"><?= htmlReady($task->content) ?></textarea><br>
        </label>
     
        <label>
            <span><?= _('Portfolios:') ?></span><br>
            <select id="sets" name="sets[]" multiple class="chosen" data-placeholder="<?= _('W�hlen Sie Zuordnungen aus') ?>">
                <option disabled="disabled" class="heading">Vorgegebene Portfolios</option>
                <? foreach ($portfolios as $portfolio) : ?>
                    <option value='{"type": "global", "value" : "<?= $portfolio->id ?>"}' <?= in_array($portfolio->id, $task_tasksets) !== false ? 'selected="selected"' : '' ?>><?= htmlReady($portfolio->name) ?></option>
                <? endforeach ?>

                <option disabled="disabled" class="heading">Meine Portfolios</option>
                <? /* $obj = null; $obj->id = 1; $obj->name = 'Testeintrag'; ?>
                <? $my_portfolios[] = $obj; */ ?>
                <? foreach ($my_portfolios as $portfolio) : ?>
                    <option value='{"type": "local", "value" : "<?= $portfolio->id ?>"}' <?= in_array($portfolio->id, $task_portfolios) !== false ? 'selected="selected"' : '' ?>><?= htmlReady($portfolio->name) ?></option>
                <? endforeach ?>
            </select>
        </label>
        
        <label>
            <span><?= _('Tags:') ?></span><br>
            <select id="tags" name="tags[]" multiple data-placeholder="<?= _('F�gen Sie Tags hinzu') ?>">
                <? foreach ($tags as $tag) : ?>
                <option <?= in_array($tag->tag, $task_tags) === false ? '' : 'selected="selected"' ?>><?= htmlReady($tag->tag) ?></option>
                <? endforeach ?>
            </select>
        </label>
        
        <?= $this->render_partial('task/_permissions') ?>
        <br>

        <div style="text-align: center">
            <div class="button-group">
                <?= Studip\Button::createAccept(_('Aufgabe speichern')) ?>
                <?= Studip\LinkButton::createCancel(_('Abbrechen'), $controller->url_for('task/index/' . $portfolio_id)) ?>
            </div>
        </div>
    </form>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('#sets').chosen({
            create_option: true,
            persistent_create_option: true,
            skip_no_results: true,
            create_option_text: 'Portfolio erstellen'.toLocaleString()
        });
        jQuery('#tags').chosen({
            create_option: true,
            persistent_create_option: true,
            skip_no_results: true,
            create_option_text: 'Tag erstellen'.toLocaleString()
        });
        
        <? foreach ($task->perms as $perm) : ?>
        STUDIP.Portfolio.Homepage.addPermissionTemplate({
            user: '<?= get_username($perm->user_id) ?>',
            fullname: '<?= get_fullname($perm->user_id) ?>',
            perm: '<?= $perm->role ?>',
            permission: '<?= $perm->role == 'tutor' 
                ? _('Betreuer') : $perm->role == 'student' 
                ?  _('Kommilitone') :  _('Nachfolgebetreuer') ?>'
        });
        <? endforeach ?>
    });
</script>