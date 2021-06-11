<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

?>
<?php echo $html->includeCss("vendor/grid"); ?>
<?php echo $html->includeCss("requests"); ?>
<?php echo $html->includeCss("common"); ?>

<?php console_log($requests)?>

<div class="row requests ">
    <div class="row mb-15">
        <h2>All requests you've not processed</h2>
        <p class="long-copy">
            Let import ingredients if needed. Of course, you can also reject request.
        </p>
    </div>
    <div class="row title-request">
        <div class='col span-1-of-3 box'>
            <th>RequestID </th>
        </div>
        <div class='col span-1-of-3 box'>
            <th>Created By </th>
        </div>
        <div class='col span-1-of-3 box'>
            <th>Created At </th>
        </div>
    </div>
    <div class="row">

        <?php
foreach ($requests as $request) {
    $rq = $request['Importment_request'];
    echo "<div class = 'row request-row'><a href='/admin/requestDetail/{$rq['request_id']}'>";

    echo "<div class='col span-1-of-3 box'>{$rq['request_id']} </div>";
    echo "<div class='col span-1-of-3 box'>{$rq['created_by']} </div>";
    echo "<div class='col span-1-of-3 box'>{$rq['created_at']} </div>";
    echo "</a></div>";
}
?>
    </div>
</div>