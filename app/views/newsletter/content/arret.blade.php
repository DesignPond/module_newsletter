<!-- Bloc -->
<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" style="<?php echo $tableReset; ?>">
    <tr bgcolor="ffffff"><td colspan="3" height="35"></td></tr><!-- space -->
    <tr align="center" class="resetMarge">
        <td class="resetMarge">

            <!-- Bloc content-->
            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="tableReset contentForm">
                <tr>
                    <td valign="top" width="375" class="resetMarge">
                        <?php setlocale(LC_ALL, 'fr_FR');  ?>
                        <h3>{{ $bloc->reference }} du {{ $bloc->pub_date->formatLocalized('%d %B %Y') }}</h3>
                        <p class="abstract">{{ $bloc->abstract }}</p>
                        <div>{{ $bloc->pub_text }}</div>
                    </td>
                    <td width="25" class="resetMarge"></td><!-- space -->
                    <td align="center" valign="top" width="160" class="resetMarge">

                       <?php
                       if(!$bloc->arrets_categories->isEmpty() )
                       {
                           foreach($bloc->arrets_categories as $categorie)
                            {
                                // Categories
                                echo '<a href="#"><img width="140" height="107" border="0" alt="Loyer" src="'.asset('newsletter/pictos/'.$categorie->image).'"></a>';
                                echo '<p class="centerText">'.$categorie->title.'</p>';
                            }
                        }
                        ?>


                    </td>
                </tr>
            </table>
            <!-- Bloc content-->

        </td>
    </tr>
    <tr bgcolor="ffffff"><td colspan="3" height="35" class="blocBorder"></td></tr><!-- space -->
</table>
<!-- End bloc -->