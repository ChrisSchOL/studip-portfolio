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

$infobox = array('picture' => 'infobox/schedules.jpg', 'content' => $infobox_content);
?>

<div id="portfolio">
    <h1><?= _('Neue Aufgabe anlegen') ?></h1>
    <form method="post" action="<?= $controller->url_for('admin/task/add') ?>">
        <label>
            <span><?= _('Titel:') ?></span><br>
            <input type="text" name="title" required="required"><br>
        </label>
        <br>
        
        <label>
            <span><?= _('Aufgabenbeschreibung:') ?></span><br>
            <textarea name="content" required="required"></textarea><br>
        </label>
        <br>
        
        <label>
            <span><?= _('Enthalten in Aufgabensets:') ?></span><br>
            <select name="sets" multiple class="chosen" data-placeholder="<?= _('W�hlen Sie Zuordnungen aus') ?>">
                <? foreach ($portfolios as $portfolio) : ?>
                    <option value="<?= $portfolio->id ?>" <?= $portfolio->id == $portfolio_id ? 'selected="selected"' : '' ?>><?= $portfolio->name ?></option>
                <? endforeach ?>
            </select>
        </label>
        <br>
        
        <label>
            <span><?= _('Tags:') ?></span><br>
            <select name="tags" multiple data-placeholder="<?= _('F�gen Sie Tags hinzu') ?>">
                <option>1. Semester</option>
                <option>2. Semester</option>
            </select>
        </label>        

        <div style="text-align: center">
            <div class="button-group">
                <?= Studip\Button::createAccept(_('Aufgabe erstellen')) ?>
                <?= Studip\LinkButton::createCancel(_('Abbrechen'), $controller->url_for('admin/task/index/' . $portfolio_id)) ?>
            </div>
        </div>
    </form>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('select[name=sets]').chosen();
        jQuery('select[name=tags]').chosen({
            create_option: true,
            skip_no_results: true,
            create_option_text: 'Tag erstellen'.toLocaleString()
        });
    });
</script>