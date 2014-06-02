<?
$path = array(
    _('�bersicht')
);
?>

<h1>Meine Portfolios</h1>

<? foreach ($portfolios as $portfolio) : ?>
<a href="<?= $controller->url_for('task/index/' . $portfolio['id']) ?>">
    <span class="portfolio" title="<?= htmlReady($portfolio['name']) ?>">
        <?= htmlReady($portfolio['name']) ?>
    </span>
</a>
<? endforeach ?>

<span class="portfolio add_portfolio" title="<?= _('Neues Portfolio hinzuf�gen') ?>">
    <?= _('Neues Portfolio hinzuf�gen') ?>
</span>

<br style="clear: both">
<? if (!empty($tasks_by_tag) || !empty($tagless_tasks)) : ?>
    <h1><?= _('F�r mich freigegebene Aufgaben') ?></h1>
    <?= $this->render_partial('task/_task_list') ?>
<? endif ?>

<script>
    (function ($) {
        $(document).ready(function() {
            STUDIP.Portfolio.Homepage.init();
        });
    })(jQuery);
</script>
