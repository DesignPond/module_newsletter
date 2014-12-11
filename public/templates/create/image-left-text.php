<form flow-init flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]"
      flow-files-submitted="$flow.upload()"
      class="row" name="blocForm" class="form-horizontal"
      ng-controller="FormController as formCtrl"
      ng-submit="addContent(blocForm,'imageLeftText')">

    <div class="col-md-7" id="bailNewsletterCreate">
        <!-- Bloc content-->
        <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="resetTable">
            <tr>
                <td valign="top" align="center" width="160" class="resetMarge">

                    <div class="thumbnail" ng-hide="$flow.files.length"><img src="http://www.placehold.it/130x140/EFEFEF/AAAAAA&text=choisir+une+image" /></div>
                    <div class="thumbnail" ng-show="$flow.files.length"><img flow-img="$flow.files[0]" /></div>
                    <div class="uploadBtn">
                        <span class="btn btn-xs btn-info" ng-hide="$flow.files.length" flow-btn flow-attrs="{accept:'image/*'}">Selectionner image</span>
                        <span class="btn btn-xs btn-warning" ng-show="$flow.files.length" flow-btn flow-attrs="{accept:'image/*'}">Changer</span>
                        <span class="btn btn-xs btn-danger" ng-show="$flow.files.length" ng-click="$flow.cancel()">Supprimer</span>
                    </div>

                    <input type="hidden" class="uploadImage" name="image" value="{{ $flow.files[0].name }}">

                </td>
                <td width="25" class="resetMarge"></td><!-- space -->
                <td valign="top" width="375" class="resetMarge contentForm">
                    <h2>{{ formCtrl.form.titre }}</h2>
                    <div ng-bind-html='formCtrl.form.contenu'></div>
                </td>
            </tr>

        </table>
        <!-- Bloc content-->
    </div>
    <div class="col-md-5 create_content_form">

        <div class="panel panel-success">
            <div class="panel-body">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" ng-model="formCtrl.form.titre" required name="titre" class="form-control">
                </div>
                <div class="form-group">
                    <label>Texte</label>
                    <textarea redactor ng-model="formCtrl.form.contenu" required name="contenu" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-sm btn-success">Envoyer</button>
                        <button type="button" ng-click="formCtrl.close()" class="btn btn-sm btn-default">Annuler</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
