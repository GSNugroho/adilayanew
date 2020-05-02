<form id="rincicek">
<table class="table table-bordered">
    <tr>    
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr>
        <td>BOOTH PUTIH</td>
        <td>1</td>
        <td><p id="chifin_booth_putih"></p></td>
    </tr>
    <tr>
        <td>STICKER BOOTH SET</td>
        <td>1</td>
        <inpup id="chifin_stic</p>ker">
    </tr>
    <tr>
        <td>TENDA</td>
        <td align="center">1</td>
        <td><p id="chifin_tenda"></p></td>
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td>1</td>
        <td><p id="chifin_rol_banner"></p></td>
    </tr>
    <tr>
        <td>RAFIA LAKBAN</td>
        <td>1</td>
        <td><p id="chifin_rafla"></p></td>
    </tr>
    <tr>
        <td>KARDUS</td>
        <td>4</td>
        <td><p id="chifin_kardus"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER GAS</td>
        <td align="center">1</td>
        <td><p id="chifin_deep_gas"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER LISTRIK</td>
        <td align="center">1</td>
        <td><p id="chifin_deep_lis"></p></td>
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="chifin_se_reg"></p></td>
    </tr>
    <tr>
        <td>NAMPAN STAINLESS KOTAK 40x30</td>
        <td align="center">1</td>
        <td><p id="chifin_nmst"></p></td>
    </tr>
    <tr>
        <td>TIRISAN AYAM STAINLESS 40x20</td>
        <td align="center">1</td>
        <td><p id="chifin_tsst"></p></td>
    </tr>
    <tr>
        <td>ICE BOX SEDANG</td>
        <td align="center">1</td>
        <td><p id="chifin_icboxs"></p></td>
    </tr>
    <tr>
        <td>BASKOM TEPUNG STAINLESS</td>
        <td align="center">2</td>
        <td><p id="chifin_bastep"></p></td>
    </tr>
    <tr>
        <td>TALENAN BESAR</td>
        <td align="center">1</td>
        <td><p id="chifin_telenan"></p></td>
    </tr>
    <tr>
        <td>PISAU FILLET</td>
        <td align="center">1</td>
        <td><p id="chifin_pisauf"></p></td>
    </tr>
    <tr>
        <td>TOPLES PLASTIK</td>
        <td align="center">1</td>
        <td><p id="chifin_topplas"></p></td>
    </tr>
    <tr>
        <td>TIMBANGAN DAGING AYAM</td>
        <td align="center">1</td>
        <td><p id="chifin_timbangan"></p></td>
    </tr>
    <tr>
        <td>BOTOL SAUS/MAYONAISE</td>
        <td align="center">3</td>
        <td><p id="chifin_btoksa"></p></td>
    </tr>
    <tr>
        <td>BOTOL BUMBU STAINLESS (BESAR)</td>
        <td align="center">6</td>
        <td><p id="chifin_bobum"></p></td>
    </tr>
    <tr>
        <td>GELAS TAKAR 500ML</td>
        <td align="center">1</td>
        <td><p id="chifin_getak"></p></td>
    </tr>
    <tr>
        <td>TEMPAT SENDOK STAINLESS</td>
        <td align="center">1</td>
        <td><p id="chifin_tsendok"></p></td>
    </tr>
    <tr>
        <td>CAPITAN (HITAM)</td>
        <td align="center">2</td>
        <td><p id="chifin_capitan"></p></td>
    </tr>
    <tr>
        <td>SERBET</td>
        <td align="center">2</td>
        <td><p id="chifin_serbet"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="chifin_kanebo"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="chifin_hand_glo"></p></td>
    </tr>
    <tr>
        <td>MASKER</td>
        <td align="center">1</td>
        <td><p id="chifin_masker"></p></td>
    </tr>
    <tr>
        <td>SERAGAM (MERAH)</td>
        <td align="center">2</td>
        <td><p id="chifin_seragam"></p></td>
    </tr>
    <tr>
        <td>CELEMEK (HITAM)</td>
        <td align="center">1</td>
        <td><p id="chifin_clemek"></p></td>
    </tr>
    <tr>
        <td>TUSUKAN SATE</td>
        <td align="center">1</td>
        <td><p id="chifin_tusuks"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="chifin_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="chifin_id_ca"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rincianchipfinger').style.display != 'none'){
    if($('#chifin_booth_putih').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#chifin_sticker').is(':checked')){
        var sticker_booth_set = 1
    }else{
        var sticker_booth_set = 0
    }
    if($('#chifin_tenda').is(':checked')){
        var tenda = 1
    }else{
        var tenda = 0
    }
    if($('#chifin_rol_banner').is(':checked')){
        var roll_banner = 1
    }else{
        var roll_banner = 0
    }
    if($('#chifin_rafla').is(':checked')){
        var rafia_lakban = 1
    }else{
        var rafia_lakban = 0
    }
    if($('#chifin_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }
    if($('#chifin_deep_gas').is(':checked')){
        var deep_gas = 1
    }else{
        var deep_gas = 0
    }
    if($('#chifin_deep_lis').is(':checked')){
        var deep_lis = 1
    }else{
        var deep_lis = 0
    }
    if($('#chifin_se_reg').is(':checked')){
        var sel_reg = 1
    }else{
        var sel_reg = 0
    }
    if($('#chifin_nmst').is(':checked')){
        var nampan_stain = 1
    }else{
        var nampan_stain = 0
    }
    if($('#chifin_tsst').is(':checked')){
        var tiris = 1
    }else{
        var tiris = 0
    }
    if($('#chifin_icboxs').is(':checked')){
        var ice_box = 1
    }else{
        var ice_box = 0
    }
    if($('#chifin_bastep').is(':checked')){
        var bas_tep = 1
    }else{
        var bas_tep = 0
    }
    if($('#chifin_telenan').is(':checked')){
        var telenan = 1
    }else{
        var telenan = 0
    }
    if($('#chifin_pisauf').is(':checked')){
        var pisauf = 1
    }else{
        var pisauf = 0
    }
    if($('#chifin_topplas').is(':checked')){
        var top_plas = 1
    }else{
        var top_plas = 0
    }
    if($('#chifin_timbangan').is(':checked')){
        var timbangan = 1
    }else{
        var timbangan = 0
    }
    if($('#chifin_btoksa').is(':checked')){
        var bot_saus = 1
    }else{
        var bot_saus = 0
    }
    if($('#chifin_bobum').is(':checked')){
        var bot_bum = 1
    }else{
        var bot_bum = 0
    }
    if($('#chifin_getak').is(':checked')){
        var gel_tak = 1
    }else{
        var gel_tak = 0
    }
    if($('#chifin_tsendok').is(':checked')){
        var temp_sendok = 1
    }else{
        var temp_sendok = 0
    }
    if($('#chifin_capitan').is(':checked')){
        var capitan = 1
    }else{
        var capitan = 0
    }
    if($('#chifin_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#chifin_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#chifin_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#chifin_masker').is(':checked')){
        var masker = 1
    }else{
        var masker = 0
    }
    if($('#chifin_seragam').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#chifin_clemek').is(':checked')){
        var celmek = 1
    }else{
        var celmek = 0
    }
    if($('#chifin_tusuks').is(':checked')){
        var tusuk_sat = 1
    }else{
        var tusuk_sat = 0
    }
    if($('#chifin_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#chifin_id_ca').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }

    dataString = 'booth_putih='+booth_putih
    +'&sticker_booth_set='+sticker_booth_set
    +'&tenda='+tenda
    +'&roll_banner='+roll_banner
    +'&rafia_lakban='+rafia_lakban
    +'&kardus='+kardus
    +'&deep_gas='+deep_gas
    +'&deep_lis='+deep_lis
    +'&sel_reg='+sel_reg
    +'&nampan_stain='+nampan_stain
    +'&tiris='+tiris
    +'&ice_box='+ice_box
    +'&bas_tep='+bas_tep
    +'&telenan='+telenan
    +'&pisauf='+pisauf
    +'&top_plas='+top_plas
    +'&timbangan='+timbangan
    +'&bot_saus='+bot_saus
    +'&bot_bum='+bot_bum
    +'&gel_tak='+gel_tak
    +'&temp_sendok='+temp_sendok
    +'&capitan='+capitan
    +'&serbet='+serbet
    +'&kanebo='+kanebo
    +'&hand_glo='+hand_glo
    +'&masker='+masker
    +'&seragam='+seragam
    +'&celmek='+celmek
    +'&tusuk_sat='+tusuk_sat
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
}
</script>