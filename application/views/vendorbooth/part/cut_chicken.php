<form id="rincicek">
<table class="table table-bordered">
    <tr>
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr id="cut_booth" style="display: none;">
        <td>BOOTH PUTIH</td>
        <td align="center">1</td>
        <td><pid="cutchi_booth"></p></td>
    </tr>
    <tr id="cut_portable" style="display: none;">
        <td>BOOTH PORTABLE</td>
        <td align="center">1</td>
        <td><pid="cutchi_portable"></p></td>
    </tr>
    <tr id="cut_neon" style="display: none;">
        <td>NEON BOX</td>
        <td align="center">1</td>
        <td><pid="cutchi_neon"></p></td>
    </tr>
    <tr>
        <td>STIKER</td>
        <td align="center">1</td>
        <td><p id="cutchi_sticker"></p></td>
    </tr>
    <tr>
        <td>DEEP FRYER GAS</td>
        <td align="center">1</td>
        <td><p id="cutchi_deep_gas"></p></td>
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="cutchi_se_reg"></p></td>
    </tr>
    <tr>
        <td>TOPLES TEPUNG</td>
        <td align="center">1</td>
        <td><p id="cutchi_toptep"></p></td>
    </tr>
    <tr>
        <td>BOTOL SAUS PLASTIK</td>
        <td align="center">4</td>
        <td><p id="cutchi_btoksap"></p></td>
    </tr>
    <tr>
        <td>BOTOL BUMBU KACA</td>
        <td>4</td>
        <td><p id="cutchi_btol_kc"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="cutchi_sendok"></p></td>
    </tr>
    <tr>
        <td>PENCAPIT</td>
        <td align="center">1</td>
        <td><p id="cutchi_capitan"></p></td>
    </tr>
    <tr>
        <td>TALENAN</td>
        <td align="center">1</td>
        <td><p id="cutchi_telenan"></p></td>
    </tr>
    <tr>
        <td>PISAU FILLET</td>
        <td align="center">1</td>
        <td><p id="cutchi_pisf"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="cutchi_hand_glo"></p></td>
    </tr>
    <tr>
        <td>SERBET</td>
        <td align="center">1</td>
        <td><p id="cutchi_serbet"></p></td>
    </tr>
    <tr>
        <td>TUSUKAN CHICKEN</td>
        <td align="center">1</td>
        <td><p id="cutchi_tusukc"></p></td>
    </tr>
    <tr>
        <td>SERAGAM *Merah</td>
        <td align="center">1</td>
        <td><p id="cutchi_sermer"></p></td>
    </tr>
    <tr>
        <td>ICE BOX 5LT</td>
        <td align="center">1</td>
        <td><p id="cutchi_boxes"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="cutchi_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="cutchi_id_card"></p></td>
    </tr>
    <tr>
        <td>RAFIA LAKBAN</td>
        <td>1</td>
        <td><p id="cutchi_rafla"></p></td>
    </tr>
    <tr>
        <td>KARDUS</td>
        <td id="cut_3" align="center" style="display: none;">3</td>
        <td id="cut_4" align="center" style="display: none;">4</td>
        <td><p id="cutchi_kardus"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rinciancutchicken').style.display != 'none'){
    if($('#cutchi_booth').is(':checked')){
        var booth_put = 1
    }else{
        var booth_put = 0
    }
    if($('#cutchi_portable').is(':checked')){
        var booth_por = 1
    }else{
        var booth_por = 0
    }
    if($('#cutchi_neon').is(':checked')){
        var neon_box = 1
    }else{
        var neon_box = 0
    }
    if($('#cutchi_sticker').is(':checked')){
        var stiker = 1
    }else{
        var stiker = 0
    }
    if($('#cutchi_deep_gas').is(':checked')){
        var deep_gas = 1
    }else{
        var deep_gas = 0
    }
    if($('#cutchi_se_reg').is(':checked')){
        var sel_reg = 1
    }else{
        var sel_reg = 0
    }
    if($('#cutchi_toptep').is(':checked')){
        var top_tep = 1
    }else{
        var top_tep = 0
    }
    if($('#cutchi_btoksap').is(':checked')){
        var bot_saus = 1
    }else{
        var bot_saus = 0
    }
    if($('#cutchi_btol_kc').is(':checked')){
        var bot_bum = 1
    }else{
        var bot_bum = 0
    }
    if($('#cutchi_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#cutchi_capitan').is(':checked')){
        var capitan = 1
    }else{
        var capitan = 0
    }
    if($('#cutchi_telenan').is(':checked')){
        var telenan = 1
    }else{
        var telenan = 0
    }
    if($('#cutchi_pisf').is(':checked')){
        var pisauf = 1
    }else{
        var pisauf = 0
    }
    if($('#cutchi_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#cutchi_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#cutchi_tusukc').is(':checked')){
        var tusuk_chi = 1
    }else{
        var tusuk_chi = 0
    }
    if($('#cutchi_sermer').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#cutchi_boxes').is(':checked')){
        var ice_box = 1
    }else{
        var ice_box = 0
    }
    if($('#cutchi_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#cutchi_id_card').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#cutchi_rafla').is(':checked')){
        var rafia_lak = 1
    }else{
        var rafia_lak = 0
    }
    if($('#cutchi_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }

    dataString = 'booth_put='+booth_put
    +'&booth_por='+booth_por
    +'&neon_box='+neon_box
    +'&stiker='+stiker
    +'&deep_gas='+deep_gas
    +'&sel_reg='+sel_reg
    +'&top_tep='+top_tep
    +'&bot_saus='+bot_saus
    +'&bot_bum='+bot_bum
    +'&sendok='+sendok
    +'&capitan='+capitan
    +'&telenan='+telenan
    +'&pisauf='+pisauf
    +'&hand_glo='+hand_glo
    +'&serbet='+serbet
    +'&tusuk_chi='+tusuk_chi
    +'&seragam='+seragam
    +'&ice_box='+ice_box
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
    +'&rafia_lak='+rafia_lak
    +'&kardus='+kardus
}
</script>