<label for="permissons">
<span>Zugriff gew�hren</span>
</label>

<div id="permission_list">

</div>

<div class="three-columns" id="permissions">
    <div>
        <select name="search" data-placeholder="<?= _('Nach Nutzer suchen...') ?>">
        </select>
        <span class="chosen-error" style="display: none">
            <?= _('Bitte suchen Sie zuerst nach einem Nutzer, dem eine Berechtigung einger�umt werden soll!') ?>
        </span>
    </div>

    <div>
        <select name="permission" data-placeholder="<?= _('Berechtigung w�hlen') ?>">
            <? foreach ($permissions as $perm => $name) : ?>
            <option value="<?= $perm ?>"><?= $name ?></option>
            <? endforeach ?>
        </select>
        <?= tooltipIcon(_('Betreuer/in: Kann die komplette Aufgabe einsehen und diese auch schlie�en') . "\n"
                . _('Kommilitone/in: Kann die komplette Aufgabe einsehen aber nicht �ndern') . "\n"
                . _('Nachfolgebetreuer/in: Kann die Aufgabenbeschreibung und die Zielvereinbarung einsehen ')) ?>
    </div>
    
    <div>
        <?= \Studip\LinkButton::createAccept(_('Berechtigung hinzuf�gen'), 'javascript:STUDIP.Portfolio.Homepage.addPermission()') ?>
    </div>
</div>
<br style="clear: both">

<script>
    jQuery(document).ready(function() {
        $('select[name=search]').ajaxChosen({
            type: 'GET',
            url: '<?= $controller->url_for('user/search/') ?>',
            dataType: 'json',
        }, function (data) {
            var results = [];

            $.each(data, function (i, val) {
                results.push({ value: val.username, text: val.fullname });
            });

            return results;
        }, {
            disable_search_threshold: -1,
        });
        
        $('select[name=permission]').chosen({
            disable_search: true
        });
    });
</script>