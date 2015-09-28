<div data-ng-cloak class="ng-cloak">
<form data-ng-submit="processForm(formData)" name="search_form" novalidate>
    <label>URL</label>
    <input type="url" name="url" data-ng-model="formData.url" required placeholder="http://example.ru"/>
    <span style="color: red" data-ng-show="search_form.url.$error.url">URL must start with http:// or https://</span>
    <label>Картинки</label>
    <input type="radio" name="param" value="Images" data-ng-model="formData.param" required/>
    <label>Ссылки</label>
    <input type="radio" name="param" value="Link" data-ng-model="formData.param" required/>
    <label>Свой текст</label>
    <input type="radio" name="param" value="Text" data-ng-model="formData.param" required/>
    <input type="text" name="text" data-ng-model="formData.text" data-ng-show="formData.param=='Text'"
           data-ng-required="formData.param=='Text'">
    <input type="submit" data-ng-disabled="search_form.$invalid"/>
</form>
<a href="results/">К результатам</a>
</div>
<table>
    <tbody>
    <tr data-ng-repeat="value in html.data track by $index">
        <td data-ng-bind-html="value"></td>
    </tr>
    </tbody>
</table>