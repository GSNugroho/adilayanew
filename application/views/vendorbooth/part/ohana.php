<form id="rincicek">
<table class="table table-bordered">
    <tr>    
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr>
        <td>BOOTH PUTIH</td>
        <td align="center">1</td>
        <td><p id="ohana_booth_putih"></p></td>
    </tr>
    <tr>
        <td>STICKER BOOTH SET</td>
        <td align="center">1</td>
        <td><p id="ohana_sticker"></p></td>
    </tr>
    <tr id="oh_tenda" style="display: none;">
        <td>TENDA</td>
        <td align="center">1</td>
        <td><p id="ohana_tenda"></p></td>
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td align="center">1</td>
        <td><p id="ohana_roll_ban"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER GAS</td>
        <td align="center">1</td>
        <td><p id="ohana_deep_gas"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER LISTRIK</td>
        <td align="center">1</td>
        <td><p id="ohana_deep_lis"></p></td>
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="ohana_se_reg"></p></td>
    </tr>
    <tr>
        <td>WARMER LISTRIK</td>
        <td align="center">1</td>
        <td><p id="ohana_warmer"></p></td>
    </tr>
    <tr>
        <td>RICE COOKER</td>
        <td>1</td>
        <inpup id="ohana_rice</p>cok">
    </tr>
    <tr>
        <td>TERMOS NASI KECIL</td>
        <td>1</td>
        <inpup id="ohana_termosn</p>asi">
    </tr>
    <tr>
        <td>NAMPAN STAINLESS</td>
        <td align="center">2</td>
        <td><p id="ohana_namst"></p></td>
    </tr>
    <tr>
        <td>ICE BOX SEDANG</td>
        <td>1</td>
        <inpup id="ohana_b</p>oxs">
    </tr>
    <tr>
        <td>BOTOL SAUS PLASTIK</td>
        <td align="center">4</td>
        <td><p id="ohana_btoksap"></p></td>
    </tr>
    <tr>
        <td>BASKOM TEPUNG SEDANG</td>
        <td>2</td>
        <td><p id="ohana_basteps"></p></td>
    </tr>
    <tr>
        <td>BASKOM SAMBAL KECIL</td>
        <td>1</td>
        <td><p id="ohana_bassam"></p></td>
    </tr>
    <tr>
        <td>TOPLES TAMBAHAN KECIL</td>
        <td>2</td>
        <td><p id="ohana_totamke"></p></td>
    </tr>
    <tr>
        <td>TALENAN BESAR</td>
        <td align="center">1</td>
        <td><p id="ohana_telenan"></p></td>
    </tr>
    <tr>
        <td>PISAU BESAR</td>
        <td align="center">1</td>
        <td><p id="ohana_pisaub"></p></td>
    </tr>
    <tr>
        <td>GELAS TAKAR 500ML</td>
        <td align="center">1</td>
        <td><p id="ohana_getak"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="ohana_sendok"></p></td>
    </tr>
    <tr>
        <td>CAPITAN</td>
        <td align="center">1</td>
        <td><p id="ohana_capitan"></p></td>
    </tr>
    <tr>
        <td>SERBET</td>
        <td align="center">2</td>
        <td><p id="ohana_serbet"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="ohana_kanebo"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="ohana_hand_glo"></p></td>
    </tr>
    <tr>
        <td>SERAGAM (HITAM)</td>
        <td align="center">2</td>
        <td><p id="ohana_serhit"></p></td>
    </tr>
    <tr>
        <td>CELEMEK (HITAM)</td>
        <td align="center">1</td>
        <td><p id="ohana_cel_hit"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="ohana_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="ohana_id_card"></p></td>
    </tr>
    <tr>
        <td>PACKING KAYU</td>
        <td align="center">1</td>
        <td><p id="ohana_kayu"></p></td>
    </tr>
    <tr>
        <td>RAFIA LAKBAN</td>
        <td>1</td>
        <td><p id="ohana_rafla"></p></td>
    </tr>
    <tr>
        <td>KARDUS</td>
        <td id="oh_5" style="display: none;">5</td>
        <td><p id="ohana_kardus"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rincianohana').style.display != 'none'){
    if($('#ohana_booth_putih').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#ohana_sticker').is(':checked')){
        var stiker_set = 1
    }else{
        var stiker_set = 0
    }
    if($('#ohana_tenda').is(':checked')){
        var tenda = 1
    }else{
        var tenda = 0
    }
    if($('#ohana_roll_ban').is(':checked')){
        var roll_banner = 1
    }else{
        var roll_banner = 0
    }
    if($('#ohana_deep_gas').is(':checked')){
        var deep_gas = 1
    }else{
        var deep_gas = 0
    }
    if($('#ohana_deep_lis').is(':checked')){
        var deep_lis = 1
    }else{
        var deep_lis = 0
    }
    if($('#ohana_se_reg').is(':checked')){
        var sel_reg = 1
    }else{
        var sel_reg = 0
    }
    if($('#ohana_warmer').is(':checked')){
        var warmer = 1
    }else{
        var warmer = 0
    }
    if($('#ohana_ricecok').is(':checked')){
        var rice_cook = 1
    }else{
        var rice_cook = 0
    }
    if($('#ohana_termosnasi').is(':checked')){
        var termos_nas = 1
    }else{
        var termos_nas = 0
    }
    if($('#ohana_namst').is(':checked')){
        var nampan_stain = 1
    }else{
        var nampan_stain = 0
    }
    if($('#ohana_boxs').is(':checked')){
        var icebox = 1
    }else{
        var icebox = 0
    }
    if($('#ohana_btoksap').is(':checked')){
        var bot_saus = 1
    }else{
        var bot_saus = 0
    }
    if($('#ohana_basteps').is(':checked')){
        var bas_tep = 1
    }else{
        var bas_tep = 0
    }
    if($('#ohana_bassam').is(':checked')){
        var bas_sam = 1
    }else{
        var bas_sam = 0
    }
    if($('#ohana_totamke').is(':checked')){
        var top_tam = 1
    }else{
        var top_tam = 0
    }
    if($('#ohana_telenan').is(':checked')){
        var telenan = 1
    }else{
        var telenan = 0
    }
    if($('#ohana_pisaub').is(':checked')){
        var pisau_b = 1
    }else{
        var pisau_b = 0
    }
    if($('#ohana_getak').is(':checked')){
        var gel_tak = 1
    }else{
        var gel_tak = 0
    }
    if($('#ohana_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#ohana_capitan').is(':checked')){
        var capitan = 1
    }else{
        var capitan = 0
    }
    if($('#ohana_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#ohana_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#ohana_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#ohana_serhit').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#ohana_cel_hit').is(':checked')){
        var celmek = 1
    }else{
        var celmek = 0
    }
    if($('#ohana_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#ohana_id_card').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#ohana_kayu').is(':checked')){
        var packing = 1
    }else{
        var packing = 0
    }
    if($('#ohana_rafla').is(':checked')){
        var rafia_lak = 1
    }else{
        var rafia_lak = 0
    }
    if($('#ohana_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }

    dataString = 
    'booth_putih='+booth_putih
    +'&stiker_set='+stiker_set
    +'&tenda='+tenda
    +'&roll_banner='+roll_banner
    +'&deep_gas='+deep_gas
    +'&deep_lis='+deep_lis
    +'&sel_reg='+sel_reg
    +'&warmer='+warmer
    +'&rice_cook='+rice_cook
    +'&termos_nas='+termos_nas
    +'&nampan_stain='+nampan_stain
    +'&icebox='+icebox
    +'&bot_saus='+bot_saus
    +'&bas_tep='+bas_tep
    +'&bas_sam='+bas_sam
    +'&top_tam='+top_tam
    +'&telenan='+telenan
    +'&pisau_b='+pisau_b
    +'&gel_tak='+gel_tak
    +'&sendok='+sendok
    +'&capitan='+capitan
    +'&serbet='+serbet
    +'&kanebo='+kanebo
    +'&hand_glo='+hand_glo
    +'&seragam='+seragam
    +'&celmek='+celmek
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
    +'&packing='+packing
    +'&rafia_lak='+rafia_lak
    +'&kardus='+kardus
}
</script>