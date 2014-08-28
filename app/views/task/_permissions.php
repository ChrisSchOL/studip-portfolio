<label for="permissons">
<span>Zugriff gew�hren</span>
</label>

<div id="permission_list">

</div>

<div class="three-columns clearfix" id="permissions">
    <div>
        <input name="search" data-placeholder="<?= _('Nach Nutzer/in suchen...') ?>" style="width: 80%">
        <br>
        <span class="error" style="display: none;">
            <?= _('Bitte suchen Sie zuerst nach einem/r Nutzer/in, dem/der eine Berechtigung einger�umt werden soll!') ?>
        </span>
    </div>

    <div>
        <select name="permission" data-placeholder="<?= _('Berechtigung w�hlen') ?>" style="width: 80%">
            <? foreach ($permissions as $perm => $name) : ?>
            <option value="<?= $perm ?>"><?= $name ?></option>
            <? endforeach ?>
        </select>
        <?= tooltipIcon(_('Betreuer/in: Kann die komplette Aufgabe einsehen und diese auch schlie�en') . "\n"
                . _('Kommilitone/in: Kann die komplette Aufgabe einsehen aber nicht �ndern') . "\n"
                . _('Nachfolgebetreuer/in: Kann die Aufgabenbeschreibung und die Zielvereinbarung einsehen ')) ?>
    </div>
    
    <div>
        <?= \Studip\LinkButton::createAccept(_('Berechtigung hinzuf�gen'), 'javascript:', array('id' => 'add-permission')) ?>
    </div>
</div>

<script>
    var STUDIP = STUDIP || {};
    STUDIP.PortfolioConfig = STUDIP.PortfolioConfig || {};
    STUDIP.PortfolioConfig.search_user_url = '<?= $controller->url_for('user/search') ?>';
</script>