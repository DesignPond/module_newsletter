<!-- Bloc -->
<table id="bloc_rang_{{ $bloc->idItem }}" data-rel="{{ $bloc->rangItem }}" border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="tableReset">
    <tr bgcolor="ffffff"><td colspan="3" height="35"></td></tr><!-- space -->
    <tr align="center" class="resetMarge">
        <td class="resetMarge">

            <!-- Bloc content-->
            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="tableReset contentForm">
                <tr>
                    <td colspan="3" valign="top" align="left" width="560" class="resetMarge">
                        <h2>{{ $bloc->titre }}</h2>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" width="130" class="resetMarge">
                        <a href="#"><img style="max-width: 130px; max-height: 220px;" alt="Droit du bail" src="{{ asset('files/'.$bloc->image) }}" /></a>
                    </td>
                    <td width="25" class="resetMarge"></td><!-- space -->
                    <td valign="top" width="405" class="resetMarge">
                        <div>{{ $bloc->contenu }}</div>
                    </td>
                </tr>
            </table>
            <!-- Bloc content-->
        </td>
    </tr>
    <tr bgcolor="ffffff"><td colspan="3" height="35" class="blocBorder"></td></tr><!-- space -->
</table>
<!-- End bloc -->