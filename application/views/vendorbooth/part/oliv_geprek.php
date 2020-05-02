<form id="rincicek">
<table class="table table-bordered">
    <tr>    
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr id="oliv_bo_put" style="display: none;">
        <td>BOOTH PUTIH</td>
        <td>1</td>
        <td><p id="oligep_booth_putih"></p></td>
    </tr>
    <tr>
        <td>STICKER BOOTH SET</td>
        <td>1</td>
        <td><p id="oligep_sticker"></p></td>
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td>1</td>
        <td><p id="oligep_rol_banner"></p></td>
    </tr>
    <tr>
        <td>MMT BANNER ATAP</td>
        <td>2</td>
        <td><p id="oligep_mmt_atap"></p></td>
    </tr>
    <tr>
        <td>1 SET COBEX 30CM</td>
        <td>1</td>
        <td><p id="oligep_cobex"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER GAS</td>
        <td align="center">1</td>
        <td><p id="oligep_deep_gas"></p></td>
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="oligep_se_reg"></p></td>
    </tr>
    <tr>
        <td>RICE COOKER</td>
        <td>1</td>
        <td><p id="oligep_ricecok"></p></td>
    </tr>
    <tr>
        <td>WIN GAS TORCH</td>
        <td>1</td>
        <td><p id="oligep_gastor"></p></td>
    </tr>
    <tr>
        <td>TERMOS NASI KECIL</td>
        <td>1</td>
        <td><p id="oligep_termosnasi"></p></td>
    </tr>
    <tr>
        <td>ICE BOX SEDANG</td>
        <td>1</td>
        <td><p id="oligep_boxs"></p></td>
    </tr>
    <tr>
        <td>BASKOM TEPUNG SEDANG</td>
        <td>2</td>
        <td><p id="oligep_basteps"></p></td>
    </tr>
    <tr>
        <td>TOPLES SAYUR</td>
        <td>2</td>
        <td><p id="oligep_topsay"></p></td>
    </tr>
    <tr>
        <td>BASKOM SAMBAL KECIL</td>
        <td>1</td>
        <td><p id="oligep_bassam"></p></td>
    </tr>
    <tr>
        <td>WADAH TAMBAHAN KECIL</td>
        <td>2</td>
        <td><p id="oligep_watamke"></p></td>
    </tr>
    <tr>
        <td>NAMPAN STAINLESS KECIL</td>
        <td align="center">1</td>
        <td><p id="oligep_namst"></p></td>
    </tr>
    <tr>
        <td>PARUTAN KEJU</td>
        <td align="center">1</td>
        <td><p id="oligep_parkej"></p></td>
    </tr>
    <tr>
        <td>SOLET PLASTIK</td>
        <td align="center">2</td>
        <td><p id="oligep_sopla"></p></td>
    </tr>
    <tr>
        <td>TALENAN BESAR</td>
        <td align="center">1</td>
        <td><p id="oligep_telenan"></p></td>
    </tr>
    <tr>
        <td>PISAU BESAR</td>
        <td align="center">1</td>
        <td><p id="oligep_pisaub"></p></td>
    </tr>
    <tr>
        <td>GELAS TAKAR 500ML</td>
        <td align="center">1</td>
        <td><p id="oligep_getak"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="oligep_sendok"></p></td>
    </tr>
    <tr>
        <td>CAPITAN</td>
        <td align="center">1</td>
        <td><p id="oligep_capitan"></p></td>
    </tr>
    <tr>
        <td>SERBET</td>
        <td align="center">2</td>
        <td><p id="oligep_serbet"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="oligep_kanebo"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="oligep_hand_glo"></p></td>
    </tr>
    <tr>
        <td>CELEMEK MERAH</td>
        <td align="center">1</td>
        <td><p id="oligep_cel_mer"></p></td>
    </tr>
    <tr>
        <td>SERAGAM *Merah</td>
        <td align="center">2</td>
        <td><p id="oligep_sermer"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="oligep_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="oligep_id_card"></p></td>
    </tr>
    <tr id="oliv_rafia" style="display: none;">
        <td>RAFIA LAKBAN</td>
        <td>1</td>
        <td><p id="oligep_rafla"></p></td>
    </tr>
    <tr id="oliv_lakban" style="display: none;">
        <td>LAKBAN</td>
        <td>1</td>
        <td><p id="oligep_lakban"></p></td>
    </tr>
    <tr>
        <td>KARDUS</td>
        <td id="oliv_5" style="display: none;">5</td>
        <td id="oliv_1" style="display: none;">1</td>
        <td><p id="oligep_kardus"></p></td>
    </tr>
    <tr id="oliv_lampu" style="display: none;">
        <td>LAMPU SET</td>
        <td align="center">1</td>
        <td><p id="oligep_lampu"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rincianolivgeprek').style.display != 'none'){
    if($('#oligep_booth_putih').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#oligep_sticker').is(':checked')){
        var stiker_set = 1
    }else{
        var stiker_set = 0
    }
    if($('#oligep_rol_banner').is(':checked')){
        var roll_banner = 1
    }else{
        var roll_banner = 0
    }
    if($('#oligep_mmt_atap').is(':checked')){
        var mmt = 1
    }else{
        var mmt = 0
    }
    if($('#oligep_cobex').is(':checked')){
        var cobex = 1
    }else{
        var cobex = 0
    }
    if($('#oligep_deep_gas').is(':checked')){
        var deep_gas = 1
    }else{
        var deep_gas = 0
    }
    if($('#oligep_se_reg').is(':checked')){
        var sel_reg = 1
    }else{
        var sel_reg = 0
    }
    if($('#oligep_ricecok').is(':checked')){
        var rice_cook = 1
    }else{
        var rice_cook = 0
    }
    if($('#oligep_gastor').is(':checked')){
        var win_gas = 1
    }else{
        var win_gas = 0
    }
    if($('#oligep_termosnasi').is(':checked')){
        var termos_nas = 1
    }else{
        var termos_nas = 0
    }
    if($('#oligep_boxs').is(':checked')){
        var icebox = 1
    }else{
        var icebox = 0
    }
    if($('#oligep_basteps').is(':checked')){
        var bas_tep = 1
    }else{
        var bas_tep = 0
    }
    if($('#oligep_topsay').is(':checked')){
        var top_say = 1
    }else{
        var top_say = 0
    }
    if($('#oligep_bassam').is(':checked')){
        var bas_sam = 1
    }else{
        var bas_sam = 0
    }
    if($('#oligep_watamke').is(':checked')){
        var wad_tam = 1
    }else{
        var wad_tam = 0
    }
    if($('#oligep_namst').is(':checked')){
        var nampan_stain = 1
    }else{
        var nampan_stain = 0
    }
    if($('#oligep_parkej').is(':checked')){
        var parutan = 1
    }else{
        var parutan = 0
    }
    if($('#oligep_sopla').is(':checked')){
        var sol_plas = 1
    }else{
        var sol_plas = 0
    }
    if($('#oligep_telenan').is(':checked')){
        var talenan = 1
    }else{
        var talenan = 0
    }
    if($('#oligep_pisaub').is(':checked')){
        var pisau_b = 1
    }else{
        var pisau_b = 0
    }
    if($('#oligep_getak').is(':checked')){
        var gel_tak = 1
    }else{
        var gel_tak = 0
    }
    if($('#oligep_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#oligep_capitan').is(':checked')){
        var capitan = 1
    }else{
        var capitan = 0
    }
    if($('#oligep_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#oligep_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#oligep_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#oligep_cel_mer').is(':checked')){
        var celmek = 1
    }else{
        var celmek = 0
    }
    if($('#oligep_sermer').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#oligep_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#oligep_id_card').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#oligep_rafla').is(':checked')){
        var rafia_lak = 1
    }else{
        var rafia_lak = 0
    }
    if($('#oligep_lakban').is(':checked')){
        var lakban = 1
    }else{
        var lakban = 0
    }
    if($('#oligep_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }
    if($('#oligep_lampu').is(':checked')){
        var lamp_set = 1
    }else{
        var lamp_set = 0
    }

    dataString = 'booth_putih='+booth_putih
    +'&stiker_set='+stiker_set
    +'&roll_banner='+roll_banner
    +'&mmt='+mmt
    +'&cobex='+cobex
    +'&deep_gas='+deep_gas
    +'&sel_reg='+sel_reg
    +'&rice_cook='+rice_cook
    +'&win_gas='+win_gas
    +'&termos_nas='+termos_nas
    +'&icebox='+icebox
    +'&bas_tep='+bas_tep
    +'&top_say='+top_say
    +'&bas_sam='+bas_sam
    +'&wad_tam='+wad_tam
    +'&nampan_stain='+nampan_stain
    +'&parutan='+parutan
    +'&sol_plas='+sol_plas
    +'&talenan='+talenan
    +'&pisau_b='+pisau_b
    +'&gel_tak='+gel_tak
    +'&sendok='+sendok
    +'&capitan='+capitan
    +'&serbet='+serbet
    +'&kanebo='+kanebo
    +'&hand_glo='+hand_glo
    +'&celmek='+celmek
    +'&seragam='+seragam
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
    +'&rafia_lak='+rafia_lak
    +'&lakban='+lakban
    +'&kardus='+kardus
    +'&lamp_set='+lamp_set
}
</script>