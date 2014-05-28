<label for="permissons">
<span>Zugriff gew�hren</span>
</label>

<div class="three-columns">
    <div>
        <select name="search" data-placeholder="<?= _('Nach Nutzer suchen...') ?>">
        </select>
    </div>

    <div>
        <select name="permission" data-placeholder="<?= _('Berechtigung w�hlen') ?>">
            <option value="tutor"><?= _('Betreuer') ?></option>
            <option value="student"><?= _('Kommilitone') ?></option>
            <option value="followup-tutor"><?= _('Nachfolgebetreuer') ?></option>
        </select>
        <?= tooltipIcon(_('Betreuer: Kann die komplette Aufgabe einsehen und diese auch schlie�en') . "\n"
                . _('Kommilitone: Kann die komplette Aufgabe einsehen aber nicht �ndern') . "\n"
                . _('Nachfolgebetreuer: Kann die Aufgabenstellung und die Zielvereinbarung einsehen ')) ?>
    </div>
    
    <div>
        <?= \Studip\LinkButton::createAccept(_('Berechtigung hinzuf�gen')) ?>
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