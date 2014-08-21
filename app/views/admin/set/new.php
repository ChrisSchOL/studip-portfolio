<?php
$infobox_content[] = array(
    'kategorie' => _('Informationen'),
    'eintrag'   => array(
        array(
            'icon' => 'icons/16/black/info.png',
            'text' => _('Nutzer/innen erhalten automatisch Zugriff auf dieses Aufgabenset, wenn sie in eine der ausgew�hlten Studiengangskombinationen studieren.')
        )
    )
);

$infobox = array('picture' => $infobox_picture, 'content' => $infobox_content);
?>

<?= $this->render_partial('admin/set/js_templates') ?>

<h1><?= _('Neues Aufgabenset anlegen') ?></h1>
<form method="post" action="<?= $controller->url_for('admin/set/add') ?>">
    <label>
        <span class="label"><?= _('Name des Sets:') ?></span><br>
        <input type="text" name="name"><br>
    </label>
    <br>
    <span class="label"><?= _('Freigeben f�r Studieng�nge:') ?></span><br>

    <div class="studiengang_combos"></div>

    <?= Studip\LinkButton::create(_('Weitere Studiengangskombination hinzuf�gen'), 'javascript:STUDIP.Portfolio.Admin.addCombo();') ?>

    <div style="text-align: center">
        <div class="button-group">
            <?= Studip\Button::createAccept(_('Aufgabenset erstellen')) ?>
            <?= Studip\LinkButton::createCancel(_('Abbrechen'), $controller->url_for('admin/set/index')) ?>
        </div>
    </div>
</form>

<script>
    jQuery(document).ready(function() {
        STUDIP.Portfolio.Admin.addCombo();
    });
</script>