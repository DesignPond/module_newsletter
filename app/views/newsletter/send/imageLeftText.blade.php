<!-- Bloc -->
<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" class="tableReset">
    <tr bgcolor="ffffff">
        <td colspan="3" height="35"> </td>
    </tr><!-- space -->
    <tr align="center" class="resetMarge">
        <td class="resetMarge">

            <!-- Bloc content-->
            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="tableReset contentForm">
                <tr>
                    <td valign="top" align="center" width="160" class="resetMarge">
                        <?php $lien = (isset($bloc->lien) && !empty($bloc->lien) ? $bloc->lien : url('/') ); ?>
                        <a target="_blank" href="<?php echo $lien; ?>">
                            <img width="130px" style="max-width: 130px; max-height: 220px;" alt="Droit du travail" src="{{ asset('files/'.$bloc->image) }}" />
                        </a>
                    </td>
                    <td width="25" class="resetMarge"></td><!-- space -->
                    <td valign="top" width="375" class="resetMarge">
                        <h2 style="font-family: sans-serif;">{{ $bloc->titre }}</h2>
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