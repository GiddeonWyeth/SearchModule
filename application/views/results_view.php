<div style="float: left">
<a href="/search_module/">На главную</a>

<table>
    <thead>
    <tr>
        <th>URL</th>
        <th>Type</th>
        <th>Count</th>
        <th>View results</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $res) { ?>
        <tr>
            <td><?= $res['url'] ?></td>
            <td><?= $res['type'] ?></td>
            <td><?= $res['count'] ?></td>
            <td>
                <button data-ng-click="getRes(<?=$res['id']?>)">This one</button>
            </td>
        </tr>
    <? } ?>
    </tbody>
</table>
</div>
<table style="float: right">
    <tbody>
    <tr data-ng-repeat="value in html.data track by $index">
        <td data-ng-bind-html="value"></td>
    </tr>
    </tbody>
</table>