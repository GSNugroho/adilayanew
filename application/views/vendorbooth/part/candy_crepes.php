<form id="rincicek">
<table class="table table-boredered">
    <tr>
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr id="candy_bo_put" style="display: none;">
        <td>BOOTH PUTIH</td>
        <td align="center">1</td>
        <td><p id="cancre_booth_putih"></p></td>
    </tr>
    <tr id="candy_bo_pall" style="display: none;">
        <td>BOOTH PALLET</td>
        <td align="center">1</td>
        <td><p id="cancre_booth_pallet"></p></td>
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td align="center">1</td>
        <td><p id="cancre_rol_banner"></p></td>
    </tr>
    <tr id="candy_tenda" style="display: none;">
        <td>TENDA</td>
        <td align="center">1</td>
        <td><p id="cancre_tenda"></p></td>
    </tr>
    <tr>
        <td>STICKER</td>
        <td align="center">1</td>
        <td><p id="cancre_sticker"></p></td>
    </tr>
    <tr>
        <td>STICKER TOPLES</td>
        <td align="center">1</td>
        <td><p id="cancre_stickert"></p></td>
    </tr>
    <tr>
        <td>PAN CREPES</td>
        <td align="center">1</td>
        <td><p id="cancre_pan"></p></td>
    </tr>
    <tr>
        <td>SEGITIGA CREPES</td>
        <td align="center">1</td>
        <td><p id="cancre_segitiga"></p></td>
    </tr>
    <tr>
        <td>KOMPOR GAS</td>
        <td align="center">1</td>
        <td><p id="cancre_kom_gas"></p></td>
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="cancre_se_reg"></p></td>
    </tr>
    <tr>
        <td>MIXER SET</td>
        <td align="center">1</td>
        <td><p id="cancre_mixset"></p></td>
    </tr>
    <tr>
        <td>TOPLES ADONAN</td>
        <td align="center">1</td>
        <td><p id="cancre_topad"></p></td>
    </tr>
    <tr>
        <td>TOPLES TOPPING</td>
        <td align="center">7</td>
        <td><p id="cancre_toptop"></p></td>
    </tr>
    <tr>
        <td>TOPLES SELAI</td>
        <td align="center">3</td>
        <td><p id="cancre_topsel"></p></td>
    </tr>
    <tr>
        <td>GELAS TAKAR</td>
        <td align="center">1</td>
        <td><p id="cancre_getak"></p></td>
    </tr>
    <tr>
        <td>SENDOK ADONAN</td>
        <td align="center">1</td>
        <td><p id="cancre_senad"></p></td>
    </tr>
    <tr>
        <td>KUAS</td>
        <td align="center">1</td>
        <td><p id="cancre_kuas"></p></td>
    </tr>
    <tr>
        <td>PARUTAN KEJU</td>
        <td align="center">1</td>
        <td><p id="cancre_parkej"></p></td>
    </tr>
    <tr>
        <td>NAMPAN STAINLESS</td>
        <td align="center">1</td>
        <td><p id="cancre_namst"></p></td>
    </tr>
    <tr>
        <td>SOLET PLASTIK</td>
        <td align="center">2</td>
        <td><p id="cancre_sopla"></p></td>
    </tr>
    <tr>
        <td>SENDOK TOPPING</td>
        <td align="center">7</td>
        <td><p id="cancre_setop"></p></td>
    </tr>
    <tr>
        <td>SCRAP CREPES</td>
        <td align="center">1</td>
        <td><p id="cancre_scre"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="cancre_sendok"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="cancre_hand_glo"></p></td>
    </tr>
    <tr>
        <td>LAP SERBET</td>
        <td align="center">1</td>
        <td><p id="cancre_serbet"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="cancre_kanebo"></p></td>
    </tr>
    <tr>
        <td>SERAGAM *MERAH</td>
        <td align="center">2</td>
        <td><p id="cancre_semer"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="cancre_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="cancre_id_ca"></p></td>
    </tr>
    <tr id="candy_rafia" style="display: none;">
        <td>RAFIA LAKBAN</td>
        <td>1</td>
        <td><p id="cancre_rafla"></p></td>
    </tr>
    <tr id="candy_lakban" style="display: none;">
        <td>LAKBAN</td>
        <td>1</td>
        <td><p id="cancre_lakban"></p></td>
    </tr>
    <tr>
        <td>KARDUS</td>
        <td id="candy_5" style="display: none;">5</td>
        <td id="candy_1" style="display: none;">1</td>
        <td><p id="cancre_kardus"></p></td>
    </tr>
    <tr>
        <td>CELEMEK MERAH</td>
        <td align="center">1</td>
        <td><p id="cancre_cel_mer"></p></td>
    </tr>
    <tr id="candy_lampu" style="display: none;">
        <td>LAMPU SET</td>
        <td align="center">1</td>
        <td><p id="cancre_lampu"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rinciancandycrepes').style.display != 'none'){
    if($('#cancre_booth_putih').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#cancre_booth_pallet').is(':checked')){
        var booth_pallet = 1
    }else{
        var booth_pallet = 0
    }
    if($('#cancre_rol_banner').is(':checked')){
        var roll_banner = 1
    }else{
        var roll_banner = 0
    }
    if($('#cancre_tenda').is(':checked')){
        var tenda = 1
    }else{
        var tenda = 0
    }
    if($('#cancre_sticker').is(':checked')){
        var sticker = 1
    }else{
        var sticker = 0
    }
    if($('#cancre_stickert').is(':checked')){
        var sticker_top = 1
    }else{
        var sticker_top = 0
    }
    if($('#cancre_pan').is(':checked')){
        var pan_crep = 1
    }else{
        var pan_crep = 0
    }
    if($('#cancre_segitiga').is(':checked')){
        var segi_crepes = 1
    }else{
        var segi_crepes = 0
    }
    if($('#cancre_kom_gas').is(':checked')){
        var kom_gas = 1
    }else{
        var kom_gas = 0
    }
    if($('#cancre_se_reg').is(':checked')){
        var selreg = 1
    }else{
        var selreg = 0
    }
    if($('#cancre_mixset').is(':checked')){
        var mix_set = 1
    }else{
        var mix_set = 0
    }
    if($('#cancre_topad').is(':checked')){
        var top_ado = 1
    }else{
        var top_ado = 0
    }
    if($('#cancre_toptop').is(':checked')){
        var top_top = 1
    }else{
        var top_top = 0
    }
    if($('#cancre_topsel').is(':checked')){
        var top_selai = 1
    }else{
        var top_selai = 0
    }
    if($('#cancre_getak').is(':checked')){
        var gel_tak = 1
    }else{
        var gel_tak = 0
    }
    if($('#cancre_senad').is(':checked')){
        var sendok_ado = 1
    }else{
        var sendok_ado = 0
    }
    if($('#cancre_kuas').is(':checked')){
        var kuas = 1
    }else{
        var kuas = 0
    }
    if($('#cancre_parkej').is(':checked')){
        var parut_kej = 1
    }else{
        var parut_kej = 0
    }
    if($('#cancre_namst').is(':checked')){
        var nampan_stain = 1
    }else{
        var nampan_stain = 0
    }
    if($('#cancre_sopla').is(':checked')){
        var solet_plas = 1
    }else{
        var solet_plas = 0
    }
    if($('#cancre_setop').is(':checked')){
        var sendok_top = 1
    }else{
        var sendok_top = 0
    }
    if($('#cancre_scre').is(':checked')){
        var scrap_crep = 1
    }else{
        var scrap_crep = 0
    }
    if($('#cancre_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#cancre_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#cancre_serbet').is(':checked')){
        var lap_serb = 1
    }else{
        var lap_serb = 0
    }
    if($('#cancre_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#cancre_semer').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#cancre_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#cancre_id_ca').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#cancre_rafla').is(':checked')){
        var rafia_lakban = 1
    }else{
        var rafia_lakban = 0
    }
    if($('#cancre_lakban').is(':checked')){
        var lakban = 1
    }else{
        var lakban = 0
    }
    if($('#cancre_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }
    if($('#cancre_cel_mer').is(':checked')){
        var cel_mer = 1
    }else{
        var cel_mer = 0
    }
    if($('#cancre_lampu').is(':checked')){
        var lam_set = 1
    }else{
        var lam_set = 0
    }
    var dataString = 'booth_putih='+booth_putih
    +'&booth_pallet='+booth_pallet
    +'&roll_banner='+roll_banner
    +'&tenda='+tenda
    +'&sticker='+sticker
    +'&sticker_top='+sticker_top
    +'&pan_crep='+pan_crep
    +'&segi_crepes='+segi_crepes
    +'&kom_gas='+kom_gas
    +'&selreg='+selreg
    +'&mix_set='+mix_set
    +'&top_ado='+top_ado
    +'&top_top='+top_top
    +'&top_selai='+top_selai
    +'&gel_tak='+gel_tak
    +'&sendok_ado='+sendok_ado
    +'&kuas='+kuas
    +'&parut_kej='+parut_kej
    +'&nampan_stain='+nampan_stain
    +'&solet_plas='+solet_plas
    +'&sendok_top='+sendok_top
    +'&scrap_crep='+scrap_crep
    +'&sendok='+sendok
    +'&hand_glo='+hand_glo
    +'&lap_serb='+lap_serb
    +'&kanebo='+kanebo
    +'&seragam='+seragam
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
    +'&rafia_lakban='+rafia_lakban
    +'&lakban='+lakban
    +'&kardus='+kardus
    +'&cel_mer='+cel_mer
    +'&lam_set='+lam_set
}
</script>